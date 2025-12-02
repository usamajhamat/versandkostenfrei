<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $system_name = $this->db->get_where('system_settings', array('type'=>'system_name'))->row()->description; ?>
		<title><?php echo $system_name ?> - Administrator</title>
	   <?php $this->load->view('admin/theme/top'); ?>
	</head>
	<body class="fix-menu">
		<div class="theme-loader"><div class="ball-scale"><div class='contain'><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div></div></div></div>
		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form class="md-float-material form-material" method="POST" action="<?php echo base_url(); ?>admin/login">
							<div class="text-center">
								<?php $system_data 	= $this->db->get('system_settings')->result();?>
								<img src="<?php echo base_url(); ?>uploads/admin/<?php echo $system_data[5]->description; ?>" alt="logo.png" style="height:100px; width:auto; ">
							</div>
							<div class="auth-box card">
								<div class="card-block">
									<div class="row m-b-20">
										<div class="col-md-12">
											<h3 class="text-center">Sign In</h3>
										</div>
									</div>
									<div class="form-group form-primary">
										<input type="text" name="email" class="form-control" required="" placeholder="Your Username">
										<span class="form-bar"></span>
									</div>
									<div class="form-group form-primary">
										<input type="password" name="password" class="form-control" required="" placeholder="Password">
										<span class="form-bar"></span>
									</div>
									<div class="row text-left">
										<div class="col-12">
										
											<div class="forgot-phone ">
												<a href="<?php echo base_url(); ?>admin/forgot_password" class="text-right f-w-600"> Forgot Password?</a>
											</div>
											
										</div>
									</div>
									<div class="row ">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
										</div>
									</div>
									<hr/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('admin/theme/script'); ?>
	</body>
</html>