<body style="background: #f5f5f5;">
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
            <a href="<?php echo base_url($mylang);?>"><?php echo $this->lang->line('volver'); ?></button></a>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 70px;color: #404040;">
<div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="animationFade">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center"><?php echo $this->lang->line('login'); ?></h1>
      </div>
      <div class="modal-body">
          <form class="form center-block" name="userLogin"
                action="<?php echo base_url($mylang.'/login/checkCredentials');?>" method="post">
            <div class="form-group">
              <input type="email" class="form-control input-lg" placeholder="<?php echo $this->lang->line('email'); ?>"
                     name="email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="<?php echo $this->lang->line('password'); ?>"
                     name="password" required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                  <?php echo $this->lang->line('entrar'); ?></button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <a class="btn btn-default" href="<?php echo base_url($mylang.'/registro'); ?>" data-dismiss="modal" aria-hidden="true" >
              <?php echo $this->lang->line('registro'); ?></a>
      </div>  
      </div>
  </div>
  </div>
  <?php echo $this->session->flashdata('msg'); ?>
</div>
</div>