<!-- Stylesheets -->    
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/home/slick/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/home/slick/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/home/slick/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/home/css/home_slicks.css">

<div class="container-fluid slider_mains slider-n" >
   <div class="main-slider d-flex align-items-center">
      <?php 
         $get_brands_top = $this->db->get_where('brands', array('status'=>'Active','brand_slider'=>'Yes'))->result_array();
         $brand_img_small_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
         $brand_slider_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
         
         foreach($get_brands_top as $fetch_data){
               if($fetch_data['slider_image']==null || $fetch_data['slider_image']==""){
                  $brand_img = $fetch_data['brand_image'];       
                  $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;        
               }
               else{
                  $brand_img = $fetch_data['slider_image']; 
                  $brand_img_url =  $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
               }
               $brand_name = $fetch_data['name'];
               $brands_id = $fetch_data['brands_id'];
               $website_url = $fetch_data['website_url'];
         	   $brand_name_array = explode(" ",$brand_name);
               if(count($brand_name_array) > 0){
                  $brand_name = str_replace(' ', '-', $brand_name);
               }
            ?>
      <div class="image_div" >
         <?php
            $brand_name_array = explode(" ",$brand_name);
            if(count($brand_name_array) > 0){
               $brand_name = str_replace(' ', '-', $brand_name);
            }
            ?>
         <a href="<?php echo base_url()."marken/".$brand_name; ?>">
         <img class="img-fluid" alt="<?php echo $brand_img_url;?>" src="<?php echo $brand_img_url.$brand_img ?>">
         </a>
      </div>
      <?php } ?>
   </div>
</div>
