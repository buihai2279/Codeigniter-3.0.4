<h3>Danh sach nguoif dung</h3>
<a class="btn btn-large btn-info" href="<?php echo base_url('news/add'); ?>">
<i class="fa fa-plus"></i>Add news</a>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>title</th>
				<th>description</th>
				<th>content</th>
				<th>custom</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['title']; ?></td>
				<td><?php echo $value['description']; ?></td>
				<td><?php echo $value['content']; ?></td>
				<td><a href="<?php echo base_url('news/delete').'/'.$value['id'] ?>">DELETE</a>
				<a href="<?php echo base_url('news/edit').'/'.$value['id'] ?>">edit</a></td>
			</tr>
		<?php } ?>
			<?php if (count($result)==0): ?>
				<tr><td><b>Chưa có dữ liệu</b></td></tr>
			<?php endif ?>
		</tbody>
	</table>
</div>
