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
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<!--<li>
											<a href="javascript:;" class="btn btn-success btn-sm" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_currency')"> <i class="fa fa-plus"></i> Add Currency</a>
										</li>-->
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
												<!--<th>Gender</th>-->
												<th>Name</th>
												<th>Email</th>
												<th>Subject</th>
												<th>Message</th>
												<th>Admin Response</th>
											    <th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$count=0; if(!empty($customer_query)){foreach($customer_query as $fetch_data): $count++;  
											?>
											<tr>
												<td><?php echo $count; ?></td>
												<!--<td><?php echo $fetch_data['gender']; ?></td>-->
												<td><?php echo $fetch_data['name']; ?></td>
												<td><?php echo $fetch_data['email']; ?></td>
												<td><?php echo $fetch_data['subject']; ?></td>
												<td><?php echo $fetch_data['message']; ?></td>
												<td><?php echo $fetch_data['admin_response']; ?></td>
												<td><?php echo date('m-d-Y',strtotime($fetch_data['date_added'])); ?></td>
												<!--<td><?php //echo $fetch_data['exchange_rate_def']; ?></td>-->
								
												<td>													
													<div class="dropdown dropdown open">
														<button class="btn btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
														    <a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/customer_query_response/<?php echo $fetch_data['contact_us_id']; ?>')"> <i class="fa fa-reply"></i> reply </a>
														    <a class="dropdown-item waves-light waves-effect" onclick="confirm_modal_action('<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_customer_query/delete/<?php echo $fetch_data['contact_us_id']; ?>');" >
														        <i class="fa fa-trash"></i>	Delete
															</a>								
														</div>						
													</div>
												</td>
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