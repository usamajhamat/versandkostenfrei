<style>
    .submit-btn-set{
        font-size: 11px!important;height: 30px !important;background: #5c8374;color: white;
    }
    .sub-btn-left{
         padding: 14px;
    }
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
    <!--Breadcrumps -->
	<div class="cs-breadcrumbs cs-breadcrumbs-style">
		<div class="container">
			<ul itemscope="" itemtype="#" class="cs-breadcrumb-list">
				<li itemprop="itemListElement" itemscope="" itemtype="#">
					<!--<span class="cs-breadcrumb-item cs-breadcrumb-first"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You are here:</font></font></span>-->
					<a itemprop="item" class="cs-breadcrumb-item" href="<?php echo base_url(); ?>">
					  <span itemprop="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Startseite</font></font></span>
					</a>
					<meta itemprop="position" content="1">
				</li>
				<li><span class="cs-breadcrumb-divider"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="cs-breadcrumb-item cs-breadcrumb-active" style="color: #313131 !important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo "Werben" ?></font></font></span></li>
			</ul>
		</div>
	</div>
	<div class="container">
       
       
       
       
       
       
       
        <div class="main-content-container cs-flex">
			<!--Main Content -->
			<div class="cs-main-left">
				<!-- Content page -->
				<div class="cs-content-page">
					<!-- Contentblock -->
					<div class="cs-content-block cs-text" style="padding: 16px;">
						<div class="clearfix"></div>
						<?php echo htmlspecialchars_decode($page_content['description']);  ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<!--Sidebar -->
			
			<?php 
				$static_newsletter = $this->db->get_where('static_content', array('type'=>'newsletter'))->row();
				$newsletter_title = $static_newsletter->title;
				$newsletter_desc = $static_newsletter->description;
				$newsletter_img = $static_newsletter->image;
				$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
			?>
			
			
	    <div class="cs-sidebar-right">
		<aside id="cs-sidebar">
		<?php /* <div style="text-align:center;padding: 1px 11px 10px 11px;">
			<h4 class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipps für dich </font></font></h4>
			</div>
			<div class="cs-sidebar-item cs-sidebar-contact">
				<!-- Carousel container -->
				<div id="my-pics" class="carousel slide my-pics" data-ride="carousel" >

				<!-- Indicators -->
				<!--<ol class="carousel-indicators">
				<li data-target="#my-pics" data-slide-to="0" class="active"></li>
				<li data-target="#my-pics" data-slide-to="1"></li>
				<li data-target="#my-pics" data-slide-to="2"></li>
				</ol> -->

				<!-- Content -->
				<div class="carousel-inner" role="listbox">
				
						<!-- Slide 1 -->
						<?php   
							$tv_slider = $this->db->get_where('tv_slider_images',array('status'=>'Active'))->result_array();
							foreach($tv_slider as $key => $slider){
						?>	
						<div class="item <?php if($key==0){ echo "active"; } ?> ">
						<a href="<?php echo $slider['link']; ?>">
							<img  style="width: 100%;height: 100%;" src="<?php echo base_url()?>uploads/brands/sliders/<?php echo $slider['image']; ?>" >
							
							</a>
						</div>
						<?php } ?>
						<!-- Slide 3 -->
					

						</div>

						<!-- Previous/Next controls -->
						<a class="left carousel-control" style="background: none;" href="#my-pics" role="button" data-slide="prev">
						<span class="icon-prev move_" style="font-size: 26px;" aria-hidden="true"></span>
						<span class="sr-only ">Previous</span>
						</a>
						<a class="right carousel-control" style="background: none;" href="#my-pics" role="button" data-slide="next">
						<span class="icon-next move_" style="font-size: 26px;" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>

				</div>	
			</div>
			*/ ?>
		</aside>
	</div>
      </div>
</main> 