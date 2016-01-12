<div class="container" style="color: black;">
	<form class="" name="editPost" action="<?php echo base_url('blog/modifyPost/' . $url .'/'. $post['id']);?>" method="post">
        <div class="">
            <div class="">
              <input type="text" class="form-control input-lg" placeholder="Titulo" name="titulo" value="<?php echo $post['title']; ?>" required>
            </div>
            <div class="">
              <textarea class="form-control" rows="5" name="contenido" placeholder="Contenido" required><?php echo $post['content']; ?></textarea>
            </div>
          </div>
          <div class="">
            <button class="btn btn-primary" type="submit" value="Submit" id="saveBut">Guardar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </form>
</div>