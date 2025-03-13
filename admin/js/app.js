var app = new Vue({
    el: '#app',
    data: {
        pass: '',
        usuario: '',
        user: [],
        errorMsg: false,
        login: true,
        panel: false,
    },
    methods: {
        log() {
            const params = new URLSearchParams();
            params.append('pass', this.pass);
            params.append('usuario', this.usuario);
            axios.post('https://capitalflowconsulting.com/v1/api/login', params)
                .then((_response) => {
                    if (_response.data.length !== 0) {
                        localStorage.setItem('token', _response.data)
                        window.location.replace("https://capitalflowconsulting.com/admin/panel");
                    } else {
                        this.errorMsg = true;
                        this.pass = '';
                        this.usuario = '';
                    }

                }).catch((_error) => {
                    console.log(_error)
                });
        },

    },
    beforeCreate() {
        if (localStorage.getItem('token') !== null) {
            window.location.replace("https://capitalflowconsulting.com/admin/panel");
        }
    },
})