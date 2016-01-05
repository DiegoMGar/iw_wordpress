<div class="container" style="color: black">
	<?php echo $this->session->username ?>
	<br>
	<?php echo $this->session->email ?>
	<br>
	<?php echo $this->session->logged_in ?>
</div>

<a href="<?php echo site_url('/dashboard/logout');?>"><button class="btn btn-primary btn-block">Salir</button></a>s