
<?php if(isset($_SESSION['message_tmp'])) echo $_SESSION['message_tmp'];?>
<br>
  <a  href="<?php echo base_url(); ?>"><i class="fa fa-home fa-fw"></i>  Trang người dùng</a>
<?php 
	}
?>
<div class="clear-fix"></div>
<br>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	<div class="list-group">
		<a class="list-group-item" href="<?php echo base_url('manager_user/view_all'); ?>">
			<i class="fa fa-cog fa-fw"></i> View All
		</a>
	</div>	
</div>
<h1>Trang quản trị</h1>
