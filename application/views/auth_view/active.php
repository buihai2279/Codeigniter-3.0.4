<body style="background-color: #2B2B33;">
<br><br>
<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="well well-lg">
		<?php echo form_open(base_url('auth/active/#')); ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
				<img src="<?php echo base_url('logo.png')?>" class="img-responsive " alt="Responsive image">
			</div>
			<legend>Active</legend>
			<div class="form-group">
				<?php  
					if(isset($_SESSION['message_tmp'])) echo$_SESSION['message_tmp']; 
				?> 
				<?php  if(isset($message)) echo $message ; ?> 
				
			    <div class="input-group <?php echo (form_error('code')!='') ? 'has-error' : '' ; ?>">
			      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
			      <?php 
			      		$data = array(
						        'name'          => 'code',
						        'class'         => 'form-control',
						        'type'          => 'text',
						        'placeholder'   => 'Code',
						        'value'			=> set_value("code")
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
				echo form_button($data,'<i class="fa fa-check-square-o"></i> Active');
	       ?>
		<?php echo form_close(); ?>
		<p><a href="<?php echo base_url('auth/re_active'); ?>">Gửi lại mail kích hoạt </a></p>
	</div>
	
</div>
</body>
