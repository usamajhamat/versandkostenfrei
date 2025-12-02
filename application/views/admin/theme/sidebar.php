<?php
	$manage_categories 				= $this->session->userdata('manage_categories');
	$manage_sub_categories 		    = $this->session->userdata('manage_sub_categories');
	$manage_brands 					= $this->session->userdata('manage_brands');
	$manage_coupons 				= $this->session->userdata('manage_coupons');
	$manage_currencies 				= $this->session->userdata('currencies');
	$manage_users 					= $this->session->userdata('manage_users');
	$manage_myprofile 				= $this->session->userdata('manage_myprofile');
	$manage_system_settings 		= $this->session->userdata('system_settings');
	$manage_saving_offers 			= $this->session->userdata('manage_saving_offers');
	$manage_static_content 			= $this->session->userdata('manage_static_content');
	$manage_about_us 			    = $this->session->userdata('manage_about_us');
	$manage_contact_us 			    = $this->session->userdata('manage_contact_us');
	$manage_privacy_policy 			= $this->session->userdata('manage_privacy_policy');
	$manage_faqs 			        = $this->session->userdata('manage_faqs');
	$manage_advertise 			    = $this->session->userdata('manage_advertise');
	$manage_newsletter_subscription = $this->session->userdata('manage_newsletter_subscription');
	
	$manage_slider_images 			= $this->session->userdata('manage_slider_images');

	$seo_settings 			= $this->session->userdata('seo_settings');
	$customer_queries 			= $this->session->userdata('customer_queries');
	$manage_static_pages 			= $this->session->userdata('manage_static_pages');
	$manage_newsltter_intrests 			= $this->session->userdata('manage_newsltter_intrests');
	$manage_alert_subscription 			= $this->session->userdata('manage_alert_subscription');
	$manage_voucherr_blogs 			= $this->session->userdata('manage_voucherr_blogs');
	$brands_sort_order 			    = $this->session->userdata('brands_sort_order');
	$role_id 						= $this->session->userdata('role_id');

	if(!empty($page_type)){
		$page_type = $page_type;
	}
	else{
		$page_type = "";
	}
	if(!empty($letter)){
		$letter = $letter;
	}
	else{
		$letter = "";
	}

?>
<style>
	.hidden{
		display:none !important;
	}
