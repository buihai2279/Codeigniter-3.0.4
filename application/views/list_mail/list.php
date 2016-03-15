<h3>Danh sach nguoif dung</h3>

<textarea type="text" name="txt-content"id="editor1"  class="form-control" ><?php echo $result['content']; ?></textarea>
<script>
CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor();
</script>
<button type="button" class="btn btn-success">Sent</button>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>mail</th>
				<th>date_created</th>
				<th>Custom</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['mail']; ?></td>
				<td><?php echo $value['date_created']; ?></td>
				<td><a href="<?php echo base_url('list_mail/delete_by_manager').'/'.$value['id'] ?>">Delete</a></td>
			</tr>
		<?php } ?>
			<?php if (count($result)==0): ?>
				<tr><td><b>Chưa có dữ liệu</b></td></tr>
			<?php endif ?>
		</tbody>
	</table>
</div>
