// let meta = document.head.querySelector('meta[name="auth"]');

module.exports = {
    computed: {
        isAuthenticated(){
            return !! window.me.loggedIn;
        },
        auth() {
            return window.me.i
        },
        currentTeam() {
            return window.me.org
        },
        guest(){
            return ! this.isAuthenticated
        }
    },
    methods:{
        redirectIfGuest(){
            if (this.guest) {
                return window.location.href = '/login';
            }
        }
    }
};
