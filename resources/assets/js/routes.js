import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes: [
        { path: "/", component: require('./components/home/Home.vue'), meta: { forAuth: true } },
        { path: "/home", component: require('./components/home/Home.vue'), meta: { forAuth: true } },

        { path: "/login", component: require('./components/auth/Login.vue'), meta: { forVisitors: true } },
        { path: "/register", component: require('./components/auth/Register.vue'), meta: { forVisitors: true } },
        { path: "/logout", component: require('./components/auth/Logout.vue'), meta: { forAuth: true } },

        { path: "/users", component: require('./components/users/UserList.vue'), meta: { forAuth: true } },
        { path: "/users/create", component: require('./components/users/UserCreate.vue'), meta: { forAuth: true } },
        { path: "/users/:id/edit", component: require('./components/users/UserEdit.vue'), meta: { forAuth: true } },
        { path: "/users/change-password", component: require('./components/users/UserChangePassword.vue'), meta: { forAuth: true } },

        { path: "/categories", component: require('./components/categories/CategoryList.vue'), meta: { forAuth: true } },
        { path: "/categories/create", component: require('./components/categories/CategoryCreate.vue'), meta: { forAuth: true } },
        { path: "/categories/:id/edit", component: require('./components/categories/CategoryEdit.vue'), meta: { forAuth: true } },

        { path: "/posts", component: require('./components/posts/PostList.vue'), meta: { forAuth: true } },
        { path: "/posts/create", component: require('./components/posts/PostCreate.vue'), meta: { forAuth: true } },
        { path: "/posts/:id/edit", component: require('./components/posts/PostEdit.vue'), meta: { forAuth: true } },

        { path: "/collections", component: require('./components/collections/CollectionList.vue'), meta: { forAuth: true } },
        { path: "/collections/create", component: require('./components/collections/CollectionCreate.vue'), meta: { forAuth: true } },
        { path: "/collections/:id/edit", component: require('./components/collections/CollectionEdit.vue'), meta: { forAuth: true } },

        { path: "/products", component: require('./components/products/ProductList.vue'), meta: { forAuth: true } },
        { path: "/products/create", component: require('./components/products/ProductCreate.vue'), meta: { forAuth: true } },
        { path: "/products/:id/edit", component: require('./components/products/ProductEdit.vue'), meta: { forAuth: true } },

        { path: "/settings/:id/edit", component: require('./components/settings/SettingEdit.vue'), meta: { forAuth: true } },

        { path: "/themes", component: require('./components/themes/ThemeList.vue'), meta: { forAuth: true } },
        { path: "/themes/create", component: require('./components/themes/ThemeCreate.vue'), meta: { forAuth: true } },
        { path: "/themes/:id/edit", component: require('./components/themes/ThemeEdit.vue'), meta: { forAuth: true } },

        { path: "/menus", component: require('./components/menus/MenuList.vue'), meta: { forAuth: true } },
        { path: "/menus/create", component: require('./components/menus/MenuCreate.vue'), meta: { forAuth: true } },
        { path: "/menus/:id/edit", component: require('./components/menus/MenuEdit.vue'), meta: { forAuth: true } },
        { path: "/menus/:id/sort", component: require('./components/menus/MenuSort.vue'), meta: { forAuth: true } },

        { path: "/menu-links/:id", component: require('./components/menuLinks/MenuLinks.vue'), meta: { forAuth: true } },
        { path: "/menu-links/:id/create", component: require('./components/menuLinks/MenuLinkCreate.vue'), meta: { forAuth: true } },
        { path: "/menu-links/:id/edit", component: require('./components/menuLinks/MenuLinkEdit.vue'), meta: { forAuth: true } },

        { path: "/banners", component: require('./components/banners/BannerList.vue'), meta: { forAuth: true } },
        { path: "/banners/create", component: require('./components/banners/BannerCreate.vue'), meta: { forAuth: true } },
        { path: "/banners/:id/edit", component: require('./components/banners/BannerEdit.vue'), meta: { forAuth: true } },

        { path: "/subscribers", component: require('./components/subscribers/SubscriberList.vue'), meta: { forAuth: true } },
        { path: "/subscribers/create", component: require('./components/subscribers/SubscriberCreate.vue'), meta: { forAuth: true } },
        { path: "/subscribers/:id/edit", component: require('./components/subscribers/SubscriberEdit.vue'), meta: { forAuth: true } },

        { path: "/testimonials", component: require('./components/testimonials/TestimonialList.vue'), meta: { forAuth: true } },
        { path: "/testimonials/create", component: require('./components/testimonials/TestimonialCreate.vue'), meta: { forAuth: true } },
        { path: "/testimonials/:id/edit", component: require('./components/testimonials/TestimonialEdit.vue'), meta: { forAuth: true } },

        { path: "/blocks", component: require('./components/blocks/BlockList.vue'), meta: { forAuth: true } },
        { path: "/blocks/create", component: require('./components/blocks/BlockCreate.vue'), meta: { forAuth: true } },
        { path: "/blocks/:id/edit", component: require('./components/blocks/BlockEdit.vue'), meta: { forAuth: true } },

        { path: "/boxes", component: require('./components/boxes/BoxList.vue'), meta: { forAuth: true } },
        { path: "/boxes/create", component: require('./components/boxes/BoxCreate.vue'), meta: { forAuth: true } },
        { path: "/boxes/:id/edit", component: require('./components/boxes/BoxEdit.vue'), meta: { forAuth: true } },

        { path: "/newsletters", component: require('./components/newsletters/NewsletterList.vue'), meta: { forAuth: true } },
        { path: "/newsletters/create", component: require('./components/newsletters/NewsletterCreate.vue'), meta: { forAuth: true } },
        { path: "/newsletters/:id/edit", component: require('./components/newsletters/NewsletterEdit.vue'), meta: { forAuth: true } },
    ],

    linkActiveClass: 'active'
});