<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 5/01/16
 * Time: 9:46
 */ ?>
<body style="background: #f5f5f5;">
<header class="mainHeader">
    <div class="container">
        <div class="imagenLogo">
            <img class="img-responsive" id="img_logo"
                 src="<?php echo base_url("assets/img/wordpress-logo-small.png");?>">
        </div>
        <div class="tituloLogo">
            WordPress<span style="color: rgba(255, 255, 255, 0.6); ">.com</span>
        </div>
        <div class="login openSansRegular">
            <a href="<?php echo base_url($mylang.'/login'); ?>">Acceder</a>
        </div>
        <div class="login openSansRegular">
            <a href="<?php echo base_url($mylang); ?>">Volver</a>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 100px;color: #404040;max-width: 600px;">
<?php if(empty($completo)){ ?>
    <form action="<?php echo base_url($mylang.'/registro/action'); ?>"
          method="post" style="text-align: center;">
        <div class="form-group">
            <h3>Busquemos un dominio</h3>
            <h4 style="color: #87a6bc;margin-top: 25px;margin-bottom: 35px;">Elige un dominio personalizado</h4>
            <input type="text" placeholder="example.com" class="form-control" id="dominio" name="dominio" />
            <h4 style="color: #87a6bc;margin-top: 45px;margin-bottom: 35px;">Pon un título al blog que estás creando</h4>
            <input type="text" placeholder="Título de mi blog" class="form-control" id="titulo" name="titulo" />
        </div>
        <hr style="margin-top: 50px;margin-bottom: 50px;">
        <div class="form-group">
            <h3>Establece tus credenciales</h3>
            <h4 style="color: #87a6bc;margin-top: 25px;margin-bottom: 35px;">Introduce tu email y tu contraseña</h4>
            <input style="margin-bottom: 20px;" type="email" placeholder="iw@example.com" class="form-control" id="usuario" name="usuario" />
            <input type="password" placeholder="password" class="form-control" id="password" name="password" />
        </div>
        <div class="form-group" style="margin-top: 50px;margin-bottom: 20px;">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">Gratis</button>
                <button type="button" class="btn btn-default">Premium</button>
                <button type="button" class="btn btn-default">Negocios</button>
            </div>
        </div>
        <div class="form-group" style="margin-top: 50px;margin-bottom: 20px;">
            <input class="btn btn-primary" type="submit" value="Aceptar" />
        </div>
    </form>

<?php }else if($completo===TRUE){ //El resgistro ha sido correcto ?>
    <div class="alert alert-success"><strong>Éxito:</strong>
        El registro se ha realizado correctamente.</div>
<?php }else{ //Ha habido algún error y lo voy a imprimir ?>
    <div class="alert alert-danger"><strong>Error:</strong>
        <?php echo $completo; ?>
    </div>
<?php } ?>
</div>
</body>