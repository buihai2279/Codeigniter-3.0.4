<?php if (validation_errors()!=NULL) {
  ?>
  <div class="alert alert-warning">
      <?php echo validation_errors(); ?>
  </div>
<?php 
} ?>
<br>
	<h3>Danh sach nguoif dung</h3>
	<form class="form-horizontal" method="POST" action="#">
   <div class="form-group">
      <label  class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="txt-name" value="<?php echo set_value('txt-name')?>" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Mail</label>
      <div class="col-sm-10">
        <input type="mail" name="txt-mail" class="form-control" value="<?php echo set_value('txt-mail')?>"  placeholder="Tittle">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Info contact</label>
      <div class="col-sm-10">
        <input type="info" name="txt-info" class="form-control" value="<?php echo set_value('txt-info')?>" placeholder="Facebook,Skype,Phone">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea type="text" name="txt-content" value="<?php echo set_value('txt-content')?>" class="form-control"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="ok" class="btn btn-default">Submit</button>
      </div>
    </div>
</form> 
