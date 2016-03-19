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
      <label  class="col-sm-2">
          <input type="button" id="ckfinder-modal" class="form-control btn btn-info" value="Upload IMG">
      </label>
      <div class="col-sm-10">
        <img src="" class='img-responsive' style='max-height: 150px'id='output'>
        <input type="text" name="img" id='img' class="form-control" readonly>
      </div>
    </div>
      
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="ok" class="btn btn-default">Add</button>
      </div>
    </div>
</form> 
<script>
  $( "#ckfinder-modal" ).click(function() {
      CKFinder.modal({
      chooseFiles: true,
      width: 800,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          $('#output').attr( "src",file.getUrl());
          $('#img').val(file.getUrl());
        } );
        finder.on( 'file:choose:resizedImage', function( evt ) {
          $('#output').attr("src",evt.data.resizedUrl);
          $('#img').val(evt.data.resizedUrl);
        });
      }
    });
  });
</script>
