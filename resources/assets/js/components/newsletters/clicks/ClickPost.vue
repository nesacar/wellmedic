<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/newsletters'">Newsletters</router-link></li>
                            <li v-if="newsletter"><router-link tag="a" :to="'/newsletters/' + newsletter.id + '/edit'">{{ newsletter.title }}</router-link></li>
                            <li v-if="post">{{ post.title }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">email</th>
                                <th scope="col">clicks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in clicks">
                                <td>{{ row.email }}</td>
                                <td>{{ row.click }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <paginate-helper :paginate="paginate" @clickLink="clickToLink($event)"></paginate-helper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PaginateHelper from '../../helper/PaginateHelper.vue';
    import swal from 'sweetalert2';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';

    export default {
        data(){
            return {
                newsletter: null,
                post: null,
                clicks: {},
                paginate: {},
            }
        },
        components: {
            'paginate-helper': PaginateHelper,
            'font-awesome-icon': FontAwesomeIcon
        },
        created(){
            this.getClicks();
        },
        methods: {
            getClicks(){
                axios.get('api/clicks/' + this.$route.params.newsletter + '/posts/' + this.$route.params.post + '/clicks')
                    .then(res => {
                        this.newsletter = res.data.newsletter;
                        this.post = res.data.post;
                        this.clicks = res.data.clicks.data;
                        this.paginate = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            clickToLink(index){
                axios.get('api/clicks/' + this.$route.params.newsletter + '/posts/' + this.$route.params.post + '/clicks?page=' + index)
                    .then(res => {
                        this.clicks = res.data.clicks.data;
                        this.paginate = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
        }
    }
</script>