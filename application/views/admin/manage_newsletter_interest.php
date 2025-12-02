<style>
.tag{
	background: #ededed;
    padding: 6px;
    border-radius: 10px;
    font-size: 11px;
}
.tags{
	background: #ededed;
    padding: 6px;
    border-radius: 10px;
    font-size: 11px;
}
.cross{
	cursor: pointer;
    font-size: 10px;
}
</style>
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
												<!-- <th>Email</th>
												<th>Accept Privacy</th -->
												<!--<th>Date</th>-->
												<!--<th>Action</th>-->
												<th>Cat_Name</th>
												<th>Select Brand</th>
											</tr>
										</thead>
										<tbody>
											<?php 
		                                    /*echo "<pre>";
		                                    print_r($details);
		                                    echo "</pre>";*/
											$count=0; if(!empty($details)){foreach($details as $fetch_data): $count++;  
                                             $this->db->group_by('brands_id');
                                             $brand_data = $this->db->get_where('brands',array('status'=>'Active'))->result_array();
	                                         $news_intrests = $this->db->get_where('newsletter_interests',array('categories_id'=>$fetch_data['categories_id']))->result_array();
											?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $fetch_data['name']; ?></td>
												<td style="background: white;">
												    
													<div style="background:white;padding: 6px;display: flex;grid-gap: 8px;" class="all_tags" id="tags_<?php echo $fetch_data['categories_id']?>">
													<?php
													 if(!empty($news_intrests)){
													 foreach($news_intrests as $intrests_brnd){
													   $brand_id = $intrests_brnd['brands_id'];
													   $all_brands = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row();
													   $brand_name = $all_brands->name;
													  
													   
													?>
													<div class="tag" id="<?php echo $brand_id;?>">
													  <span>
													    <?php echo $brand_name; ?> <span class="cross" data-cats_id="<?php echo $fetch_data['categories_id']?>" data-brands_id= "<?php echo $brand_id;?>">&#x2715 </span>
													  </span>
													 </div>
													
													<?php   
												    }
													 }
													 else{
													 ?>
													 <div class="tags no_<?php echo $fetch_data['categories_id']?>">
													  <span>
													    No category interests 
													  </span>
													 </div>
													 <?php
													 }
													?>
													
						
													</div>
												    <div style="width: 95%;">
													<?php 
													   $total = count($news_intrests); 
													?>
													  <select name="" data-cat="<?php echo $fetch_data['categories_id']?>" id="select_<?php echo $fetch_data['categories_id']?>" class="form-control select_brands" style="height: 29px; <?php if($total >5){ echo "display:none;"; }?>">
														<option value="">Select brands</option>
														<?php
														   
														 foreach($brand_data as $brnd){
					                                           $brand_id = $brnd['brands_id'];
					                                           $all_brands = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row();
					                                           $brand_name = $all_brands->name;
					                                           $brand_id   = $all_brands->brands_id;
					                                           
					                                        ?>
					                                        <option value="<?php echo $brand_id;?>" id="<?php echo  $brand_name;?>"><?php echo $brand_name;?></option>
					                                        
					                                        <?php   
					                                       } ?>
													</select> 
													 
													</div>
													
												</td>
												
								
												<!--<td>													
													<div class="dropdown dropdown open">
														<button class="btn btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
														    <a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/customer_query_response/<?php echo $fetch_data['contact_us_id']; ?>')"> <i class="fa fa-reply"></i> reply </a>
														    <a class="dropdown-item waves-light waves-effect" onclick="confirm_modal_action('<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_currencies/delete/<?php echo $fetch_data['contact_us_id']; ?>');" >
														        <i class="fa fa-trash"></i>	Delete
															</a>								
														</div>						
													</div>
												</td> -->
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