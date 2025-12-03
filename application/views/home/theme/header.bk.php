<?php
    $date= date("Y-m-d");
	$system_image = $this->db->get_where('system_settings',array('type'=>'system_image'))->row()->description;
	$system_img_with_path = base_url().'uploads/admin/'.$system_image;
    $lastest_copuon =  $this->db->get_where('system_settings',array('type'=>'lastest_copuon_section_flag'))->row()->description;
    $trending_copuon =  $this->db->get_where('system_settings',array('type'=>'trending_copuon_section_flag'))->row()->description;
?>
<style type="text/css">
    .cs-main-nav-item
    {
        height: 33px;
        padding: 7px 15px 5px;
    }
    .src_box{
        top: 0;
        left: 0;
        width: 82%;
        position: absolute;
        margin-left: 2%;
    }
    .triangle{
        position: absolute;top: 41px;left: 70px;z-index: 9999999;display: none;
    }
</style>

<div class="mobile_view_menu" id="mobile_view_menu">
    <ul class="small_mbl_menu">
    <i class="close-cross fa fa-times" id="close_menu" ></i>
                        
                        <!-- Coupons By Brand Tab -->
                        <?php /*
                        <li class="" data-type="show" id="all_coup_nav_menu">
                            <div class="nav_inner_boxes_mbl" title="Gutscheine" id="coupons_nav">
                                <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Gutscheine</font>
                                </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav_menu coup_nav_arr all_coup">
                            </div>
                            <ul id="all_coup_contant_menu" style="display:none" class=" dropdown_content_small " >
                                <?php 
                                    $this->db->limit(15);
                                    $this->db->order_by('sort_order','ASC');
                                    $get_brands = $this->db->get_where('brands', array('status'=>'Active'))->result_array();
                                    
                                    foreach($get_brands as $fetch_data){
                                        $brand_id = $fetch_data['brands_id'];
                                        $brand_name = $fetch_data['name'];
                                ?>
                                <?php
                                $brand_name_new = "";
                                $brand_name_array = explode(" ",$brand_name);
                                if(count($brand_name_array) > 0){
                                    $brand_name_new = str_replace(' ', '-', $brand_name);
                                }
                                ?>
                                <li class="nav_list_item_menu">
                                    <a class="nav_link_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" Alle <?php echo $brand_name ?>>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $brand_name;?></font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow_navs" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="nav_list_item_menu">
                                    <a class="nav_link_item" href="<?php echo base_url().'marken/'?>" title="Alle marken">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alle Geschäfte von A bis Z </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow_navs" style="float:right;">
                                    </a>
                                </li>
                            </ul>
                                
                        </li>
                        */?>
                        <?php /*
                        <ul id="coupons_nav_id"  class="cs-dropdown-menu-2-cols small_scc small_all_coup" >
                                <?php 
                                    $this->db->limit(15);
                                    $this->db->order_by('sort_order','ASC');
                                    $get_brands = $this->db->get_where('brands', array('status'=>'Active','sort_order!='=>'0'))->result_array();
                                    
                                    foreach($get_brands as $fetch_data){
                                        $brand_id = $fetch_data['brands_id'];
                                        $brand_name = $fetch_data['name'];
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) > 0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new;?>" all <?php echo $brand_name ?> Gutscheine">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $brand_name." Gutscheine"?></font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'?>" title="All brands">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">All shops from A to Z </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                        </ul>
                        */?>							
                        <!-- Latest Coupons Tab -->
                        <?php	
                            /* if($lastest_copuon==1){ 
                        ?>
                            <li class="" data-type="show" id="coup" class="border-r">
                            <div class="nav_inner_boxes_mbl" title="Neueste Gutscheine">
                                <font style="vertical-align: inherit;">
                            
                                    <font style="vertical-align: inherit;">Neueste Gutscheine</font>
                                </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav_menu coup"></span>
                            </div>
                            <ul class="dropdown-menu dropdown_content cs-dropdown-menu-2-cols" >
                                <?php 									  
                                        $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
                                        FROM coupons as cpn
                                        LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
                                        LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
                                        WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
                                        
                                    foreach($get_latest_coupons as $key => $fetch_data){
                                        $coupon_id     = $fetch_data['coupons_id'];
                                        $brand_name    = $fetch_data['brand_name'];
                                        $brands_id     = $fetch_data['brands_id'];
                                        $category_name = $fetch_data['category_name'];
                                        $publish_date  = $fetch_data['date_added'];
                                        
                                        $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
                                                                                        
                                            $published_date         = strtotime($publish_date);
                                            $current_date           = strtotime(date('Y-m-d h:i:s'));
                                            $days                   = abs(($current_date - $published_date)/86400);
                                            $hours                  = abs(($days)*24);
                                            $minuts                 = abs(($days)*24*60);
                                            $second                 = abs(($days)*24*60*60);
                                            if(floor($days)=="1"){
                                            $day_men = "Tag"; 
                                            }
                                            else{
                                            $day_men = "Tage"; 
                                            }
                                            $show_time = floor($days)." ".$day_men;  
                                            if($days<1){
                                            $show_time = floor($hours)." hours"; 
                                            if($hours<1){
                                                $show_time = floor($minuts)." minutes"; 
                                                if($minuts<1){
                                                $show_time = floor($second)." seconds";   
                                                }
                                            }	
                                            }										
                                            $brand_name_new = "";
                                            $brand_name_array = explode(" ",$brand_name);
                                            if(count($brand_name_array) > 0){
                                                $brand_name_new = str_replace(' ', '-', $brand_name);
                                            }
                                                                            
                                            
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                        <font style="vertical-align: inherit;">
                                            

                                        <font style="vertical-align: inherit;">
                                            <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                        </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alle aktuelle gutscheine</font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                            </ul>								
                        </li>
                        <ul class=" cs-dropdown-menu-2-cols small_scc small_coup" >
                                <?php 
                                        $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
                                        FROM coupons as cpn
                                        LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
                                        LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
                                        WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
                                        
                                    foreach($get_latest_coupons as $key => $fetch_data){
                                        $coupon_id     = $fetch_data['coupons_id'];
                                        $brand_name    = $fetch_data['brand_name'];
                                        $brands_id     = $fetch_data['brands_id'];
                                        $category_name = $fetch_data['category_name'];
                                        $publish_date  = $fetch_data['date_added'];
                                        
                                        $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
                                                                                        
                                            $published_date         = strtotime($publish_date);
                                            $current_date           = strtotime(date('Y-m-d h:i:s'));
                                            $days                   = abs(($current_date - $published_date)/86400);
                                            $hours                  = abs(($days)*24);
                                            $minuts                 = abs(($days)*24*60);
                                            $second                 = abs(($days)*24*60*60);
                                            
                                        
                                            $show_time = floor($hours)." hours"; 
                                            if($hours<1){
                                                $show_time = floor($minuts)." minutes"; 
                                                if($minuts<1){
                                                $show_time = floor($second)." seconds";   
                                                }
                                            }											
                                            $brand_name_new = "";
                                            $brand_name_array = explode(" ",$brand_name);
                                            if(count($brand_name_array) > 0){
                                                $brand_name_new = str_replace(' ', '-', $brand_name);
                                            }											  									
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new; ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                        </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li class="border-r">
                                <?php } ?>
                                <li>
                                    <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">All Latest Coupons </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                            </ul>
                        <?php } */
                        ?> 
                        <!-- Best Coupons Tab -->
                        <?php                            
                        /* if($trending_copuon!=0){
                        ?>
                        <li class="" data-type="show"  id="trend" class="border-r">
                            <div class="nav_inner_boxes_mbl cate_item" title="Trendige Gutscheine ">
                                <font style="vertical-align: inherit;">
                                
                                    <font style="vertical-align: inherit;">Trendige Gutscheine </font>
                                </font>
                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav_menu trend">
                            </div>
                            <ul class="dropdown-menu dropdown_content cs-dropdown-menu-2-cols" >
                                <?php 
                                    $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
                                        FROM coupons as cpn
                                        LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
                                        LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
                                        WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();
                                        
                                    foreach($get_latest_coupons as $key=> $fetch_data){
                                        $coupon_id = $fetch_data['coupons_id'];
                                        $brand_name = $fetch_data['brand_name'];
                                        $brands_id = $fetch_data['brands_id'];
                                        $category_name = $fetch_data['category_name'];
                                        
                                        $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active','end_date >'=>$date))->num_rows();

                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) > 0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/coupons/trending/'?>" title="Alle Trendige Gutscheine ">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alle Trendige Gutscheine </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <?php  } */ ?>
                        <?php /*
                        <ul class=" cs-dropdown-menu-2-cols small_scc small_trend" >
                                <?php 
                                    $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
                                        FROM coupons as cpn
                                        LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
                                        LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
                                        WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();												
                                    foreach($get_latest_coupons as $key=> $fetch_data){
                                        $coupon_id = $fetch_data['coupons_id'];
                                        $brand_name = $fetch_data['brand_name'];
                                        $brands_id = $fetch_data['brands_id'];
                                        $category_name = $fetch_data['category_name'];
                                        
                                        $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) > 0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li> 
                                <?php } ?>                                     
                            </ul>
                        */ ?>
                        <!-- Top Categories Tab -->
                        <?php /*
                        <li class="" id="cat_nav_menu" data-type="show" class="border-r">
                            <div class="nav_inner_boxes_mbl" title="Kategorien">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Kategorien</font>
                                </font>
                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav_menu cate_nav_arr_menu">
                            </div>
                            <ul class="dropdown_content_small " id="cate_nav_content_menu" style="display:none"  >
                                <?php 
                                    $this->db->limit(15);
                                    $this->db->order_by('sort_order','ASC');
                                    $get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();											
                                    $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
                            
                                    foreach($get_categories as $fetch_data){
                                        
                                        $category_id   = $fetch_data['categories_id'];
                                        $category_name = $fetch_data['name'];
                                        $font_icon     = $fetch_data['font_icon'];
                                        $get_cate_total_vouchers = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$category_id' AND `status` = 'Active' AND (end_date >= '".$date."' OR end_date = '0000-00-00')")->num_rows();
                                ?>
                                <li class="nav_list_item_menu">
                                    <a class="nav_link_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                        <div>
                                        <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
                                        </font>
                                        </div>

                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="nav_list_item_menu">
                                    <a class="nav_link_item" href="<?php echo base_url().'kategorien'?>" title="Alle Kategorien">
                                        <div>
                                        <i class="" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alle Kategorien </font>
                                        </font>

                                        </div>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <ul class="cs-dropdown-menu-2-cols small_scc small_cat" >
                                <?php 
                                    $this->db->limit(15);
                                    $this->db->order_by('sort_order','ASC');
                                    $get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();
                                        
                                    $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
                                
                                    foreach($get_categories as $fetch_data){
                                        
                                        $category_id   = $fetch_data['categories_id'];
                                        $category_name = $fetch_data['name'];
                                        $font_icon     = $fetch_data['font_icon'];
                                        $get_cate_total_vouchers = $this->db->get_where('coupons', array('categories_id'=>$category_id, 'status'=>'Active'))->num_rows();
                                ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                        <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
                                        </font>

                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="border-r">
                                    <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien'?>" title="Alle Kategorien">
                                        <i class="" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alle Kategorien</font>
                                        </font>

                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                    </a>
                                </li>
                        </ul>
                        <li style="">
                            <div class="nav_inner_boxes_mbl" title="Verkaufswerbung">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;color:black"><a class="" style="color:white;text-decoration: none;" href="<?php echo base_url();?>kategorien/13">Verkaufswerbung</a></font>
                                </font>
                            </div>
                        </li>
                        */ ?>
                    </ul>
    </div>
