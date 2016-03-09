<a class="btn btn-large btn-info" href="<?php echo base_url('slide/add'); ?>">
<i class="fa fa-plus"></i>Them Danh Muc</a>
<h3>Danh sach nguoif dung</h3>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Caption</th>
				<th>Link</th>
				<th>Images</th>
				<th>Status</th>
				<th>Date_created</th>
				<th>Custom</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['caption']; ?></td>
				<td><?php echo $value['link']; ?></td>
				<td><?php echo $value['img']; ?></td>
				<td><?php echo $value['status']; ?></td>
				<td><?php echo $value['date_created']; ?></td>
				<td>
					<a href="<?php echo base_url('slide/edit').'/'.$value['id'] ?>">Edit</a>
					<a href="<?php echo base_url('slide/delete/').'/'.$value['id'] ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
