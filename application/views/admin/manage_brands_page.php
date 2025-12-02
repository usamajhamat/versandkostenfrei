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
									<li class="breadcrumb-item"><a href="#">Admin</a>
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
								<h5><?php echo $page_title; ?></h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li>
											<a href="javascript:;" class="btn btn-success btn-sm" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_brands_page')"> <i class="fa fa-plus"></i> Add Brands page</a>
										</li>
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
												<th>View</th>
												<th>Action</th>
												<th>Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$count=0; if(!empty($brands_pages)){ foreach($brands_pages as $fetch_data): $count++;  

                                                $brand_name = $fetch_data['name'];
                                                $brand_name_array = explode(" ",$brand_name);
				
                                                if(count($brand_name_array) > 0){
                                                $brand_name_new = str_replace(' ', '-', $brand_name);
                                                }
                                                else{
                                                    $brand_name_new = $brand_name;
                                                }  
											?>
											<tr>
												<td>
													<?php echo $count; ?>
												</td>
												<td>
													<a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url().$brand_name_new; ?>">View</a>
												</td>
												<td>													
													<div class="dropdown dropdown open">
														<button  class="btn btn-sm btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
														    <a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_page_brands/<?php echo $fetch_data['brands_pages_id']; ?>')"> <i class="fa fa-pencil"></i> Edit </a>	
															<a class="dropdown-item waves-light waves-effect" href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/<?php echo $fetch_data['brands_pages_id']; ?>/brands_pages"> <i class="fa fa-external-link"></i>Manage Content </a>				
														</div>
																				
													</div>
												</td>
												<td><?php echo $fetch_data['name']; ?></td>
												<td><?php echo $fetch_data['status']; ?></td>
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