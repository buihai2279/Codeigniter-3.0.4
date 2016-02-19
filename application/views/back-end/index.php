<br>
<br>
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
<div class="clear-fix"></div>
<br>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
<div class="list-group">
  <a class="list-group-item" href="#"><i class="fa fa-book fa-fw"></i>&nbsp; QL Danh mục</a>
  <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw"></i>&nbsp; QL slide</a>
  <a class="list-group-item" href="#"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a>
</div>	
</div>
<h1>Trang quản trị</h1>
