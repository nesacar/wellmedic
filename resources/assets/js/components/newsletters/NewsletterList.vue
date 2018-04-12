<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li>Newsletters</li>
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
                                <th scope="col">id</th>
                                <th scope="col">title</th>
                                <th scope="col">last sent</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in newsletters">
                                <td>{{ row.id }}</td>
                                <td>{{ row.title }}</td>
                                <td v-if="row.last_send">{{ row.last_send }}</td> <td v-else> Never </td>
                                <td>
                                    <span v-if="row.send == 1">
                                        <font-awesome-icon icon="chart-area" v-if="row.send == 1 && row.active == 0" @click="statisticsMont(row.id)" />
                                    </span>
                                    <span v-else>
                                        <button class="btn btn-primary" @click="prepareRow(row.id)" v-if="row.active == 0">Prepare</button>
                                        <button class="btn btn-primary" @click="sendRow(row.id)" v-if="row.active == 1 && sent">Send</button>
                                    </span>
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

    export default {
        data(){
            return {
                newsletters: {},
                paginate: {},
                sent: true
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon
        },
        created(){
            this.getNewsletters();
        },
        methods: {
            getNewsletters(){
                axios.get('api/newsletters')
                    .then(res => {
                        this.newsletters = res.data.newsletters.data;
                        this.columns = res.data.columns;
                        this.paginate = res.data.newsletters;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            editRow(id){
                this.$router.push('newsletters/' + id + '/edit');
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
                        axios.delete('api/newsletters/' + row.id)
                            .then(res => {
                                this.newsletters = this.newsletters.filter(function (item) {
                                    return row.id != item.id;
                                });
                                swal(
                                    'Deleted!',
                                    'Newsletter is deleted.',
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
                axios.get('api/newsletters?page=' + index)
                    .then(res => {
                        this.newsletters = res.data.newsletters.data;
                        this.paginate = res.data.newsletters;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            sendRow(index){
                swal(
                    'Send!',
                    'Newsletter was sent.',
                    'success'
                );
                this.sent = false;
                axios.post('api/newsletters/' + index + '/send')
                    .then(res => {

                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            prepareRow(index){
                console.log('prepare: ' + index);
                axios.post('api/newsletters/' + index + '/prepare')
                    .then(res => {
                        swal(
                            'Prepared!',
                            'Newsletter was prepared.',
                            'success'
                        );
                        this.getNewsletters();
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            statisticsMont(id){
                this.$router.push('statistics/' + id + '/month');
            }
        }
    }
</script>