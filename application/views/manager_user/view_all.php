<script type="text/javascript">
	$(document).ready(function(){
	    $("#selecctall").change(function(){
      		$(".checkbox").prop('checked', $(this).prop("checked"));
      	});
	});
$(document).ready(function(){
    $("#btn-fillter").click(function(){
        $("#fillter").toggleClass("show");
    });
});
</script>
<script>
    function load_info(id){
        $.ajax({
        	url: "<?php echo base_url('Manager_user/test'); ?>"+'/'+id,
            success: function(result){
                $("#content").html(result);
                $('#myModal').modal('show');
        	}});
    };
</script>
	
<br>
<div class="btn btn-info" id="btn-fillter">Fillter</div><br><br>
<div style="display: none" id="fillter">
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="<?php echo base_url('manager_user/fillter'); ?>" method="POST" class="form-inline" role="form">
				<div class="form-group col-md-3">
					<label for="input" class=" control-label">Sort By</label>
						<select name="name" id="input" class="form-control" required="required">
							<option value="id">ID</option>
							<option value="mail">Mail</option>
							<option value="">Cart</option>
							<option value="date_created">Date Created</option>
							<option value="level">Level</option>
							<option value="status">Status</option>
						</select>
				</div>
				<div class="form-group col-md-3">
					<label for="input" class="control-label">Sort By</label>
						<select name="sort_by" id="input" class="form-control" required="required">
							<option value="DESC">DESC</option>
							<option value="ASC">ASC</option>
						</select>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php
$segment           = array();
$segment           = $this->uri->segments;
$link              = base_url('manager_user/fillter') . '/';
$link_id           = $link . 'id/ASC';
$link_mail         = $link . 'mail/ASC';
$link_cart         = $link . 'cart/ASC';
$link_status       = $link . 'status/ASC';
$link_level        = $link . 'level/ASC';
$link_date_created = $link . 'date_created/ASC';
if (isset($segment['3']) && isset($segment['4'])) {
    if ($segment['3'] == 'id' && strtoupper($segment['4']) == 'ASC') {
        $link_id = $link . 'id/DESC';
    }
    if ($segment['3'] == 'mail' && strtoupper($segment['4']) == 'ASC') {
        $link_mail = $link . 'mail/DESC';
    }
    if ($segment['3'] == 'cart' && strtoupper($segment['4']) == 'ASC') {
        $link_cart = $link . 'cart/DESC';
    }
    if ($segment['3'] == 'status' && strtoupper($segment['4']) == 'ASC') {
        $link_status = $link . 'status/DESC';
    }
    if ($segment['3'] == 'level' && strtoupper($segment['4']) == 'ASC') {
        $link_level = $link . 'level/DESC';
    }
    if ($segment['3'] == 'date_created' && strtoupper($segment['4']) == 'ASC') {
        $link_date_created = $link . 'date_created/DESC';
    }
}
?>
	<h3>Danh sach nguoif dung</h3>
	<div class="table-responsive">
		<form action="<?php echo base_url('manager_user/proccess'); ?>" method="POST">
			<table class="table table-hover table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th><input type="checkbox" id="selecctall"></th>
						<th><a href="<?php echo $link_id; ?>">ID</a></th>
						<th><a href="<?php echo $link_mail; ?>">Mail</a></th>
						<th><a href="<?php echo $link_cart; ?>">Cart</a></th>
						<th><a href="<?php echo $link_status; ?>">status</a></th>
						<th><a href="<?php echo $link_level; ?>">level</a></th>
						<th>Custom</th>
						<th><a href="<?php echo $link_date_created; ?>">date_created</a></th>
					</tr>
				</thead>
				<tbody>
				<?php
foreach ($result as $key => $value) {
    ?>
							<tr <?php if ($value->level > 0) {echo "class='success'";}
    ?>>
							<td>
							<?php
if ($value->level == 2 || $value->mail == $_SESSION['mail'] || $value->level == $_SESSION['level']) {
        echo '';
    } else {
        echo '<input type="checkbox" class="checkbox" value="' . $value->id . '" name="check[]">';
    }
    ?>
						</td>
						<td><?php echo $value->id; ?></td>
						<td><?php echo $value->mail; ?></td>
						<td>0 san pham</td>
						<td>
							<?php
if ($value->status == 0) {
        echo '<i class="fa fa-square-o text-warning" data-toggle="tooltip" title="Chua Active"></i>';
    } else if ($value->status == 1) {
        echo '<i class="fa fa-check-square-o text-success" data-toggle="tooltip" title=" Active"></i>';
    } else if ($value->status == 2) {
        echo '<i class="fa fa-ban text-danger" data-toggle="tooltip" title="Block"></i>';
    }

    ?>
						</td>
						<td>
							<?php
if ($value->level == 0) {
        echo '<span class="label label-default">User</span>';
    } else if ($value->level == 1) {
        echo '<span class="label label-success">Manager</span>';
    } else if ($value->level == 2) {
        echo '<span class="label label-info">Admin</span>';
    }

    ?>
						</td>
						<td><button type="button" onclick="load_info(<?php echo $value->id; ?>)"><i class="fa fa-eye inline"></i>sd</button>
							<div class="dropdown">

								<button id="dLabel" class="btn btn-primary btn-xs .inline" data-toggle="dropdown">
									Change
									<span class="caret"></span>
								</button>
							  	<ul class="dropdown-menu bg-primary" aria-labelledby="dLabel">
							  		<li><a href="#" >
							  		Xem chi tiet</a></li>
							    	<?php
if ($_SESSION['level'] > $value->level && $value->status == 2) {
        $link = base_url("Manager_user/un_block_user") . '/' . $value->id;
        echo '<li><a href="' . $link . '">UnBlock</a></li>';
    } else if ($_SESSION['level'] > $value->level && $value->status == 1) {
        $link = base_url("Manager_user/block_user") . '/' . $value->id;
        echo '<li><a href="' . $link . '">Block</a></li>';
    }
    ?>
								    <?php
if ($_SESSION['level'] == 2 && $value->level == 1) {
        $link = base_url("Manager_user/un_set_manager") . '/' . $value->id;
        echo '<li><a href="' . $link . '">UnSet Manager</a></li>';
    } else if ($_SESSION['level'] == 2 && $value->level == 0) {
        $link = base_url("Manager_user/set_manager") . '/' . $value->id;
        echo '<li><a href="' . $link . '">Set Manager</a></li>';
    }
    ?>
								   <?php
if ($_SESSION['level'] > $value->level && $_SESSION['level'] == 2) {
        $link = base_url("Manager_user/delete_user") . '/' . $value->id;
        echo '<li><a href="' . $link . '">Delete</a></li>';
    }
    ?>
							  	</ul>
						  	</div>
						</td>
						<td><?php echo $value->date_created; ?></td>
					</tr>
				<?php
}
?>
				</tbody>
			</table>
			<div class="form-group">
				<div class="col-sm-2">
					<select name="edit" id="input" class="form-control" required="required">
						<option value="block">Block</option>
						<option value="un_block">Un Block</option>
						<?php if ($_SESSION['level'] == 2) {
    echo '<option value="delete">Delete</option>';
}
?>

					</select>
				</div>
			</div>
			<input type="hidden" name="uri_string" value="<?php echo $this->uri->uri_string; ?>">
			<button name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-4 col-md-offset-4">
			<?php echo $pag; ?>
		</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title pull-left" id="myModalLabel">Modal title</span>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body" id="content">

      </div>
    </div>
  </div>
</div>