<br><br>
<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="well well-lg">
		<?php echo form_open(base_url('auth/change_password/#')); ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
				<img src="<?php echo base_url('logo.png')?>" class="img-responsive " alt="Responsive image">
			</div>
			<legend>Change Password</legend>
			<div class="form-group">
				<?php  if(isset($_SESSION['message_tmp'])) echo$_SESSION['message_tmp']; ?> 
				<?php  if(isset($message)) echo $message ; ?> 
				<div class="input-group <?php echo (form_error('old-password')!='') ? 'has-error' : '' ; ?>">
			      <div class="input-group-addon"><i class="fa fa-key"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 'old-password',
						        'class'         => 'form-control',
						        'type'          => 'text',
						        'placeholder'   => 'Password Old',
						        'value'			=> set_value("old-password")
						);
						echo form_input($data);
			       ?>
		       </div>
		       <br>
				<div class="input-group <?php echo (form_error('new-password')!='') ? 'has-error' : '' ; ?>">
			    <div class="input-group-addon"><i class="fa fa-key"></i></div>
				<?php 
						$data = array(
					        'name'          => 'new-password',
					        'class'         => 'form-control',
					        'type'          => 'text',
					        'placeholder'   => 'New-password',
					        'value'			=> set_value("new-password")
					);
					echo form_input($data);
				?>
			    </div>
			    <br>
			    <div class="input-group <?php echo (form_error('re-new-password')!='') ? 'has-error' : '' ; ?>">
				<div class="input-group-addon"><i class="fa fa-key"></i></div>
					<?php 
						$data = array(
					        'name'          => 're-new-password',
					        'class'         => 'form-control',
					        'type'          => 'text',
					        'placeholder'   => 'Re-new-password',
					        'value'			=> set_value("re-new-password")
						);
						echo form_input($data);
					?>
				</div>
			    <br>
			</div>
			<?php 
	      		$data = array(
				        'name'          => 'submit',
				        'class'         => 'btn btn-success',
						'type'          => 'submit',
				        'value'			=> 'ok'
				);
				echo form_button($data,'<i class="fa fa-sign-in"></i> Lấy lại mật khẩu');
	       ?>
		<?php echo form_close(); ?>
	</div>
</div>
