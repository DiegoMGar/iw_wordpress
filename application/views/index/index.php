<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 3/12/15
 * Time: 8:36
 */
$url_registro = base_url($mylang.'/registro');
$url_login = base_url($mylang.'/login');
echo '<div class="fondo"></div>';
echo '<header class="mainHeader">
<div class="container">
<div class="imagenLogo">
<img class="img-responsive" id="img_logo"
src="';
echo base_url("assets/img/wordpress-logo-small.png");
echo '">
</div>
<div class="tituloLogo">
WordPress<span style="color: rgba(255, 255, 255, 0.6); ">.com</span>
</div>
<div class="login openSansRegular">
<a href="'; echo $url_login; echo '">'; echo $this->lang->line('login'); echo '</a>
</div>
</div>
</header>';
echo "<div class='container principal'>
<h1>{$this->lang->line('titulo')}</h1><p><br></p>
<h2>{$this->lang->line('titulo2')}</h2>
<p><br></p>
<div class='botonNuevoSitio'>
<a class='btn btn-lg btn-primary' href='{$url_registro}'>{$this->lang->line('registro')}</a>
</div>
<div class='algoMas'>
<p>
{$this->lang->line('dudas')}
</p>
<p><span class='glyphicon glyphicon-chevron-down algoMasBajar'></span></p>
</div>
</div>";
echo '<div class="bloque">
<div class="container">
<p>'; echo $this->lang->line('explicacion1'); echo '</p>
<p>'; echo $this->lang->line('explicacion2'); echo '</p>
</div>
</div>';
echo'<div class="bloqueTransparente">
<div class="container" style="padding-top: 60px;padding-bottom:60px;">

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-leaf"></span></div>
<h3>'; echo $this->lang->line('bloque1_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque1_2'); echo '</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo" style="font-size: 1.5em;padding-top: 17px;">.com</div>
<h3>'; echo $this->lang->line('bloque2_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque2_2'); echo '</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo">&#60;/&#62;</div>
<h3>'; echo $this->lang->line('bloque3_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque3_2'); echo '</p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-comment"></span></div>
<h3>'; echo $this->lang->line('bloque4_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque4_2'); echo '</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-gift"></span></div>
<h3>'; echo $this->lang->line('bloque5_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque5_2'); echo '</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cajaParent">
<div class="caja">
<div class="circulo"><span class="glyphicon glyphicon-globe" ></span></div>
<h3>'; echo $this->lang->line('bloque6_1'); echo '</h3>
<p>'; echo $this->lang->line('bloque6_2'); echo '</p>
</div>
</div>

</div>
</div>';

echo "<div class='bloque'>
<div class='container'>
<p>{$this->lang->line('despedida')}</p><br>
<p><a class='btn btn-lg btn-primary' href='{$url_registro}'>{$this->lang->line('registro')}</a></p>
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