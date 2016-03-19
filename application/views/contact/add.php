
		<script src="<?php echo base_url('public/ckeditors/ckeditor.js')?>"></script>
		<script src="<?php echo base_url('public/ckfinder/ckfinder.js')?>"></script>
<div class="container">
	
<form action="<?php echo base_url('contact/add'); ?>" method="POST" role="form">
	<legend><h3><?php echo(isset($title)) ? $title : '' ; ?></h3></legend>

	<div class="form-group">
		<label for="">Name</label>
		<input name="txt-name" class="form-control" value="<?php echo set_value('txt-name')?>" >
	</div>
	<div class="form-group">
		<label for="">Mail</label>
		<input name="txt-mail" class="form-control" value="<?php echo set_value('txt-mail')?>">
	</div>
	<div class="form-group">

		<label for="">content</label>
      <textarea type="text" name="txt-content"id="editor1"  class="form-control" >
      <?php echo set_value('txt-content')?>
      </textarea>
      <script>
      CKEDITOR.replace( 'editor1' );
      CKFinder.setupCKEditor();
      </script>
	</div>
	<div class="form-group">
		<label for="">Info</label>
		<input name="txt-info" class="form-control" value="<?php echo set_value('txt-info')?>">
	</div>

	

	<button type="submit" class="btn btn-primary " value="ok">Submit</button>
</form>
</div>
<br><br><hr>
