<body style="background: #f5f5f5;">
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
            <p style="cursor: pointer;font-size: 1.1em;"
               id="openUserMenu"
                ><?php echo $this->session->name ?>
                <span style="font-size: 0.8em;" class="glyphicon glyphicon-menu-down hidden-xs"></span>
            </p>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;border-right: 1px solid #f0f0f0;"
             id="userExit">
            <a href="<?php echo base_url($mylang.'/logout');?>">Salir</button></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userPerfil">
            <a href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>">Perfil</a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userDash">
            <a href="<?php echo base_url($mylang.'/dashboard'); ?>">Dashboard</a>
        </div>
    </div>
    <script>
        $().ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $("#openUserMenu").click(function(){
                $("#userPerfil").slideToggle();
                $("#userExit").slideToggle();
                $("#userDash").slideToggle();
                var menuDownUp = $(this).find("span");
                if($(menuDownUp).hasClass("glyphicon-menu-down")){
                    $(menuDownUp).removeClass("glyphicon-menu-down");
                    $(menuDownUp).addClass("glyphicon-menu-up");
                }else{
                    $(menuDownUp).removeClass("glyphicon-menu-up");
                    $(menuDownUp).addClass("glyphicon-menu-down");
                }
            });
        });
    </script>
</header>
<div class="container" style="margin-top: 70px;color: #404040;">
    <div class="hidden-lg hidden-md hidden-sm col-xs-12 menuHidden">
        <p>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard'); ?>">Dashboard</a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>">Perfil</a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard/logout');?>">Salir</button></a>
        </p>
    </div>
    <div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="animationFade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center">Editando post</h4>
                </div>
                <div class="modal-body">
                    <form class="form center-block" name="userLogin"
                          action="<?php echo base_url($mylang.'/'.$url.'/edit/'.$domainBlog['blogID']);?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg"
                                   placeholder="Url" name="url" value="<?php echo $domainBlog['domainURL']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="Titulo"
                                   name="titulo" value="<?php echo $domainBlog['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="descripcion"
                                      placeholder="Descripcion" required><?php echo $domainBlog['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="<?php echo base_url($mylang.'/'.$url);?>"
                           data-dismiss="modal" aria-hidden="true" >Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>