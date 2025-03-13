var app = new Vue({
    el: '#app',
    data: {
        vtoken: '',
        tipo: '',
        precio: null,
        ubicacion: '',
        direccion: '',
        metros: null,
        recamaras: null,
        banos: null,
        tags: '',
        selectedCat: '',
        selectedSub: '',
        sInv: false,
        sInm: false,
        image: '',
        pdf: '',
        success: false,
        items: [],
        search: '',
        modal_data: [],
        modal_data_edit: [],
        form_show: true,
        files_show: false,
        labelA:'',
        labelB:'',
        labelC:'',
        infoA:'',
        infoB:'',
        infoC:'',
        iconA:'',
        iconB:'',
        iconC:'',
        youtube:'',
        // EDIT
        e_tipo: '',
        e_precio: null,
        e_ubicacion: '',
        e_direccion: '',
        e_metros: null,
        e_recamaras: null,
        e_banos: null,
        e_tags: '',
        e_selectedCat: '',
        e_selectedSub: '',
        e_sInv: false,
        e_sInm: false,
        e_image: '',
        e_pdf: '',
        e_success: false,
        e_youtube:'',
    },
    methods: {

        edit_files(item){
            const datafiles = new FormData()

            datafiles.append('file[]', this.e_image)
            datafiles.append('file[]', this.e_pdf)

            axios.post('https://capitalflowconsulting.com/v1/api/update/files/' + item.id, datafiles, {})
                .then(function (response) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                })
                .catch(function (error) {
                    console.log(error);
                });

            this.e_success = true;
        },

        edit_form(item){

            const params = new URLSearchParams();

            params.append('tipo', this.e_tipo)
            params.append('precio', this.e_precio)
            params.append('ubicacion', this.e_ubicacion)
            params.append('direccion', this.e_direccion)
            params.append('youtube', this.e_youtube)
            params.append('categoria', this.e_selectedCat)
            params.append('subcategoria', this.e_selectedSub)
            params.append('iconA', this.iconA)
            params.append('iconB', this.iconB)
            params.append('iconC', this.iconC)
            params.append('infoA', this.infoA)
            params.append('infoB', this.infoB)
            params.append('infoC', this.infoC)
            params.append('tags', this.e_tags)
           

            axios.put('https://capitalflowconsulting.com/v1/api/update/' + item.id, params, {})
            .then(function (response) {
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            })
            .catch(function (error) {
                console.log(error);
            });
            this.e_success = true;
        },

        data_modal_edit(item) {

            this.modal_data_edit = item;

            this.e_tipo = item.tipo;
            this.e_precio = item.precio;
            this.e_ubicacion = item.ubicacion;
            this.e_direccion = item.direccion;
            this.e_metros = item.metros;
            this.e_recamaras = item.recamaras;
            this.e_banos = item.banos;
            this.e_tags = item.tags;
            this.e_selectedCat = item.categoria;
            this.e_selectedSub = item.subcategoria;
            this.infoA = item.infoA;
            this.infoB = item.infoB;
            this.infoC = item.infoC;

            if (this.e_selectedCat === 'Inversiones') {
                this.e_sInv = true;
                this.e_sInm = false;
            }

            if (this.e_selectedCat === 'Inmuebles') {
                this.e_sInm = true;
                this.e_sInv = false;
            }

            if (this.e_selectedSub === 'Casas') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'Baños';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'banos.png';
            }

            if (this.e_selectedSub === 'Terreno') {
                this.labelA = 'M²';
                this.labelB = 'M² Construcción';
                this.labelC = 'Bardeado';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'bardeado.png';
            }

            if (this.e_selectedSub === 'Bienes Adjudicados') {
                this.labelA = 'M²';
                this.labelB = 'Escriturado';
                this.labelC = 'Posesión';

                this.iconA = 'm2.png';
                this.iconB = 'escriturado.png';
                this.iconC = 'posesion.png';
            }

            if (this.e_selectedSub === 'Departamentos') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'pisos.png';
            }

            if (this.e_selectedSub === 'Inversión') {
                this.labelA = 'Dejar Vacío';
                this.labelB = 'Dejar Vacío';
                this.labelC = 'Dejar Vacío';
            }

            if (this.e_selectedSub === 'Desarrollo Industrial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'Dentro de ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'ciudad.png';
            }

            if (this.e_selectedSub === 'Bodegas') {
                this.labelA = 'M²';
                this.labelB = 'M² patio';
                this.labelC = 'M² oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'patio.png';
                this.iconC = 'oficina.png';
            }

            if (this.e_selectedSub === 'Local Comercial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';
            }
            
            if (this.e_selectedSub === 'Plaza Comercial') {
                this.labelA = 'M²';
                this.labelB = 'No. Locales';
                this.labelC = 'No. Estacionamientos';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'estacionamiento.png';
            }

            if (this.e_selectedSub === 'Edificios') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';
            }

            if (this.e_selectedSub === 'Oficinas') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'oficina.png';
            }

            if (this.e_selectedSub === 'Hoteles') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'hotelHabitaciones.png';
            }

            if (this.e_selectedSub === 'Playa') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Pié de playa';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'playa.png';
                this.iconC = 'habitaciones.png';
            }

            if (this.e_selectedSub === 'Ciudad') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Céntrico';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'centrico.png';
                this.iconC = 'habitaciones.png';
            }

            if (this.e_selectedSub === 'Proyectos Mixtos') {
                this.labelA = 'M²';
                this.labelB = 'Locales';
                this.labelC = 'No. Deptos y Casas';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'depaocasa.png';
            }

            if (this.e_selectedSub === 'Desarrollos industriales') {
                this.labelA = 'M²';
                this.labelB = 'No. Bodegas';
                this.labelC = 'Dentro de Ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'bodegas.png';
                this.iconC = 'ciudad.png';
            }
        },

        show_form(){
            this.form_show = true;
            this.files_show = false;
        },

        show_files(){
            this.form_show = false;
            this.files_show = true;
        },

        delete_item(id) {
            axios.delete('https://capitalflowconsulting.com/v1/api/items/' + id).then(response => {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            });
        },

        data_modal(item) {
            this.modal_data = item;
        },

        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace('.', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },

        show_items() {
            axios.get('https://capitalflowconsulting.com/v1/api/items')
                .then(response => {
                    this.items = response.data;
                }).catch((_error) => {});
        },

        add() {
            const data = new FormData()

            data.append('file[]', this.image)
            data.append('file[]', this.pdf)
            data.append('tipo', this.tipo)
            data.append('precio', this.precio)
            data.append('ubicacion', this.ubicacion)
            data.append('direccion', this.direccion)
            data.append('youtube', this.youtube)
            data.append('categoria', this.selectedCat)
            data.append('subcategoria', this.selectedSub)
            data.append('iconA', this.iconA)
            data.append('iconB', this.iconB)
            data.append('iconC', this.iconC)
            data.append('infoA', this.infoA)
            data.append('infoB', this.infoB)
            data.append('infoC', this.infoC)
            data.append('tags', this.tags)

            axios.post('https://capitalflowconsulting.com/v1/api/add', data, {})
                .then(function (response) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                })
                .catch(function (error) {
                    console.log(error);
                });

            this.success = true;
        },

        fileImg(event) {
            this.image = this.$refs.image.files[0]
        },

        filePdf(event) {
            this.pdf = this.$refs.pdf.files[0]
        },

        e_fileImg(event) {
            this.e_image = this.$refs.e_image.files[0]
        },

        e_filePdf(event) {
            this.e_pdf = this.$refs.e_pdf.files[0]
        },

        select() {
            if (this.selectedCat === 'Inversiones') {
                this.sInv = true;
                this.sInm = false;
                this.selectedSub = '';
            }

            if (this.selectedCat === 'Inmuebles') {
                this.sInm = true;
                this.sInv = false;
                this.selectedSub = '';
            }
        },

        e_select() {
            if (this.e_selectedCat === 'Inversiones') {
                this.e_sInv = true;
                this.e_sInm = false;
                this.e_selectedSub = '';
            }

            if (this.e_selectedCat === 'Inmuebles') {
                this.e_sInm = true;
                this.e_sInv = false;
                this.e_selectedSub = '';
            }
        },

        selectSub() {

            if (this.selectedSub === 'Casas') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'Baños';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'banos.png';
                 
                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Terreno') {
                this.labelA = 'M²';
                this.labelB = 'M² Construcción';
                this.labelC = 'Bardeado';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'bardeado.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Bienes Adjudicados') {
                this.labelA = 'M²';
                this.labelB = 'Escriturado';
                this.labelC = 'Posesión';

                this.iconA = 'm2.png';
                this.iconB = 'escriturado.png';
                this.iconC = 'posesion.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Departamentos') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'pisos.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Inversión') {
                this.labelA = 'Dejar Vacío';
                this.labelB = 'Dejar Vacío';
                this.labelC = 'Dejar Vacío';
            }

            if (this.selectedSub === 'Desarrollo Industrial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'Dentro de ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'ciudad.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Bodegas') {
                this.labelA = 'M²';
                this.labelB = 'M² patio';
                this.labelC = 'M² oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'patio.png';
                this.iconC = 'oficina.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Local Comercial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }
            
            if (this.selectedSub === 'Plaza Comercial') {
                this.labelA = 'M²';
                this.labelB = 'No. Locales';
                this.labelC = 'No. Estacionamientos';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'estacionamiento.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Edificios') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Oficinas') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'oficina.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Hoteles') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'hotelHabitaciones.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Playa') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Pié de playa';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'playa.png';
                this.iconC = 'habitaciones.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Ciudad') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Céntrico';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'centrico.png';
                this.iconC = 'habitaciones.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Proyectos Mixtos') {
                this.labelA = 'M²';
                this.labelB = 'Locales';
                this.labelC = 'No. Deptos y Casas';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'depaocasa.png';
                
                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }

            if (this.selectedSub === 'Desarrollos industriales') {
                this.labelA = 'M²';
                this.labelB = 'No. Bodegas';
                this.labelC = 'Dentro de Ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'bodegas.png';
                this.iconC = 'ciudad.png';

                this.infoA = '';
                this.infoB = '';
                this.infoC = '';
            }
        },

        e_selectSub() {

            if (this.e_selectedSub === 'Casas') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'Baños';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'banos.png';
            }

            if (this.e_selectedSub === 'Terreno') {
                this.labelA = 'M²';
                this.labelB = 'M² Construcción';
                this.labelC = 'Bardeado';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'bardeado.png';
            }

            if (this.e_selectedSub === 'Bienes Adjudicados') {
                this.labelA = 'M²';
                this.labelB = 'Escriturado';
                this.labelC = 'Posesión';

                this.iconA = 'm2.png';
                this.iconB = 'escriturado.png';
                this.iconC = 'posesion.png';
            }

            if (this.e_selectedSub === 'Departamentos') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'pisos.png';
            }

            if (this.e_selectedSub === 'Inversión') {
                this.labelA = 'Dejar Vacío';
                this.labelB = 'Dejar Vacío';
                this.labelC = 'Dejar Vacío';
            }

            if (this.e_selectedSub === 'Desarrollo Industrial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'Dentro de ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'ciudad.png';
            }

            if (this.e_selectedSub === 'Bodegas') {
                this.labelA = 'M²';
                this.labelB = 'M² patio';
                this.labelC = 'M² oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'patio.png';
                this.iconC = 'oficina.png';
            }

            if (this.e_selectedSub === 'Local Comercial') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Piso';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';
            }
            
            if (this.e_selectedSub === 'Plaza Comercial') {
                this.labelA = 'M²';
                this.labelB = 'No. Locales';
                this.labelC = 'No. Estacionamientos';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'estacionamiento.png';
            }

            if (this.e_selectedSub === 'Edificios') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'pisos.png';
            }

            if (this.e_selectedSub === 'Oficinas') {
                this.labelA = 'M²';
                this.labelB = 'M² construcción';
                this.labelC = 'No. Oficinas';

                this.iconA = 'm2.png';
                this.iconB = 'm2.png';
                this.iconC = 'oficina.png';
            }

            if (this.e_selectedSub === 'Hoteles') {
                this.labelA = 'M²';
                this.labelB = 'Habitaciones';
                this.labelC = 'No. Pisos';

                this.iconA = 'm2.png';
                this.iconB = 'habitaciones.png';
                this.iconC = 'hotelHabitaciones.png';
            }

            if (this.e_selectedSub === 'Playa') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Pié de playa';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'playa.png';
                this.iconC = 'habitaciones.png';
            }

            if (this.e_selectedSub === 'Ciudad') {
                this.labelA = 'Depto o Casa';
                this.labelB = 'Céntrico';
                this.labelC = 'Habitaciones';

                this.iconA = 'depaocasa.png';
                this.iconB = 'centrico.png';
                this.iconC = 'habitaciones.png';
            }

            if (this.e_selectedSub === 'Proyectos Mixtos') {
                this.labelA = 'M²';
                this.labelB = 'Locales';
                this.labelC = 'No. Deptos y Casas';

                this.iconA = 'm2.png';
                this.iconB = 'numLocales.png';
                this.iconC = 'depaocasa.png';
            }

            if (this.e_selectedSub === 'Desarrollos industriales') {
                this.labelA = 'M²';
                this.labelB = 'No. Bodegas';
                this.labelC = 'Dentro de Ciudad';

                this.iconA = 'm2.png';
                this.iconB = 'bodegas.png';
                this.iconC = 'ciudad.png';
            }
        },


        close_session() {
            localStorage.clear();
            window.location.replace("/admin");
        },

        check_token() {
            axios.get('https://capitalflowconsulting.com/v1/api/user/' + localStorage.getItem('token')).then((result) => {
                this.vtoken = result.data[0].token
                if (this.vtoken !== localStorage.getItem('token')) {
                    window.location.replace("/");
                    localStorage.clear();
                }
            })
        },
    },
    beforeCreate() {
        if (localStorage.getItem('token') == null) {
            window.location.replace("/");
        }
    },
    mounted() {
        this.check_token();
        this.show_items();
    },
    computed: {
        filteredItems: function () {
            var self = this
            return self.items.filter(function (item) {
                return item.sku.indexOf(self.search) !== -1 ||
                    item.tags.toLowerCase().indexOf(self.search.toLowerCase()) !== -1 ||
                    item.tipo.toLowerCase().indexOf(self.search.toLowerCase()) !== -1
            })
        }
    },
})