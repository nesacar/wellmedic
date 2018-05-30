<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Početna</router-link></li>
                            <li><router-link tag="a" :to="'/testimonials'">Utisci</router-link></li>
                            <li>Kreiranje utiska</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Kreiranje utiska</h5>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <form @submit.prevent="submit()">
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
                                <label for="body">Opis</label>
                                <textarea name="body" id="body" cols="4" rows="4" class="form-control" v-model="testimonial.body"></textarea>
                                <small class="form-text text-muted" v-if="error != null && error.body">{{ error.body[0] }}</small>
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
                                <label>Publikovano</label><br>
                                <switches v-model="testimonial.publish" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Kreiraj</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { apiHost } from '../../config';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';
    import moment from 'moment';

    export default {
        data(){
          return {
              testimonial: {
                  date: moment().format('YYYY-MM-DD'),
                  time: moment().format('HH:mm'),
                  desc: null,
                  publish: false,
                  category_id: 0,
                  product_id: 0,
              },
              products: {},
              posts: {},
              fullPosts: {},
              error: null,
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
              domain : apiHost
          }
        },
        computed: {
            user(){
                return this.$store.getters.getUser;
            },
            publish_at(){
                return this.testimonial.date + ' ' + this.testimonial.time
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'switches': Switches,
            'ckeditor': Ckeditor
        },
        created(){
            this.getProducts();
            this.getPosts();
        },
        methods: {
            submit(){
                this.testimonial.user_id = this.user.id;
                this.testimonial.publish_at = this.publish_at;
                axios.post('api/testimonials', this.testimonial)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/testimonials');
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
            }
        }
    }
</script>