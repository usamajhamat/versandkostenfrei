<?php  
$date= date("Y-m-d"); 
$sign = "";
// setlocale(LC_TIME, 'de_DE', 'de_DE.UTF-8');
?>
<style>
	.box-shadow-top-bottom {
		position: relative;
		box-shadow: 0 0 5px #d7d7d7, 0 0 5px #d7d7d7;
	}
	.space-grid-bottom {
		margin-bottom: 20px;
	}
	.space-top {
		margin-top: 10px!important;
	}
	@media screen and (min-width: 992px) {
		.alphabetical-listing-navigator .list-letters .item-text {
			padding: 8px 12px;
		}
	}
	.alphabetical-listing-navigator .list-letters .item-text {
		display: block;
		padding: 5px 12px;
	}
	.alphabetical-listing-navigator .list-letters .item-text, .link-element {
		color: #005eb8;
		cursor: pointer;
	}
	.padding-top {
		padding-top: 10px!important;
	}
	.bg_grey_1{
		background: #eee;
	}
	.bg_grey_2{
		background: #f5f5f5;
	}
	iframe{
		padding: 0;
	}
  .boxarea {
    box-shadow: 0 0 6px #b4b4b4;
    background: #fff;
}

.cs-text.txt_box.mt-2.col-sm-12.brand_logo_rev {
    box-shadow: unset;
}

.alert_box.mt-2.col-sm-12 {
    box-shadow: unset;
}
  .col-sm-3.col-md-3.brand_hide {
    border-right: 1px solid #8080804f;
}

/* Fix background and layout issues on mobile */
@media (max-width: 768px) {
  .cs-home-mer-box-ul.cs-flex.cs-flex-mobil {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    align-items: flex-start;
    background-color: inherit; /* Keeps same background */
    width: 100% !important;
    margin: 0 auto !important;
    border-radius: 20px; /* Keeps rounded style if you have it */
    padding: 10px !important;
    box-sizing: border-box;
  }

  .cs-home-mer-box-ul.cs-flex.cs-flex-mobil li {
    flex: 0 0 45%;
    margin: 5px auto !important;
  }

  /* Ensure no clipping or container overflow */
  .brand-name-list {
    width: 100% !important;
    overflow: visible !important;
  }
}


</style>

