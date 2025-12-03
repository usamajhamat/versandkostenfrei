<?php $date = date("Y-m-d"); ?>
<!------------------- MODERNES DESIGN 2025 ------------------->
<style>
    :root {
        --primary: #5c8374;
        --primary-dark: #47695e;
        --accent: #e8f0ed;
        --text: #2e3532;
        --light: #f9fbfa;
        --gray: #6c757d;
        --border: #ddd;
    }

    body { font-family: 'Segoe UI', system-ui, sans-serif; color: var(--text); background: #fff; }

    /* Hero Section */
    .category-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 80px 20px 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .category-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('https://images.unsplash.com/photo-1558618666-fcd25e63d45f?w=1920') center/cover no-repeat;
        opacity: 0.15;
    }
    .category-hero h1 { 
        font-size: 3.5rem; 
        font-weight: 800; 
        margin: 0 0 15px;
        text-shadow: 0 3px 10px rgba(0,0,0,0.3);
    }
    .category-hero h2 { 
        font-size: 2.8rem; 
        margin: 0 0 10px;
        font-weight: 700;
    }
    .category-hero h3 {
        font-size: 1.6rem;
        opacity: 0.95;
        font-weight: 500;
    }

    /* Kategorien Grid (All Categories Page) */
    .cat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding: 40px 20px;
    }
    .cat-card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        background: white;
    }
    .cat-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(92,131,116,0.25);
    }
    .cat-card img {
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .cat-card:hover img { transform: scale(1.1); }
    .cat-card-body {
        padding: 20px;
        text-align: center;
    }
    .cat-card h5 {
        font-size: 1.4rem;
        margin: 0 0 12px;
        color: var(--primary);
    }
    .cat-card p { 
        color: var(--gray); 
        font-size: 0.95rem;
        line-height: 1.5;
    }
    .cat-card .btn {
        margin-top: 15px;
        background: var(--primary);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .cat-card .btn:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Coupon Tabs */
    .coupon-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        background: white;
        border-bottom: 3px solid var(--primary);
        margin: 30px 0;
        padding: 0 20px;
        scrollbar-width: thin;
    }
    .coupon-tabs::-webkit-scrollbar { height: 6px; }
    .coupon-tabs::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 3px; }

    .coupon-tabs .nav-link {
        white-space: nowrap;
        padding: 14px 20px;
        color: var(--text);
        font-weight: 600;
        border-radius: 0;
        position: relative;
    }
    .coupon-tabs .nav-link.active {
        color: var(--primary);
        border-bottom: 4px solid var(--primary);
    }
    .coupon-tabs .nav-link:hover {
        color: var(--primary);
    }
    .badge-count {
        background: var(--primary);
        color: white;
        font-size: 0.8rem;
        padding: 4px 8px;
        border-radius: 12px;
        margin-left: 6px;
    }

    /* Coupon Cards */
    .coupon-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .coupon-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(92,131,116,0.2);
    }
    .coupon-discount {
        position: absolute;
        top: 15px; left: 15px;
        background: var(--primary);
        color: white;
        font-weight: 800;
        font-size: 1.8rem;
        padding: 8px 16px;
        border-radius: 12px;
        z-index: 10;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    .coupon-header {
        display: flex;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #eee;
        gap: 20px;
    }
    .coupon-header img {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 12px;
        border: 1px solid #eee;
    }
    .coupon-body {
        padding: 20px;
        flex-grow: 1;
    }
    .coupon-title {
        font-size: 1.35rem;
        font-weight: 700;
        margin: 0 0 10px;
        color: var(--text);
    }
    .coupon-desc {
        color: var(--gray);
        margin-bottom: 15px;
        line-height: 1.6;
    }
    .coupon-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: #f8f9fa;
    }
    .btn-reveal {
        background: var(--primary);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn-reveal:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }
    .special-tag {
        position: absolute;
        top: 10px; right: 10px;
        background: #ff6b6b;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .category-hero h1 { font-size: 2.5rem; }
        .category-hero h2 { font-size: 2rem; }
        .coupon-header { flex-direction: column; text-align: center; }
    }
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
    <!--Breadcrumps -->
   <div class="clearfix">HHH</div>
    <div class="container" >
        <div class="main-content-container cs-flex">
            <!--Main Content -->
            <div class="Katgegory" style="padding-top: 80px;">
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
                     /*
                     if(empty($param)){
                      					
						if(!empty($top_lef_info)){
							$info_title = $top_lef_info['title'];
							$info_desc = $top_lef_info['description'];
					?>
                    <div class="col-sm-8">
                        <div class="cs-text txt_box mt-2 height-p" style="padding: 10px;">
                            <!-- <h3 class="box_heading"><?php echo $info_title ?></h3> -->
                            <h3 class="box_heading">Newsletter abonnieren</h3>
                            <!-- <p class="box_para hide-para-small"> <?php echo $info_desc ?></p> -->
                            <p class="box_para hide-para-small">Wenn neue Coupons, Angebote und Aktionen zu uns kommen, kommen sie direkt zu dir</p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
						if(!empty($top_right_newsletter)){
							$newsletter_title = $top_right_newsletter['title'];
							$newsletter_desc = $top_right_newsletter['description'];
							$newsletter_img = $top_right_newsletter['image'];
					?>
                    <div class="col-sm-4">
                        <div class="alert_box mt-2">
                            <!-- <h3 class="box_heading"><?php echo $newsletter_title ?></h3> -->
                            <h3 class="box_heading">Newsletter abonnieren</h3>
                            <div class="d-flex">
                                <div class="box_alert_img" style="display: grid;justify-content: center;align-items: center;">
                                    <img src="<?php echo base_url().$static_upload_url.$newsletter_img ?>">
                                </div>
                                <div>
                                    <!-- <p class="box_para"><?php echo $newsletter_desc ?></p> -->
                                    <p class="box_para hide-para-small">Wenn neue Coupons, Angebote und Aktionen zu uns kommen, kommen sie direkt zu dir</p>
                                    <div><small id="news_error" style="color:red"></small></div>
                                    <div class="subscribe_form">
                                        <input type="email" placeholder="E-Mail-Addresse" id="optin-email" class="subscribe_field">
                                        <input type="hidden" id="page_type" value="3">
                                        <input type="submit" value="subscribe" id="subscribe" style="font-size: 13px!important;" class="subscribe_btn">
                                    </div>

                                </div>
                            </div>
                            <label class="cs-newsletter-label">
                                <input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy" type="checkbox" name="" value="0">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Ja, </font>
                                </font>
                                <a href="<?php echo base_url().'datenschutz' ?>">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">ich stimme</font>
                                    </font>
                                </a>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">  der Datenschutzerklärung und Erklärung zu.</font>
                                </font>
                            </label>
                            <label class="js-newsletter-profiling more_priv cs-newsletter-label" style="display: none;">
                                <input class="cs-newsletter-checkbox" type="checkbox" name="nlr[6]" value="1">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Ja, ich möchte einen auf meine Interessen zugeschnittenen individuellen Newsletter erhalten, damit ich keine persönlichen Coupons und Aktionen mehr verpasse. Ich stimme der Analyse meiner Klicks und Öffnungsverhalten zu. Detaillierte Informationen finden Sie in unserer Datenschutzerklärung. Diese Einwilligung kann ich gemäß der Erklärung jederzeit widerrufen.</font>
                                </font>
                            </label>
                        </div>
                    </div>
                    <?php } 
					 }
                     */
					?>
                    <?php
						
						$cat_img_url     = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description;
						$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
					?>
                    
                    <!-- Section Heading -->
                    <div class="text-center py-5" style="background: linear-gradient(90deg, #e8f0ed 0%, #ffffff 100%); border-bottom: 3px solid #5c8374; margin-bottom: 10px;">
                      <h1 style="font-weight: 900; color: #5c8374; letter-spacing: 1px; text-transform: uppercase; font-size: 2rem;">
                        Gutscheine nach Kategorien
                      </h1>
                      <p class="mt-2 mb-0" style="color:#444; font-size:1rem; font-style:italic;">
                        Entdecken Sie attraktive Gutscheine in verschiedenen Kategorien
                      </p>
                    </div>

                    <?php if(empty($param)){ // show this section only for all categories ?>
                    <section style="padding: 40px 0; background-color: #f9fbfa;">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <?php 
                            $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
                            $text_limit = $this->db->get_where('system_settings',array('type'=>'description_limit'))->row()->description;
                            foreach($get_categories as $fetch_data){
                              $cat_id = $fetch_data['categories_id'];
                              $cat_name = $fetch_data['name'];
                              $cat_image = $fetch_data['cat_image'];
                              $cat_desc = $fetch_data['description'];
                              $font_icon = $fetch_data['font_icon'];
                          ?>
                          <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card category-card shadow-sm border-0 h-100" 
                                 style="border-radius:15px; overflow:hidden; background:#ffffff; transition:all 0.3s ease;">
                              <div class="card-img position-relative" style="height:210px; overflow:hidden;">
                                <img src="<?php echo base_url().$cat_img_url.$cat_image ?>" 
                                     class="card-img-top" 
                                     alt="<?php echo $cat_name ?>" 
                                     style="object-fit:cover; width:100%; height:100%; transition:transform 0.4s ease;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end text-center" 
                                     style="background: rgb(46 53 50 / 55%);color:#fff;padding:15px;">
                                  <h6 class="fw-bold mb-2" style="text-shadow:0 1px 3px rgba(0,0,0,0.4);">
                                    <?php echo $cat_name ?>
                                  </h6>
                                  <a href="<?php echo base_url().'kategorien/'.$cat_id ?>" 
                                     class="btn fw-semibold text-white" 
                                     style="border-radius:25px; background:#5c8374; border:none; padding:6px 20px; font-size:0.9rem;">
                                    Alle Anzeigen 
                                  </a>
                                </div>
                              </div>
                              <div class="card-body text-center p-3">
                                <p class="text-muted small mb-0" style="min-height:60px;">
                                  <?php echo substr(strip_tags($cat_desc),0,120); ?><?php if(strlen($cat_desc)>120) echo '...'; ?>
                                </p>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </section>

                    <style>
                      .category-card:hover {
                        transform: translateY(-8px);
                        box-shadow: 0 10px 22px rgba(92,131,116,0.25) !important;
                      }
                      .category-card:hover img {
                        transform: scale(1.08);
                      }
                      .category-card .btn:hover {
                        background:#47695e !important;
                      }
                    </style>
                    <?php } ?>
                    
                    <?php if(!empty($param)){ ?> 
                        <section style="padding:40px 0; background-color:#f9fbfa;">
                          <div class="container-fluid">
                            <div class="row justify-content-center">

                              <?php 
                                $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;

                                foreach($get_categories as $fetch_data){
                                  $cat_id     = $fetch_data['categories_id'];
                                  $cat_name   = $fetch_data['name'];
                                  $cat_image  = $fetch_data['cat_image'];
                                  $cat_desc   = $fetch_data['description'];
                              ?>

                              <!-- HORIZONTAL CATEGORY CARD -->
                              <div class="col-md-12 mb-4">

                                <div class="d-flex flex-wrap align-items-stretch shadow-sm"
                                     style="background:#fff; border-radius:15px; overflow:hidden; 
                                            transition:all 0.3s ease; border:1px solid rgba(0,0,0,0.05);">

                                  <!-- LEFT IMAGE -->
                                  <div style="width:320px; max-height:220px; overflow:hidden; flex-shrink:0;">
                                    <img src="<?php echo base_url().$cat_img_url.$cat_image ?>" 
                                         alt="<?php echo $cat_name ?>"
                                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;">
                                  </div>

                                  <!-- RIGHT CONTENT -->
                                  <div class="d-flex flex-column justify-content-between"
                                       style="padding:25px; flex:1; min-height:220px;">

                                    <div>
                                      <h2 style="margin-bottom:12px; font-weight:700; color:#2e3532;">
                                        <?php echo $cat_name ?>
                                      </h2>

                                      <!-- FULL DESCRIPTION (NO LIMIT) -->
                                      <p style="color:#6c757d; line-height:1.6;">
                                        <?php echo nl2br(strip_tags($cat_desc)); ?>
                                      </p>
                                    </div>

                                  </div>

                                </div>

                              </div>

                              <?php } ?>

                            </div>
                          </div>
                        </section>

                        <script>
                        // Hover effect JS (because inline CSS cannot do :hover)
                        document.querySelectorAll('.shadow-sm').forEach(function(card){
                          card.addEventListener('mouseenter', function(){
                            card.style.transform = "translateY(-5px)";
                            card.style.boxShadow = "0 10px 25px rgba(92,131,116,0.25)";
                            let img = card.querySelector('img');
                            if(img) img.style.transform = "scale(1.05)";
                          });

                          card.addEventListener('mouseleave', function(){
                            card.style.transform = "translateY(0)";
                            card.style.boxShadow = "0 0 0 rgba(0,0,0,0)";
                            let img = card.querySelector('img');
                            if(img) img.style.transform = "scale(1)";
                          });
                        });
                        </script>

                        <?php } ?>

                    <?php
					 if(!empty($param)){
					?>

                        <div class="main-content-container cs-flex">
                            <!-- Main Mer Content -->
                            <div class="cs-main-left">
                                <!-- Category Merchant Slider -->
                                <!--<div carousel="shops" class="Nfw7 brand_bar" style="transform: translateX(0px); transition: transform 200ms cubic-bezier(0.4, 0, 1, 1) 0s;">
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
                                <h3 class="cs-cat-h2 cs-text-highlight font-size-w" style="margin-top:10px;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"><?php echo $total_coupons." "; ?> Gutscheine in der Kategorie <?php echo $category_name; ?> imiiii <?php echo strftime("%B")." ".strftime("%Y")?> </font>
                                    </font>
                                </h3>
                                
                                <div class="cs-category-showbox cs-coupon-large-box">
                                    <div class=" coupons_details_cate" id="coupons_details">
                                        <ul class="nav nav-tabs tabs_filter alignment-grid">
                                            <!--<li class="active li_items"><a data-toggle="tab" class="filter" href="#all">All Coupons <b>(<?php echo $total_coupons;?>)</b></a></li>-->
                                            <li class="<?php if($active_tab=="Coupon"){ echo "active"; } ;?>  li_items li-1st"><a data-toggle="tab" class="filter  second-width" href="#coupons">Gutscheincode <b class="bold_counter">(<?php echo $count_coupons;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Offer"){ echo "active"; } ;?>  li_items"><a data-toggle="tab" class="filter" href="#offers">Rabatt <b class="bold_counter">(<?php echo $total_offers;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Deals"){ echo "active"; } ;?>   li_items"><a data-toggle="tab" class="filter" href="#deals">Angebote <b class="bold_counter">(<?php echo $total_deals;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Free Shipping"){ echo "active"; } ;?>  li_items"><a data-toggle="tab" class="filter" href="#shipping" >Kostenloser Versand <b class="bold_counter">(<?php echo $total_shipping;?>)</b></a></li>
                                            <li class="<?php if($active_tab=="Free Items"){ echo "active"; } ;?>   li_items"><a data-toggle="tab" class="filter" href="#items">Kostenlose Artikel <b class="bold_counter">(<?php echo $total_items;?>)</b></a></li>
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
    /*flex: 0 0 18%;               18% width per tab */
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
                                                                                                        $brands_details = $this->db->get_where('brands', array('brands_id'=>$coupons['brands_id']))->row_array();

                                                                                                        // safely handle missing brand
                                                                                                        $brands_image = !empty($brands_details) ? $brands_details['brand_image'] : '';
                                                                                                        $cat_image = !empty($category_details) ? $category_details['cat_image'] : '';
                                                                                                        $cat_name = !empty($category_details) ? $category_details['name'] : '';
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
									
													$brand_name = @$this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
												
                                        
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
																<div class="mobile_brands_image">  
																   <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																</div>
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

																		
																		<div class="brand-width-cate">
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
																	<a target="_blank" href="<?php echo base_url().'marken/'.$brand_name_new;?>" class="cate_side_brand_img">
																		<img class="brands_image_cate" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																    </a>																	
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
															<a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li> 
														<?php } else { ?>
														<?php $pages = ceil($count_coupons/$page_limit_initial); ?>
														<?php $pages_limit = $total_page_limit_initial; ?>
														<?php if(!empty($page) && $page_num > 1){ ?>
														<li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
														<?php } ?>
														<?php for($i = 1; $i<=$pages; $i++){ ?>
															<?php if($page_num >= $pages_limit){ ?>
																<?php if($i >= $pages_limit){ ?>
																	<?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
																	<?php if($i >= $page_num){ ?>
																		<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } else { ?>
																<?php if($i <= $pages_limit){ ?>
																	<?php if(empty($page_num) && $i == 1){ ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url();?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
																	<?php } else { ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } ?>
														<?php } ?>
														<?php if(!empty($page) && $pages<$page_num){ ?>
														<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
														<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } else if($pages != $page_num){ ?>
														
														<!-- <li>
															<span class="cs-pagination-item">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">...</font>
																</font>
															</span>
														</li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
														<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
															<a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Coupon&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
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
															 <div class="mobile_brands_image">  
																   <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																</div>
																
																
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

																		
																		<div class="brand-width-cate">
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
																	<div class="cate_side_brand_img">
																		<img class="brands_image_cate" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																    </div>																
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
                                                            <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                        <?php } else { ?>
                                                        <?php $pages = ceil($total_offers/$page_limit_initial); ?>
                                                        <?php $pages_limit = $total_page_limit_initial; ?>
                                                        <?php if(!empty($page) && $page_num > 1){ ?>
                                                        <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                        <?php } ?>
                                                        <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                            <?php if($page_num >= $pages_limit){ ?>
                                                                <?php if($i >= $pages_limit){ ?>
                                                                    <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                                    <?php if($i >= $page_num){ ?>
                                                                        <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php if($i <= $pages_limit){ ?>
                                                                    <?php if(empty($page_num) && $i == 1){ ?>
                                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                        <a class="cs-pagination-item" href="<?php echo base_url();?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                                    <?php } else { ?>
                                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                        <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if(!empty($page) && $pages<$page_num){ ?>
                                                        <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                        <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                        <?php } else if($pages != $page_num){ ?>
                                                        
                                                        <!-- <li>
                                                            <span class="cs-pagination-item">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">...</font>
                                                                </font>
                                                            </span>
                                                        </li>
                                                        <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                        <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                        <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                            <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
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
																	<div class="mobile_brands_image">  
																		<img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																	</div>
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

																		
																		<div class="brand-width-cate">
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
																	<div class="cate_side_brand_img">
																		<img class="brands_image_cate" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																    </div>																
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
															<a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li> 
														<?php } else { ?>
														<?php $pages = ceil($total_deals/$page_limit_initial); ?>
														<?php $pages_limit = $total_page_limit_initial; ?>
														<?php if(!empty($page) && $page_num > 1){ ?>
														<li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
														<?php } ?>
														<?php for($i = 1; $i<=$pages; $i++){ ?>
															<?php if($page_num >= $pages_limit){ ?>
																<?php if($i >= $pages_limit){ ?>
																	<?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
																	<?php if($i >= $page_num){ ?>
																		<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } else { ?>
																<?php if($i <= $pages_limit){ ?>
																	<?php if(empty($page_num) && $i == 1){ ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url();?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
																	<?php } else { ?>
																		<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
																		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
																	<?php } ?>
																<?php } ?>
															<?php } ?>
														<?php } ?>
														<?php if(!empty($page) && $pages<$page_num){ ?>
														<li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
														<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
														<?php } else if($pages != $page_num){ ?>
														
														<!-- <li>
															<span class="cs-pagination-item">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">...</font>
																</font>
															</span>
														</li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
														<li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
														<li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
															<a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Deals/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
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
																<div class="mobile_brands_image">  
																   <img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																</div>
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

																		
																		<div class="brand-width-cate">
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
																	<div class="cate_side_brand_img">
																		<img class="brands_image_cate" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																    </div>															
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
                                                    <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>?type=Offer&name=page&page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                <?php } else { ?>
                                                <?php $pages = ceil($total_shipping/$page_limit_initial); ?>
                                                <?php $pages_limit = $total_page_limit_initial; ?>
                                                <?php if(!empty($page) && $page_num > 1){ ?>
                                                <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                <?php } ?>
                                                <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                    <?php if($page_num >= $pages_limit){ ?>
                                                        <?php if($i >= $pages_limit){ ?>
                                                            <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                            <?php if($i >= $page_num){ ?>
                                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if($i <= $pages_limit){ ?>
                                                            <?php if(empty($page_num) && $i == 1){ ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url();?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                            <?php } else { ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if(!empty($page) && $pages<$page_num){ ?>
                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } else if($pages != $page_num){ ?>
                                                
                                                <!-- <li>
                                                    <span class="cs-pagination-item">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">...</font>
                                                        </font>
                                                    </span>
                                                </li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                    <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Shipping/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
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
															$code_text = "Kein Code bentigt!"; 
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
																	<div class="mobile_brands_image">  
																		<img class="brands_image_cate_mbl" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																	</div>
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

																		
																		<div class="brand-width-cate">
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
																	<div class="cate_side_brand_img">
																		<img class="brands_image_cate" src="<?php echo base_url();?>uploads/brands/<?php echo $brands_image; ?>">
																    </div>																	
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
                                                    <a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                <?php } else { ?>
                                                <?php $pages = ceil($total_items/$page_limit_initial); ?>
                                                <?php $pages_limit = $total_page_limit_initial; ?>
                                                <?php if(!empty($page) && $page_num > 1){ ?>
                                                <li class="" ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num - 1; ?>">&laquo;</a></li>
                                                <?php } ?>
                                                <?php for($i = 1; $i<=$pages; $i++){ ?>
                                                    <?php if($page_num >= $pages_limit){ ?>
                                                        <?php if($i >= $pages_limit){ ?>
                                                            <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                            <?php if($i >= $page_num){ ?>
                                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >		<a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if($i <= $pages_limit){ ?>
                                                            <?php if(empty($page_num) && $i == 1){ ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url();?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a></li>
                                                            <?php } else { ?>
                                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $i; ?>" class=" <?php if($i == $page_num){ ?> active <?php } ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if(!empty($page) && $pages<$page_num){ ?>
                                                <li class="<?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                <a class="cs-pagination-item" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
                                                <?php } else if($pages != $page_num){ ?>
                                                
                                                <!-- <li>
                                                    <span class="cs-pagination-item">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">...</font>
                                                        </font>
                                                    </span>
                                                </li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $pages-1; ?>"><?php echo $pages-1;?></a></li>
                                                <li ><a class="cs-pagination-item" rel="next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $pages; ?>"><?php echo $pages;?></a></li> -->
                                                <li class=" <?php if($i == $page_num) { echo 'cs-pagination-item-active'; }?>" >
                                                    <a class="cs-pagination-item cs-pagination-next" href="<?php echo base_url(); ?>kategorien/<?php echo $categories_id;?>/Free%20Items/page?page=<?php echo $page_num = $page_num + 1; ?>">&raquo;</a></li>
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


                                </div>
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
                                                <font style="vertical-align: inherit;">Ja, ich mchte einen auf meine Interessen zugeschnittenen individuellen Newsletter erhalten, damit ich keine persönlichen Coupons und Aktionen mehr verpasse. Ich stimme der Analyse meiner Klicks und ffnungsverhalten zu. Detaillierte Informationen finden Sie in unserer Datenschutzerklrung. Diese Einwilligung kann ich gemä der Erklärung jederzeit widerrufen.</font>
                                            </font>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="cs-sidebar-divider"></div> */ ?>
<!--                        <div class="cs-sidebar-item cs-sidebar-contact p-l">
                            <div class="">
                                <h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Die beliebtesten Geschfte</font></font></h4>
                                <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap">
                                <?php
//                                    $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit(12)->get_where('brands', array('status'=>'Active','popular_shop'=>'1','popular_shop_order!='=>'0'))->result_array();
//                                    foreach($get_all_brands as $fetch_data){
//                                        $brand_image = $fetch_data['brand_image'];
//                                        $brand_name = $fetch_data['name'];
//                                        $brand_id = $fetch_data['brands_id'];
//                                        $get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
                                    ?>
                                     <?php
//                                        $brand_name_new = "";
//                                        $brand_name_array = explode(" ",$brand_name);
//                                        if(count($brand_name_array) >0){
//                                            $brand_name_new = str_replace(' ', '-', $brand_name);
//                                        }
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
                                    <?php // } ?>
                                </ul>     
                            </div>
                        </div>-->

                        <div class="cs-sidebar-item cs-sidebar-contact p-l">
    <div class="">
        <h4>Die beliebtesten Geschäfte</h4>
        <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil padding-1 display-gap" style="grid-gap: 8px;">
        <?php
            // Improved query – safer and shows brands even if ordering is incomplete
            $this->db->where('status', 'Active');
            $this->db->where('popular_shop', '1');
            $this->db->order_by('popular_shop_order', 'ASC');
            $this->db->order_by('name', 'ASC'); // fallback sorting
            $this->db->limit(12);
            $get_all_brands = $this->db->get('brands')->result_array();

            if (!empty($get_all_brands)) {
                foreach($get_all_brands as $fetch_data){
                    $brand_name = htmlspecialchars($fetch_data['name']);
                    $brand_name_new = url_title($brand_name, 'dash', TRUE); // Better than str_replace
        ?>
                    <a class="box_cat sub_cat" 
                       target="_blank" 
                       href="<?php echo base_url('marken/'.$brand_name_new); ?>">
                        <?php echo $brand_name; ?>
                    </a>
        <?php
                }
            } else {
                // Debug: Show this only temporarily to confirm the issue
                echo '<small style="color:red;">Keine beliebten Shops gefunden. Prüfe popular_shop = 1 und popular_shop_order in der DB.</small>';
            }
        ?>
        </ul>
    </div>
</div>
                    </aside>
                </div>
            </div>
            <!-- About us and tabs section -->
            <style>
                .faqs {
                    margin-top: 0px;
                }
            </style>
                                                          <div class="cs-home-selection cs-home-mer-box " style="margin-bottom:20px">
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
                                            </div>
            <div class="cs-home-selection cs-home-mer-box ">
                <div class="container">
                    <?php
                                $this->db->limit(4);
                                $faqs_tabs   = $this->db->get_where('faqs', array('question_type'=>'1'))->result_array();
                          ?>
                     <div class="col-md-4" id="tabs_faqss"  style="display:none">
                            <h4>
                                <font>Content </font>
                            </h4>
                            <?php foreach($faqs_tabs as $key => $faqs){ ?>
                            <div style='<?php if($key=="3"){ echo "border-bottom:0.1px solid #00000036"; } ?>' class="tabs_content  faqs_tabs <?php if($key==0){echo "active_tab";}?>" id="<?php echo $faqs['faqs_id']?>">
                                <font><?php echo $faqs['question']?></font>
                            </div>
                            <?php } ?>
                        </div>
                    <div class="row about_section" style="display:none">
                        <div class="col-md-8">
                            <!--<div>
									<?php $about_us   = $this->db->get_where('static_content', array('type'=>'bottom_about_us'))->row()->description; ?>
									<h4 class="cs-home-h"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">About Us </font></font></h4>
									<p class="para"><?php echo $about_us;?></p>
								 </div> -->
                            <div id="faqs_answer" class="left-position">
                                <?php 
										foreach($faqs_tabs as $key => $faqs){
									?>
                                <div class="faqs" id="faqs_<?php echo $faqs['faqs_id']?>" style="<?php if($key!=0){  echo "display:none; "; }?> ">
                                    <h4 class="cs-home-h">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $faqs['question']?> </font>
                                        </font>
                                    </h4>
                                    <div class="paragraph-s">
                                        <p class="para"><?php echo $faqs['answer']?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 tab-close" id="tabs_faqss">
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
            </div>
            <?php } ?>
            <!-- Merchant Box -->
<!--            <section class="cs-home-selection cs-home-mer-box ">
                <div class="container">
                    <?php 
							if(empty($param)){
							?>
                    <h3 class="cs-home-h">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Die beliebtesten Geschäfte</font>
                        </font>
                    </h3>
                    <ul class="cs-home-mer-box-ul cs-flex cs-flex-mobil  padding-1">
                        <?php
								$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
								$get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit(12)->get_where('brands', array('status'=>'Active','popular_shop'=>'1','popular_shop_order!='=>'0'))->result_array();
								foreach($get_all_brands as $fetch_data){
									$brand_image = $fetch_data['brand_image'];
									$brand_name = $fetch_data['name'];
									$brand_id = $fetch_data['brands_id'];
									$get_brand_total_codes  = $this->db->query("select * from coupons where status = 'Active'  AND (end_date >= '".$date."' OR end_date = '0000-00-00') AND brands_id = '".$brand_id."' ")->num_rows();
						
								?>
                                 <?php
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) >0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                        ?>
                        <a id="1105_fav" class="col-md-2" href="<?php echo base_url().'marken/'.$brand_name_new ?>">
                            <li class="cs-home-mer-box-li-box" title="Vouchers from apotal" style="background: transparent; box-shadow:none; display:block;">
                                <div class="brands_img_group img-home ss" style="box-shadow:1px 1px 5px #b4b4b4;">
                                    <img class=" lazyloaded" style = "padding:0px" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" alt="<?php echo $brand_name ?>" title="<?php echo $brand_name ?>">
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
            </section>-->

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