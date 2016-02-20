<body>
<?php echo current_url(); ?>
<?php if(isset($_SESSION['message_tmp'])) echo '<div class="alert alert-info">'.$_SESSION['message_tmp'].'</div>';?>
<?php if (isset($_SESSION['login'])) {
?>
	<div class="btn-group">
	  <a class="btn btn-primary" href="#">
		  <i class="fa fa-user fa-fw"></i>
		  <?php echo $_SESSION['mail']; ?>
	  </a>
	  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
	    <span class="fa fa-caret-down"></span></a>
	  <ul class="dropdown-menu">
	    <li><a href="<?php echo base_url('Auth/change_password'); ?>"><i class="fa fa-pencil fa-fw"></i> Change Pass</a></li>
	    <li><a href="<?php echo base_url('Auth/logout'); ?>"><i class="fa fa-pencil fa-fw"></i> Logout</a></li>
	  </ul>
	</div>
  <a  href="<?php echo base_url(); ?>"><i class="fa fa-home fa-fw"></i>  Trang người dùng</a>
<?php 
	}
?>
<div class="container">
<h3>Danh sach nguoif dung</h3>
<div class="table-responsive">
	<table class="table table-hover table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Mail</th>
				<th>date_created</th>
				<th>status</th>
				<th>level</th>
				<th>Custom</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach ($result as $key => $value) {
		?>
			<tr <?php if ($value->level>0) {echo "class='success'";} ?>>
				<td><?php echo $value->id; ?></td>
				<td><?php echo $value->mail; ?></td>
				<td><?php echo $value->date_created; ?></td>
				<td>
					<?php 
						if ($value->status==0) {
							echo '<i class="fa fa-square-o text-warning" data-toggle="tooltip" title="Chua Active"></i>';
						}else if($value->status==1)
							echo '<i class="fa fa-check-square-o text-success" data-toggle="tooltip" title=" Active"></i>';
						else if($value->status==2)
							echo '<i class="fa fa-ban text-danger" data-toggle="tooltip" title="Block"></i>';
					?>
				</td>
				<td>
					<?php 
					if ($value->level==0) {
						echo "User";
					}else if($value->level==1) 
						echo "Manager"; 
					else if($value->level==2)
						echo "Admin";
					?>
				</td>
				<td>
					<?php if ($_SESSION['mail']==$value->mail){
							echo "No-action";
							continue;
						} ?>
					<div class="dropdown">
						<button id="dLabel" class="btn btn-primary btn-xs" data-toggle="dropdown">
							Change
							<span class="caret"></span>
						</button>
					  	<ul class="dropdown-menu bg-primary" aria-labelledby="dLabel">
					  		<li><a href="">Xem chi tiet</a></li>
					    	<?php 
							    if($_SESSION['level']>0&&$value->status==2){
							    	echo '<li><a href="">UnBlock</a></li>';
							    }
							    else if($_SESSION['level']>0&&$value->level==0&&$value->status==1){
							    	echo '<li><a href="">Block</a></li>';
							    }else if($_SESSION['level']==2&&$value->level>0&&$value->status==1){
							    	echo '<li><a href="">Block</a></li>';
							    }
						    ?>
						    <?php 
							    if($_SESSION['level']==2&&$value->level==1){echo '<li><a href="">UnSet Manager</a></li>';}
							    else if($_SESSION['level']==2&&$value->level==0){echo '<li><a href="">Set Manager</a></li>';}
						    ?>
						   <?php 
							    if($_SESSION['level']==2&&$value->level!=2){echo '<li><a href="">Delete</a></li>';}
						    ?>
					  	</ul>
				  	</div>
				</td>
			</tr>

		<?php 
			}
		 ?>
		</tbody>
	</table>
	</div>
	<div class="col-md-4 col-md-offset-4">
	<?php echo $pag; ?></div>
</div>

</body>