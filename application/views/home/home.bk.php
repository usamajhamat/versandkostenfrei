<style type="text/css">
	@media (max-width: 767px) {
		.banner_add
		{
			margin-top: 60px;		
		}
	}
	@media(max-width:490px) {
		.best_title_f {
  			top:-20px !important;
			height: 20px;
 		}
	}
</style>

<?php 
$date= date("Y-m-d");
 $pop_voucher_text = $this->db->get_where('static_content',array('type'=>'popular voucherrs in home page'))->row()->title;
 $Latest_text = $this->db->get_where('static_content',array('type'=>'Latest Coupons on home'))->row()->title;
 $Trending_text = $this->db->get_where('static_content',array('type'=>'trending Coupons on home'))->row()->title;
 $Tips_text = $this->db->get_where('static_content',array('type'=>'tips from editor home'))->row()->title;
 $lastest_copuon_section_flag =  $this->db->get_where('system_settings',array('type'=>'lastest_copuon_section_flag'))->row()->description;
 $trending_copuon_section_flag =  $this->db->get_where('system_settings',array('type'=>'trending_copuon_section_flag'))->row()->description;
 $tips_copuon_section_flag =  $this->db->get_where('system_settings',array('type'=>'tips_copuon_section_flag'))->row()->description;
 $static_top_left = $this->db->get_where('static_content', array('type'=>'before_slider_top_left'))->row();
