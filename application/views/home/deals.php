<style>
	  .d-flex{
		 display: flex;
	  }
	  .alert_box{
		 background-color: #fff;
		 padding: 10px;
		 margin: 10px auto;
		 margin-left: 20px;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .box_para{
		 color: #3c5154 !important;
		 font-size: 13px;
		 font-weight: 600;
	  }
	  .box_heading{
		 font-family: revert;
		 color: #5c8374;
	  }
	  .subscribe_form{
		 display: flex;
	  }
	  .box_alert_img > img{
		 width: 130px;
	  }
	  .subscribe_field{
		 height: 30px !important;
		 font-size: 13px;
		 border-radius: 5px !important;
		 width: 100% !important;
	  }
	  .subscribe_btn{
		 background-color: #5c8374;
		 color: #fff;
		 height: 30px !important;
		 border: none;
		 border-radius: 5px;
		 left: -7px;
		 position: relative;
		 width: 100px !important;
	  }
	  .txt_box{
		 margin-top: 10px;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .mt-2{
		 margin-top: 20px;
	  }
	  
	  .cat_box{
		 padding: 0px 0 10px 0px;
		 background-color: #f5f5f5;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .cat_content{
		 margin-left: 0px;
	  }
	  .cat_intro{
		 width: 100%;
		 background-color: #fff;
		 padding: 20px 20px 10px 20px;
		 font-size: 18px;
		 line-height: 1.7;
	  }
	  
	  .box_cat{
		 background-color: #fff;
		 padding: 5px 10px;
		 border-radius: 5px;
	  }
	  .box_cat:hover{
		 background-color: #5c8374;
		 text-decoration: none;
		 color: #fff;
	  }
	  
	  .cat_align{
		 justify-content: space-evenly;
	  }
	  
	  .see_all{
		 color: #5c8374 !important;
		 font-weight: 600;
		 font-size: 15px;
		 margin-right: 20px;
	  }
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
	<!--Breadcrumps -->

	<div class="container">
		<div class="main-content-container cs-flex">
			  <!--Main Content -->
			<div class="">
				<!-- Content all_categories-->
				<?php 
					$static_newsletter = $this->db->get_where('static_content', array('type'=>'newsletter'))->row();
					$newsletter_title = $static_newsletter->title;
					$newsletter_desc = $static_newsletter->description;
					$newsletter_img = $static_newsletter->image;
					$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
				?>
				<div class="cs-all-categories-content">
					<?php 
						if(!empty($top_lef_info)){
							$info_title = $top_lef_info['title'];
							$info_desc = $top_lef_info['description'];
					?>
							<div class="col-sm-8">
								<div class="cs-text txt_box mt-2">
									<h1 class="box_heading"><?php echo $info_title ?></h1>
									 <p class="box_para"> <?php echo $info_desc ?></p>
								</div>
							</div>
					<?php } ?>
					<?php 
						if(!empty($top_right_newsletter)){
							$newsletter_title = $top_right_newsletter['title'];
							$newsletter_desc = $top_right_newsletter['description'];
					?>
								<div class="col-sm-4">
									 <div class="alert_box mt-2">
										<h1 class="box_heading"><?php echo $newsletter_title ?></h1>
										<div class="d-flex">
											<div>
												<div class="subscribe_form"><input type="email" placeholder="Yout e-mail" class="subscribe_field"> <input type="submit" value="Abonnieren" class="subscribe_btn"></div>
												<p class="box_para"><?php echo $newsletter_desc ?></p>
											</div>
										</div>
									</div>
								</div>
					<?php } ?>
					<section>
						<h1 style="text-align: center;">Page under construction</h1>
					</section>
					<section class="cs-home-selection cs-home-mer-box ">
						<div class="container">
							<h3 class="cs-home-h"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The most popular shops </font></font></h3>
							<ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil">
							<?php
								$get_all_brands = $this->db->get_where('brands', array('status'=>'Active'))->result_array();
								foreach($get_all_brands as $fetch_data){
									$brand_image = $fetch_data['brand_image'];
									$brand_name = $fetch_data['name'];
									$brand_id = $fetch_data['brands_id'];
									$get_brand_total_codes = $this->db->get_where('coupons', array('brands_id'=>$brand_id, 'status'=>'Active'))->num_rows();
						
									$brand_name_new = '';
									$brand_name_array = explode(" ",$brand_name);
									if(count($brand_name_array) > 0){
										$brand_name_new = str_replace(' ', '-', $brand_name);
									}
								?>
									<a id="1105_fav" class="cs-home-mer-box-li" href="<?php echo base_url().'marken/'.$brand_name_new ?>">
										<li class="cs-home-mer-box-li-box" title="Vouchers from apotal" style="background: transparent; box-shadow:none; display:block;">		
											<div style="box-shadow:1px 1px 5px #b4b4b4;">
												<img style="height: 50px; width: 100%;" class=" lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>" title="<?php echo $brand_name ?>">
											</div>
											<label style="text-align: center;">
											<span class="cs-intern-link" style="color: #000 !important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(<?php echo $get_brand_total_codes ?> vouchers)</font></font></span>
											</label>
										</li>
									</a>
								<?php } ?>
							</ul>     
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>	  