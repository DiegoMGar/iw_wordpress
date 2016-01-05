<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 3/12/15
 * Time: 8:36
 */
$url_registro = base_url('registro');
echo '<div class="fondo"></div>';
echo '<header class="mainHeader">
<div class="container">
<div class="imagenLogo">
<img class="img-responsive" id="img_logo"
src="'; echo base_url("assets/img/wordpress-logo-small.png"); echo '">
</div>
<div class="tituloLogo">
WordPress<span style="color: rgba(255, 255, 255, 0.6); ">.com</span>
</div>
<div class="login openSansRegular">
Acceder
</div>
</div>
</header>';
echo "<div class='container principal'>
<h1>Crea tu nuevo sitio web gratis</h1><p><br></p>
<h2>WordPress.com es el mejor lugar<br>para tu blog personal o tu negocio</h2>
<p><br></p>
<div class='botonNuevoSitio'>
<a class='btn btn-lg btn-primary' href='{$url_registro}'>Crear sitio web</a>
</div>
<div class='algoMas'>
<p>
¿Aún tienes dudas?
</p>
<p><span class='glyphicon glyphicon-chevron-down algoMasBajar'></span></p>
</div>
</div>";
echo '<div class="bloque">
<div class="container">
<p>WordPress.com es la forma más sencillad e crear un sitio web o un blog gratuitos.</p>
<p>Es una potente plataforma de alojamiento que crece contigo.</p>
</div>
</div>';
echo'<div class="bloqueTransparente">
<div class="container" style="padding-top: 60px;padding-bottom:60px;">

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-leaf"></span></div>
<h3>Fácil de usar</h3>
<p>WordPress.com te permite crear sitios web o blogs bonitos y pontentes.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo" style="font-size: 1.5em;padding-top: 17px;">.com</div>
<h3>Tu propio nombre de dominio</h3>
<p>Estableceremos y configuraremos tu dominio personalizado para que puedas comenzar a utilizarlo en cuestión de segundos.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo">&#60;/&#62;</div>
<h3>Motores de búsqueda y SEO de un modo sencillo</h3>
<p>WordPress.com está optimizado para SEO y para que tu sitio aparezca primero en buscadores como Google, Bing, Yahoo y otros.</p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-comment"></span></div>
<h3>La mejor ayuda</h3>
<p>Nuestros Ingenieros de la felicidad trabajan día y noche por medio de chats en directo, mensajes de correo electrónico, páginas de asistencia y foros para resolver todas las dudas que te puedan surgir.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-gift"></span></div>
<h3>Planes premium</h3>
<p>Nuestros planes premium te ofrecen más control con opciones de personalización adicionales. Todos incluyen periodos de prueba gratuitos.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-globe" ></span></div>
<h3>Millones de usuarios</h3>
<p>Cada día damos la bienvenida a 50.000 nuevos sitios. Desde sitios comerciales pequeños hasta blogs y carpetas de trabajo de artistas, pasando por grandes organizaciones de medios de comunicación, como es el caso de TIME y CNN.</p>
</div>
</div>

</div>
</div>';

echo "<div class='bloque'>
<div class='container'>
<p>El 25% de internet ve vídeos de gatitos.</p><br>
<p><a class='btn btn-lg btn-primary' href='{$url_registro}'>Crear sitio web</a></p>
</div>
</div>";
echo '<script>
$(document).ready(function(){
    $(".principal").css("height",
        ($( window ).height()>600?$( window ).height()-45:600));
    $(".algoMasBajar").click(function(){
        var contador = $( window ).height();
        var intervalVar = setInterval(function(){
            contador-=20;
            $("html, body").scrollTop($( window ).height()-contador);
            if(contador<40)
                clearInterval(intervalVar);
        }, 1);
    });
    $( window ).resize(function(){
        $(".principal").css("height",($( window ).height()>600?$( window ).height()-45:600));
        cajasHeight();
    });
    cajasHeight();
});
function cajasHeight(){
        var height = 0;
        $( ".cajaParent" ).each(function() {
            if($(this).find("p").height()+200>height)
                height = $(this).find("p").height()+200;
        });
        $( ".cajaParent" ).each(function() {
            $( this ).css("height",height);
        });
    }
</script>';