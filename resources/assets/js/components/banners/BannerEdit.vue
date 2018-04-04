<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/banners'">Banners</router-link></li>
                            <li>Edit Banner</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Edit Banner</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Title" v-model="banner.title">
                                <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link" placeholder="Link" v-model="banner.link">
                                <small class="form-text text-muted" v-if="error != null && error.email">{{ error.email[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="width">Width</label>
                                <input type="text" name="width" class="form-control" id="width" placeholder="width" v-model="banner.width">
                                <small class="form-text text-muted" v-if="error != null && error.width">{{ error.width[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="height">Height</label>
                                <input type="text" name="height" class="form-control" id="height" placeholder="Height" v-model="banner.height">
                                <small class="form-text text-muted" v-if="error != null && error.height">{{ error.height[0] }}</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <upload-image-helper :image="banner.image" :defaultImage="'img/user-image.png'" :titleImage="'Banner'" :error="error" @uploadImage="upload($event)"></upload-image-helper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';

    export default {
        data(){
          return {
              banner: {},
              error: null
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
        },
        created(){
            this.getBanner();
        },
        methods: {
            submit(){
                axios.patch('api/banners/' + this.banner.id, this.banner)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Edited',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getBanner(){
                axios.get('api/banners/' + this.$route.params.id)
                    .then(res => {
                        this.banner = res.data.banner;
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                axios.post('api/banners/' + this.banner.id + '/image', { file: image[0] })
                    .then(res => {
                        this.banner.image = res.data.image;
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