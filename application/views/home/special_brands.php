<?php 
$date= date("Y-m-d");
?>
<main id="cs-main" >
	<div class="cs-main-content">
	    
		<section class=" cs-home-tabs-content home-section" >
			<div class="container width-full">
			    <!-- <h1 class="cs-home-h-mine rem" style="">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">Beliebte Marken</font>
					</font>
				</h1> -->
				<div class="cs-coupon-small-box cs-flex">
				<?php
				$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		
	
				foreach($get_all_brands as $key => $fetch_data){
					$brands_details = $this->db->get_where('brands',array('brands_id'=>$fetch_data['brands_id']))->row_array();
					$brand_image = $brands_details['brand_image'];
					$brand_name  = $brands_details['name'];
					$brand_id    = $brands_details['brands_id'];
					
					$brand_name_array = explode(" ",$brand_name);
				
					if(count($brand_name_array) > 0){
					$brand_name_new = str_replace(' ', '-', $brand_name);
					}
					else{
						$brand_name_new = $brand_name;
					}
				?>
							<div class="cs-coupon-small cs-column-4 ">		
								<a style="text-decoration: none;" target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" >
									<div class="cs-coupon-box special_brands_mine" style="margin-top: 6px;">
										<div class="cs-outer-coupon outer_my_cpn_mine trace_color_img_<?php echo $key; ?>">
											<div class=" js-btn-co js-co" title="To the <?php echo $brand_name ?> voucher" style="cursor: pointer;"></div>           
											<!-- img small online -->
											<div class="cs-coupon-small-logo img_new_div">
												<div class="image_brands_mine color_img_<?php echo $key; ?>">
                                                    <img class="lazyloaded 1-- brands_image_new" id="color_img_<?php echo $key; ?>" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name; ?>">
                                                </div>
												
											</div>
											
										</div>
									</div>
								</a>
                                <div  class=" new_name_desc_mine ">
                                  <a target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;  ?>"><?php echo  $brands_details['seo_title']; ?></a>    
                                </div>
								
							</div>
						<!-- Small Coupon -->
					<?php  } ?>
				</div>
				
			</div>
		</section>
		<section class="cs-home-selection cs-home-mer-box " >
		  <div class="container width-full" style="
    padding-bottom: 25px;
">
		  <?php 
			$brands_content =  $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('brands_pages_id'=>$brands_pages->brands_pages_id,'type'=>'brands_pages','status'=>'Active'))->result_array();
			foreach($brands_content as $b_content){
			?>
			<div class="" style="margin-top: 20px;">
				<h4 class="cs-home-h rem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $b_content['heading'] ?> </font></font></h4>
				<div class="cs-merchant-coupons-table cs-merchant-coupons-table-updated" style="box-shadow: 0px 0px 6px rgb(180 180 180); padding: 14px 16px; line-height: 2; font-size: 16px;">
					<p> <?php echo $b_content['description'] ?></p>
				</div>
			</div>
			<?php } ?>
		  </div>
			
		</section>

	</div>
</main>