<div class="container" style="color: black;">

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost">ADD</button>

	<div class="dropdown" style="float: right; margin-top:10px;">
	  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->name ?>
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a href="#">Perfil</a></li>
	    <li><a href="<?php echo base_url('/dashboard');?>">DashBoard</a></li>
	    <li><a href="<?php echo base_url('/dashboard/logout');?>">Salir</a></li>
	  </ul>
	</div>
</div>

<!-- Modal addPost-->
<div id="addPost" class="modal fade" role="dialog" style="color: black;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crea nuevo Post!</h4>
      </div>
      <form class="form col-md-12 center-block" name="addPost" action="<?php echo base_url('/blog/addPost/' . $url .'/' . $blogId);?>" method="post">
      	<div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Titulo" name="titulo" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" id="contenido" name="contenido" placeholder="Contenido" required></textarea>
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
	$('#saveBut').click(function(e) {
	  if ($('input').val() === '' && $('textarea').val() === '') {
	    e.preventDefault();
	    alert('input is empty');
	  }
	});
</script>