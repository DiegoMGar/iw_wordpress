<div class="container" style="color: black;">

	<div class="dropdown" style="float: right; margin-top:10px;">
	  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->name ?>
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a href="#">Perfil</a></li>
	    <li><a href="<?php echo base_url('/dashboard/logout');?>">Salir</a></li>
	  </ul>
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
            			<td>' . $row->url . '</td>
            			<td>' . $row->title . '</td>
            			<td>' . ($row->payplan==1 ? 'Free' : 'Pago') . '</td>
            			<td>
            				<a href="#"><span class="glyphicons glyphicons-pencil"></span></a>
            				<a href="#"><span class="glyphicons glyphicons-bin"></span></a>
            			</td>
            		</tr>';
        	}
	      ?>
	    </tbody>
  	</table>
</div>