$static_top_center = $this->db->get_where('static_content', array('type'=>'before_slider_top_center'))->row();
$static_top_right = $this->db->get_where('static_content', array('type'=>'before_slider_top_right'))->row();
$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
?>
<main id="cs-main" >
	<div class="cs-main-content">
	    

		<!-- New popular coupons section -->
		<section class="cs-home-selection cs-home-tabs-content" style="padding: 25px 0!Important">
			<div class="container width-full">
				<center><h1 class="box_heading alert_box_head" style="font-size: 28px; padding-left:0;">Der Besten Gutschein für alles Rabattcode online Gutscheincode</h1></center>
				<h4 class="cs-home-h-mine rem" style="margin-bottom: 20px;"><?php echo $pop_voucher_text; ?></h4>
				<!-- Showboxes  "The most beloved Coupons" -->
				<div class="main_coupon_div ">
				<?php
					  $home_page_popular_coupon_limit = $this->db->get_where('system_settings',array('type'=>'home_page_popular_coupon_limit'))->row()->description;
						$get_coupons = $this->db->query("
							select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
							from coupons as cpn 
							left join brands as brand ON cpn.brands_id = brand.brands_id
							where cpn.status = 'Active' AND cpn.popular_set = '1'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ORDER BY cpn.date_added DESC LIMIT $home_page_popular_coupon_limit
						")->result_array();
						
						$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
						if(!empty($get_coupons)){
						foreach($get_coupons as $fetch_data){
							$brand_image = $fetch_data['brand_image'];
							$brand_name = $fetch_data['brand_name'];
							$brand_id = $fetch_data['brands_id'];
							$short_tagline = $fetch_data['short_tagline'];
							$cpn_desc = $fetch_data['description'];
							$discount_type = $fetch_data['discount_type'];
							$discount_value = $fetch_data['discount_value'];
							$coupons_id = $fetch_data['coupons_id'];
							$coupon_code = $fetch_data['coupon_code'];
							$brand_name_new  = '';
							
							if($discount_type == 'Fixed'){
								$discount_type_sign = '&euro;';								
							}
							else if($discount_type == 'Percentage'){
								$discount_type_sign = '%';
							}
							else{
								$discount_type_sign = '';	
							}
							$brand_name_array = explode(" ",$brand_name);
							if(count($brand_name_array) > 0){
							   $brand_name_new = str_replace(' ', '-', $brand_name);
							}
							 
					?>   
					<a href="<?php echo base_url().'marken/'.$brand_name_new;?>" title="<?php echo $short_tagline; ?>" style="display:none;"></a>
					<div class="coupon_box_div coupon_click_brands" data-url = "<?php echo base_url().'marken/'.$brand_name_new."?coupon_id=".$coupons_id;?>" data-page="brands" data-coupon = "<?php echo $fetch_data['coupon_type'];?>" data-tag="<?php echo $fetch_data['short_tagline'];?>" data-type="<?php echo $fetch_data['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$fetch_data['coupons_id'];?>" style="position: relative; margin-top: 20px;">
						<div class="discount_div">
							<span>
							<?php if($discount_type == 'Custom'){ ?>
								<span class="main_rabet">
									<?php echo strtoupper($discount_value).$discount_type_sign ?> 
								</span>
								<?php } else{ ?>
									<span class="main_rabet"><?php echo '<span class="cpn_amount">'.strtoupper($discount_value).$discount_type_sign; ?></span>
									<br>Rabatt
								<?php } ?>
							</span>
							<!-- <span class="cpn_amount">25 % </span>
							<span>
							discount
							</span> -->
							</span>
						</div>
						<div class="desc_btn_section">
							<div class="cpn_small_desc" style="font-size: 14px;">
							<?php echo $short_tagline; ?>
							</div>
							<div class="cpn_btn">
								<div class="cs-coupon-small-info  show_code_div">
									<?php   
									if(empty($coupon_code)){ 
									?>
									<div class=" full_btn_div" style="">
										<div  class="coupon-btn-text">
											<i class="fa fa-euro"></i>
											<span>Gutschein anzeigen</span>
							
										</div>
									</div> 
									<?php  
										}
										else{
									?>
									<button class="new_peal_btn">
									<span class="peal_btn_block">
										
										<span class="show_code_cover">
										<i class="fa fa-euro"></i>
											Gutschein anzeigen
										</span>
										<span class="back_code"> <?php echo substr($coupon_code,1); ?> </span>
									</span>
									</button>
								<?php } ?> 
							</div>
							<?php if($fetch_data['end_date']!="0000-00-00" && $fetch_data['end_date'] != ""){
							?>
							<strong>
							<font style="vertical-align: inherit;  font-weight: 400; font-size: 11px;">
								<i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;">Läuft ab :</font>
							</font>
							<font style="vertical-align: inherit; font-weight: 400; font-size: 11px;">
							<font style="vertical-align: inherit; font-weight: 400; font-size: 11px;"><?php echo date('m/d/Y', strtotime($fetch_data['end_date'])) ?></font>
							</font>
							</strong>
							<?php
							} ?>
							</div>
							<?php if(isset($fetch_data['special_text']) && $fetch_data['special_text'] != ''){ ?>
									<div class="best_title_f "><?php echo $fetch_data['special_text']?></div>
								<?php } ?> 
						</div>	
						<div class="brands_img_section">
							<img class="lazyloaded 1--" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name; ?>">
						</div>
					</div>
					<?php } } ?>
				</div>
				<div class="row cs-home-btn-group">
					<div class="col-md-4 col-sm-4 col-md-offset-4" style="margin-top:20px;">
						<a class="cs-home-table-link more_coupon_btn" style="font-size: 10px;" href="<?php echo base_url().'home/coupons/popular' ?>" title="Show more coupons">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Anzeigen mehr weitere Beliebte Gutscheine</font>
							</font>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- New popular coupons section -->
		
		
		<!-- Newsletter -->
		<?php 
			$static_newsletter = $this->db->get_where('static_content', array('type'=>'newsletter'))->row();
			$newsletter_title = $static_newsletter->title;
			$newsletter_desc = $static_newsletter->description;
			$newsletter_img = $static_newsletter->image;
			$system_name = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
			$miss_coupon = $this->db->get_where('static_content', array('type'=>'Newsletter title on home'))->row()->title;
		?>		
		<section class="cs-home-selection cs-home-selection-text" style=" padding-bottom: 0px !important;">
            <div class="container" style="background: white;padding: 20px;">    
				<div class="cs-home-newsletter">
					<h2 class="cs-home-h rem">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"><?php echo  $miss_coupon;  ?></font>
						</font>
					</h2> 
					<div class="cs-infobox-inner row">
						<div class="cs-home-newsletter-text col-md-12 col-sm-12" style="width: 100%;">
							<div class="col-md-3 col-sm-3">
								<img class=" lazyloaded 2--" src="<?php echo base_url().$static_upload_url.$newsletter_img; ?>" data-src="<?php echo base_url().$static_upload_url.$newsletter_img; ?>" alt="Newsletter">
							</div>
							<div class="col-md-9 col-sm-9">
								<h3 class="paragraph-home">
									<font style="vertical-align: super;">
										<font style="vertical-align: super;"><?php echo $newsletter_desc ?></font>
									</font>
								</h3>
							</div>
						</div>
					</div>  
				</div>
				<div class="cs-home-newsletter">
					<div class="cs-home-newsletter-form col-md-12 col-sm-12" style="width: 100%;">
						<div class="col-md-6 col-sm-6">
							<p style="margin-bottom: 7px; font-size:16px;" class="padding-le">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Hier können Sie den <?php echo $system_name ?></font>
								</font>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"> -Newsletter abonnieren:</font>
								</font>
							</p>
						</div>
						<div class="controls controls-row col-md-6 col-sm-6 news_col">
							<form id="optin-form" data-ic="1" action="" method="post" accept-charset="utf-8">
								<input name="nlr[100]" value="7" type="hidden">
								<input name="nlr[101]" value="1fJDG" type="hidden"> 
								<input type="hidden" name="nlr[47]" value="100001003">
								<input type="hidden" name="nlr[23]" value="Home">          
								<div class="controls controls-row js-newsletter">
									<div class="row inp-home">
										<?php $get_page_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id; ?>
										<label class="hidden">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">deine Emailadresse--</font>
											</font>
										</label>
										<input id="page_type"  value="<?php echo $get_page_id ?>" type="hidden">
										<input id="optin-email" name="subscribe" type="email" placeholder="deine Emailadresse" class="cs-newsletter-home-input subscribe_input">
										<button type="button" id="subscribe" class="js-newsletter-checkbox cs-newsletter-btn btn cs-flat-btn-grey cs-transition-fast subscribe_btn-mine btn-ww">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Abonnieren</font>
											</font>
										</button>
										<label class="" id="news_error" style="color:red">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;"></font>
											</font>
										</label>
									</div>
									<label class="cs-newsletter-label">
										<input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy" type="checkbox" name="" value="">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">&nbsp;&nbsp;&nbsp;*Ich habe die  </font>
										</font>
										<a href="<?php echo base_url().'home/privacy_policy' ?>">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Datenschutz-Bestimmungen</font>
											</font>
										</a>
										<font style="vertical-align: inherit;line-height: 1.6;">
											<font style="vertical-align: inherit;"> gelesen und stimme den Bedingungen zu.</font>
										</font>
									</label>
									<label class="js-newsletter-profiling cs-newsletter-label" style="display: none;">
										<input class="cs-newsletter-checkbox" type="checkbox" name="nlr[6]" value="1">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Ja, ich möchte einen auf meine Interessen zugeschnittenen individuellen Newsletter erhalten, damit ich keine persönlichen Coupons und Aktionen mehr verpasse. Ich stimme der Analyse meiner Klicks und Öffnungsverhalten zu. Detaillierte Informationen finden Sie in unserer Datenschutzerklärung. Diese Einwilligung kann ich gemäß der Erklärung jederzeit widerrufen.</font>
										</font>
									</label>
									<div class="row cs-newsletter-star-row">
										<span class="cs-newsletter-star req-change">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">* Pflichtfeld</font>
											</font>
										</span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
		</section>
		
		
		
		
		
		
		<section class=" cs-home-tabs-content home-section" >
			<div class="container width-full">
			    <h1 class="cs-home-h-mine rem" style="">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">Beliebte Marken---</font>
					</font>
				</h1>
				<div class="cs-coupon-small-box cs-flex">
				<?php
				$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
				$popular_quantity  = $this->db->get_where('system_settings',array('type'=>'top_section_brands_limit'))->row()->description;
				$get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit($popular_quantity)->get_where('brands', array('status'=>'Active','popular_shop'=>'1'))->result_array();
				foreach($get_all_brands as $fetch_data){
					$brand_image = $fetch_data['brand_image'];
					$brand_name = $fetch_data['name'];
					$brand_id = $fetch_data['brands_id'];
					$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
					$brand_name_array = explode(" ",$brand_name);
				
					if(count($brand_name_array) > 0){
					$brand_name_new = str_replace(' ', '-', $brand_name);
					}
					else{
						$brand_name_new = $brand_name;
					}
				?>
							<div class="cs-coupon-small cs-column-4">		
								<a style="text-decoration: none;" target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" >
									<div class="cs-coupon-box" style="margin-top: 6px;">
										<div class="cs-outer-coupon outer_my_cpn">
											<div class=" js-btn-co js-co" title="To the <?php echo $brand_name ?> voucher" style="cursor: pointer;"></div>           
											<!-- img small online -->
											<div class="cs-coupon-small-logo img_new_div">
												<img class="lazyloaded 1--" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name; ?>">
											</div>
											<!-- <div class=" new_name_desc ">
											<span><?php echo  $brand_name; ?></span>
											<p class="new_desc"><?php 
											echo substr($fetch_data['title'], 0, 60)."...";
											?></p>
											
											</div> -->
											<div class=" new_brands_link ">
											<span class="new_link"> <?php echo  $brand_name; ?></span>
											</div>
										</div>
									</div>
								</a>
								
							</div>
						<!-- Small Coupon -->
					<?php  } ?>
				</div>
				
			</div>
		</section>
		
	
		<?php 
			$static_about_us = $this->db->get_where('static_content', array('type'=>'about_us'))->row();
			$about_title = $static_about_us->title;
			$about_desc = $static_about_us->description;
			$about_img = $static_about_us->image;
			$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
		?>
	<?php /* ?>		<section class="cs-home-selection cs-home-about-us-box cs-home-selection-text" style="padding: 15px 0!Important">
			<div class="container">    
				<div class="cs-home-about-us">   
					<div class="cs-infoxbox-item">
						<h2 class="cs-home-h rem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $about_title ?></font></font></h2>
						<div class="cs-infobox-inner cs-flex row-reverse">     
							<div class="cs-infobox-right col-md-5">
								<img class=" lazyloaded w-100" src="<?php echo base_url().$static_upload_url.$about_img; ?>" data-src="<?php echo base_url().$static_upload_url.$about_img; ?>" width="220px" alt="<?php echo $about_title ?>" title="<?php echo $about_title ?>">
							</div>
							<div class="cs-infobox-text cs-infobox-left col-md-7">
								<p>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;"><?php echo $about_desc ?></font>
									</font>
								</p>
							</div>  
						</div>              
					</div>
				</div>
			</div>
			<?php
			$static_saving = $this->db->get_where('static_content', array('type'=>'saving offers home'))->row();
			$saving_title = $static_saving->title;
			$saving_desc = $static_saving->description;	
			?>
			<div class="container">    
				<div class="cs-home-about-us">   
					<div class="cs-infoxbox-item">
						<h2 class="cs-home-h mb-2 mt-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $saving_title;?></font></font></h2>
						<div class="cs-infobox-innerx">     
							<div class="cs-infobox-text" style="width: 100%;">
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $saving_desc;?></font></font></p>
								<div class="container" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
									<ul class="container-fluid">
										<?php 
											$get_saving_offers = $this->db->get_where('saving_offers', array('status'=>'Active'))->result_array();
											foreach($get_saving_offers as $fetch_data){
												$offer_title = $fetch_data['name'];
										?>
												<li class="col-md-4 list_item" style="padding-bottom: 10px;">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;"><?php echo $offer_title ?></font>
													</font>
												</li>
										<?php } ?>
									</ul>
								</div>  
							</div>  
						</div>              
					</div>
				</div>
			</div>
		</section>
		<?php */ ?>
		<!-- Table of 3 side by side for the newest, exclusive ... -->
		  <?php 
			$get_latest_coupons = $this->db->query("
					select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
					from coupons as cpn 
					left join brands as brand ON cpn.brands_id = brand.brands_id
					where cpn.status = 'Active'  AND lastest_order!='' AND lastest_order!='0' AND cpn.start_date <= '".date('Y-m-d')."' AND cpn.end_date >= '".$date."' ORDER BY cpn.lastest_order ASC LIMIT 8
				")->result_array();
			$get_trending_coupons = $this->db->query("
				select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
				from coupons as cpn 
				left join brands as brand ON cpn.brands_id = brand.brands_id
				where cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order!='0' AND cpn.start_date <= '".date('Y-m-d')."' AND cpn.end_date >= '".$date."' ORDER BY cpn.trending_order  ASC LIMIT 8
			")->result_array();
			$get_tip_coupons = $this->db->query("
				select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
				from coupons as cpn 
				left join brands as brand ON cpn.brands_id = brand.brands_id
				where 
				cpn.status = 'Active' AND cpn.tips = '1'
				 AND tips_order!='' AND cpn.start_date <= '".date('Y-m-d')."' AND cpn.end_date >= '".$date."' AND tips_order!='0'
				ORDER BY cpn.tips_order  ASC LIMIT 8
			")->result_array();
			$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		  ?>
		<section class="cs-home-selection cs-home-table no_pad_top" style=" padding: 15px 0!Important">
            <div class="container">
				<div class="cs-home-table-wrap cs-flex">
					<?php 
					if($lastest_copuon_section_flag==1){
					?>
					<div class="cs-home-table-item">
						<h2 class="coupon_h2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $Latest_text;?></font></font></h2>
						<!-- Small List Coupon -->
							<?php
							foreach($get_latest_coupons as $fetch_data){
								$brand_image 	= $fetch_data['brand_image'];
								$brand_name 	= $fetch_data['brand_name'];
								$brand_id 		= $fetch_data['brands_id'];
								$short_tagline 	= $fetch_data['short_tagline'];
								$cpn_desc 		= $fetch_data['description'];
								$discount_type 	= $fetch_data['discount_type'];
								$discount_value = $fetch_data['discount_value'];
								$coupon_code 	= $fetch_data['coupon_code'];
								$coupons_id 	= $fetch_data['coupons_id'];
								$publish_date 	= $fetch_data['date_added'];
								$lastest_order 	= $fetch_data['lastest_order'];
								
								$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
								
								if($discount_type == 'Fixed'){
									$discount_type_sign = '&euro;';								
								}
								else if($discount_type == 'Percentage'){
									$discount_type_sign = '%';
								}
								else{
									$discount_type_sign = '';	
								}
								$date_1 = $fetch_data['date_added'];
								$date_2 = date('Y-m-d H:i:s');
								$datetime1 = date_create($date_1);
								$datetime2 = date_create($date_2);
								$interval = date_diff($datetime1, $datetime2);
								if($lastest_order!= 0 AND $lastest_order !=""){
									$brand_name_new = "";
									$brand_name_array = explode(" ",$fetch_data['brand_name']);
									if(count($brand_name_array) > 0){
										$brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
									}
							?>
							<div class="cs-coupon-small-list" style="margin-bottom:20px;">		
								<a class="cs-coupon-small-list-outer row" href="<?php echo base_url().'marken/'.$brand_name_new.'?coupons_id='.$coupons['coupons_id']; ?>" title="<?php echo $short_tagline ?>">
									<!-- img small online -->
									<div class="cs-coupon-small-list-logo" style="">
										<img style=" padding-right: 10px;" class="4-- lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>">
									</div>
									<div class="cs-coupon-small-list-desc latest_cpn_desc" >
										<span class="cs-home-table-label-short ">
											<font style="vertical-align: inherit;">
											   <?php
											    if($discount_type == 'Custom'){																			
											   ?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?></font>
												<?php
												}
												else{
												?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?> Rabatt</font>
												<?php
												}
												?>
											</font>
										</span> 
										<br>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;"> 
												<?php echo $brand_name.' ('.$get_brand_total_codes.' Gutschein) ' ?>
											</font>
										</font>
										<?php
										 $published_date         = strtotime($publish_date);
			                             $current_date           = strtotime(date('Y-m-d h:i:s'));
										 $days                   = abs(($current_date - $published_date)/86400);
										 $hours                  = abs(($days)*24);
										 $minuts                 = abs(($days)*24*60);
										 $second                 = abs(($days)*24*60*60);
										 
                                         if($days <1){
											$show_time = floor($hours)." h"; 
											if($hours<1){
											  $show_time = floor($minuts)." m"; 
											  if($minuts<1){
												$show_time = floor($second)." s";   
											  }
											}											
										  }
										  else{
											$show_time = floor($days)." d";  
										  }										
										?>
										<font class="small_coupon_meta"> Veröffentlichen <?php echo $show_time ; ?> ago </font>
									</div>
								</a>
							</div>
							<!-- Small List Coupon -->
							<?php } } ?>
						<a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home" href="<?php echo base_url().'home/coupons/latest/' ?>" >
							<font style="vertical-align: inherit; font-size:14px;">
								<font style="vertical-align: inherit;">Mehr aktuelle gutscheine</font>
							</font>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
					<?php 
					}
					?>
					<?php 
					if($trending_copuon_section_flag==1){
					?>
					<div class="cs-home-table-item">
					  <h2 class="coupon_h2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $Trending_text?></font></font></h2>
							<?php
							
							foreach($get_trending_coupons as $fetch_data){
								$brand_image = $fetch_data['brand_image'];
								$brand_name = $fetch_data['brand_name'];
								$brand_id = $fetch_data['brands_id'];
								$short_tagline = $fetch_data['short_tagline'];
								$cpn_desc = $fetch_data['description'];
								$discount_type = $fetch_data['discount_type'];
								$discount_value = $fetch_data['discount_value'];
								$coupon_code 	= $fetch_data['coupon_code'];
								$coupons_id 	= $fetch_data['coupons_id'];
								$trending_order = $fetch_data['trending_order'];
								
								$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
								
								if($discount_type == 'Fixed'){
									$discount_type_sign = '&euro;';								
								}
								else if($discount_type == 'Percentage'){
									$discount_type_sign = '%';
								}
								else{
									$discount_type_sign = '';	
								}
								
								if($trending_order!= 0 AND $trending_order !=""){
									$brand_name_new = "";
									$brand_name_array = explode(" ",$fetch_data['brand_name']);
									if(count($brand_name_array) > 0){
										$brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
									}
							?>
							<div class="cs-coupon-small-list"  style="margin-bottom:20px;" >		
								<a class="cs-coupon-small-list-outer row" href="<?php echo base_url().'marken/'.$brand_name_new.'?coupons_id='.$coupons['coupons_id']; ?>"  title="<?php echo $short_tagline ?>">
									<!-- img small online -->
									<div class="cs-coupon-small-list-logo">
										<img style=" padding-right: 10px;" class="4-- lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>">
									</div>
									<div class="cs-coupon-small-list-desc trend_cpn_desc">
										<span class="cs-home-table-label-short">
											<font style="vertical-align: inherit;">
											<?php
											    if($discount_type == 'Custom'){																			
											   ?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?></font>
												<?php
												}
												else{
												?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?> Rabatt</font>
												<?php
												}
												?>
											</font>
										</span><br>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;"> 
												<?php echo $brand_name.' ('.$get_brand_total_codes.' Gutschein) ' ?>
											</font>
										</font>
									</div>
								</a>
							</div>
							<!-- Small List Coupon -->
							<?php } } ?>
						<a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home" href="<?php echo base_url().'home/coupons/trending' ;?>" >
							<font style="vertical-align: inherit;font-size:14px">
								<font style="vertical-align: inherit;">Weitere Trendige Gutscheine  </font>
							</font>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
					<?php
					} 
					?>
					<?php 
					if($tips_copuon_section_flag==1){
					?>
					<div class="cs-home-table-item">
						<h2 class="coupon_h2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $Tips_text?></font></font></h2>
						<?php
							foreach($get_tip_coupons as $fetch_data){
								$brand_image = $fetch_data['brand_image'];
								$brand_name = $fetch_data['brand_name'];
								$brand_id = $fetch_data['brands_id'];
								$short_tagline = $fetch_data['short_tagline'];
								$cpn_desc = $fetch_data['description'];
								$discount_type = $fetch_data['discount_type'];
								$discount_value = $fetch_data['discount_value'];
								$coupon_code 	= $fetch_data['coupon_code'];
								$coupons_id 	= $fetch_data['coupons_id'];
								$tips_order 	= $fetch_data['tips_order'];
								
								$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
								
								if($discount_type == 'Fixed'){
									$discount_type_sign = '&euro;';								
								}
								else if($discount_type == 'Percentage'){
									$discount_type_sign = '%';
								}
								else{
									$discount_type_sign = '';	
								}
					         	if($tips_order!= 0 AND $tips_order !=""){
									$brand_name_new = "";
									$brand_name_array = explode(" ",$fetch_data['brand_name']);
									if(count($brand_name_array) > 0){
										$brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
									}
							?>
							<div class="cs-coupon-small-list" style="margin-bottom:20px;" >		
								<a class="cs-coupon-small-list-outer row" href="<?php echo base_url().'marken/'.$brand_name_new.'?coupons_id='.$coupons['coupons_id']; ?>"  title="<?php echo $short_tagline ?>">
									<div class="cs-coupon-small-list-logo">
										<img style=" padding-right: 10px;" class="6-- lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>">
									</div>
									<div class="cs-coupon-small-list-desc tip_cpn_desc">
										<span class="cs-home-table-label-short">
											<font style="vertical-align: inherit;">
											<?php
											    if($discount_type == 'Custom'){																			
											   ?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?></font>
												<?php
												}
												else{
												?>
												<font class="orange_font_color" style="vertical-align: inherit;"><?php echo $discount_value.$discount_type_sign ?> Rabatt</font>
												<?php
												}
												?>
											</font>
										</span><br>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;"> 
												<?php echo $brand_name.' ('.$get_brand_total_codes.' Gutschein) ' ?>
											</font>
										</font>
									</div>
								</a>
							</div>
							<!-- Small List Coupon -->
							<?php } }?>
						<a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home" href="<?php echo base_url().'home/coupons/tips' ?>" >
							<font style="vertical-align: inherit;font-size:14px;">
								<font style="vertical-align: inherit;">Mehr Tipps von Redakteuren</font>
							</font>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
					<?php
					} 
					?>	
				</div>
			</div>
			<?php
		
				$top_left_img = $static_top_left->image;
				$top_left_desc = $static_top_left->description;
		
				$top_center_img = $static_top_center->image;
				$top_center_desc = $static_top_center->description;
		
				$top_right_img = $static_top_right->image;
				$top_right_desc = $static_top_right->description;
				
				$count_total_vouchers = $this->db->get_where('coupons', array('status'=>'Active'))->num_rows();
				$count_total_brands = $this->db->get_where('brands', array('status'=>'Active'))->num_rows();
			?>
			<!-- <div class="container icon_txt_bar mt-2" style="margin-bottom:-15px;">
				<div class="row cs-home-trust-row cs-special-banner-space">
					<div class="col-xs-4 cs-home-trusts " style="cursor: pointer;">
						<div class="text-center row">
							<img class="img-fluid" src="<?php echo base_url().$static_upload_url.$top_left_img ?>" style="width:30px; height:30px;" />
						</div>
						<div class="text-center row">
							<span>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"><?php echo $count_total_vouchers.' '.$top_left_desc ?></font>
								</font>
							</span>
						</div>
					</div>
					<div class="col-xs-4 cs-home-trusts " style="cursor: pointer;">
						<div class="text-center row">
							<img class="img-fluid" src="<?php echo base_url().$static_upload_url.$top_center_img ?>" style="width:30px; height:30px;" />
						</div>
						<div class="text-center row">
							<span>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"><?php echo $count_total_brands.' '.$top_center_desc ?> </font>
								</font>
							</span>
						</div>
					</div>
					<div class="col-xs-4 cs-home-trusts">
						<div class="text-center row">
							<img class="img-fluid" src="<?php echo base_url().$static_upload_url.$top_right_img ?>" style="width:30px; height:30px;" />
						</div>
						<div class="text-center row">
							<span class="">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"><?php echo $top_right_desc ?> </font>
								</font>
							</span>
						</div>
					</div>
				</div>
			</div> -->
		</section>
		
		<?php
			$static_about_us = $this->db->get_where('static_content', array('type'=>'about_us'))->row();
			$about_title = $static_about_us->title;
			$about_desc = $static_about_us->description;
			$about_img = $static_about_us->image;
			$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
		?>
		<section class="cs-home-selection cs-home-about-us-box cs-home-selection-text" style="padding: 15px 0!Important">
			<div class="container">    
				<div class="cs-home-about-us">   
					<div class="cs-infoxbox-item">
						<h2 class="cs-home-h"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $about_title ?></font></font></h2>
						<div class="cs-infobox-inner cs-flex row-reverse">     
							<div class="cs-infobox-right col-md-5">
								<img class=" lazyloaded w-100" src="<?php echo base_url().$static_upload_url.$about_img; ?>" data-src="<?php echo base_url().$static_upload_url.$about_img; ?>" width="220px" alt="<?php echo $about_title ?>" title="<?php echo $about_title ?>">
							</div>
							<div class="cs-infobox-text cs-infobox-left col-md-7">
								<p>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;"><?php echo $about_desc ?></font>
									</font>
								</p>
							</div>  
						</div>              
					</div>
				</div>
			</div>
			<?php
			$static_saving = $this->db->get_where('static_content', array('type'=>'saving offers home'))->row();
			$saving_title = $static_saving->title;
			$saving_desc = $static_saving->description;	
			?>
			<div class="container">    
				<div class="cs-home-about-us">   
					<div class="cs-infoxbox-item">
						<h2 class="cs-home-h mb-2 mt-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $saving_title;?></font></font></h2>
						<div class="cs-infobox-innerx">     
							<div class="cs-infobox-text" style="width: 100%;">
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $saving_desc;?></font></font></p>
								<div class="container" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
									<ul class="container-fluid">
										<?php 
											$get_saving_offers = $this->db->get_where('saving_offers', array('status'=>'Active'))->result_array();
											foreach($get_saving_offers as $fetch_data){
												$offer_title = $fetch_data['name'];
										?>
												<li class="col-md-4 list_item" style="padding-bottom: 10px;">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;"><?php echo $offer_title ?></font>
													</font>
												</li>
										<?php } ?>
									</ul>
								</div>  
							</div>  
						</div>              
					</div>
				</div>
			</div>
		</section>
		<!-- Categories -->
		<?php 
			$get_categories = $this->db->order_by('section_sort_order', 'ASC')->limit(16)->get_where('categories', array('status'=>'Active'))->result_array();
			$cat_img_url = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description;
			$cat_img1 = base_url().$cat_img_url.$get_categories[0]['cat_image'];
			$cat_img2 = base_url().$cat_img_url.$get_categories[1]['cat_image'];
			$cat_img3 = base_url().$cat_img_url.$get_categories[2]['cat_image'];
			$cat_img4 = base_url().$cat_img_url.$get_categories[3]['cat_image'];
		?>
		<style>
		   
		    
			.cat_1{
				background-image: url("<?php echo $cat_img1 ?>");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			.cat_2{
				background-image: url("<?php echo $cat_img2 ?>");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			.cat_3{
				background-image: url("<?php echo $cat_img3 ?>");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			.cat_4{
				background-image: url("<?php echo $cat_img4 ?>");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			.move_div:hover .move_far{
				margin-left: 4px;
				transition : margin 1s;
				
			}
		</style>
		<?php 
		  $pop_categories_text = $this->db->get_where('static_content',array('type'=>'Popular categories home'))->row()->title;
		?>
		<section class="cs-home-selection cs-home-cats" style="padding:15px">
            <div class="container">
				<h3 class="cs-home-h rem">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;"><?php echo $pop_categories_text; ?></font>
					</font>
				</h3>
				<?php /*
				<section class="cs-all-categories-categories cs-home-mer-box-ul cs-flex cs-flex-mobil display-gri">
						<div class="col-md-12 col-sm-12">
							<div class="col-md-3 col-sm-3 container-fluid wid-home">
								<a href="<?php echo base_url().'home/categories/'.$get_categories[0]['categories_id']; ?>">
									<div class="container-fluid cat_1" style="background-color: #f8f8f8; height: 200px; -webkit-box-shadow: inset 0px -90px 98px rgb(255 255 255); box-shadow: inset 0px -90px 98px rgb(255 255 255); border-bottom: 2px solid #5c8374;">
									<h3 style="margin-top:140px;"><span><?php echo $get_categories[0]['name'] ?></span></h3>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-sm-3 container-fluid" style="padding-left: 10px; padding-right: 10px;">
								<a href="<?php echo base_url().'home/categories/'.$get_categories[1]['categories_id']; ?>">
									<div class="container-fluid cat_2" style="background-color: #f8f8f8; height: 200px; -webkit-box-shadow: inset 0px -90px 98px rgb(255 255 255); box-shadow: inset 0px -90px 98px rgb(255 255 255); border-bottom: 2px solid #5c8374;">
									<h3 style="margin-top:140px;"><span><?php echo $get_categories[1]['name'] ?></span></h3>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-sm-3 container-fluid" style="padding-left: 10px; padding-right: 10px;">
								<a href="<?php echo base_url().'home/categories/'.$get_categories[2]['categories_id']; ?>">
									<div class="container-fluid cat_3" style="background-color: #f8f8f8; height: 200px; -webkit-box-shadow: inset 0px -90px 98px rgb(255 255 255); box-shadow: inset 0px -90px 98px rgb(255 255 255); border-bottom: 2px solid #5c8374;">
									<h3 style="margin-top:140px;"><span><?php echo $get_categories[2]['name'] ?></span></h3>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-sm-3 container-fluid" style="padding-left: 10px; padding-right: 10px;">
								<a href="<?php echo base_url().'home/categories/'.$get_categories[3]['categories_id']; ?>">
									<div class="container-fluid cat_4" style="background-color: #f8f8f8; height: 200px; -webkit-box-shadow: inset 0px -90px 98px rgb(255 255 255); box-shadow: inset 0px -90px 98px rgb(255 255 255); border-bottom: 2px solid #5c8374;">
									<h3 style="margin-top:140px;"><span><?php echo $get_categories[3]['name'] ?></span></h3>
									</div>
								</a>
							</div>
						</div>
				 </section>
				 */ ?>

				<?php /*
				<section class="cs-all-categories-categories cs-home-mer-box-ul cs-flex cs-flex-mobil display-root">
					<?php 
					    $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
						foreach($get_categories as $key => $fetch_data){ 
							$cat_name = $fetch_data['name'];
							$cat_img = $fetch_data['cat_image'];
							$font_icon = $fetch_data['font_icon'];
							$cat_id = $fetch_data['categories_id'];
							
							if($key>3){
					?>
							<div class="cs-coupon-small-list col-md-3 col-sm-3" style="background: transparent; padding: 10px; border: none;" >		
								<a class="cs-coupon-small-list-outer move_div row" target="_blank" href="<?php echo base_url().'home/categories/'.$cat_id ?>" title="<?php echo $cat_name ?>" style="border-bottom: 2px solid gray; height:45px;">
									<!-- img small online -->
									<div class="cs-coupon-small-list-logo" style="width: 35px;">
										<img style="filter: invert(0.5);" class="cate_image"  src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
									</div>
									<div class="cs-coupon-small-list-desc" style="padding-left: 10px; font-size:14px; height:30px;">
										<span class="cs-home-table-label-short " style="vertical-align: sub; font-size:14px;">
											<font style="vertical-align: super ;">
												<font style="vertical-align: sub;"><?php echo $cat_name ?> </font>
											</font>
										</span>
									</div>
									<div class="cs-coupon-small-list-cta ">
										<i class="fa fa-angle-right move_far" style="font-size:24px; position: relative; right: 0px; color: gray;"></i>
									</div>
								</a>
							</div>
					<?php } } ?>
				</section>
				*/ ?>

				<div class="row btn-center" style="text-align: center;">
					<div class="col-md-4 col-sm-4 col-md-offset-4">
						<a class="cs-home-table-link cs-home-table-link2 more_coupon_btn" href="<?php echo base_url().'home/categories/' ?>" title="All categories">
							<font style="vertical-align: inherit;font-size:14px;">
								<font style="vertical-align: inherit;">Alle Kategorien</font>
							</font>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
            </div>
		</section>
		<?php 
		  $redeem = $this->db->get_where('static_content',array('type'=>'redeem text on home'))->row();
		  $redeem_text = $redeem->title;
		  $description1 = $redeem->description;
		  $text_1 = $redeem->text_1;
		  $text_2 = $redeem->text_2;
		  $text_3 = $redeem->text_3;
		?>
		<section class="cs-home-selection cs-home-about-us-box cs-home-selection-text " style="padding-bottom: 0px !important;display:none;">
			<div class="container">
				<div class="cs-home-about-us">
					<div class="cs-infoxbox-item">
						<h2 class="cs-home-h rem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $redeem_text;?></font></font></h2>
						<div class="cs-infobox-innerx">
						<div class="cs-infobox-text" style="width: 100%;">
							<p>
								<?php echo $description1; ?>
							</p>
							<ul class="row cs-home-how-to-ul padding-bot" style="margin-bottom:0px;">
								<li class="cs-home-how-to-li bg-none" style="padding-bottom: 0px !important;">
									<div class="row">
									<div class="col-sm-4">
										<div class="tag_label"> 1 </div>
									</div>
									</div>
									<font style="vertical-align: inherit;">
									<?php echo $text_1;?>
									</font>
								</li>
								<li class="cs-home-how-to-li bg-none" style="padding-bottom: 0px !important;">
									<div class="row">
									<div class="col-sm-4">
										<div class="tag_label"> 2 </div>
									</div>
									</div>
									<font style="vertical-align: inherit;">
									<?php echo $text_2;?>
									</font>
								</li>
								<li class="cs-home-how-to-li bg-none" style="padding-bottom: 0px !important;">
									<div class="row">
									<div class="col-sm-4">
										<div class="tag_label">3 </div>
									</div>
									</div>
									<font style="vertical-align: inherit;">
									<?php echo $text_3;?>
									</font>
								</li>
							</ul>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php  
		  $pop_shop_text = $this->db->get_where('static_content',array('type'=>'popular shops on home'))->row()->title;
		?>
		<section class="cs-home-selection cs-home-mer-box " style="padding:15px">
			<div class="container" style="margin-bottom: -53px;">
			<!-- <h3 class="cs-home-h rem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $pop_shop_text;?></font></font></h3> -->
			<div class="main_poplar_show_section">
				<button class="popular_shops_btn">
					<span role="heading" aria-level="2">Beliebte Marken---</span>
					<i class="fa fa-angle-down" id="fa-down-angle" aria-hidden="true"></i>
				</button>
				
				<div class=" pop_brands_content" style="display:none">
				 <div class="shop_container">
				<?php
				$popular_quantity  = $this->db->get_where('system_settings',array('type'=>'popular_brands_limit'))->row()->description;
				$get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit($popular_quantity)->get_where('brands', array('status'=>'Active','popular_shop'=>'1'))->result_array();
				foreach($get_all_brands as $index => $fetch_data){
					if($index > 14){

						$brand_image = $fetch_data['brand_image'];
						$brand_name = $fetch_data['name'];
						$brand_id = $fetch_data['brands_id'];
						// $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
						$brand_name_array = explode(" ",$brand_name);
					
						if(count($brand_name_array) > 0){
						$brand_name_new = str_replace(' ', '-', $brand_name);
						}
						else{
							$brand_name_new = $brand_name;
						}
					?>
						<div class="shop-item">
							<a href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" title="<?php echo $brand_name ?>">
								<?php echo $brand_name; ?>
							</a>
						</div>
				<?php } } ?>
					</div>
				</div>
			</div>
			</section>

		<?php /* <section class="cs-home-selection cs-home-selection-text" style=" "></section>*/ ?>	
		<section class="cs-home-selection cs-home-mer-box ">
		 <div class="container faqs_resp">
			<?php
					$faqs_quantity  = $this->db->get_where('system_settings',array('type'=>'home_faqs_quantity'))->row()->description;			 
					$this->db->limit($faqs_quantity);
					$faqs_tabs   = $this->db->get_where('faqs', array('question_type'=>'1'))->result_array();
					$faqs_quantity--;
				?>
				<?php /*
			<div class="col-md-4 tabs-closes" id="tabs_faqss" style="display:none">
				<h3>Inhalt</h3>
				<?php foreach($faqs_tabs as $key => $faqs){ ?>
				<div style='<?php if($key==$faqs_quantity){ echo "border-bottom:0.1px solid #00000036"; } ?>'  class="tabs_content  faqs_tabs <?php if($key==0){echo "active_tab";}?>" id="<?php echo $faqs['faqs_id']?>"><h3><?php echo $faqs['question']?></h3></div>
				<?php } ?>
			</div>
			*/ ?>
			<div class="row about_section" >
				<div class="col-md-8 cs-footer-item cs-footer-item-social cs-footer-item-social">
					<div>
					<?php $about_us   = $this->db->get_where('static_content', array('type'=>'bottom_about_us'))->row()->description; ?>
					<h2 class="cs-home-h para rem">
						<?php echo $this->db->get_where('static_content', array('type'=>'bottom_about_us'))->row()->title; ?>
					</h2>
					<p class="para">
						<?php echo substr($about_us,0,300); ?>
						<span style="display:none" id="see_1">
						<?php echo substr($about_us,300) ?>
						</span>
						<?php if(strlen($about_us)>300) {?>
						<span class="see_more  " style="margin-top: 2px;" data-type="see more" id="saw_1">Weiterlesen</span>
						<?php }?>
					</p>
					</div>
					<div id="faqs_answer" class="left-position3">
					<?php 
						foreach($faqs_tabs as $key => $faqs){
						?>
					<div class="faqs" id="faqs_<?php echo $faqs['faqs_id']?>" style="<?php if($key!=0){  echo "display:none; "; }?> ">
						<h3 class="cs-home-h rem"><?php echo $faqs['question']?></h3>
						<div class="p-h">
							<p class="para"><?php echo $faqs['answer']?></p>
						</div>
					</div>
					<?php } ?>
					</div>
				</div>
				<div class="col-md-4 tab-close" id="tabs_faqss">
					<h3>Inhalt</h3>
					<?php foreach($faqs_tabs as $key => $faqs){ ?>
					<div style='<?php if($key==$faqs_quantity){ echo "border-bottom:0.1px solid #00000036"; } ?>'  class="tabs_content faqs_second faqs_tabs  <?php echo $faqs['faqs_id']?>  <?php if($key==0){echo "active_tab";}?>" id="<?php echo $faqs['faqs_id']?>"><h3 style="font-size:14px; font-weight:bold"><?php echo $faqs['question']?></h3></div>
					<?php } ?>
				</div>
			</div>
		    </div>
		     <div>
			<div>
			</div>
		  </div>
		</section>

	</div>
</main>
<?php
   $system_name = $this->db->get_where('system_settings', array('type'=>'system_name'))->row()->description;
   $system_image = $this->db->get_where('system_settings',array('type'=>'system_image'))->row()->description;
   $brands = $this->db->select("*")->from("brands")->where('status', 'Active')->order_by('updated_at', 'desc')->order_by('brands_id', 'desc')->limit(30)->get()->result_array();
   ?>
<div style="height: 0px; overflow:hidden;">
   <?php foreach($brands as $brand) { $brand_name_new = str_replace(' ', '-', $brand['name']); ?>
      <div class="shop-item">
         <a href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" title="<?php echo $brand['name'] ?>">
            <?php echo $brand['name']; ?>
         </a>
      </div>
   <?php } ?>
</div>