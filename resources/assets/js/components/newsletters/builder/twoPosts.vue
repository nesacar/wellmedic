<template>
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                    <!-- articles -->
                    <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                            <!-- article -->
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                        <div class="image thumbnail"> <img src="https://images.pexels.com/photos/68563/pexels-photo-68563.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" /> </div>
                                        <div class="artcile"> <span class="caption">30. Decembar 2017</span>
                                            <h2 class="article_title">Izbor krljevskih i plemickih porodica</h2>
                                            <p class="article_body">Doktori i naucnici znaju da pomaze u sledecem: Dobodi kiseonik u telo i povecava izdrzljivost, pruza vise snage i energije</p>
                                            <div style="text-align: center;"> <a href="#" class="btn btn--outline">Pročitaj više</a> </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /article -->
                    <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                            <!-- article -->
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                        <div class="image thumbnail"> <img src="https://images.pexels.com/photos/68563/pexels-photo-68563.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" /> </div>
                                        <div class="artcile"> <span class="caption">30. Decembar 2017</span>
                                            <h2 class="article_title">Izbor krljevskih i plemickih porodica</h2>
                                            <p class="article_body">Doktori i naucnici znaju da pomaze u sledecem: Dobodi kiseonik u telo i povecava izdrzljivost, pruza vise snage i energije</p>
                                            <div style="text-align: center;"> <a href="#" class="btn btn--outline">Pročitaj više</a> </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /article -->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Select2 from '../../helper/Select2Helper.vue';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import { apiHost } from '../../../config';

    export default {
        data(){
          return {
              domain: apiHost,
              clicks1: 0,
              clicks2: 0,
          }
        },
        props: ['posts', 'fullPosts', 'index', 'item', 'edit', 'newsletter'],
        components: {
            'select2': Select2,
            'font-awesome-icon': FontAwesomeIcon
        },
        created(){
            if(this.edit){
                this.$emit('setItem', {type: 'posts', item1: this.item.post1, item2: this.item.post2, index: this.index});
                this.getClicks1();
                this.getClicks2();
            }
        },
        methods: {
            deleteRow(index){
                this.$emit('deleteRow', index);
            },
            input1(post_id){
                if(post_id == 0){
                    this.item.post1 = null;
                    this.$emit('setItem', {type: 'post', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }else{
                    this.item.post1 = this.fullPosts.find(p => p.id == post_id);
                    this.$emit('setItem', {type: 'posts', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }
            },
            input2(post_id){
                if(post_id == 0){
                    this.item.post2 = null;
                    this.$emit('setItem', {type: 'post', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }else{
                    this.item.post2 = this.fullPosts.find(p => p.id == post_id);
                    this.$emit('setItem', {type: 'posts', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }
            },
            getClicks1(){
                axios.get('api/clicks/' + this.newsletter.id + '/posts/' + this.item.post1.id)
                    .then(res => {
                        this.clicks1 = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            getClicks2(){
                axios.get('api/clicks/' + this.newsletter.id + '/posts/' + this.item.post2.id)
                    .then(res => {
                        this.clicks2 = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>

<style scoped>
    @media only screen and (min-width:480px) {
        .mj-column-per-50 {
            width: 50% !important;
        }
    }

    svg{
        display: block !important;
        width: 25px !important;
        height: 25px !important;
        cursor: pointer;
        position: absolute;
        top: 5px;
        left: 5px;
        color: red;
    }

    table, td {
        display: inline-block;
        vertical-align: top;
    }

    .clicks{
        display: block;
        position: absolute;
        top: 5px;
        right: 10px;
        border: 1px solid #008a88;
        font-size: 18px;
        background-color: white;
        padding: 0 2px;
    }
</style>