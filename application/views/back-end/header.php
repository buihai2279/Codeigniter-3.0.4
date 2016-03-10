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
		<script type="text/javascript" src="<?php echo base_url();?>public/ckfinder/ckfinder.js"></script>
		<script>
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
		</script>
		<style>body { padding-top: 70px; }.no_margin{margin:none;}</style>
	</head>
	<body>
	<div class="container-fluid">
		<ul class="nav nav-pills  navbar-fixed-top" style="background: #f1f1f1;padding: 5px 25px;">
		  <li role="presentation" class="active"><a href="#">Backend</a></li>
		  <li role="presentation"><a href="<?php echo base_url()?>" target="_blank">Home</a></li>
			<?php if (isset($_SESSION['mail'])) { ?>
		  <li role="presentation" class="dropdown pull-right active">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>
			  <?php echo $_SESSION['mail']; ?><span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
				<li role="presentation">
					<a href="<?php echo base_url('Auth/change_password'); ?>">
		    			<i class="fa fa-pencil fa-fw"></i> Change Pass
		    		</a>
		    	</li>
				<li role="presentation">
					<a href="<?php echo base_url('Auth/logout'); ?>">
			    		<i class="fa fa-pencil fa-fw"></i> Logout
			    	</a>
		    	</li>
		    </ul>
		  </li>
		  <?php } ?>
		</ul>

<div class="container">	
<br>
	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url('Admin'); ?>">Backend</a></li>
	<li>
		<a href="<?php echo base_url().$this->uri->segment(1); ?>">
			<?php echo ucwords(str_replace("_"," ",$this->uri->segment(1)));?>
		</a>
	</li>
	<li>
		<a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>">
			<?php echo ucwords(str_replace("_"," ",$this->uri->segment(2)));?>
		</a>
	</li>
	</ol>
<?php
if (isset($_SESSION['message_tmp'])) {
echo $_SESSION['message_tmp'];
}
?>
