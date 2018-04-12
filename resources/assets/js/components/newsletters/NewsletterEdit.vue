<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/newsletters'">Newsletters</router-link></li>
                            <li>Edit Newsletter</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Edit Newsletter</h5>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card stack" v-if="newsletter.send == 0">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" v-model="newsletter.title">
                            <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" @click="createLeading()">Leading Post</button>
                            <button class="btn btn-primary" @click="createPosts()">Two Posts</button>
                            <button class="btn btn-primary" @click="createBanner()">Banner</button>
                        </div>
                    </div>
                    <div class="card" v-else>
                        <h3>{{ newsletter.title }}</h3>
                        <p>Newsletter was sent to {{ newsletter.received }} addresses.</p>
                    </div>
                </div>
                <div class="col-sm-8">

                    <markup :items="items" :edit="true" :sent="newsletter.send" :newsletter="newsletter" @removeMarkup="removeMarkup($event)" @create="editNewsletter($event)"></markup>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import Switches from 'vue-switches';
    import swal from 'sweetalert2';
    import markup from '../newsletters/builder/markup.vue';

    export default {
        data(){
          return {
              newsletter: {},
              posts: {},
              error: null,
              items: []
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'switches': Switches,
            'markup': markup,
        },
        created(){
            this.getPosts();
            this.getNewsletter();
        },
        methods: {
            getPosts(){
                axios.get('api/posts/lists')
                    .then(res => {
                        this.posts = _.map(res.data.posts, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            getNewsletter(){
                axios.get('api/newsletters/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.newsletter != null){
                            this.newsletter = res.data.newsletter;
//                            this.newsletter.title = res.data.newsletter.title;
                            this.setItems(res.data.newsletter.template);
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            createLeading(){
                this.items.push({component: 'leading-post', 'post': null});
            },
            createPosts(){
                this.items.push({component: 'two-posts', 'post1': null, 'post2': null});
            },
            createBanner(){
                this.items.push({component: 'banner', 'banner': null});
            },
            removeMarkup(index){
                this.items.splice(index, 1);
            },
            editNewsletter(template){
                let data = {title: this.newsletter.title, template};
                axios.patch('api/newsletters/' + this.newsletter.id, data)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/newsletters');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            setItems(template){
                if(template.length > 0){
                    for(let i=0;i<template.length;i++){
                        this.items.push(template[i]);
                    }
                    console.log(this.items);
                }
            }
        }
    }
</script>

<style>
    .stack{
        flex: 1;
        position: fixed;
        top: 233px;
    }
</style>