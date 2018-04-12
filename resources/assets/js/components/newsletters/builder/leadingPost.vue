<template>
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:600px;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:15px;padding-top:0;text-align:center;vertical-align:top;">

                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:600px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="600px">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 0;word-break:break-word;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px; margin: 0 !important;">
                                        <tbody>
                                        <tr>

                                            <td style="width:550px; position: relative;">

                                                <font-awesome-icon icon="times" @click="deleteRow(index)" v-if="!newsletter.send" />
                                                <router-link tag="a" class="clicks" :to="'/clicks/' + newsletter.id + '/posts/' + item.post.id" v-if="newsletter.send">{{ clicks }}</router-link>

                                                <a href="#" target="_blank">

                                                <img alt="#" height="250px" :src="domain + 'img/newsletter-post.jpg'" style="border:0;display:block;outline:none;text-decoration:none;width:550px;" width="550" v-if="item.post == null" />
                                                <img alt="#" height="250px" :src="domain + item.post.image" style="border:0;display:block;outline:none;text-decoration:none;width:550px;" width="550" v-else />

                                            </a> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>

                                            <td style="width:550px; position: relative;">
                                                <select2 :options="posts" :value="item.item1" :name="item.component" @input="input($event)" v-if="!newsletter.send">
                                                    <option value="0">select one</option>
                                                </select2>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                    <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                        <div class="article">
                                            <h2 class="heading" v-if="item.post == null">DEFAULT TITLE</h2>
                                            <h2 class="heading" v-else>{{ item.post.title }}</h2>
                                            <p v-if="item.post == null">Default body...</p>
                                            <p v-else>{{ item.post.short }}</p>
                                            <div style="text-align: right;"> <a href="">Read more &gt;</a> </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

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
              clicks: 0
          }
        },
        props: ['posts', 'fullPosts', 'index', 'item', 'edit', 'newsletter'],
        created(){
            if(this.edit){
                this.$emit('setItem', {type: 'post', item1: this.item.post, item2: null, index: this.index});
                this.getClicks();
            }
        },
        components: {
            'select2': Select2,
            'font-awesome-icon': FontAwesomeIcon
        },
        methods: {
            deleteRow(index){
                this.$emit('deleteRow', index);
            },
            input(post_id){
                if(post_id == 0){
                    this.item.post = null;
                    this.$emit('setItem', {type: 'post', item1: this.item.post, item2: null, index: this.index});
                }else{
                    this.item.post = this.fullPosts.find(p => p.id == post_id);
                    this.$emit('setItem', {type: 'post', item1: this.item.post, item2: null, index: this.index});
                }
            },
            getClicks(){
                axios.get('api/clicks/' + this.newsletter.id + '/posts/' + this.item.post.id)
                    .then(res => {
                        this.clicks = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>

<style scoped>
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