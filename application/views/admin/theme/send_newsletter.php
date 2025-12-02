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
										<li>
											<!-- <a href="javascript:;" class="btn btn-success btn-sm" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_brand/')"> <i class="fa fa-plus"></i> Add Brand</a> -->
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
								 <form action="<?php echo base_url()."admin/send_newsletter/send" ?>" method="POST">
									
											<?php $count=0; if(!empty($choose_coupons)){ foreach($choose_coupons as $key => $fetch_data): $count++; 

                                            $coupons_data =	$this->db->get_where('coupons',array('status'=>"Active",'categories_id'=>$fetch_data['categories_id'],'Date(end_date) > '=>date('Y-m-d')));
												?>

											<?php if($coupons_data->num_rows() > 0){  ?>
											<span style="font-size: 23px;font-weight: 600;text-decoration: underline;letter-spacing: 3px;"><?php echo $fetch_data['name']; ?></span>	
											<table id="" class="simpletable table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>#</th>
												<!-- 	<th>Action</th> -->
													<th>Title</th>
													<th>Brand</small></th>
													<th>Discount type</th>
													<th>Discount value</th>
													<th>Status</th>
													<th>End date</th>												
													<th>Select for email</th>												
												</tr>
											</thead>
											<tbody>	
											<?php 
										    $coupons_array =$coupons_data->result_array();
											?>		
											<?php $count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupon_data): $count++; 
												?>					
											<tr>
												<td><?php echo $count; ?></td>
												
												<td><?php echo $coupon_data['short_tagline']; ?></td>
												<td><?php echo $this->db->get_where('brands', array('brands_id'=>$coupon_data['brands_id']))->row()->name; ?></td>
												<td><?php echo $coupon_data['discount_type']; ?></td>
												<td><?php echo $coupon_data['discount_value']; ?></td>
												<td><?php echo $coupon_data['status']; ?></td>											
												<td><?php echo $coupon_data['end_date']; ?></td>
                                                <td>
													
													<!-- <input  type="checkbox" name="cat_id[<?php echo $key; ?>]" value="<?php echo $coupon_data['coupons_id']; ?>"> -->
													<div class="toggle-btn  <?php if($coupon_data['for_email'] == "yes"){ echo 'active'; } ?>">
													  <input type="checkbox" name="checked[]" <?php if($coupon_data['for_email'] == "yes"){ echo 'checked'; } ?> id="cb-email" class="cb-value cb-value1" data-type="emails" value="<?php echo $coupon_data['coupons_id']; ?>">
													  <span class="round-btn"></span>
													</div>
												</td>
											</tr> 
											<?php endforeach; }?>
											</tbody>										
									      </table>
										  <?php } ?>
											<?php endforeach; }?>
										
									     <div style="display: flex;justify-content: flex-end;"> 
										 <input type="submit" class="btn btn-primary" value="send email">
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
</div>