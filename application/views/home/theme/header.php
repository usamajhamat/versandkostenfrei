<?php
$date = date("Y-m-d");
$system_image = $this->db->get_where('system_settings', array('type' => 'system_image'))->row()->description;
$system_img_with_path = base_url() . 'uploads/admin/' . $system_image;
$lastest_copuon = $this->db->get_where('system_settings', array('type' => 'lastest_copuon_section_flag'))->row()->description;
$trending_copuon = $this->db->get_where('system_settings', array('type' => 'trending_copuon_section_flag'))->row()->description;

$manual_brands = [];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1986_babymarkt%20versandkostenfrei.de.png', 'link' => 'https://versandkostenfrei.promo/marken/20-Prozent-Babymarkt-Gutschein'];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1448_1194_bershka.com-Gutschein%20(2).png', 'link' => 'https://versandkostenfrei.promo/marken/Bershka-Gutschein-Einlosen'];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1217_condor.com-gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Condor-Gutschein-Einlosen'];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1124_valentins.de-Gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Valentins-Gutscheincode'];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1210_blinkist.com-gutschein.png', 'link' => 'https://versandkostenfrei.promo/marken/Blinkist-Gutschein-Einlosen'];
$manual_brands[] = ['image' => 'https://versandkostenfrei.promo/uploads/brands/1319_screenshot-nordvpn.com-2022.04.13-03_08_08%20(1).png', 'link' => 'https://versandkostenfrei.promo/marken/Nordvpn-Rabattcode'];
?>

<style>
#show_suggestion_1 .src_box {
    position: absolute;
    display: grid;
    width: 70%;
    padding: 13px;
    top: 100%;
    left: 20%;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
    max-height: 420px;
    overflow-y: auto;
    z-index: 9999;
    background: #fff;
}
</style>

<!-- ✅ FIXED & CLEANED HEAD SECTION -->
<head>
    <meta charset="utf-8">

    <!-- Dynamic Favicon -->
    <link rel="icon" type="image/png" href="<?= $system_img_with_path . '?v=' . time(); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $system_img_with_path . '?v=' . time(); ?>">

</head>

<!-- PAGE HEADER -->
<header id="header"
  class="header d-flex align-items-center fixed-top p-lg-0 <?php if ($page_name != 'home') { echo 'default-header-bg'; } ?>"
  style="background-color:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.1); z-index:999;">

  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 d-flex justify-content-between align-items-center py-2">

        <!-- Logo -->
        <a href="/" class="logo d-flex align-items-center my-2">
          <img src="<?php echo $system_img_with_path; ?>" class="rounded-10px" height="40px">
        </a>

        <!-- Mobile Nav -->
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list text-dark fs-3"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x text-dark fs-3"></i>

        <!-- Navbar -->
        <div id="navbar" class="navbar mb-0 mb-md-2 px-0 mt-2 w-10" style="position:unset;">
          <ul class="d-none d-md-flex justify-content-end align-items-center list-unstyled mb-0 w-100"
              id="navmenulinks" style="gap: 25px;">

            <?php if ($page_name != 'home') { ?>
            <li class="mx-2 flex-grow-1" style="flex: 0 0 450px;">
              <div class="show-and-hide d-none d-md-block">
                <div class="js-searchblock text-center">

                  <form name="search" method="get" action="home/search" id="search_form_1"
                        class="w-100"
                        style="padding:0; max-width:650px; margin:auto; background:unset;">

                    <div class="input-group shadow-sm"
                         style="border-radius:50px; overflow:hidden; background-color:#fff; border:1px solid #e0e0e0;">

                      <button type="submit" id="basic-addon1_1"
                        class="input-group-text fw-semibold text-white px-4"
                        style="background-color:#5C8374; border:none; border-radius:50px 0 0 50px; font-size:0.95rem;">
                        Suchen
                      </button>

                      <input name="search_str" id="inp3_1" data-suggestion-id="show_suggestion_1"
                             value="<?php if (!empty($search_query)) echo $search_query ?>"
                             autocomplete="off" type="text"
                             class="form-control header-search cs-field-search search_str your-class"
                             style="border:none; box-shadow:none; font-size:15px; padding:18px 15px;"
                             placeholder="Suche nach deinem Lieblingsshop...">

                      <span class="input-group-text" style="border:none; border-radius:0 50px 50px 0;">
                        <i class="fa-solid fa-search text-white fs-5"></i>
                      </span>

                    </div>
                  </form>

                  <div id="show_suggestion_1" style="position:relative;"></div>
                </div>
              </div>
            </li>
            <?php } ?>

            <!-- Shop Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark fw-semibold" data-bs-toggle="dropdown"
                 href="https://versandkostenfrei.promo/marken/" id="navbarDropdown">
                Shop
              </a>

              <ul class="dropdown-menu shadow border-0 rounded-3 p-3" style="min-width: 260px;">
                <div class="row">
                  <?php foreach ($manual_brands as $brand) { ?>
                  <div class="col-6 text-center mb-2">
                    <a href="<?php echo $brand['link']; ?>" class="d-inline-block">
                      <img src="<?php echo $brand['image']; ?>" height="60" class="img-fluid rounded shadow-sm"/>
                    </a>
                  </div>
                  <?php } ?>
                </div>

                <li><hr class="dropdown-divider my-2"></li>

                <li class="text-center">
                  <a href="<?php echo base_url().'marken'; ?>"
                     class="dropdown-item fw-semibold"
                     style="color:#5c8374; font-size:14px;">
                    Alle Shops anzeigen →
                  </a>
                </li>
              </ul>
            </li>

            <!-- Kategorien Menu -->
            <li class="nav-item dropdown">
              <a href="https://versandkostenfrei.promo/home/categories/"
                 class="nav-link dropdown-toggle text-dark fw-semibold"
                 data-bs-toggle="dropdown">
                Kategorien
              </a>

              <ul class="dropdown-menu shadow border-0 rounded-3 p-2" style="min-width: 240px;">
                <?php 
                $cat_icon_url = $this->db->get_where('system_settings', array('type'=>'cat_icon_url'))->row()->description;
                $categories = $this->db->order_by('name', 'ASC')
                                       ->get_where('categories', array('status' => 'Active'))
                                       ->result_array();
                $counter = 0;

                foreach ($categories as $cat) {
                  if ($counter >= 8) break;
                  $cat_id = $cat['categories_id'];
                  $cat_name = $cat['name'];
                  $font_icon = $cat['font_icon'] ?? '';
                ?>
                <li>
                  <a href="<?php echo base_url().'home/categories/'.$cat_id; ?>"
                     class="dropdown-item d-flex align-items-center py-2"
                     style="font-size:14px; color:#333; display:flex; gap:8px;"
                     onmouseover="this.style.color='#5c8374';"
                     onmouseout="this.style.color='#333';">

                    <?php if (!empty($font_icon)) { ?>
                      <?php if (strpos($font_icon, 'fa-') !== false) { ?>
                        <i class="fa <?php echo $font_icon; ?>" style="font-size:15px; color:#5c8374;"></i>
                      <?php } else { ?>
                        <img src="<?php echo base_url() . $cat_icon_url . $font_icon; ?>"
                             style="width:18px; height:18px;">
                      <?php } ?>
                    <?php } ?>

                    <span style="flex-grow:1;"><?php echo $cat_name; ?></span>
                  </a>
                </li>
                <?php $counter++; } ?>

                <li><hr class="dropdown-divider"></li>

                <li>
                  <a href="<?php echo base_url().'home/categories'; ?>"
                     class="dropdown-item fw-semibold text-center"
                     style="color:#5c8374; font-size:14px;">
                    Alle Kategorien anzeigen →
                  </a>
                </li>
              </ul>
            </li>

            <!-- Blog -->
            <li class="nav-item dropdown ms-auto">
              <a href="https://versandkostenfrei.promo/home/blog_info"
                 class="nav-link text-dark fw-semibold">
                Blogs
              </a>
            </li>

          </ul>

          <!-- Mobile menu toggle -->
          <span class="d-md-none text-dark cursor-pointer ms-2" id="showHideMobileSidebar">
            <i class="fa fa-bars fs-4"></i>
          </span>

        </div>
      </div>

      <!-- Mobile search -->
      <div class="col-12">
        <div class="show-and-hide d-block d-md-none pb-2" id="mobile-search-box"></div>
      </div>

    </div>
  </div>
