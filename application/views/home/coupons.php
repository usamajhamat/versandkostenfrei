<style>
    .d-flex {
        display: flex;
    }

    .alert_box {
        background-color: #fff;
        padding: 10px;
        margin: 10px auto;
        margin-left: 20px;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .box_para {
        color: #3c5154 !important;
        font-size: 13px;
        font-weight: 600;
    }

    .box_heading {
        font-family: revert;
        color: #5c8374;
    }

    .subscribe_form {
        display: flex;
    }

    .box_alert_img>img {
        width: 130px;
    }

    .subscribe_field {
        height: 30px !important;
        font-size: 13px;
        border-radius: 5px !important;
        width: 100% !important;
    }

    .subscribe_btn {
        background-color: #5c8374;
        color: #fff;
        height: 30px !important;
        border: none;
        border-radius: 5px;
        left: -7px;
        position: relative;
        width: 100px !important;
    }

    .txt_box {
        margin-top: 10px;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .mt-2 {
        margin-top: 20px;
    }

    .cat_box {
        padding: 0px 0 10px 0px;
        background-color: #f5f5f5;
        box-shadow: 0px 0px 6px rgb(180, 180, 180);
    }

    .cat_content {
        margin-left: 0px;
    }

    .cat_intro {
        width: 100%;
        background-color: #fff;
        padding: 20px 20px 10px 20px;
        font-size: 18px;
        line-height: 1.7;
    }

    .box_cat {
        background-color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .box_cat:hover {
        background-color: #5c8374;
        text-decoration: none;
        color: #fff;
    }

    .cat_align {
        justify-content: space-evenly;
    }

    .see_all {
        color: #5c8374 !important;
        font-weight: 600;
        font-size: 15px;
        margin-right: 20px;
    }

    .height {
        min-height: 177px;
        padding: 13px;
        line-height: 1.8;
    }

    .cs-coupon-small-box {
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .cs-coupon-small-box {
        justify-content: flex-start;
        flex-wrap: wrap;
        grid-gap: 33px;
    }

    .bg_grey_dark {
        background: #eee !important;
    }

    .lbl_discount_val {
        font-weight: bold;
        font-size: 16px;
        color: #5c8374;
        text-align: center;
    }

    .show_code_btn {
        background: #5c8374 !important;
        color: #fff;
    }

    .orange_font_color {
        color: #5c8374;
    }

    @media(max-width:490px) {
        .best_title_f {
            top: -20px !important;
            height: 20px;
        }
    }

    /* Only this line added - 100px margin-top for whole content */
    #cs-main {
        margin-top: 100px !important;
    }
</style>

<!-- Content Main -->
<main id="cs-main" class="cs-main-default">

    <!--Breadcrumps -->
    <div class="clearfix"></div>
    <div class="container">
        <?php /* echo $query; */ ?>
        <div class="main-content-container cs-flex">
            <!--Main Content -->
            <div class="" style="width: 100%;">
                <!-- Content all_categories-->
                <?php
                $system_name = $this->db->get_where('system_settings', array('type' => 'system_name'))->row()->description;
                ?>
                <div class="cs-all-categories-content">
                    <?php
                    if (!empty($top_lef_info)) {
                        $info_title = $top_lef_info['title'];
                        $info_desc = $top_lef_info['description'];
                        ?>
                        <div class="col-sm-8">
                            <div class="cs-text txt_box mt-2 height">
                                <h3 class="box_heading"><?php echo $info_title ?></h3>
                                <p class="box_para"> <?php echo $info_desc ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($top_right_newsletter)) {
                        $newsletter_title = $top_right_newsletter['title'];
                        $newsletter_desc = $top_right_newsletter['description'];
                        $newsletter_img = $top_right_newsletter['image'];
                        ?>
                        <div class="col-sm-4">
                            <div class="alert_box mt-2">
                                <h3 class="box_heading"><?php echo $newsletter_title ?></h3>
                                <div class="d-flex">
                                    <div class="box_alert_img">
                                        <img src="<?php echo base_url() . $static_upload_url . $newsletter_img ?>">
                                    </div>
                                    <div>
                                        <p class="box_para"><?php echo $newsletter_desc ?></p>
                                        <div><small id="news_error" style="color:red"></small></div>
                                        <div class="subscribe_form">
                                            <input type="email" id="optin-email" placeholder="E-Mail-Addresse"
                                                class="subscribe_field">
                                            <input type="hidden" id="page_type" value="3">
                                            <input type="submit" value="subscribe" id="subscribe"
                                                style="font-size: 13px!important;" class="subscribe_btn">
                                        </div>
                                    </div>
                                </div>
                                <label class="cs-newsletter-label">
                                    <input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy"
                                        type="checkbox" name="" value="0">
                                    Ja,
                                    <a href="<?php echo base_url() . 'datenschutz' ?>">
                                        ich stimme
                                    </a>
                                    der Datenschutzerklärung und Erklärung zu.
                                </label>
                                <label class="js-newsletter-profiling more_priv cs-newsletter-label" style="display: none;">
                                    <input class="cs-newsletter-checkbox" type="checkbox" name="nlr[6]" value="1">
                                    Ja, ich möchte einen auf meine Interessen zugeschnittenen individuellen Newsletter
                                    erhalten, damit ich keine persönlichen Coupons und Aktionen mehr verpasse. Ich stimme
                                    der Analyse meiner Klicks und Öffnungsverhalten zu. Detaillierte Informationen finden
                                    Sie in unserer Datenschutzerklärung. Diese Einwilligung kann ich gemäß der Erklärung
                                    jederzeit widerrufen.
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $get_categories = $this->db->get_where('categories', array('status' => 'Active'))->result_array();
                    $cat_img_url = $this->db->get_where('system_settings', array('type' => 'cat_img_url'))->row()->description;
                    ?>
                    <div class="clearfix"></div>
                    <!-- Small Coupon Tabs -->
                    <section class="cs-home-selection cs-home-tabs-content">
                        <div class="clearfix"></div>
                        <div class="container" style="">
                            <div class="clearfix"></div>
                            <div class="main_coupon_div coupons_details " style="margin-top:20px">
                                <?php
                                $brand_img_url = $this->db->get_where('system_settings', array('type' => 'brand_imgs_url'))->row()->description;
                                if (!empty($all_coupons)) {
                                    foreach ($all_coupons as $fetch_data) {
                                        $brand_image = $fetch_data['brand_image'];
                                        $brand_name = $fetch_data['brand_name'];
                                        $brand_id = $fetch_data['brands_id'];
                                        $short_tagline = $fetch_data['short_tagline'];
                                        $cpn_desc = $fetch_data['description'];
                                        $discount_type = $fetch_data['discount_type'];
                                        $discount_value = $fetch_data['discount_value'];
                                        $coupons_id = $fetch_data['coupons_id'];
                                        $coupon_code = $fetch_data['coupon_code'];
                                        if ($discount_type == 'Fixed') {
                                            $discount_type_sign = 'EUR';
                                        } else if ($discount_type == 'Percentage') {
                                            $discount_type_sign = '%';
                                        } else {
                                            $discount_type_sign = '';
                                        }
                                        ?>
                                        <?php
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ", $brand_name);
                                        if (count($brand_name_array) > 0) {
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                        ?>
                                        <!-- Small Coupon -->
                                        <div class="coupon_box_div coupon_click" data-page="brands"
                                            data-coupon="<?php echo $fetch_data['coupon_type']; ?>"
                                            data-tag="<?php echo $fetch_data['short_tagline']; ?>"
                                            data-type="<?php echo $fetch_data['categories_id']; ?>"
                                            id="<?php echo $brand_name_new . '_' . $fetch_data['coupons_id']; ?>"
                                            style="position: relative; margin-top: 20px;">
                                            <div class="discount_div">
                                                <span>
                                                    <?php
                                                    if ($discount_type == 'Custom') {
                                                        ?>
                                                        <span class="main_rabet">
                                                            <?php echo strtoupper($discount_value) . $discount_type_sign; ?>
                                                        </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="main_rabet">
                                                            <?php echo '<span class="cpn_amount">' . strtoupper($discount_value) . $discount_type_sign; ?></span>
                                                        <br>
                                                        Rabatt
                                                    </span>
                                                    <?php
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="desc_btn_section">
                                                <div class="cpn_small_desc">
                                                    <?php echo $short_tagline; ?>
                                                </div>
                                                <div class="cpn_btn">
                                                    <div class="cs-coupon-small-info show_code_div">
                                                        <?php
                                                        if (empty($coupon_code)) {
                                                            ?>
                                                            <div class=" full_btn_div" style="">
                                                                <div class="coupon-btn-text">
                                                                    <i class="fa fa-euro"></i>
                                                                    <span>Gutschein anzeigen</span>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button class="new_peal_btn">
                                                                <span class="peal_btn_block">
                                                                    <span class="show_code_cover">
                                                                        <i class="fa fa-euro"></i>
                                                                        Gutschein anzeigen
                                                                    </span>
                                                                    <span class="back_code"> <?php echo substr($coupon_code, 1); ?>
                                                                    </span>
                                                                </span>
                                                            </button>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if ($fetch_data['end_date'] != "0000-00-00" && $fetch_data['end_date'] != "") {
                                                        ?>
                                                        <strong>
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> Läuft ab :
                                                            <?php echo date('m/d/Y', strtotime($fetch_data['end_date'])) ?>
                                                        </strong>
                                                        <?php
                                                    } ?>
                                                </div>
                                                <?php if (isset($fetch_data['special_text']) && $fetch_data['special_text'] != '') { ?>
                                                    <div class="best_title_f "><?php echo $fetch_data['special_text'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="brands_img_section">
                                                <img class="lazyloaded 1--"
                                                    src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                                                    data-src="<?php echo base_url() . $brand_img_url . $brand_image; ?>"
                                                    alt="<?php echo $brand_name; ?>">
                                            </div>
                                        </div>
                                        <!-- Small Coupon -->
                                    <?php }
                                } ?>
                            </div>
                            <!-- Pagination Code Start Here -->
                            <?php

                            if (!empty($f_param)) { ?>
                                <div class="row cs-pagination">
                                    <ul class="pagination">
                                        <?php if ($total_coupons <= $page_limit_initial) { ?>
                                            <li class="">
                                                <a class="cs-pagination-item" rel="next"
                                                    href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <?php $pages = ceil($total_coupons / $page_limit_initial); ?>
                                            <?php $pages_limit = $total_page_limit_initial; ?>
                                            <?php if (!empty($page) && $page_num > 1) {
                                                ?>
                                                <li><a class="cs-pagination-item" rel="next"
                                                        href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $page_num - 1; ?>">Previous</a>
                                                </li>
                                            <?php } ?>
                                            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                                <?php if ($page_num >= $pages_limit) { ?>
                                                    <?php if ($i >= $pages_limit) { ?>
                                                        <?php $pages_limit = $pages_limit + $total_page_limit_initial; ?>
                                                        <?php if ($i >= $page_num) { ?>
                                                            <li class="<?php if ($i == $page_num) {
                                                                echo 'cs-pagination-item-active';
                                                            } ?>">
                                                                <a class="cs-pagination-item"
                                                                    href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $i; ?>"
                                                                    class=" <?php if ($i == $page_num) { ?> active <?php } ?>"><?php echo $i; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if ($i <= $pages_limit) { ?>
                                                        <?php if (empty($page_num) && $i == 1) { ?>
                                                            <li class=" <?php if ($i == $page_num) {
                                                                echo 'cs-pagination-item-active';
                                                            } ?>">
                                                                <a class="cs-pagination-item"
                                                                    href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $i; ?>"
                                                                    class="active"><?php echo $i; ?></a>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class=" <?php if ($i == $page_num) {
                                                                echo 'cs-pagination-item-active';
                                                            } ?>">
                                                                <a class="cs-pagination-item"
                                                                    href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $i; ?>"
                                                                    class=" <?php if ($i == $page_num) { ?> active <?php } ?>"><?php echo $i; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if (!empty($page) && $pages < $page_num) { ?>
                                                <li class="<?php if ($i == $page_num) {
                                                    echo 'cs-pagination-item-active';
                                                } ?>">
                                                    <a class="cs-pagination-item"
                                                        href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $page_num = $page_num + 1; ?>">Next</a>
                                                </li>
                                            <?php } else if ($pages != $page_num) { ?>
                                                    <li class=" <?php if ($i == $page_num) {
                                                        echo 'cs-pagination-item-active';
                                                    } ?>">
                                                        <a class="cs-pagination-item cs-pagination-next"
                                                            href="<?php echo base_url(); ?>home/coupons/<?php echo $param1; ?>?page=<?php echo $page_num = $page_num + 1; ?>">Next</a>
                                                    </li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <!-- Pagination Code End Here -->
                        </div>
                    </section>
                    <section class="cs-home-selection cs-home-mer-box " style="margin-bottom:20px">
                        <?php
                        if ($f_param == "popular") {
                            $brands_content = $this->db->order_by('sort_order', 'asc')->get_where('brands_contents', array('coupon_name' => 'popular', 'type' => 'coupon', 'status' => 'Active'))->result_array();
                        } else if ($f_param == "latest") {
                            $brands_content = $this->db->order_by('sort_order', 'asc')->get_where('brands_contents', array('coupon_name' => 'lastest', 'type' => 'coupon', 'status' => 'Active'))->result_array();
                        } else if ($f_param == "trending") {
                            $brands_content = $this->db->order_by('sort_order', 'asc')->get_where('brands_contents', array('coupon_name' => 'trend', 'type' => 'coupon', 'status' => 'Active'))->result_array();
                        } else if ($f_param == "tips") {
                            $brands_content = $this->db->order_by('sort_order', 'asc')->get_where('brands_contents', array('coupon_name' => 'tips', 'type' => 'coupon', 'status' => 'Active'))->result_array();
                        }
                        foreach ($brands_content as $b_content) {
                            ?>
                            <div class="" style="margin-top: 20px;">
                                <h4 class="cs-home-h rem"><?php echo $b_content['heading'] ?> </h4>
                                <div class="cs-merchant-coupons-table cs-merchant-coupons-table-updated"
                                    style="box-shadow: 0px 0px 6px rgb(180 180 180); padding: 14px 16px; line-height: 2; font-size: 16px;">
                                    <p> <?php echo $b_content['description'] ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>