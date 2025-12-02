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
                                    <h3>All Brands (<?php echo count($all_brands);?>)</h3>
                                  <?php
                                    
                                    if(!empty($all_brands)){
                                    ?>
                                    <ul class="list-unstyled page_list" id="nav_sort">
                                        <?php 
                                
                                        foreach($all_brands as $coupons):
                                            
                                            
                                        ?>
                                        <!-- <?php echo $coupons['sort_order'];?> -->
                                        <li id="<?php echo $coupons["brands_id"]; ?>">
                                        <div class="cs-coupon-box cs-coupon-merchant js-fp" >
														<div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >
															<div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click"  >
																<div class="cs-coupon-logo cs-flex cs-flex-mobil">  
																	 <img style="width: 150px;object-fit: cover;" src="<?php echo base_url();?>/uploads/brands/<?php echo $coupons['brand_image'];?>">
																</div>
															</div>
															<div class="cs-coupon-box-cell-2 cs-flex">

																	<div class="cs-coupon-box-description cs-coupon-box-h3">
																		<font style="vertical-align: inherit;">
																			<font style="vertical-align: inherit;">
																				<?php echo $coupons['name'];?>
																			</font>
																		</font>
																	</div>
																	<div class="brand-width">
																		<div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
																		
																			
																		</div>
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
                                        <h2 style="font-size: 20px;justify-content: center;display: flex;padding: 35px;background: #8345451c;margin: 27px;">No Brand available</h2>
                                       <?php
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
