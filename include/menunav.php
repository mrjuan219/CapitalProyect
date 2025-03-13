
	
<div class="loader"  id="preloader">
  <div id="loader"></div>
</div>
	  
	  <script>
  function timerloaderborrasr(){
    $("#preloader").css("display", "none");
  }
		  
		  setTimeout(timerloaderborrasr, 3000);
</script>
	
  	  <table width="100%">
  	<tr>
  		<td width="100%">
  			<div id="navbar" style="z-index: 99999;">
<table id="menudesk" style="border-collapse: collapse; width:100%;">
<tr>
<td id="logodesk" width="20%">
<center>
<a href="https://capitalflowconsulting.com/">
	<img id="lotipodefelx" src="img/logo/LogoFinalCF.png" class="imglogotipomeun"/>
</a>

</center>
</td>
<td id="redesmoviles" width="30%" valign="middle" style=" display:none;text-align:right; ">
<table style="border-collapse: collapse;" width="65%;">
<tr>
<td >
<img onclick="Cambiaridioma('Esp')" src="img/logo/mexico.png" width="100%;"/>
</td>
<td >
<img onclick="Cambiaridioma('Eng')" src="img/logo/usa.png" width="100%;"/>
</td>
</tr>
</table>



</td>
<td id="menu">
<ul class="slimmenu">
    <li>
    	<a href="https://capitalflowconsulting.com/" id="menu1">
			<span class="Esp">Inicio</span>
			<span class="Eng">Home</span>
		</a>
    </li>
    <li>
		<a href="./Nosotros" id="menu2" >
			<span class="Esp">Nuestro Equipo</span>
			<span class="Eng">Our Team</span>
		</a>
    </li>
    <li>
        <a id="menu3">
			<span class="Esp">Nuestros Servicios</span>
			<span class="Eng">Our Services</span>
		</a>
        <ul>
            
               
            <li>
                <a href="./ServiciosEmpresariales">
					
					<span class="Esp">Servicios Empresariales</span>
					<span class="Eng">Business Services</span>
				</a>
            </li>
          
            <li>
                <a href="./ServiciosPatrimoniales">
					<span class="Esp">Servicios Patrimoniales</span>
					<span class="Eng">Wealth Services</span>
				</a>
                
            </li>
        </ul>
    </li>
        <li>
        <a id="menu4">
			<span class="Esp">Inmobiliario</span>
			<span class="Eng">Real Estate</span>
		</a>
        <ul>
            
               
            <li>
                <a href="https://capitalflowconsulting.com/inmobiliario/inversiones">
					
					<span class="Esp">Inversiones inmobiliarias</span>
					<span class="Eng">Investment Property</span>
				</a>
            </li>
          
            <li>
                <a href="https://capitalflowconsulting.com/inmobiliario/inmuebles">
					<span class="Esp">Inmuebles</span>
					<span class="Eng">Estate</span>
				</a>
                
            </li>
        </ul>
    </li>
    <li>
		<a href="./Contacto" id="menu5">
			<span class="Esp">Contáctanos</span>
			<span class="Eng">Contact us</span>
			
		</a>
	</li>
   
    
    
</ul>

</td>
<td id="redesdesk" width="15%" valign="middle" style="text-align:right; ">
<table style="border-collapse: collapse;" width="65%;">
<tr>
<td valign="middle" style=" width: 33%;">
<div style="width: 80%; padding-top: 20%; padding-bottom: 20%;">	
<img onclick="Cambiaridioma('Esp')" src="img/logo/mexico.png" width="100%;"/>
</div>
</td>
<td valign="middle" style=" width: 33%;">
<div style="width: 80%; padding-top: 22%; padding-bottom: 22%;">	
<img onclick="Cambiaridioma('Eng')" src="img/logo/usa.png" width="100%;"/>
</div>
</td>
</tr>
</table>




</td>
</tr>
</table>
</div>
  		</td>
  	</tr>
  </table>
    
<div class="divespacioparamenublanco"></div>



<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
   		
	  document.getElementById("lotipodefelx").classList.remove("imglogotipomeun");
		document.getElementById("lotipodefelx").classList.add("imgscrollmenuimg");

		document.getElementById("menudesk").classList.add("menublancoscroll");

		document.getElementById("menu1").classList.add("fuentesblancoparascroll");
		document.getElementById("menu2").classList.add("fuentesblancoparascroll");
		document.getElementById("menu3").classList.add("fuentesblancoparascroll");
		document.getElementById("menu4").classList.add("fuentesblancoparascroll");
    	document.getElementById("menu5").classList.add("fuentesblancoparascroll");


		
  }
	
	if (window.pageYOffset <= sticky){
	
		document.getElementById("menudesk").classList.remove("menublancoscroll");

		document.getElementById("menu1").classList.remove("fuentesblancoparascroll");
		document.getElementById("menu2").classList.remove("fuentesblancoparascroll");
		document.getElementById("menu3").classList.remove("fuentesblancoparascroll");
		document.getElementById("menu4").classList.remove("fuentesblancoparascroll");
		document.getElementById("menu5").classList.remove("fuentesblancoparascroll");


		document.getElementById("lotipodefelx").classList.remove("imgscrollmenuimg");
		document.getElementById("lotipodefelx").classList.add("imglogotipomeun");


		
	 
  }
}


$('.slimmenu').slimmenu(
{
    resizeWidth: '940',
    collapserTitle: '',
    animSpeed:'medium',
    indentChildren: true,
    childrenIndenter: '&raquo;'
});
	
var URLactual = window.location;
if(URLactual =="https://www.flexambiental.com/" || URLactual =="https://flexambiental.com/" ){
	document.getElementById("menu1").style.color="#fff";
	document.getElementById("menu1").style.background="#A51D1B";
}
if(URLactual =="https://www.flexambiental.com/Nosotros" || URLactual =="https://flexambiental.com/Nosotros"){
	document.getElementById("menu2").style.color="#fff";
	document.getElementById("menu2").style.background="#A51D1B";
}
if(URLactual =="https://www.flexambiental.com/Servicios" || URLactual =="https://flexambiental.com/Servicios"){
	document.getElementById("menu3").style.color="#fff";
	document.getElementById("menu3").style.background="#A51D1B";
}
if(URLactual =="https://www.flexambiental.com/ServiciosdeGabinete" || URLactual =="https://flexambiental.com/ServiciosdeGabinete"){
	document.getElementById("menu3").style.color="#fff";
	document.getElementById("menu3").style.background="#A51D1B";
}	
	
var cadena = ""+URLactual;
var urlvali = cadena.indexOf("ServiciosdeGabinete") > -1;
if(urlvali == true ){
	document.getElementById("menu3").style.color="#fff";
	document.getElementById("menu3").style.background="#A51D1B";
}
	
if(URLactual =="https://www.flexambiental.com/ActividadesCampo" || URLactual =="https://flexambiental.com/ActividadesCampo"){
	document.getElementById("menu3").style.color="#fff";
	document.getElementById("menu3").style.background="#A51D1B";
}	

var cadena = ""+URLactual;
var urlvali = cadena.indexOf("ActividadesCampo") > -1;
if(urlvali == true ){
	document.getElementById("menu3").style.color="#fff";
	document.getElementById("menu3").style.background="#A51D1B";
}
	
	
if(URLactual =="https://www.flexambiental.com/Contacto" || URLactual =="https://flexambiental.com/Contacto"){
	document.getElementById("menu4").style.color="#fff";
	document.getElementById("menu4").style.background="#A51D1B";
}	
</script>