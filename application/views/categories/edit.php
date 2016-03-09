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
      <label  class="col-sm-2 control-label">ID</label>
      <div class="col-sm-10">
        <input type="text" value="<?php echo $result['id']; ?>" class="form-control" disabled>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="txt-name" value="<?php echo $result['name']; ?>" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <input type="text" name="txt-title" class="form-control" value="<?php echo $result['title']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="txt-description" class="form-control" ><?php echo $result['description']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
    	<label for="input" class="col-sm-2 control-label">Parrent</label>
    	<div class="col-sm-2">
    		<select  name="parrent_id" id="input" class="form-control">
          <option value="0">Root</option>
    		<?php foreach ($list_category as $key => $value) {
    			?>
          <?php if ($value['id']==$result['parrent_id']) { ?>
            <option value="<?php echo $value['id'] ?>" selected><?php echo $value['name'] ?></option>
         <?php }else{ ?>
             <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
         <?php } 
         }
         ?>
    		</select>
    	</div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="input" name="submit" value="ok" class="btn btn-default">Update</button>
      </div>
    </div>
</form> 
