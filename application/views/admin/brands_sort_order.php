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
								</span> 
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li>
											
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
												<th>Action</th>
                                                <th>Brand Image</th>
												<th>Name</th>
												<th>Title</th>											
												<th>Status</th>		
											</tr>
										</thead>
										<tbody>
											<?php $count=0; if(!empty($brands)){foreach($brands as $fetch_data): $count++; 
                                                 $this->db->select('AVG(stars) As avg_r');
												 $avg_r    = $this->db->get_where('reviews',array('brands_id'=>$fetch_data['brands_id']))->row()->avg_r;
												 $all_reviews  = $this->db->get_where('reviews',array('brands_id'=>$fetch_data['brands_id']))->num_rows();		
												 
												?>
											
											<tr>
												<td><?php echo $count; ?></td>
												<td>
												<div class="dropdown dropdown open">
														<button class="btn btn-sm btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
														
														  
															<a class="dropdown-item waves-light waves-effect" href="<?php echo base_url()."admin/brands_sorting/".$fetch_data['brands_id']."/coupon";?>"> <i class="fa fa-external-link"></i>  Coupon sort order </a>
														    								
														</div>						
													</div>
													
												</td>
                                                <td style="background:white;"><img src="<?php echo base_url(); ?><?php echo $brands_img_url.''.$fetch_data['brand_image']; ?>" width="80px;"></td>
												<td><?php echo $fetch_data['name']; ?></td>
												<td><?php echo $fetch_data['title']; ?></td>
												
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