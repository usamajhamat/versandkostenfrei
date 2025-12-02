<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('admin/theme/top'); ?>
	<body class="fix-menu">
		<div class="theme-loader"><div class="ball-scale"><div class='contain'><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div></div></div></div>
		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form class="md-float-material form-material" method="POST" action="<?php echo base_url(); ?>admin/reset_password/update_password/<?php echo $user_id;?>">
							<div class="text-center">
								<?php $system_data 	= $this->db->get('system_settings')->result();?>
								<img src="<?php echo base_url(); ?>uploads/admin/<?php echo $system_data[5]->description; ?>" alt="logo.png" style="height:100px; width:auto; ">
							</div>
							<div class="auth-box card">
								<div class="card-block">
									<div class="row m-b-20">
										<div class="col-md-12">
											<h3 class="text-center">Change Password</h3>
										</div>
									</div>
									<div class="form-group form-primary">
										<input type="password"  name="new_password" id="new_password" class="form-control" required="" placeholder="New Password">
										<span class="form-bar"></span>
									</div>
									<div class="form-group form-primary">
										<input type="password" name="confirm_password" onkeyup="macth_password(this.id)" class="form-control" required="" placeholder="Confirm Password" id="confirm_password" >
										<span class="form-bar"></span>
									</div>
									<label id="lbl_error_pass" style="color: red; display:none;">Password did not match, please check your confirm password.</label>
    							
									<div class="row ">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"  disabled id="upd_password" >Save password</button>
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
	    function macth_password(){
	        var new_pass = jQuery('#new_password').val();
	        var conf_pass = jQuery('#confirm_password').val();
	        if(new_pass == conf_pass){
	            jQuery('#upd_password').prop( "disabled", false );
	            jQuery('#lbl_error_pass').hide();
	        } else if(new_pass != conf_pass){
	            jQuery('#upd_password').prop( "disabled", true );
	            jQuery('#lbl_error_pass').show();
	        }
	    }
	    
	</script>
	</body>
</html>