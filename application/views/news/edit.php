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
      <label  class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <input type="text" name="txt-title" class="form-control" value="<?php echo $result['title']; ?>" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="txt-description" class="form-control" ><?php echo $result['description']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" >Content</label>
      <div class="col-sm-10">
        <textarea type="text" name="txt-content"id="editor1"  class="form-control" ><?php echo $result['content']; ?></textarea>
      </div>
    </div>
      <script>
          CKEDITOR.replace( 'editor1' );
          CKFinder.setupCKEditor();
      </script>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Update</button>
      </div>
    </div>
</form> 
