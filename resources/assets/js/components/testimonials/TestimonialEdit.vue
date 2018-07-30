<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Početna</router-link></li>
                            <li><router-link tag="a" :to="'/testimonials'">Utisci</router-link></li>
                            <li>Izmena utiska</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Izmena utiska</h5>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date">Publikovano od:</label>
                                    <input type="date" name="title" class="form-control" id="date" placeholder="Published at" v-model="testimonial.date">
                                    <small class="form-text text-muted" v-if="error != null && error.publish_at">{{ error.publish_at[0] }}</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="time">&nbsp;</label>
                                    <input type="time" name="title" class="form-control" id="time" placeholder="Published at" v-model="testimonial.time">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product">Proizvod</label>
                            <select name="product" id="product" class="form-control" v-model="testimonial.product_id">
                                <option :value="index" v-for="(product, index) in products">{{ product }}</option>
                            </select>
                            <small class="form-text text-muted" v-if="error != null && error.product_id">{{ error.product_id[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="post_id">Članak</label>
                            <select name="post_id" id="post_id" class="form-control" v-model="testimonial.post_id">
                                <option :value="post.id" v-for="(post, index) in posts">{{ post.text }}</option>
                            </select>
                            <small class="form-text text-muted" v-if="error != null && error.post_id">{{ error.post_id[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label>Publikovano</label><br>
                            <switches v-model="testimonial.publish" theme="bootstrap" color="primary"></switches>
                        </div>


                    </div><!-- .card -->

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="srb" role="tabpanel" aria-labelledby="srb-tab">
                                <form @submit.prevent="submit()">
                                    <div class="form-group">
                                        <label>Opis</label>
                                        <ckeditor
                                                v-model="testimonial.body"
                                                :config="config">
                                        </ckeditor>
                                        <small class="form-text text-muted" v-if="error != null && error.desc">{{ error.body[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Autor</label>
                                        <input type="text" name="author" class="form-control" id="author" placeholder="Autor" v-model="testimonial.author">
                                        <small class="form-text text-muted" v-if="error != null && error.author">{{ error.author[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link autora</label>
                                        <input type="text" name="link" class="form-control" id="link" placeholder="Link autora" v-model="testimonial.link">
                                        <small class="form-text text-muted" v-if="error != null && error.link">{{ error.link[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Izmeni</button>
                                    </div>
                                </form>
                            </div><!-- #srb -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { apiHost } from '../../config';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.css';
    import moment from 'moment';

    export default {
        data(){
          return {
              testimonial: {},
              error: null,
              products: {},
              fullPosts: {},
              posts: {},
              photos: {},
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'filemanager/show',
                  filebrowserBrowseUrl: 'filemanager/show',
                  enterMode: CKEDITOR.ENTER_BR,
                  shiftEnterMode: CKEDITOR.ENTER_P, //pressing the SHIFT + ENTER KEYS input <p>
                  autoParagraph: false // stops automatic insertion of <p> on focus
              },
              dropzoneOptions: {
                  url: 'api/posts/' + this.$route.params.id + '/gallery',
                  thumbnailWidth: 150,
                  maxFilesize: 0.5,
                  headers: { "Authorization": "Bearer " + this.$auth.getToken() }
              },
              domain : apiHost
          }
        },
        computed: {
            post_id(){
                return this.testimonial.id;
            },
            user(){
                return this.$store.getters.getUser;
            },
            publish_at(){
                return this.testimonial.date + ' ' + this.testimonial.time
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
            this.getTestimonial();
            this.getProducts();
            this.getPosts();
            //this.getPhotos();
        },
        methods: {
            getTestimonial(){
                axios.get('api/testimonials/' + this.$route.params.id)
                    .then(res => {
                        this.testimonial = res.data.testimonial;
                        this.testimonial.date = moment(res.data.testimonial.publish_at).format('YYYY-MM-DD');
                        this.testimonial.time = moment(res.data.testimonial.publish_at).format('HH:mm:ss');
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                this.testimonial.publish_at = this.publish_at;
                axios.put('api/testimonials/' + this.testimonial.id, this.testimonial)
                    .then(res => {
                        /*this.testimonial = res.data.testimonial;
                        this.testimonial.date = moment(res.data.testimonial.publish_at).format('YYYY-MM-DD');
                        this.testimonial.time = moment(res.data.testimonial.publish_at).format('HH:mm:ss');*/
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Uspeh',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getProducts(){
                axios.get('api/products/lists')
                    .then(res => {
                        this.products = res.data.products;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getPosts(){
                axios.get('api/posts/lists')
                    .then(res => {
                        this.fullPosts = res.data.posts;
                        this.posts = _.map(res.data.posts, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
        }
    }
</script>