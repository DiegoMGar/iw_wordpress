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
             id="userBlog">
            <a data-toggle="modal" data-target="#addDomainBlog">
                <?php echo $this->lang->line('actions_button'); ?></a>
        </div>
    </div>
</header>
<div class="container" style="color: #404040;">
    <div class="hidden-lg hidden-md hidden-sm col-xs-12 menuHidden">
        <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomainBlog">
                <?php echo $this->lang->line('actions_button'); ?></button>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>">
                <?php echo $this->lang->line('header_profile'); ?></a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard/logout');?>">
                <?php echo $this->lang->line('header_logout'); ?></button></a>
    </div>
    <h1 style="margin-top: 70px;"><?php echo $this->lang->line('titulo_dashboard'); ?></h1>
    <?php
    if($error){
        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">';
        echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $error .'</div>';
        echo '</div>';
    }
    ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu1">Blogs</a></li>
        <li><a data-toggle="tab" href="#menu2"><?php echo $this->lang->line('nav_activity'); ?></a></li>
        <li><a data-toggle="tab" href="#menu3"><?php echo $this->lang->line('nav_search'); ?></a></li>
    </ul>
    <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h3>Blogs</h3>
            <?php foreach ($query->result() as $row) {
                $urlBlog = base_url($mylang.'/' . $row->url);
                $deleteUrl = base_url($mylang.'/' . $row->url.'/delete');
                $editUrl = base_url($mylang.'/' . $row->url.'/edit');
                $editTitle = $this->lang->line('blogs_edit');
                $deleteTitle = $this->lang->line('blogs_delete');
                echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 tarjeta'>
                <div id='accionesTarjeta' class='accionesTarjeta'>
                    <p><a href='{$editUrl}' class='editLink'
                    data-toggle='tooltip' data-placement='left' title='$editTitle'>
                        <span class='glyphicon glyphicon-pencil'></span>
                    </a></p>
                    <p><a href='{$deleteUrl}' class='deleteLink'
                    data-toggle='tooltip' data-placement='left' title='$deleteTitle'>
                        <span class='glyphicon glyphicon-trash'></span>
                    </a></p>
                </div>
                <div class='contenido' id='contenidoTarjeta'>
                    <h4><a href='{$urlBlog}'>{$row->url}</a></h4>
                    <h2>{$row->title}</h2>
                </div>
                <div class='contenido' style='background-color: red;top: -100px;left: 0;'>

                </div>
                </div>";
            }
            ?>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3><?php echo $this->lang->line('nav_Activity'); ?></h3>
            <table class="table table-striped" >
                <thead>
                <tr>
                    <th class="col-xs-9"><?php echo $this->lang->line('activity_title'); ?></th>
                    <th class="hidden-xs col-sm-3"><?php echo $this->lang->line('activity_date'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($historial->result() as $row) { ?>
                    <tr>
                        <td class="col-xs-9"><?php echo $row->title; ?></td>
                        <td class="hidden-xs col-sm-3"><?php
                            $fecha = new DateTime($row->date);
                            echo $fecha->format('H:i d-m-Y');
                            ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3 style="margin-bottom: 20px;"><?php echo $this->lang->line('nav_search'); ?></h3>
            <div class="col-xs-12" style="margin-bottom: 20px;">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><?php echo $this->lang->line('search'); ?></span>
                    <input type="text" class="form-control" id="searchInput"
                           placeholder="<?php echo $this->lang->line('dominio'); ?>"
                           aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-xs-12" id="contenedorBusqueda">

            </div>
        </div>
    </div>
</div>
<!-- Modal addDomainBlog-->
<form class="form col-md-12 center-block" name="addDomainBlog"
      action="<?php echo base_url($mylang.'/blog/create/');?>" method="post">
<div id="addDomainBlog" class="modal fade" role="dialog" style="margin-top: 70px;color: #222222;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $this->lang->line('actions_model_title'); ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="<?php echo $this->lang->line('dominio'); ?>" name="url" required
                  maxlength="50">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="<?php echo $this->lang->line('actions_model__blog_title'); ?>" name="titulo" required
                     maxlength="120">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="descripcion" placeholder="<?php echo $this->lang->line('actions_model__blog_descr'); ?>"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" value="Submit" id="saveBut"><?php echo $this->lang->line('actions_model__blog_save'); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('actions_model__blog_close'); ?></button>
        </div>
    </div>
  </div>
</div>
</form>
<script>
    $().ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $("#openUserMenu").click(function(){
            $("#userPerfil").slideToggle();
            $("#userExit").slideToggle();
            $("#userBlog").slideToggle();
            var menuDownUp = $(this).find("span");
            if($(menuDownUp).hasClass("glyphicon-menu-down")){
                $(menuDownUp).removeClass("glyphicon-menu-down");
                $(menuDownUp).addClass("glyphicon-menu-up");
            }else{
                $(menuDownUp).removeClass("glyphicon-menu-up");
                $(menuDownUp).addClass("glyphicon-menu-down");
            }
        });
        $(".tarjeta").fadeIn("slow");
        $(".tarjeta").hover(function(){
            var divBotones =$(this).find("#accionesTarjeta");
            $(divBotones).slideDown();
        },function(){
            var divBotones =$(this).find("#accionesTarjeta");
            $(divBotones).slideUp();
        });
        var search = '';
        $("#searchInput").on("keyup", function() {
            search = $( this ).val();
            console.log(search);
            var request = $.ajax({
                url: "<?php echo base_url($mylang.'/search');?>",
                method: "POST",
                data: { query : search },
                dataType: "html"
            });

            request.done(function( msg ) {
                console.log("Ajax correcto.");
                $( "#contenedorBusqueda" ).html( msg );
                $( "#contenedorBusqueda" ).find('.tarjeta').fadeIn('slow');
            });

            request.fail(function( jqXHR, textStatus ) {
                console.log("Error en el ajax.");
                <?php $mensajeError = "<div style='display: none;' class='alert alert-warning'><strong>{$this->lang->line('strongWAJAX')}</strong> {$this->lang->line('msgWAJAX')}</div>";?>
                $( "#contenedorBusqueda" ).html("<?php echo $mensajeError;?>");
                $( "#contenedorBusqueda" ).find('div').fadeIn('slow');
            });
        });
    });
</script>
</body>