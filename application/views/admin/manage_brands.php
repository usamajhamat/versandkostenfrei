<?php $role_id = $this->session->userdata('role_id'); ?>
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
								if($role_id==1){
								?>
								<span style='color:green'>(Active sliders : <?php echo $active_slider;?>)</span> 
								<?php 
								}
								?>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
									<?php 
									if($role_id==1){
									?>
										<li>
											<a href="javascript:;" class="btn btn-success btn-sm" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_brand/')"> <i class="fa fa-plus"></i> Add Brand</a>
										</li>
									<?php 
									}
									?>
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								<hr>
							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<table id="simpletable" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>
												<th>#</th>
												<th>Action</th>
												<th>Name</th>
												<th>Title</th>
												<th>Brand Image</th>
												<?php 
												 if($role_id==1){
												?>
												<th>Brand Slider<small> (Atleast Twelve)</small></th>
												<?php
												
												 }
												 ?>
												<th>Status</th>
												<th>Average Rattings</th>
												<th>Total Reviews</th>
												<th>Address</th>
												<th>Fax</th>
												<th>Telephone</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											<?php $count=0; if(!empty($brands)){foreach($brands as $fetch_data): $count++; 
                                                 $this->db->select('AVG(stars) As avg_r');
												 $avg_r        = $this->db->get_where('reviews',array('brands_id'=>$fetch_data['brands_id']))->row()->avg_r;
												 $all_reviews  = $this->db->get_where('reviews',array('brands_id'=>$fetch_data['brands_id']))->num_rows();		
												?>									
											<tr>
												<td><?php echo $count; ?></td>
												<td>
													<div class="dropdown dropdown open">
														<button class="btn btn-sm btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
															<?php 
															if($role_id==1){
															?>
															<a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_brand/<?php echo $fetch_data['brands_id']; ?>')"> <i class="fa fa-pencil"></i> Edit </a>
															<a class="dropdown-item waves-light waves-effect" href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_faqs/brands/<?php echo $fetch_data['brands_id']; ?>"> <i class="fa fa-external-link"></i>Manage Faqs </a>
														    <a class="dropdown-item waves-light waves-effect" onclick="confirm_modal_action('<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_brands/delete/<?php echo $fetch_data['brands_id']; ?>');" >
															<?php
															}
															?>
														    
															<a class="dropdown-item waves-light waves-effect" href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/<?php echo $fetch_data['brands_id']; ?>/brands"> <i class="fa fa-external-link"></i>Manage Content </a>

															<a class="dropdown-item waves-light waves-effect" href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/similar_brands/<?php echo $fetch_data['brands_id']; ?>/brands"> <i class="fa fa-external-link"></i>Manage Similar brands </a>
															<?php 
															if($role_id==1){
															?>
															<a class="dropdown-item waves-light waves-effect" style="cursor:pointer;" onclick="confirm_modal_action('<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_brands/delete/<?php echo $fetch_data['brands_id']; ?>');" >
														        <i class="fa fa-trash"></i>	Delete
															</a>	
															<?php
															}
															?>
														    							
														</div>						
													</div>
												</td>
										
												<td><?php echo $fetch_data['name']; ?></td>
												<td><?php echo $fetch_data['title']; ?></td>
												<td style="background:white;"><img src="<?php echo base_url(); ?><?php echo $brands_img_url.''.$fetch_data['brand_image']; ?>" width="80px;"></td>
												<?php 
												 if($role_id==1){
												?>
												<td>
													<div class="toggle-btn  <?php if($fetch_data['brand_slider'] == "Yes"){ echo 'active'; } ?>">
													  <input type="checkbox" <?php if($fetch_data['brand_slider'] == "Yes"){ echo 'checked'; } ?> id="cb-value1" class="cb-value1" data-type="brands" value="<?php echo $fetch_data['brands_id']; ?>">
													  <span class="round-btn"></span>
													</div>
												</td>
												<?php
												 }
												?>
												<td><?php echo $fetch_data['status']; ?></td>
												<td><?php echo  round($avg_r, 2).' Star' ; ?></td>
												<td><?php echo  $all_reviews.' review'; ?></td>
												<td><?php echo $fetch_data['address']; ?></td>
												<td><?php echo $fetch_data['fax']; ?></td>
												<td><?php echo $fetch_data['tele_phone']; ?></td>
												
												
												<td><?php echo $fetch_data['email']; ?></td>
												
												
												
												
												
												
												<?php /*<td style="background:white;"><img src="<?php echo base_url(); ?><?php echo $slider_img_url.''.$fetch_data['slider_image']; ?>" width="80px;"></td>
												<td><?php  if($fetch_data['show_slider']=='1'){ echo "Yes";}else{ echo "No"; } ?></td>
												*/ ?>
												
											</tr>
											<?php endforeach; }?>
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