<style>
.animationFade {
	animation: fadein 2s;
    -moz-animation: fadein 2s; /* Firefox */
    -webkit-animation: fadein 2s; /* Safari and Chrome */
    -o-animation: fadein 2s; /* Opera */
}

@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
</style>
<header class="mainHeader">
    <div class="container">
        <div class="imagenLogo">
            <a href="<?php echo base_url($mylang); ?>"><img class="img-responsive" id="img_logo"
                                                            src="<?php echo base_url("assets/img/wordpress-logo-small.png");?>">
            </a>
        </div>
        <div class="tituloLogo">
            <a href="<?php echo base_url($mylang); ?>">WordPress<span style="color: rgba(255, 255, 255, 0.6); ">.com</span></a>
        </div>
        <div class="login openSansRegular">
            <p style="cursor: pointer;">Volver</p>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 70px;color: #404040;">
<div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="animationFade">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form center-block" name="userLogin"
                action="<?php echo base_url($mylang.'/login/checkCredentials');?>" method="post">
            <div class="form-group">
              <input type="email" class="form-control input-lg" placeholder="Nombre de usuario" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Contraseña" name="password" required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">Entrar</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true" disabled>Registro</button>
      </div>  
      </div>
  </div>
  </div>
  <?php echo $this->session->flashdata('msg'); ?>
</div>
</div>