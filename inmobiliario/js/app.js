var app = new Vue({
    el: '#app',
    data: {
        items_inv: [],
        search: '',
    },
    methods: {

        click_td(){
            this.search = '';
        },

        click_p(){
            this.search = 'Playa';
        },

        click_c(){
            this.search = 'Ciudad';
        },

        click_t(){
            this.search = 'Terrenos';
        },

        click_pc(){
            this.search = 'Plaza Comercial';
        },

        click_pm(){
            this.search = 'Proyectos Mixtos';
        },

        click_i(){
            this.search = 'Inversión';
        },

        click_di(){
            this.search = 'Desarrollos Industriales';
        },
        show_items_inv() {
            axios.get('https://capitalflowconsulting.com/v1/api/item/inversiones').then((result) => {
                this.items_inv = result.data;
            })
        },

        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace('.', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
    },
    mounted() {
        this.show_items_inv();
    },
    computed: {
        filteredItems: function () {
            var self = this
            return self.items_inv.filter(function (item) {
                return item.sku.indexOf(self.search) !== -1 ||
                item.tags.toLowerCase().indexOf(self.search.toLowerCase()) !== -1 ||
                item.tipo.toLowerCase().indexOf(self.search.toLowerCase()) !== -1 ||
                item.direccion.toLowerCase().indexOf(self.search.toLowerCase()) !== -1 ||
                item.subcategoria.toLowerCase().indexOf(self.search.toLowerCase()) !== -1
            })
        }
    },
})