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
        <input type="text" name="txt-name" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Tittle</label>
      <div class="col-sm-10">
        <input type="text" name="txt-title" class="form-control"  placeholder="Tittle">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="txt-description" class="form-control" >Description</textarea>
      </div>
    </div>
    <div class="form-group">
    	<label for="input" class="col-sm-2 control-label">Parrent ID</label>
    	<div class="col-sm-2">
    		<select  name="parrent_id" id="input" class="form-control">
          <option value="0">Root</option>
    		<?php foreach ($data1 as $key => $value) {
    			?>
    				<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
    				<?php
    		} ?>
    		</select>
    	</div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
</form> 
