<template>
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word; position: relative;">

                                    <font-awesome-icon icon="times" @click="deleteRow(index)" v-if="!newsletter.send" />
                                    <router-link tag="a" class="clicks" :to="'/clicks/' + newsletter.id + '/testimonials/' + item.testimonial.id" v-if="newsletter.send">{{ clicks }}</router-link>

                                    <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:center;color:#000000;">
                                        <h2 class="article_title">Iskustva korisnika</h2>
                                        <div class="quote">
                                            <p class="quote_body" v-if="item.testimonial == null">Tekst iskustva</p>
                                            <p class="quote_body" v-else>{{ item.testimonial.body}}</p>
                                            <div class="quote_author" v-if="item.testimonial == null">Author</div>
                                            <div class="quote_author" v-else>{{ item.testimonial.author }}</div>
                                        </div>

                                        <div style="Margin:0px auto;max-width:600px;">
                                            <div style="width: 100%; position: relative;">
                                                <select2 :options="testimonials" :value="item.item" :name="item.component" @input="input($event)" v-if="!newsletter.send">
                                                    <option value="0">select one</option>
                                                </select2>
                                            </div>
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
                clicks: 0,
            }
        },
        props: ['testimonials', 'fullTestimonials', 'index', 'item', 'edit', 'newsletter'],
        created(){
            console.log(this.edit);
            if(this.edit){
                this.$emit('setItem', {type: 'testimonial', item1: this.item.testimonial, item2: null,  index: this.index});
                this.getClicks();
            }
        },
        components: {
            'select2': Select2,
            'font-awesome-icon': FontAwesomeIcon,
        },
        methods: {
            deleteRow(index){
                this.$emit('deleteRow', index);
            },
            input(testimonial_id){
                if(testimonial_id == 0){
                    this.item.testimonial = null;
                    this.$emit('setItem', {type: 'testimonial', item1: this.item.testimonial, item2: null, index: this.index});
                }else{
                    this.item.testimonial = this.fullTestimonials.find(b => b.id == testimonial_id);
                    this.$emit('setItem', {type: 'testimonial', item1: this.item.testimonial, item2: null,  index: this.index});
                }
            },
            getClicks(){
                if(this.item.testimonial){
                    axios.get('api/clicks/' + this.newsletter.id + '/testimonials/' + this.item.testimonial.id)
                        .then(res => {
                            this.clicks = res.data.clicks;
                        })
                        .catch(e => {
                            console.log(e);
                        });
                }
            },
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