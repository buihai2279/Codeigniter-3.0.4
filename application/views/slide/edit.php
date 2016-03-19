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
      <label  class="col-sm-2 control-label">ID</label>
      <div class="col-sm-10">
        <input type="text" value="<?php echo $result['id']; ?>" class="form-control" disabled>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Caption</label>
      <div class="col-sm-10">
        <input type="text" name="caption" value="<?php echo $result['caption']; ?>" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Link</label>
      <div class="col-sm-10">
        <input type="text" name="link" class="form-control" value="<?php echo $result['link']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2">
      <span class="pull-right">IMG</span><br>
      <input type="button" id="ckfinder-modal" class="form-control btn btn-info" value="Upload IMG">
          
      </label>
      <div class="col-sm-10">
        <img src="<?php echo $result['img']; ?>" class='img-responsive' style='max-height: 150px'id='output'>
        <input type="text" name="img" id='img' value="<?php echo $result['img']; ?>" class="form-control" readonly>
      </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="input" name="submit" value="ok" class="btn btn-default">Update</button>
      </div>
    </div>
</form> 

<script src="<?php echo base_url('public/ckfinder/ckfinder.js')?>"></script>
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
