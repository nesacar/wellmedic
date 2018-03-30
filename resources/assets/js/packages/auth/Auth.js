export default function (Vue) {
    Vue.auth = {
        setToken(token, expiration){
            localStorage.setItem('wm_token', token);
            localStorage.setItem('wm_expiration', expiration);
        },

        getToken(){
            var token = localStorage.getItem('wm_token');
            var expiration = localStorage.getItem('wm_expiration');

            if(!token || !expiration){
                return null;
            }

            if(Date.now() > parseInt(expiration)){
                this.destroyToken();
                return null;
            }else{
                return token;
            }
        },

        destroyToken(){
            localStorage.removeItem('wm_token');
            localStorage.removeItem('wm_expiration');
        },

        isAuth(){
            if(this.getToken()){
                return true;
            }else{
                return false;
            }
        }
    }

    Object.defineProperties(Vue.prototype, {
        $auth: {
            get: () => {
                return Vue.auth
            }
        }
    });
}
