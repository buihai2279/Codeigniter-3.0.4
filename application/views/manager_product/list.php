	<script>
		function load_img(id){
        $.ajax({
        	url: "<?php echo base_url('manager_product/get_img'); ?>"+'/'+id,
            success: function(result){
                $("#content").html(result);
                $('#myModal').modal('show');
        	}});
    };
	</script>
	<a class="btn btn-large btn-info" href="<?php echo base_url('categories/add'); ?>">
	<i class="fa fa-plus"></i>Them San Pham</a>
	<h3>Danh sach nguoif dung</h3>
	<?php if (!isset($result)||$result=='') {
			echo "<tr><td>Không có Dữ liệu</td></tr>";
		}else{

			?>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Feature Image</th>
				<th>Description</th>
				<th>Images</th>
				<th>parameter</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($result as $value) {
   ?>
<tr>
	<td><?php echo $value['id']; ?></td>
	<td style="max-width: 180px"><?php echo $value['name']; ?></td>
	<td><?php echo $value['price']; ?></td>
	<td><img src="<?php echo $value['img']; ?>" alt="" class="images-responsive" style="max-height: 100px"></td>
	<td style="max-width: 300px"><?php echo str_replace('|', ' ', $value['description']); ?></td>
	<?php $arr=explode( '|',$value['link']);?>
	<td onclick="load_img(<?php echo $value['id'] ?>)" style="position:relative;">
		<a href="#"><img data-toggle="tooltip" title="Hooray!" src="<?php echo $arr[1] ?>" class="img-responsive" style="position: relative;max-width:150px;-webkit-filter: blur(10px);filter:grayscale(100%);">
		<span style="position: absolute;top: 40%;left: 40%;color:#fff;width: 100%;font-size: 22px; "><?php echo count($arr) ?> +</span></a>
	</td>
	
	<td style=""><?php echo substr(str_replace( '|',' ',$value['detail']),0,50);
	?>
	</td>
</tr>

   <?php 

}
} 
?>
			
		</tbody>
	</table>
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="content">
					
				</div>
			</div>
		</div>
	</div>