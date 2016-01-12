<div class="container" style="color: black;">
	<form class="" name="editPost" action="<?php echo base_url('dashboard/modifyDomainBlog/' . $url .'/'. $domainBlog['blogID']);?>" method="post">
        <div class="">
            <div class="">
              <input type="text" class="form-control input-lg" placeholder="Url" name="url" value="<?php echo $domainBlog['domainURL']; ?>" required>
            </div>
            <div class="">
              <input type="text" class="form-control input-lg" placeholder="Titulo" name="titulo" value="<?php echo $domainBlog['title']; ?>" required>
            </div>
            <div class="">
              <input type="text" class="form-control input-lg" placeholder="Descripcion" name="descripcion" value="<?php echo $domainBlog['description']; ?>" required>
            </div>
          </div>
          <div class="">
            <button class="btn btn-primary" type="submit" value="Submit" id="saveBut">Guardar</button>
            <a class="btn btn-primary" href="<?php echo base_url('dashboard'); ?>">Close</a>
          </div>
    </form>
</div>