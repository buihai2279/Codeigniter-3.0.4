<br>
<?php 
	if(isset($_SESSION['message_tmp'])) echo '<div class="alert alert-info">'.$_SESSION['message_tmp'].'</div>';
	if (isset($_SESSION['login'])) {
?>
		<div class="btn-group">
			<a class="btn btn-primary" href="#">
			  <i class="fa fa-user fa-fw"></i>
			  <?php echo $_SESSION['mail']; ?>
			</a>
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
			    <span class="fa fa-caret-down"></span>
		    </a>
		  <ul class="dropdown-menu">
		    <li><a href="<?php echo base_url('Auth/change_password'); ?>"><i class="fa fa-pencil fa-fw"></i> Change Pass</a></li>
		    <li><a href="<?php echo base_url('Auth/logout'); ?>"><i class="fa fa-pencil fa-fw"></i> Logout</a></li>
		  </ul>
		</div>
<?php 
		if ($_SESSION['level']==1||$_SESSION['level']==2) {
			echo "<a href='".base_url('Admin')."'>Vào trang quản trị</a>";
		}
	}else {
		echo "<a href='".base_url('Auth/login')."'> Login </a>";
		echo "<a href='".base_url('Auth/register')."'class='btn btn-primary'> Register</a>";
	}
?>
<br>
<div class="clear-fix"></div>
<br>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
<div class="list-group">
  <a class="list-group-item" href="#"><i class="fa fa-book fa-fw"></i>&nbsp; Sản phẩm</a>
  <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw"></i>&nbsp; Category</a>
</div>	
</div>
<h1>Trang người dùng</h1>

