<template>
    <div class="body" style="background-color:#e9e2d0;">
        <div style="background-color:#e9e2d0;">
            <div style="margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                    <tr>
                                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                <tr>
                                                    <td style="width:250px;"> <a href="https://www.wowmalta.com.mt/" target="_blank">

                                                        <img
                                                                alt="https://www.wowmalta.com.mt/" height="auto" :src="domain + '/img/logo.png'" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="250"
                                                        />

                                                    </a> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <template v-for="(item, index) in items">
                <component
                        :is="item.component"
                        :index="index"
                        :posts="posts"
                        :fullPosts="fullPosts"
                        :banners="banners"
                        :fullBanners="fullBanners"
                        :item="item"
                        :edit="edit"
                        :newsletter="newsletter"
                        @deleteRow="deleteRow($event)"
                        @setItem="setItem($event)"
                ></component>
            </template>

            <div style="Margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">

                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:12px;line-height:1.5;text-align:left;color:#000000;">
                                                <p text-align="center">You have received this message because you subscribed to it on <a href="https://www.wowmalta.com.mt">https://www.wowmalta.com.mt</a>. To stop receiving this and other messages from WowMalta - Travel Info Guide for Malta, Gozo &amp;
                                                    Comino, click <a href="#">HERE</a>.</p>
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
            <div>
                <button class="btn btn-primary" @click="create()" v-if="items.length > 0 && newsletter.send == 0">Confirm</button>
            </div>

        </div>
    </div>
</template>

<script>
    import leadingPost from './leadingPost.vue';
    import twoPosts from './twoPosts.vue';
    import banner from './banner.vue';
    import { apiHost } from './../../../config';

    export default{
        data(){
          return {
              posts: {},
              banners: {},
              fullPosts: {},
              fullBanners: {},
              attrs: [],
              domain: apiHost
          }
        },
        props: ['items', 'edit', 'newsletter'],
        components: {
            'leading-post': leadingPost,
            'two-posts': twoPosts,
            'banner': banner,
        },
        created(){
            this.getPosts();
            this.getBanners();
        },
        methods: {
            getPosts(){
                axios.get('api/posts/lists')
                    .then(res => {
                        this.fullPosts = res.data.posts;
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
            getBanners(){
                axios.get('api/banners/lists')
                    .then(res => {
                        this.fullBanners = res.data.banners;
                        this.banners = _.map(res.data.banners, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            deleteRow(index){
                this.attrs.splice(index, 1);
                this.$emit('removeMarkup', index);
            },
            setItem(item){
                this.attrs[item.index] = item;
            },
            create(){
                this.$emit('create', this.attrs);
            },
        }
    }
</script>

<style scoped>
    @import url(https://fonts.googleapis.com/css?family=Roboto);

    a {
        color: inherit;
        text-decoration: none;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    h1 {
        font-size: 18px;
        text-transform: uppercase;
        font-weight: 600;
        margin-top: 0;
    }

    .hr {
        display: block;
        height: 2px;
        width: 100%;
        margin-top: 16px;
        margin-bottom: 16px;
        border-bottom: 1px solid #fff;
        background-color: rgba(0, 0, 0, .12);
        background-image: linear-gradient( to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, .21), rgba(0, 0, 0, 0));
        opacity: .5;
    }

    .image {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        overflow: hidden;
    }

    .image--hero {
        padding-top: 46.51%;
    }

    .image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: auto;
        width: 100%;
    }

    .thumbnail {
        border-radius: 4px;
        margin-bottom: 16px;
    }

    .caption {
        color: #00adee;
    }

    .icon {
        width: 24px;
        height: 24px;
        fill: currentColor;
    }

    .link {
        color: #00adee;
    }

    .btn {
        display: inline-block;
        background-color: #00adee;
        color: #fff;
        font-weight: 500;
        padding: 10px 16px;
        border-radius: 50px;
        line-height: 1;
        border: 2px solid #00adee;
    }

    .btn--outline {
        background: none;
        color: #00adee;
    }

    .btn--outline:hover {
        color: #fff;
        background-color: #00adee;
    }

    .nav,
    .social {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .nav_link {
        text-transform: uppercase;
        padding: 8px 16px;
    }

    .nav_item:hover {
        color: #00adee;
    }

    .social_item {
        color: #00adee;
    }

    .social_link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
    }

    .article_body {
        position: relative;
        font-size: 13px;
        line-height: 1.5;
        max-height: 3em;
        overflow: hidden;
    }

    .article_title {
        font-size: 18px;
        margin-top: 8px;
        margin-bottom: 16px;
    }

    .quote {
        margin-bottom: 15px;
    }

    .quote_body {
        font-style: italic;
        color: rgba(0, 0, 0, .54);
        line-height: 1.5;
        max-height: 6em;
        overflow: hidden;
    }

    .quote_author {
        color: #00adee;
        font-size: 16px;
    }
</style>

<style scoped>
    .btn-primary{
        display: block;
        width: 70px;
        margin-left: auto;
        margin-right: auto;
    }
</style>