</style> 
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		
		<ul class="pcoded-item pcoded-left-item">
			<li class="<?php if($page_name == 'dashboard'){ echo 'active'; } ?> ">
				<a href="<?php echo base_url(); ?>admin/dashboard">
					<span class="pcoded-micon"><i class="icofont icofont-dashboard-web"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
			</li>
			<?php if($manage_categories == 1 ){ ?>
				<li class=" <?php if($page_name == 'manage_users'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_users">
						<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
						<span class="pcoded-mtext">Manage System Users</span>
					</a>
				</li>
				
			<?php } ?>

			<?php if($manage_coupons == 1){ ?>
				
				<li class=" pcoded-hasmenu <?php if($page_name == 'manage_coupons' || $page_type == 'active' || $page_type == 'inactive' | $page_type == 'expired'){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage Coupons</span>
				</a>
				<ul class="pcoded-submenu">
	
				   <li class="<?php if($page_type == 'active'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_coupons/active">
							<span class="pcoded-mtext">Active Coupons</span>
						</a>
				   </li> 
				 
				 
				    <li class="<?php if($page_type == 'inactive'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_coupons/inactive">
							<span class="pcoded-mtext">Inactive Coupons</span>
						</a>
					</li>   
				 		  
					<li class="<?php if($page_type == 'expired'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_coupons/expired">
							<span class="pcoded-mtext">Expired Coupons</span>
						</a>
					</li>
				</ul> 
			</li>
			<?php } ?>
			<?php if($manage_categories == 1){ ?>
			
				<li class=" <?php if($page_name == 'manage_categories'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_categories">
						<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
						<span class="pcoded-mtext">Manage Categories</span>
					</a>
				</li>
				<li class=" <?php if($page_name == 'manage_brands_page'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_brands_page">
						<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
						<span class="pcoded-mtext">Manage brands page</span>
					</a>
				</li>
			
			<?php } ?>

			
			
			<?php if($manage_sub_categories == 1){ ?>
				<li class=" <?php if($page_name == 'manage_sub_categories'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_sub_categories">
						<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
						<span class="pcoded-mtext">Manage Sub Categories</span>
					</a>
				</li>
			<?php } ?>
			<li class=" <?php if($page_name == 'upload_images'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/upload_images">
					   <span class="pcoded-micon"><i class="icofont icofont-dashboard-web"></i></span>
						<span class="pcoded-mtext">Upload images</span>
					</a>
				</li>
			<?php if($manage_brands == 1){ ?>
				<li class=" <?php if($page_name == 'manage_brands'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_brands">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Brands </span>
					</a>
				</li>
			<?php } ?>
			<?php if($manage_brands == 1){ ?>
				<li class=" <?php if($page_name == 'manage_sub_brands'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_sub_brands">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage sub Brands </span>
					</a>
				</li>
			<?php } ?>
			
			
			
            <?php if($brands_sort_order == 1){ ?>
				
				<li class=" pcoded-hasmenu <?php if(
					$page_name == 'brands_sort_order' ||
					$page_name == 'sub_categories_coupon_order' ||
					$page_name == 'categories_coupon_order' ||
					$page_name == 'popular_coupon_order' ||
					$page_name == 'popular_cat_order' ||
					$page_name == 'popular_brands_order' ||
					$page_name == 'nav_bar_sorting' ||
					$page_name == 'nav_bar_category'
					){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage sort orders </span>
				</a>
				<ul class="pcoded-submenu">
			
				   <li class="<?php if($page_name == 'brands_sort_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/brands_sort_order">
							<span class="pcoded-mtext">Brands coupon order</span>
						</a>
				   </li> 
				   <li class="<?php if($page_name == 'nav_bar_sorting'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/nav_bar_sorting">
							<span class="pcoded-mtext">Brands navbar order</span>
						</a>
				   </li>
				   <li class="<?php if($page_name == 'nav_bar_category'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/nav_bar_category">
							<span class="pcoded-mtext">Category navbar order</span>
						</a>
				   </li>
				   <li class="<?php if($page_name == 'popular_brands_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/popular_brands_order">
							<span class="pcoded-mtext">Popular brands order</span>
						</a>
				   </li>
				   <li class="<?php if($page_name == 'popular_cat_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/popular_cat_order">
							<span class="pcoded-mtext">Popular categories order</span>
						</a>
				   </li>
				   <li class="<?php if($page_name == 'popular_coupon_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/popular_coupon_order">
							<span class="pcoded-mtext">Popular coupon order</span>
						</a>
				   </li>
				   <li class="<?php if($page_name == 'categories_coupon_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/categories_coupon_order">
							<span class="pcoded-mtext">Categories coupon order</span>
						</a>
				   </li> 

				   <li class="<?php if($page_name == 'sub_categories_coupon_order'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/sub_categories_coupon_order">
							<span class="pcoded-mtext">Subcategories coupon order</span>
						</a>
				   </li>
				 
				  
				</ul> 
			</li>
			<?php } ?>
			

			<?php if($manage_slider_images == 1){ ?>
				<li class=" <?php if($page_name == 'manage_slider_images'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_slider_images">
						<span class="pcoded-micon"><i class="fa fa-image"></i></span>
						<span class="pcoded-mtext">Manage Slider Images</span>
					</a>
				</li>
			<?php } ?>
			<?php if($manage_slider_images == 1){ ?>
			    <li class=" <?php if($page_name == 'manage_tv_slider'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_tv_slider">
						<span class="pcoded-micon"><i class="fa fa-image"></i></span>
						<span class="pcoded-mtext">Manage tv slider</span>
					</a>
				</li> 
			<?php } ?>
			<?php if($manage_voucherr_blogs == 1){ ?>

				<li class=" <?php if($page_name == 'manage_blog'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_voucher_blogs">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage voucher blogs</span>
					</a>
				</li>
			<?php } ?>
		
			<?php 
			 if($role_id =='4'){
			?> 
			<?php if($manage_slider_images == 1){ ?>
				<li class=" <?php if($pag_type == 'Lastest'){ echo 'active'; } ?>">
					<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Lastest">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Lastest Content</span>
					</a>
				</li>
				<li class=" <?php if($pag_type == 'Tips'){ echo 'active'; } ?>">
					<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Tips">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Tips Content</span>
					</a>
				</li>
				<li class=" <?php if($pag_type == 'Trend'){ echo 'active'; } ?>">
					<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Trend" >
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Trending Content</span>
					</a>
				</li>
				<li class=" <?php if($pag_type == 'Popular'){ echo 'active'; } ?>">
					<a href="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/pages_content/Popular" >
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Popular Content</span>
					</a>
				</li>
			<?php } ?>
			<?php 
			 }
			?> 

			<?php if($manage_newsletter_subscription == 1){ ?>
				
				<li class=" pcoded-hasmenu <?php if($page_name == 'manage_newsletter_subscription' || $page_name == 'manage_inactive_subscription' || $page_name == 'unsubscribers_list'){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage newsletters </span>
				</a>
				<ul class="pcoded-submenu">
	
				   <li class="<?php if($page_name == 'manage_newsletter_subscription'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_newsletter_subscription">
							<span class="pcoded-mtext">Active subscriber list</span>
						</a>
				   </li> 
				 
				 
				    <li class="<?php if($page_name == 'manage_inactive_subscription'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_inactive_subscription">
							<span class="pcoded-mtext">Inactive subscriber list</span>
						</a>
					</li>   
				 		  
					<li class="<?php if($page_name == 'unsubscribers_list'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/unsubscribers_list">
							<span class="pcoded-mtext">Unsubscriber list</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'send_newsletter'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/send_newsletter">
							<span class="pcoded-mtext">Send Newsletter</span>
						</a>
					</li>
				</ul> 
			</li>
			<?php } ?>

			<?php if($manage_alert_subscription == 1){ ?>


				<li class=" pcoded-hasmenu <?php if($page_name == 'manage_alert_subscriber' || $page_name == 'manage_inactive_alert_subscription' || $page_name == 'alert_unsubscriber_list'){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage alert Subscribers </span>
				</a>
				<ul class="pcoded-submenu">
	
				   <li class="<?php if($page_name == 'manage_alert_subscriber'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_alert_subscriber">
							<span class="pcoded-mtext">Active subscriber list</span>
						</a>
				   </li> 
				 
				 
				    <li class="<?php if($page_name == 'manage_inactive_alert_subscription'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/inactive_subscriber_list">
							<span class="pcoded-mtext">Inactive subscriber list</span>
						</a>
					</li>   
				 		  
					<li class="<?php if($page_name == 'alert_unsubscriber_list'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/alert_unsubscriber_list">
							<span class="pcoded-mtext">Unsubscriber list</span>
						</a>
					</li>

				</ul> 
			</li>

				
			<?php } ?>
			<?php if($manage_newsltter_intrests == 1){ ?>

			<li class=" <?php if($page_name == 'manage_newsletter_interest'){ echo 'active'; } ?>">
				<a href="<?php echo base_url(); ?>admin/manage_newsletter_interest">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage newsletter interest</span>
				</a>
			</li>

			<?php } ?>




			<?php if($manage_saving_offers == 1){ ?>
				<li class=" <?php if($page_name == 'manage_saving_offers'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_saving_offers">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Saving Offers</span>
					</a>
				</li>
			<?php } ?>
			   
			<?php if($manage_static_content == 1){ ?>
				<li class=" <?php if($page_name == 'manage_static_content'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/manage_static_content">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">Manage Static Content</span>
					</a>
				</li>
			<?php } ?>
			<?php if($manage_static_pages == 1){ ?>
			<li class=" pcoded-hasmenu <?php if($page_name == 'manage_about_us' || $page_name == 'manage_imprints' || $page_name == 'manage_privacy_policy' || $page_name == 'manage_faqs' || $page_name == 'manage_advertise' || $page_name == 'manage_customer_query' || $page_name == 'manage_partner_faqs'){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Manage Static Pages </span>
				</a>
				<ul class="pcoded-submenu">
				   <?php if($manage_contact_us == 1){ ?>
				   <li class="<?php if($page_name == 'manage_customer_query'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_customer_query">
							<span class="pcoded-mtext">Customer Queries</span>
						</a>
				   </li> 
				  <?php } ?>
				   <?php if($manage_about_us == 1){ ?>
				    <li class="<?php if($page_name == 'manage_about_us'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_about_us">
							<span class="pcoded-mtext">About us</span>
						</a>
					</li>   
				  <?php } ?>
                  <?php if($manage_privacy_policy == 1){ ?>				  
					<li class="<?php if($page_name == 'manage_privacy_policy'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_privacy_policy">
							<span class="pcoded-mtext">Privacy Policy</span>
						</a>
					</li>
				  <?php } ?>
                 
                  <?php if($manage_advertise == 1){ ?> 				  
					<li class="<?php if($page_name == 'manage_advertise'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_advertise">
							<span class="pcoded-mtext">Advertise</span>
						</a>
					</li>
				  <?php } ?>	
				   <?php if($manage_faqs == 1){ ?>					  
					<li class="<?php if($page_name == 'manage_fqs'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_fqs">
							<span class="pcoded-mtext">FAQS</span>
						</a>
					</li>
				  <?php } ?>
                  <?php if($manage_faqs == 1){ ?>					  
					<li class="<?php if($page_name == 'manage_imprints'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/manage_imprints">
							<span class="pcoded-mtext">Imprints</span>
						</a>
					</li>
				  <?php } ?>				  
				</ul> 
			</li>
			<?php } ?>
			<?php if($manage_myprofile == 1){
			 	
			if($role_id == 1){
			?>
				<li class="<?php if($page_name == 'myprofile'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/myprofile">
						<span class="pcoded-micon"><i class="fa fa-user"></i></span>
						<span class="pcoded-mtext">Account Settings</span>
					</a>
				</li>
			<?php } } ?>
		
			<?php if($seo_settings == 1){ ?>
			<li class=" pcoded-hasmenu <?php if($page_name == 'home_page_seo' || $page_name == 'brand_a_z_seo' || $page_name == 'main_category_seo' || $page_name == 'info_blog_seo' || $page_name == 'about_us_seo' || $page_name == 'fags_seo' || $page_name == 'advertise_seo'  || $page_name == 'contact_us_seo'  || $page_name == 'privacy_policy_seo'  || $page_name == 'imprints_seo' || $page_name =='popular_coupon_seo' || $page_name =='a_to_z_seo'   ){ echo ' pcoded-trigger'; } ?> ">
				<a href="javascript:void(0)"> 
					<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
					<span class="pcoded-mtext">Seo Settings</span>
				</a>
				<ul class="pcoded-submenu">
				 
				   <li class="<?php if($page_name == 'home_page_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/home_page_seo">
							<span class="pcoded-mtext">Home page seo</span>
						</a>
				   </li> 
		
				  
				    <li class="<?php if($page_name == 'brand_a_z_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/brand_a_z_seo">
							<span class="pcoded-mtext">Brand a-z seo</span>
						</a>
					</li>
					
					<li class="<?php if($page_name == 'main_category_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/main_category_seo">
							<span class="pcoded-mtext">Main category seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'info_blog_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/info_blog_seo">
							<span class="pcoded-mtext">Info blog seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'about_us_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/about_us_seo">
							<span class="pcoded-mtext">About us seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'fags_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/fags_seo">
							<span class="pcoded-mtext">Faqs seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'advertise_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/advertise_seo">
							<span class="pcoded-mtext">Advertise seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'contact_us_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/contact_us_seo">
							<span class="pcoded-mtext">Contact us seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'privacy_policy_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/privacy_policy_seo">
							<span class="pcoded-mtext">Privacy policy seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'imprints_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/imprints_seo">
							<span class="pcoded-mtext">Imprints seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'popular_coupon_seo'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/popular_coupon_seo">
							<span class="pcoded-mtext">Popular coupon seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='a'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/a">
							<span class="pcoded-mtext">Letter A seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='b'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/b">
							<span class="pcoded-mtext">Letter B seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='c'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/c">
							<span class="pcoded-mtext">Letter C seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='d'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/d">
							<span class="pcoded-mtext">Letter D seo</span>
						</a>
					</li>

					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='e'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/e">
							<span class="pcoded-mtext">Letter E seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='f'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/f">
							<span class="pcoded-mtext">Letter F seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='g'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/g">
							<span class="pcoded-mtext">Letter G seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='h'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/h">
							<span class="pcoded-mtext">Letter H seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='i'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/i">
							<span class="pcoded-mtext">Letter I seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='j'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/j">
							<span class="pcoded-mtext">Letter J seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='k'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/k">
							<span class="pcoded-mtext">Letter K seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='l'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/l">
							<span class="pcoded-mtext">Letter L seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='m'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/m">
							<span class="pcoded-mtext">Letter M seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='n'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/n">
							<span class="pcoded-mtext">Letter N seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='o'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/o">
							<span class="pcoded-mtext">Letter O seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='p'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/p">
							<span class="pcoded-mtext">Letter P seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='r'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/r">
							<span class="pcoded-mtext">Letter R seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='s'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/s">
							<span class="pcoded-mtext">Letter S seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='t'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/t">
							<span class="pcoded-mtext">Letter T seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='u'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/u">
							<span class="pcoded-mtext">Letter U seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='v'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/v">
							<span class="pcoded-mtext">Letter V seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='w'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/w">
							<span class="pcoded-mtext">Letter W seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='x'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/x">
							<span class="pcoded-mtext">Letter X seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='y'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/y">
							<span class="pcoded-mtext">Letter Y seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='z'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/z">
							<span class="pcoded-mtext">Letter Z seo</span>
						</a>
					</li>
					<li class="<?php if($page_name == 'a_to_z_seo' && $letter=='0_1'){ echo 'active'; } ?>">
						<a href="<?php echo base_url()?>admin/a_to_z_seo/0_1">
							<span class="pcoded-mtext">Letter 0-9 seo</span>
						</a>
					</li>
				
							  
				</ul> 
			</li>
			<?php } ?>
	
			<?php if($manage_system_settings == 1){ ?>
			 
				<li class="<?php if($page_name == 'system_settings'){ echo 'active'; } ?>">
					<a href="<?php echo base_url(); ?>admin/system_settings">
						<span class="pcoded-micon"><i class="fa fa-gear"></i></span>
						<span class="pcoded-mtext">System Settings</span>
					</a>
				</li>
			<?php } ?>


		</ul>
	</div>
</nav>