<?php  $date= date("Y-m-d"); ?>
<style>
   
    .d-flex {
        display: flex;
    }

    .alert_box {
        background-color: #fff;
        padding: 10px;
        margin: 10px auto;
        margin-left: 20px;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .box_para {
        color: #3c5154 !important;
        font-size: 13px;
        font-weight: 600;
    }

    .box_heading {
        font-family: revert;
        color: #5c8374;
    }

    .subscribe_form {
        display: flex;
    }

    .box_alert_img>img {
        width: 130px;
    }

    .subscribe_field {
        height: 30px !important;
        font-size: 13px;
        border-radius: 5px !important;
        width: 100% !important;
    }

    .subscribe_btn {
        background-color: #5c8374;
        color: #fff;
        height: 30px !important;
        border: none;
        border-radius: 5px;
        left: -7px;
        position: relative;
        width: 100px !important;
    }

    .txt_box {
        margin-top: 10px;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .mt-2 {
        margin-top: 20px;
    }

    .cat_box {
        padding: 0px 0 10px 0px;
        background-color: #f5f5f5;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .cat_content {
        margin-left: 0px;
    }

    .cat_intro {
        width: 100%;
        background-color: #fff;
        padding: 4px 20px 0px 20px;
        font-size: 18px;
        line-height: 1.7;
        min-height: 92px;

    }

    .see_all {
        color: #5c8374 !important;
        font-weight: 600;
        font-size: 15px;
        margin-right: 20px;
    }


    .full_width {
        width: 100%;
    }


    .brd_ima {
        padding: 4px;
    }

    .brand {
        vertical-align: inherit;
        font-size: 16px;
        font-weight: bold;
        text-shadow: 1px 1px 1px #5c8374;
        letter-spacing: 2px;
    }
    .brand-bt{
        width: 44%;
        padding-left: 4%;
    }
    .side-width{
        width: 280px;
    }
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
    <!--Breadcrumps -->
    <div class="clearfix"></div>
    <div class="container">
        <div class="main-content-container cs-flex">
            <!--Main Content -->
            <div class="">
                <!-- Content all_categories-->
                <?php 
					// $static_newsletter = $this->db->get_where('static_content', array('type'=>'newsletter'))->row();
					// $newsletter_title = $static_newsletter->title;
					// $newsletter_desc = $static_newsletter->description;
					// $newsletter_img = $static_newsletter->image;
					$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
				?>
                <div class="cs-all-categories-content">
               
                    <?php
						
						$cat_img_url     = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;
						$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
					?>
                   
               
                  
                    <section>
                        <?php 
						    $cat_img_url = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;
						    $text_limit = "300";
							foreach($get_sub_categories as $key=> $fetch_data){
								$cat_id = $fetch_data['categories_id'];
								$sub_categories_id = $fetch_data['sub_categories_id'];
								$cat_name = $fetch_data['name'];
								$cat_image = $fetch_data['sub_cat_image'];
								$cat_desc = $fetch_data['description'];
								/* $font_icon = $fetch_data['font_icon']; */
							
								
						?>
                        <style>
                       
                        </style>
                        <div class="heading-setting-cat" style="display:none;margin-top: 64px;"> <h3 style="line-height: 1.3;color: #5c8374;line-height: 1.3;color: #5c8374;font-size: 18px;font-weight: bold;background-color: white;box-shadow: 0px 0px 6px rgb(180 180 180);padding: 13px;margin-top: 25px;"><?php echo $fetch_data['heading'];?></h3></div>
                        <div class="cs-all-cats-row cat_box" style="background: transparent; box-shadow: none !important; border: 1px solid transparent !important;">
                            
                            <div class="cs-all-cats-info cs-flex cs-flex-mobil" style="box-shadow: 0px 0px 6px rgb(180, 180, 180); border: 1px solid #ddd;">
                                <!-- <div class="cs-all-cats-img" style="">
                                    <div style="padding: 18px;height: 200px;width: 415px;">
                                        <img src="<?php echo base_url().$cat_img_url.$cat_image ?>  " class="hover_img" style="width: 100%;height: 100%;" />
                                    </div>
                                </div> -->
                                <div class="cs-all-cats-desc cs-flex cat_content full_width">
                                    <div class="cs-all-cats-intro cat_intro">
                                        <font style="vertical-align: inherit;">
										 <font style="vertical-align: inherit;" >
                                                <h3 style="line-height: 1.3;color: #5c8374;"><?php echo $fetch_data['heading'];?></h3>
                                            </font>
                                           <font style="vertical-align: inherit;">
                                                <?php echo substr($cat_desc,0,$text_limit); ?>
                                                <span style="display:none" id="see_<?php echo $cat_id;?>">
                                                    <?php echo substr($cat_desc,$text_limit) ?>
                                                </span>
                                                <?php if(strlen($cat_desc)>$text_limit) {?>
                                                <span class="see_more  " data-type="see more" id="saw_<?php echo $cat_id;?>">Weiterlesen</span>
                                                <?php }?>
                                            </font>

                                        </font>
                                        <?php 
													//echo strlen($cat_desc);
												?>
                                    </div>
                                    <!--<p>more on the subject</p>-->
                                    
                                
                                </div>
                            </div>
                        </div>
                        <?php }  ?>
                    </section>
                    <?php
					 if(!empty($param)){
					?>
                    <section>

                        <div class="main-content-container cs-flex">
                            <!-- Main Mer Content -->
                            <div class="cs-main-left">
                                <!-- Category Merchant Slider -->
                                <!-- <div carousel="shops" class="Nfw7 brand_bar" style="transform: translateX(0px); transition: transform 200ms cubic-bezier(0.4, 0, 1, 1) 0s;">
							   <div class="container-fluid carousel_container">
									<div class="row">
									   <div class="col-md-12">
										  <div class="carousel carousel-showmanymoveone slide" id="carousel-tilenav" data-interval="false">
											 <div class="carousel-inner">
												<?php 
													$get_brands_top = $this->db->get_where('brands', array('status'=>'Active'))->result_array();
													$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
													$brand_slider_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
													$count = 0;
													foreach($get_brands_top as $fetch_data){
														$brand_img = $fetch_data['brand_image'];
														$brand_name = $fetch_data['name'];
														$brands_id = $fetch_data['brands_id'];
														$active = '';
														if($count == 0){
															$active = 'active';									
														}
												?>
                                                 <?php
                                                    $brand_name_new = "";
                                                    $brand_name_array = explode(" ",$brand_name);
                                                    if(count($brand_name_array) >0){
                                                        $brand_name_new = str_replace(' ', '-', $brand_name);
                                                    }
                                                ?>
														<div class="item <?php echo $active ?>">
														   <div class="col-xs-1 col-sm-1 col-md-1 brand_col">
															<a class="brand_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>">
																<img src="<?php echo base_url().$brand_img_url.$brand_img ?>" class="img-responsive brnd_image">
															</a>
														   </div>
														</div>
													<?php $count++; } ?>
											 </div>
											 <a class="left carousel-control carousel_btn" href="#carousel-tilenav" id="next_slide" data-slide="prev"><i style="position: relative; left: -70%; font-size: 40px;top: 17%;" class="fa fa-angle-left"></i></a>
											 <a class="right carousel-control carousel_btn" href="#carousel-tilenav" id="prev_slide" data-slide="next"><i style="position: relative; left: 70%; font-size: 40px;top: 17%;" class="fa fa-angle-right"></i></a>
										  </div>
									   </div>
									</div>
								</div>
							</div>-->
                            <?php 
                            //   setlocale(LC_TIME, 'de_DE', 'de_DE.UTF-8');
                          
                            ?>
                                <h2 class="cs-cat-h2 cs-text-highlight font-size-w" style="margin-top:10px;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"><?php echo $total_coupons." "; ?> Gutscheine in der Kategorie <?php echo $category_name; ?> im <?php echo strftime("%B")." ".strftime("%Y")?> </font>
                                    </font>
                                </h2>
                                
                                <section class="cs-category-showbox cs-coupon-large-box">
                                    <div class=" coupons_details_cate" id="coupons_details">
                                        <ul class="nav nav-tabs tabs_filter alignment-grid">
                                            <!--<li class="active li_items"><a data-toggle="tab" class="filter" href="#all">All Coupons <b>(<?php echo $total_coupons;?>)</b></a></li>-->
                                            <li class="<?php if($active_tab=="Coupon"){ echo "active"; } ;?>  li_items li-1st"><a data-toggle="tab" class="filter  second-width" href="#coupons">Gutscheincode <b class="bold_counter">(<?php echo $count_coupons;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Offer"){ echo "active"; } ;?>  li_items"><a data-toggle="tab" class="filter" href="#offers">Rabatt <b class="bold_counter">(<?php echo $total_offers;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Deals"){ echo "active"; } ;?>   li_items"><a data-toggle="tab" class="filter" href="#deals">Angebote <b class="bold_counter">(<?php echo $total_deals;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Free Shipping"){ echo "active"; } ;?>  li_items"><a data-toggle="tab" class="filter" href="#shipping" >Kostenloser Versand <b class="bold_counter">(<?php echo $total_shipping;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Free Items"){ echo "active"; } ;?>   li_items"><a data-toggle="tab" class="filter" href="#items">Kostenlose Artikel <b class="bold_counter">(<?php echo $total_items;?>)</b></a></li>
                                        </ul>
                               <?php /* <div style="display:none;" class="show-redem">
                                    <div class="cs-filter-title" style="padding-top:43px;">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Einlösungsart</font>
                                        </font>
                                    </div>
                                    <ul id="" class="cs-filter-ul cs-filter-scroll">
                                        <li class="cs-filter-li"> <input class="cs-filter-input checkbox" date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="<?php echo $cat_id;?>" type="checkbox" id="Existing" data-checkId="Existing"> <label class="cs-filter-label" for="Existing">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Bestehender Kunde </font>
                                                </font>
                                            </label> </li>
                                        <li class="cs-filter-li"> <input class="cs-filter-input checkbox" date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="<?php echo $cat_id;?>" type="checkbox" id="New" data-checkId="Existing"> <label class="cs-filter-label" for="New">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Neukunde</font>
                                                </font>
                                            </label> </li>
                                    </ul>
                                </div> */ ?>
                                
									<div class="tab-content" style="padding-top: 10px;">
										    <!--<form id="voucher" method="post" action="">-->
												
											 <!-- </form>-->
											
										<div id="coupons" class="tab-pane fade  <?php if($active_tab=="Coupon"){ echo "in active"; } ;?>">
											<?php
                                              if(!empty($just_coupons)){											
												foreach($just_coupons as $key => $coupons){
                                                    
													$category_id = $coupons['categories_id'];
													$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
													$cat_image = $category_details['cat_image'];
													$cat_name = $category_details['name'];
													//echo($coupons['special_text']);exit;
													if($coupons['discount_type']=="Percentage"){
														$sign = "%";
													}
													else if($coupons['discount_type']=="Fixed"){
														$sign = "&euro;";
													}
													else{
														$sign = "";
													}
													if(empty($coupons['coupon_code'])){
														$code_text = "Kein Code benötigt!"; 
													}
													else{
														$code_text = $coupons['coupon_code']; 
													}
									
													$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
												
                                        
                                                    $brand_name_new = "";
                                                    $brand_name_array = explode(" ",$brand_name);
                                                    if(count($brand_name_array) >0){
                                                        $brand_name_new = str_replace(' ', '-', $brand_name);
                                                    }
													?>
													<div class="cs-coupon-box cs-coupon-merchant js-fp open_brand" data-url="<?php echo base_url().'marken/'.$brand_name_new;?>" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil_my coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
															<?php

																if($coupons['discount_type']=="Custom"){
																	
																?>
																	<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																		<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 18px;line-height: 0;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																		<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
																	</div>
																<?php
																}
																else{

																?>
																<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																	<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																	<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>
																</div>
																<?php } ?>
															</div>

															<div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">

																<div class=" cs-coupon-box-h3 self_cpn_box" >
																		<div class="text_cpn_box">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																		<br>
																		<div>
																		<small style="font-size: 12px;vertical-align: inherit;">
																			<?php echo $coupons['description'];?>
																		</small>
																		</div>
																		</div>

																		
																		<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="show">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>" > <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php	} 
																		else{
																			?>
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																		?>
																		  <?php
																		 }
																		}
																		else{
																		?>
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																					echo "show";
																				}else{
																					echo "show_code_cover";
																				}?>">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>"> <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php
																		}
																		?>	
																			
																	</div>
																	</div> 
																	</div>
																	 
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
														</div>
														
													</div>
											<?php
											 }
	                                        } else{ ?>
											<div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
												   <div class="cs-coupon-more-details">
												   Keine Gutscheine verfügbar	
												   </div>
												</div>
											<?php } 
											
											if(!empty($typo)){

												if($typo !='Coupon'){
													$page_num = "1";
												} 
												else{
													$page_num = $page; 
												}
									     	}
											 else{
                                                $page_num = $page; 
                                            }
																				
										 ?>   
											<!-- pagination -->
                                          
											<div class="row cs-pagination">
													<ul class="pagination">
														<?php if($count_coupons <= $page_limit_initial){ ?>
														   <li class="" >
															<a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li> 
														<?php } else { ?>
														<?php $pages = ceil($count_coupons/$page_limit_initial); ?>
														<?php $pages_limit = $total_page_limit_initial; ?>
														<?php if(!empty($page) && $page_num > 1){ ?>
														<li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
														<?php } ?>
														<?php for($i = 1; $i<=$pages; $i++){ ?>
															<?php if($page_num >= $pages_limit){ ?>
																<?php if($i >= $pages_limit){ ?>
																	<?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
																	<?php if($i >= $page_num){ ?>
																		<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } else { ?>
																<?php if($i <= $pages_limit){ ?>
																	<?php if(empty($page_num) && $i == 1){ ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url();?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
																	<?php } else { ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } ?>
														<?php } ?>
														<?php if(!empty($page) && $pages<$page_num){ ?>
														<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
														<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } else if($pages != $page_num){ ?>
														
														<!-- <li>
															<span class="cs-pagination-item">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">...</font>
																</font>
															</span>
														</li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
														<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
															<a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } ?>
													<?php } ?>
												</ul>											
											</div> 
											<!-- pagination -->
										</div>
										<div id="offers" class="tab-pane fade  <?php if($active_tab=="Offer"){ echo "in active"; } ;?>">
											<?php 
											  if(!empty($all_offers)){
												foreach($all_offers as $key => $coupons){
													$category_id = $coupons['categories_id'];
													$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
													$cat_image = $category_details['cat_image'];
													$cat_name = $category_details['name'];
													
													if($coupons['discount_type']=="Percentage"){
														$sign = "%";
													}
													else if($coupons['discount_type']=="Fixed"){
														$sign = "&euro;";
													}
													else{
														$sign = "";
													}
													if(empty($coupons['coupon_code'])){
														$code_text = "Kein Code benötigt!"; 
													}
													else{
														$code_text = $coupons['coupon_code']; 
													}
											?>
													<div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
															<?php

																if($coupons['discount_type']=="Custom"){
																	
																 ?>
																	<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																		<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 18px;line-height: 0;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																		<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
																	</div>
																 <?php
																}
																else{
															
															?>
																<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																	<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																	<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>
																</div>
         													<?php } ?>
																
																
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">

																<div class=" cs-coupon-box-h3 self_cpn_box" >
																		<div class="text_cpn_box">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																		<br>
																		<div>
																		<small style="font-size: 12px;vertical-align: inherit;">
																			<?php echo $coupons['description'];?>
																		</small>
																		</div>
																		</div>

																		
																		<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="show">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>" > <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php	} 
																		else{
																			?>
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																		?>
																		  <?php
																		 }
																		}
																		else{
																		?>
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																					echo "show";
																				}else{
																					echo "show_code_cover";
																				}?>">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>"> <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php
																		}
																		?>	
																			
																	</div>
																	</div> 
																	</div>
																	 
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
																	
														</div>
														
														
													</div>
													
											<?php 
											 }
	                                        } else { ?>
												<div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
												   <div class="cs-coupon-more-details">
												   Keine Gutscheine verfügbar	
												   </div>
												</div>
											<?php }    
											if(!empty($typo)){
												if($typo !='Offer'){
													$page_num = "1";
												}
												else{
													$page_num = $page; 
												}
										    }
											else{
                                                $page_num = $page; 
                                            }
											
											?>
											<!-- pagination -->
                                              
                                            <div class="row cs-pagination">
                                                    <ul class="pagination">
                                                        <?php if($total_offers <= $page_limit_initial){ ?>
                                                         <li class="" >
                                                            <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                        <?php } else { ?>
                                                        <?php $pages = ceil($total_offers/$page_limit_initial); ?>
                                                        <?php $pages_limit = $total_page_limit_initial; ?>
                                                        <?php if(!empty($page) && $page_num > 1){ ?>
                                                        <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                        <?php } ?>
                                                        <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                            <?php if($page_num >= $pages_limit){ ?>
                                                                <?php if($i >= $pages_limit){ ?>
                                                                    <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                    <?php if($i >= $page_num){ ?>
                                                                        <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php if($i <= $pages_limit){ ?>
                                                                    <?php if(empty($page_num) && $i == 1){ ?>
                                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                        <a class="cs-pagination-item" href="<?php echo base_url();?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                    <?php } else { ?>
                                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                        <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if(!empty($page) && $pages<$page_num){ ?>
                                                        <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                        <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                        <?php } else if($pages != $page_num){ ?>
                                                        
                                                        <!-- <li>
                                                            <span class="cs-pagination-item">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">...</font>
                                                                </font>
                                                            </span>
                                                        </li>
                                                        <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                        <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                            <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </ul>											
                                                </div> 
                                                <!-- pagination -->
										</div>
										<div id="deals" class="tab-pane fade   <?php if($active_tab=="Deals"){ echo "in active"; } ;?>">
											<?php 
											  if(!empty($just_deals)){
												foreach($just_deals as $key => $coupons){
													$category_id = $coupons['categories_id'];
													$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
													$cat_image = $category_details['cat_image'];
													$cat_name = $category_details['name'];
													
													if($coupons['discount_type']=="Percentage"){
														$sign = "%";
													}
													else if($coupons['discount_type']=="Fixed"){
														$sign = "&euro;";
													}
													else{
														$sign = "";
													}
													if(empty($coupons['coupon_code'])){
														$code_text = "Kein Code benötigt!"; 
													}
													else{
														$code_text = $coupons['coupon_code']; 
													}
											?>
													<div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
															<?php

																	if($coupons['discount_type']=="Custom"){
																		
																	?>
																		<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																			<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 18px;line-height: 0;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																			<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
																		</div>
																	<?php
																	}
																	else{

																	?>
																	<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																		<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																		<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>
																	</div>
																	<?php } ?>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">

																<div class=" cs-coupon-box-h3 self_cpn_box" >
																		<div class="text_cpn_box">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																		<br>
																		<div>
																		<small style="font-size: 12px;vertical-align: inherit;">
																			<?php echo $coupons['description'];?>
																		</small>
																		</div>
																		</div>

																		
																		<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="show">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>" > <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php	} 
																		else{
																			?>
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																		?>
																		  <?php
																		 }
																		}
																		else{
																		?>
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																					echo "show";
																				}else{
																					echo "show_code_cover";
																				}?>">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>"> <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php
																		}
																		?>	
																			
																	</div>
																	</div> 
																	</div>
																	 
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
																	
														</div>
														
														
													</div>
											<?php 
											 }
	                                        } else { ?>
												<div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
												   <div class="cs-coupon-more-details">
												   Keine Gutscheine verfügbar	
												   </div>
												</div>
											<?php }  
											if(!empty($typo)){
												if($typo !='Deals'){
													$page_num = "1";
												}
												else{
													$page_num = $page; 
												}
										    }
											else{
                                                $page_num = $page; 
                                            }
											?>
											<!-- pagination -->
											<div class="row cs-pagination">
													<ul class="pagination">
														<?php if($total_deals <= $page_limit_initial){ ?>
														   <li class="" >
															<a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li> 
														<?php } else { ?>
														<?php $pages = ceil($total_deals/$page_limit_initial); ?>
														<?php $pages_limit = $total_page_limit_initial; ?>
														<?php if(!empty($page) && $page_num > 1){ ?>
														<li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
														<?php } ?>
														<?php for($i = 1; $i<=$pages; $i++){ ?>
															<?php if($page_num >= $pages_limit){ ?>
																<?php if($i >= $pages_limit){ ?>
																	<?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
																	<?php if($i >= $page_num){ ?>
																		<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } else { ?>
																<?php if($i <= $pages_limit){ ?>
																	<?php if(empty($page_num) && $i == 1){ ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url();?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
																	<?php } else { ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } ?>
														<?php } ?>
														<?php if(!empty($page) && $pages<$page_num){ ?>
														<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
														<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } else if($pages != $page_num){ ?>
														
														<!-- <li>
															<span class="cs-pagination-item">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">...</font>
																</font>
															</span>
														</li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
														<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
															<a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } ?>
													<?php } ?>
												</ul>											
											</div>
											<!-- pagination -->
										</div>
										<div id="shipping" class="tab-pane fade   <?php if($active_tab=="Free Shipping"){ echo "in active"; } ;?>">
											<?php 
											  if(!empty($just_shipping)){
												foreach($just_shipping as $key => $coupons){
													$category_id = $coupons['categories_id'];
													$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
													$cat_image = $category_details['cat_image'];
													$cat_name = $category_details['name'];
													
													if($coupons['discount_type']=="Percentage"){
														$sign = "%";
													}
													else if($coupons['discount_type']=="Fixed"){
														$sign = "&euro;";
													}
													else{
														$sign = "";
													}
													if(empty($coupons['coupon_code'])){
													    $code_text = "Kein Code benötigt!"; 
													}
													else{
														$code_text = $coupons['coupon_code']; 
													}
											?>
													<div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
															<?php

																if($coupons['discount_type']=="Custom"){
																	
																?>
																	<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																		<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 18px;line-height: 0;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																		<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
																	</div>
																<?php
																}
																else{

																?>
																<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																	<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																	<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>
																</div>
																<?php } ?>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">

																<div class=" cs-coupon-box-h3 self_cpn_box" >
																		<div class="text_cpn_box">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																		<br>
																		<div>
																		<small style="font-size: 12px;vertical-align: inherit;">
																			<?php echo $coupons['description'];?>
																		</small>
																		</div>
																		</div>

																		
																		<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="show">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>" > <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php	} 
																		else{
																			?>
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																		?>
																		  <?php
																		 }
																		}
																		else{
																		?>
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																					echo "show";
																				}else{
																					echo "show_code_cover";
																				}?>">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>"> <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php
																		}
																		?>	
																			
																	</div>
																	</div> 
																	</div>
																	 
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
														</div>
														
														
													</div>
											<?php 
											 }
	                                        } else { ?>
												<div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
												   <div class="cs-coupon-more-details">
												   Keine Gutscheine verfügbar	
												   </div>
												</div>
											<?php } 
											if(!empty($typo)){
												if($typo !='Shipping'){ 
													$page_num = "1";
												}
												else{
													$page_num = $page; 
												}
									     	}
											 else{
                                                $page_num = $page; 
                                            }
											?>
											<!-- pagination -->
											<div class="row cs-pagination">
                                            <ul class="pagination">
                                                <?php if($total_shipping <= $page_limit_initial){ ?>
                                                   <li class="" >
                                                    <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                <?php } else { ?>
                                                <?php $pages = ceil($total_shipping/$page_limit_initial); ?>
                                                <?php $pages_limit = $total_page_limit_initial; ?>
                                                <?php if(!empty($page) && $page_num > 1){ ?>
                                                <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                <?php } ?>
                                                <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                    <?php if($page_num >= $pages_limit){ ?>
                                                        <?php if($i >= $pages_limit){ ?>
                                                            <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                            <?php if($i >= $page_num){ ?>
                                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if($i <= $pages_limit){ ?>
                                                            <?php if(empty($page_num) && $i == 1){ ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url();?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                            <?php } else { ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if(!empty($page) && $pages<$page_num){ ?>
                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } else if($pages != $page_num){ ?>
                                                
                                                <!-- <li>
                                                    <span class="cs-pagination-item">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">...</font>
                                                        </font>
                                                    </span>
                                                </li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                    <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>											
                                    </div>  
											<!-- pagination -->
										</div>
										<div id="items" class="tab-pane fade   <?php if($active_tab=="Free Items"){ echo "in active"; } ;?>">
											<?php 
											  if(!empty($just_items)){
												foreach($just_items as $key => $coupons){
													$category_id = $coupons['categories_id'];
													$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
													$cat_image = $category_details['cat_image'];
													$cat_name = $category_details['name'];
													
													if($coupons['discount_type']=="Percentage"){
														$sign = "%";
													}
													else if($coupons['discount_type']=="Fixed"){
														$sign = "&euro;";
													}
													else{
														$sign = "";
													}
													if(empty($coupons['coupon_code'])){
															$code_text = "Kein Code benötigt!"; 
													}
													else{
														$code_text = $coupons['coupon_code']; 
													}
											?>
											       
													<div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" >
															
															<div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																
															<?php

																	if($coupons['discount_type']=="Custom"){
																		
																	?>
																		<div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
																			<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 18px;line-height: 0;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																			<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
																		</div>
																	<?php
																	}
																	else{

																	?>
																	<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																		<div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font></font></div>
																		<div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>
																	</div>
																	<?php } ?>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">

																<div class=" cs-coupon-box-h3 self_cpn_box" >
																		<div class="text_cpn_box">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																		<br>
																		<div>
																		<small style="font-size: 12px;vertical-align: inherit;">
																			<?php echo $coupons['description'];?>
																		</small>
																		</div>
																		</div>

																		
																		<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="show">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>" > <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php	} 
																		else{
																			?>
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																				<div class="cs-coupon-btn_my " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																		?>
																		  <?php
																		 }
																		}
																		else{
																		?>
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$coupons['coupons_id'];?>">
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){
																					echo "show";
																				}else{
																					echo "show_code_cover";
																				}?>">
																					<i class="fa fa-euro"></i>
																					<span>Gutschein anzeigen</span>
																				</span>
																				<span class="back_code <?php echo $coupons['coupons_id'];?>"> <?php echo $code_text;?> </span>
																			</span>
																		</button>
																		<?php
																		}
																		?>	
																			
																	</div>
																	</div> 
																	</div>
																	 
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>

														</div>
													
														
													</div>
											<?php 
											 }
	                                        } else { ?>
												<div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
												   <div class="cs-coupon-more-details">
												   Keine Gutscheine verfügbar	
												   </div>
												</div>
											<?php } 
											if(!empty($typo)){
												if($typo !='Items'){
													$page_num = "1";
												}
												else{
													$page_num = $page; 
												}
										   }
										   else{
												$page_num = $page; 
											}
											 ?>
										    <!-- pagination -->
										 <div class="row cs-pagination">
                                            <ul class="pagination">
                                                <?php if($total_items <= $page_limit_initial){ ?>
                                                   <li class="" >
                                                    <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                <?php } else { ?>
                                                <?php $pages = ceil($total_items/$page_limit_initial); ?>
                                                <?php $pages_limit = $total_page_limit_initial; ?>
                                                <?php if(!empty($page) && $page_num > 1){ ?>
                                                <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                <?php } ?>
                                                <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                    <?php if($page_num >= $pages_limit){ ?>
                                                        <?php if($i >= $pages_limit){ ?>
                                                            <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                            <?php if($i >= $page_num){ ?>
                                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if($i <= $pages_limit){ ?>
                                                            <?php if(empty($page_num) && $i == 1){ ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url();?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                            <?php } else { ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if(!empty($page) && $pages<$page_num){ ?>
                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } else if($pages != $page_num){ ?>
                                                
                                                <!-- <li>
                                                    <span class="cs-pagination-item">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">...</font>
                                                        </font>
                                                    </span>
                                                </li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                    <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>home/sub_categories/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>											
                                    </div>
											<!-- pagination -->
										</div>
									</div>
                            </div>
                            <style>
                                .cat_description {
                                    background-color: #fff;
                                    padding: 14px;
                                    font-size: initial;
                                    line-height: 1.6;
                                }
                            </style>
                            
                            <section class="cs-home-selection cs-home-mer-box " style="margin-bottom:20px">
                                    <?php 
                                    $brands_content =  $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('categories_id'=>$categories_id,'type'=>'catogery','status'=>'Active'))->result_array();
                                    foreach($brands_content as $b_content){
                                    ?>
                                    <div class="" style="margin-top: 20px;">
                                        <h4 class="cs-home-h rem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $b_content['heading'] ?> </font></font></h4>
                                        <div class="cs-merchant-coupons-table cs-merchant-coupons-table-updated" style="box-shadow: 0px 0px 6px rgb(180 180 180); padding: 14px 16px; line-height: 2; font-size: 16px;">
                                            <p> <?php echo $b_content['description'] ?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </section>
                    </section>
                    <a name="description"></a>
                </div>
                <!--Sidebar -->
                <div class="cs-sidebar-right c-width">
                    <aside id="cs-sidebar">
                        <!-- Filter -->
                        <?php /* echo $total_coupons; */?>
                        <div class="cs-sidebar-item cs-filter" style="position:relative;">

                            <div class=" cs-filter-reset cs-flex" onclick="ga('send','event','Filter - Kategorie','Urlaub &amp; Reise','Reset');"> <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        reset filter
                                    </font>
                                </font>
                            </div>
                            <!-- <div>
									   <div class="cs-filter-title">
										   <font style="vertical-align: inherit;">
											  <font style="vertical-align: inherit;">Providers</font> 
										   </font>
									   </div>
									   <div class="cs-filter-form"> <i class="cs-filter-i fa fa-search" aria-hidden="true"></i>
											<input id="" class="cs-filter-search" type="search" placeholder="Look for more shops"> 
									   </div>
									   <ul id="" class="cs-filter-ul cs-filter-scroll" >
											<?php
												$this->db->group_by('brands_id');
												$this->db->order_by('brands_id','ASC');
												$get_all_brands  = $this->db->get_where('coupons', array('status'=>'Active','categories_id'=>$param))->result_array();
												foreach($get_all_brands as $brands){					
													$brand_name = $this->db->get_where('brands',array('brands_id'=>$brands['brands_id']))->row()->name;
											 ?>
													<li class="cs-filter-li">
														 <input class="cs-filter-input checkbox" name="check_filter" data-brandid="0" data-cateId="<?php echo $brands['categories_id']?>" type="checkbox" id="<?php echo $brands['brands_id']?>">
														 <label class="cs-filter-label" for="<?php echo $brands['brands_id']?>">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;"><?php echo $brand_name;?></font>
															</font>
														</label>
													</li>
											<?php } ?>
									   </ul>
									   </div> 
									   <div class="cs-sidebar-divider"></div>-->
                                       <?php /* <div class="old_redemption">
                                <div class="cs-filter-title" style="padding-top:43px;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Einlösungsart</font>
                                    </font>
                                </div>
                                <ul id="" class="cs-filter-ul cs-filter-scroll">

                                    <li class="cs-filter-li">
                                        <input class="cs-filter-input checkbox" data-type="desktop" name="check_filter" data-brandid="0" data-cateId="<?php echo $cat_id;?>" type="checkbox" id="Existing1" data-checkId="Existing">
                                        <label class="cs-filter-label" for="Existing1">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Bestehender Kunde </font>
                                            </font>
                                        </label>
                                    </li>
                                    <li class="cs-filter-li">
                                        <input class="cs-filter-input checkbox" data-type="desktop" name="check_filter" data-brandid="0" data-cateId="<?php echo $cat_id;?>" type="checkbox"  id="New1" data-checkId="New">
                                        <label class="cs-filter-label" for="New1">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Neukunde</font>
                                            </font>
                                        </label>
                                    </li>
                                </ul>
                            </div> */ ?>
                            <div class=" cs-filter-layer"></div>
                        </div>


                        <!-- <div class="cs-sidebar-divider"></div> -->


                        <?php /*<div style="text-align:center;padding: 1px 11px 10px 11px;">
								 <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipps für dich</font></font></h4>
								</div>
								<div class="cs-sidebar-item cs-sidebar-contact p-l">
									<div id="my-pics" class="carousel slide my-pics" data-ride="carousel" >
									<div class="carousel-inner" role="listbox">
									<?php   
									 $tv_slider = $this->db->get_where('tv_slider_images',array('status'=>'Active'))->result_array();
									 foreach($tv_slider as $key => $slider){
									?>	
									<div class="item <?php if($key==0){ echo "active"; } ?> ">
									   <a href="<?php echo $slider['link']; ?>">
										<img  style="width: 100%;height: 100%;" src="<?php echo base_url()?>uploads/brands/sliders/<?php echo $slider['image']; ?>" >
										<!-- <div  class="caption">
											<p><?php echo $slider['description']; ?></p>
										</div> -->
										</a>
									</div>
									<?php } ?>
									<!-- Slide 3 --> 
									</div>
									<!-- Previous/Next controls -->
									<a class="left carousel-control" style="background: none;" href="#my-pics" role="button" data-slide="prev">
									<span class="icon-prev move_ font-size-brand"  aria-hidden="true"></span>
									<span class="sr-only ">Previous</span>
									</a>
									<a class="right carousel-control" style="background: none;" href="#my-pics" role="button" data-slide="next">
									<span class="icon-next move_ font-size-brand" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
									</a>

									</div>	
								</div>
			
								<div class="cs-sidebar-divider"></div> 
								
                        <div class="cs-sidebar-divider" style="display:none;"></div>
                        <div class="cs-sidebar-item cs-sidebar-contact">
                            <?php 
												if(!empty($top_right_newsletter)){
													$newsletter_title = $top_right_newsletter['title'];
													$newsletter_desc = $top_right_newsletter['description'];
													$newsletter_img = $top_right_newsletter['image'];
											?>
                            <div class="col-md-12">
                                <div class="alert_box " style="margin-left:0px">
                                    <h5 class="box_heading">Newsletter abonnieren</h5>
                                    <p class="box_para">Wenn neue Coupons, Angebote und Aktionen zu uns kommen, kommen sie direkt zu dir</p>
                                    <div><small id="news_error" style="color:red"></small></div>
                                    <div class="d-flex">

                                        <!--<div class="box_alert_img"> 
																<img src="<?php echo base_url().$static_upload_url.$newsletter_img ?>">
															</div> -->

                                        <div>
                                            <div class="subscribe_form">

                                                <input type="email" id="optin-email" placeholder="E-Mail-Addresse" class="subscribe_field">
                                                <input type="hidden" id="page_type" value="2">
                                                <input type="submit" id="subscribe" style="font-size: 11px!important;" value="Abonnieren" class="subscribe_btn">
                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        <label class="cs-newsletter-label" style="margin-left: 0px;font-size: 0.7rem;
}">
                                            <input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy" type="checkbox" name="" value="0">
                                            <font style="vertical-align: inherit;">
																<font style="vertical-align: inherit">Ja, </font>
															</font>
															<a href="<?php echo base_url().'datenschutz' ?>">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">ich stimme </font>
																</font>
															</a>
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;"> der Datenschutzerklärung und Erklärung zu.</font>
															</font>
                                        </label>
                                        <label class="js-newsletter-profiling more_priv cs-newsletter-label" style="display: none;text-align: initial;font-size: 0.7rem;">
                                            <input class="cs-newsletter-checkbox" type="checkbox" name="nlr[6]" value="1">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Ja, ich möchte einen auf meine Interessen zugeschnittenen individuellen Newsletter erhalten, damit ich keine persönlichen Coupons und Aktionen mehr verpasse. Ich stimme der Analyse meiner Klicks und Öffnungsverhalten zu. Detaillierte Informationen finden Sie in unserer Datenschutzerklärung. Diese Einwilligung kann ich gemäß der Erklärung jederzeit widerrufen.</font>
                                            </font>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="cs-sidebar-divider"></div> */ ?>
                        <div class="cs-sidebar-item cs-sidebar-contact p-l">
                            <div class="">
                                <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Die beliebtesten Geschäfte</font></font></h4>
                                <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap">
                                <?php
                                    $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit(12)->get_where('brands', array('status'=>'Active','popular_shop'=>'1','popular_shop_order!='=>'0'))->result_array();
                                    foreach($get_all_brands as $fetch_data){
                                        $brand_image = $fetch_data['brand_image'];
                                        $brand_name = $fetch_data['name'];
                                        $brand_id = $fetch_data['brands_id'];
                                        $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
                                    ?>
                                     <?php
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) >0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                        ?>
                                        <a id="1105_fav" class="col-md-6 col-sm-6" href="<?php echo base_url().'marken/'.$brand_name_new ?>">
                                            <li class="cs-home-mer-box-li-box" title="Vouchers from apotal" style="background: transparent; box-shadow:none; display:block;">		
                                                <div class="brands_img_group img-home" style="box-shadow:1px 1px 5px #b4b4b4;">
                                                    <img class=" lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>" title="<?php echo $brand_name ?>">
                                                </div>
                                                <label style="text-align: center;">
                                                <span class="cs-intern-link" style="color: #000 !important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(<?php echo $get_brand_total_codes ?> Gutscheine)</font></font></span>
                                                </label>
                                            </li>
                                        </a>
                                    <?php } ?>
                                </ul>     
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

            </section>
            <!-- About us and tabs section -->
            <style>
                .faqs {
                    margin-top: 0px;
                }
            </style>
            <section class="cs-home-selection cs-home-mer-box ">
                <div class="container">
                    <div class="row about_section" style="display:none;">
                        <div class="col-md-8">
                            <!--<div>
									<?php $about_us   = $this->db->get_where('static_content', array('type'=>'bottom_about_us'))->row()->description; ?>
									<h4 class="cs-home-h"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">About Us </font></font></h4>
									<p class="para"><?php echo $about_us;?></p>
								 </div> -->
                            <div id="faqs_answer" class="left-position2">
                                <?php 
										$this->db->limit(4);
										$faqs_tabs   = $this->db->get_where('faqs', array('question_type'=>'1'))->result_array();
										foreach($faqs_tabs as $key => $faqs){
									?>
                                <div class="faqs" id="faqs_<?php echo $faqs['faqs_id']?>" style="<?php if($key!=0){  echo "display:none; "; }?> ">
                                    <h4 class="cs-home-h">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $faqs['question']?> </font>
                                        </font>
                                    </h4>
                                    <div style="background-color: #f5f5f5; box-shadow: 0px 0px 6px rgb(180 180 180); border: 1px solid #ddd;padding: 3px 13px;">
                                        <p class="para"><?php echo $faqs['answer']?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4" id="tabs_faqss">
                            <h4>
                                <font>Content </font>
                            </h4>
                            <?php foreach($faqs_tabs as $key => $faqs){ ?>
                            <div style='<?php if($key=="3"){ echo "border-bottom:0.1px solid #00000036"; } ?>' class="tabs_content  faqs_tabs <?php if($key==0){echo "active_tab";}?>" id="<?php echo $faqs['faqs_id']?>">
                                <font><?php echo $faqs['question']?></font>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
            <!-- Merchant Box -->
            <section class="cs-home-selection cs-home-mer-box ">
                <div class="container">
                    <?php 
							if(empty($param)){
							?>
                    <h3 class="cs-home-h">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Die beliebtesten Geschäfte </font>
                        </font>
                    </h3>
                    <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil">
                        <?php
								$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
								$this->db->limit(18);
								$get_all_brands = $this->db->get_where('brands', array('status'=>'Active'))->result_array();
								foreach($get_all_brands as $fetch_data){
									$brand_image = $fetch_data['brand_image'];
									$brand_name = $fetch_data['name'];
									$brand_id = $fetch_data['brands_id'];
                                    $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
						
								?>
                                 <?php
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) >0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                        ?>
                    <a id="1105_fav" class="col-md-6 col-sm-6" href="<?php echo base_url().'marken/'.$brand_name_new ?>">
                            <li class="cs-home-mer-box-li-box" title="Vouchers from apotal" style="background: transparent; box-shadow:none; display:block;">
                                <div class="brands_img_group" style="box-shadow:1px 1px 5px #b4b4b4;">
                                    <img class=" lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>" title="<?php echo $brand_name ?>">
                                </div>
                                <label style="text-align: center;">
                                    <span class="cs-intern-link" style="color: #000 !important;">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">(<?php echo $get_brand_total_codes ?> Gutscheine)</font>
                                        </font>
                                    </span>
                                </label>
                            </li>
                        </a>
                        <?php } ?>
                    </ul>
                </div>
                <?php 					
					}
					else{
                      ?>
                <div style="padding:10px"></div>
                <?php
					}

					?>
            </section>

            <section class="cs-content-block cs-text hidden">
                <h2>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Frequently asked Questions:</font>
                    </font>
                </h2>
                <?php 
							/*
							foreach($faqs_data as $fetch_data){
								$question = $fetch_data['question'];
								$answer = $fetch_data['answer'];
						?>
                <div class="cs-qa-box">
                    <h3><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><?php echo $question ?></font>
                        </font>
                    </h3>
                    <p>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><?php echo $answer ?></font>
                        </font>
                    </p>
                </div>
                <?php } */ ?>
            </section>
        </div>
    </div>
    </div>
    </div>
</main>