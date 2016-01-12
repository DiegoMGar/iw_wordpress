<div class="container" style="color: black;">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomainBlog">ADD</button>

	<div class="dropdown" style="float: right; margin-top:10px;">
	  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->name ?>
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a href="#">Perfil</a></li>
	    <li><a href="<?php echo base_url('/dashboard/logout');?>">Salir</a></li>
	  </ul>
	</div>

    <div style="margin-top: 20px;">
    <?php if($error)
            echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $error .'</div>'
    ?>
    </div>

	<table class="table table-striped">
    <thead>
      <tr>
        <th>Dominio</th>
        <th>Título</th>
        <th>Plan de pago</th>
        <th>Acciones</th>
      </tr>
    </thead>
	    <tbody>
	      <?php
	        foreach ($query->result() as $row) {
            	echo '<tr>
            			<td><a href=' . base_url('/blog/loader/' . $row->url) .  '>' . $row->url . '</a></td>
            			<td>' . $row->title . '</td>
            			<td>' . ($row->payplan==1 ? 'Free' : 'Pago') . '</td>
            			<td>
            				<a href='. base_url('/dashboard/modifyDomainBlogView/' . $row->url) .'><span class="glyphicon glyphicon-pencil"></span></a>
            				<a href='. base_url('/dashboard/deleteDomain/' . $row->url) .'><span class="glyphicon glyphicon-trash"></span></a>
            			</td>
            		</tr>';
        	}
	      ?>
	    </tbody>
  	</table>
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
      <form class="form col-md-12 center-block" name="addDomainBlog" action="<?php echo base_url('dashboard/addDomain/');?>" method="post">
        <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Url" name="url" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Titulo" name="titulo" required>
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
    $('#saveBut').click(function(e) {
      if ($('input').val() === '') {
        e.preventDefault();
        alert('input is empty');
      }
    });
</script>