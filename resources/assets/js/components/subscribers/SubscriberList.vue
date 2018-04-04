<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li>Subscribers</li>
                        </ul>
                    </div>
                </div>
            </div>

            <search-helper :lists="[]" :text="''" @updateSearch="search($event)"></search-helper>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">email</th>
                                <th scope="col">created_at</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in subscribers">
                                <td>{{ row.id }}</td>
                                <td>{{ row.email }}</td>
                                <td>{{ row.created_at }}</td>
                                <td>
                                    <font-awesome-icon icon="pencil-alt" @click="editRow(row['id'])"/>
                                    <font-awesome-icon icon="times" @click="deleteRow(row)" />
                                </td>
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
    import PaginateHelper from '../helper/PaginateHelper.vue';
    import swal from 'sweetalert2';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import SearchHelper from '../helper/SearchHelper.vue';

    export default {
        data(){
            return {
                subscribers: {},
                paginate: {}
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'search-helper': SearchHelper,
        },
        created(){
            this.getSubs();
        },
        methods: {
            getSubs(){
                axios.get('api/subscribers')
                    .then(res => {
                        this.subscribers = res.data.subscribers.data;
                        this.columns = res.data.columns;
                        this.paginate = res.data.subscribers;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            editRow(id){
                this.$router.push('subscribers/' + id + '/edit');
            },
            deleteRow(row){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#51d2b7',
                    cancelButtonColor: '#fb9678',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('api/subscribers/' + row.id)
                            .then(res => {
                                this.subscribers = this.subscribers.filter(function (item) {
                                    return row.id != item.id;
                                });
                                swal(
                                    'Deleted!',
                                    'Subscriber is deleted.',
                                    'success'
                                );
                            })
                            .catch(e => {
                                console.log(e);
                            });
                    }
                });
            },
            clickToLink(index){
                axios.get('api/subscribers?page=' + index)
                    .then(res => {
                        this.subscribers = res.data.subscribers.data;
                        this.paginate = res.data.subscribers;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            search(value){
                axios.post('api/subscribers/search', value)
                    .then(res => {
                        this.subscribers = res.data.subscribers.data;
                        this.paginate = res.data.subscribers;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>