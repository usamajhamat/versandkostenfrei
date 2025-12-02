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
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $page_title; ?></a>
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
								<h5>Manage System Setting</h5>
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
							// echo "<pre>";
							// print_r($system_data);
							// echo "</pre>"; 
 
							?>
								<form method="POST"  action="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/system_settings/update"  enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-8 col-lg-8 col-sm-8">
											<div class="">
												<b>General Settings</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Company Name</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="icofont icofont-ui-volume"></i></span>
														<input type="text" name="system_name" class="form-control" placeholder="" value="<?php echo $system_data[0]->description; ?>" required>
													</div>
												</div>
											</div>
										
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Description</label>
												<div class="col-sm-8 col-lg-9">
													<textarea rows="5" cols="5" name="site_description" class="form-control" placeholder="Description"><?php echo $system_data[25]->description; ?></textarea>
												</div>
											</div>
											<div class="">
												<b>Front End Settings</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Home page brands limit</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="top_section_brands_limit" class="form-control" placeholder="" value="<?php echo $system_data[47]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Category Description limit</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="desc_limit" class="form-control" placeholder="" value="<?php echo $system_data[29]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Brands Alert Box Position</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="brand_page_alert_position" class="form-control" placeholder="" value="<?php echo $system_data[30]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Popular brands limit</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="popular_brands_limit" class="form-control" placeholder="" value="<?php echo $system_data[43]->description; ?>" required>
													</div>
												</div>
											</div>
											<!-- <div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">No. of coupons on popular brands</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="row_num_popular_coupons" class="form-control" placeholder="" value="<?php echo $system_data[31]->description; ?>" required>
													</div>
												</div>
											</div> -->
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">No. of  popular coupons on home</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="home_page_popular_coupon_limit" class="form-control" placeholder="" value="<?php echo $system_data[44]->description; ?>" required>
													</div>
												</div>
											</div>
											
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Home page FAQS quantity</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="home_page_faqs" class="form-control" placeholder="" value="<?php echo $system_data[36]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="">
												<b>Voucherr email settings</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">No. of coupon on email</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="coupon_num_email" class="form-control" placeholder="" value="<?php echo $system_data[32]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">No. of Exclusive coupon on email</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="exclusive_num_coupon_email" class="form-control" placeholder="" value="<?php echo $system_data[33]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="">
												<b>Contact Settings</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> Email</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="email" class="form-control" placeholder="" value="<?php echo $system_data[1]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> Phone</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-phone"></i></span>
														<input type="text" name="phone" class="form-control" placeholder="" value="<?php echo $system_data[2]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Address</label>
												<div class="col-sm-8 col-lg-9">
													<textarea rows="5" cols="5" name="address" class="form-control" placeholder="Address"><?php echo $system_data[4]->description; ?></textarea>
												</div>
											</div>
											<div class="">
												<b>Customer support</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Customer support email</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="text" name="customer_support_email" class="form-control" placeholder="Enter email for customer support" value="<?php echo $system_data[39]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="">
												<b>Email Settings</b>
												<hr>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> SMTP Host</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-server"></i></span>
														<input type="text" name="smtp_host" class="form-control" placeholder="SMTP Host" value="<?php echo $system_data[6]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> SMTP Port</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-server"></i></span>
														<input type="text" name="smtp_port" class="form-control" placeholder="SMTP Port" value="<?php echo $system_data[7]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> Username</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon">@</span>
														<input type="text" name="smtp_username" class="form-control" placeholder="SMTP Username" value="<?php echo $system_data[8]->description; ?>" required>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> Password</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-lock"></i></span>
														<input type="text" name="smtp_password" class="form-control" placeholder="SMTP Password" value="<?php echo $system_data[9]->description; ?>" required>
													</div>
												</div>
											</div>
											<!-- <input type="hidden" id="old_email" value="<?php echo $system_data[1]->description; ?>">
											<div id="otp_section" style="display:none">
												<div class="">
													<b>You have received a 4 digits OTP code on your email <?php echo $system_data[1]->description; ?></b>
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
											</div> -->
											<div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label"> </label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<button type="sunmit" class="btn btn-success">Update System</button>
													</div>
												</div>
											</div>
											
										</div>
										<div class="col-md-4 col-lg-4 col-sm-4">
											<center>
												<?php if(empty($system_data[5]->description)){ ?>
													<img src="<?php echo base_url(); ?>assets/admin/images/admin.png" style="width:200px;">
												<?php }else{ ?>
													<img src="<?php echo base_url(); ?>uploads/admin/<?php echo $system_data[5]->description; ?>" style="width:210px;">
												<?php } ?>
												<br/>
												<br/>
												<div class="input-group  col-md-12 ">
													<span class="input-group-addon"><i class="fa fa-image"></i></span>
													<input type="file" name="system_image" class="form-control"/>
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