<body>
<br>
<?php if(isset($_SESSION['message_tmp'])) echo$_SESSION['message_tmp'];?>
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

	<form action="" method="POST" role="form">
		<legend>Form title</legend>
	
		<div class="form-group">
			<label for="">label</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>