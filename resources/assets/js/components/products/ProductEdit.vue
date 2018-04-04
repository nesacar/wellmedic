<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Početna</router-link></li>
                            <li><router-link tag="a" :to="'/products'">Proizvodi</router-link></li>
                            <li>Izmena proizvoda</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Izmena proizvoda</h5>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <h5>Slike galerije</h5>
                        <hr>
                        <div id="gallery" v-if="photos">
                            <div v-for="photo in photos" class="photo">
                                <font-awesome-icon icon="times" @click="deletePhoto(photo)" />
                                <img :src="photo.file_path_small" class="img-thumbnail" alt="product.title">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="form-group">
                            <label for="collection">Kolekcija</label>
                            <select name="collection" id="collection" class="form-control" v-model="product.collection_id">
                                <option :value="index" v-for="(collection, index) in lists">{{ collection }}</option>
                            </select>
                            <small class="form-text text-muted" v-if="error != null && error.collection_id">{{ error.collection_id[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label>Publikovano</label><br>
                            <switches v-model="product.publish" theme="bootstrap" color="primary"></switches>
                        </div>
                        <upload-image-helper
                                :image="product.image"
                                :defaultImage="null"
                                :titleImage="'proizvoda'"
                                :error="error"
                                @uploadImage="upload($event)"
                                @removeRow="remove($event)"
                        ></upload-image-helper>
                    </div><!-- .card -->

                    <!--<div class="card">-->
                        <!--<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-success="showSuccess()"></vue-dropzone>-->
                    <!--</div>-->

                </div>
                <div class="col-md-8">
                    <div class="card">
                            <form @submit.prevent="submit()">
                                <div class="form-group">
                                    <label for="title">Naslov</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Naslov" v-model="product.title">
                                    <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" v-model="product.slug">
                                    <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="overTitle">Nad naslov</label>
                                    <input type="text" name="overTitle" class="form-control" id="overTitle" placeholder="Naslov" v-model="product.overTitle">
                                    <small class="form-text text-muted" v-if="error != null && error.overTitle">{{ error.overTitle[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="subTitle">Podnaslov</label>
                                    <input type="text" name="overTitle" class="form-control" id="subTitle" placeholder="Naslov" v-model="product.subTitle">
                                    <small class="form-text text-muted" v-if="error != null && error.subTitle">{{ error.subTitle[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="short">Kratak opis</label>
                                    <textarea name="short" id="short" cols="3" rows="4" class="form-control" placeholder="Kratak opis" v-model="product.short"></textarea>
                                    <small class="form-text text-muted" v-if="error != null && error.short">{{ error.short[0] }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Opis</label>
                                    <ckeditor
                                            v-model="product.body"
                                            :config="config">
                                    </ckeditor>
                                    <small class="form-text text-muted" v-if="error != null && error.desc">{{ error.body[0] }}</small>
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
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.css';

    export default {
        data(){
          return {
              product: {},
              error: null,
              lists: {},
              photos: {},
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'filemanager/show'
              },
              dropzoneOptions: {
                  url: 'api/products/' + this.$route.params.id + '/gallery',
                  thumbnailWidth: 150,
                  maxFilesize: 0.5,
                  headers: { "Authorization": "Bearer " + this.$auth.getToken() }
              }
          }
        },
        computed: {
            link(){
                return this.product.link;
            },
            product_id(){
                return this.product.id;
            },
            user(){
                return this.$store.getters.getUser;
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
            'switches': Switches,
            'ckeditor': Ckeditor,
            'vue-dropzone': vue2Dropzone
        },
        created(){
            this.getProduct();
            this.getList();
            //this.getPhotos();
        },
        methods: {
            getProduct(){
                axios.get('api/products/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.product != null){
                            this.product = res.data.product;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                this.product.user_id = this.user.id;
                axios.patch('api/products/' + this.product.id, this.product)
                    .then(res => {
                        this.product = res.data.product;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                axios.post('api/products/' + this.product.id + '/image', { file: image[0] })
                    .then(res => {
                        this.product.image = res.data.image;
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
            },
            getList(){
                axios.get('api/collections/lists')
                    .then(res => {
                        this.lists = res.data.collections;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getPhotos(){
                axios.get('api/products/' + this.$route.params.id + '/gallery')
                    .then(res => {
                        this.photos = res.data.photos;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            deletePhoto(photo){
                axios.post('api/photos/' + photo.id + '/destroy')
                    .then(res => {
                        this.photos = this.photos.filter(function (item) {
                            return photo.id != item.id;
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            showSuccess(){
                this.getPhotos();
            }
        }
    }
</script>