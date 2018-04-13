<template>
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                    <!-- experiences -->
                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:center;color:#000000;">
                                        <h2 class="article_title">Iskustva korisnika</h2>
                                        <div class="quote">
                                            <!-- experience -->
                                            <p class="quote_body"> Morbi sodales luctus leo vitae venenatis. Nulla interdum diam sed justo ultricies sollicitudin. Morbi aliquet massa eu hendrerit egestas. Vivamus sodales nibh eget lobortis lobortis. Suspendisse potenti. Fusce est mi, ultricies
                                                quis gravida eget, tempus eu lorem.Suspendisse potenti. Fusce est mi, ultricies quis gravida eget, tempus eu lorem.Suspendisse potenti. Fusce est mi, ultricies quis gravida eget, tempus eu lorem. </p>
                                            <div class="quote_author">Vaca San</div>
                                        </div>
                                        <!-- /experience -->
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
        props: ['banners', 'fullBanners', 'index', 'item', 'edit', 'newsletter'],
        created(){
            if(this.edit){
                this.$emit('setItem', {type: 'banner', item1: this.item.banner, item2: null,  index: this.index});
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
            input(banner_id){
                if(banner_id == 0){
                    this.item.banner = null;
                    this.$emit('setItem', {type: 'banner', item1: this.item.banner, item2: null, index: this.index});
                }else{
                    this.item.banner = this.fullBanners.find(b => b.id == banner_id);
                    this.$emit('setItem', {type: 'banner', item1: this.item.banner, item2: null,  index: this.index});
                }
            },
            getClicks(){
                axios.get('api/clicks/' + this.newsletter.id + '/testimonials/' + this.item.banner.id)
                    .then(res => {
                        this.clicks = res.data.clicks;
                    })
                    .catch(e => {
                        console.log(e);
                    });
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