<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
    <div class="clearfix"></div>
	<div class="container-fluid">
		<div class="main-content-container cs-flex" style="padding-top:10px;margin-top: 4rem;">
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
				
				<div class="clearfix"></div>
				<?php $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description; ?>
				<?php $cat_img_url = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description; ?>
				
				<?php if($page_type == 'by_all'){ ?>
					<!-- Shops Section by A-Z Starts Here -->
					<div class="clearfix"></div>
					<section class="section-wrapper" style="padding:25px 0;">
                                            <div class="container section-space-top section-space-bottom">
                                              <h1 class="cs-home-h" 
                                                  style="font-size:24px; font-weight:700; color:#333; text-align:center; margin-bottom:6px;">
                                                <font style="vertical-align: inherit;">Gültige Gutscheine für alle Shops von A–Z</font>
                                              </h1>
                                              <div class="row" style="justify-content:center;">
                                                <div class="col-xs-12 col-md-10">
                                                  <div class="cs-infobox-text" style="width:100%; text-align:center;">
                                                    <p style="font-size:15px; color:#555; line-height:1.5; max-width:700px; margin:auto;">
                                                      <font style="vertical-align: inherit;">
                                                        Holen Sie sich aus dieser Liste aller Geschäfte von A–Z die neuesten Gutscheine fr Ihre Lieblingsgeschäfte oder die beliebten Geschäfte.
                                                      </font>
                                                    </p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>

                                          <section class="section-wrapper padding-top box-shadow-top-bottom" 
                                                   style="background:#f9f9f9; margin-bottom:15px; border-top:1px solid #eee; border-bottom:1px solid #eee; padding:12px 0;">
                                            <div class="container">
                                              <div class="alphabetical-listing-navigator" style="text-align:center;">

                                                <!-- Dropdown for small screens -->
                                                <select onchange="scroll_to_brand(this.id)" 
                                                        id="scroll_alpha_ddl" 
                                                        class="form-control hidden-sm hidden-md hidden-lg space-top space-grid-bottom"
                                                        data-type="scroll-to"
                                                        style="max-width:230px; margin:0 auto 10px; border:1px solid #ccc; border-radius:4px; padding:5px 8px; font-size:14px;">
                                                  <option value="Buchstaben auswählen">Buchstaben auswählen</option>
                                                  <option value="#letter-anchor-A">A</option>
                                                  <option value="#letter-anchor-B">B</option>
                                                  <option value="#letter-anchor-C">C</option>
                                                  <option value="#letter-anchor-D">D</option>
                                                  <option value="#letter-anchor-E">E</option>
                                                  <option value="#letter-anchor-F">F</option>
                                                  <option value="#letter-anchor-G">G</option>
                                                  <option value="#letter-anchor-H">H</option>
                                                  <option value="#letter-anchor-I">I</option>
                                                  <option value="#letter-anchor-J">J</option>
                                                  <option value="#letter-anchor-K">K</option>
                                                  <option value="#letter-anchor-L">L</option>
                                                  <option value="#letter-anchor-M">M</option>
                                                  <option value="#letter-anchor-N">N</option>
                                                  <option value="#letter-anchor-O">O</option>
                                                  <option value="#letter-anchor-P">P</option>
                                                  <option value="#letter-anchor-Q">Q</option>
                                                  <option value="#letter-anchor-R">R</option>
                                                  <option value="#letter-anchor-S">S</option>
                                                  <option value="#letter-anchor-T">T</option>
                                                  <option value="#letter-anchor-U">U</option>
                                                  <option value="#letter-anchor-V">V</option>
                                                  <option value="#letter-anchor-W">W</option>
                                                  <option value="#letter-anchor-X">X</option>
                                                  <option value="#letter-anchor-Y">Y</option>
                                                  <option value="#letter-anchor-Z">Z</option>
                                                  <option value="#letter-anchor-0-9">0–9</option>
                                                </select>

                                                <!-- Alphabet letters -->
                                                <ul class="list-letters head_alphbets list-unstyled clearfix hidden-xs hidden-smaller"
                                                    style="display:flex; flex-wrap:wrap; justify-content:center; gap:10px; margin:0; padding:0; list-style:none; align-items:center;">
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-A" data-type="scroll-to">A.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-B" data-type="scroll-to">B.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-C" data-type="scroll-to">C.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-D" data-type="scroll-to">D.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-E" data-type="scroll-to">E.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-F" data-type="scroll-to">F.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-G" data-type="scroll-to">G.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-H" data-type="scroll-to">H.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-I" data-type="scroll-to">I.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-J" data-type="scroll-to">J.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-K" data-type="scroll-to">K.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-L" data-type="scroll-to">L.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-M" data-type="scroll-to">M.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-N" data-type="scroll-to">N.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-O" data-type="scroll-to">O.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-P" data-type="scroll-to">P.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-Q" data-type="scroll-to">Q.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-R" data-type="scroll-to">R.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-S" data-type="scroll-to">S.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-T" data-type="scroll-to">T.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-U" data-type="scroll-to">U.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-V" data-type="scroll-to">V.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-W" data-type="scroll-to">W.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-X" data-type="scroll-to">X.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-Y" data-type="scroll-to">Y.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-Z" data-type="scroll-to">Z.</span></li>
                                                  <li class="pull-left"><span class="link-static item-text pointer" data-target="#letter-anchor-0-9" data-type="scroll-to">0-9</span></li>
                                                </ul>
                                              </div>
                                            </div>
                                          </section>

                                          <style>
                                          .list-letters .item-text {
                                            color: #5c8374;
                                            font-weight: 600;
                                            font-size: 15px;
                                            cursor: pointer;
                                            transition: 0.2s ease;
                                            display: inline-block;
                                            padding: 4px 6px;
                                          }
                                          .list-letters .item-text:hover {
                                            color: #333 !important;
                                            transform: scale(1.1);
                                          }
                                          .section-wrapper {
                                            line-height: 1.2;
                                          }
                                          </style>

					<?php
					$show_ads = 0; 
					if(!empty($all_brands)){
						$count = 1;
						foreach($all_brands as $key=>$value){
							$alphabet = $key;
							?>
							
							<div class="cs-home-selection cs-home-mer-box bg_grey_2" style="padding-top:48px !important;"  id="letter-anchor-<?php echo strtoupper($alphabet) ?>" >
								<div class="container">
									<h3 class="cs-home-h alpha_heading_side"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo strtoupper($alphabet) ?>. </font></font></h3>
									<ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap" style="flex-wrap:wrap; justify-content:flex-start;">
  <?php
  if($alphabet != '0-9'){
    $count = 0;
    foreach($value as $fetch_data){
      $brand_image = $fetch_data['brand_image'];
      $brand_name = $fetch_data['name'];
      $title = $fetch_data['title'];
      $brand_id = $fetch_data['brands_id'];
      $show_ads = @$fetch_data['show_ads']; 
      
      $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND FIND_IN_SET(".$brand_id.", brands_id) != 0")->num_rows();
      $brand_name_new = "";
      $brand_name_array = explode(" ",$brand_name);
      if(count($brand_name_array) > 0){
        $brand_name_new = str_replace(' ', '-', $brand_name);
      }

      $count++;

      // After 4 images, show brand names in next row
      if($count == 5){
        echo "</ul><ul class='cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap brand-name-list' style='margin-top:10px; flex-wrap:wrap; justify-content:flex-start;'>";
      }
  ?>
      <a class="brand-card" href="<?php echo base_url().'marken/'.$brand_name_new;?>" style="text-decoration:none;">
        <li class="cs-home-mer-box-li-box" style="background:#fff; border:1px solid #ddd; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.08); transition:all 0.3s ease; display:block; padding:10px; text-align:center; height:auto;">	
          <?php if($count <= 4){ ?>
            <div class="brands_img_group" style="border-radius:8px; overflow:hidden; width:100%; max-width:120px; margin:auto; transition:transform 0.3s ease;">
              <img class="lazyloaded" style="width:100%; height:auto; display:block; padding:3px;" 
                   src="<?php echo base_url().$brand_img_url.$brand_image; ?>" 
                   data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" 
                   alt="<?php echo $brand_name ?>" 
                   title="<?php echo $brand_name ?>">
            </div>
            <label style="display:block; margin-top:5px; color:#000; font-size:12px;">
              (<?php echo $get_brand_total_codes ?> Gutscheine)
            </label>
          <?php } else { ?>
            <div class="brand-name-only" style="font-size:14px; font-weight:600; color:#333; padding:4px 0; position:relative; display:inline-block;">
              <?php echo $brand_name; ?>
            </div>
          <?php } ?>
        </li>
      </a>
  <?php } 
  } else {
    foreach($value as $fetch_data){
      $brand_image = $fetch_data['brand_image'];
      $brand_name = $fetch_data['name'];
      $title = $fetch_data['title'];
      $brand_id = $fetch_data['brands_id'];
//      $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') FIND_IN_SET(".$brand_id.", brands_id) != 0")->num_rows();
      $get_brand_total_codes  = $this->db->query(
            "SELECT * FROM coupons 
             WHERE status = 'Active' 
             AND start_date <= '".date('Y-m-d')."' 
             AND (end_date >= '".$date."' OR end_date = '0000-00-00') 
             AND FIND_IN_SET(".$brand_id.", brands_id) != 0"
        )->num_rows();
      
      // Skip brands with zero coupons: do NOT render <a> or <li>
        if($get_brand_total_codes == 0) {
            continue;
        }
      
      $brand_name_new = "";
      $brand_name_array = explode(" ",$brand_name);
      if(count($brand_name_array) > 0){
        $brand_name_new = str_replace(' ', '-', $brand_name);
      }
  ?>
      <a class="brand-card" href="<?php echo base_url().'marken/'.$brand_name_new;?>" style="text-decoration:none;">
        <li class="cs-home-mer-box-li-box" style="background:#fff; border:1px solid #ddd; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.08); display:block; padding:10px; text-align:center;">		
          <div class="brands_img_group" style="border-radius:8px; overflow:hidden; width:100%; max-width:120px; margin:auto;">
            <img class="lazyloaded" style="width:100%; height:auto;" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" 
                 data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" 
                 alt="<?php echo $brand_name ?>" 
                 title="<?php echo $brand_name ?>">
          </div>
          <label style="font-size:12px; color:#000;">(<?php echo $get_brand_total_codes ?> Gutscheine)</label>
        </li>
      </a>
  <?php } } ?>
</ul>

<style>
.cs-home-mer-box-ul {
  margin: 0;
  padding: 0;
  list-style: none;
  gap: 15px;
}
.brand-card {
  flex: 0 0 23%;
  max-width: 23%;
}
.cs-home-mer-box-li-box:hover {
  border-color: #5c8374;
  box-shadow: 0 3px 8px #5c8374;
  transform: translateY(-3px);
}
.brands_img_group:hover {
  transform: scale(1.05);
}
.brand-name-list .brand-card {
  flex: 0 0 23%;
  max-width: 23%;
  text-align: left;
}
.brand-name-list .brand-name-only {
  font-size: 14px;
  font-weight: 600;
  color: #333;
  position: relative;
  display: inline-block;
  cursor: pointer;
  transition: color 0.3s ease;
}
.brand-name-list .brand-name-only::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -3px;
  width: 0%;
  height: 2px;
  background-color: #5c8374;
  transition: width 0.3s ease;
}
.brand-name-list .brand-name-only:hover {
  color: #5c8374;
}
.brand-name-list .brand-name-only:hover::after {
  width: 100%;
}

/* Responsive Fixes */
@media (max-width: 992px) {
  .brand-card {
    flex: 0 0 30%;
    max-width: 30%;
  }
}
@media (max-width: 768px) {
  .brand-card {
    flex: 0 0 47%;
    max-width: 47%;
  }
}
@media (max-width: 576px) {
  .brand-card {
    flex: 0 0 100%;
    max-width: 100%;
  }
  .cs-home-mer-box-ul {
    gap: 10px;
  }
  .cs-home-mer-box-li-box {
    padding: 8px;
  }
}
</style>

<!--									<div class="row" style="text-align: center;margin-top: 15px;margin-bottom: 10px;">
									
										<a style="width:275px;" class="cs-home-table-link more_coupon_btn" href="<?php echo base_url().'home/brands/letter/'.strtoupper($alphabet); ?>" title="All Brands Start With <?php echo strtoupper($alphabet) ?>">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Marken beginnen mit <?php echo strtoupper($alphabet) ?></font>
											</font>
											<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</a>
									</div>-->
								</div>
							</div>
					<?php  
							$count++;
							if($count > 2){
								$count = $count - 2;
							}
						} 
					} ?>
					<!-- Shops Section by A-Z End Here -->
				<?php } else if($page_type == 'by_letter'){?>
						<div class="clearfix"></div>
						<div class="cs-home-selection cs-home-mer-box bg_grey_2" style="padding-top: 48px!important;" id="letter-anchor-<?php echo strtoupper($letter) ?>">
							<div class="container">
								<h3 class="cs-home-h"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo strtoupper($letter) ?>. </font></font></h3>
								<ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap">
									<?php
									foreach($all_brands as $key=>$value){
										$alphabet = $key;
											foreach($value as $fetch_data){
												$brand_image = $fetch_data['brand_image'];
												$brand_name = $fetch_data['name'];
													$title = $fetch_data['title'];
												$brand_id = $fetch_data['brands_id'];
												$show_ads = $fetch_data['show_ads']; 
												$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND FIND_IN_SET(".$brand_id.", brands_id) != 0")->num_rows();
												$brand_name_array = explode(" ",$brand_name);
												$brand_name_new = "";
												if(count($brand_name_array) > 0){
													$brand_name_new = str_replace(' ', '-', $brand_name);
												}
											?>
												<a id="" class="col-md-2" href="<?php echo base_url().'marken/'.$brand_name_new; ?>">
													<li class="cs-home-mer-box-li-box" title="" style="background: transparent; box-shadow:none; display:block;">		
														<div class="brands_img_group" style="box-shadow:1px 1px 5px #b4b4b4;">
															<img class=" lazyloaded" style="padding: 0px;" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>" title="<?php echo $brand_name ?>">
														</div>
														<label style="text-align: center;">
														<span class="cs-intern-link" style="color: #000 !important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(<?php echo $get_brand_total_codes ?> Gutscheine)</font></font></span>
														</label>
													</li>
												</a>
										<?php } 
									}?>
								</ul>
							</div>
						</div>
				<?php } else if($page_type == 'by_id'){
						$brand_image = $all_brands['brand_image'];
						$brand_name = $all_brands['name'];
						$brand_name_new = "";
							$brand_name_array = explode(" ",$brand_name);
							if(count($brand_name_array) > 0){
								$brand_name_new = str_replace(' ', '-', $brand_name);
							}
						
						$title = $all_brands['title'];
						$show_ads = @$all_brands['show_ads'];
						$small_title = $all_brands['small_title'];
						$brand_id = $all_brands['brands_id'];
						$brand_desc = $all_brands['description'];
						$brand_desc_lg = $all_brands['long_description'];
						$brand_fax = $all_brands['fax'];
						$brand_email = $all_brands['email'];
						$brand_shipping_cost = $all_brands['shipping_cost'];
						$brand_shipping_from = $all_brands['shipping_from'];
						$brand_tele_phone = $all_brands['tele_phone'];
						$brand_address = $all_brands['address'];
						$brand_website_url = $all_brands['website_url'];
						$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
					?>
							<div>
								<div class="cs-all-categories-content" style="margin-bottom: 14px;">
								
								</div>
								
							</div>
					
					<div class="clearfix"></div>
					
					<section style="padding: 0px; overflow: hidden;">
					     
						   <div class="main-content-container cs-flex" style="padding-top:10px;">
							  <!-- Main Mer Content -->
                             <div class="row">
                               <div class="" style="margin-top:0px">
                                    <div class="row" style="margin:0;">

                                      <!-- Left column (Brand Boxarea) -->
<div class="col-md-3 col-sm-12 brand_hide" style="padding:0 10px;">
  <div class="boxarea" style="background:#fff; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1); padding:15px;">

    <!-- Logo -->
    <div class="text-center mb-3">
      <div class="brand_redirect" 
           data-brand_url="<?php echo $brand_website_url; ?>" 
           data-brand_id ="<?php echo $brand_id; ?>" 
           data-desc ="<?php echo $brand_desc; ?>">
        <img class="brand_logo_img lazyloaded"
             src="<?php echo base_url().$brand_img_url.$brand_image; ?>"
             data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>"
             alt="<?php echo $brand_name ?>"
             title="<?php echo $brand_name ?>"
             style="width:90px; height:auto; object-fit:contain; border-radius:6px; background:#fff; padding:6px;">
      </div>
    </div>

    <!-- Brand Info -->
    <div class="alert_box col-sm-12" style="margin:0; background:#fafafa; border-radius:8px; padding:10px 12px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
      <h2 class="box_heading alert_box_head" style="font-size:17px; font-weight:600; color:#333; margin-bottom:6px; line-height:1.4;">
        <?php $brand_name2 = $brand_name; echo $brand_name ?> <?php echo $title ?> im <?php echo strftime("%B")." ".strftime("%Y")?>
      </h2>
    </div>

    <!-- Rating -->
    <?php 
      $this->db->select('AVG(stars) As avg_r');
      $all_stars    = $this->db->get_where('reviews',array('brands_id'=>$brand_id))->row()->avg_r;
      $all_reviews  = $this->db->get_where('reviews',array('brands_id'=>$brand_id))->num_rows();		
    ?>
    <div class="text-center mt-2 mb-3">
      <div class="my-rating-6" style="margin-bottom:4px;"></div>
      <p class="box_para" id="brands_review" style="font-size:13px; color:#666; margin-bottom:0;">
        ⭐ <span id="avrg"><?php echo round($all_stars, 2); ?></span>/5 
        (<span id="brnd_num"><?php echo $all_reviews ?></span> Bewertungen)
      </p>
    </div>

    <!-- Contact / Info -->
    <?php 
      $brand_email = $all_brands['email'];
      $brand_address = $all_brands['address'];
      $brand_tele_phone = $all_brands['tele_phone'];
      $brand_desc = $all_brands['description'];
    ?>
    <div style="border-top:1px solid #eee; padding-top:10px;">
      <h4 style="font-size:15px; font-weight:600; color:#333; margin-bottom:6px;">
        Über <?php echo $brand_name; ?>
      </h4>
      <p style="font-size:13px; color:#555; line-height:1.5; margin-bottom:10px;">
        <?php echo $brand_desc; ?>
      </p>

      <div style="font-size:13px; color:#444; line-height:1.7;">
        <?php if(!empty($brand_email)) { ?>
          <p style="margin:0;"><i class="fa fa-envelope me-2" style="color:#5c8374;"></i> 
            <a href="mailto:<?php echo $brand_email; ?>" style="color:#555; text-decoration:none;">
              <?php echo $brand_email; ?>
            </a>
          </p>
        <?php } ?>
        <?php if(!empty($brand_tele_phone)) { ?>
          <p style="margin:0;"><i class="fa fa-phone me-2" style="color:#5c8374;"></i> 
            <a href="tel:<?php echo $brand_tele_phone; ?>" style="color:#555; text-decoration:none;">
              <?php echo $brand_tele_phone; ?>
            </a>
          </p>
        <?php } ?>
        <?php if(!empty($brand_address)) { ?>
          <p style="margin:0;"><i class="fa fa-map-marker me-2" style="color:#5c8374;"></i> 
            <?php echo $brand_address; ?>
          </p>
        <?php } ?>
      </div>
    </div>

    <!-- Similar Brands -->
    <section class="cs-popular-shops" style="margin-top:20px; background:#fafafa; border-radius:8px; padding:12px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
      <?php
        $get_all_brands = $this->db->order_by('sort_order', 'ASC')
          ->get_where('similar_brands', array('status'=>'Active','brands_id'=>$brandss_id))
          ->result_array();

        if(!empty($get_all_brands)){
      ?>
        <div class="popular_shops">
          <h4 style="font-size:15px; font-weight:600; color:#333; margin-bottom:10px; border-bottom:2px solid #5c8374; display:inline-block; padding-bottom:3px;">
            Die beliebtesten Geschäfte
          </h4>

          <ul style="display:flex; flex-wrap:wrap; gap:8px; list-style:none; padding:0; margin:0;">
            <?php						
              foreach($get_all_brands as $fetch_data){
                $brands_data = $this->db->get_where('brands', array('brands_id'=>$fetch_data['similar_brand_id']))->row();
                if($brands_data){
                  $brand_name = $brands_data->name;
                  $brand_name_new = str_replace(' ', '-', $brand_name);
            ?>
              <li>
                <a target="_blank" 
                   href="<?php echo base_url().'marken/'.$brand_name_new; ?>" 
                   style="display:inline-block; background:#fff; border:1px solid #eee; color:#333; border-radius:6px; padding:6px 10px; font-size:13px; text-decoration:none; transition:0.3s;">
                  <?php echo $brand_name; ?>
                </a>
              </li>
            <?php } } ?>
          </ul>
        </div>
      <?php } else { ?>
        <p style="font-size:13px; color:#777; text-align:center; margin:0;">Keine beliebten Geschäfte gefunden.</p>
      <?php } ?>
    </section>
  </div>
</div>

<style>
  .cs-popular-shops a:hover {
    background:#5c8374 !important;
    color:#fff !important;
    border-color:#5c8374 !important;
  }
</style>


                                      <!-- Right column (Main Content) -->
                                      <div class="col-md-9 col-sm-12 brand_hide" style="padding:0 10px;">

                                        <!-- Ad section -->
                                        <div class="col-sm-12 brand_hide">
                                          <?php if($show_ads) { ?>
                                            <div class="row text-center">
                                              <ins class="adsbygoogle"
                                                style="display:block"
                                                data-ad-format="fluid"
                                                data-ad-layout-key="-h2-1+36-dz+ga"
                                                data-ad-client="ca-pub-4102770400209779"
                                                data-ad-slot="6834909657"></ins>
                                              <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                              </script>
                                            </div>
                                          <?php } ?>
                                        </div>

                                        <div class="clearfix"></div>

                                        <?php if(!empty($alert_active)){ ?>
                                          <div class="cs-alert-info alert alert-info fade in" style="background:white; border-radius:0; border:0;">
                                            <button type="button" class="close" data-dismiss="alert">
                                              <font style="vertical-align:inherit;">
                                                <font style="vertical-align:inherit; font-size:20px; margin-right:-14px;">×</font>
                                              </font>
                                            </button>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>
                                              <font style="vertical-align:inherit;">
                                                <font style="vertical-align:inherit;">
                                                  Sie haben den Gutscheinwecker <?php echo $brand_name;?> erfolgreich abonniert und erhalten nun eine E-Mail, wenn ein neuer Gutschein dieses Anbieters erscheint.
                                                </font>
                                              </font>
                                            </p>
                                          </div>
                                        <?php } ?>

                                        <?php if(!empty($unsuscribed_alert)){ ?>
                                          <div class="cs-alert-info alert alert-info fade in" style="background:white; border-radius:0; border:0;">
                                            <button type="button" class="close" data-dismiss="alert">
                                              <font style="vertical-align:inherit;">
                                                <font style="vertical-align:inherit; font-size:20px; margin-right:-14px;">×</font>
                                              </font>
                                            </button>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>
                                              <font style="vertical-align:inherit;">
                                                <font style="vertical-align:inherit;">
                                                  Das Abonnement wurde erfolgreich gekündigt. Ihre Daten wurden aus unserem System gelöscht.
                                                </font>
                                              </font>
                                            </p>
                                          </div>
                                        <?php } ?>

                                        <?php if(!empty($all_coupons) || !empty($all_offers) || !empty($just_coupons)){ ?>
                                        <section class="cs-category-showbox cs-coupon-large-box" style="padding: 0px; overflow: hidden;">

                                            <div class="cs-filter-count" style="color:#5c8374; margin-top:24px;">
                                                                                    <span class="">
                                                                                          <font style="vertical-align: inherit;">
                                                                                                  <font style="vertical-align: inherit;"><?php echo $total_coupons;?> </font>
                                                                                          </font>
                                                                                    </span>
                                                                                  <?php 


                                                                                  ?>
                                                                                  <span class="">
                                                                                          <font style="vertical-align: inherit;">
                                                                                                  <font style="vertical-align: inherit;"><?php  echo $brand_name2 ?> im <?php echo strftime("%B")." ".strftime("%Y")?></font>
                                                                                          </font>
                                                                                  </span>


                                                                          </div>

                                                                           <div class="coupons_details" id="coupons_details">  
                                                                                  <ul class="nav nav-tabs tabs_filter alignment-grid"> 
                                                                                        <!--<li class="active li_items"><a data-toggle="tab" class="filter" href="#all">All Coupons <b>(<?php echo $total_coupons;?>)</b></a></li>-->
                                                                                        <li class="<?php if($active_tab=="Coupon"){ echo "active"; } ;?> li_items li-1st" style="width:18%;">
                                                                                          <a data-toggle="tab" class="filter second-width" href="#coupons">
                                                                                            <span>Gutscheincode <b class="bold_counter">(<?php echo $count_coupons;?>)</b></span>
                                                                                          </a>
                                                                                        </li>
                                                                                        <li class="<?php if($active_tab=="Offer"){ echo "active"; } ;?> li_items" style="width:18%;">
                                                                                          <a data-toggle="tab" class="filter" href="#offers">
                                                                                            <span>Rabatt <b class="bold_counter">(<?php echo $total_offers;?>)</b></span>
                                                                                          </a>
                                                                                        </li>
                                                                                        <li class="<?php if($active_tab=="Deals"){ echo "active"; } ;?> li_items" style="width:18%;">
                                                                                          <a data-toggle="tab" class="filter" href="#deals">
                                                                                            <span>Angebote <b class="bold_counter">(<?php echo $total_deals;?>)</b></span>
                                                                                          </a>
                                                                                        </li>
                                                                                        <li class="<?php if($active_tab=="Free Shipping"){ echo "active"; } ;?> li_items" style="width:18%;">
                                                                                          <a data-toggle="tab" class="filter" href="#shipping">
                                                                                            <span>Kostenloser Versand <b class="bold_counter">(<?php echo $total_shipping;?>)</b></span>
                                                                                          </a>
                                                                                        </li>
                                                                                        <li class="<?php if($active_tab=="Free Items"){ echo "active"; } ;?> li_items" style="width:18%;">
                                                                                          <a data-toggle="tab" class="filter" href="#items">
                                                                                            <span>Kostenlose Artikel <b class="bold_counter">(<?php echo $total_items;?>)</b></span>
                                                                                          </a>
                                                                                        </li>
                                                                                      </ul>

                                                                                    <style>
                                                                                    /* Container adjustments */
                                                                                    .tabs_filter {
                                                                                        display: flex;              /* use flex for horizontal layout */
                                                                                        flex-wrap: nowrap;          /* prevent wrapping */
                                                                                        overflow-x: auto;           /* scroll on smaller screens */
                                                                                        padding: 0;
                                                                                        margin: 0;
                                                                                        list-style: none;
                                                                                    }

                                                                                    /* Each tab item */
                                                                                    .tabs_filter li.li_items {
                                                                                        flex: 0 0 18%;              /* 18% width per tab */
                                                                                        padding: 4px 5px;           /* tighter padding */
                                                                                        font-size: 0.7rem;          /* smaller text */
                                                                                        box-sizing: border-box;
                                                                                    }

                                                                                    /* Tab links */
                                                                                    .tabs_filter li.li_items a {
                                                                                        display: flex !important;           /* flex layout for centering */
                                                                                        align-items: center !important;     /* vertical center */
                                                                                        justify-content: center !important; /* horizontal center */
                                                                                        height: auto !important;            /* remove fixed height */
                                                                                        text-align: center;
                                                                                        position: relative;                 /* remove absolute positioning effects */
                                                                                        padding: 6px 0;
                                                                                    }

                                                                                    /* Text inside tab link */
                                                                                    .tabs_filter li.li_items a span {
                                                                                        font-size: 0.75rem;                 /* smaller span text */
                                                                                        margin: 0 !important;               /* reset any margin */
                                                                                        position: static !important;        /* remove absolute positioning */
                                                                                        transform: none !important;         /* remove translate */
                                                                                    }

                                                                                    /* Counter inside span */
                                                                                    .tabs_filter li.li_items b.bold_counter {
                                                                                        font-size: 0.65rem;                 /* smaller counter text */
                                                                                    }

                                                                                    /* Optional: make scrolling smooth for small screens */
                                                                                    .tabs_filter::-webkit-scrollbar {
                                                                                        height: 6px;
                                                                                    }
                                                                                    .tabs_filter::-webkit-scrollbar-thumb {
                                                                                        background-color: rgba(0,0,0,0.2);
                                                                                        border-radius: 3px;
                                                                                    }
                                                                                  </style>


                                                                                  <div class="cs-filter-count" style="color:#5c8374;font-size: 20px;margin-top: 24px;">


                                                                                          <span class="">
                                                                                                  <font style="vertical-align: inherit;">
                                                                                                          <font style="vertical-align: inherit;"><?php echo $small_title; ?></font>
                                                                                                  </font>
                                                                                          </span>


                                                                                  </div>
                                                                          <!--Mobile redeem section  -->
                                    <?php /* <div  style="display:none;" class="show-redem" style="margin:10px 0px">
                                                                             <div class="cs-filter-title"> 
                                                                                     <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;">Einlösungsart</font> 
                                                                                     </font>
                                                                             </div>
                                                                             <ul id="" class="cs-filter-ul cs-filter-scroll" >

                                                                                          <li class="cs-filter-li">
                                                                                                   <input class="cs-filter-input checkbox" data-dis = "Ne"  date-type="mobile" name="check_filter_mob" data-brandid="<?php echo $brand_id; ?>" data-cateId="" type="checkbox" id="Existing" data-checkId="Existing">
                                                                                                   <label class="cs-filter-label" id="ex" for="Existing">
                                                                                                          <font style="vertical-align: inherit;">
                                                                                                                  <font style="vertical-align: inherit;">Bestehender Kunde </font>
                                                                                                          </font>
                                                                                                  </label>
                                                                                          </li>
                                                                                          <li class="cs-filter-li">
                                                                                                   <input class="cs-filter-input checkbox" data-dis = "ex" date-type="mobile" name="check_filter_mob" data-brandid="<?php echo $brand_id; ?>" data-cateId="" type="checkbox" id="New" data-checkId="New">
                                                                                                   <label class="cs-filter-label" id="Ne" for="New">
                                                                                                          <font style="vertical-align: inherit;">
                                                                                                                  <font style="vertical-align: inherit;">Neukunde</font>
                                                                                                          </font>
                                                                                                  </label>
                                                                                          </li>
                                                                             </ul>
                                                                             </div>
                                          */ ?>


                                                                          <div class="tab-content" style="padding-top: 10px;">
                                                                                      <!--<form id="voucher" method="post" action="">-->

                                                                                           <!-- </form>-->

                                                                                  <div id="coupons" class="tab-pane fade  <?php if($active_tab=="Coupon"){ echo "in active"; } ;?>">
                                                                                  <div class="row">
                                                                                  <?php

                                                                                          if(@$brand_id != '')
                                                                                          {
                                                                                                  $page_brand_id = $brand_id;
                                                                                                  $get_coupons = $this->db->query("
                                                                                                          select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
                                                                                                          from coupons as cpn 
                                                                                                          left join brands as brand ON cpn.brands_id = brand.brands_id
                                                                                                          where FIND_IN_SET(".$brand_id.", cpn.top_similar_brands_id) != 0 AND cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".date('Y-m-d')."' OR cpn.end_date = '0000-00-00') ORDER BY cpn.date_added DESC LIMIT 2
                                                                                                  ")->result_array();

                                                                                                  $similar_count = count($get_coupons);

                                                                                                  $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
                                                                                                  if(!empty($get_coupons)){
                                                                                                          $_x=0;
                                                                                                  foreach($get_coupons as $fetch_data){
                                                                                                          $brand_image2 = $fetch_data['brand_image'];
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
                                                                                          <div class="col-sm-12" style="margin-bottom: 30px; <?php echo ($_x++ % 2 == 0)?'padding-right: 10px':'padding-left: 10px'; ?>">  
                                                                                          <div class="coupon_box_div coupon_click_brands" data-url = "<?php echo base_url().'marken/'.$brand_name2."?coupon_id=".$coupons_id;?>" data-page="brands" data-coupon = "<?php echo $fetch_data['coupon_type'];?>" data-tag="<?php echo $fetch_data['short_tagline'];?>" data-type="<?php echo $fetch_data['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$fetch_data['coupons_id'];?>" style="position: relative; margin-top: 20px;">
                                                                                          <div class="discount_div">
                                                                                                  <span>
                                                                                                  <?php
                                                                                                          if($discount_type == 'Custom'){																			
                                                                                                          ?>
                                                                                                          <span class="main_rabet">
                                                                                                          <?php echo strtoupper($discount_value).$discount_type_sign ?> 
                                                                                                          </span>


                                                                                                          <?php
                                                                                                          }
                                                                                                          else{
                                                                                                          ?>
                                                                                                          <span class="main_rabet">
                                                                                                          <?php echo '<span class="cpn_amount">'.strtoupper($discount_value).$discount_type_sign; ?></span>
                                                                                                          <br>
                                                                                                          Rabatt
                                                                                                          </span>
                                                                                                          <?php
                                                                                                          }
                                                                                                          ?>
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
                                                                                                                                  <span>Gutschein anzeigen111</span>

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
                                                                                                                                  Gutschein anzeigen222
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
                                                                                                          <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;">Luft ab :</font>
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
                                                                                                  <img class="lazyloaded 1--" src="<?php echo base_url().$brand_img_url.$brand_image2; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image2; ?>" alt="<?php echo $brand_name; ?>">
                                                                                          </div>
                                                                                          </div>
                                                                                          </div>
                                                                                          <?php } } } ?>
                                                                                          </div>
                                                                                          <?php
                                                if(!empty($just_coupons)){
                                                                                                  $i=0;											
                                                                                                  foreach($just_coupons as $key => $coupons){
                                                                                                          $category_id = $coupons['categories_id'];
                                                                                                          $category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
                                                                                                          $cat_image = @$category_details['cat_image'];
                                                                                                          $cat_name = @$category_details['name'];
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

                                                                                                          if($i++ == 4)
                                                                                                          {
                                                                                                                  ?>
                                                                                                                  <?php if($show_ads) { ?>
                                                                                                                          <!-- Google Add  -->
                                                                                                                          <div class="row text-center" style="margin: 5px 0;">
                                                                                                                          <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4102770400209779"
                                                                                                                                  crossorigin="anonymous"></script> -->
                                                                                                                          <ins class="adsbygoogle"
                                                                                                                                  style="display:block"
                                                                                                                                  data-ad-format="fluid"
                                                                                                                                  data-ad-layout-key="-h2-1+36-dz+ga"
                                                                                                                                  data-ad-client="ca-pub-4102770400209779"
                                                                                                                                  data-ad-slot="6834909657"></ins>
                                                                                                                          <script>
                                                                                                                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                                                                                                          </script>
                                                                                                                          </div>
                                                                                                                          <!-- Google Add  -->
                                                                                                                  <?php } ?>
                                                                                                                  <?php
                                                                                                          }
                                                                                                          $similar_count = isset($similar_count) ? $similar_count : 0;
                                                                                                          if(($key+$similar_count+1)==$alert_position){ 
                                                                                                                   ?>
                                                                                                                          <div class="cs-couponalert-box row align-items-center p-2"
     style="
       background:#fcead7;
       border-radius:18px;
       border:none;
       margin:10px 0;
       padding:10px 14px;
     ">

  <!-- Image (hidden on mobile) -->
  <div class="col-md-2 text-center d-none d-md-block">
    <img src="<?php echo base_url().'assets/home/imgs/Gutschein_wecker.png'?>"
         alt="Voucher alarm clock"
         class="img-fluid"
         style="max-height:50px; object-fit:contain;">
  </div>

  <!-- Text + Form -->
  <div class="col-12 col-md-10" style="width:100%;">
    <h3 style="font-size:1rem; margin-bottom:4px; color:#333; font-weight:600;">
      Neue <?php echo $brand_name2;?> Gutscheine kostenlos per E-Mail erhalten:
    </h3>

    <div style="font-size:0.85rem; color:#555; margin-bottom:6px; line-height:1.3;">
      Wenn neue <?php echo $brand_name2;?> Aktionen zu uns kommen, kommen sie in unregelmäßigen Abstnden direkt zu Ihnen!
    </div>

    <div id="js-couponalert-input" class="controls controls-row">
      <div id="alert_form" class="row g-1 align-items-center">

        <input type="hidden" name="page_type1" id="page_type1" value="4">
        <input type="hidden" name="page_ty" id="brand_name2" value="<?php echo $brand_name2;?>">
        <input type="hidden" name="letter_type" id="brnds_id" value="<?php echo $brand_id; ?>">

        <!-- Email input -->
        <div class="col-12 col-sm-8">
          <input type="text"
                 name="email"
                 id="optin-email1"
                 placeholder="E-Mail-Adresse*"
                 class="form-control"
                 style="
                   background:#fff;
                   border-radius:18px;
                   height:38px;
                   font-size:0.9rem;
                   padding:6px 14px;
                 ">
        </div>

        <!-- Submit Button -->
        <div class="col-12 col-sm-4">
          <button type="submit"
                  id="voucher_alert"
                  class="btn w-100"
                  style="
                    background:#5c8374;
                    color:#fff;
                    border:none;
                    border-radius:18px;
                    height:38px;
                    font-size:0.9rem;
                    font-weight:600;
                    transition:background 0.2s;
                  "
                  onmouseover="this.style.background='#d87710'"
                  onmouseout="this.style.background='#5c8374'">
            Anmelden
          </button>
        </div>

        <!-- Checkbox + Info -->
        <div class="col-12 mt-1">
          <small id="box_error" style="color:blue;"></small>
          <label style="font-size:0.8rem; line-height:1.3; color:#333; margin:0;">
            <input type="checkbox" id="privacy1" name="privacy" value="0" style="vertical-align:middle; margin-right:4px;">
            Ja, <a href="<?php echo base_url().'datenschutz' ?>" 
                   style="color:#6e8c75; text-decoration:none;">ich stimme</a>
            der Datenschutzerklärung und Erklärung zu.
            <span style="display:block; color:#999; font-size:0.75rem; margin-top:2px;">* Pflichtfeld</span>
          </label>
        </div>
      </div>
    </div>

    <div id="js-couponalert-output" class="controls controls-row"></div>
  </div>
</div>



                                                                                                                   <?php	
                                                                                                                  }

                                                                                                  ?> 
                                                                                                          <div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
                                                                                                                  <div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" style="border-radius:10px; overflow:hidden;">
  <div class="cs-coupon-box-cell-1 cs-flex cs-flex-mobil_my coupon_click"
       data-page="brands"
       data-coupon="<?php echo $coupons['coupon_type'];?>"
       data-tag="<?php echo $coupons['short_tagline'];?>"
       data-type="<?php echo $coupons['categories_id'];?>"
       id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">

    <?php if($coupons['discount_type']=="Custom"){ ?>
      <div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
        <div class="cs-coupon-logo-line-1">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;font-size: 18px;line-height: 0;">
              <?php echo $coupons['discount_value'].$sign;?>
            </font>
          </font>
        </div>
        <div class="cs-coupon-logo-line-3"></div>
      </div>
    <?php } else { ?>
      <div class="cs-coupon-logo cs-flex cs-flex-mobil_my">  
        <div class="cs-coupon-logo-line-1">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"><?php echo $coupons['discount_value'].$sign;?></font>
          </font>
        </div>
        <div class="cs-coupon-logo-line-3">
          <font style="vertical-align: inherit;">Rabatt</font>
        </div>
      </div>
    <?php } ?>

    <?php if(isset($coupons['coupon_image'])){ ?>
      <div class="mobile_brands_image">  
        <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
      </div>
    <?php } ?>
  </div>

  <div class="cs-coupon-box-cell-2 cs-flex my_cpn_style">
    <div class="cs-coupon-box-h3 self_cpn_box">
      <div class="text_cpn_box">
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;"><?php echo $coupons['short_tagline'];?></font>
        </font>
        <br>
<!--        <div>
          <small style="font-size: 12px;vertical-align: inherit;">
            <?php // echo $coupons['description'];?>
          </small>
        </div>-->
      </div>

      <?php if(isset($coupons['coupon_image'])){ ?>
        <div class="brand-width-cate">
      <?php } else { ?>
        <div class="brand-width" style="width:100%;">
      <?php } ?>

      <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background:#fff !important;">
        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">
          <div>
            <?php 
            if(empty($coupons['coupon_code'])){
              if($remove_phill!="Yes"){ ?>
                <div class="cs-modal-cta-wrapper coupon_click"
                     data-page="brands"
                     data-coupon="<?php echo $coupons['coupon_type'];?>"
                     data-tag="<?php echo $coupons['short_tagline'];?>"
                     data-type="<?php echo $coupons['categories_id'];?>"
                     id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
                  <div class="cs-coupon-btn_my" title="Visit the homepage" style="display:flex; align-items:center; justify-content:center;cursor:pointer;width:300px;height:36px !important;">
                    <div class="coupon-btn-text">
                      <i class="fa fa-euro"></i>
                      <span>Gutschein anzeigen999</span>
                    </div>
                  </div>
                </div>
              <?php } else {
                if($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']){ ?>
                  <button class="new_peal_btn coupon_click"
                          data-page="brands"
                          data-tag="<?php echo $coupons['short_tagline'];?>"
                          data-coupon="<?php echo $coupons['coupon_type'];?>"
                          data-type="<?php echo $coupons['categories_id'];?>"
                          id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
                    <span class="peal_btn_block">
                      <span class="show">
                        <i class="fa fa-euro"></i>
                        <span>Gutschein anzeigen</span>
                      </span>
                      <span style="width:300px" class="back_code <?php echo $coupons['coupons_id'];?>"><?php echo $code_text;?></span>
                    </span>
                  </button>
                <?php } else { ?>
                  <div class="cs-modal-cta-wrapper coupon_click"
                       data-page="brands"
                       data-coupon="<?php echo $coupons['coupon_type'];?>"
                       data-tag="<?php echo $coupons['short_tagline'];?>"
                       data-type="<?php echo $coupons['categories_id'];?>"
                       id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
                    <div class="cs-coupon-btn_my" title="Visit the homepage" style="display:flex; align-items:center; justify-content:center;cursor:pointer;width:300px;height:36px !important;">
                      <div class="coupon-btn-text">
                        <i class="fa fa-euro"></i>
                        <span>Gutschein anzeigen</span>

                      </div>
                    </div>
                  </div>
                <?php }
              }
            } else { ?>
              <button class="new_peal_btn coupon_click"
                      data-coupon="<?php echo $coupons['coupon_type'];?>"
                      data-page="brands"
                      data-tag="<?php echo $coupons['short_tagline'];?>"
                      data-type="<?php echo $coupons['categories_id'];?>"
                      id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
                <span class="peal_btn_block">
                  <span style="width:300px" class="<?php echo ($remove_phill=="Yes" && $open_coupon_id==$coupons['coupons_id']) ? 'show' : 'show_code_cover'; ?>">
                    <i class="fa fa-euro"></i>
                    <span>Gutschein anzeigen666</span>
                  </span>
                  <span class="back_code <?php echo $coupons['coupons_id'];?>" style="width:300px"><?php echo $code_text;?></span>
                </span>
              </button>
            <?php } ?>
          </div>
        </div>
      </div>

     <!-- ✅ Added Section: More Details + Expiry Info -->
    <div class="coupon-extra-details" style="margin-top:10px; font-size:13px; line-height:1.5; color:#333;">
        <div class="coupon-info-row"
             style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">

          <!-- Left side: More Details toggle -->
          <div class="coupon-more-details-toggle"
               style="cursor:pointer; color:#6e8c75; font-weight:600; display:flex; align-items:center; gap:5px;">
            <i class="fa fa-info-circle"></i>
            <span>Mehr Details</span>
          </div>

          <!-- Right side: Minimum Order + Expiry Info -->
          <div class="coupon-info-right"
               style="
                 display:flex;
                 align-items:center;
                 justify-content:flex-end;
                 flex-wrap:nowrap;
                 gap:8px;
                 flex-shrink:0;
                 overflow:hidden;
                 text-align:right;
               ">
            <div class="coupon-min-order" style="white-space:nowrap;">
                <?php if (!empty($coupons['min_order_price'])): ?>
                  Mindestbestellwert: €<?php echo htmlspecialchars($coupons['min_order_price']); ?>
                <?php else: ?>
                  Kein Mindestbestellwert---
                <?php endif; ?>
            </div>
              
            <?php
                if (!empty($coupons['end_date'])) {
                    $endDateParts = explode('-', $coupons['end_date']); // "YYYY-MM-DD"  [YYYY, MM, DD]
                    if (count($endDateParts) === 3) {
                        $year  = $endDateParts[0];
                        $month = $endDateParts[1];
                        $day   = $endDateParts[2];

                        $todayParts = explode('-', date('Y-m-d'));
                        $todayYear  = $todayParts[0];
                        $todayMonth = $todayParts[1];
                        $todayDay   = $todayParts[2];

                        // Compare dates (basic string comparison works because format is YYYY-MM-DD)
                        if ("$year-$month-$day" >= date('Y-m-d')) {
                            ?>
                            <div class="coupon-expiry"
                                 style="color:#5c8374; font-weight:500; display:flex; align-items:center; gap:5px; white-space:nowrap;">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              <span>
                                Gültig bis: <?php echo $day . '.' . $month . '.' . $year; ?>
                              </span>
                            </div>
                            <?php
                        }
                    }
                }
            ?>
          </div>
        </div>

        <!-- Hidden Description -->
        <div class="coupon-description"
             style="display:none; margin-top:8px; color:#333; border-left:3px solid #6e8c75; padding-left:8px;">
          <?php echo $coupons['description']; ?>
        </div>
    </div>
      <!-- ✅ End of Added Section -->

    </div>
  </div>

  <?php if(isset($coupons['special_text']) && $coupons['special_text'] != ''){ ?>
    <div class="best_title_f"><?php echo $coupons['special_text']?></div>
  <?php } ?> 

  <?php if(isset($coupons['coupon_image'])){ ?>
    <div target="_blank" href="<?php echo base_url().'marken/'.$brand_name2;?>" class="cate_side_brand_img">
      <img class="brands_image_cate" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
    </div>
  <?php } ?> 																
</div>
</div>
</div>

<!-- ✅ Added Styling for Button Size -->
<style>
.cs-coupon-btn_my,
.new_peal_btn {
  padding: 10px 18px !important;
  font-size: 15px !important;
  border-radius: 12px !important;
  min-width: 170px;
  height: 48px !important;
}
.coupon-btn-text span {
  font-weight: 600;
}
@media (max-width: 768px) {
  .cs-coupon-btn_my,
  .new_peal_btn {
    width: 100%;
    height: 50px !important;
    font-size: 16px !important;
  }
}
</style>

                                                                                          <?php
                                                                                           }
                                                  } else{ ?>
                                                                                          <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
                                                                                                     <div class="cs-coupon-more-details">
                                                                                                     Keine Gutscheine verfgbar	
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
                                                                                 <?php
                                                                                      /*
                                                                                      ?>

                                                                                          <div class="row cs-pagination">
                                                                                                          <ul class="pagination">
                                                                                                                  <?php if($count_coupons <= $page_limit_initial){ ?>
                                                                                                                  <li class="" >
                                                                                                                          <a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                                                                                  <?php } else { ?>
                                                                                                                  <?php $pages = ceil($count_coupons/$page_limit_initial); ?>
                                                                                                                  <?php $pages_limit = $total_page_limit_initial; ?>
                                                                                                                  <?php if(!empty($page) && $page_num > 1){ ?>
                                                                                                                  <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                                  <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                                                                                          <?php if($page_num >= $pages_limit){ ?>
                                                                                                                                  <?php if($i >= $pages_limit){ ?>
                                                                                                                                          <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                                                                                          <?php if($i >= $page_num){ ?>
                                                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } else { ?>
                                                                                                                                  <?php if($i <= $pages_limit){ ?>
                                                                                                                                          <?php if(empty($page_num) && $i == 1){ ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } else { ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                                  <?php if(!empty($page) && $pages<$page_num){ ?>
                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } else if($pages != $page_num){ ?>

                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                          <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                          <?php } ?>
                                                                                                  </ul>											
                                                                                          </div> 
                                                                                          <?php */ ?>
                                                                                          <!-- pagination -->
                                                                                  </div>
                                                                                  <div id="offers" class="tab-pane fade  <?php if($active_tab=="Offer"){ echo "in active"; } ;?>">
                                                                                          <?php 
                                                                                                if (!empty($all_offers)) {
                                                                                                    foreach ($all_offers as $key => $coupons) {
                                                                                                        $category_id = $coupons['categories_id'];
                                                                                                        $category_details = $this->db->get_where('categories', array('categories_id' => $category_id))->row_array();

                                                                                                        // Prevent "Trying to access array offset on value of type null" error
                                                                                                        $cat_image = isset($category_details['cat_image']) ? $category_details['cat_image'] : '';
                                                                                                        $cat_name = isset($category_details['name']) ? $category_details['name'] : '';

                                                                                                        if ($coupons['discount_type'] == "Percentage") {
                                                                                                            $sign = "%";
                                                                                                        } elseif ($coupons['discount_type'] == "Fixed") {
                                                                                                            $sign = "&euro;";
                                                                                                        } else {
                                                                                                            $sign = "";
                                                                                                        }

                                                                                                        if (empty($coupons['coupon_code'])) {
                                                                                                            $code_text = "Kein Code bentigt!";
                                                                                                        } else {
                                                                                                            $code_text = $coupons['coupon_code'];
                                                                                                        }
                                                                                            ?>
                                                                                                          <div class="cs-coupon-box cs-coupon-merchant js-fp" style="<?php if(!empty($coupons['special_text']) && $key!="0"){ echo "margin-top: 30px;"; }  ?>" id="<?php echo $coupons['coupons_id'];?>">
                                                                                                                  <div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" style="border-radius:10px; overflow:hidden;">
                                                                                                                          <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                           <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                          <div class="mobile_brands_image">  
                                                                                                                                  <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
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


                                                                                                                                                  <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                                          <div class="brand-width-cate">
                                                                                                                                                  <?php
                                                                                                                                                  }	
                                                                                                                                                  else{ 
                                                                                                                                                          ?>
                                                                                                                                                          <div class="brand-width">
                                                                                                                                                  <?php
                                                                                                                                                  }
                                                                                                                                                  ?>
                                                                                                                                                  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                                                                                        <?php 
                                                                                                                                                        if(empty($coupons['coupon_code'])){

                                                                                                                                                          if($remove_phill!="Yes"){

                                                                                                                                                        ?>

                                                                                                                                                           <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                                                                                                          <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                                   <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                        <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                      <?php if(isset($coupons['special_text']) && $coupons['special_text'] != ''){ ?>
                                                                                                                                                  <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                                                                          <?php } ?> 					
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;?>" class="cate_side_brand_img">
                                                                                                                                                  <img class="brands_image_cate" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
                                                                                                                                      </div>	
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
                                                                                          <?php
                                                                                          /*
                                                                                          ?>
                                                                                          <div class="row cs-pagination">
                                                                                                          <ul class="pagination">
                                                                                                                  <?php if($total_offers <= $page_limit_initial){ ?>
                                                                                                                  <li class="" >
                                                                                                                          <a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>"><?php echo $page_num; ?></a></li>
                                                                                                                  <?php } else { ?>
                                                                                                                  <?php $pages = ceil($total_offers/$page_limit_initial); ?>
                                                                                                                  <?php $pages_limit = $total_page_limit_initial; ?>
                                                                                                                  <?php if(!empty($page) && $page_num > 1){ ?>
                                                                                                                  <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>">&laquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                                  <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                                                                                          <?php if($page_num >= $pages_limit){ ?>
                                                                                                                                  <?php if($i >= $pages_limit){ ?>
                                                                                                                                          <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                                                                                          <?php if($i >= $page_num){ ?>
                                                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } else { ?>
                                                                                                                                  <?php if($i <= $pages_limit){ ?>
                                                                                                                                          <?php if(empty($page_num) && $i == 1){ ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url();?>home/brands/<?php echo $brand_id;?>" class="active"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } else { ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                                  <?php if(!empty($page) && $pages<$page_num){ ?>
                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>">&raquo;</a></li>
                                                                                                                  <?php } else if($pages != $page_num){ ?>


                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                          <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url().'marken/'.$brand_name_new ?>">&raquo;</a>
                                                                                                                  </li>
                                                                                                                  <?php } ?>
                                                                                                          <?php } ?>
                                                                                                  </ul>											
                                                                                          </div> 
                                                                                          <?php */ ?>
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
                                                                                                                  <div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" style="border-radius:10px; overflow:hidden;">
                                                                                                                          <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div class="mobile_brands_image">  
                                                                                                                                                  <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
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


                                                                                                                                                  <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                                          <div class="brand-width-cate">
                                                                                                                                                  <?php
                                                                                                                                                  }	
                                                                                                                                                  else{ 
                                                                                                                                                          ?>
                                                                                                                                                          <div class="brand-width">
                                                                                                                                                  <?php
                                                                                                                                                  }
                                                                                                                                                  ?>
                                                                                                                                                  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                                                                                  <?php 
                                                                                                                                                  if(empty($coupons['coupon_code'])){

                                                                                                                                                    if($remove_phill!="Yes"){

                                                                                                                                                  ?>

                                                                                                                                                     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                                                                                                    <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                             <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                  <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                      <?php if(isset($coupons['special_text']) && $coupons['special_text'] != ''){ ?>
                                                                                                                                                  <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                                                                          <?php } ?>
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;?>" class="cate_side_brand_img">
                                                                                                                                                  <img class="brands_image_cate" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
                                                                                                                                      </div>	
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
                                                                                          <?php
                                                                                          /*
                                                                                          ?>
                                                                                   <div class="row cs-pagination">
                                                                                                          <ul class="pagination">
                                                                                                                  <?php if($total_deals <= $page_limit_initial){ ?>
                                                                                                                  <li class="" > 
                                                                                                                          <a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                                                                                  <?php } else { ?>
                                                                                                                  <?php $pages = ceil($total_deals/$page_limit_initial); ?>
                                                                                                                  <?php $pages_limit = $total_page_limit_initial; ?>
                                                                                                                  <?php if(!empty($page) && $page_num > 1){ ?>
                                                                                                                  <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                                  <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                                                                                          <?php if($page_num >= $pages_limit){ ?>
                                                                                                                                  <?php if($i >= $pages_limit){ ?>
                                                                                                                                          <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                                                                                          <?php if($i >= $page_num){ ?>
                                                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } else { ?>
                                                                                                                                  <?php if($i <= $pages_limit){ ?>
                                                                                                                                          <?php if(empty($page_num) && $i == 1){ ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url();?>home/brands/<?php echo $brand_id;?>?type=Deals&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } else { ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                                  <?php if(!empty($page) && $pages<$page_num){ ?>
                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } else if($pages != $page_num){ ?>

                                                                                                                  <!-- <li>
                                                                                                                          <span class="cs-pagination-item">
                                                                                                                                  <font style="vertical-align: inherit;">
                                                                                                                                          <font style="vertical-align: inherit;">...</font>
                                                                                                                                  </font>
                                                                                                                          </span>
                                                                                                                  </li> -->
                                                                                                                  <!-- <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                                                                                  <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                          <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Deals&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                          <?php } ?>
                                                                                                  </ul>											
                                                                                          </div> 
                                                                                          <?php */ ?>
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
                                                                                                                  <div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" style="border-radius:10px; overflow:hidden;">
                                                                                                                          <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                  <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                  <div class="mobile_brands_image">  
                                                                                                                                          <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
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


                                                                                                                                                  <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                                          <div class="brand-width-cate">
                                                                                                                                                  <?php
                                                                                                                                                  }	
                                                                                                                                                  else{ 
                                                                                                                                                          ?>
                                                                                                                                                          <div class="brand-width">
                                                                                                                                                  <?php
                                                                                                                                                  }
                                                                                                                                                  ?>
                                                                                                                                                  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                                                                                  <?php 
                                                                                                                                                  if(empty($coupons['coupon_code'])){

                                                                                                                                                    if($remove_phill!="Yes"){

                                                                                                                                                  ?>

                                                                                                                                                     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                                                                                                    <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                             <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                  <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                      <?php if(isset($coupons['special_text']) && $coupons['special_text'] != ''){ ?>
                                                                                                                                                  <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                                                                          <?php } ?> 		
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;?>" class="cate_side_brand_img">
                                                                                                                                                  <img class="brands_image_cate" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
                                                                                                                                      </div>	
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
                                                                                          <?php /* ?>
                                                                                          <!-- pagination -->

                                                                                          <div class="row cs-pagination">
                                                                                                          <ul class="pagination"> 
                                                                                                                  <?php if($total_shipping <= $page_limit_initial){ ?>
                                                                                                                  <li class="" >
                                                                                                                          <a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                                                                                  <?php } else { ?>
                                                                                                                  <?php $pages = ceil($total_shipping/$page_limit_initial); ?>
                                                                                                                  <?php $pages_limit = $total_page_limit_initial; ?>
                                                                                                                  <?php if(!empty($page) && $page_num > 1){ ?>
                                                                                                                  <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                                  <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                                                                                          <?php if($page_num >= $pages_limit){ ?>
                                                                                                                                  <?php if($i >= $pages_limit){ ?>
                                                                                                                                          <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                                                                                          <?php if($i >= $page_num){ ?>
                                                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } else { ?>
                                                                                                                                  <?php if($i <= $pages_limit){ ?>
                                                                                                                                          <?php if(empty($page_num) && $i == 1){ ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url();?>home/brands/<?php echo $brand_id;?>?type=Free%20Shipping&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } else { ?>
                                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                                          <?php } ?>
                                                                                                                                  <?php } ?>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                                  <?php if(!empty($page) && $pages<$page_num){ ?>
                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } else if($pages != $page_num){ ?>

                                                                                                                  <!-- <li>
                                                                                                                          <span class="cs-pagination-item">
                                                                                                                                  <font style="vertical-align: inherit;">
                                                                                                                                          <font style="vertical-align: inherit;">...</font>
                                                                                                                                  </font>
                                                                                                                          </span>
                                                                                                                  </li> -->
                                                                                                                  <!-- <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                                                                                  <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                          <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Shipping&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                                  <?php } ?>
                                                                                                          <?php } ?>
                                                                                                  </ul>											
                                                                                          </div>
                                                                                          <?php */ ?>
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
                                                                                                                  <div class="cs-flex cs-flex-mobil_my cs-outer-coupon coupons_padd" style="border-radius:10px; overflow:hidden;">

                                                                                                                          <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil_my" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">

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
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div class="mobile_brands_image">  
                                                                                                                                                  <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
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


                                                                                                                                                  <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                                          <div class="brand-width-cate">
                                                                                                                                                  <?php
                                                                                                                                                  }	
                                                                                                                                                  else{ 
                                                                                                                                                          ?>
                                                                                                                                                          <div class="brand-width">
                                                                                                                                                  <?php
                                                                                                                                                  }
                                                                                                                                                  ?>
                                                                                                                                                  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">
                                                                                                                                                  <?php 
                                                                                                                                                  if(empty($coupons['coupon_code'])){

                                                                                                                                                    if($remove_phill!="Yes"){

                                                                                                                                                  ?>

                                                                                                                                                     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                                                                                                    <button class="new_peal_btn coupon_click" data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                             <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "<?php echo $coupons['coupon_type'];?>" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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
                                                                                                                                                  <button class="new_peal_btn coupon_click" data-coupon = "<?php echo $coupons['coupon_type'];?>"  data-page="brands" data-tag="<?php echo $coupons['short_tagline'];?>" data-type="<?php echo $coupons['categories_id'];?>" id="<?php echo $brand_name2.'_'.$coupons['coupons_id'];?>">
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

                                                                      <?php if(isset($coupons['special_text']) && $coupons['special_text'] != ''){ ?>
                                                                                                                                                  <div class="best_title_f "><?php echo $coupons['special_text']?></div>
                                                                                                                                          <?php } ?> 		
                                                                                                                                          <?php if(isset($coupons['coupon_image'])){ ?>
                                                                                                                                          <div target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;?>" class="cate_side_brand_img">
                                                                                                                                                  <img class="brands_image_cate" src="<?php echo base_url();?>uploads/coupons/<?php echo $coupons['coupon_image']; ?>">
                                                                                                                                      </div>	
                                                                                                                                          <?php } ?> 															
                                                                                                                                  </div>

                                                                                                                  </div>


                                                                                                          </div>
                                                                                          <?php 
                                                                                           }
                                                  } else { ?>
                                                                                                  <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">					  
                                                                                                     <div class="cs-coupon-more-details">
                                                                                                     Keine Gutscheine verfgbar	
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
                                                                                          <?php
                                                                                          /*
                                                                                          ?> 
                                                                                     <!-- pagination -->
                                                                                          <div class="row cs-pagination">
                                                                                          <ul class="pagination"> 
                                                                                                  <?php if($total_items <= $page_limit_initial){ ?>
                                                                                                  <li class="" >
                                                                                                          <a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                                                                  <?php } else { ?>
                                                                                                  <?php $pages = ceil($total_items/$page_limit_initial); ?>
                                                                                                  <?php $pages_limit = $total_page_limit_initial; ?>
                                                                                                  <?php if(!empty($page) && $page_num > 1){ ?>
                                                                                                  <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                                                                  <?php } ?>
                                                                                                  <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                                                                          <?php if($page_num >= $pages_limit){ ?>
                                                                                                                  <?php if($i >= $pages_limit){ ?>
                                                                                                                          <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                                                                          <?php if($i >= $page_num){ ?>
                                                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                          <?php } else { ?>
                                                                                                                  <?php if($i <= $pages_limit){ ?>
                                                                                                                          <?php if(empty($page_num) && $i == 1){ ?>
                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url();?>home/brands/<?php echo $brand_id;?>?type=Free%20Items&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                                                                          <?php } else { ?>
                                                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                                                                          <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                          <?php } ?>
                                                                                                  <?php } ?>
                                                                                                  <?php if(!empty($page) && $pages<$page_num){ ?>
                                                                                                  <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                  <a class="cs-pagination-item" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                  <?php } else if($pages != $page_num){ ?>

                                                                                                  <!-- <li>
                                                                                                          <span class="cs-pagination-item">
                                                                                                                  <font style="vertical-align: inherit;">
                                                                                                                          <font style="vertical-align: inherit;">...</font>
                                                                                                                  </font>
                                                                                                          </span>
                                                                                                  </li> -->
                                                                                                  <!-- <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                                                                  <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                                                                  <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                                                          <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url().'marken/'.$brand_name_new ?>?type=Free%20Items&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                                                                  <?php } ?>
                                                                                          <?php } ?>
                                                                                  </ul>											
                                                                          </div> 
                                                                          <?php */ ?>
                                                                                          <!-- pagination -->
                                                                                  </div>
                                                                          </div>
                                                                          <div class="row">
                                                                                  <?php

                                                                                          if(@$page_brand_id != '')
                                                                                          {
                                                                                                  $get_coupons = $this->db->query("
                                                                                                          select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
                                                                                                          from coupons as cpn 
                                                                                                          left join brands as brand ON cpn.brands_id = brand.brands_id
                                                                                                          where FIND_IN_SET(".$page_brand_id.", cpn.similar_brands_id) != 0 AND cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".date('Y-m-d')."' OR cpn.end_date = '0000-00-00') ORDER BY cpn.date_added DESC LIMIT 2
                                                                                                  ")->result_array();

                                                                                                  $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
                                                                                                  if(!empty($get_coupons)){
                                                                                                          $_x=0;
                                                                                                  foreach($get_coupons as $fetch_data){
                                                                                                          $brand_image2 = $fetch_data['brand_image'];
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
                                                                                          <div class="col-sm-12" style="margin-bottom: 30px; <?php echo ($_x++ % 2 == 0)?'padding-right: 10px':'padding-left: 10px'; ?>">  
                                                                                          <div class="coupon_box_div coupon_click_brands" data-url = "<?php echo base_url().'marken/'.$brand_name_new."?coupon_id=".$coupons_id;?>" data-page="brands" data-coupon = "<?php echo $fetch_data['coupon_type'];?>" data-tag="<?php echo $fetch_data['short_tagline'];?>" data-type="<?php echo $fetch_data['categories_id'];?>" id="<?php echo $brand_name_new.'_'.$fetch_data['coupons_id'];?>" style="position: relative; margin-top: 20px;">
                                                                                          <div class="discount_div">
                                                                                                  <span>
                                                                                                  <?php
                                                                                                          if($discount_type == 'Custom'){																			
                                                                                                          ?>
                                                                                                          <span class="main_rabet">
                                                                                                          <?php echo strtoupper($discount_value).$discount_type_sign ?> 
                                                                                                          </span>


                                                                                                          <?php
                                                                                                          }
                                                                                                          else{
                                                                                                          ?>
                                                                                                          <span class="main_rabet">
                                                                                                          <?php echo '<span class="cpn_amount">'.strtoupper($discount_value).$discount_type_sign; ?></span>
                                                                                                          <br>
                                                                                                          Rabatt
                                                                                                          </span>
                                                                                                          <?php
                                                                                                          }
                                                                                                          ?>
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
                                                                                                  <img class="lazyloaded 1--" src="<?php echo base_url().$brand_img_url.$brand_image2; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image2; ?>" alt="<?php echo $brand_name; ?>">
                                                                                          </div>
                                                                                          </div>
                                                                                          </div>
                                                                                          <?php } } } ?>
                                                                                  </div>
                                                                     </div>

                                                                     <!--Mobile redeem section  -->
                                                                  <style>
                                                                          .cat_description{
                                                                                  background-color: #fff;
                                                                                  padding: 14px;
                                                                                  font-size: initial;
                                                                                  line-height: 1.6;
                                                                          }
                                                                  </style>
                                                                  <div class="clearfix"></div>

                                                          </section>

                                                          <?php }	 else{ ?>

                                                          <div class="cs-coupon-box cs-coupon-category mt_10" style="display: flex;justify-content: center;font-size: 14px;">
                                                          <div class="cs-coupon-more-details">
                                                          Keine Gutscheine verfügbar
                                                          </div>
                                                          </div>

                                                          <?php  } ?>

                                                          <?php

                                                                  $get_all_brands = $this->db->order_by('sort_order', 'ASC')->get_where('similar_brands', array('status'=>'Active','brands_id'=>$brand_id))->result_array();

                                                                  if(!empty($get_all_brands)){
                                                                  ?>
                                                                  <div class="cs-sidebar-item cs-sidebar-contact p-l">
                                                                          <div class="popular_shops_mbl">
                                                                                  <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Die beliebtesten Geschäfte</font></font></h4>
                                                                                  <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap" style="grid-gap: 8px;">
                                                                                  <?php						
                                                                                          foreach($get_all_brands as $fetch_data){
                                                                                                  $brands_data = $this->db->get_where('brands', array('brands_id'=>$fetch_data['similar_brand_id']))->row();

                                                                                                  if($brands_data)
                                                                                                  {
                                                                                                          $brand_name = $brands_data->name;
                                                                                                          $brand_id = $brands_data->brands_id;
                                                                                                          $brand_name_new = "";
                                                                                                          $brand_name_array = explode(" ",$brand_name);
                                                                                                          if(count($brand_name_array) > 0){
                                                                                                                  $brand_name_new = str_replace(' ', '-', $brand_name);
                                                                                                          }
                                                                                          ?>
                                                                                                  <a class="box_cat sub_cat" target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new; ?>"><?php echo $brand_name ?></a>
                                                                                          <?php } } ?>
                                                                                  </ul>     
                                                                          </div>
                                                                  </div>

                                                                  <?php } ?>

                                                </div>
                                                                                      
                                                <div class="col-md-12 col-sm-12 brand_hide" style="padding:0 10px; width:100%; margin:auto; background:#f8f9fa; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.08);">

  <section class="cs-home-selection cs-home-mer-box" style="margin-bottom:5px; padding:5px 0;">
    <?php 
    $brands_content =  $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('brands_id'=>$param1,'type'=>'brand','status'=>'Active'))->result_array();
    foreach($brands_content as $b_content){
    ?>
      <div class="" style="margin-top: 20px;">
        <h4 class="cs-home-h rem" style="font-weight:600; color:#2c3e50;">
          <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $b_content['heading'] ?> </font></font>
        </h4>
        <div class="cs-merchant-coupons-table cs-merchant-coupons-table-updated" 
             style="box-shadow: 0px 0px 6px rgb(180 180 180); padding: 16px 18px; line-height: 1.8; font-size: 16px; border-radius:6px; background-color:#fff;">
          <p style="margin-bottom:0;"> <?php echo $b_content['description'] ?></p>
        </div>
      </div>
    <?php } ?>
  </section>

  <section class="cs-home-selection cs-home-mer-box" style="margin-bottom:20px; padding:5px 0;">
    <?php 
    $faqs_tabs   = $this->db->get_where('faqs', array('question_type'=>'4','unique_id'=>$thisBrand))->result_array();
    $json = array("@context" => "https://schema.org", "@type" => "FAQPage", "mainEntity" => array());
    foreach($faqs_tabs as $key => $faqs){
    ?>
      <div class="" style="margin-top: 20px;">
        <h4 class="cs-home-h rem" style="font-weight:600; color:#2c3e50;">
          <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $faqs['question']?> </font></font>
        </h4>
        <div class="cs-merchant-coupons-table cs-merchant-coupons-table-updated" 
             style="box-shadow: 0px 0px 6px rgb(180 180 180); padding: 16px 18px; line-height: 1.8; font-size: 16px; border-radius:6px; background-color:#fff;">
          <div><p style="margin-bottom:0;"> <?php echo $faqs['answer']?></p></div>
        </div>
      </div>
    <?php $tmp = array("@type" => "Question", "name" => $faqs['question'], "acceptedAnswer" => array("@type" => "Answer", "text" => $faqs['answer'])); $json['mainEntity'][] = $tmp; ?>
    <?php } ?>
    <?php if(!empty($json['mainEntity'])) { 
      echo '<script type="application/ld+json">';
      echo json_encode($json);
      echo '</script>';
    } ?>
  </section>

</div>

<style>
  .cs-merchant-coupons-table-updated {
    margin-top: 15px;
    padding: 8px;
    text-align: left;
    font-weight: 300;
    font-size: 14px;
    background: #FFF;
  }
  .cs-merchant-coupons-table-updated table {
    width: 100%;
  }
  .cs-merchant-coupons-table-updated tr:last-of-type {
    border-bottom: none;
  }
  .cs-merchant-coupons-table-updated tr {
    vertical-align: baseline;
    border-bottom: 1px solid #314345;
  }
  .cs-merchant-coupons-table-updated thead tr th {
    font-weight: bold;
  }
  .cs-merchant-coupons-table-updated th {
    padding: 12px 8px;
    font-weight: 300;
  }
  .cs-merchant-coupons-table th:nth-of-type(1) {
    width: 60%;
  }
  .cs-merchant-coupons-table th:nth-of-type(2),
  .cs-merchant-coupons-table th:nth-of-type(3) {
    width: 20% !important;
  }
</style>
                                      

                                                          <!--Sidebar -->
  <!--						<div class="cs-sidebar-left para-width">
                                                          <aside id="cs-sidebar" style="cs-sidebar-left para-width">

                                                                   Filter 


                                                                  <?php if($show_ads) { ?>
                                                                           Google Add  
                                                                          <div class="row text-center">
                                                                           <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4102770400209779"
                                                                                  crossorigin="anonymous"></script> 
                                                                           Square Responsive Ad 
                                                                          <ins class="adsbygoogle"
                                                                                  style="display:block"
                                                                                  data-ad-client="ca-pub-4102770400209779"
                                                                                  data-ad-slot="8959968988"
                                                                                  data-ad-format="auto"
                                                                                  data-full-width-responsive="true"></ins>
                                                                          <script>
                                                                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                                                          </script>
                                                                          </div>
                                                                           Google Add  
                                                                  <?php } ?>
                                                                  <?php /*<div class="cs-sidebar-item cs-filter" style="position:relative; padding-top: 51px;">


                                                                          <div class="old_redemption">
                                                                             <div class="cs-filter-title">
                                                                                     <font style="vertical-align: inherit;">
                                                                                            <font style="vertical-align: inherit;">Einlösungsart</font> 
                                                                                     </font>
                                                                             </div>
                                                                             <ul id="" class="cs-filter-ul cs-filter-scroll" >

                                                                                          <li class="cs-filter-li">
                                                                                                   <input class="cs-filter-input checkbox" data-dis="ne1" data-type="desktop" name="check_filter" data-brandid="<?php echo $brand_id; ?>" data-cateId="" data-checkId="Existing" type="checkbox" id="Existing1">
                                                                                                   <label class="cs-filter-label" id="ex1" for="Existing1">
                                                                                                          <font style="vertical-align: inherit;">
                                                                                                                  <font style="vertical-align: inherit;">Bestehender Kunde</font>
                                                                                                          </font>
                                                                                                  </label> 
                                                                                          </li>
                                                                                          <li class="cs-filter-li">
                                                                                                   <input class="cs-filter-input checkbox" data-dis="ex1" data-type="desktop" name="check_filter" data-brandid="<?php echo $brand_id; ?>" data-cateId="" data-checkId="New" type="checkbox" id="New1">
                                                                                                   <label class="cs-filter-label" id="ne1" for="New1">
                                                                                                          <font style="vertical-align: inherit;">
                                                                                                                  <font style="vertical-align: inherit;">Neukunde</font>
                                                                                                          </font>
                                                                                                  </label>
                                                                                          </li>
                                                                             </ul>
                                                                             </div>


                                                                          <div class=" cs-filter-layer"></div>
                                                                  </div>*/ ?>


                                                                  <?php /* <div class="cs-sidebar-item cs-sidebar-contact p-l" style="text-align: inherit;line-height: 25px;padding: 17px;border: 1px solid #d6c6c6;border-radius: 7px;background: white;margin-bottom: 6px;margin-top: 6px;"> 
                                                                          <div class="cs-sidebar-h3">
                                                                                  <font style="vertical-align: inherit;">
                                                                                          <font style="vertical-align: inherit;">Alle Informationen zum Anbieter</font>
                                                                                  </font>
                                                                          </div>
                                                                          <font style="vertical-align: inherit;">
                                                                                  <font style="vertical-align: inherit;" class="brand"> <?php echo $all_brands['name']; ?> </font>
                                                                          </font>
                                                                          <br>
                                                                          <font style="vertical-align: inherit;">
                                                                                  <font style="vertical-align: inherit;"><i class="fa fa-map-marker icn"></i> <?php echo $all_brands['address']; ?> </font>
                                                                          </font>
                                                                          <br>
                                                                          <font style="vertical-align: inherit;" >
                                                                                  <font style="vertical-align: inherit;"><i class="fa fa-fax icn"></i> <?php echo $all_brands['fax']; ?></font>
                                                                          </font>
                                                                          <div class="cs-sidebar-text-phone">
                                                                                  <font style="vertical-align: inherit;">
                                                                                          <font style="vertical-align: inherit;"><i class="fa fa-phone icn"></i> <?php echo $all_brands['tele_phone']; ?></font>
                                                                                  </font>
                                                                          </div>
                                                                          <div class="cs-sidebar-text-email">
                                                                                  <font style="vertical-align: inherit;">
                                                                                          <font style="vertical-align: inherit;">
                                                                                                  <i class="fa fa-envelope icn"></i> <?php echo $all_brands['email']; ?>
                                                                                          </font>
                                                                                  </font>
                                                                          </div>
                                                                          <?php 
                                                                           if(!empty($all_brands['terms_condition'])){
                                                                          ?>
                                      <div>
                                         <font style="vertical-align: inherit;">
                                                                                  <font style="vertical-align: inherit;" class="">
                                                                                  <a href="<?php echo $all_brands['terms_condition']; ?>"><i class="fa fa-gavel icn"></i> Bedingungen</a>
                                                                                  </font>
                                                                            </font>									
                                      </div> 
                                                                           <?php }?>
                                                                          <?php 
                                                                               if(!empty($all_brands['shipping_from']) || !empty($all_brands['shipping_cost'])){
                                                                          ?>
                                                                          <div class="cs-sidebar-text-shipping">
                                                                              <?php 
                                                                               if(!empty($all_brands['shipping_cost'])){
                                                                              ?>
                                                                                  <font style="vertical-align: inherit;">
                                                                                          <font style="vertical-align: inherit;">
                                                                                          Versandkosten: <?php echo $all_brands['shipping_cost']; ?>
                                                                                          </font>
                                                                                  </font>
                                                                                  <?php }?>
                                                                                  <br>
                                                                                  <?php 
                                                                               if(!empty($all_brands['shipping_from'])){
                                                                              ?>
                                                                                  <font style="vertical-align: inherit;">
                                                                                          <font style="vertical-align: inherit;">
                                                                                          Versand ab: <?php echo $all_brands['shipping_from']; ?>             
                                                                                          </font>
                                                                                  </font>
                                                                                  <?php }?>
                                                                          </div>
                                                                          <?php }?>

                                                                  </div> */ ?>

                                                                  <div class="cs-sidebar-divider popular_shops"></div>
                                                                  <?php
                                                                          $tv_slider = $this->db->query("select * from tv_slider_images where status ='Active'")->result_array();
                                                                          if(count($tv_slider) > 0) {
                                                                  ?>
                                                                  <div style="text-align:center;padding: 1px 11px 10px 11px;">
                                                                   <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipps für dich</font></font></h4>
                                                                  </div>
                                                                  <div class="cs-sidebar-item cs-sidebar-contact p-l">
                                                                          <div id="my-pics" class="carousel slide my-pics" data-ride="carousel" >
                                                                          <div class="carousel-inner" role="listbox">
                                                                          <?php   
                                                                          //  $tv_slider = $this->db->get_where('tv_slider_images',array('status'=>'Active'))->result_array();
                                                                           foreach($tv_slider as $key => $slider){
                                                                          ?>	
                                                                          <div class="item <?php if($key==0){ echo "active"; } ?> ">
                                                                             <a href="<?php echo $slider['link']; ?>">
                                                                                  <img  style="width: 100%;height: 100%;" src="<?php echo base_url()?>uploads/brands/sliders/<?php echo $slider['image']; ?>" >
                                                                                   <div  class="caption">
                                                                                          <p><?php echo $slider['description']; ?></p>
                                                                                  </div> 
                                                                                  </a>
                                                                          </div>
                                                                          <?php } ?>
                                                                           Slide 3  
                                                                          </div>
                                                                           Previous/Next controls 
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
                                                                  <?php } ?>
                                                                  <div class="cs-sidebar-divider"></div> 

                                                                  <?php

                                                                  $get_all_brands = $this->db->order_by('sort_order', 'ASC')->get_where('similar_brands', array('status'=>'Active','brands_id'=>$brandss_id))->result_array();
                                                                  if(!empty($get_all_brands)){
                                                                  ?>
                                                                  <div class="cs-sidebar-item cs-sidebar-contact p-l">
                                                                          <div class="popular_shops">
                                                                                  <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Die beliebtesten Geschäfte</font></font></h4>
                                                                                  <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap" style="grid-gap: 8px;">
                                                                                  <?php						
                                                                                          foreach($get_all_brands as $fetch_data){
                                                                                                  $brands_data = $this->db->get_where('brands', array('brands_id'=>$fetch_data['similar_brand_id']))->row();

                                                                                                  if($brands_data)
                                                                                                  {
                                                                                                          $brand_name = $brands_data->name;
                                                                                                          // $brand_id = $brands_data->brands_id;
                                                                                                          $brand_name_new = "";
                                                                                                          $brand_name_array = explode(" ",$brand_name);
                                                                                                          if(count($brand_name_array) > 0){
                                                                                                          $brand_name_new = str_replace(' ', '-', $brand_name);
                                                                                                          }
                                                                                          ?>
                                                                                                  <a class="box_cat sub_cat" target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new; ?>"><?php echo $brand_name ?></a>
                                                                                          <?php } } ?>

                                                                                  </ul>     
                                                                          </div>
                                                                  </div>
                                                                  <div class="cs-sidebar-divider popular_shops"></div>
                                                                  <?php } ?>

                                                                  <?php

                                                                  $get_all_brands = $this->db->order_by('sort_order', 'ASC')->get_where('similar_hidden_brands', array('status'=>'Active','brands_id'=>$brandss_id))->result_array();
                                                                  if(!empty($get_all_brands)){
                                                                  ?>
                                                                  <div class="cs-sidebar-item cs-sidebar-contact p-l" style="display: none;">
                                                                          <div class="popular_shops">
                                                                                  <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Die beliebtesten Geschäfte</font></font></h4>
                                                                                  <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap" style="grid-gap: 8px;">
                                                                                  <?php						
                                                                                          foreach($get_all_brands as $fetch_data){
                                                                                                  $brands_data = $this->db->get_where('brands', array('brands_id'=>$fetch_data['similar_brand_id']))->row();

                                                                                                  if($brands_data)
                                                                                                  {
                                                                                                          $brand_name = $brands_data->name;
                                                                                                          // $brand_id = $brands_data->brands_id;
                                                                                                          $brand_name_new = "";
                                                                                                          $brand_name_array = explode(" ",$brand_name);
                                                                                                          if(count($brand_name_array) > 0){
                                                                                                          $brand_name_new = str_replace(' ', '-', $brand_name);
                                                                                                          }
                                                                                          ?>
                                                                                                  <a class="box_cat sub_cat" target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new; ?>"><?php echo $brand_name ?></a>
                                                                                          <?php } } ?>

                                                                                  </ul>     
                                                                          </div>
                                                                  </div>
                                                                   <div class="cs-sidebar-divider popular_shops"></div> 
                                                                  <?php } ?>
                                                          </aside>
                                                  </div>-->
                                                          <!--sidebar end-->
                                          </div>
				</section>

				<div class="clearfix"></div>
				<!-- About us and tabs section -->
				<style>
					.faqs{
						  margin-top: 0px;
					}
					.about_section{
						 display: flex;
						 grid-gap: 31px;
						 margin: 40px 0px 40px 0px;
						 
					}
					
					.active_tab{
						 border-left: 5px solid #5c8374;
					}    
					
					.para{
						font-size: 15px;
						line-height: 1.7;
					}
					.bg_white{
						background: #fff !important;
					}
				</style>
			
				<div class="clearfix"></div>
				
				
				
				
				
				
				
				<div class="clearfix"></div>
				<!-- By ID Section End Here -->
				<?php } ?>
				<div class="clearfix"></div>
				<div style="padding:10px"></div>
				<!-- <section class="cs-home-selection cs-home-mer-box " style="border-bottom: 4px solid #5c8374;"></section> -->
			</div>
		</div>
	</div>
</main>
<!-- ✅ Toggle Script -->
<script>
    document.querySelectorAll('.coupon-more-details-toggle').forEach(function(toggle) {
  toggle.addEventListener('click', function(e) {
    const extra = toggle.closest('.coupon-extra-details');
    const desc = extra.querySelector('.coupon-description');
    const span = toggle.querySelector('span');

    const beforeDisplay = window.getComputedStyle(desc).display;
    const isVisible = beforeDisplay !== 'none';

    if (isVisible) {
      desc.style.display = 'none';
      if (span) span.textContent = 'Mehr Details';
    } else {
      desc.style.display = 'block';
      if (span) span.textContent = 'Weniger Details';
    }

    // Hide all other descriptions
    document.querySelectorAll('.coupon-extra-details').forEach(function(otherExtra) {
      if (otherExtra === extra) return;
      const otherDesc = otherExtra.querySelector('.coupon-description');
      if (otherDesc) otherDesc.style.display = 'none';
      const otherSpan = otherExtra.querySelector('.coupon-more-details-toggle span');
      if (otherSpan) otherSpan.textContent = 'Mehr Details';
    });
  });
});
</script>