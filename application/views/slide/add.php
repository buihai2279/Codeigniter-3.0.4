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



<button id="ckfinder-modal" class="button-a button-a-background" style="float: left">Open Modal</button>
<script src="<?php echo base_url('public/ckfinder/ckfinder.js')?>"></script>
<script>
  var button = document.getElementById( 'ckfinder-modal' );
  button.onclick = function() {
    CKFinder.modal( {
      chooseFiles: true,
      width: 800,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          var output = document.getElementById( 'output' );
          output.innerHTML = 'Selected: ' + file.get( 'name' ) + '<br>URL: ' + file.getUrl();
        } );
        finder.on( 'file:choose:resizedImage', function( evt ) {
          var output = document.getElementById( 'output' );
          output.innerHTML = 'Selected resized image: ' + evt.data.file.get( 'name' ) + '<br>url: ' + evt.data.resizedUrl;
        } );
      }
    } );
  };
</script>
<div id="output"></div>
