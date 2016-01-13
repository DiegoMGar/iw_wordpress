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
            <a href="<?php echo base_url($mylang.'/logout');?>"><?php echo $this->lang->line('header_logout'); ?></button></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userPerfil">
            <a href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>"><?php echo $this->lang->line('header_profile'); ?></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userDash">
            <a href="<?php echo base_url($mylang.'/dashboard'); ?>"><?php echo $this->lang->line('titulo_dashboard'); ?></a>
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
<div class="container" style="color: #404040;">
    <div class="row">
        <div class="hidden-lg hidden-md hidden-sm col-xs-12 menuHidden">
            <p>
                <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard'); ?>"><?php echo $this->lang->line('titulo_dashboard'); ?></a>
                <a class="btn btn-primary" href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>"><?php echo $this->lang->line('header_profile'); ?></a>
                <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard/logout');?>"><?php echo $this->lang->line('header_logout'); ?></button></a>
            </p>
        </div>
    </div>
    <div class="row hidden-xs" style="margin-top: 70px;"></div>
    <div class="row">
        <div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="animationFade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center"><?php echo $this->lang->line('editing_model_title'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form center-block" name="userLogin"
                              action="<?php echo base_url($mylang.'/'.$url.'/edit/'.$domainBlog['blogID']);?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg"
                                       placeholder="<?php echo $this->lang->line('dominio'); ?>" name="url" value="<?php echo $domainBlog['domainURL']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="<?php echo $this->lang->line('actions_model__blog_title'); ?>"
                                       name="titulo" value="<?php echo $domainBlog['title']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="descripcion"
                                          placeholder="<?php echo $this->lang->line('actions_model__blog_descr'); ?>" required><?php echo $domainBlog['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><?php echo $this->lang->line('actions_model__blog_save'); ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <a class="btn btn-default" href="<?php echo base_url($mylang.'/dashboard');?>"
                               data-dismiss="modal" aria-hidden="true" ><?php echo $this->lang->line('actions_model__blog_close'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>