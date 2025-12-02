<?php
    $date= date("Y-m-d");
	  $system_image = $this->db->get_where('system_settings',array('type'=>'system_image'))->row()->description;
  	$system_img_with_path = base_url().'uploads/admin/'.$system_image;
    $lastest_copuon =  $this->db->get_where('system_settings',array('type'=>'lastest_copuon_section_flag'))->row()->description;
    $trending_copuon =  $this->db->get_where('system_settings',array('type'=>'trending_copuon_section_flag'))->row()->description;

    $manual_brands = [];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2277_eufy%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Eufy-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1986_babymarkt%20gutschein-gutscheinfuralle.de.png', 'link' => 'https://versandkostenfrei.promo/marken/20-Prozent-Babymarkt-Gutschein'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2993_5%20Euro%206%20Euro%20Wolt%20Gutschein%20Bestandskunden-versandkostenfrei.promo.webp', 'link' => 'https://versandkostenfrei.promo/marken/5-Euro-6-Euro-Wolt-Gutschein-Bestandskunden'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1448_1194_bershka.com-Gutschein%20(2).png', 'link' => 'https://versandkostenfrei.promo/marken/Bershka-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2995_beautywelt%2020%20rabatt-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Beautywelt-20-Rabatt'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1362_reifendirekt.de-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Reifendirekt-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2026_fielmann%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Fielmann-Rabattcode-Eingeben'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1217_condor.com-gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Condor-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1124_valentins.de-Gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Valentins-Gutscheincode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1210_blinkist.com-gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Blinkist-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1319_screenshot-nordvpn.com-2022.04.13-03_08_08%20(1).png', 'link' => 'https://versandkostenfrei.promo/marken/Nordvpn-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2040_clark%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Clark-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2831_flexispot%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Flexispot-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1889_glossybox%20rabattcode-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Glossybox-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2034_everdrop%20gutschein-versandkostenfrei.promo%20(2).png', 'link' => 'https://versandkostenfrei.promo/marken/Everdrop-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2244_Gravis%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Gravis-Gutschein-Einlosen'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1936_brille24%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Brille24-Gutschein'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/2845_horze%20gutschein-versandkostenfrei.promo.png', 'link' => 'https://versandkostenfrei.promo/marken/Horze-Rabattcode'];
    $manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1310_200x70.jpg', 'link' => 'https://versandkostenfrei.promo/marken/mydays-Gutschein-einlosen'];
?>

