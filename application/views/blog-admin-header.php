<div class="container" style="color: black;">
	<div class="dropdown" style="float: right; margin-top:10px;">
	  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->session->name ?>
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a href="#">Perfil</a></li>
	    <li><a href="<?php echo base_url('/dashboard/logout');?>">Salir</a></li>
	  </ul>
	</div>
</div>