</header>

<!-- Mobile Sidebar -->
<div class="d-none d-md-none pb-2"
     style="position:fixed;height:100%;width:100%;background-color:#fff;z-index:999"
     id="mobile-sidebar-box">

  <div style="position:absolute;right:10px;top:10px;cursor:pointer" id="hide-left-box">
    <i class="fa fa-2x fa-close"></i>
  </div>

  <!-- Shops -->
  <div class="mx-3 mt-5">
    <div class="h4 font-weight-bold mb-2">Alle Shops</div>

    <div class="mobile-category">
      <?php foreach ($manual_brands as $brand): ?>
      <div class="pr-2 d-inline-block abc">
        <div class="brands">
          <a href="<?php echo $brand['link']; ?>">
            <img src="<?php echo $brand['image']; ?>"
                 style="height:63px;width:100px">
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-3">
      <a href="<?php echo base_url().'marken'; ?>"
         class="fw-semibold" style="color:#5c8374;">
        Alle Shops anzeigen →
      </a>
    </div>
  </div>

  <hr />

  <!-- Categories -->
  <div class="mx-3 mt-2">
    <div class="h4 font-weight-bold mb-2">Alle Kategorien</div>

    <div class="mobile-category" style="display:flex; flex-wrap:wrap; gap:8px;">
      <?php
      $this->db->limit(6);
      $this->db->order_by('sort_order', 'ASC');
      $get_categories = $this->db->get_where('categories',
                                             array('status' => 'Active','sort_order!='=>'0'))->result_array();

      foreach ($get_categories as $fetch_data):
        $category_id = $fetch_data['categories_id'];
        $category_name = $fetch_data['name'];
      ?>

      <a href="<?php echo base_url().'home/categories/'.$category_id ?>"
         class="d-inline-block px-3 py-2 rounded"
         style="background-color:#f8f9fa; border:1px solid #eee;">
         <?php echo $category_name; ?>
      </a>

      <?php endforeach; ?>
    </div>

    <div class="text-center mt-3">
      <a href="<?php echo base_url().'home/categories'; ?>"
         class="fw-semibold" style="color:#5c8374;">
        Alle Kategorien anzeigen →
      </a>
    </div>
  </div>

  <hr />

  <!-- Blogs -->
  <div class="mx-3 mt-2">
    <div class="h4 font-weight-bold mb-2">Blogs</div>

    <div class="mobile-category text-center">
      <a href="<?php echo base_url().'home/blogs'; ?>"
         class="fw-semibold" style="color:#5c8374;">
        Besuchen Sie unseren Blog →
      </a>
    </div>
  </div>
</div>
