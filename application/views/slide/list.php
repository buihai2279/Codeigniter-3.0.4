<a class="btn btn-large btn-info" href="<?php echo base_url('slide/add'); ?>">
<i class="fa fa-plus"></i>Them Danh Muc</a>
<h3><?php echo(isset($title)) ? $title : '' ; ?></h3>
<form action="slide/chang_top" method="POST">
<input type="submit" class="btn btn-success" value="Update">
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Caption</th>
				<th style="max-width: 150px">Link</th>
				<th>Images</th>
				<th>top</th>
				<th>Date_created</th>
				<th>Custom</th>
			</tr>
		</thead>
		<tbody id="sortable">
		<?php foreach ($result as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['caption']; ?></td>
				<td style="max-width: 150px"><?php echo $value['link']; ?></td>
				<td><img src="<?php echo $value['img']?>" style='max-height:150px'></td>
				<td>
					<?php echo $value['top']; ?>
					<input type="text" name="array[]" value="<?php echo $value['id']?>" hidden>
				</td>
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
		</form>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#sortable" ).sortable({ 
        });
    });
</script>
