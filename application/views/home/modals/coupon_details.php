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
	$brand_url = $get_coupons['brand_redirect_url'];
	$coupon_code = $get_coupons['coupon_code'];
	$redemption_information = $get_coupons['description'];
	$expiry_date = $get_coupons['end_date'];
	$show_ads = $get_coupons['show_ads'];
	$expiry_date = date_create($expiry_date);
	$expiry_date_form =  date_format($expiry_date,"m/d/Y");
	
	$ip_address  = $this->input->ip_address();
	$check_like  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id,'review'=>'Like'))->num_rows();
	
	$check_dislike  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id,'review'=>'Dislike'))->num_rows();
	
	$all_reviews  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id))->num_rows();
	
	$check_like  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id,'review'=>'Like'))->num_rows();
	
	$total_vote  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id))->num_rows();
	if($all_reviews!=0){
	 $success_rate = ($check_like/$all_reviews) * 100;	
	}
	else{
	 $success_rate = 0;	
	}
/* 	$this->db->select_avg('amount');
	$avg_success  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupon_id,'review'=>'Like'))->num_rows();
	 */
	if(empty($coupon_code)){
		$coupon_code = "Kein Code benötigt!"; 
	}
	else{
		$coupon_code = $coupon_code; 
	}
	
	
?>
<div class="modal show" tabindex="-1">
 <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header cs-modal-header cs-flex cs-flex-mobil" style="border-bottom: 0px;">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Close the window"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>   
			<div class="model_head">
				 <div class="cs-modal-header-logo js-btn-co" title="Visit the <?php echo $brand_name ?> homepage" style="cursor: pointer;">
					<a href="<?php echo $website_url ?>">
					<img class=" lazyloaded" src="<?php echo base_url().$brand_img_url.$brand_image; ?>" data-src="<?php echo base_url().$brand_img_url.$brand_image; ?>" title="Visit the <?php echo $brand_name ?> homepage" alt="<?php echo $brand_name ?>">
					</a>
				</div>
				<h4 class="cs-modal-header-title cs-modal-header-title modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $short_tagline ?></font></font></h4>
			</div>
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
			<div class="cs-disclaimer"></div>
			<div class="cs-modal-checkout">
				<h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ihr Gutscheincode lautet:</font></font></h4>
				<?php 
				 if(!empty($get_coupons['coupon_code'])){
				?>
					<div class="cs-result-field cs_active" style="position:relative" onclick="copy_to_clipboard()" >
						<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="coupon_code"><?php echo $coupon_code ?></font></font></span>
						<i class="fa fa-check cuttu" id="ticks" style="display:none;top: 17px !important" ></i>
						<img class="cuttu"  id="status_copy" src="<?php echo base_url().$brand_img_url."cut.png"; ?>">
					</div>
				 <?php
				 }
				 else{
				 ?>
				<div class="cs-result-field cs_active"  >
					<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="coupon_code"><?php echo $coupon_code ?></font></font></span>
				</div>
				 <?php
				 }
				 
				 ?>
				<input  type="text" style="opacity:0;"  value="<?php echo $coupon_code ?>" id="code_cpn">
				<!--<div id=""  class="js-copy-btn cs-copy-button" data-clipboard-text="<?php echo $coupon_code ?>" title="Copy the voucher code to the clipboard"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" onclick="copy_to_clipboard()"  id="status_copy">COPY</font></font></div>-->
				<div class="cs-modal-cta-wrapper">
					<div class="cs-coupon-btn js-btn-co" title="Visit the <?php echo $brand_name ?> homepage" style="cursor: pointer;">
						<a style="color: white;
    text-decoration: none;" href="<?php echo $brand_url; ?>" target="_blank" class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
							Weiter zum Anbieter
							</font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
			<?php if($get_coupons['end_date']!="0000-00-00" || $get_coupons['min_order_price']!="" || $get_coupons['redemption_information']!=""){
		    ?>
			<div style="width: 100%;">
			   <div style=" color: #5c8374;">
			     <h4>Anweisungen zum Einlösen</h4>
			   </div>
			</div>
			<?php
			} ?>
			<div style="padding: 0px 14px;">
			<?php if($get_coupons['end_date']!="0000-00-00"){
		    ?>
			<strong>
			  <font style="vertical-align: inherit;">
			    <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;">Läuft ab :</font>
			  </font>
			</strong>
			<font style="vertical-align: inherit;">
			  <font style="vertical-align: inherit;"><?php echo $expiry_date_form ?></font>
			</font>
			 <br>
			<?php
			} ?>
			

			<?php if($get_coupons['min_order_price']!=""){
		    ?>
			<strong>
			  <font style="vertical-align: inherit;">
			    <i class="fa fa-money" aria-hidden="true"></i> <font style="vertical-align: inherit;">Mindestbestellwert:</font>
			  </font>
			</strong> 
			<font style="vertical-align: inherit;"><?php echo $get_coupons['min_order_price'];?>€</font>
			<?php
			} ?>
			
			</div>
			<div style="padding: 7px 14px;">
			     <?php $count_str = strlen($redemption_information);?>
			     <span class="font-size-popup"><?php echo substr($redemption_information,0,150); ?> </span>
				 <span style="display:none" id="see">
				  <?php echo substr($redemption_information,200) ?>
				 </span>
				 <?php if($count_str>150){?>
				  <span style="color: #5c8374;cursor: pointer;" class="see_more1" data-type="see more" id="saw">Zeig mehr</span>
				 <?php }?>
			</div>
			
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-xs-6 text-center" style="border-top: 1px solid #dadada; border-right: 1px solid #dadada;">
					<h5 class="pt-2" style="font-weight: 600; font-size: 15px;">Teilen</h5>
				    <div class="social">
							<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share" target="_blank" id="share-wa" class="sharer button"><i class="fa-brands fa-2x fa-whatsapp sharing_btn" style="margin: 10px;"></i></a>
							<a href="http://www.facebook.com/sharer.php?u=<?php echo base_url()?>"  target="_blank"  id="share-fb" class="sharer button"><i class="fa-brands fa-2x fa-facebook sharing_btn" style="margin: 10px;"></i></a>
							<a href="https://twitter.com/intent/tweet?text=optional%20promo%20text%20<?php echo base_url()?>?bar=123&baz=456"  target="_blank"  id="share-tw" class="sharer button"><i class="fa-brands fa-2x fa-twitter sharing_btn" style="margin: 10px;"></i></a>
						</div>
				</div>
				<div class="col-xs-6 text-center" style="border-top: 1px solid #dadada;"> 
					<h5 class="pt-2" style="font-weight: 600; font-size: 15px;">Hat der Gutschein funktioniert?</h5>
					<div class="text-center">
						<i class="fa fa-2x fa-thumbs-o-up review_thumb reviews" <?php if($check_like!=0){ echo "style='color:#5c8374'"; } ?> title="Like" data-categorID="<?php echo $categories_id; ?>" data-couponID="<?php echo $coupon_id; ?>" data-brandId="<?php echo $brand_id; ?>" id="Like"></i> 
						<i class="fa fa-2x fa-thumbs-o-down review_thumb reviews"  <?php if($check_dislike>0){ echo "style='color:#5c8374'"; } ?> data-categorID="<?php echo $categories_id; ?>"  data-couponID="<?php echo $coupon_id; ?>" data-brandId="<?php echo $brand_id; ?>" title="Dislike" id="Dislike"></i>
					</div>
					<!--<span> <span id="coupon_per"><?php echo $success_rate;?></span>% success with <span id="vote_per"><?php echo $total_vote;?></span> votes</span> -->
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
			  <img class=" lazyloaded" style="width: 106px;margin-top: 20px;display:none;"
			  src="<?php echo base_url().'assets/home/imgs/Gutschein_wecker.png'?>" data-src="https://www.coupons.de/images/layout/coupons_alert.png" alt="Voucher alarm clock">
			  <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Verpasse nie wieder einen <?php echo $brand_name;?> Gutschein:</font></font></h6>
			  <div class="cs-couponalert-input-error js-couponalert-input-error-modal"></div>
			  <div id="alert_area2">
			  <div class="news_model_form">
			  <input class="cs-modal-email-input" id="optin-email2" style="box-shadow: none !important;width: 100%;" name="email" type="text" placeholder="E-Mail-Addresse*">
			  <input name="page_type1" id="page_type2" type="hidden"  value="4">
			  <input name="letter_type" id="letter_type2" type="hidden"  value="alert">
			  <button class="cs-modal-email-submit btn btn-secondary cs-flat-btn-grey js-couponalert-btn-modal" id="voucher_alert1" style="background: #151414a6;color: white;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ANMELDEN</font></font></button>  
			  </div>                       
			 <small style="color:blue" id="box_error2"></small>
			<label style="margin-top: 5px;">
			  <input class="cs-newsletter-checkbox" id="privacy2" name="privacy" type="checkbox" value="0">
			  <font style="vertical-align: inherit;">
			   <font style="vertical-align: inherit;">Ja, ich stimme der Datenschutzerklärung zu.</font>
			  </font>
			 

			</label>
			</div>
			<div id="msg_area" style="padding:10px;display:none">
			</div>
		   </div>
		   <div class="controls controls-row js-couponalert-output-modal" style="display:hidden"></div>
		</div>
			<div class="js-toggle-container cs-modal-toggle-box">
				<!--<div class="cs-modal-text">
					<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Redemption information:</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Valid until <?php echo $expiry_date_form ?> - <?php echo $cpn_desc ?> </font></font><br>
					<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Minimum order:</font></font></strong><font style="vertical-align: inherit;"> value: 120€</font>
				</div> 	-->					
			</div>
		</div>
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
			$(this).text('Zeige weniger');
			$(this).attr('data-type','see less');
		}
		if(type=="see less"){
			$(this).removeAttr('data-type');
			$(this).text('Zeig mehr');
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
	function copy_to_clipboard() {
		var copyText = document.getElementById("code_cpn");
		copyText.select();
		copyText.setSelectionRange(0, 99999)
		document.execCommand("copy");
		$('#status_copy').text('Copied');
		
		$('#status_copy').hide();
		$('#ticks').show();
	}
	
	/* For giving reviews */
	
	$('.reviews').click(function(){
		var type      = this.id;
	    var couponID  =	$(this).attr('data-couponID');
		var brandID   = $(this).attr('data-brandId');
		var cateID    = $(this).attr('data-categorID');
		var pertage   = $('#coupon_per').text();
		var vote      = $('#vote_per').text();
		
		if(brandID!="" && couponID!=""){
			$.ajax({
				url:"<?php echo base_url();?>home/give_review",
				method:"POST",
				data: { "couponID": couponID, 'brandID': brandID, 'cateID': cateID,'type':type },
				dataType: "json",
				success:function(data)
				{  
			
					if(data.type=="Like"){ 
						
						$('#Like').css('color','#5c8374');
						$('#Dislike').css('color','#989898');	
					}
					else if(data.type=="Dislike"){
						$('#Dislike').css('color','#5c8374');
						$('#Like').css('color','#989898');
						$('#Like').removeClass('reviews');	
					}
				
					$('#vote_per').text(data.total_votes);
					$('#coupon_per').text(data.success_rate);
					
				} 
			});
		}
	});
	
	/* For giving reviews */
	
	
/* $( document ).ready(function(event) { 
  
// Uses sharer.js 
//  https://ellisonleao.github.io/sharer.js/#twitter	
   var url = window.location.href;
   var title = document.title;
   var subject = "Read this good article";
   var via = "yourTwitterUsername";
    console.log( url );
   //console.log( title );

//facebook
$('#share-wa').attr('data-url', url).attr('data-title', title).attr('data-sharer', 'whatsapp');
//facebook
$('#share-fb').attr('data-url', url).attr('data-sharer', 'facebook');
//twitter
$('#share-tw').attr('data-url', url).attr('data-title', title).attr('data-via', via).attr('data-sharer', 'twitter');
//linkedin
$('#share-li').attr('data-url', url).attr('data-sharer', 'linkedin');
// google plus
$('#share-gp').attr('data-url', url).attr('data-title', title).attr('data-sharer', 'googleplus');
  // email
  $('#share-em').attr('data-url', url).attr('data-title', title).attr('data-subject', subject).attr('data-sharer', 'email');

//Prevent basic click behavior
$( ".sharer" ).click(function(event) {
  event.preventDefault();

});
  
  
// only show whatsapp on mobile devices  
var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}

if ( isMobile == true ) {
$("#share-wa").hide();
}

  
  
  
  


}); */
  
	
</script>