<?php /* <header id="cs-header">
    <div class="cs-header-outer fix_header_nav">
        <div class="js-header-container container custom_header">
            <!-- Logo + Suchfeld -->
            <div class="row ">
                <div class=" main_sreach_area">
                    <!-- Logo -->
                    <button type="button" class="cs-header-menu-btn col-xs-2 hidden-lg hidden-md hidden-sm navbar-toggle collapsed show-and-hide " id="open_menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="">
                        <span class="sr-only">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Toggle navigation</font>
                            </font>
                        </span>
                        <span class="icon-bar" ></span>
                        <span class="icon-bar" style="background: #eac398;"></span>
                        <span class="icon-bar" style="background: #eac398;"></span>
                    </button>
                    <div class="col-sm-4 col-xs-8 search-area show-and-hide" style="">
                        <a class="cs-header-logo-link" href="<?php echo base_url(); ?>" title="Startseite" style="text-decoration: none;">
                            <div class="cs-header-logo-area logo-m">
                                <div class="cs-header-logo-img" style='margin-bottom: 10px;'>
                                    <img src="<?php echo $system_img_with_path; ?>" width="350px" alt="Voucherr.DE logo">
                                </div>
                                <?php
                                 $flag_desc =  $this->db->get_where('system_settings',array('show_logo_description_flag'))->row()->description;
                                 if($flag_desc==1){
                                 ?>
                                <span class="cs-header-logo-slogan hidden-xs">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Perfektes  </font>
                                    </font>
                                    <span class="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Sparerlebnis.</font>
                                        </font>
                                    </span>
                                </span> 
                                <?php
                                 }
                                ?>
                            </div>
                        </a>
                    </div>
                    <!-- Searchblock -->
                    <div id="#nav_back" style="" class="show-and-hide">
                        <div class="col-sm-4 hidden-xs js-searchblock" style="margin-top: 10px;">
                            <div class="cs-header-searchblock">
                                <form name="search" method="get" action="" id="search_form">
                                    <fieldset>
                                        <div class="controls">
                                            <div class="header_search_icon"><i class="fa fa-search"></i></div>
                                            <input type="text" style="box-shadow:none" class="cs-field-search search_str your-class" name="search_str" id="inp3" placeholder="" value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="desktop-search">
                                            <div class="cs-searchhover js-searchhover" style="display: none;"></div>
                                            <button type="submit" style="background: #5c8374;border-left: 1px solid black;" class="cs-btn-search" onclick="search_text()">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 nav-desktop">
                    <ul class="right_nav_bar">
                                
                                <!-- Coupons By Brand Tab -->
                                <li class="" data-type="show" id="all_coup_nav">
                                    <div class="nav_inner_boxes" title="Gutscheine" id="coupons_nav">
                                        <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Gutscheine</font>
                                        </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav coup_nav_arr all_coup">
                                    </div>
                                    <ul id="all_coup_contant" style="display:none" class=" dropdown_content " >
                                        <?php 
										    $this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_brands = $this->db->get_where('brands', array('status'=>'Active'))->result_array();
											
											foreach($get_brands as $fetch_data){
												$brand_id = $fetch_data['brands_id'];
												$brand_name = $fetch_data['name'];
										?>
                                        <?php
                                        $brand_name_new = "";
                                        $brand_name_array = explode(" ",$brand_name);
                                        if(count($brand_name_array) > 0){
                                            $brand_name_new = str_replace(' ', '-', $brand_name);
                                        }
                                        ?>
                                        <li class="nav_list_item">
                                            <a class="nav_link_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" Alle <?php echo $brand_name ?>>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name;?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow_navs" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="nav_list_item">
                                            <a class="nav_link_item" href="<?php echo base_url().'marken/'?>" title="Alle marken">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Geschäfte von A bis Z </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow_navs" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
									 
                                </li>  
                                <ul id="coupons_nav_id"  class="cs-dropdown-menu-2-cols small_scc small_all_coup" >
                                        <?php 
										    $this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_brands = $this->db->get_where('brands', array('status'=>'Active','sort_order!='=>'0'))->result_array();
											
											foreach($get_brands as $fetch_data){
												$brand_id = $fetch_data['brands_id'];
												$brand_name = $fetch_data['name'];
                                                $brand_name_new = "";
                                                $brand_name_array = explode(" ",$brand_name);
                                                if(count($brand_name_array) > 0){
                                                    $brand_name_new = str_replace(' ', '-', $brand_name);
                                                }
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new;?>" all <?php echo $brand_name ?> Gutscheine">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name." Gutscheine"?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'?>" title="All brands">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">All shops from A to Z </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>								
                                <!-- Latest Coupons Tab -->
                                <?php	
							if($lastest_copuon==1){ 
                                ?>
                                 <li class="" data-type="show" id="coup" class="border-r">
                                    <div class="nav_inner_boxes" title="Neueste Gutscheine">
                                        <font style="vertical-align: inherit;">
                                    
                                            <font style="vertical-align: inherit;">Neueste Gutscheine</font>
                                        </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav coup"></span>
                                    </div>
                                    <ul class="dropdown-menu dropdown_content cs-dropdown-menu-2-cols" >
                                        <?php 									  
												$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
												
											foreach($get_latest_coupons as $key => $fetch_data){
												$coupon_id     = $fetch_data['coupons_id'];
												$brand_name    = $fetch_data['brand_name'];
												$brands_id     = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												$publish_date  = $fetch_data['date_added'];
												
												$get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
																								
												 $published_date         = strtotime($publish_date);
												 $current_date           = strtotime(date('Y-m-d h:i:s'));
												 $days                   = abs(($current_date - $published_date)/86400);
												 $hours                  = abs(($days)*24);
												 $minuts                 = abs(($days)*24*60);
												 $second                 = abs(($days)*24*60*60);
                                                 if(floor($days)=="1"){
                                                    $day_men = "Tag"; 
                                                 }
                                                 else{
                                                    $day_men = "Tage"; 
                                                 }
                                                 $show_time = floor($days)." ".$day_men;  
												   if($days<1){
													$show_time = floor($hours)." hours"; 
													if($hours<1){
													  $show_time = floor($minuts)." minutes"; 
													  if($minuts<1){
														$show_time = floor($second)." seconds";   
													  }
													}	
                                                   }										
                                                   $brand_name_new = "";
                                                   $brand_name_array = explode(" ",$brand_name);
                                                   if(count($brand_name_array) > 0){
                                                       $brand_name_new = str_replace(' ', '-', $brand_name);
                                                   }
												  									
													
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                   

                                                <font style="vertical-align: inherit;">
                                                    <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                                </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle aktuelle gutscheine</font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>								
                                </li>
								<ul class=" cs-dropdown-menu-2-cols small_scc small_coup" >
                                        <?php 
												$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
												
											foreach($get_latest_coupons as $key => $fetch_data){
												$coupon_id     = $fetch_data['coupons_id'];
												$brand_name    = $fetch_data['brand_name'];
												$brands_id     = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												$publish_date  = $fetch_data['date_added'];
												
												$get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
																								
												 $published_date         = strtotime($publish_date);
												 $current_date           = strtotime(date('Y-m-d h:i:s'));
												 $days                   = abs(($current_date - $published_date)/86400);
												 $hours                  = abs(($days)*24);
												 $minuts                 = abs(($days)*24*60);
												 $second                 = abs(($days)*24*60*60);
												 
												
													$show_time = floor($hours)." hours"; 
													if($hours<1){
													  $show_time = floor($minuts)." minutes"; 
													  if($minuts<1){
														$show_time = floor($second)." seconds";   
													  }
													}											
                                                    $brand_name_new = "";
                                                    $brand_name_array = explode(" ",$brand_name);
                                                    if(count($brand_name_array) > 0){
                                                        $brand_name_new = str_replace(' ', '-', $brand_name);
                                                    }											  									
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new; ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                                </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li class="border-r">
                                        <?php } ?>
                                        <li>
                                            <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">All Latest Coupons </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                              <?php }
                               ?> 
                                <!-- Best Coupons Tab -->
                                <?php                            
                                if($trending_copuon!=0){
                                ?>
                                <li class="" data-type="show"  id="trend" class="border-r">
                                    <div class="nav_inner_boxes cate_item" title="Trendige Gutscheine ">
                                        <font style="vertical-align: inherit;">
                                        
                                            <font style="vertical-align: inherit;">Trendige Gutscheine </font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav trend">
                                    </div>
                                    <ul class="dropdown-menu dropdown_content cs-dropdown-menu-2-cols" >
                                        <?php 
											$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();
												
											foreach($get_latest_coupons as $key=> $fetch_data){
												$coupon_id = $fetch_data['coupons_id'];
												$brand_name = $fetch_data['brand_name'];
												$brands_id = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												
											    $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active','end_date >'=>$date))->num_rows();

                                                $brand_name_new = "";
                                                $brand_name_array = explode(" ",$brand_name);
                                                if(count($brand_name_array) > 0){
                                                    $brand_name_new = str_replace(' ', '-', $brand_name);
                                                }
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new;  ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/coupons/trending/'?>" title="Alle Trendige Gutscheine ">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Trendige Gutscheine </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                </li> 
                                <?php  } ?>
								<ul class=" cs-dropdown-menu-2-cols small_scc small_trend" >
                                        <?php 
											$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();												
											foreach($get_latest_coupons as $key=> $fetch_data){
												$coupon_id = $fetch_data['coupons_id'];
												$brand_name = $fetch_data['brand_name'];
												$brands_id = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												
											    $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
                                                $brand_name_new = "";
												$brand_name_array = explode(" ",$brand_name);
												if(count($brand_name_array) > 0){
													$brand_name_new = str_replace(' ', '-', $brand_name);
												}
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'.$brand_name_new ?>" all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li> 
                                        <?php } ?>                                     
                                    </ul>
                                <!-- Top Categories Tab -->
                                <li class="" id="cat_nav" data-type="show" class="border-r">
                                    <div class="nav_inner_boxes" title="Kategorien">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Kategorien</font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow_my_nav cate_nav_arr">
                                    </div>
                                    <ul class="dropdown_content_kate " id="cate_nav_content" style="display:none"  >
                                        <?php 
											$this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();											
											$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
									
											foreach($get_categories as $fetch_data){
												
												$category_id   = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												$font_icon     = $fetch_data['font_icon'];
									            $get_cate_total_vouchers = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$category_id' AND `status` = 'Active' AND (end_date >= '".$date."' OR end_date = '0000-00-00')")->num_rows();
                                       ?>
                                        <li class="nav_list_item_kate">
                                            <a class="nav_link_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                                <div>
                                                <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
                                                </font>
                                                </div>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="nav_list_item_kate">
                                            <a class="nav_link_item" href="<?php echo base_url().'kategorien'?>" title="Alle Kategorien">
                                                <div>
                                                <i class="" aria-hidden="true"></i>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Kategorien </font>
                                                </font>

                                                </div>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<ul class="cs-dropdown-menu-2-cols small_scc small_cat" >
                                        <?php 
											$this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();
												
											$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
										
											foreach($get_categories as $fetch_data){
												
												$category_id   = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												$font_icon     = $fetch_data['font_icon'];
												$get_cate_total_vouchers = $this->db->get_where('coupons', array('categories_id'=>$category_id, 'status'=>'Active'))->num_rows();
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                                <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien'?>" title="Alle Kategorien">
                                                <i class="" aria-hidden="true"></i>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Kategorien</font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                <li style="">
                                    <div class="nav_inner_boxes" title="Verkaufswerbung">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><a class="" style="text-decoration: none;color:black" href="<?php echo base_url();?>kategorien/13">Verkaufswerbung</a></font>
                                        </font>
                                    </div>
                                </li>
                    </ul>
                    </div>
                    <div class="show-and-hide">
                        <div class="col-sm-2 display-no icon-top">
                            <div class="" id="search_me">
                                <!-- <i class="fa fa-search icon-left"  style="display:none"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="searchContainer" style="display:none">
                        <i class="fa fa-search searchIcon"></i>
                        <input class="searchBox search_str" autocomplete="off" type="search" name="search" placeholder="Search..." id="inp4">
                        <span class="close-cross" id="nav_back">x</span>
                    </div>
                </div>
                <div id="show_suggestion" style="position:relative">
                </div>
                <div class="row" id="hedSection">
                    <div id="mobil-search" class="collapse">
                        <div class="col-sm-12 js-searchblock">
                            <div class="cs-header-searchblock">
                                <form name="search" autocomplete="off" method="get" id="search_form_mob" action="">
                                    <fieldset>
                                        <div class="controls">
                                            <input type="text" class="cs-field-search " name="search_str_mob" id="search_str_mob" placeholder="Enter a search term..." value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="mobil-search">
                                            <button type="button" class="cs-btn-search" onclick="search_text_mob()">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">search</font>
                                                </font>
                                            </button>
                                            <div class="cs-searchhover js-searchhover"></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile_div" >
                <div class="mobile_option">
                  <div class="srec_sreac">
                    <i class="fa fa-search search_icon"></i>
                  </div>
                   <input type="search"  id="inp2"  class="mobile_inp searchBox search_str search_str_mbl">
                  <div class="enter_sreac" onclick="search_text_mbl()">
                    <i class="fa fa-chevron-right search_icon"></i>
                  </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</header> */ ?>
