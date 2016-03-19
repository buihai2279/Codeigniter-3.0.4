<?php if (validation_errors()!=NULL) {
  ?>
  <div class="alert alert-warning">
      <?php echo validation_errors(); ?>
  </div>
<?php 
} ?>
<br>
<h3><?php echo(isset($title)) ? $title : '' ; ?></h3>
	<form class="form-horizontal" method="POST" action="#">
    <div class="form-group">
      <label class="col-sm-2 control-label">Mail</label>
      <div class="col-sm-10">
        <input type="mail" name="txt-mail" class="form-control" value="<?php echo$result->mail?>"  placeholder="Tittle">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">BBC</label>
      <div class="col-sm-10">
        <input type="text" name="txt-bbc" class="form-control" value="<?php echo set_value('txt-bbc')?>" placeholder="Facebook,Skype,Phone">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
      <textarea type="text" name="txt-content"id="editor1"  class="form-control" >
      <?php echo set_value('txt-content')?>
      </textarea>
      <script>
      CKEDITOR.replace( 'editor1' );
      CKFinder.setupCKEditor();
      </script>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="ok" class="btn btn-default">Submit</button>
      </div>
    </div>
</form> 
