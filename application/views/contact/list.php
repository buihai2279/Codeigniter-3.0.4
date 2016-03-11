<h3>Danh sach nguoif dung</h3>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Mail</th>
				<th>Content</th>
				<th>Date</th>
				<th>Status</th>
				<th>info</th>
				<th>Custom</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['mail']; ?></td>
				<td><?php echo $value['content']; ?></td>
				<td><?php echo $value['date_created']; ?></td>
				<td><?php echo $value['status']; ?></td>
				<td><?php echo $value['info']; ?></td>
				<td>
					<a href="<?php echo base_url('contact/reply').'/'.$value['id']?>">Reply</a>
					<a href="<?php echo base_url('contact/delete').'/'.$value['id']?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
