<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/icon/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/main.css?v1.0.0001">
<link href="<?php echo base_url(); ?>assets/home/css/aio.css" rel="stylesheet" media="screen">
<?php  $months_first_date = date('Y-m-d');
	   $months_last_date = date('Y-m-t');    ?>
<style>
*{
	font-family: "Open Sans",sans-serif !important;
}
.already{
	background: #ffa3a3 !important;
}
.whhte{
	background: #FFF !important;
}
.black{
	color: black !important;
}
.selecteds {
    font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    background: #605d74;
    padding: 8px;
    margin-bottom: 4px;
    cursor: pointer;
    text-align: center;
    position: relative;
}


.toggle-btn .check_ed{
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 9;
    cursor: pointer;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}
.selectedss{
	font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    background: #f19f09;
    padding: 15px;
    margin-bottom: 4px;
	cursor: pointer;
    text-align: center;
	position: relative;
}
.coupons_padd {
	height: 136px;
}
.active_se{
	background: #e39403 !important;
    border: 2px solid black;
}
.best_title_se {
    position: absolute;
    background: #5c8374;
    color: white;
    padding: 0px 5px;
    font-weight: 600;
    letter-spacing: 2px;
    font-size: 9px;
    border-radius: 1px;
    right: -1px;
    text-align: center;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 99%, 19% 48%);
    min-width: 17%;
    top: 0px;
}
.cs-coupon-more-details {
    min-height: 25px;
    padding: 4px 4px;
    border-top: 1px solid #eee;
    background-color: #fbfbfb;
}
.gif_loader{
	width: 19px;
    position: absolute;
    right: 15px;
}
.gif_loader_sub{
	width: 13px;
    position: absolute;
    right: 15px;
    top: 11px;
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
							<div style="grid-gap: 20px; display: grid; justify-content: center; margin-bottom: 36px; grid-template-columns: 30% 30% 30%;">	 
								<span class="selectedss active_se" data-type="total"><?php echo " Total voucherr    : ".$total_coupons ?><img style="display:none" class="gif_loader loader_total" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
								<span class="selectedss" data-type="selected"><?php echo " Selected voucherr : <span class='cate_seleted'>0</span>"; ?><img style="display:none"  class="gif_loader loader_select" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
								<span class="selectedss" data-type="expriry"><?php echo " Expiry  voucherr  : ".$total_expiry ?> <img style="display:none"  class="gif_loader loader_expiry" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
							</div>
								<div class="dt-responsive table-responsive" style="overflow: hidden;">
								 <form id="send_news" action="<?php echo base_url()."admin/send_newsletter/send" ?>" method="POST">
								    <div class="expiry_coupons">
									
									</div>
								    <div class="select_coupons">
									
									</div>
									<div  class="All_coupons"> 
											<?php $count=0; if(!empty($choose_coupons)){ foreach($choose_coupons as $key => $fetch_data): $count++; 
                                            $coupons_data =	$this->db->get_where('coupons',array('status'=>"Active",'categories_id'=>$fetch_data['categories_id'],'Date(end_date) > '=>date('Y-m-d')));
                                            $count_expiry =	$this->db->where('status',"Active")->where('categories_id',$fetch_data['categories_id'])->where('end_date BETWEEN "'. date('Y-m-d', strtotime($months_first_date)). '" and "'. date('Y-m-d', strtotime($months_last_date)).'"')->get('coupons')->num_rows();;
											?>											
                                            <div style="display: grid;justify-content: space-between;grid-template-columns: 40% 50%;">
												<div>
												<span style="font-size: 23px;font-weight: 600;text-decoration: underline;letter-spacing: 3px;"><?php echo $fetch_data['name']; ?></span>
												</div>
												<div style="grid-gap: 8px;display: grid;grid-template-columns: 32% 33% 33%;">	 
												<span class="selecteds" data-type="totalvoc_<?php echo $fetch_data['categories_id'];?>"><?php echo " Total voucherr    : ".$coupons_data->num_rows(); ?><img style="display:none"  class="gif_loader_sub loader_all_<?php echo $fetch_data['categories_id'];?>" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
												<span class="selecteds" data-type="totalslec_<?php echo $fetch_data['categories_id'];?>"><?php echo " Selected voucherr : <span class='cate_seleted_".$fetch_data['categories_id']."'>0</span>"; ?><img style="display:none"  class="gif_loader_sub loader_sel_<?php echo $fetch_data['categories_id'];?>" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
												<span class="selecteds" data-type="totalex_<?php echo $fetch_data['categories_id'];?>"><?php echo " Expiry  voucherr  : ".$count_expiry; ?><img  style="display:none" class="gif_loader_sub loader_ex_<?php echo $fetch_data['categories_id'];?>" src="<?php echo base_url().'assets/small_spinner.gif'?>"></span>
												</div>
											</div>
										<div class="subex_<?php echo $fetch_data['categories_id'];?>">	
										
										</div>	
										<div class="subsel_<?php echo $fetch_data['categories_id'];?>">	
										
										</div>	
										<div  class="allsub_<?php echo $fetch_data['categories_id'];?>">	
											<table id="" class=" table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>#</th>  
												<!-- 	<th>Action</th> -->
													<th>Coupon</th>											
													<th>Select for email</th>												
												</tr>
											</thead>
											<tbody>	
											<?php 
										    $coupons_array = $coupons_data->result_array();
											?>		
											<?php
											 $brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
											 $count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupons): $count++; 
											?>	
											<?php  if($coupons_data->num_rows() == 0){   ?>
											<tr>
											 <td><?php echo "No coupon available"; ?></td>
											</tr>
											 <?php   
											 }
											 else{
											 ?>				
											<tr>
												<td><?php echo $count; ?></td>
												
												<td style="width: 82%;">
												<?php 
							       
							

												$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
												$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
												if($coupons['discount_type']=="Percentage"){
													$sign = "%";
												}
												else if($coupons['discount_type']=="Fixed"){
													$sign = "&euro;";
												}
												if(empty($coupons['coupon_code'])){
													$code_text = "No code needed!"; 
												}
												else{
													$code_text = $coupons['coupon_code']; 
												}
                                                $this->db->order_by('newsletter_email_record_id',"DESC");
												$record_data = $this->db->get_where('newsletter_email_record',array('coupons_id'=>$coupons['coupons_id']));
												
												$count_record = $record_data->num_rows(); 
												if($count_record>0){
													$new_date    = $record_data->row()->sending_date;
                                                  $already = "already";
												  $black = "black";
												}
												else{
												  $already = "whhte";
												  $black = "";
												}
											?>
										
										<div class="cs-coupon-box cs-coupon-category <?php echo $already; ?>" style="width:100%">
											<div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">
												<div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $coupons['brands_id'].'_'.$coupons['coupons_id'];?>">
													<div class="cs-coupon-box-logo">
														<img class="" src="<?php echo base_url().$brand_imgs_url.$brand_image ?>" alt="<?php echo $coupons['short_tagline'];?>" title="<?php echo $coupons['short_tagline'];?>">
													</div>
													<div class="cs-coupon-logo cs-flex cs-flex-mobil right-center <?php echo $black; ?>">
														<div class="cs-coupon-logo-line-1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?> </font>
															</font>
														</div>
														<div class="cs-coupon-logo-line-3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Discount</font>
															</font>
														</div>
													</div>
												</div>
												<div class="cs-coupon-box-cell-2 cs-flex">
													<div class="cs-coupon-box-description cs-coupon-box-h3">
														<font style="vertical-align: inherit;padding-left: 10px;">
															<font style="vertical-align: inherit;">
																<?php echo $coupons['short_tagline'];?>
															</font>
														</font>
													</div>
													
													<div class="brand-width brand-bt" >
														<div class="cs-coupon-small-info bg_grey_dark show_code_div <?php echo $already; ?>" >
                                                              <span class="back_code <?php echo $coupons['coupons_id'];?>" style="width: 185px;text-align: center;" id=""> <?php echo $code_text;?> </span>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php 
													if($count_record>0){
													?>
													<div style="padding: 0px 5px;position: absolute;color: #0d0c0c;">
												    	<span><?php echo "<b>Last sended date</b> : ".date('m/d/Y',strtotime($new_date))." at ".date('h:i a',strtotime($new_date)); ?></span>
												    </div>
													
													<?php
														
													}
													?>
													<?php 
													if($coupons['special_text']){
													?>
													<div class="best_title_se">
												    	<span><?php echo "<b>".$coupons['special_text']."</b>" ?></span>
												    </div>
													<?php
														
													}
													?>
                                                </div>
												
                                                <div class="cs-coupon-more-details">
                                                    <div class="js-toggle-container cat_page">
                                                        <div class="cs-toggle-content">
                                                            <?php echo $coupons['description'];?>
                                                        </div>
                                                        <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
																	<?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
																		<span class="">
																			<font style="vertical-align: inherit;">
																				<font style="vertical-align: inherit;position: absolute;left: 49%;" class="left-setting-c"><span class="minimum-setting">Minimum</span>order value: <?php echo $coupons['min_order_price'] ?>&euro; </font>
																			</font>
																		</span>
																	<?php } ?>
																	
																		<span style="position: absolute;right: 6px;">
                                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;"><span class="display-none-one">Expries : </span><?php echo date('m/d/Y',strtotime($coupons['end_date']));?></font>
																		</span>
																	
														</div>
                                                        <div class="cs-coupon-mer-link">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;"> Show all </font>
                                                            </font>
                                                            <a href="<?php echo base_url()."home/brands/".$coupons['brands_id'];?>" target="_blank" title="Show all vouchers from <?php echo $brand_name;?>">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"><?php echo $brand_name;?></font>
                                                                </font>
                                                            </a>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;"> vouchers </font>
                                                            </font>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
												
												</td>

                                                <td>												
													<!-- <input  type="checkbox" name="cat_id[<?php echo $key; ?>]" value="<?php echo $coupons['coupons_id']; ?>"> -->
													<div class="toggle-btn  <?php if($coupons['for_email'] == "yes"){ echo 'active'; } ?>">
													  <input type="checkbox"  id="check_<?php echo $fetch_data['categories_id']; ?>"  name="checked[]"  id="cb-email" class=" check_ed" data-type="emails" value="<?php echo $coupons['coupons_id']; ?>">
													  <span class="round-btn"></span>
													</div>
												</td>
											</tr> 
											<?php } ?>
											<?php endforeach; }?>
											</tbody>										
									      </table>
									      </div>
											<?php endforeach; }?>
										</div>
									     <div style="display: flex;justify-content: flex-end;"> 
										 <input type="submit" class="btn btn-primary" style="background: #2175df;color: white;padding: 8px 25px;" value="send email">
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
