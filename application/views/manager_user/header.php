<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('bootstrap/css/font-awesome.min.css')?>" rel="stylesheet">
		<script src="<?php echo base_url('bootstrap/js/jquery-1.12.0.min.js')?>"></script>
		<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
		
	</head>
<body>
<div class="container">
	<?php
if (isset($_SESSION['login'])) {
	?>
	<div class="btn-group">
	  <a class="btn btn-primary" href="#">
		  <i class="fa fa-user fa-fw"></i>
		  <?php echo $_SESSION['mail']; ?>
	  </a>
	  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
	    <span class="fa fa-caret-down"></span></a>
	  <ul class="dropdown-menu">
	    <li>
		    <a href="<?php echo base_url('Auth/change_password'); ?>">
			    <i class="fa fa-pencil fa-fw"></i>
			     Change Pass
		    </a>
	    </li>
	    <li>
		    <a href="<?php echo base_url('Auth/logout'); ?>">
		    	<i class="fa fa-pencil fa-fw"></i> Logout
		    </a>
	    </li>
	  </ul>
	</div>
  <a  href="<?php echo base_url(); ?>"><i class="fa fa-home fa-fw"></i>  Trang người dùng</a>
	<?php
}
?>