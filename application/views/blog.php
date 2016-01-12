<div class="container" style="color: black;">
	<?php
        foreach ($post->result() as $row) {
        	echo '	
        <div class="well">
			<div class="media">
				<a class="pull-left" href="#">
		    		<img class="media-object" src="http://lorempixel.com/150/150/sports">
				</a>
				<div class="media-body">
					<h4 class="media-heading">' . $row->title . '</h4>
        			<p class="text-right"> SomeBody </p>
        			<p class="text-right">' . $row->content . '</p>
        			<ul class="list-inline list-unstyled">
	        			<li><span><i class="glyphicon glyphicon-calendar"></i>'. $row->date . '</span></li>
				        <li>|</li>
				        <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
				        <li>|</li>
				        <li>
	        			    <span class="glyphicon glyphicon-star"></span>
	                        <span class="glyphicon glyphicon-star"></span>
	                        <span class="glyphicon glyphicon-star"></span>
	                        <span class="glyphicon glyphicon-star"></span>
	                        <span class="glyphicon glyphicon-star-empty"></span>
				        </li>
				        <li>|</li>' ;
			if($userOK == true)
			{
				echo	'<li>
				         	<a href="' . base_url('/blog/deletePost/' . $url .'/'. $row->oid) . '"><span class="glyphicon glyphicon-trash"></span></a>
				            <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modifyPost"></span>
				            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/
				              <span><i class="fa fa-facebook-square"></i></span>
				              <span><i class="fa fa-twitter-square"></i></span>
				              <span><i class="fa fa-google-plus-square"></i></span>-->
				        </li>';
			}
			echo	'</ul>
				</div>
			</div>
		</div>';
    	}
	?>
</div>

<!-- Modal addPost-->
<div id="modifyPost" class="modal fade" role="dialog" style="color: black;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifica Post!</h4>
      </div>
      <form class="form col-md-12 center-block" name="modifyPost" action="<?php echo base_url('/blog/modifyPost/' . $url .'/' . $blogId);?>" method="post">
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

