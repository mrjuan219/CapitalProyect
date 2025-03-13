<body>

    <div class="loader" id="loader">
        <div class="corners">
            <div class="corner corner--1"></div>
            <div class="corner corner--2"></div>
            <div class="corner corner--3"></div>
            <div class="corner corner--4"></div>
        </div>
    </div>


    <div id="menu" class="menumovil pointer">Menu
        <img class="imagenmenu" src="img/menu.png" alt="Menu">
    </div>
    <nav id="barraa" class="contenedor-navegacion">
        <div id="cerrarm" class="cerrarmenu pointer">X</div>
        <ul class="subcontenedor-navegacion">
            <li id="inicio" onclick="window.location='index.php'" class="items-barra">
                Inicio
            </li>
            <li id="nosotros" onclick="window.location='Nosotros.php'" class="items-barra">
                FLEX AMBIENTAL
            </li>
            <li id="servicios" class="items-barra">
                Servicios
                <div class="arreglarAnim"></div>
                <ul class="contenedor-drop">
                    <li id="oficina" class="items-drop">
                        Actividades de cambio de uso de suelo en oficina
                    </li>
                    <li id="campo" class="items-drop">
                        Actividades en campo
                    </li>
                </ul>
            </li>

            <li id="contacto" onclick="window.location='Contacto.php'" id="icono" class="items-barra">
                Contacto
            </li>

            <ul class="contenedor-redes">
                <li class="redes-sociales">
                    <img onclick="whatsapp();" src="img/whats.png" alt="Whatsapp">
                </li>
                <li class="redes-sociales">
                    <img onclick="facebook();" src="img/face.png" alt="Facebook">
                </li>
                <li onclick="insta();" class="redes-sociales">
                    <img onclick="insta();" src="img/insta.png" alt="Instagram">
                </li>
            </ul>
        </ul>
    </nav>


    <script>
        $(document).ready(function() {
            $('#menu').on('click', function() {
                //$('.contenedor-navegacion').addClass("activoo");
                $('.contenedor-navegacion').slideDown(700);
                $('#cerrarm').on('click', function() {
                    //$('.contenedor-navegacion').removeClass("activoo");
                    $('.contenedor-navegacion').slideUp(700);
                })
            })
        });

    </script>

    <script>
        $(document).ready(function() {
            if ($(window).width() >= 700) {
                $('#servicios, .arreglarAnim').hover(
                    function() {
                        $('#servicios').css({"opacity":"1"});
                        $(this).children('.arreglarAnim').show;
                        $(this).children('.contenedor-drop').slideDown(200);

                    },
                    function() {
                        $(this).children('.arreglarAnim').hide;
                        $(this).children('.contenedor-drop').slideUp(100);
                        
                    }
                );
            };
            window.onscroll = function() {
                navsticky()
            };
            var navbar = document.getElementById("barraa");
            var sticky = navbar.offsetTop;

            function navsticky() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky").slideDown(900);
                } else {
                    navbar.classList.remove("sticky").slideUp(200);
                }
            }
            $("#campo").on('click', function(){
                window.location.href="ActividadesCampo.php"
            });
            $("#oficina").on('click', function(){
                window.location.href="ActividadesOficina.php"
            });
        });

    </script>

    <script>
        window.addEventListener('load', function() {
            $("#loader").toggleClass("loader2")

        })

        $(document).ready(function() {

        });

    </script>
