<body style="background-color: #2B2B33;">
<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="well well-lg">
		<?php echo form_open(''); ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
				<img src="<?php echo base_url('logo.png')?>" class="img-responsive " alt="Responsive image">
			</div>
			<legend>Login</legend>
			<div class="form-group">
			<?php if (isset($_SESSION['message_tmp']))echo '<div class="alert alert-info">'.$_SESSION['message_tmp'].'</div>';?>
				<?php  if(isset($message)) echo $message ; ?> 
				<div class="input-group <?php echo (form_error('mail')!='') ? 'has-error' : '' ; ?>">
			      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 'mail',
						        'class'         => 'form-control',
						        'type'          => 'text',
						        'placeholder'   => 'Mail',
						        'value'			=> set_value("mail")
						);
						echo form_input($data);
			       ?>
			    </div>
			    <br>
			    <div class="input-group <?php echo (form_error('password')!='') ? 'has-error' : '' ; ?>">
			      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 'password',
						        'class'         => 'form-control',
						        'placeholder'   => 'Mật khẩu'
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
				echo form_button($data,'<i class="fa fa-sign-in"></i> Login');
	       ?>
		<?php echo form_close(); ?>
	</div>
</div>
</body>