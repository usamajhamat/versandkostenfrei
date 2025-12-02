<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4><?php echo $page_title; ?></h4>
									<span><?php echo $page_sub_title; ?></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="#"> <i class="fa fa-cogs"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Admin</a>
									</li>
									<li class="breadcrumb-item"><a href="#"><?php echo $page_title; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->
				<div class="page-body">
					<div class="row">
						<div class="card col-md-12">
							<div class="card-header">
								<h5>Manage Your Profile</h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								
								<hr>

							</div>
							<div class="card-block">
						            <?php 
									  $system_email = $this->db->get_where('system_settings',array('type' => 'email'))->row()->description;
									?>
									<form method="POST" id="my_account" action="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/myprofile/update"  enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-8">
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label">Full Name</label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<span class="input-group-addon"><i class="icofont icofont-ui-volume"></i></span>
															<input type="hidden" name="admin_id" value="<?php echo $profile_data->users_system_id; ?>" required>
															<input type="text" name="first_name" class="form-control" placeholder="" value="<?php echo $profile_data->first_name; ?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label"> Phone</label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-phone"></i></span>
															<input type="text" name="mobile" class="form-control" placeholder="" value="<?php echo $profile_data->mobile; ?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label"> City</label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
															<input type="text" name="city" class="form-control" placeholder="" value="<?php echo $profile_data->city; ?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label"> Username</label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<span class="input-group-addon">@</span>
															<input type="text" name="email" class="form-control" placeholder="" value="<?php echo $profile_data->email; ?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label"> Password</label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-lock"></i></span>
															<input type="password" name="password" class="form-control" placeholder="" value="<?php echo $profile_data->password; ?>" required>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10">
														<textarea rows="5" cols="5" name="address" class="form-control"
																  placeholder="Address"><?php echo $profile_data->address; ?></textarea>
													</div>
												</div>
												<input type="hidden" id="old_email" value="<?php echo $system_email; ?>">
												<!-- <input type="hidden" id="old_email" value="moavizq@gmail.com"> -->
												<div id="otp_section" style="display:none">
													<div class="">
														<b>You have received a 4 digits OTP code on your email <?php echo $system_email; ?></b>
														<hr>
													</div>
													<div class="row">
														<label class="col-sm-4 col-lg-3 col-form-label"> OTP</label>
														<div class="col-sm-8 col-lg-9">
															<div class="input-group">
																<span class="input-group-addon"><i class="fa fa-code"></i></span>
																<input type="text" id="otp_input" name="otp" class="form-control" placeholder="Enter otp"  >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4 col-lg-2 col-form-label"> </label>
													<div class="col-sm-8 col-lg-10">
														<div class="input-group">
															<button type="sunmit" class="btn btn-success">Update Profile</button>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class=" col-md-4">
												<center>
													<?php if(empty($profile_data->user_image)){ ?>
														<img src="<?php echo base_url(); ?>assets/admin/images/admin.png" style="width:200px;">
													<?php }else{ ?>
														<img src="<?php echo base_url(); ?>uploads/users/<?php echo $profile_data->user_image; ?>" style="width:200px;">
													<?php } ?>
													<br/>
													<br/>
													<div class="input-group  col-md-10 col-md-offset-1">
														<span class="input-group-addon"><i class="fa fa-image"></i></span>
														<input type="file" name="user_image" class="form-control"/>
													</div>
												</center>
											</div>
										</div>
									</form>

							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>