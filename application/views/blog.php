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
				            <a href="' . base_url('/blog/modifyPostView/' . $url .'/'. $row->oid) . '"><span class="glyphicon glyphicon-pencil"></span></a>
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

