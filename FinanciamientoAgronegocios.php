 <?php
    include("include/head.php");

    include("include/menunav.php");
    ?>




     <div class="divdemainpruincipal">

		 
		 <video src="./videos/agronegocios.mp4" playsinline muted loop autoplay class="videofondo"></video>
		 <div class="recuadrodevideovista"></div>
         <div class="contenedor-carousel">
            <h1 class="titulo-slider bold">
                Financiamiento Agronegocios
            </h1>
            <h1 class="titulo-slider bold">
                Agribusiness Financing
            </h1>
            <br>

            <span class="subtitulo-slider">
            </span>
            <div class="contenedor-botones">
                <a class="boton-slider Esp" onclick="scrollfotter()">
                    Contactar
                </a><a class="boton-slider Eng" onclick="scrollfotter()">
                    Contact Us
                </a>
            </div>

         </div>

     </div>


<div class="contenido-index" id="maindivdefuncionalidadopc">
    <div id="maininfodeopcion1" class="divdeinformaciodeseccionfinalcapital">
        <div class="divde50deinfofinal Esp">
            <p class="textoderepunos1">Habilitación y Avío</p>
            <p class="textoderepunos2">Financiamiento para la adquisición de materia prima, el pago de la mano de obra o cualquier inversión relacionada con el sector primario.</p>
            <a class="boton-slider" onclick="scrollfotter()">Contactar</a>
        </div>
        <div class="divde50deinfofinal Eng">
            <p class="textoderepunos1">Qualification and Avío</p>
            <p class="textoderepunos2">Financing for the acquisition of raw materials, the payment of labor or any investment related to the primary sector.</p>
            <a class="boton-slider" onclick="scrollfotter()">Contact Us</a>
        </div>
        <div class="divde50deinfofinal2">
            <img src="./img/serv/materiasprim (2).jpg" class="imgdefinaldelandigfor">
        </div>
    </div>
    <div id="maininfodeopcion2" class="divdeinformaciodeseccionfinalcapital divdesactivado">
        <div class="divde50deinfofinal Esp">
            <p class="textoderepunos1">Refaccionarios</p>
            <p class="textoderepunos2">Financiamiento para cubrir las necesidades de adquisición y arrendamiento de activos fijos para el sector primario.</p>
            <a class="boton-slider" onclick="scrollfotter()">Contactar</a>
        </div>
        <div class="divde50deinfofinal Eng">
            <p class="textoderepunos1">Spare Parts</p>
            <p class="textoderepunos2">Financing to cover the needs of acquisition and leasing of fixed assets for the primary sector.</p>
            <a class="boton-slider" onclick="scrollfotter()">Contact Us</a>
        </div>
        <div class="divde50deinfofinal2">
            <img src="./img/serv/agronegocio.jpg" class="imgdefinaldelandigfor">
        </div>
    </div>

    <div class="submenudeatrivutosfinal iconowidthdeform50">
        <div class="muenoopcion1forfinal" onclick="cambiarinfodesubmenu(1)">
            <img id="imgdemultipleser1" src="./img/Iconos/Servicios/Sub servicios/subser_Financiamiento Empresarial1.png" class="logtipodeseccionfinalcambiar">
            <p class="titulosubsecciondinalinf Esp">Habilitación y Avío</p>
            <p class="titulosubsecciondinalinf Eng">Qualification and Avío</p>
        </div>
        <div class="muenoopcion1forfinal" onclick="cambiarinfodesubmenu(2)">
            <img id="imgdemultipleser2" src="./img/Iconos/Servicios/Sub servicios/subser_Financiamiento Empresarial2.png" class="logtipodeseccionfinalcambiar desabilitarimgdefor">
            <p class="titulosubsecciondinalinf Esp">Refaccionarios</p>
            <p class="titulosubsecciondinalinf Eng">Spare parts</p>
        </div>
    </div>

</div>


 <div class="contenido-index fonoddegriscondegradalolineal">
    <h2 class="titulodecoapitaseccionforma textoblanco Esp">Servicios Relacionados</h2>
    <h2 class="titulodecoapitaseccionforma textoblanco Eng">Servicios Services</h2>
    <div class="divmanilogos4defflex">
    <div class="divde4atrivutosconlogo" onclick="hrefFinanciamientoEmpresarial()">
            <img src="./img/Iconos/Servicios/iconos de servicios_capital 1.png" class="imglogoprocesos">
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">Financiamientos<br>Empresarial<br><br></p>
            <p class="textodenecesitoformacioncleinteproceso textoblanco Eng">Business <br>Financing<br><br></p>
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">< Más información ></p><p class="textodenecesitoformacioncleinteproceso textoblanco Eng">< More information ></p>
        </div>
        <div class="divde4atrivutosconlogo" onclick="hrefFinanciamientoConstructores()">
            <img src="./img/Iconos/Servicios/iconos de servicios_capital 2.png" class="imglogoprocesos">
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">Financiamiento<br>Constructores<br><br></p>
            <p class="textodenecesitoformacioncleinteproceso textoblanco Eng">Builders<br>Financing<br><br></p>
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">< Más información ></p><p class="textodenecesitoformacioncleinteproceso textoblanco Eng">< More information ></p>
        </div>
        <div class="divde4atrivutosconlogo" onclick="hrefFinanciamientoExportadores()">
            <img src="./img/Iconos/Servicios/iconos de servicios_capital 3.png" class="imglogoprocesos">
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">Financiamiento<br>Exportadores<br><br></p>
            <p class="textodenecesitoformacioncleinteproceso textoblanco Eng">Exporters<br>Financing<br><br></p>
            
            <p class="textodenecesitoformacioncleinteproceso textoblanco Esp">< Más información ></p><p class="textodenecesitoformacioncleinteproceso textoblanco Eng">< More information ></p>
        </div>
    </div>
     
 </div>


<script>
    function cambiarinfodesubmenu(id){
        for(var contador=1;contador<=6;contador++){
            $("#imgdemultipleser"+contador).addClass("desabilitarimgdefor");
            $("#maininfodeopcion"+contador).addClass("divdesactivado");
        } 
        $("#imgdemultipleser"+id).removeClass("desabilitarimgdefor");
        $("#maininfodeopcion"+id).removeClass("divdesactivado");
        $('html, body').animate({ scrollTop: $('#maindivdefuncionalidadopc').offset().top}, 1000);
    }
</script>

<?php
    include("include/footer.php");
?>