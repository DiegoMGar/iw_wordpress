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
            <a href="<?php echo base_url($mylang.'/dashboard/logout');?>">Salir</button></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userPerfil">
            <a href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>">Perfil</a>
        </div>
    </div>
</header>
<div class="container" style="color: #404040;">
    <div class="hidden-lg hidden-md hidden-sm col-xs-12 menuHidden">
        <p>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>">Perfil</a>
            <a class="btn btn-primary" href="<?php echo base_url($mylang.'/dashboard/logout');?>">Salir</button></a>
        </p>
    </div>
<?php
if($error){
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">';
    echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $error .'</div>';
    echo '</div>';
    //<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomainBlog">ADD</button>
}
?>
    <h1 style="margin-top: 70px;">Dashboard</h1>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu1">Blogs</a></li>
        <li><a data-toggle="tab" href="#menu2">Actividad</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h3>Blogs</h3>
            <?php foreach ($query->result() as $row) {
                $urlBlog = base_url($mylang.'/' . $row->url);
                $deleteUrl = base_url($mylang.'/' . $row->url.'/delete');
                $editUrl = base_url($mylang.'/' . $row->url.'/edit');
                echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 tarjeta'>
                <div id='accionesTarjeta' class='accionesTarjeta'>
                    <p><a href='{$editUrl}' class='editLink'
                    data-toggle='tooltip' data-placement='left' title='Editar'>
                        <span class='glyphicon glyphicon-pencil'></span>
                    </a></p>
                    <p><a href='{$deleteUrl}' class='deleteLink'
                    data-toggle='tooltip' data-placement='left' title='Eliminar'>
                        <span class='glyphicon glyphicon-trash'></span>
                    </a></p>
                </div>
                <div class='contenido' id='contenidoTarjeta'>
                    <h2>{$row->title}</h2>
                    <h4><a href='{$urlBlog}'>{$row->url}</a></h4>
                </div>
                <div class='contenido' style='background-color: red;top: -100px;left: 0;'>

                </div>
                </div>";
            }
            ?>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Actividad</h3>
            <table class="table table-striped" >
                <thead>
                <tr>
                    <th class="col-xs-9">Título</th>
                    <th class="hidden-xs col-sm-3">Fecha</th>
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
    </div>
</div>

<!-- Modal addDomainBlog-->
<div id="addDomainBlog" class="modal fade" role="dialog" style="color: black;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crea tu nuevo Dominio & BLog</h4>
      </div>
      <form class="form col-md-12 center-block" name="addDomainBlog" action="<?php echo base_url($mylang.'/dashboard/addDomain/');?>" method="post">
        <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Url" name="url" required
                  maxlength="15">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Titulo" name="titulo" required
                     maxlength="25">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="descripcion" placeholder="Descripcion"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" value="Submit" id="saveBut">Guardar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script>
    $().ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $("#openUserMenu").click(function(){
            $("#userPerfil").slideToggle();
            $("#userExit").slideToggle();
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
    });
    $('#saveBut').click(function(e) {
      if ($('input').val() === '') {
        e.preventDefault();
        alert('input is empty');
      }
    });
</script>
</body>