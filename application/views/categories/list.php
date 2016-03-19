<a class="btn btn-large btn-info" href="<?php echo base_url('categories/add'); ?>">
<i class="fa fa-plus"></i>Them Danh Muc</a>
<h3><?php echo(isset($title)) ? $title : '' ; ?></h3>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Tittle</th>
				<th>Slug</th>
				<th>Parrent_id</th>
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
				<td><?php echo $value['title']; ?></td>
				<td><?php echo $value['slug']; ?></td>
				<td><?php echo $value['parrent_id']; ?></td>
				<td><?php echo $value['description']; ?></td>
				<td>
					<a href="<?php echo base_url('categories/edit').'/'.$value['id'] ?>">Edit</a>
					<a href="<?php echo base_url('categories/delete/').'/'.$value['id'] ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
