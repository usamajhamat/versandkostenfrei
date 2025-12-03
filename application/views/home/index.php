<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- TradeDoubler site verification 3246011 -->
      <meta http-equiv="content-type" content="text/html;charset=UTF-8">
      <meta name="google-site-verification" content="bpyKEzGtzNLTTppqycEwlmhBTADCxsVNiO5nbGsTYrc" />
      <meta name="fo-verify" content="bbfe3a4c-4db9-4fa1-9b9c-7ff62bc2f3b9">
     
      <?php
         $canonical = base_url();
         setlocale(LC_TIME, 'de_DE', 'de_DE.UTF-8');
         $title = "";
         $description = "";
         $description = "";
         if($page_name=="home"){
         $seoData     = $this->db->get_where('seo_setting',array('page_name'=>"Home page"))->row();
         /* 	echo	$this->db->last_query(); exit; */
         $title       = $seoData->title;
         $description = $seoData->description;
         $meta        = $seoData->meta;
         ?> 
      <?php
         } 
         else if($page_name=="brands"){
            $canonical =  $canonical."marken";
         	//  setlocale(LC_TIME, 'de_DE', 'de_DE.UTF-8');
         	if(!empty($param1) && empty($letter)){
            $canonical =  $canonical."/".$main_page;
         	$brnads_eoData     = $this->db->get_where('brands',array('brands_id'=>$param1))->row();
         	$title       = $brnads_eoData->seo_title." im ".strftime("%B")." ".strftime("%Y");
         	$description = $brnads_eoData->seo_description;
         	$meta        = $brnads_eoData->seo_key_words;
         ?>
      <?php
         }
         else if(@$letter=="A"){
            $canonical =  base_url()."home/brands/letter/A";
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'a_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="B"){
            $canonical =  base_url()."home/brands/letter/B";
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'b_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="C"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'c_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="D"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'d_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="E"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'e_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="F"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'f_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="G"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'g_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="H"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'h_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="I"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'i_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="J"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'j_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="K"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'k_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="L"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'l_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="M"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'m_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="N"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'n_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="O"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'o_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="P"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'p_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="Q"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'q_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="R"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'r_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="S"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'s_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="T"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'t_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="U"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'u_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="V"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'v_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="W"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'w_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="X"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'x_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="Y"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'y_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="Z"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'z_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else if(@$letter=="0-9"){
            $canonical =  base_url()."home/brands/letter/".$letter;
            $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'0_1_page'))->row();
            $title       = $brnads_eoData->title;
            $description = $brnads_eoData->description;
            $meta        = $brnads_eoData->meta;
         }
         else{
         $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'brands_A_Z'))->row();
         $title       = $brnads_eoData->title;
         $description = $brnads_eoData->description;
         $meta        = $brnads_eoData->meta;
      }
          ?>
      <?php 
        
         }
         else if($page_name=="categories"){
         if(!empty($param1)){
         $canonical =  $canonical."kategorien/".$param1;
         $brnads_eoData     = $this->db->get_where('categories',array('categories_id'=>$param1))->row();
         $title       = $brnads_eoData->seo_title;
         $description = $brnads_eoData->seo_description;
         $meta        = $brnads_eoData->seo_key_words;
         ?>
     
      <?php
         }
         else{
         $canonical =  $canonical."kategorien";
         $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'Main_categories'))->row();
         $title       = $brnads_eoData->title;
         $description = $brnads_eoData->description;
         $meta        = $brnads_eoData->meta;
          ?>
      <?php 
         }
         }
         else if($page_name=="sub_categories"){
         if(!empty($param1)){

         $canonical =  $canonical."home/sub_categories/".$param1;
         $brnads_eoData     = $this->db->get_where('sub_categories',array('sub_categories_id'=>$param1))->row();
         $title       = $brnads_eoData->seo_title;
         $description = $brnads_eoData->seo_description;
         $meta        = $brnads_eoData->seo_key_words;
         ?>
     
      <?php
         }
         else{
          ?>
      <title><?php echo $page_title; ?></title>
      <?php
         }
         }
         
         else if($page_name=="faqs"){
         $canonical =  $canonical."faq";
         $brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'faqs'))->row();
         $title       = $brnads_eoData->title;
         $description = $brnads_eoData->description;
         $meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="about_us"){
            $canonical =  $canonical."ueber-uns";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'about_us'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="advertise"){
            $canonical =  $canonical."home/advertise";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'advertise'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="privacy_policy"){
            $canonical =  $canonical."datenschutz";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'privacy_plolicy'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="imprints"){
            $canonical =  $canonical."Impressum";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'imprints'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="contact_us"){
            $canonical =  $canonical."kontakt";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'contact_us'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="voucher_blog_info"){
            
            $canonical =  $canonical."blogs";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'info_blog'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
         ?>  
     
      <?php
         }
         else if($page_name=="coupons"){
            $canonical =  $canonical."neueste-Rabattcodes";
         	$brnads_eoData     = $this->db->get_where('seo_setting',array('page_name'=>'popular_coupons'))->row();
         	$title       = $brnads_eoData->title;
         	$description = $brnads_eoData->description;
         	$meta        = $brnads_eoData->meta;
       }
       else if($page_name=="special_brands"){
            $canonical =  $canonical.$main_page;
            $title       = $brands_pages->seo_title;
            $description = $brands_pages->seo_description;
            $meta        = $brands_pages->seo_key_words;
         }
         else{
            $title = $page_title;
         ?>
         
      <?php
         }
   
         ?>
 <link rel="canonical" href="<?php echo $canonical;?>" />
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php if(isset($meta)) { echo $meta; } ?>"> 
      <?php $this->load->view('home/theme/top'); ?>
	  <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KTTM4KS4J7"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-KTTM4KS4J7');
        </script>

      <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4102770400209779"
     crossorigin="anonymous"></script>-->
   </head>
   <body class="cs-home-page">
	   <!-- Google Tag Manager (noscript) -->
		<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KT4QRMJ"-->
		<!--height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
		<!-- End Google Tag Manager (noscript) -->
      <!-- Pre-loader start -->
      <div class="theme-loader"><div class="ball-scale"><div class='contain'><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div><div class="ring"><div class="frame"></div></div></div></div></div>
      <div class="modal fade" id="my4Modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 120px;">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Reason For Unsubscribe</h4>
               </div>
               <div class="modal-body">
                  <form id="unsub_form" method="POST">
                     <label>Enter reason for unsubscription:</label>
                     <textarea style="width: 100%;height: 260px;" name="reason" required></textarea>
                     <div style="display: flex;justify-content: center;">
                        <input style="background: #d4730a;color: white;" type="submit" name="submit" class="btn btn-primary" value="Unsubscribe" >
                     </div>
                  </form>
               </div>
               <div class="modal-footer" style="display: flex;justify-content: flex-end;">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="4Modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 230px;">
               <div class="modal-header" style="height: 199px;border: 0px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="margin-top: 12%;font-size: 24px;">You have already unsubscribed</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="suModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 230px;">
               <div class="modal-header" style="height: 199px;border: 0px;background: #5c8374;color: white;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="margin-bottom: 5%;font-size: 24px;">Erfolgreich abonniert</h4>
                  <span>
                  Vielen Dank! Sie haben sich erfolgreich registriert und erhalten umgehend eine E-Mail von uns zur Bestätigung Ihrer Adresse.
                  Wenn Sie innerhalb weniger Minuten keine E-Mail erhalten haben, berprüfen Sie bitte Ihren Spam-Ordner.
                  </span>
               </div>
            </div>
         </div>
      </div>
      <!-- Pre-loader end -->
      <?php $this->load->view('home/theme/header'); ?>
      <?php $this->load->view('home/'.$page_name); ?>
      <?php $this->load->view('modal'); ?>
      <?php $this->load->view('home/theme/footer'); ?>
      <?php $this->load->view('home/theme/script'); ?>
      <!-- <script src="https://www.dwin2.com/pub.1041627.min.js"></script> -->
   </body>
</html>
