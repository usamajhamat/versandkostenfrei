<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('admin/theme/top'); ?>
	<style>
		.btnDisabled{
			cursor: not-allowed; 
			pointer-events: none;
		}
	</style>
	<body class="fix-menu">
		<div class="theme-loader"><div class="ball-scale"><div class='contain'><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div></div></div></div>

		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form class="md-float-material form-material" method="POST" action="<?php echo base_url(); ?>admin/retrieve_password">
							<div class="text-center">
								<?php $system_data 	= $this->db->get('system_settings')->result();?>
								<img src="<?php echo base_url(); ?>uploads/admin/<?php echo $system_data[5]->description; ?>" alt="logo.png" style="height:100px; width:auto; ">
							</div>
							<div class="auth-box card">
								<div class="card-block">
									<div class="row m-b-20">
										<div class="col-md-12">
											<h3 class="text-center">Reset Password</h3>
										</div>
									</div>
									<div class="form-group form-primary">
										<input type="text" name="retrive_email" class="form-control" onkeyup="CheckEmail(this.value)" required="" placeholder="Your Email">
										<span class="form-bar"></span>
										<p id="error_email" style="color:red;"></p>
									</div>
									<div class="row text-left">
										<div class="col-12">
										
											<div class="forgot-phone ">
												<a href="<?php echo base_url(); ?>" class="text-right f-w-600"> Back to Login?</a>
											</div>
											
										</div>
									</div>
									<div class="row ">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" id="forgotBtn">Reset Password</button>
										</div>
									</div>
									<hr/>
									<div class="row">
										<div class="col-md-12" align="center">
											Developed By <a href="http://eigix.com"> Eigix IT SOLUTIONS </a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('admin/theme/script'); ?>
		<script>
		function CheckEmail(value){
			$.ajax({
				type : 'POST',    
				url : '<?php echo base_url(); ?>admin/CheckEmail', 
				data : {'email':value},
				success: function(response) {
					console.log(response);
					if(value !=''){
						if(response == 'notexist'){
							$('#error_email').text('Email Not Exist');
							$('#forgotBtn').addClass('btnDisabled');
						}else{
							$('#error_email').text(' ');
							$('#forgotBtn').removeClass('btnDisabled');
						}
					}
				}
			});
		}
		</script>
	</body>
</html>