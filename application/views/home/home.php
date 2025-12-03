<?php
$date = date("Y-m-d");
$pop_voucher_text = $this->db->get_where('static_content', array('type' => 'popular voucherrs in home page'))->row()->title;
$Latest_text = $this->db->get_where('static_content', array('type' => 'Latest Coupons on home'))->row()->title;
$Trending_text = $this->db->get_where('static_content', array('type' => 'trending Coupons on home'))->row()->title;
$Tips_text = $this->db->get_where('static_content', array('type' => 'tips from editor home'))->row()->title;
$lastest_copuon_section_flag = $this->db->get_where('system_settings', array('type' => 'lastest_copuon_section_flag'))->row()->description;
$trending_copuon_section_flag = $this->db->get_where('system_settings', array('type' => 'trending_copuon_section_flag'))->row()->description;
$tips_copuon_section_flag = $this->db->get_where('system_settings', array('type' => 'tips_copuon_section_flag'))->row()->description;
$static_top_left = $this->db->get_where('static_content', array('type' => 'before_slider_top_left'))->row();
$static_top_center = $this->db->get_where('static_content', array('type' => 'before_slider_top_center'))->row();
$static_top_right = $this->db->get_where('static_content', array('type' => 'before_slider_top_right'))->row();
$static_upload_url = $this->db->get_where('system_settings', array('type' => 'static_content_img_url'))->row()->description;
?>
<!-- ======= Hero Section ======= -->
<style>
  /* Desktop suggestion box */
  #show_suggestion .src_box {
    position: absolute;
    /* Just below the input */
    display: grid;
    /* Grid layout for suggestions */
    width: calc(100% - 220px);
    /* Adjust width relative to input/container */
    padding: 13px;
    top: 100%;
    /* Directly below input */
    left: 140px;
    /* Align with input */
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
    max-height: 420px;
    /* Scrollable if too tall */
    overflow-y: auto;
    z-index: 9999;
    background: #fff;
    margin: 0;
    /* Reset margin */
    border-radius: 6px;
    /* Optional: smooth corners */
  }

  /* Mobile suggestion box */
  @media (max-width: 768px) {
    #show_suggestion .src_box {
      width: 100%;
      /* Full width on small screens */
      left: 0;
      /* Align with input */
      padding: 10px;
      /* Optional: smaller padding */
      max-height: 300px;
      /* Slightly smaller for mobile */
    }
  }

  .ribbon-btn {
    border-radius: 0 30px 30px 0;
    /* curved on right side */
    position: relative;
  }

  .ribbon-btn::after {
    content: '';
    position: absolute;
    top: 0;
    right: -10px;
    /* adjust for ribbon point */
    width: 20px;
    height: 100%;
    background: inherit;
    clip-path: polygon(0 0, 100% 50%, 0 100%);
    /* triangle on right */
  }
