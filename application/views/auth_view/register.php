<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="well well-lg">
		<?php echo form_open('auth/register/#'); ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
				<img src="<?php echo base_url('logo.png')?>" class="img-responsive " alt="Responsive image">
			</div>
			<legend>Register</legend>
			<div class="form-group">
				<?php if(isset($_SESSION['message_tmp']))echo $_SESSION['message_tmp']; ?> 
				<?php  if(isset($message)) echo $message ; ?> 
				<div class="input-group <?php if(form_error('mail')!='') echo 'has-error';?>">
			      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			      <?php 
			      		$data = array(
						        'name'          => 'mail',
						        'class'         => 'form-control',
						        'type'          => 'text',
						        'placeholder'   => 'Mail address',
						        'value'			=> set_value("mail")
						);
						echo form_input($data);
			       ?>
			    </div>
			    <br>
			    <div class="input-group <?php if(form_error('password')!='') echo 'has-error';?>">
			      <div class="input-group-addon"><i class="fa fa-key"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 'password',
						        'class'         => 'form-control',
						        'placeholder'   => 'Mật khẩu'
						);
						echo form_password($data);
			       ?>
			    </div>
			    <br>
			    <div class="input-group <?php if(form_error('re-password')!='') echo 'has-error';?>">
			      <div class="input-group-addon"><i class="fa fa-key"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 're-password',
						        'class'         => 'form-control',
						        'placeholder'   => 'Nhập lại Mật khẩu'
						);
						echo form_password($data);
			       ?>
			    </div>
			</div>
			<?php 
	      		$data = array(
				        'name'          => 'submit',
				        'class'         => 'btn btn-success',
						'type'          => 'submit',
				        'value'			=> 'ok'
				);
				echo form_button($data,'<i class="fa fa-sign-in"></i> Register');
	       ?>
		<?php echo form_close(); ?>
		<p><a href="<?php echo base_url('auth/login'); ?>">login </a></p>
	</div>
</div>
