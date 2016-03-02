<div class="container">
	<?php
if (isset($_SESSION['message_tmp'])) {
	echo $_SESSION['message_tmp'];
}
?>
</div>
	<a class="btn btn-large btn-info" href="<?php echo base_url('categories/add'); ?>">
	<i class="fa fa-plus"></i>Them San Pham</a>
	<h3>Danh sach nguoif dung</h3>
	
</div>
</body>