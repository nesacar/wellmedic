<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Početna</router-link></li>
                            <li><router-link tag="a" :to="'/collections'">Kolekcije</router-link></li>
                            <li>Izmena kolekcije</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Izmena kolekcije</h5>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h5>Generalne informacije</h5>
                        <hr>
                        <div class="form-group">
                            <label for="title">Redosled</label>
                            <input type="text" name="order" class="form-control" id="order" placeholder="Redosled" v-model="collection.order">
                            <small class="form-text text-muted" v-if="error != null && error.order">{{ error.order[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label>Publikovano</label><br>
                            <switches v-model="collection.publish" theme="bootstrap" color="primary"></switches>
                        </div>
                        <upload-image-helper
                                :image="collection.image"
                                :defaultImage="null"
                                :titleImage="'kolekcije'"
                                :error="error"
                                @uploadImage="upload($event)"
                                @removeRow="remove($event)"
                        ></upload-image-helper>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h5>Jezičke informacije</h5>
                        <hr>
                            <form @submit.prevent="submit()">
                                <div class="form-group">
                                    <label for="title">Naslov</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Naslov" v-model="collection.title">
                                    <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" v-model="collection.slug">
                                    <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Opis</label>
                                    <ckeditor
                                            v-model="collection.short"
                                            :config="config">
                                    </ckeditor>
                                    <small class="form-text text-muted" v-if="error != null && error.short">{{ error.short[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Izmeni</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';

    export default {
        data(){
          return {
              collection: {},
              collections: {},
              error: null,
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'media'
              }
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
            'switches': Switches,
            'ckeditor': Ckeditor
        },
        created(){
            this.getCollection();
        },
        methods: {

            getCollection(){
                axios.get('api/collections/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.collection != null){
                            this.collection = res.data.collection;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                axios.patch('api/collections/' + this.collection.id, this.collection)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.collection = res.data.collection;
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                axios.post('api/collections/' + this.collection.id + '/image', { image: image[0] })
                    .then(res => {
                        this.collection.image = res.data.image;
                        this.error = null;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }).catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            }
        }
    }
</script>