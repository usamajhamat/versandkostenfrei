<?php
if($page_name == "brands"){

	$this->db->select('AVG(stars) As avg_r');
	$all_stars    = $this->db->get_where('reviews',array('brands_id'=>$param1))->row()->avg_r;
	?>
  <script src="<?php echo base_url(); ?>assets/home/js/base.js.download" type="text/javascript"></script>	

	<script class="stars_ids">
	var init = "0";
	$(function() {
	$(".my-rating-6").starRating({
		totalStars: 5,
		emptyColor: 'lightgray',
		hoverColor: '#004AAD',
		activeColor: '#004AAD',
		initialRating: init,
		strokeWidth: 0,
		useGradient: false,
		minRating: 1,
		callback: function(currentRating, $el){
        var brands_id = $("#brands_ids").attr('date-brands_id');
	 	var ratting = currentRating;
		 	$.ajax({
				url:"https://influencer-code.de/home/give_ratting",
				method:"POST",
				data: { "ratting": ratting, 'brandID': brands_id},
				dataType: "json",
				success:function(data)
				{   		
			        if(data.msg=="success"){
                        $("#brnd_num").text(data.all_reviews);
						$("#avrg").text(data.avg_star);
					}									
				} 
			});  
		}
      });
	});

	/* $(document).ready(function() {
		// $('.brand_hide').show(1000);
		if($('.brand_hide').length > 0)
		{

		}
	}); */
	</script>
	<script type="text/javascript" src="https://influencer-code.de/assets/home/star_ratting/jquery.star-rating-svg.js"></script>
	<?php
}
?> 

<?php if($page_name != "brands"){ ?>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/js/bootstrap.min.js"></script>  -->

<script src="<?php echo base_url()?>assets/home/slick/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/home/slick/js/slick.js"></script>
<script src="<?php echo base_url()?>assets/home/js/all_custom_js.js"></script>

<?php } ?> 
<!-- notification js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/superplaceholder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
<script>
  var BASE_URL = "<?= base_url(); ?>";
</script>
<script src="<?= base_url('assets/home/js/script.js?v2'); ?>"></script>
<!-- show hide search bar -->
<?php if($page_name != 'home') { ?>
	<script>
		// $('#showHideMobileSearch').on('click',function() {
			// $("#mobile-search-box").toggleClass('d-none');
			if ($(window).width() < 767.99) {
				$(".js-searchblock").detach().appendTo("#mobile-search-box");
			}
		// });
	</script>
<?php } ?>

<!--- Toaster Start----->
<script>
	<?php if($this->session->flashdata('msg_success')){ ?>
		notify('fa fa-comments', 'success', 'Title ', '<?php echo $this->session->flashdata("msg_success")?>');
	<?php } else if($this->session->flashdata('msg_error')){ ?>
		notify('fa fa-comments', 'danger', 'Title ', '<?php echo $this->session->flashdata("msg_error")?>');
	<?php } else if($this->session->flashdata('msg_warning')){ ?>
		notify('fa fa-comments', 'warning', 'Title ', '<?php echo $this->session->flashdata("msg_warning")?>');
	<?php } else if($this->session->flashdata('msg_info')){ ?>
		notify('fa fa-comments', 'info', 'Title ', '<?php echo $this->session->flashdata("msg_info")?>');
	<?php } ?>
</script>
<script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type"   : "WebSite",
        "name"    : "versandkostenfrei.promo",
        "url"     : "<?php echo base_url() ?>"
      }
</script>
	<?php
	if($page_name != "brands"){
		?>
		<script src="<?php echo base_url(); ?>assets/home/js/base.js.download" type="text/javascript"></script>	
		<?php
	}
    ?>
	

<?php 
$seoData     = $this->db->get_where('seo_setting',array('page_name'=>"Home page"))->row();
/* 	echo	$this->db->last_query(); exit; */
$google_analytics       = $seoData->google_analytics;

if(!empty($google_analytics)){

//	echo $google_analytics;
?>
<!-- <script>
</script> -->
<?php
}
?>
<script type="text/javascript">
<?php 

	if(!empty($unsub)){
        ?>
	  var subs_id = <?php echo $unsub; ?> 
	  $.ajax({
				url:"<?php echo base_url();?>home/unsubscribe/check",
				method:"POST",
				data: { "subs_id": subs_id},
				success:function(data)
				{   
					if(data=="1"){
						/* notify('fa fa-comments', 'danger', 'Title ', ' Already Unsubscribe'); */
						$("#4Modal").modal();	
					}
					else{
						$("#unsub_form").attr('action','<?php echo base_url()."home/unsubscribe/"?>'+subs_id);
	                    $("#my4Modal").modal();	
					}
								
				} 
		});


		<?php
	}

	if(!empty($unsub_alert)){
        ?>
	  var subs_id = <?php echo $unsub_alert; ?> 
	  var brands_id = <?php echo $brands_id; ?> 
	  $.ajax({
				url:"<?php echo base_url();?>home/unsubscribe/check_alert",
				method:"POST",
				data: { "subs_id": subs_id},
				success:function(data)
				{   
					if(data=="1"){
						/* notify('fa fa-comments', 'danger', 'Title ', ' Already Unsubscribe'); */
						$("#4Modal").modal();	
					}
					else{
						$("#unsub_form").attr('action','<?php echo base_url()."home/unsubscribe/unsub_alert/"?>'+subs_id+'/'+brands_id);
	                    $("#my4Modal").modal();	
					}
								
				} 
		});
	<?php
            }   
        ?>

<?php 
if (!empty($remove_phill)) {
    if ($remove_phill == "Yes") {	
?>
$(document).ready(function() {
    var id = "<?php echo $open_coupon_id; ?>";
    $("." + id).css('text-align','center');
    showAjaxModalCoupon('<?php echo base_url() ?>modal/popup/coupon_details/home/<?php echo $open_coupon_id; ?>');
});
<?php 
    } elseif ($remove_phill == "OK") {
?>
$(document).ready(function() {
    var id = "<?php echo $open_coupon_id; ?>";
    $("." + id).css('text-align','center');
    showAjaxModalCoupon('<?php echo base_url() ?>modal/popup/show_coupon/home/<?php echo $open_coupon_id; ?>');
});
<?php 
    }
}
?>
    
</script>

<!--<script src="https://bootstrapmade.com/assets/js/main.js"></script>-->
<script>
$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $("#header").addClass("change-header-bg");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $("#header").removeClass("change-header-bg");
    }
});
</script>