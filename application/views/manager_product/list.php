<script>
	function load_img(id){
        $.ajax({
        	url: "<?php echo base_url('manager_product/get_img'); ?>"+'/'+id,
            success: function(result){
                $("#content").html(result);
                $('#myModal').modal('show');
        	}});
	};
    $(document).ready(function(){
	    $("#selecctall").change(function(){
      		$(".checkbox").prop('checked', $(this).prop("checked"));
      	});
	});

</script>
<script>
    function load_info(id){
        $.ajax({
        	url: "<?php echo base_url('manager_product/get_info'); ?>"+'/'+id,
            success: function(result){
                $("#content").html(result);
                $('#myModal').modal('show');
        	}});
    };
</script>
<style>
.row_product:hover>td>.col_edit{
	display: block;
}
.col_edit{
	display: none;
}
</style>
	<a class="btn btn-large btn-info " href="<?php echo base_url('categories/add'); ?>">
	<i class="fa fa-plus"></i>Them San Pham</a>
	<h3>Danh sach nguoif dung</h3>
	<?php if (!isset($result)||$result=='') {
			echo "<tr><td>Không có Dữ liệu</td></tr>";
		}else{

			?>
			<form action="manager_product/Proccess" method="POST">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th><input type="checkbox" id="selecctall"></th>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Status</th>
				<th>Top</th>
				<th>Feature Image</th>
				<th>Description</th>
				<th>Images</th>
				<th>parameter</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($result as $value) {
   ?>
<tr class="row_product">
	<td><input type="checkbox" class="checkbox" value="<?php echo $value->id; ?>" name="check[]"></td>
	<td><?php echo $value->id; ?></td>
	<td style="max-width: 180px"><?php echo $value->name; ?></td>
	<td><?php echo $value->price; ?></td>
	<td>
	<?php if($value->status==1)echo '<i class="fa fa-check-square text-primary"></i>';
			else echo '<i class="fa fa-square-o text-muted"></i>'; ?>
	</td>
	<td>
	<?php if($value->top==1)echo '<i class="fa fa-star text-success"></i>';
		 ?>
	</td>
	<td><img src="<?php echo $value->img; ?>" alt="" class="images-responsive" style="max-height: 100px"></td>
	<td style="max-width: 300px"><?php echo str_replace('|', ' ', $value->description); ?></td>
	<?php $arr=explode( '|',$value->link);?>
	<td onclick="load_img(<?php echo $value->id ?>)" style="position:relative;">
		<a href="#"><img data-toggle="tooltip" title="Hooray!" src="<?php echo $arr[1] ?>" class="img-responsive" style="position: relative;max-width:150px;-webkit-filter: blur(10px);filter:grayscale(100%);">
		<span style="position: absolute;top: 40%;left: 40%;color:#fff;width: 100%;font-size: 22px; "><?php echo count($arr) ?> +</span></a>
	</td>
	
	<td style=""><?php echo substr(str_replace( '|',' ',$value->detail),0,50);
	?>
	</td>
	<td>
		<div class="col_edit">
			<a href=""><i class="fa fa-edit show"></i></a><br>
			<a  href="#" class="btn-link" onclick="load_info(<?php echo $value->id; ?>)"><i class="fa fa-eye show"></i></a><br>
			<a href=""><i class="fa fa-trash show"></i></a>
		</div>
	</td>
</tr>

   <?php 

}
} 
?>
		</tbody>
	</table>
	<div class="col-sm-2">
		<select name="edit" id="input" class="form-control" required="required">
			<!-- <option value="block">Status</option> -->
			<option value="delete">Delete</option>
			<!-- <option value="delete">NULL</option> -->
		</select>
	</div>
	<input type="hidden" name="uri_string" value="<?php echo $this->uri->uri_string; ?>">
	<button name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
</form>
<div class="clearfix">
</div>
		<div class="col-md-4 col-md-offset-4">
			<?php echo $pag; ?>
		</div>




<div class="modal fade" id="myModal">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row"  id="content">
					
				</div>
			</div>
		</div>
	</div>
</div>