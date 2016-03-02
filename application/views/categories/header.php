<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('bootstrap/css/font-awesome.min.css')?>" rel="stylesheet">
	</head>
	<body>

<div style="width: 100%;height: 25px;z-index: 99999;background: #56585a;direction: ltr;
color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;">

<?php if (isset($_SESSION['login'])) {
?>
<div class="btn-group pull-right">
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
</div>
<div class="container"><br><br><br>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('Admin'); ?>">Backend</a></li>
<li>
	<a href="<?php echo base_url().$this->uri->segment(1); ?>">
		<?php echo $this->uri->segment(1); ?>
	</a>
</li>
<li>
	<a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>">
		<?php echo $this->uri->segment(2); ?>
	</a>
</li>
</ol>
<?php } ?>