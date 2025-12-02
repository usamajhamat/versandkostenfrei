<?php $date= date("Y-m-d"); ?>
<style>
	  .d-flex{
		 display: flex;
	  }
	  .alert_box{
		 background-color: #fff;
		 padding: 10px;
		 margin: 10px auto;
		 margin-left: 20px;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .box_para{
		 color: #3c5154 !important;
		 font-size: 13px;
		 font-weight: 600;
	  }
	  .box_heading{
		 font-family: revert;
		 color: #5c8374;
	  }
	  .subscribe_form{
		 display: flex;
	  }
	  .box_alert_img > img{
		 width: 130px;
	  }
	  .subscribe_field{
		 height: 30px !important;
		 font-size: 13px;
		 border-radius: 5px !important;
		 width: 100% !important;
	  }
	  .subscribe_btn{
		 background-color: #5c8374;
		 color: #fff;
		 height: 30px !important;
		 border: none;
		 border-radius: 5px;
		 left: -7px;
		 position: relative;
		 width: 100px !important;
	  }
	  .txt_box{
		 margin-top: 10px;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .mt-2{
		 margin-top: 20px;
	  }
	  
	  .cat_box{
		 padding: 0px 0 10px 0px;
		 background-color: #f5f5f5;
		 box-shadow: 0px 0px 6px rgb(180, 180, 180);
	  }
	  .cat_content{
		 margin-left: 0px;
	  }
	  .cat_intro{
		 width: 100%;
		 background-color: #fff;
		 padding: 20px 20px 10px 20px;
		 font-size: 18px;
		 line-height: 1.7;
	  }
	  
	  .box_cat{
		 background-color: #fff;
		 padding: 5px 10px;
		 border-radius: 5px;
	  }
	  .box_cat:hover{
		 background-color: #5c8374;
		 text-decoration: none;
		 color: #fff;
	  }
	  
	  .cat_align{
		 justify-content: space-evenly;
	  }
	  
	  .see_all{
		 color: #5c8374 !important;
		 font-weight: 600;
		 font-size: 15px;
		 margin-right: 20px;
	  }	  
	.bg_grey_dark {
		background: #eee !important;
	}
	.lbl_discount_val{
		font-weight: bold;
		font-size: 16px;
		color: #5c8374;
		text-align: center;
	}
	.show_code_btn{
		background: #5c8374 !important;
		color: #fff;
	}
	.orange_font_color{
		color: #5c8374;
	}
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
	<!--Breadcrumps -->
	<div class="cs-breadcrumbs cs-breadcrumbs-style">
		<div class="container">
			<ul itemscope="" itemtype="#" class="cs-breadcrumb-list">
				<li itemprop="itemListElement" itemscope="" itemtype="#">
					<span class="cs-breadcrumb-item cs-breadcrumb-first">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">You are here:</font>
						</font>
					</span>
					<a itemprop="item" class="cs-breadcrumb-item" href="<?php echo base_url(); ?>">
						<span itemprop="name">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Startseite</font>
							</font>
						</span>
					</a>
					<meta itemprop="position" content="1">
				</li>
				<li>
					<span class="cs-breadcrumb-divider">
						<i class="fa fa-angle-double-right" aria-hidden="true"></i>
					</span>
					<span class="cs-breadcrumb-item cs-breadcrumb-active">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"><?php echo $page_name ?></font>
						</font>
					</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="main-content-container cs-flex">
			  <!--Main Content -->
			<div class="">
				<!-- Content all_categories-->
				<?php 
				$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
				$system_name = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;?>
				<div class="cs-all-categories-content">
					<!-- Merchant Box -->
					<section class="cs-home-selection cs-home-mer-box ">
						<div class="container" style="padding: 71px 47px;height: 400px;">
							<h3 class="cs-home-h">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"> Sorry no result fount for "<?php echo $search_query ?>" </font>
								</font>
							</h3>
							   
						</div>
					</section>
					
				</div>
			</div>
		</div>
	</div>
</main>