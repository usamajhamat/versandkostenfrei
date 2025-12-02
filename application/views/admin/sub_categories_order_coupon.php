<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/icon/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/main.css?v1.0.0001">
<link href="<?php echo base_url(); ?>assets/home/css/aio.css" rel="stylesheet" media="screen">
<style>
    h3{
    font-size: 23px;
    font-weight: 700;
    text-decoration: underline;
    }
    .brand-width{
        width: 229px;
    }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   .page_list li
   {
    padding:16px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
   .page_list li.ui-state-highlight
   {
    padding: 24px;
    background-color: #fcecec;
    border: 3px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    height: 155px;
   }
   .list-unstyled li {
    display: block !important; 
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
								<h5><?php echo $page_sub_title; ?></h5>
								
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
                                <?php
                                if($check_param=='coupon'){
                                    ?>
                                    <h3>All coupons Codes (<?php echo count($coupons_code);?>)</h3>
                                    <?php
                                }
                                ?>
                                  
                                  <?php
                                    
                                    if(!empty($coupons_code)){
                                    ?>
                                    <ul class="list-unstyled page_list" id="sub_coupons_code_cate">
                                        <?php 
                                
                                        foreach($coupons_code as $coupons):
                                            $category_id = $coupons['categories_id'];
                                            $brands_id = $coupons['brands_id'];
                                                $brands_details = $this->db->get_where('brands', array('brands_id'=>$brands_id))->row_array();
                    
                                                $brands_image = $brands_details['brand_image'];
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
                                            if(empty($coupons['coupon_code'])){
                                                $code_text = "Kein Code benötigt!"; 
                                            }
                                            else{
                                                $code_text = $coupons['coupon_code']; 
                                            }
                                            $remove_phill="No";
                                        ?>
                                      <!--   <li id="<?php echo $coupons["coupons_id"]; ?>">
                                        <?php echo $coupons["short_tagline"]." --- ".$coupons["coupon_type"] ; ?>
                                        </li> -->
                                      
                                        <li id="<?php echo $coupons["coupons_id"]; ?>">
                                        <div class="cs-coupon-box cs-coupon-merchant js-fp" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                            <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>uploads/brands/<?php echo  $brands_image; ?>">
																<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																	<div class="cs-coupon-logo-line-1">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?>
																				
																			</font>
																		</font>
																	</div>
																	<div class="cs-coupon-logo-line-3">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">Rabatt</font>
																		</font>
																	</div>
																</div>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex">

																	<div class="cs-coupon-box-description cs-coupon-box-h3">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																	</div>
																	<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																				<div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" ){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
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
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																				<div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
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
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes"){
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
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
														</div>
														<div class="cs-coupon-more-details">
															<div class="js-toggle-container">
															<?php if($coupons['description']==""){
																	?>
																	<div class="">
																	<?php
																  }   
																	else{
																		?>
																	<div class="cs-toggle-content">
																		<?php
																	}
																?>
																	<font style="vertical-align: inherit;">
																		<font style="vertical-align: inherit;"><?php echo $coupons['description'];?></font>
																	</font>
																</div>
																<div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
																	<?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
																		<span class="">
																			<font style="vertical-align: inherit;">
																				<font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : <?php echo $coupons['min_order_price'] ?>&euro; </font>
																			</font>
																		</span>
																	<?php } ?>
																	<span>
																			<i class="fa fa-clock-o" style="color: transparent;"  aria-hidden="true"></i> 
																			
																		</span>
																</div>
															</div>
														</div>
													</div>
                                                    </li>
                                        <?php
                                        endforeach;
                                      ?>
                                    </ul>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No coupons available for Offers</h2>
                                       <?php
                                    }
                                    ?>
                                <?php 
                                if($check_param=='coupon'){
                                ?>
                                    <hr>
                                    <h3>All Offers coupons (<?php echo count($coupons_offer);?>)</h3>
                                    <?php
                                    
                                    if(!empty($coupons_offer)){
                                    ?>
                                    <ul class="list-unstyled page_list" id="sub_coupons_offer_cate">
                                            <?php 
                                    
                                            foreach($coupons_offer as $coupons):
                                            
                                            
                                            $category_id = $coupons['categories_id'];
                                            $brands_id = $coupons['brands_id'];
                                                $brands_details = $this->db->get_where('brands', array('brands_id'=>$brands_id))->row_array();
                    
                                                $brands_image = $brands_details['brand_image'];
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
                                            if(empty($coupons['coupon_code'])){
                                                $code_text = "Kein Code benötigt!"; 
                                            }
                                            else{
                                                $code_text = $coupons['coupon_code']; 
                                            }
                                            $remove_phill="No";
                                        ?>
                                    
                                    
                                        <li id="<?php echo $coupons["coupons_id"]; ?>">
                                        <div class="cs-coupon-box cs-coupon-merchant js-fp" id="<?php echo $coupons['coupons_id'];?>">
														<div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                            <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>uploads/brands/<?php echo  $brands_image; ?>">
																<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																	<div class="cs-coupon-logo-line-1">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?>
																				
																			</font>
																		</font>
																	</div>
																	<div class="cs-coupon-logo-line-3">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">Rabatt</font>
																		</font>
																	</div>
																</div>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex">

																	<div class="cs-coupon-box-description cs-coupon-box-h3">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['short_tagline'];?>
																			</font>
																		</font>
																	</div>
																	<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		<?php 
																		if(empty($coupons['coupon_code'])){
																			
																		  if($remove_phill!="Yes"){
																				
																		?>
																		  
																		   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																				<div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
																					</div>
																				</div>
																			</div>
																		<?php 
																		 }
																		 else{
																			if($remove_phill=="Yes" ){
																		  ?>
																		  
																		  <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
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
																			   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																				<div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
																					<div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
																						<i class="fa fa-euro"></i>
																						<span>Gutschein anzeigen</span>
																						</font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
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
																		<button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
																			<span class="peal_btn_block">
																				<span class="<?php if($remove_phill=="Yes"){
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
                                                                    <?php if(isset($coupons['special_text'])){ ?>
																		<div class="best_title_f "><?php echo $coupons['special_text']?></div>
																	<?php } ?> 																	
																</div>
														</div>
														<div class="cs-coupon-more-details">
															<div class="js-toggle-container">
															<?php if($coupons['description']==""){
																	?>
																	<div class="">
																	<?php
																  }   
																	else{
																		?>
																	<div class="cs-toggle-content">
																		<?php
																	}
																?>
																	<font style="vertical-align: inherit;">
																		<font style="vertical-align: inherit;"><?php echo $coupons['description'];?></font>
																	</font>
																</div>
																<div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
																	<?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
																		<span class="">
																			<font style="vertical-align: inherit;">
																				<font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : <?php echo $coupons['min_order_price'] ?>&euro; </font>
																			</font>
																		</span>
																	<?php } ?>
																	<span>
																			<i class="fa fa-clock-o" style="color: transparent;"  aria-hidden="true"></i> 
																			
																		</span>
																</div>
															</div>
														</div>
													</div>
                                                    </li>
                                            <?php
                                            endforeach;
                                        ?>
                                    </ul>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No coupons available for Offers</h2>
                                       <?php
                                    }
                                    ?>
                                    <hr>
                                    <h3>All Free items coupons (<?php echo count($coupons_free);?>)</h3>
                                   <?php
                                    if(!empty($coupons_free)){
                                        ?>
                                    <ul class="list-unstyled page_list" id="sub_coupons_free_cate">
                                            <?php 
                                    
                                            foreach($coupons_free as $coupons):
                                            
                                                $category_id = $coupons['categories_id'];
                                                $brands_id = $coupons['brands_id'];
                                                $brands_details = $this->db->get_where('brands', array('brands_id'=>$brands_id))->row_array();
                    
                                                $brands_image = $brands_details['brand_image'];
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
                                                if(empty($coupons['coupon_code'])){
                                                    $code_text = "Kein Code benötigt!"; 
                                                }
                                                else{
                                                    $code_text = $coupons['coupon_code']; 
                                                }
                                                $remove_phill="No";
                                            ?>
                                        
                                            
                                            <li id="<?php echo $coupons["coupons_id"]; ?>">
                                            <div class="cs-coupon-box cs-coupon-merchant js-fp" id="<?php echo $coupons['coupons_id'];?>">
                                                            <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
                                                                <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>uploads/brands/<?php echo  $brands_image; ?>">
                                                                    <div class="cs-coupon-logo cs-flex cs-flex-mobil">  
                                                                        <div class="cs-coupon-logo-line-1">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?>
                                                                                    
                                                                                </font>
                                                                            </font>
                                                                        </div>
                                                                        <div class="cs-coupon-logo-line-3">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">Rabatt</font>
                                                                            </font>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="cs-coupon-box-cell-2 cs-flex">
    
                                                                        <div class="cs-coupon-box-description cs-coupon-box-h3">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    <?php echo $coupons['short_tagline'];?>
                                                                                </font>
                                                                            </font>
                                                                        </div>
                                                                        <div class="brand-width">
                                                                            <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                            <?php 
                                                                            if(empty($coupons['coupon_code'])){
                                                                                
                                                                              if($remove_phill!="Yes"){
                                                                                    
                                                                            ?>
                                                                              
                                                                               <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                    <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                        <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                            <i class="fa fa-euro"></i>
                                                                                            <span>Gutschein anzeigen</span>
                                                                                            </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php 
                                                                             }
                                                                             else{
                                                                                if($remove_phill=="Yes" ){
                                                                              ?>
                                                                              
                                                                              <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
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
                                                                                   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                    <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                        <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                            <i class="fa fa-euro"></i>
                                                                                            <span>Gutschein anzeigen</span>
                                                                                            </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
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
                                                                            <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                <span class="peal_btn_block">
                                                                                    <span class="<?php if($remove_phill=="Yes"){
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
                                                                        <?php if(isset($coupons['special_text'])){ ?>
                                                                            <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                        <?php } ?> 																	
                                                                    </div>
                                                            </div>
                                                            <div class="cs-coupon-more-details">
                                                                <div class="js-toggle-container">
                                                                <?php if($coupons['description']==""){
                                                                        ?>
                                                                        <div class="">
                                                                        <?php
                                                                      }   
                                                                        else{
                                                                            ?>
                                                                        <div class="cs-toggle-content">
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;"><?php echo $coupons['description'];?></font>
                                                                        </font>
                                                                    </div>
                                                                    <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
                                                                        <?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
                                                                            <span class="">
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : <?php echo $coupons['min_order_price'] ?>&euro; </font>
                                                                                </font>
                                                                            </span>
                                                                        <?php } ?>
                                                                        <span>
                                                                                <i class="fa fa-clock-o" style="color: transparent;"  aria-hidden="true"></i> 
                                                                                
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                            <?php
                                            endforeach;
                                        ?>
                                    </ul>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No coupons available for free items</h2>
                                       <?php
                                    }
                                    ?>
                                    <hr>
                                    <h3>All Free shipping coupons (<?php echo count($coupons_shipping);?>)</h3>
                                    <?php
                                    if(!empty($coupons_shipping)){
                                        ?>
                                                <ul class="list-unstyled page_list" id="sub_coupons_shipping_cate">
                                                        <?php 
                                                
                                                        foreach($coupons_shipping as $coupons):
                                                        
                                                    
                                                        $category_id = $coupons['categories_id'];
                                                        $brands_id = $coupons['brands_id'];
                                                        $brands_details = $this->db->get_where('brands', array('brands_id'=>$brands_id))->row_array();
                            
                                                        $brands_image = $brands_details['brand_image'];
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
                                                        if(empty($coupons['coupon_code'])){
                                                            $code_text = "Kein Code benötigt!"; 
                                                        }
                                                        else{
                                                            $code_text = $coupons['coupon_code']; 
                                                        }
                                                        $remove_phill="No";
                                                    ?>
                                                
                                                    
                                                    <li id="<?php echo $coupons["coupons_id"]; ?>">
                                                    <div class="cs-coupon-box cs-coupon-merchant js-fp" id="<?php echo $coupons['coupons_id'];?>">
                                                                    <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
                                                                        <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                        <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>uploads/brands/<?php echo  $brands_image; ?>">
                                                                            <div class="cs-coupon-logo cs-flex cs-flex-mobil">  
                                                                                <div class="cs-coupon-logo-line-1">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        <font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?>
                                                                                            
                                                                                        </font>
                                                                                    </font>
                                                                                </div>
                                                                                <div class="cs-coupon-logo-line-3">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        <font style="vertical-align: inherit;">Rabatt</font>
                                                                                    </font>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cs-coupon-box-cell-2 cs-flex">
            
                                                                                <div class="cs-coupon-box-description cs-coupon-box-h3">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        <font style="vertical-align: inherit;">
                                                                                            <?php echo $coupons['short_tagline'];?>
                                                                                        </font>
                                                                                    </font>
                                                                                </div>
                                                                                <div class="brand-width">
                                                                                    <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                    <?php 
                                                                                    if(empty($coupons['coupon_code'])){
                                                                                        
                                                                                    if($remove_phill!="Yes"){
                                                                                            
                                                                                    ?>
                                                                                    
                                                                                    <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                            <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                                <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                    <i class="fa fa-euro"></i>
                                                                                                    <span>Gutschein anzeigen</span>
                                                                                                    </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php 
                                                                                    }
                                                                                    else{
                                                                                        if($remove_phill=="Yes" ){
                                                                                    ?>
                                                                                    
                                                                                    <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
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
                                                                                        <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                            <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                                <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                    <i class="fa fa-euro"></i>
                                                                                                    <span>Gutschein anzeigen</span>
                                                                                                    </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
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
                                                                                    <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                        <span class="peal_btn_block">
                                                                                            <span class="<?php if($remove_phill=="Yes"){
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
                                                                                <?php if(isset($coupons['special_text'])){ ?>
                                                                                    <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                <?php } ?> 																	
                                                                            </div>
                                                                    </div>
                                                                    <div class="cs-coupon-more-details">
                                                                        <div class="js-toggle-container">
                                                                        <?php if($coupons['description']==""){
                                                                                ?>
                                                                                <div class="">
                                                                                <?php
                                                                            }   
                                                                                else{
                                                                                    ?>
                                                                                <div class="cs-toggle-content">
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;"><?php echo $coupons['description'];?></font>
                                                                                </font>
                                                                            </div>
                                                                            <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
                                                                                <?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
                                                                                    <span class="">
                                                                                        <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : <?php echo $coupons['min_order_price'] ?>&euro; </font>
                                                                                        </font>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <span>
                                                                                        <i class="fa fa-clock-o" style="color: transparent;"  aria-hidden="true"></i> 
                                                                                        
                                                                                    </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </li>
                                                        <?php
                                                        endforeach;
                                                    ?>
                                            </ul>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No coupons available for Free shipping</h2>
                                       <?php
                                    }
                                    ?>
                                    
                                    
                                    <hr>
                                    <h3>All deals coupons (<?php echo count($coupons_deals);?>)</h3>
                                    <?php
                                    if(!empty($coupons_deals)){
                                        ?>
                                                <ul class="list-unstyled page_list"  id="sub_coupons_deals_cate">
                                                        <?php 
                                                
                                                        foreach($coupons_deals as $coupons):
                                                        
                                                            $category_id = $coupons['categories_id'];
                                                            $brands_id = $coupons['brands_id'];
                                                            $brands_details = $this->db->get_where('brands', array('brands_id'=>$brands_id))->row_array();
                                
                                                            $brands_image = $brands_details['brand_image'];
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
                                                            if(empty($coupons['coupon_code'])){
                                                                $code_text = "Kein Code benötigt!"; 
                                                            }
                                                            else{
                                                                $code_text = $coupons['coupon_code']; 
                                                            }
                                                            $remove_phill="No";
                                                        ?>  
                                             
                                                        <li id="<?php echo $coupons["coupons_id"]; ?>">
                                                        <div class="cs-coupon-box cs-coupon-merchant js-fp" id="<?php echo $coupons['coupons_id'];?>">
                                                                        <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
                                                                            <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                            <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>uploads/brands/<?php echo  $brands_image; ?>">
                                                                                <div class="cs-coupon-logo cs-flex cs-flex-mobil">  
                                                                                    <div class="cs-coupon-logo-line-1">
                                                                                        <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?>
                                                                                                
                                                                                            </font>
                                                                                        </font>
                                                                                    </div>
                                                                                    <div class="cs-coupon-logo-line-3">
                                                                                        <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;">Rabatt</font>
                                                                                        </font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cs-coupon-box-cell-2 cs-flex">
                
                                                                                    <div class="cs-coupon-box-description cs-coupon-box-h3">
                                                                                        <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;">
                                                                                                <?php echo $coupons['short_tagline'];?>
                                                                                            </font>
                                                                                        </font>
                                                                                    </div>
                                                                                    <div class="brand-width">
                                                                                        <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                        <?php 
                                                                                        if(empty($coupons['coupon_code'])){
                                                                                            
                                                                                        if($remove_phill!="Yes"){
                                                                                                
                                                                                        ?>
                                                                                        
                                                                                        <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                                <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                                    <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                        <i class="fa fa-euro"></i>
                                                                                                        <span>Gutschein anzeigen</span>
                                                                                                        </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php 
                                                                                        }
                                                                                        else{
                                                                                            if($remove_phill=="Yes" ){
                                                                                        ?>
                                                                                        
                                                                                        <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
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
                                                                                            <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                                <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">
                                                                                                    <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                        <i class="fa fa-euro"></i>
                                                                                                        <span>Gutschein anzeigen</span>
                                                                                                        </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
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
                                                                                        <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" >
                                                                                            <span class="peal_btn_block">
                                                                                                <span class="<?php if($remove_phill=="Yes"){
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
                                                                                    <?php if(isset($coupons['special_text'])){ ?>
                                                                                        <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                    <?php } ?> 																	
                                                                                </div>
                                                                        </div>
                                                                        <div class="cs-coupon-more-details">
                                                                            <div class="js-toggle-container">
                                                                            <?php if($coupons['description']==""){
                                                                                    ?>
                                                                                    <div class="">
                                                                                    <?php
                                                                                }   
                                                                                    else{
                                                                                        ?>
                                                                                    <div class="cs-toggle-content">
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                                    <font style="vertical-align: inherit;">
                                                                                        <font style="vertical-align: inherit;"><?php echo $coupons['description'];?></font>
                                                                                    </font>
                                                                                </div>
                                                                                <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">
                                                                                    <?php if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ ?>
                                                                                        <span class="">
                                                                                            <font style="vertical-align: inherit;">
                                                                                                <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : <?php echo $coupons['min_order_price'] ?>&euro; </font>
                                                                                            </font>
                                                                                        </span>
                                                                                    <?php } ?>
                                                                                    <span>
                                                                                            <i class="fa fa-clock-o" style="color: transparent;"  aria-hidden="true"></i> 
                                                                                            
                                                                                        </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </li>
                                                        <?php
                                                        endforeach;
                                                    ?>
                                            </ul>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No coupons available for deals</h2>
                                       <?php
                                    }
                                }

                                    ?> 
                                
                               
                                    
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
