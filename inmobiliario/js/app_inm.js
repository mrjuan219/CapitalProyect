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
            this.search = 'Casa';
        },

        click_c(){
            this.search = 'Departamentos';
        },

        click_t(){
            this.search = 'Terrenos';
        },

        click_ba(){
            this.search = 'Bienes Adjudicados';
        },

        click_pm(){
            this.search = 'Bodegas';
        },

        click_i(){
            this.search = 'Inversión';
        },

        click_di(){
            this.search = 'Desarrollos Industriales';
        },

        click_bo(){
            this.search = 'Bodegas';
        },

        click_lc(){
            this.search = 'Local comercial';
        },

        click_pc(){
            this.search = 'Plaza comercial';
        },

        click_e(){
            this.search = 'Edificios';
        },

        click_ofi(){
            this.search = 'Oficinas';
        },

        click_h(){
            this.search = 'Hoteles';
        },

        show_items_inv() {
            axios.get('https://capitalflowconsulting.com/v1/api/item/inmuebles').then((result) => {
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