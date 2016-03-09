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
      <label  class="col-sm-2 control-label">Caption</label>
      <div class="col-sm-10">
        <input type="text" name="caption" class="form-control" placeholder="Caption">
      </div>
    </div>
   <div class="form-group">
      <label  class="col-sm-2 control-label">Link</label>
      <div class="col-sm-10">
        <input type="text" name="link" class="form-control" placeholder="Link">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Images</label>
      <div class="col-sm-10">
        <input type="text" name="img" class="form-control">
      </div>
    </div>
    <div class="form-group">
    	<label for="input" class="col-sm-2 control-label">Status</label>
    	<div class="col-sm-2">
    		<select  name="status" id="input" class="form-control">
          <option value="0">Protected</option>
    		  <option value="1" selected>Public</option>
    		</select>
    	</div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="ok" class="btn btn-default">Add</button>
      </div>
    </div>
</form> 