<header id="cs-header">
    <div class="cs-header-outer">
        <div class="js-header-container container">
            <!-- Logo + Suchfeld -->
            <div class="row cs-header-inner height-header">
                <div class="row main_sreach_area">
                    <!-- Logo -->
                    <button type="button" class="cs-header-menu-btn col-xs-2 hidden-lg hidden-md hidden-sm navbar-toggle collapsed show-and-hide" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="">
                        <span class="sr-only">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Toggle navigation</font>
                            </font>
                        </span>
                        <span class="icon-bar" ></span>
                        <span class="icon-bar" style="background: #eac398;"></span>
                        <span class="icon-bar" style="background: #eac398;"></span>
                    </button>
                    <div class="col-sm-6 col-xs-8 search-area show-and-hide" style="">
                        <a class="cs-header-logo-link" href="<?php echo base_url(); ?>" title="To home page" style="text-decoration: none;">
                            <div class="cs-header-logo-area logo-m">
                                <div class="cs-header-logo-img" style='margin-bottom: 10px;'>
                                    <img src="<?php echo $system_img_with_path; ?>" width="350px" alt="Voucherr.DE logo">
                                </div>
                                <span class="cs-header-logo-slogan hidden-xs">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Perfektes  </font>
                                    </font>
                                    <span class="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Sparerlebnis.</font>
                                        </font>
                                    </span>
                                </span>
                                
                            </div>
                        </a>


                    </div>



                    <!-- Searchblock -->
                    <div id="#nav_back" style="" class="show-and-hide">
                        <div class="col-sm-6 hidden-xs js-searchblock" style="margin-top: 10px; position: relative;">
                            <div class="triangle" style=""></div>
                            <div class="cs-header-searchblock">
                                <form name="search" method="get" action="" id="search_form">
                                    <fieldset>
                                        <div class="controls">
                                            <div class="header_search_icon"><i class="fa fa-search"></i></div>
                                            <input type="text" style="box-shadow:none" class="cs-field-search search_str your-class" name="search_str" id="inp3" placeholder="" value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="desktop-search">
                                            <div class="cs-searchhover js-searchhover" style="display: none;"></div>
                                            <button type="submit" style="background: #5c8374;border-left: 1px solid black;" class="cs-btn-search" onclick="search_text()">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>

    
    

                            </div>
                            <div id="show_suggestion" style="position:relative">

                            </div>

                        </div>
                    </div>
                    <div class="show-and-hide">
                        <div class="col-sm-2 display-no icon-top">
                            <div class="" id="search_me">
                                <i class="fa fa-search icon-left"  style="display:none"></i>
                            </div>
                        </div>
                    </div>

                    <div class="searchContainer" style="display:none">
                        <i class="fa fa-search searchIcon"></i>
                        <input class="searchBox search_str" type="search" name="search" placeholder="Search..." id="inp4">
                        <span class="close-cross" id="nav_back">x</span>
                    </div>

                </div>


                
                <div class="row">
                    <div id="mobil-search" class="collapse">
                        <div class="col-sm-12 js-searchblock">
                            <div class="cs-header-searchblock">
                                <form name="search" method="get" id="search_form_mob" action="">
                                    <fieldset>
                                        <div class="controls">
                                            <input type="text" class="cs-field-search " name="search_str_mob" id="search_str_mob" placeholder="Enter a search term..." value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="mobil-search">
                                            <button type="button" class="cs-btn-search" onclick="search_text_mob()">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">search</font>
                                                </font>
                                            </button>
                                            <div class="cs-searchhover js-searchhover"></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs-header-navi main-nav main-nav-scrolled">
            <div class="container">
                <!-- Mainnavi -->
                <!-- <div id="js-sticky-search-toggle" class="cs-header-logo-img" style="background-color: #fff; padding: 5px;">
					<img src="<?php echo $system_img_with_path; ?>" width="250px" alt="COUPONS.DE logo">
				 </div> -->
                <nav class="cs-main-nav navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Menu Tabs -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="cs-header-ul nav navbar-nav">
                                <li class="menu_logo" style="display:none" class="border-r">
                                    <img src="<?php echo base_url('assets/admin/assets/images/logo_ticket_white.gif');?>">
                                </li>
                                <!-- Coupons By Brand Tab -->
                                <li class="dropdown disblo cs-navi-item cs-main-nav-c4u border-r" data-type="show" id="all_coup">
                                    <div class="cs-main-nav-item" title="Gutscheine" id="coupons_nav">
                                        <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Shops</font>
                                        </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow all_coup">
                                    </div>
                                    <?php /*
                                    <ul id="coupons_nav_id" class="dropdown-menu cs-dropdown-menu-2-cols " style="width: 700px;">
                                        
                                        <?php 
										    $this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_brands = $this->db->get_where('brands', array('status'=>'Active','sort_order!='=>'0'))->result_array();
											
											foreach($get_brands as $fetch_data){
												$brand_id = $fetch_data['brands_id'];
												$brand_name = $fetch_data['name'];
                                                $brand_slug = '';
                                                $brand_name_array = explode(" ",$brand_name);
                                                if(count($brand_name_array) > 0){
                                                    $brand_slug = str_replace(' ', '-', $brand_name);
                                                }
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url()."marken/".$brand_slug; ?>" title="to all <?php echo $brand_name ?> Gutscheine">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name." Gutscheine"?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'?>" title="All brands">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Geschäfte von A bis Z </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul> */ ?>
									 
                                </li>  
                                <?php /*
                                    <ul id="coupons_nav_id"  class="cs-dropdown-menu-2-cols small_scc small_all_coup" >
                                        <?php 
										    $this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_brands = $this->db->get_where('brands', array('status'=>'Active','sort_order!='=>'0'))->result_array();
											
											foreach($get_brands as $fetch_data){
												$brand_id = $fetch_data['brands_id'];
												$brand_name = $fetch_data['name'];
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/brands/'.$brand_id ?>" title="to all <?php echo $brand_name ?> Gutscheine">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name." Gutscheine"?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'marken/'?>" title="All brands">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">All shops from A to Z </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                    */ ?>							
                                <?php /*
                                <!-- Latest Coupons Tab -->
                                <li class="dropdown disblo cs-navi-item cs-main-nav-c4u" data-type="show" id="coup" class="border-r">
                                    <div class="cs-main-nav-item" title="Neueste Gutscheine">
                                        <font style="vertical-align: inherit;">
                                    
                                            <font style="vertical-align: inherit;">Neueste Gutscheine</font>
                                        </font><img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow coup"></span>
                                    </div>
                                    <ul class="dropdown-menu cs-dropdown-menu-2-cols" style="width: 700px;">
                                        <?php 
										  
											/* $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND  ORDER BY cpn.coupons_id DESC limit 15")->result_array(); * /
												$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
												
											foreach($get_latest_coupons as $key => $fetch_data){
												$coupon_id     = $fetch_data['coupons_id'];
												$brand_name    = $fetch_data['brand_name'];
												$brands_id     = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												$publish_date  = $fetch_data['date_added'];
												
												$get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
																								
												 $published_date         = strtotime($publish_date);
												 $current_date           = strtotime(date('Y-m-d h:i:s'));
												 $days                   = abs(($current_date - $published_date)/86400);
												 $hours                  = abs(($days)*24);
												 $minuts                 = abs(($days)*24*60);
												 $second                 = abs(($days)*24*60*60);
                                                 if(floor($days)=="1"){
                                                    $day_men = "Tag"; 
                                                 }
                                                 else{
                                                    $day_men = "Tage"; 
                                                 }
                                                 $show_time = floor($days)." ".$day_men;  
												   if($days<1){
													$show_time = floor($hours)." hours"; 
													if($hours<1){
													  $show_time = floor($minuts)." minutes"; 
													  if($minuts<1){
														$show_time = floor($second)." seconds";   
													  }
													}	
                                                   }										
												  
												  									
													
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/brands/'.$brands_id ?>" title="to all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                    <?php /*<font style="vertical-align: inherit;"><?php echo $brand_name.'<br>('.$category_name.')' ?></font>* / ?>
                                                <!-- <font style="vertical-align: inherit;"><?php /* echo $brand_name.' ('.$get_total_vouchers.' vouchers)' * / ?></font>-->

                                                <font style="vertical-align: inherit;">
                                                    <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                                </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle aktuelle gutscheine</font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
									
									
									
                                </li>
								<ul class=" cs-dropdown-menu-2-cols small_scc small_coup" >
                                        <?php 
										  
											/* $get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND  ORDER BY cpn.coupons_id DESC limit 15")->result_array(); * /
												$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.lastest_order!='' AND cpn.lastest_order!='0'   ORDER BY cpn.lastest_order ASC limit 15")->result_array();
												
											foreach($get_latest_coupons as $key => $fetch_data){
												$coupon_id     = $fetch_data['coupons_id'];
												$brand_name    = $fetch_data['brand_name'];
												$brands_id     = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												$publish_date  = $fetch_data['date_added'];
												
												$get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
																								
												 $published_date         = strtotime($publish_date);
												 $current_date           = strtotime(date('Y-m-d h:i:s'));
												 $days                   = abs(($current_date - $published_date)/86400);
												 $hours                  = abs(($days)*24);
												 $minuts                 = abs(($days)*24*60);
												 $second                 = abs(($days)*24*60*60);
												 
												
													$show_time = floor($hours)." hours"; 
													if($hours<1){
													  $show_time = floor($minuts)." minutes"; 
													  if($minuts<1){
														$show_time = floor($second)." seconds";   
													  }
													}											
												  
												  									
													
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/brands/'.$brands_id ?>" title="to all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <font style="vertical-align: inherit;">
                                                    <?php /*<font style="vertical-align: inherit;"><?php echo $brand_name.'<br>('.$category_name.')' ?></font>* / ?>
                                                <!-- <font style="vertical-align: inherit;"><?php /* echo $brand_name.' ('.$get_total_vouchers.' vouchers)' * / ?></font>-->

                                                <font style="vertical-align: inherit;">
                                                    <?php echo $brand_name.'<span> ('.''.$show_time.' ago)</span>' ?>
                                                </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li class="border-r">
                                        <?php } ?>
                                        <li>
                                            <a class="cs-main-nav-link cate_item" style="padding: 10px;" href="<?php echo base_url().'home/coupons/latest/'?>" title="All Latest Coupons">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">All Latest Coupons </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                <!-- Best Coupons Tab -->
                                <li class="dropdown disblo cs-navi-item cs-main-nav-c4u" data-type="show"  id="trend" class="border-r">
                                    <div class="cs-main-nav-item cate_item" title="Trendige Gutscheine">
                                        <font style="vertical-align: inherit;">
                                        
                                            <font style="vertical-align: inherit;">Trendige Gutscheine</font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow trend">
                                    </div>
                                    <ul class="dropdown-menu cs-dropdown-menu-2-cols" style="width: 700px;">
                                        <?php 
											$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();
												
											foreach($get_latest_coupons as $key=> $fetch_data){
												$coupon_id = $fetch_data['coupons_id'];
												$brand_name = $fetch_data['brand_name'];
												$brands_id = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												
											    $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active','end_date >'=>$date))->num_rows();
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/brands/'.$brands_id ?>" title="to all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <!--<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$category_name.')' ?></font>
														</font>-->
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">

                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/coupons/trending/'?>" title="Alle trendige gutscheine">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle trendige gutscheine</font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<ul class=" cs-dropdown-menu-2-cols small_scc small_trend" >
                                        <?php 
											$get_latest_coupons = $this->db->query("SELECT cpn.*, brand.brands_id, brand.name as brand_name, cat.name as category_name
												FROM coupons as cpn
												LEFT JOIN brands as brand ON cpn.brands_id = brand.brands_id
												LEFT JOIN categories as cat ON cpn.categories_id = cat.categories_id
												WHERE cpn.status = 'Active' AND cpn.trending = '1' AND trending_order!='' AND trending_order !='0' ORDER BY cpn.trending_order ASC LIMIT 15")->result_array();
												
											foreach($get_latest_coupons as $key=> $fetch_data){
												$coupon_id = $fetch_data['coupons_id'];
												$brand_name = $fetch_data['brand_name'];
												$brands_id = $fetch_data['brands_id'];
												$category_name = $fetch_data['category_name'];
												
											    $get_total_vouchers = $this->db->get_where('coupons', array('brands_id'=>$brands_id, 'status'=>'Active'))->num_rows();
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/brands/'.$brands_id ?>" title="to all <?php echo $brand_name.' ('.$category_name.')' ?> vouchers">
                                                <!--<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$category_name.')' ?></font>
														</font>-->
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $brand_name.' ('.$get_total_vouchers.' Gutscheine)' ?></font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">

                                            </a>
                                        </li> 
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'home/coupons/trending/'?>" title="All Trending Coupons">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">All Trending Coupons </font>
                                                </font>
                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                */ ?>
                                <!-- Top Categories Tab -->
                                <li class="dropdown disblo cs-navi-item cs-main-nav-c4u" id="cat" data-type="show" class="border-r">
                                    <div class="cs-main-nav-item" title="Kategorien">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Kategorien</font>
                                        </font>
                                        <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow cat">
                                    </div>
                                    <!--<ul class="dropdown-menu">
										<?php 
											$get_categories = $this->db->get_where('categories', array('status'=>'Active'))->result_array();
											foreach($get_categories as $fetch_data){
												$category_id = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												
												
												
										?>
												<li>
													<a class="cs-main-nav-link" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>" >
														<i class="fa fa-shopping-bag"></i>
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $category_name; ?></font>
														</font>
													</a>
												</li>
										<?php } ?>
									</ul>-->
                                    <ul class="dropdown-menu cs-dropdown-menu-2-cols " style="width: 700px;" >
                                        <?php 
											$this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();
												
											$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
										
											foreach($get_categories as $fetch_data){
												
												$category_id   = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												$font_icon     = $fetch_data['font_icon'];
												$get_cate_total_vouchers = $this->db->get_where('coupons', array('categories_id'=>$category_id, 'status'=>'Active','end_date >'=>$date))->num_rows();
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                                <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' voucherss)'?></font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien'?>" title="All Kategorien ">
                                                <i class="" aria-hidden="true"></i>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Kategorien </font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<ul class="cs-dropdown-menu-2-cols small_scc small_cat" >
                                        <?php 
											$this->db->limit(15);
											$this->db->order_by('sort_order','ASC');
											$get_categories = $this->db->get_where('categories', array('status'=>'Active','sort_order!='=>'0'))->result_array();
												
											$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
										
											foreach($get_categories as $fetch_data){
												
												$category_id   = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												$font_icon     = $fetch_data['font_icon'];
												$get_cate_total_vouchers = $this->db->get_where('coupons', array('categories_id'=>$category_id, 'status'=>'Active'))->num_rows();
										?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>">
                                                <img style="filter: invert(6.5);" class="cate_image" src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li class="border-r">
                                            <a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien'?>" title="All categories">
                                                <i class="" aria-hidden="true"></i>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Alle Kategorien</font>
                                                </font>

                                                <img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
                                            </a>
                                        </li>
                                    </ul>
                                <li class="dropdown cs-navi-item cs-main-nav-c4u" class="border-r" style="border-right:1px solid #e2e2e2 !important">
                                    <div class="cs-main-nav-item" title="Verkaufswerbung">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"><a class="" style="color: white;text-decoration: none;" href="<?php echo base_url();?>kategorien/11">Verkaufswerbung</a></font>
                                        </font>
                                        <!--<img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="menu_arrow">-->
                                    </div>
                                    <!--<ul class="dropdown-menu">
										<?php 
											$get_categories = $this->db->get_where('categories', array('status'=>'Active'))->result_array();
											foreach($get_categories as $fetch_data){
												$category_id = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												
												
												
										?>
												<li>
													<a class="cs-main-nav-link" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>" >
														<i class="fa fa-shopping-bag"></i>
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $category_name; ?></font>
														</font>
													</a>
												</li>
										<?php } ?>
									</ul>-->
                                    <!--<ul class="dropdown-menu cs-dropdown-menu-2-cols " style="width: 700px;">
											<?php 
											$this->db->limit(15);
											$get_categories = $this->db->get_where('categories', array('status'=>'Active'))->result_array();
											$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
											foreach($get_categories as $fetch_data){
												
												$category_id   = $fetch_data['categories_id'];
												$category_name = $fetch_data['name'];
												$font_icon     = $fetch_data['font_icon'];
												$get_cate_total_vouchers = $this->db->get_where('coupons', array('categories_id'=>$category_id, 'status'=>'Active'))->num_rows();
										?>
												<li>
													<a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien/'.$category_id ?>" title="<?php echo $category_name; ?>" > 
													    <img style="filter: invert(6.5);" class="cate_image"  src="<?php echo base_url().$cat_icon_url.$font_icon; ?>" aria-hidden="true">
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $category_name.' ('.$get_cate_total_vouchers.' Gutscheine)'?></font>
														</font>
														  
														<img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
													</a>
												</li>
										<?php } ?>
										<li>
											<a class="cs-main-nav-link cate_item" href="<?php echo base_url().'kategorien'?>" title="All categories" >
												<i class="" aria-hidden="true"></i>
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">All categories</font>
												</font>
												
												<img src="<?php echo base_url('uploads/static_content/arrow-2.png');?>" class="cate_arrow" style="float:right;">
											</a>
										</li>										 
									</ul>-->
                                </li>
                                </ul>
                            <div id="search-toggle" class="search-toggle" style="display:none">
                                <div id="desktop-search" style="position:absolute;left:77%">
                                    <div class=" hidden-xs js-searchblock">
                                        <div class="cs-header-searchblock">
                                            <form name="search" method="get" action="" id="search_form">
                                                <fieldset>
                                                    <div class="controls cntrol-set">
                                                        <div class="header_search_icon" style="height: 42px;position:relative;top: 0px;background: transparent;border:none">
                                                            <i class="fa fa-search fa-search33"></i>
                                                        </div>
                                                        <input type="text" class="change cs-field-search search_str setting-input" name="search_str" id="inp2" placeholder="" data-type="sticky_sreach" value="<?php if(!empty($search_query)) echo $search_query ?>" autocomplete="off" data-input-name="desktop-search">
                                                        <div class="cs-searchhover js-searchhover" style="display: none;"></div>
                                                        <button type="submit" style="height: 42px;left: 4px;position: relative;top: 10px;border:none" class="cs-btn-search" onclick="search_text()">
                                                            <i class="fa fa-chevron-right" style="font-size: 16px;"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Such Icon nach Scroll -->
                            <!-- <div id="js-sticky-search-toggle" class="cs-navi-search cs-navbar-afterscroll-button" data-toggle="collapse" data-target="#sticky-nav-search" onclick="ga(&#39;send&#39;,&#39;event&#39;,&#39;search-icon&#39;,&#39;sticky-search&#39;);" style="display: block;">
								<i class="fa fa-search" style="color:red" ></i> 
							</div> -->
                            <!-- Searched Content Area -->

                            <style>
                                .layout-search__results.search__opened {
                                    display: block;
                                }

                                .layout-search_placement_header-desktop .layout-search__results {
                                    position: absolute;
                                    top: 100%;
                                    margin: 11px -7.5px 0;
                                    border-radius: 4px;
                                    box-shadow: 0 0 6px #f0f0f0;
                                }

                                .layout-search__results {
                                    position: fixed;
                                    right: 0;
                                    left: 0;
                                    max-height: 80vh;
                                    display: none;
                                    overflow-y: auto;
                                    background: #fff;
                                    box-shadow: 0 0 0 1px rgb(39 41 43 / 5%), 0 1px 2px 0 rgb(0 0 0 / 5%);
                                    z-index: 2048;
                                }
                            </style>
                            <!-- Searched Content Area -->
                        </div>
                        <!-- Suche -->
                        <div id="sticky-nav-search" class="collapse cs-sticky-nav-search">
                            <!-- Searchblock -->
                            <div class="col-sm-12 js-searchblock">
                                <div class="cs-header-searchblock">
                                    <form name="search_navi" class="cs-header-searchblock-form" method="get" action="#">
                                        <fieldset>
                                            <div class="controls">
                                                <div class="cs-sticky-nav-search-container">
                                                    <input type="text" id="sticky_sreach" class="cs-field-search js-coupons-search search_str" name="search_str" placeholder="Enter search term..." value="" autocomplete="off" data-input-name="sticky-nav-search">
                                                    <div class="cs-searchhover js-searchhover" style="display: none;"></div>
                                                    <button type="submit" class="cs-btn-search"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <style>
        .Nfw7 {
            width: 100%;
            display: block;
            white-space: nowrap;
        }

        ._2dXN {
            vertical-align: top;
            display: inline-block;
        }

        .promotion-list-swiper__item {
            margin-right: 2rem;
            height: 4rem;
            width: 5rem;
            padding-top: .75rem;
            padding-bottom: .75rem;
        }

        ._1_v9 {
            height: 100%;
            width: 100%;
        }

        ._1_v9,
        .CxrG {
            top: 0;
            left: 0;
        }
    </style>
    <?php
     if($page_name == 'home'){
      $this->load->view('home/theme/slider');
     } ?>
    <?php if($page_name == 'home'){ ?>
    <div carousel="shops" id="carousel_u" class="Nfw7 brand_bar" style="transform: translateX(0px); transition: transform 200ms cubic-bezier(0.4, 0, 1, 1) 0s;">
    </div>
    <div class="cs-header-navi-placeholder" style="height: 42px;"></div>
    <!-- Icon Text bar removed form here -->
    <div class="cs-home-selection cs-header-teaser" style="padding-top:20px !important;">
        <div class="container" style="padding: 0; border-radius: 20px; overflow: hidden;/*border-bottom: 3px solid #5c8374; padding-bottom: 50px;*/">
            <?php
				
				$get_slider_images = $this->db->order_by('slider_images_id', 'desc')->limit(6)->get_where('slider_images', array('status'=>'Active'))->result_array();

				// $get_brand_sliders = $this->db->order_by('brands_id', 'desc')->get_where('brands', array('status'=>'Active', 'show_slider'=>'1'))->result_array();
				// $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
				$brand_slider_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
			?>
            <!-- Teaser -->
            <div class="row cs-slider-teaser js-slider-teaser">
                <!-- Slider Teaser Img -->
                <div class="cs-slider-teaser-slides">
                    <?php 
						$count_s_top = 0;
						foreach($get_slider_images as $fetch_data){
							$count_s_top++;
							// $image_name = $fetch_data['image_name'];
							$slider_id = $fetch_data['slider_images_id'];
							$slider_image = $fetch_data['image_name'];
							$website_url = $fetch_data['website_url'];
							
							$display = '';
							if($count_s_top == '1'){
								$display = 'block';
							} else {
								$display = 'none';
							}
					?>
                    <div id="js-teaser-image-<?php echo $count_s_top ?>" class="js-teaser-image" data-nr="<?php echo $count_s_top ?>" style="display: <?php echo $display ?>;">
                        <a href="<?php echo $website_url ?>" onclick="ga(&#39;send&#39;,&#39;event&#39;,&#39;Werbebanner&#39;,&#39;Startseite: Teaser&#39;,&#39;<?php echo $website_url ?>;);" class="cs_slider_image">
                            <img class=" lazyloaded" src="<?php echo base_url().$brand_slider_imgs_url.$slider_image; ?>" data-src="<?php echo base_url().$brand_slider_imgs_url.$slider_image; ?>" alt="" title="">
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Slider Teaser Preview item -->
                <div class="cs-slider-teaser-preview display-n2">
                    <ul class="cs-flex-mobil">
                        <?php 
						$count_s_bot = 0;
						foreach($get_slider_images as $fetch_data){
							$count_s_bot++;
							// $image_name = $fetch_data['image_name'];
							$slider_id = $fetch_data['slider_images_id'];
							$slider_image = $fetch_data['image_name'];
							$website_url = $fetch_data['website_url'];
						?>
                        <li class="cs-slider-teaser-preview-li cs-slides-teaser-6">
                            <div class="cs-slider-teaser-preview-item js-teaser-btns" id="js-teaser-btn-<?php echo $count_s_bot ?>" data-nr="<?php echo $count_s_bot ?>" style="border-bottom: 8px solid rgb(255, 255, 255);">
                                <a class="cs-slider-teaser-preview-item-a" href="<?php echo $website_url ?>" onclick="ga(&#39;send&#39;,&#39;event&#39;,&#39;Werbebanner&#39;,&#39;Startseite: Teaser Button&#39;,&#39;<?php echo $website_url ?>;);">
                                    <img class="cs-slider-teaser-preview-img js-teaser-btn-img lazyloaded" src="<?php echo base_url().$brand_slider_imgs_url.$slider_image; ?>" data-src="<?php echo base_url().$brand_slider_imgs_url.$slider_image; ?>" alt="Button <?php echo $count_s_bot ?>" style="opacity: 0.4;">
                                </a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
        </div>
    </div>
    </div>
    <?php } ?>
</header>
<?php
     if($page_name == 'home'){
    //  $this->load->view('home/theme/slider');
     } ?>