</style>
<section id="hero" class="hero p-4"
  style="background-color:#F9F9F9; background-size:cover; background-position:center;">
  <div class="d-flex align-items-center text-center" style="padding:70px 0 50px;">
    <div class="container">
      <div class="row justify-content-center gy-4">

        <!-- Heading -->
        <div class="col-lg-10">
          <h2 class="text-dark mb-3"
            style="font-size:1.9rem; font-weight:600; letter-spacing:0.3px; line-height:1.4; word-wrap:break-word; overflow-wrap:break-word;">
            Versandkostenfrei einkaufen leicht gemacht – Aktuelle Gratis-Versand-Codes für deine Lieblingsshops!
          </h2>
        </div>

        <!-- Search Bar -->
        <div class="col-lg-8 show-and-hide">
          <div class="js-searchblock">
            <form name="search" method="get" action="home/search" id="search_form" class="w-100"
              style="max-width:650px; margin:auto; background:unset;">
              <div class="input-group shadow-sm"
                style="border-radius:50px; overflow:hidden; background-color:#fff; border:1px solid #e0e0e0;">

                <!-- Left button: Suchen -->
                <button type="submit" id="basic-addon1" class="input-group-text fw-semibold text-white px-4"
                  style="background-color:#5C8374; border:none; border-radius:50px 0 0 50px; font-size:0.95rem;">
                  Suchen
                </button>

                <!-- Input -->
                <input name="search_str" id="inp3" data-suggestion-id="show_suggestion"
                  value="<?php if (!empty($search_query))
                    echo $search_query ?>" autocomplete="off"
                    data-input-name="desktop-search" type="text"
                    class="form-control header-search cs-field-search search_str your-class"
                    placeholder="Suche nach deinem Lieblingsshop...">

                  <!-- Right icon -->
                  <span class="input-group-text fw-semibold" style="border:none; border-radius:0 50px 50px 0;">
                    <i class="fa-solid fa-search text-white fs-5"></i>
                  </span>
                </div>
              </form>

              <!-- dropdown suggestion -->
              <div id="show_suggestion" style="position:relative;"></div>
            </div>
          </div>

          <!-- Description -->
          <div class="col-lg-8">
            <p class="text-dark mt-4 mb-0" style="font-size:1.05rem; line-height:1.6; color:#333;">
              Alle Gutscheine und Rabatte für deine Lieblingsshops – über
              <span style="color:#5C8374; font-weight:600;">5.000 kostenlos</span> ✓
              Von Hand geprüft ✓ Weltweit über
              <span style="color:#5C8374; font-weight:600;">150 Mio. Euro gespart!</span>
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <main id="cs-main">

    <div class="cs-main-content">

      <section class="cs-home-tabs-content home-section pb-4" style="padding:15px; background:#fff;">
        <div class="container width-full px-2">

          <!-- Swiper Container -->
          <div class="swiper mySwiper" style="padding:20px 0;">
            <div class="swiper-wrapper">
              <?php
                  $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;
                  $popular_quantity = $this->db->get_where('system_settings', array('type' => 'top_section_brands_limit'))->row()->description;
                  $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit($popular_quantity)
                    ->get_where('brands', array('status' => 'Active', 'popular_shop' => '1'))->result_array();

                  foreach ($get_all_brands as $fetch_data) {
                    $brand_image = $fetch_data['brand_image'];
                    $brand_name = $fetch_data['name'];
                    $brand_name_new = str_replace(' ', '-', $brand_name);
                    ?>
              <div class="swiper-slide" style="width:auto; padding:5px;">
                <a href="<?php echo base_url() . 'marken/' . $brand_name_new; ?>" target="_blank"
                  style="text-decoration:none;">
                  <div
                    style="background:#fff; border-radius:20px; padding:15px; display:flex; flex-direction:column; align-items:center; justify-content:flex-start; width:150px; box-shadow:0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)';">
                    <!-- Logo -->
                    <div
                      style="width:100%; height:100px; display:flex; align-items:center; justify-content:center; margin-bottom:8px;">
                      <img src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                        alt="<?php echo $brand_name; ?>"
                        style="max-height:100px; max-width:100px; object-fit:contain; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.2)';" onmouseout="this.style.transform='scale(1)';">
                    </div>
                    <!-- Brand Name -->
                    <div style="font-size:14px; font-weight:bold; color:#333; text-align:center;">
                      <?php echo $brand_name; ?>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- New popular coupons section -->
    <section class="cs-home-selection cs-home-tabs-content" style="padding: 25px 0 !important">
      <div class="container width-full">
        <center>
          <h4 class="cs-home-h-mine rem" style="margin-bottom: 20px;"><?php echo $pop_voucher_text; ?></h4>
        </center>

        <div class="main_coupon_div"
          style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
          <?php
          $home_page_popular_coupon_limit = $this->db->get_where('system_settings', array('type' => 'home_page_popular_coupon_limit'))->row()->description;
          $get_coupons = $this->db->query("
                SELECT cpn.*, brand.name as brand_name, brand.brand_image as brand_image
                FROM coupons as cpn
                LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
                WHERE cpn.status='Active' AND cpn.popular_set='1' AND cpn.start_date <= '" . date('Y-m-d') . "' AND (cpn.end_date >= '" . $date . "' OR cpn.end_date='0000-00-00')
                ORDER BY cpn.date_added DESC LIMIT $home_page_popular_coupon_limit
            ")->result_array();

          $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;

          if (!empty($get_coupons)) {
            foreach ($get_coupons as $fetch_data) {
              $brand_image = $fetch_data['brand_image'];
              $brand_name = $fetch_data['brand_name'];
              $short_tagline = $fetch_data['short_tagline'];
              $discount_type = $fetch_data['discount_type'];
              $discount_value = $fetch_data['discount_value'];
              $coupons_id = $fetch_data['coupons_id'];
              $coupon_code = $fetch_data['coupon_code'];
              $brand_name_new = str_replace(' ', '-', $brand_name);

              $discount_type_sign = ($discount_type == 'Fixed') ? '&euro;' : (($discount_type == 'Percentage') ? '%' : '');
              ?>

              <div class="coupon_box_div p-3 border rounded d-flex flex-column"
                style="background:#fff; box-shadow:0 3px 8px rgba(0,0,0,0.12); border-left:4px solid #5c8374; transition: transform 0.3s;">

                <!-- Discount label -->
                <div style="text-align:left; font-size:12px; font-weight:bold; color:#5c8374; margin-bottom:6px;">
                  <span class="main_rabet"> <?php echo strtoupper($discount_value) . $discount_type_sign; ?> </span>
                </div>

                <!-- Text + Logo Row -->
                <div class="d-flex align-items-center mb-3" style="gap:10px;">
                  <div style="flex:70%; text-align:left;">
                    <div class="cpn_small_desc" style="font-size:13px; color:#333; font-weight:500;">
                      <?php echo $short_tagline;
                      if ($fetch_data['end_date'] != "0000-00-00" && $fetch_data['end_date'] != "") { ?>
                        <div style="font-size:11px; margin-top:3px; color:#888;">
                          <i class="fa fa-clock-o"></i> Läuft ab:
                          <?php echo date('m/d/Y', strtotime($fetch_data['end_date'])); ?>
                        </div>
                      <?php } ?>
                    </div>
                  </div>

                  <div
                    style="flex:30%; text-align:right; background:#fff; border-radius:10px; padding:5px; display:flex; justify-content:center; align-items:center; box-shadow:0 1px 4px rgba(0,0,0,0.1);">
                    <img src="<?php echo base_url() . $brand_img_url . $brand_image; ?>" alt="<?php echo $brand_name; ?>"
                      style="height:50px; width:auto;">
                  </div>
                </div>

                <!-- View Button -->
                <div class="mt-2">
                  <a href="<?php echo base_url() . 'marken/' . $brand_name_new . '?coupon_id=' . $coupons_id; ?>" target="_blank"
                    onclick="window.open(this.href); return false;"
                    class="btn btn-sm text-left <?php echo !empty($coupon_code) ? 'ribbon-btn' : ''; ?>"
                    style="background: linear-gradient(90deg, #5c8374, #5c8374); color:#fff; padding:5px 12px; font-weight:500; box-shadow:0 2px 4px rgba(0,0,0,0.15); transition: all 0.3s;">
                    <i class="fa fa-euro"></i> Gutschein anzeigen
                  </a>
                </div>


                <!-- SHOW COUPON CODE ON HOVER -->
                <?php if (!empty($coupon_code)) { ?>
                  <div class="hover-code mt-2" style="display:none; font-size:13px; font-weight:600; color:#5c8374;">
                    <?php echo $coupon_code; ?>
                  </div>
                <?php } ?>

                <?php if (isset($fetch_data['special_text']) && $fetch_data['special_text'] != '') { ?>
                  <div class="best_title_f mt-2" style="font-size:12px; color:#5c8374;">
                    <?php echo $fetch_data['special_text']; ?></div>
                <?php } ?>
              </div>

            <?php }
          } ?>
        </div>

        <!-- Popular Button -->
        <div
          class="mt-4 coupon_box_div p-3 border rounded d-flex flex-column justify-content-center align-items-center text-center bg-white shadow-sm border-start border-4"
          style="border-color:#5c8374; transition: transform 0.3s;">
          <a href="<?php echo base_url() . 'neueste-Rabattcodes'; ?>" class="text-decoration-none">
            <button class="btn text-white fw-semibold px-4 py-2 shadow-sm"
              style="background: linear-gradient(90deg, #5c8374, #5c8374); border:none; border-radius:8px; transition: all 0.3s ease; font-size:14px;">
              <i class="fa fa-gift me-2"></i> Weitere beliebte Gutscheine anzeigen
            </button>
          </a>
        </div>

      </div>
    </section>

    <!-- Add this CSS -->
    <style>
      .coupon_box_div:hover .hover-code {
        display: block !important;
      }
    </style>

    <!-- New popular coupons section -->

    <!-- Newsletter -->
    <?php
    $static_newsletter = $this->db->get_where('static_content', array('type' => 'newsletter'))->row();
    $newsletter_title = $static_newsletter->title;
    $newsletter_desc = $static_newsletter->description;
    $newsletter_img = $static_newsletter->image;
    $system_name = $this->db->get_where('system_settings', array('type' => 'system_name'))->row()->description;
    $miss_coupon = $this->db->get_where('static_content', array('type' => 'Newsletter title on home'))->row()->title;
    ?>
    <section class="cs-home-selection cs-home-selection-text" style=" padding-bottom: 0px !important;">
      <div class="container px-2">
        <div class="row mx-2">
          <div class="col-12 bg-white px-4 py-3 rounded-10px shadow-sp">
            <div class="cs-home-newsletter" style="margin-bottom:10px;">
              <h2 class="cs-home-h rem" style="font-size:18px; font-weight:600; margin-bottom:8px;">
                <?php echo $miss_coupon; ?>
              </h2>

              <div class="cs-infobox-inner row align-items-center" style="margin:0;">
                <div class="col-md-12 col-sm-12" style="padding-left:8px;padding-right:8px;">
                  <h3 class="paragraph-home"
                    style="padding:5px 10px !important;font-size:14px;font-weight:400;line-height:1.4;margin:0;">
                    <?php echo $newsletter_desc; ?>
                  </h3>
                </div>
              </div>
            </div>

            <div class="cs-home-newsletter">
              <div class="cs-home-newsletter-form col-md-12 col-sm-12" style="width: 100%;">
                <div class="col-md-6 col-sm-6">
                  <p style="margin-bottom: 7px; font-size:16px;" class="padding-le">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Hier knnen Sie den <?php echo $system_name ?></font>
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
                        <?php $get_page_id = $this->db->get_where('page_types', array('page_name' => 'Home'))->row()->page_types_id; ?>
                        <label class="hidden">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">deine Emailadresse</font>
                          </font>
                        </label>
                        <input id="page_type" value="<?php echo $get_page_id ?>" type="hidden">
                        <input id="optin-email" name="subscribe" type="email" placeholder="deine Emailadresse"
                          class="cs-newsletter-home-input subscribe_input">
                        <button type="button" id="subscribe"
                          class="js-newsletter-checkbox cs-newsletter-btn btn cs-flat-btn-grey cs-transition-fast subscribe_btn-mine btn-ww">
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
                        <input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy" type="checkbox"
                          name="" value="">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">&nbsp;&nbsp;&nbsp;*Ich habe die </font>
                        </font>
                        <a href="<?php echo base_url() . 'datenschutz' ?>">
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
                          <font style="vertical-align: inherit;">Ja, ich möchte einen auf meine Interessen
                            zugeschnittenen individuellen Newsletter erhalten, damit ich keine persnlichen Coupons und
                            Aktionen mehr verpasse. Ich stimme der Analyse meiner Klicks und Öffnungsverhalten zu.
                            Detaillierte Informationen finden Sie in unserer Datenschutzerklrung. Diese Einwilligung
                            kann ich gemß der Erklärung jederzeit widerrufen.</font>
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
        </div>
      </div>
    </section>

    <section class="cs-home-tabs-content home-section pb-0">
      <div class="container width-full px-2">
        <div class="row mx-0">
          <h1 class="cs-home-h-mine rem col-12 px-0 mx-2 mb-4" style="font-size:1.5rem;">Beliebte Marken---</h1>

          <div class="row g-3">
            <?php
            $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;
            $popular_quantity = $this->db->get_where('system_settings', array('type' => 'top_section_brands_limit'))->row()->description;
            $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit($popular_quantity)->get_where('brands', array('status' => 'Active', 'popular_shop' => '1'))->result_array();

            foreach ($get_all_brands as $fetch_data) {
              $brand_image = $fetch_data['brand_image'];
              $brand_name = $fetch_data['name'];
              $brand_name_new = str_replace(' ', '-', $brand_name);
              ?>
              <div class="col-6 col-sm-4 col-md-2 p-2 d-flex">
                <a href="<?php echo base_url() . 'marken/' . $brand_name_new; ?>" target="_blank"
                  style="text-decoration:none; width:100%;">
                  <div
                    style="background:#fff; border-radius:20px; padding:15px; display:flex; flex-direction:column; align-items:center; justify-content:flex-start; width:100%; box-shadow:0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)';">
                    <!-- Logo -->
                    <div
                      style="width:100%; height:100px; display:flex; align-items:center; justify-content:center; margin-bottom:8px;">
                      <img src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                        alt="<?php echo $brand_name; ?>"
                        style="max-height:100px; max-width:100px; object-fit:contain; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.2)';" onmouseout="this.style.transform='scale(1)';">
                    </div>
                    <!-- Brand Name -->
                    <div style="font-size:14px; font-weight:bold; color:#333; text-align:center;">
                      <?php echo $brand_name; ?>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Table of 3 side by side for the newest, exclusive ... -->
    <?php
    $get_latest_coupons = $this->db->query("
					select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
					from coupons as cpn 
					left join brands as brand ON cpn.brands_id = brand.brands_id
					where cpn.status = 'Active'  AND lastest_order!='' AND lastest_order!='0' AND cpn.start_date <= '" . date('Y-m-d') . "' AND cpn.end_date >= '" . $date . "' ORDER BY cpn.lastest_order ASC LIMIT 8
				")->result_array();
    $get_trending_coupons = $this->db->query("
				select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
				from coupons as cpn 
				left join brands as brand ON cpn.brands_id = brand.brands_id
				where cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order!='0' AND cpn.start_date <= '" . date('Y-m-d') . "' AND cpn.end_date >= '" . $date . "' ORDER BY cpn.trending_order  ASC LIMIT 8
			")->result_array();
    $get_tip_coupons = $this->db->query("
				select cpn.* , brand.name as brand_name, brand.brand_image as brand_image
				from coupons as cpn 
				left join brands as brand ON cpn.brands_id = brand.brands_id
				where 
				cpn.status = 'Active' AND cpn.tips = '1'
				 AND tips_order!='' AND cpn.start_date <= '" . date('Y-m-d') . "' AND cpn.end_date >= '" . $date . "' AND tips_order!='0'
				ORDER BY cpn.tips_order  ASC LIMIT 8
			")->result_array();
    $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;
    ?>
    <section class="cs-home-selection cs-home-table no_pad_top p-0" style="padding-: 15px 0!Important">
      <div class="container">
        <div class="cs-home-table-wrap cs-flex">
          <?php
          if ($lastest_copuon_section_flag == 1) {
            ?>
            <div class="cs-home-table-item">
              <h2 class="coupon_h2">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><?php echo $Latest_text; ?></font>
                </font>
              </h2>
              <!-- Small List Coupon -->
              <?php
              foreach ($get_latest_coupons as $fetch_data) {
                $brand_image = $fetch_data['brand_image'];
                $brand_name = $fetch_data['brand_name'];
                $brand_id = $fetch_data['brands_id'];
                $short_tagline = $fetch_data['short_tagline'];
                $cpn_desc = $fetch_data['description'];
                $discount_type = $fetch_data['discount_type'];
                $discount_value = $fetch_data['discount_value'];
                $coupon_code = $fetch_data['coupon_code'];
                $coupons_id = $fetch_data['coupons_id'];
                $publish_date = $fetch_data['date_added'];
                $lastest_order = $fetch_data['lastest_order'];

                $get_brand_total_codes = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '" . date('Y-m-d') . "' AND (end_date >= '" . $date . "' OR end_date = '0000-00-00') AND brands_id = '" . $brand_id . "' ")->num_rows();

                if ($discount_type == 'Fixed') {
                  $discount_type_sign = '&euro;';
                } else if ($discount_type == 'Percentage') {
                  $discount_type_sign = '%';
                } else {
                  $discount_type_sign = '';
                }
                $date_1 = $fetch_data['date_added'];
                $date_2 = date('Y-m-d H:i:s');
                $datetime1 = date_create($date_1);
                $datetime2 = date_create($date_2);
                $interval = date_diff($datetime1, $datetime2);
                if ($lastest_order != 0 AND $lastest_order != "") {
                  $brand_name_new = "";
                  $brand_name_array = explode(" ", $fetch_data['brand_name']);
                  if (count($brand_name_array) > 0) {
                    $brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
                  }
                  ?>
                  <div class="cs-coupon-small-list" style="margin-bottom:20px;">
                    <a class="cs-coupon-small-list-outer row"
                      href="<?php echo base_url() . 'marken/' . $brand_name_new . '?coupons_id=' . $coupons['coupons_id']; ?>"
                      title="<?php echo $short_tagline ?>">
                      <!-- img small online -->
                      <div class="cs-coupon-small-list-logo" style="">
                        <img style=" padding-right: 10px;" class="4-- lazyloaded"
                          src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                          data-src="<?php echo base_url() . $brand_img_url . $brand_image; ?>" alt="<?php echo $brand_name ?>">
                      </div>
                      <div class="cs-coupon-small-list-desc latest_cpn_desc">
                        <span class="cs-home-table-label-short ">
                          <font style="vertical-align: inherit;">
                            <?php
                            if ($discount_type == 'Custom') {
                              ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?></font>
                              <?php
                            } else {
                              ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?> Rabatt</font>
                              <?php
                            }
                            ?>
                          </font>
                        </span>
                        <br>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">
                            <?php echo $brand_name . ' (' . $get_brand_total_codes . ' Gutschein) ' ?>
                          </font>
                        </font>
                        <?php
                        $published_date = strtotime($publish_date);
                        $current_date = strtotime(date('Y-m-d h:i:s'));
                        $days = abs(($current_date - $published_date) / 86400);
                        $hours = abs(($days) * 24);
                        $minuts = abs(($days) * 24 * 60);
                        $second = abs(($days) * 24 * 60 * 60);

                        if ($days < 1) {
                          $show_time = floor($hours) . " h";
                          if ($hours < 1) {
                            $show_time = floor($minuts) . " m";
                            if ($minuts < 1) {
                              $show_time = floor($second) . " s";
                            }
                          }
                        } else {
                          $show_time = floor($days) . " d";
                        }
                        ?>
                        <font class="small_coupon_meta"> Veröffentlichen <?php echo $show_time; ?> ago </font>
                      </div>
                    </a>
                  </div>
                  <!-- Small List Coupon -->
                <?php }
              } ?>
              <a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home"
                href="<?php echo base_url() . 'home/coupons/latest/' ?>">
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
          if ($trending_copuon_section_flag == 1) {
            ?>
            <div class="cs-home-table-item">
              <h2 class="coupon_h2">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><?php echo $Trending_text ?></font>
                </font>
              </h2>
              <?php

              foreach ($get_trending_coupons as $fetch_data) {
                $brand_image = $fetch_data['brand_image'];
                $brand_name = $fetch_data['brand_name'];
                $brand_id = $fetch_data['brands_id'];
                $short_tagline = $fetch_data['short_tagline'];
                $cpn_desc = $fetch_data['description'];
                $discount_type = $fetch_data['discount_type'];
                $discount_value = $fetch_data['discount_value'];
                $coupon_code = $fetch_data['coupon_code'];
                $coupons_id = $fetch_data['coupons_id'];
                $trending_order = $fetch_data['trending_order'];

                $get_brand_total_codes = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '" . date('Y-m-d') . "' AND (end_date >= '" . $date . "' OR end_date = '0000-00-00') AND brands_id = '" . $brand_id . "' ")->num_rows();

                if ($discount_type == 'Fixed') {
                  $discount_type_sign = '&euro;';
                } else if ($discount_type == 'Percentage') {
                  $discount_type_sign = '%';
                } else {
                  $discount_type_sign = '';
                }

                if ($trending_order != 0 AND $trending_order != "") {
                  $brand_name_new = "";
                  $brand_name_array = explode(" ", $fetch_data['brand_name']);
                  if (count($brand_name_array) > 0) {
                    $brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
                  }
                  ?>
                  <div class="cs-coupon-small-list" style="margin-bottom:20px;">
                    <a class="cs-coupon-small-list-outer row"
                      href="<?php echo base_url() . 'marken/' . $brand_name_new . '?coupons_id=' . $coupons['coupons_id']; ?>"
                      title="<?php echo $short_tagline ?>">
                      <!-- img small online -->
                      <div class="cs-coupon-small-list-logo">
                        <img style=" padding-right: 10px;" class="4-- lazyloaded"
                          src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                          data-src="<?php echo base_url() . $brand_img_url . $brand_image; ?>" alt="<?php echo $brand_name ?>">
                      </div>
                      <div class="cs-coupon-small-list-desc trend_cpn_desc">
                        <span class="cs-home-table-label-short">
                          <font style="vertical-align: inherit;">
                            <?php
                            if ($discount_type == 'Custom') {
                              ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?></font>
                            <?php } else { ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?> Rabatt</font>
                            <?php } ?>
                          </font>
                        </span><br>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">
                            <?php echo $brand_name . ' (' . $get_brand_total_codes . ' Gutschein) ' ?>
                          </font>
                        </font>
                      </div>
                    </a>
                  </div>
                  <!-- Small List Coupon -->
                <?php }
              } ?>
              <a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home"
                href="<?php echo base_url() . 'home/coupons/trending'; ?>">
                <font style="vertical-align: inherit;font-size:14px">
                  <font style="vertical-align: inherit;">Weitere Trendige Gutscheine </font>
                </font>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              </a>
            </div>
            <?php
          }
          ?>
          <?php
          if ($tips_copuon_section_flag == 1) {
            ?>
            <div class="cs-home-table-item">
              <h2 class="coupon_h2">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><?php echo $Tips_text ?></font>
                </font>
              </h2>
              <?php
              foreach ($get_tip_coupons as $fetch_data) {
                $brand_image = $fetch_data['brand_image'];
                $brand_name = $fetch_data['brand_name'];
                $brand_id = $fetch_data['brands_id'];
                $short_tagline = $fetch_data['short_tagline'];
                $cpn_desc = $fetch_data['description'];
                $discount_type = $fetch_data['discount_type'];
                $discount_value = $fetch_data['discount_value'];
                $coupon_code = $fetch_data['coupon_code'];
                $coupons_id = $fetch_data['coupons_id'];
                $tips_order = $fetch_data['tips_order'];

                $get_brand_total_codes = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '" . date('Y-m-d') . "' AND (end_date >= '" . $date . "' OR end_date = '0000-00-00') AND brands_id = '" . $brand_id . "' ")->num_rows();

                if ($discount_type == 'Fixed') {
                  $discount_type_sign = '&euro;';
                } else if ($discount_type == 'Percentage') {
                  $discount_type_sign = '%';
                } else {
                  $discount_type_sign = '';
                }
                if ($tips_order != 0 AND $tips_order != "") {
                  $brand_name_new = "";
                  $brand_name_array = explode(" ", $fetch_data['brand_name']);
                  if (count($brand_name_array) > 0) {
                    $brand_name_new = str_replace(' ', '-', $fetch_data['brand_name']);
                  }
                  ?>
                  <div class="cs-coupon-small-list" style="margin-bottom:20px;">
                    <a class="cs-coupon-small-list-outer row"
                      href="<?php echo base_url() . 'marken/' . $brand_name_new . '?coupons_id=' . $coupons['coupons_id']; ?>"
                      title="<?php echo $short_tagline ?>">
                      <div class="cs-coupon-small-list-logo">
                        <img style=" padding-right: 10px;" class="6-- lazyloaded"
                          src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                          data-src="<?php echo base_url() . $brand_img_url . $brand_image; ?>" alt="<?php echo $brand_name ?>">
                      </div>
                      <div class="cs-coupon-small-list-desc tip_cpn_desc">
                        <span class="cs-home-table-label-short">
                          <font style="vertical-align: inherit;">
                            <?php
                            if ($discount_type == 'Custom') {
                              ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?></font>
                              <?php
                            } else {
                              ?>
                              <font class="orange_font_color" style="vertical-align: inherit;">
                                <?php echo $discount_value . $discount_type_sign ?> Rabatt</font>
                              <?php
                            }
                            ?>
                          </font>
                        </span><br>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">
                            <?php echo $brand_name . ' (' . $get_brand_total_codes . ' Gutschein) ' ?>
                          </font>
                        </font>
                      </div>
                    </a>
                  </div>
                  <!-- Small List Coupon -->
                <?php }
              } ?>
              <a class="cs-home-table-link cs-home-table-link2 more_coupon_btn bt-home"
                href="<?php echo base_url() . 'home/coupons/tips' ?>">
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

      $count_total_vouchers = $this->db->get_where('coupons', array('status' => 'Active'))->num_rows();
      $count_total_brands = $this->db->get_where('brands', array('status' => 'Active'))->num_rows();
      ?>
    </section>

    <?php
    $static_about_us = $this->db->get_where('static_content', array('type' => 'about_us'))->row();
    $about_title = $static_about_us->title;
    $about_desc = $static_about_us->description;
    $about_img = $static_about_us->image;
    $static_upload_url = $this->db->get_where('system_settings', array('type' => 'static_content_img_url'))->row()->description;
    ?>
    <!-- Categories -->
    <?php
    $get_categories = $this->db->order_by('section_sort_order', 'ASC')->limit(16)->get_where('categories', array('status' => 'Active'))->result_array();
    $cat_img_url = $this->db->get_where('system_settings', array('type' => 'cat_img_url'))->row()->description;
    $cat_img1 = base_url() . $cat_img_url . $get_categories[0]['cat_image'];
    $cat_img2 = base_url() . $cat_img_url . $get_categories[1]['cat_image'];
    $cat_img3 = base_url() . $cat_img_url . $get_categories[2]['cat_image'];
    $cat_img4 = base_url() . $cat_img_url . $get_categories[3]['cat_image'];

    $pop_categories_text = $this->db->get_where('static_content', array('type' => 'Popular categories home'))->row()->title;
    ?>
    <section class="cs-home-selection- cs-home-cats- py-0 my-0" style="padding-:15px">
      <div class="container">
      </div>
    </section>

    <!--Categories Part-->
    <section class="cs-home-selection cs-home-cats" style="padding:30px 0; background:#fafafa;">
      <div class="container" style="max-width:1200px; margin:0 auto;">
        <h3 class="cs-home-h" style="font-size:22px; font-weight:700; color:#333; text-align:left; margin-bottom:20px;">
          Unsere beliebtesten Kategorien
        </h3>

        <div class="row" style="display:flex; flex-wrap:wrap; margin-left:-10px; margin-right:-10px;">
          <?php
          $cat_icon_url = $this->db->get_where('system_settings', array('type' => 'cat_icon_url'))->row()->description;
          foreach ($get_categories as $fetch_data) {
            $cat_id = $fetch_data['categories_id'];
            $cat_name = $fetch_data['name'];
            $font_icon = $fetch_data['font_icon'];
            ?>
            <div class="col" style="flex:0 0 calc(25% - 20px); box-sizing:border-box; margin:10px; min-width:220px;">
              <a href="<?php echo base_url() . 'kategorien/' . $cat_id; ?>"
                title="Entdecke alle <?php echo $cat_name; ?> Gutscheine"
                style="display:flex; align-items:center; background:#fff; border-radius:8px; padding:10px 14px; box-shadow:0 1px 4px rgba(0,0,0,0.08); text-decoration:none; color:#333; font-size:13.5px; font-weight:500; transition:all 0.3s ease; height:56px;"
                onmouseover="this.style.background='#5c8374'; this.style.color='#fff'; this.style.boxShadow='0 3px 10px rgba(0,0,0,0.15)'; if(this.querySelector('i')) this.querySelector('i').style.color='#fff';"
                onmouseout="this.style.background='#fff'; this.style.color='#333'; this.style.boxShadow='0 1px 4px rgba(0,0,0,0.08)'; if(this.querySelector('i')) this.querySelector('i').style.color='#5c8374';">

                <span
                  style="margin-right:10px; display:flex; align-items:center; justify-content:center; min-width:22px;">
                  <?php if (strpos($font_icon, 'fa-') !== false) { ?>
                    <i class="fa <?php echo $font_icon; ?>" aria-hidden="true" style="font-size:16px; color:#5c8374;"></i>
                  <?php } else { ?>
                    <img src="<?php echo base_url() . $cat_icon_url . $font_icon; ?>" alt="<?php echo $cat_name; ?>"
                      style="width:20px; height:20px; object-fit:contain;">
                  <?php } ?>
                </span>

                <span style="font-size:13.5px; line-height:1.3; color:inherit; flex:1;"><?php echo $cat_name; ?></span>
              </a>
            </div>
          <?php } ?>
        </div>

        <div style="text-align:center; margin-top:30px;">
          <a href="<?php echo base_url() . 'kategorien'; ?>"
            style="display:inline-block; border:2px solid #5c8374; color:#5c8374; background:transparent; border-radius:8px; padding:8px 20px; font-weight:600; text-decoration:none; font-size:14px; transition:all 0.3s ease;"
            onmouseover="this.style.background='linear-gradient(90deg, #5c8374, #5c8374)'; this.style.color='#fff';"
            onmouseout="this.style.background='transparent'; this.style.color='#5c8374';">
            Alle Kategorien von A–Z
            <i class="fa fa-angle-double-right" aria-hidden="true" style="margin-left:6px; font-size:13px;"></i>
          </a>
        </div>
      </div>
    </section>

    <section class="cs-home-selection cs-home-mer-box" style="padding:15px; background:#f9f9f9;">
      <div class="container px-0">
        <!-- Section Heading -->
        <div class="row mb-3">
          <div class="col-12">
            <h2 style="font-size:1.5rem; font-weight:700; color:#333; margin-bottom:15px;">Beliebte Marken</h2>
          </div>
        </div>

        <!-- Popular Brands List -->
        <div class="row gx-3" style="row-gap:8px;">
          <?php
          $popular_quantity = $this->db->get_where('system_settings', array('type' => 'popular_brands_limit'))->row()->description;
          $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit($popular_quantity)
            ->get_where('brands', array('status' => 'Active', 'popular_shop' => '1'))->result_array();

          foreach ($get_all_brands as $index => $fetch_data) {
            if ($index > 14) {
              $brand_image = $fetch_data['brand_image'];
              $brand_name = $fetch_data['name'];
              $brand_name_new = str_replace(' ', '-', $brand_name);
              ?>
              <a href="<?php echo base_url() . 'marken/' . $brand_name_new; ?>"
                class="col-12 col-sm-6 col-md-4 text-decoration-none" style="display:block;">
                <div class="brand-card d-flex justify-content-between align-items-center p-3 bg-white rounded-15 shadow-sm"
                  style="transition: all 0.3s ease; cursor:pointer;">
                  <div style="font-weight:600; font-size:1rem; color:#333;"><?php echo $brand_name; ?> Rabattcode</div>
                  <div style="font-size:1.3rem; color:#5c8374;">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </div>
                </div>
              </a>
            <?php }
          } ?>
        </div>
      </div>
    </section>

    <section style="background:linear-gradient(135deg,#f8f9fa,#eef1f3); padding:60px 0;">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-12" style="max-width:1100px;background:white;padding:30px;">

            <!-- Heading -->
            <h2 style="text-align:center; font-weight:700; color:#333; margin-bottom:20px;">
              Willkommen bei Gratis Versand für deine Lieblingsshops – Jeden Tag neu!!
            </h2>

            <p style="font-size:17px; color:#555; line-height:1.7; text-align:center;">
              Willkommen bei <strong>Versandkostenfrei.promo</strong> – deiner ersten Anlaufstelle für exklusive
              Gratis-Versand-Aktionen und Rabatte bei Top-Online-Shops in Deutschland.
              Egal ob Mode, Elektronik, Beauty oder Haushaltswaren – wir zeigen dir täglich aktuelle Angebote, mit denen
              du dir die Versandkosten sparst und dabei zusätzlich bares Geld sichern kannst.
            </p>

            <h4 style="margin-top:30px; font-weight:600; color:#333;">Warum Versandkostenfrei.promo?</h4>
            <ul style="color:#555; line-height:1.7;">
              <li>Täglich aktualisiert – immer die neuesten Aktionen</li>
              <li>Große Shop-Auswahl – von bekannten Marken bis zu Geheimtipps</li>
              <li>Einfache Anwendung – keine komplizierten Registrierungen, einfach sparen</li>
            </ul>

            <h4 style="margin-top:30px; font-weight:600; color:#333;">So funktionierts:</h4>
            <ol style="color:#555; line-height:1.7;">
              <li><strong>Shop wählen</strong> – Finde deinen Lieblingsshop in unserer Liste</li>
              <li><strong>Code sichern</strong> – Falls nötig, Rabattcode kopieren</li>
              <li><strong>Sparen</strong> – Code im Warenkorb einfügen oder automatisch anwenden lassen</li>
            </ol>

            <p style="font-style:italic; color:#666; margin-top:10px;">
              Tipp: Viele Shops bieten kostenlosen Versand schon ab einem Mindestbestellwert – wir zeigen dir alle
              Details!
            </p>

            <!-- FAQ Section -->
            <h3 style="margin-top:60px; margin-bottom:25px; font-weight:700; color:#333; text-align:center;">
              Häufige Fragen (FAQ)
            </h3>

            <div id="faqContainer"
              style="background-color:white; border-radius:10px; padding:20px; box-shadow:0 2px 6px rgba(0,0,0,0.05);">

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px; transition:0.3s;">
                  Was bietet Versandkostenfrei.promo?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Versandkostenfrei.promo sammelt täglich aktuelle Gratis-Versand-Aktionen und Rabattcodes von beliebten
                  Online-Shops in Deutschland, damit du beim Einkaufen Versandkosten sparen kannst.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Wie funktioniert Versandkostenfrei.promo?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Du suchst deinen Lieblingsshop auf der Website, kopierst den passenden Gratis-Versand-Code und wirst
                  direkt zum Online-Shop weitergeleitet, um den Vorteil zu nutzen.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Ist Versandkostenfrei.promo kostenlos?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Ja, die Nutzung ist komplett kostenlos. Du kannst alle Angebote und Versandaktionen ohne Anmeldung
                  oder versteckte Gebühren nutzen.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Wie oft werden neue Gratis-Versand-Angebote hinzugefügt?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Täglich! Unser Team aktualisiert alle Aktionen regelmäßig, damit du immer die neuesten kostenlosen
                  Versanddeals findest.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Kann ich Gratis-Versand mit anderen Rabattcodes kombinieren?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  In vielen Fällen ja. Es hängt vom jeweiligen Shop ab, ob Gratis-Versand mit zusätzlichen Rabatten
                  kombiniert werden kann.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Sind alle Angebote auf Versandkostenfrei.promo gltig?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Wir prüfen und aktualisieren unsere Angebote regelmäßig, um sicherzustellen, dass nur gültige Aktionen
                  aufgelistet sind.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Gibt es auch internationale Gratis-Versandaktionen?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Der Schwerpunkt liegt auf deutschen Shops, aber manchmal findest du auch internationale Aktionen, die
                  nach Deutschland liefern.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Brauche ich ein Benutzerkonto, um Angebote zu nutzen?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Nein, du kannst direkt auf die gewünschten Shops klicken und die Gratis-Versand-Aktion sofort nutzen –
                  ohne Registrierung.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Wie kann ich ein nicht funktionierendes Angebot melden?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Sollte ein Code nicht mehr gültig sein, kannst du uns einfach über das Kontaktformular auf der Website
                  informieren.
                </div>
              </div>

              <div style="margin-bottom:10px;">
                <div class="faq-question"
                  style="cursor:pointer; font-weight:600; font-size:16px; color:#333; padding:12px 15px; background-color:#f7f8f9; border-radius:6px;">
                  Welche Shops finde ich auf Versandkostenfrei.promo?
                </div>
                <div class="faq-answer" style="display:none; padding:10px 15px; color:#555;">
                  Du findest dort eine groe Auswahl an bekannten Marken und Online-Shops – von Mode und Elektronik bis
                  hin zu Beauty und Haushaltsartikeln.
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      document.querySelectorAll('.faq-question').forEach(function (q) {
        q.addEventListener('click', function () {
          const answer = this.nextElementSibling;
          const isVisible = answer.style.display === 'block';
          // Hide all other answers
          document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
          // Toggle current one
          answer.style.display = isVisible ? 'none' : 'block';
        });
      });
    </script>

  </div>
</main>
<?php
$system_name = $this->db->get_where('system_settings', array('type' => 'system_name'))->row()->description;
$system_image = $this->db->get_where('system_settings', array('type' => 'system_image'))->row()->description;
$brands = $this->db->select("*")->from("brands")->where('status', 'Active')->order_by('updated_at', 'desc')->order_by('brands_id', 'desc')->limit(30)->get()->result_array();
?>
<div style="height: 0px; overflow:hidden;">
  <?php foreach ($brands as $brand) {
    $brand_name_new = str_replace(' ', '-', $brand['name']); ?>
    <div class="shop-item">
      <a href="<?php echo base_url() . 'marken/' . $brand_name_new; ?>" title="<?php echo $brand['name'] ?>">
        <?php echo $brand['name']; ?>
      </a>
    </div>
  <?php } ?>
</div>
<!-- Swiper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 15,
    loop: true,             // infinite loop
    speed: 3000,            // smooth scroll speed
    autoplay: {
      delay: 0,           // no delay between slides
      disableOnInteraction: false,
    },
    freeMode: true,         // allows continuous scroll
    freeModeMomentum: false,
    breakpoints: {
      0: { slidesPerView: 2 },
      576: { slidesPerView: 3 },
      768: { slidesPerView: 4 },
      992: { slidesPerView: 5 },
      1200: { slidesPerView: 6 }
    }
  });
</script>