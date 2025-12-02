<?php 
    $coupon_id = $param2;
	$get_coupons = $this->db->query("
							select cpn.* , brand.name as brand_name, brand.brand_image as brand_image, brand.website_url, brand.show_ads
							from coupons as cpn 
							left join brands as brand ON cpn.brands_id = brand.brands_id
							where cpn.coupons_id = '".$coupon_id."'
						")->row_array();
	$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
	$brand_image   = $get_coupons['brand_image'];
	$categories_id = $get_coupons['categories_id'];
	$brand_name = $get_coupons['brand_name'];
	$brand_id = $get_coupons['brands_id'];
	$short_tagline = $get_coupons['short_tagline'];
	$cpn_desc = $get_coupons['description'];
	$discount_type = $get_coupons['discount_type'];
	$discount_value = $get_coupons['discount_value'];
	$website_url = $get_coupons['website_url'];
	$coupon_code = $get_coupons['coupon_code'];
	$expiry_date = $get_coupons['end_date'];
	$coupon_type = $get_coupons['coupon_type'];
	$redemption_information = $get_coupons['redemption_information'];
	$show_ads = $get_coupons['show_ads'];
	$expiry_date = date_create($expiry_date);
	$expiry_date_form =  date_format($expiry_date,"m/d/Y");



?>


<div class="modal-dialog js-co-con" style="margin-top: 134px;">    
	<div class="modal-content js-co" data-1="cos" data-2="20497" data-4="" data-5="">
	  <div class="modal-header cs-modal-header cs-flex cs-flex-mobil">
		
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Close the window"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>    
		<div class="cs-modal-header-logo js-btn-co" title="Visit the Deichmann homepage" style="cursor: pointer;"><img class=" lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image;?>" title="Visit the Deichmann homepage" alt="Deichmann"></div>
		<h4 class="cs-modal-header-title modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $short_tagline;?></font></font></h4>  
	  </div>
	  <div class="modal-body">
		<?php if($show_ads) { ?>
			<!-- Google Add  -->
			<div class="row text-center">
			<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4102770400209779"
				crossorigin="anonymous"></script> -->
				<ins class="adsbygoogle"
				style="display:block"
				data-ad-format="fluid"
				data-ad-layout-key="-h2-1+36-dz+ga"
				data-ad-client="ca-pub-4102770400209779"
				data-ad-slot="6834909657"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
			<!-- Google Add  -->
		<?php } ?>
		<div class="cs-disclaimer">
		  
		</div>
		<div class="row">  
		  <div class="cs-modal-checkout">
			<h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Click here to get your voucher code:</font></font></h4>
			<div class="cs-modal-cta-wrapper" style="margin-top: 20px;">
			  <div class="cs-coupon-btn coupon_click" data-coupon = "<?php echo $coupon_type;?>"  data-page="brands" data-tag="<?php echo $short_tagline;?>" data-type="<?php echo $categories_id;?>" id="<?php echo $brand_id.'_'.$coupon_id;?>" title="Show voucher code" style="cursor: pointer;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Show code</font></font></div>
			</div>
		  </div>
		  <!-- Einlösehinweis -->
		  <div class="js-toggle-container cs-modal-toggle-box">
			<div class="cs-modal-text">
			  <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Redemption information :</font></strong><?php $count_str = strlen($redemption_information);?>
			     <span><?php echo substr($redemption_information,0,150); ?> </span>
				 <span style="display:none" id="see">
				  <?php echo substr($redemption_information,200) ?>
				 </span>
				 <?php if($count_str>150){?>
				  <span style="color: #5c8374;cursor: pointer;" class="see_more1" data-type="see more" id="saw">Show more</span>
				 <?php }?>
			</div> 						
		  </div>
		</div>          
	  </div>
	  <?php if($show_ads) { ?>
		<!-- Google Add  -->
			<div class="row text-center">
			<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4102770400209779"
				crossorigin="anonymous"></script> -->
			<ins class="adsbygoogle"
				style="display:block"
				data-ad-format="fluid"
				data-ad-layout-key="-h2-1+36-dz+ga"
				data-ad-client="ca-pub-4102770400209779"
				data-ad-slot="6834909657"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
			<!-- Google Add  -->
		<?php } ?>
	  <div class="modal-footer" style="background: #5c8374;">
		
		   <!-- Wecker Form -->
		   <div class="cs-modal-couponalert js-couponalert-modal">
			  <img class=" lazyloaded" style="width: 106px;margin-top: 20px;"
			  src="<?php echo base_url().'assets/home/imgs/Gutschein_wecker.png'?>" data-src="https://www.coupons.de/images/layout/coupons_alert.png" alt="Voucher alarm clock">
			  <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Never miss a <?php echo $brand_name;?> voucher again:</font></font></h6>
			  <div class="cs-couponalert-input-error js-couponalert-input-error-modal"></div>
			  <div id="alert_area2">
			  <input class="cs-modal-email-input" id="optin-email2" style="box-shadow: none !important;" name="email" type="text" placeholder="E-mail address*">
			  <input name="page_type1" id="page_type2" type="hidden"  value="4">
				<input name="letter_type" id="letter_type2" type="hidden"  value="alert">
			  <button class="cs-modal-email-submit btn btn-secondary cs-flat-btn-grey js-couponalert-btn-modal" id="voucher_alert1" style="background: #151414a6;color: white;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SIGN IN</font></font></button>                         
			 <small style="color:blue" id="box_error2"></small>
			<label style="margin-top: 5px;">
			  <input class="cs-newsletter-checkbox" id="privacy2" name="privacy" type="checkbox" value="0">
			  <font style="vertical-align: inherit;">
			   <font style="vertical-align: inherit;">Yes, I agree</font>
			  </font>
			  <font style="vertical-align: inherit;">
			   <font style="vertical-align: inherit;">to Data protection declaration</font>
			  </font>
			  <font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;"> .
			  </font>

			</label>
			</div>
			<div id="msg_area" style="padding:10px;display:none">
			</div>
		   </div>
		   <div class="controls controls-row js-couponalert-output-modal" style="display:hidden"></div>
		</div>  
	</div>  
  </div>
  
  <script>
   $('.see_more1').click(function(){
		var id = this.id;
		var array_id = id.split('_');

	    var type =	$(this).attr('data-type');
		if(type=="see more"){
			$(this).removeAttr('data-type');
			$("#see").fadeIn();
			$(this).text('Show less');
			$(this).attr('data-type','see less');
		}
		if(type=="see less"){
			$(this).removeAttr('data-type');
			$(this).text('Show more');
			$("#see").fadeOut();
			$(this).attr('data-type','see more');
		}
		});
         $("#voucher_alert1").click(function(){
			
		var privacy  = $('#privacy2').val();
	   
		var email    = $('#optin-email2').val();
		var page     = $('#page_type2').val();
		var letter_type  = $('#letter_type2').val();
		
		var reg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    var regex = new RegExp(reg);
		if(email==""){
			$("#box_error2").text('Enter your email.');
			Command: toastr['error']("Oops! Email is missing.");
		} else if(!regex.test(email)){
			$("#box_error2").text('Please enter email in correct format.');
			Command: toastr['error']("Please enter email in correct format.");
	    } else if(privacy == 0 || privacy == null){
			$(".cs-newsletter-star-row").css('color', 'red');
			Command: toastr['error']("Please confirm our data protection conditions");
			$("#box_error2").text('Please confirm our data protection conditions');
		} else{
			$("#box_error2").text('');
		 $.ajax({
				url:"<?php echo base_url();?>home/subscription",
				method:"POST",
				data: { "email": email, 'privacy': privacy,'page_id':page,'letter_type':letter_type },
				success:function(data)
				{  
					if(data=="already"){
						//$("#box_error").text('You already subscribed.');
						$('#msg_area').html("You have already subscribed to the voucher alarm clock for <b>"+brand_name+"</b>");
						$("#alert_area2").hide();
						$('#msg_area').show();
						/* $("#alert_area2").text("For data protection reasons, an email has already been sent to the email address you provided. Please confirm the subscription to the voucher alarm clock by calling up  clicking on the confirmation link in the email.If you have not received an email from us, please check your spam folder and add the sender to your address book. If that is unsuccessful, please contact us by email."); */
					}
					if(data=="success"){
						/* $("#alert_area2").text('For reasons of data protection law, an email has just been sent to the email address you provided. Please confirm the subscription to the voucher alarm clock by calling up / clicking on the confirmation link in the email.'); */
						$('#msg_area').html("For reasons of data protection law, an email has just been sent to the email address you provided. Please confirm the subscription to the voucher alarm clock by calling up / clicking on the confirmation link in the email.");
				        $("#alert_area2").hide();
						$('#msg_area').show();

					}
				} 
			}); 
		}
	});	
	$('#privacy2').change(function() {
		if(this.checked) {
			$(this).val('1');
		} else {
			$(this).val('0');
		}   
	});
  
  
  
  
  $('.coupon_click').click(function(){
	  var id = this.id;	
  
	  var id_array  = id.split('_');
	  var brand_id  = id_array[0];
	  var coupon_id = id_array[1];
	  var cateID_id = $(this).attr('data-type');
	  var page_type = $(this).attr('data-page');
	  var coupon_type = $(this).attr('data-coupon');
	  var tag = $(this).attr('data-tag');
	  if(page_type=="category"){
	    window.open("<?php echo base_url();?>home/categories/"+cateID_id+"?coupon_id="+coupon_id, "_blank");
	  }
	  else if(page_type=="brands"){
		window.open("<?php echo base_url();?>home/brands/"+brand_id+'/'+coupon_type+"?coupon_id="+coupon_id, "_blank");  
	  }
       window.location.href = "<?php echo base_url();?>home/redirect?brand_id="+brand_id+"&tag_line="+tag; 
});
  </script>