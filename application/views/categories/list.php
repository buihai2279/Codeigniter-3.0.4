<div class="container">
	<?php
if (isset($_SESSION['message_tmp'])) {
	echo $_SESSION['message_tmp'];
}
?>
</div>
	<a class="btn btn-large btn-info" href="<?php echo base_url('categories/add'); ?>">
	<i class="fa fa-plus"></i>Them Danh Muc</a>
	<h3>Danh sach nguoif dung</h3>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Parrent_id</th>
					<th>Tittle</th>
					<th>Description</th>
					<th>Custom</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($result as $key => $value) {
				?>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['parrent_id']; ?></td>
					<td><?php echo $value['tittle']; ?></td>
					<td><?php echo $value['description']; ?></td>
					<td><a href="">Edit</a><a href="">Delete</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>