<header id="header" class="header d-flex align-items-center fixed-top p-lg-0 <?php if($page_name != 'home'){ echo 'default-header-bg'; } ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-between">
                <a href="/" class="logo d-flex align-items-center my-2">
                    <img src="<?php echo $system_img_with_path; ?>" class="rounded-10px" height="40px">
                </a>
                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
                <div id="navbar" class="navbar container- d-inline mb-0 mb-md-2 px-0 mt-2" style="position:unset">
                    <ul class="d-none d-md-flex -d-inline justify-content-left mx-0 mx-md-2 mb-0 mb-md-2" id="navmenulinks">
												<?php if($page_name != 'home'){ ?>
													<li>
														<div class="show-and-hide d-none d-md-block">
															<div class="js-searchblock">
																<div class="">
																	<form name="search" method="get" action="home/search" id="search_form" style="background:unset; padding:0;">
																		<div class="input-group" style="border-top-left-radius: 20px; border-bottom-left-radius:20px">
																			<button type="submit" class="input-group-text" style="border-top-left-radius: 20px; border-bottom-left-radius:20px; border:0px; background-color:#434343;" id="basic-addon1"><i class="fa-solid fa-search text-white"></i></button>
																			<input name="search_str" id="inp3" value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="desktop-search" type="text" class="form-control header-search cs-field-search search_str your-class" style="border-top-right-radius: 20px; border-bottom-right-radius:20px; border:0px; background-color:#434343 !important; padding:20px 5px;" placeholder="Search shop">
																		</div>
																	</form>
																</div>
																<div id="show_suggestion" style="position:relative;"></div>
															</div>
														</div>
													</li>
												<?php } ?>
                      
                        <li class="nav-item dropdown" style="position:unset">
                          <a class="nav-link dropdown text-white pl-1 pl-md-3" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">Alle Shop <i class="fa fa-caret-down"></i></a>
                          <ul class="dropdown-menu megamenu midmenu" style="right:0; margin:0 0 0 auto">
                            <div class="row">
                                  <?php
                                    foreach ($manual_brands as $brand) {
                                      $brand_image = $brand['image'];
                                      $brand_link = $brand['link'];
                                    ?>
                                    <div class="col-6 col-sm-3 mb-3 px-2">
                                      <div class="brands">
                                        <a href="<?php echo $brand_link;  ?>" class="p-0">
                                          <img src="<?php echo $brand_image; ?>" data-src="<?php echo $brand_image; ?>" height="63px" width="100px"/>
                                        </a>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <?php /*
                                    $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;
                                    $popular_quantity = $this->db->get_where('system_settings', array('type' => 'top_section_brands_limit'))->row()->description;
                                    $get_all_brands = $this->db->order_by('popular_shop_order', 'ASC')->limit(20)->get_where('brands', array('status' => 'Active', 'popular_shop' => '1'))->result_array();
                                    foreach ($get_all_brands as $fetch_data) {
                                      $brand_image = $fetch_data['brand_image'];
                                      $brand_name = $fetch_data['name'];
                                      $brand_id = $fetch_data['brands_id'];
                                      $get_brand_total_codes = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '" . date('Y-m-d') . "' AND (end_date >= '" . $date . "' OR end_date = '0000-00-00') AND brands_id = '" . $brand_id . "' ")->num_rows();
                                      $brand_name_array = explode(" ", $brand_name);

                                      if (count($brand_name_array) > 0) {
                                        $brand_name_new = str_replace(' ', '-', $brand_name);
                                      } else {
                                        $brand_name_new = $brand_name;
                                      }
                                    ?>
                                    <div class="col-6 col-sm-3 mb-3 px-2">
                                      <div class="brands">
                                        <a href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" class="p-0">
                                          <img src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" height="63px" width="100px"/>
                                        </a>
                                      </div>
                                    </div>
                                  <?php }*/ ?>
                            </div>
                          </ul>
                        </li>
                        <li class="nav-item">
                          <a href="<?php base_url() ?>home/categories/" class="text-white nav-link pl-1 pl-md-3">Alle Kategorien</a>
                        </li>
                    </ul>
                     <span>
                      <span class="text-white cursor-pointer d-md-none mr-2" id="showHideMobileSidebar"><i class="fa fa-bars"></i></span>
                    </span>
                    <?php /*if($page_name != 'home'){ ?>
                      <span>
                        <span class="text-white cursor-pointer d-md-none" id="showHideMobileSearch"><i class="fa fa-search"></i></span>
                      </span>
                    <?php }*/ ?>
                </div>
            </div>

            <div class="col-12">
              <div class="show-and-hide d-block d-md-none pb-2" id="mobile-search-box">
                <!-- <div class="js-searchblock pb-3">
                  <div class="">
                    <form name="search" method="get" action="home/search" id="search_form" style="background:unset; padding:0;">
                      <div class="input-group" style="border-top-left-radius: 20px; border-bottom-left-radius:20px">
                        <button type="submit" class="input-group-text" style="border-top-left-radius: 20px; border-bottom-left-radius:20px; border:0px; background-color:#434343;" id="basic-addon1"><i class="fa-solid fa-search text-white"></i></button>
                        <input name="search_str" id="inp3" value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="desktop-search" type="text" class="form-control header-search cs-field-search search_str your-class" style="border-top-right-radius: 20px; border-bottom-right-radius:20px; border:0px; background-color:#434343 !important; padding:20px 5px;" placeholder="Search shop">
                      </div>
                    </form>
                  </div>
                  <div id="show_suggestion" style="position:relative;"></div>
                </div> -->
              </div>
            </div>
        </div>
    </div>
</header>

<div class="d-none d-md-none pb-2" style="position:fixed;height:100%;width:100%;background-color:#fff;z-index:999" id="mobile-sidebar-box">
  <div style="position:absolute;right:10px;top:10px;cursor:pointer"  id="hide-left-box">
    <i class="fa fa-2x fa-close"></i>
  </div>
  <div class="mx-3 mt-5">
    <div class="h4 font-weight-bold mb-2">Alle Shops</div>
    <div class="mobile-category">
      <?php
        foreach ($manual_brands as $brand) {
          $brand_image = $brand['image'];
          $brand_link = $brand['link'];
        ?>
        <div class="pr-2 d-inline-block">
          <div class="brands">
            <a href="<?php echo $brand_link;  ?>" class="p-0">
              <img src="<?php echo $brand_image; ?>" data-src="<?php echo $brand_image; ?>" height="63px" width="100px"/>
            </a>
          </div>
        </div>
      <?php } ?>
    <?php /*
      foreach ($get_all_brands as $fetch_data) {
        $brand_image = $fetch_data['brand_image'];
        $brand_name = $fetch_data['name'];
        $brand_id = $fetch_data['brands_id'];
        $get_brand_total_codes = $this->db->query("select * from coupons where status = 'Active'  AND start_date <= '" . date('Y-m-d') . "' AND (end_date >= '" . $date . "' OR end_date = '0000-00-00') AND brands_id = '" . $brand_id . "' ")->num_rows();
        $brand_name_array = explode(" ", $brand_name);

        if (count($brand_name_array) > 0) {
          $brand_name_new = str_replace(' ', '-', $brand_name);
        } else {
          $brand_name_new = $brand_name;
        }
    ?>
      <div class="pr-2 d-inline-block">
        <div class="brands">
          <a href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" class="p-0">
            <img src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" height="63px" width="100px"/>
          </a>
        </div>
      </div>
    <?php }*/ ?>
    </div>
  </div>
  <hr />
  <div class="mx-3 mt-2">
    <div class="h4 font-weight-bold mb-2">Alle Kategorien</div>
    <div class="mobile-category">
      <?php 
        $this->db->limit(15);
        $this->db->order_by('sort_order','ASC');
        $get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();											
        // $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
        $cat_img_url     = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description;
              
        foreach($get_categories as $fetch_data){
            
            $category_id   = $fetch_data['categories_id'];
            $category_name = $fetch_data['name'];
            // $font_icon     = $fetch_data['font_icon'];
            $cat_image = $fetch_data['cat_image'];
            $get_cate_total_vouchers = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$category_id' AND `status` = 'Active' AND (end_date >= '".$date."' OR end_date = '0000-00-00')")->num_rows();
      ?>
        <div class="pr-2 d-inline-block">
          <div class="categories">
            <a href="<?php echo base_url().'home/categories/'.$category_id ?>" title="<?php echo $category_name; ?>" class="p-0">
              <div class="img-overlay"></div>
              <img src="<?php echo base_url().$cat_img_url.$cat_image; ?>" data-src="<?php echo base_url().$cat_img_url.$cat_image; ?>" height="110px" width="200px"/>
              <span class="title text-white"><?php echo $category_name ?></span>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <hr />
</div>

<?php /*
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
*/ ?>