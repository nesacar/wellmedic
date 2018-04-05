<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Početna</router-link></li>
                            <li>Utisci</li>
                        </ul>
                    </div>
                </div>
            </div>

            <search-helper :lists="products" :text="''" @updateSearch="search($event)"></search-helper>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">opis</th>
                                <th scope="col">proizvod</th>
                                <th scope="col">članak</th>
                                <th scope="col">publikovano</th>
                                <th scope="col">kreirano</th>
                                <th>akcija</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in testimonials">
                                <td>{{ row.id }}</td>
                                <td><p v-html="row.body"></p></td>
                                <td>{{ row.product }}</td>
                                <td>{{ row.post }}</td>
                                <td><div v-if="row.publish == 1">Da</div> <div v-else>Ne</div></td>
                                <td>{{ row.created_at }}</td>
                                <td>
                                    <router-link tag="a" :to="'testimonials/' + row['id'] + '/edit'" class="edit-link" target="_blank"><font-awesome-icon icon="pencil-alt"/></router-link>
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
    import SearchHelper from '../helper/SearchHelper.vue';
    import swal from 'sweetalert2';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';

    export default {
        data(){
            return {
                testimonials: {},
                paginate: {},
                products: {}
            }
        },
        components: {
            'paginate-helper': PaginateHelper,
            'search-helper': SearchHelper,
            'font-awesome-icon': FontAwesomeIcon
        },
        created(){
            this.getTestimonials();
            this.getProducts();
        },
        methods: {
            getTestimonials(){
                axios.get('api/testimonials')
                    .then(res => {
                        this.testimonials = res.data.testimonials.data;
                        this.paginate = res.data.testimonials;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            editRow(id){
                this.$router.push('testimonials/' + id + '/edit');
            },
            deleteRow(row){
                swal({
                    title: 'Da li ste sigurni?',
                    text: "Nećete moći da povratite radnju!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#51d2b7',
                    cancelButtonColor: '#fb9678',
                    confirmButtonText: 'Da, obriši ga!',
                    cancelButtonText: 'Odustani'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('api/testimonials/' + row.id)
                            .then(res => {
                                this.testimonials = this.testimonials.filter(function (item) {
                                    return row.id != item.id;
                                });
                                swal(
                                    'Obrisano!',
                                    'Utisak je uspešno obrisan.',
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
                axios.get('api/testimonials?page=' + index)
                    .then(res => {
                        this.testimonials = res.data.testimonials.data;
                        this.paginate = res.data.testimonials;
                    })
                    .catch(e => {
                        console.log(e);
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
            search(value){
                axios.post('api/testimonials/search', value)
                    .then(res => {
                        this.testimonials = res.data.testimonials.data;
                        this.paginate = res.data.testimonials;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>