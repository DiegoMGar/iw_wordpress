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
        <?php if(empty($userOK)) goto noAdmin;?>
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
    <?php noAdmin: ?>
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
<div class="container" style="color: #404040;text-align: center;">
    <div class="hidden-lg hidden-md hidden-sm col-xs-12 menuHidden">
        <p>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard'); ?>"><?php echo $this->lang->line('titulo_dashboard'); ?></a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>"><?php echo $this->lang->line('header_profile'); ?></a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard/logout');?>"><?php echo $this->lang->line('header_logout'); ?></button></a>
        </p>
    </div>
    <h1 style="margin-top: 110px;"><?php echo $url; ?></h1>
    <h2><?php echo $blogData['title']; ?></h2>
    <div class="row" style="margin: 50px 0 0 0;">
    <div class="col-xs-12 col-sm-3 col-lg-2">
        <h3><?php echo $this->lang->line('description'); ?></h3>
        <?php echo $blogData['description'];
        if(!empty($userOK)){
            echo '<p style="margin-top: 20px;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomainBlog">
                    '.$this->lang->line('new_post').'
                </button></p>';
        }
        ?>
    </div>
    <div class="col-xs-12 col-sm-9 col-lg-9 col-lg-offset-1"
         style="text-align: left;margin-top: 20px;">
	<?php
        foreach ($post->result() as $row) { ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-left: 5%;"><?php echo $row->title; ?></h3>
            </div>
            <div class="panel-body" style="text-align:left;padding-top: 25px;">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://lorempixel.com/150/150/sports">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $this->lang->line('post_author'); ?>: <?php echo $this->session->name;?></h4>
                        <p style="text-align: justify;"><?php echo $row->content;?></p>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12">
                        <ul class="list-inline list-unstyled">
                            <li><span><i class="glyphicon glyphicon-calendar"></i>
                            <?php $fecha = new DateTime($row->date);
                            echo $fecha->format('H:i d-m-Y');?>
                            </span></li>
                            <li>|</li>
                            <span><i class="glyphicon glyphicon-comment"></i>
                                2 <?php echo $this->lang->line('comments'); ?></span>
                            <li>|</li>
                            <li>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </li>
                            <li>|</li>
                            <?php
                            if(!empty($userOK)) //es el propietario del blog
                            {
                            $deleteUrl = base_url($mylang.'/'.$blogData['url'].'/post/'.$row->oid.'/delete');
                            $editUrl = base_url($mylang.'/'.$blogData['url'].'/post/'.$row->oid);
                            ?>
                            <li>
                                <a href='<?php echo $editUrl;?>' class='editLink'
                                   data-toggle='tooltip' data-placement='top' title='<?php echo $this->lang->line('post_edit'); ?>'>
                                    <span class='glyphicon glyphicon-pencil'></span>
                                </a>
                                <a href='<?php echo $deleteUrl;?>' class='deleteLink'
                                   data-toggle='tooltip' data-placement='top' title='<?php echo $this->lang->line('post_delete'); ?>'>
                                    <span class='glyphicon glyphicon-trash'></span>
                                </a>
				        </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
		    </div>
        </div>

    <?php
        }
	?>
    </div>
    </div>
</div>
<!-- Modal addDomainBlog-->
<form class="form col-md-12 center-block" name="addDomainBlog"
      action="<?php echo base_url($mylang.'/'.$blogData['url'].'/post/'.$blogData['blogId'].'/create');?>" method="post">
<div id="addDomainBlog" class="modal fade" role="dialog" style="margin-top: 70px;color: #222222;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('blog_model_title'); ?></h4>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="<?php echo $this->lang->line('blog_model_post_title'); ?>" name="titulo" required
                               maxlength="25">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="contenido" placeholder="<?php echo $this->lang->line('blog_model_post_content'); ?>"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" value="Submit" id="saveBut"><?php echo $this->lang->line('blog_model_post_save'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('blog_model_post_close'); ?></button>
                </div>
        </div>
    </div>
</div>
</form>
<script>
    $().ready(function(){
        $('#saveBut').click(function(e) {
            if ($('input').val() === '') {
                e.preventDefault();
                alert('input is empty');
            }
        });
    });
</script>

