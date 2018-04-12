<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/newsletters'">Newsletters</router-link></li>
                            <li>Month</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>
                            <router-link tag="a" :to="'/statistics/' + id + '/day'" class="btn">Day</router-link>
                            <router-link tag="a" :to="'/statistics/' + id + '/month'" class="btn btn-primary">Month ({{ sum }})</router-link>
                            <router-link tag="a" :to="'/statistics/' + id + '/year'" class="btn">Year</router-link>
                        </h5>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card" v-if="trigger">
                        <chart :labels="labels" :data="values" :title="title"></chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Chart from './../../helper/ChartHelper.vue';

    export default {
        data(){
          return {
              newsletter: {},
              trigger: false,
              data: [],
              labels: [],
              title: {},
              sum: 0
          }
        },
        components: {
            'chart': Chart
        },
        computed: {
          id(){
              return this.newsletter.id;
          }
        },
        created(){
            this.getNewsletter();
        },
        methods: {
            getNewsletter(){
                axios.get('api/newsletters/' + this.$route.params.id)
                    .then(res => {
                        this.newsletter = res.data.newsletter;
                        this.title = 'Newsletter: ' + this.newsletter.title;
                        this.getStatistics();
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            getStatistics(){
                axios.get('api/statistics/' + this.newsletter.id + '/month')
                    .then(res => {
                        this.values = res.data.clicks.data;
                        this.labels = res.data.clicks.labels;
                        this.sum = res.data.sum;
                        this.trigger = true;
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
        }
    }
</script>

