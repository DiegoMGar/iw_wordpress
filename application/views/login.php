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

<div class="container">
<div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="animationFade">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center" style="color: black">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" name="userLogin"
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