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
										<a href=""> <i class="fa fa-cogs"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Admin</a>
									</li>
									<li class="breadcrumb-item"><a href=""><?php echo $page_title; ?></a>
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
								<h5><?php echo $page_title; ?></h5>
								<?php 
								 $role_id = $this->session->userdata('role_id');
								if($role_id=="1"){ ?>
								<!-- <a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Lastest" class="btn btn-primary btn-sm" > Lastest content</a>
								<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Tips" class="btn btn-primary btn-sm" > Tips content</a>
								<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Trend" class="btn btn-primary btn-sm" > Trending content</a> -->
								<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Popular" class="btn btn-primary btn-sm" > Popular content</a>
								<?php }?>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li>
											<a href="javascript:;" class="btn btn-success btn-sm" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_coupon/<?php echo $page_type; ?>')"> <i class="fa fa-plus"></i> Add Coupon</a>
										</li>
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								<hr>
							</div>
							<?php 
							// echo "<pre>";
							// print_r($coupons);
							// echo "</pre>";  
							?>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<table id="coupontable" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>
												<th>#</th>
												<th>Action</th>
												<th>Brand Tagline</th>
												<th>Brands</th>
												<th>Category</th>
												<th>Sub Category</th>
												<th>Type</th>
												<th>Special Label</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Coupon Code</th>
																						
												<th>Redemption Type</th>
												<th>Discount Type</th>
												<th>Minimum Order Value </th>
												<th>Discount Value</th>
												<th>Total votes</th>
												<th>Success Rate</th>
												
												
													
												<!--<th>Popular Order</th>
												
																							
												<th>Brands Page Order</th>												
																								
												<th>Status</th>	-->							
											</tr>
										</thead>
										<tbody>
											
										</tbody>										
									</table>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	
</script>
