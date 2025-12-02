<!--<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/modernizr/js/modernizr.js"></script>
<!-- data-table js -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/data-table/js/data-table-custom.js?t=<?= mt_rand(1111,9999); ?>"></script>

 <!-- notification js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/pages/notification/notification.js"></script>

<!-- Chart js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/chart.js/js/Chart.js"></script>
<!-- amchart js -->
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/widget/amchart/amcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/widget/amchart/serial.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/widget/amchart/light.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/SmoothScroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bower_components/fullcalendar/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/pcoded.min.js"></script>
<!-- custom js 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/pages/full-calender/calendar.js"></script>-->
<script src="<?php echo base_url(); ?>assets/admin/assets/js/vartical-layout.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/script.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/select2.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.steps.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/summernote-bs4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>-->
<!--- SELECTPICKER -----> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/selectpicker/picker.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> 

<script>  
    // CKEDITOR.inline( 'editor1' );
     CKEDITOR.replace('editor1');  
    
 
</script>
<script type="text/javascript"> 

$(document).ready(function() {
	$("img").on("error", function () {
		$(this).attr("src", "<?php echo base_url();?>assets/default.svg");
	});
	var gArrayFonts = ['Amethysta','Poppins','Poppins-Bold','Poppins-Black','Poppins-Extrabold','Poppins-Extralight','Poppins-Light','Poppins-Medium','Poppins-Semibold','Poppins-Thin'];
  $('.summernote').summernote({
	 fontNames: gArrayFonts,
    fontNamesIgnoreCheck: gArrayFonts,
    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22' , '24', '28', '32', '36', '40', '48'],
    followingToolbar: true,
    dialogsInBody: true,
	disableDragAndDrop: false,
	blockquoteBreakingLevel: 2,
	spellCheck: true,	
    toolbar: [
    // [groupName, [list of button]]
    ['style'],
    ['style', ['clear', 'bold', 'italic', 'underline']],
    ['fontname', ['fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],       
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
	
	['insert', ['link', 'picture', 'video','hr']],
	['height', ['height']],
	['view', ['codeview', 'help','fullscreen']],
	// ['mybutton', ['myVideo']], 
    ],
	buttons: {
      myVideo: function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
          contents: '<i class="fa fa-video-camera"/>',
          tooltip: 'video',
          click: function() {
            var div = document.createElement('div');
            div.classList.add('embed-container');
            var iframe = document.createElement('iframe');
            iframe.src = prompt('Enter video url:');
            iframe.setAttribute('frameborder', 0);
            iframe.setAttribute('width', '100%');
            iframe.setAttribute('allowfullscreen', true);
            div.appendChild(iframe);
            context.invoke('editor.insertNode', div);
          }
        });

        return button.render();
      }
    },
	popover: {
		image: [
			['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
			['float', ['floatLeft', 'floatRight', 'floatNone']],
			['remove', ['removeMedia']]
		],
		link: [
			['link', ['linkDialogShow', 'unlink']]
		],
		table: [
			['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
			['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
		],
		air: [
			['color', ['color']],
			['font', ['bold', 'underline', 'clear']],
			['para', ['ul', 'paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture']]
		]
		}
  });
  /***************************aiman */
  $(".swap").hide();
  $(".subcateswap").hide();
   /***************************aiman */
});

function showStatusPop(param){
	$('#modal_ajax').modal('toggle');
	setTimeout(function(){
	  $('#status_approve_btn_'+param).click();
	}, 400);
	
}
function get_available_equipment(id){
	var location_id = $('#'+id).children("option:selected").val();
	$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/get_equipments",
		data:{'location_id': location_id},
		success:function (data) {
			$('#available_equipment_id').html(data);
		}
	});
}
function get_sub_category(id){
	var category_id = $('#'+id).children("option:selected").val();
	$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/get_mucle_sub_cat",
		data:{'category_id': category_id},
		success:function (data) {
			$('#muscle_sub_category_id').html(data);
		}
	});
}
</script>
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

<script>
  function sub_cate(val){
	
		$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/show_subcate",
		dataType: "html",
		data:{'sub_category_id': val},
		success:function (data_is) {
		
			if(data_is!="No subcategory"){
				$('#sub_cate_paste').html(data_is);
			}
			else{
				$('#sub_cate_paste').html("");
			}
		}
	});
};


</script>

<script>

$('.cb-value').click(function() {
	  var mainParent = $(this).parent('.toggle-btn');
	  var status ='';
	  if($(mainParent).find('input.cb-value').is(':checked')) {
		$(mainParent).addClass('active');
		 var status ='yes';
		
	  } else {
		$(mainParent).removeClass('active');
		var status ='no';
	  }
	  var type = $(this).attr('data-type');
	  var table = "slider_images";
	  var slider_imagesId = $(this).val();
	  if(type!="emails"){
	   $.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/update_status",
			data:{'status':status,'slider_imagesId':slider_imagesId,'table':table},
			success:function (response) {
				if(response == 'false'){
			      Command: toastr['error']("Status not updated");
				}else{
					if(status == "Active"){
						Command: toastr['success']("User Activated succesfully");
					}else{
						Command: toastr['success']("User Deactivated succesfully");
					}
				}
			
			}  
		}); 
	} 

	})
	$('.cb-value1').click(function() {

		
	  var mainParent = $(this).parent('.toggle-btn');
	  var status ='';
	  if($(mainParent).find('input.cb-value1').is(':checked')) {
		$(mainParent).addClass('active');
		 var status ='Yes';
		
	  } else {
		$(mainParent).removeClass('active');
		var status ='No';
	  }
	  var brandsId = $(this).val();
	

	   $.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/update_slider",
			data:{'status':status,'brandsId':brandsId},
			success:function (response) {
				if(response == 'false'){
			      Command: toastr['error']("Status not updated");
				}else{
					if(status == "Active"){
						Command: toastr['success']("User Activated succesfully");
					}else{
						Command: toastr['success']("User Deactivated succesfully");
					}
				}
			
			}  
		}); 
	 

	})
   $('.all_tags').on("click",".cross", function(){
	   var brand_id = $(this).attr('data-brands_id');
	   var cat_id = $(this).attr('data-cats_id');
	   
	   $.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/manage_newsletter_interest/delete_interest",
		dataType: "JSON",
		data:{'cat_id': cat_id,'brands_id': brand_id},
		success:function (data_is) {
		
		   if(data_is == "success"){
			 $('#'+brand_id).hide();
	         $('#select_'+cat_id).show();  
		   }
		
		}
	    });
	  
   });
   $('.select_brands').change(function(){
        
	   var slect  = this.id;
	   var cat_id = $(this).attr('data-cat');
	   var name   = $('option:selected', '#'+slect).attr('id');
	   var id     = $('option:selected', '#'+slect).val();
	   
	    var section ="";
	    section += ' <div class="tag" id="'+id+'">';
	    section += '  <span>';
	    section += '  '+name+' <span class="cross" data-brands_id= "'+id+'" data-cats_id= "'+cat_id+'">&#x2715 </span>';
	    section += '  </span>';
	    section += ' </div>';
	   
	
	   var count = $("#tags_"+cat_id).find(".tag").length;
	   var total_tag = count;
	   console.log(total_tag);
	   if(total_tag>4){
		  $(this).hide(); 
	   }   
	   $.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/manage_newsletter_interest/add_interest",
		dataType: "JSON",
		data:{'cat_id': cat_id,'brands_id': id},
		success:function (data_is) {
		
		   if(data_is == "success"){
			 $('.no_'+cat_id).hide();
	         $("#tags_"+cat_id).append(section);  
		   }
		
		}
	    });
	   
   });
</script>
	<script>
	/********************************Aiman ******************************/
	
     /************** up icon code ******************/
	$('.id-value').click(function() {
		/* alert("here"); */
	 var id_value = $(this).attr('id');
	  var res = id_value.split("_");
	  var id=res[2];
	  var type=res[1];


	 // $("#upspan_"+id_value).show();
	
	  if( type=='latest'){
		var old_value = $('.downspan_latest_'+res[2]).text();
			
		++old_value;
			
		$(".downspan_latest_"+res[2]).text(old_value);
		$("#upspan_latest_"+id).show();
	 }
	 if(type=='cate'){
        
	    var old_value = $('.downspan_cate_'+res[2]).text();
			
		++old_value;
			
		$(".downspan_cate_"+res[2]).text(old_value);
		$("#upspan_cate_"+id).show();
		
	 }
	 if(type=='subcate'){
        
		var old_value = $('.downspan_subcate_'+res[2]).text();
			
		++old_value;
			
		$(".downspan_subcate_"+res[2]).text(old_value);
		$("#upspan_subcate_"+id).show();
	
 	}
	 if(type=='trending'){
        
		var old_value = $('.downspan_trending_'+res[2]).text();
			
		++old_value;
			
		$(".downspan_trending_"+res[2]).text(old_value);
		$("#upspan_trending_"+id).show();
	
 	}
	 if(type=='tips'){
        
		var old_value = $('.downspan_tips_'+res[2]).text();
			
			++old_value;
				
			$(".downspan_tips_"+res[2]).text(old_value);
			$("#upspan_tips_"+id).show();
	
 	}
	 
		


	 /*  alert(res[1]); */
	});
	 /************** up icon code ******************/


	  /************** swapp code ******************/
	$('.swap').click(function() {

		var id_value = $(this).attr('id');
		var res = id_value.split("_");
		var id=res[2];
		var type=res[1];

	
		var old_value = $('.downspan_'+type+'_'+id).text();

		//alert(old_value);
        // alert(old_value); 

		if(type=="latest"){
			$.ajax({
			method: 'post',
			url: '<?php echo base_url();?>admin/swap',
			data_type:"JSON",
			data: {
				'type':type,
				'lastest_order': old_value,
				'coupons_id':id,
				'ajax': true
			},
			success: function(data) {
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['lastest_order']);
			console.log(jsonData.lastest_order);
			$('#upspan_'+type+'_'+id).hide();

			 if(jsonData['coupons_id']!=""){
				$('.downspan_'+type+'_'+jsonData['coupons_id']).text(jsonData['lastest_order']);
			 }

				//$('#dataresult').text(data.sub_page_order);
			}
  	 	   });
		}
		if(type=="cate"){
			$.ajax({
			method: 'post',
			url: '<?php echo base_url();?>admin/swap',
			data_type:"JSON",
			data: {
				'type':type,
				'cate_page_order': old_value,
				'coupons_id':id,
				'ajax': true
			},
			success: function(data) {
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['sub_page_order']);
			console.log(jsonData.sub_page_order);
			$('#upspan_'+type+'_'+id).hide();
			 
			if(jsonData['coupons_id']!=""){
				$('.downspan_'+type+'_'+jsonData['coupons_id']).text(jsonData['sub_page_order']);
			}

				//$('#dataresult').text(data.sub_page_order);
			}
  	 	   });
		}
		if(type=="subcate"){

			

			$.ajax({
			method: 'post',
			url: '<?php echo base_url();?>admin/swap',
			data_type:"JSON",
			data: {
				'type':type,
				'sub_cate_order': old_value,
				'coupons_id':id,
				'ajax': true
			},
			success: function(data) {
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['sub_cate_order']);
			console.log(jsonData.sub_cate_order);
			 
			if(jsonData['coupons_id']!=""){
				$('.downspan_'+type+'_'+jsonData['coupons_id']).text(jsonData['sub_cate_order']);
			}

			$('#upspan_'+type+'_'+id).hide();
				//$('#dataresult').text(data.sub_page_order);
			}
  	 	   });
		}
		if(type=="trending"){
			$.ajax({
			method: 'post',
			url: '<?php echo base_url();?>admin/swap',
			data_type:"JSON",
			data: {
				'type':type,
				'trending_order': old_value,
				'coupons_id':id,
				'ajax': true
			},
			success: function(data) {
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['trending_order']);
			console.log(jsonData.trending_order);
			 
			if(jsonData['coupons_id']!=""){
				$('.downspan_'+type+'_'+jsonData['coupons_id']).text(jsonData['trending_order']);
			}
			$('#upspan_'+type+'_'+id).hide();
				//$('#dataresult').text(data.sub_page_order);
			}
  	 	   });
		}
		if(type=="tips"){
			$.ajax({
			method: 'post',
			url: '<?php echo base_url();?>admin/swap',
			data_type:"JSON",
			data: {
				'type':type,
				'tips_order': old_value,
				'coupons_id':id,
				'ajax': true
			},
			success: function(data) {
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['tips_order']);
			console.log(jsonData.tips_order);

			if(jsonData['coupons_id']!=""){
				
				$('.downspan_'+type+'_'+jsonData['coupons_id']).text(jsonData['tips_order']);
                				
			  }
            
			$('#upspan_'+type+'_'+id).hide();
			}
  	 	   });
		}
		
		 
		 
	 
	});
    /**************swapp icon code ******************/


      /************** down icon code ******************/
    


	$('.id-downvalue').click(function() {
		
	  var id_value = $(this).attr('id');
	
	  var res = id_value.split("_");
	  var id=res[2];
	  var type=res[1];

	 
	
	
	 // alert('downswap_latest_'+res[2]);
	 if( type=='latest'){
		var old_value = $('.downspan_latest_'+res[2]).text();
			
		--old_value;
			
		$(".downspan_latest_"+res[2]).text(old_value);
		$("#upspan_latest_"+id).show();
	 }
	 if(type=='cate'){
        
	    	var old_value = $('.downspan_cate_'+res[2]).text();
			
			--old_value;
			
			$(".downspan_cate_"+res[2]).text(old_value);
			$("#upspan_cate_"+id).show();
		
	 }
	 if(type=='subcate'){
        
		var old_value = $('.downspan_subcate_'+res[2]).text();
		
		--old_value;
		
		$(".downspan_subcate_"+res[2]).text(old_value);
		$("#upspan_subcate_"+id).show();
	
 	}
	 if(type=='trending'){
        
		var old_value = $('.downspan_trending_'+res[2]).text();
		
		--old_value;
		
		$(".downspan_trending_"+res[2]).text(old_value);
		$("#upspan_trending_"+id).show();
	
 	}
	 if(type=='tips'){
        
		var old_value = $('.downspan_tips_'+res[2]).text();
		
		--old_value;
		
		$(".downspan_tips_"+res[2]).text(old_value);
		$("#upspan_tips_"+id).show();
	
 	 }
	
	});
/*	********** down icon code ******************/
  /*  ********** down cate icon code ******************/
	$('.down_sub_cate').click(function() {
		 /*alert("here"); */
	    
	  var id_value = $(this).attr('id');
	  var res = id_value.split("_");
	  var id=res[1];
	  $("#subcateswap_"+id).show();
	   var old_value = $('.sub_cate_span_'+res[1]).text();
	  /*  alert(old_value); */
	  --old_value;
	 
	  $(".sub_cate_span_"+res[1]).text(old_value);

	 /*  alert(res[1]); */
	});
   /* ********** down cate icon code ******************/



	/********** up cate icon code ******************/
	$('.up_sub_cate').click(function(){
		var id_value = $(this).attr('id');
		//alert(id_value);
		var res = id_value.split("_");
		var id= res[1];
		$("#subcateswap_"+id).show();
		var old_value = $('.sub_cate_span_'+res[1]).text();
		
        ++old_value;
	
		$(".sub_cate_span_"+res[1]).text(old_value);


	});

		/********** up cate icon code ******************/


  /**********  cate swap icon code ******************/
	$(".subcateswap").click(function(){
      /* alert("hi i m swap");*/
	  var id_value= $(this).attr('id');
	  var res= id_value.split("_");
	  var id= res[1];
	  var old_value = $(".sub_cate_span_"+res[1]).text();
	  $.ajax({
		  method:'post',
		  url:'<?php echo base_url();?>admin/subcateswap',
		  data_type:'JSON',
		  data:{
			  'sub_cate_order': old_value,
			  'coupons_id':id,
			  'ajax':true
		  },
		  success: function(data) {
			 // alert("sucess");
			var jsonData = JSON.parse(data);
			console.log(jsonData);
			console.log(jsonData['sub_cate_order']);
			console.log(jsonData.sub_cate_order);
			$('.sub_cate_span_'+jsonData['coupons_id']).text(jsonData['sub_cate_order']);
		  }
	  });

	});

		/**********  cate swap icon code ******************/


	$('.table-responsive').on("click",".check_ed",function() {
	  var mainParent = $(this).parent('.toggle-btn');
	  var status ='';
	  var id_value = this.id;
	  var res= id_value.split("_");
	  var id= res[1];
	  
	  var all_selected = $(".cate_seleted").text();
	  var current = $(".cate_seleted_"+id).text();
	  console.log(all_selected);
	  if($(mainParent).find('input.check_ed').is(':checked')) {
		$(mainParent).addClass('active');
		 var status ='Yes';
		 all_selected++;
		 current++;
	  } else {
		$(mainParent).removeClass('active');
		var status ='No';
		current--;
		all_selected--;
	  }
	  $(".cate_seleted_"+id).text(current);
	  $(".cate_seleted").text(all_selected);
	
	 

	})

	$('.selectedss').click(function(){
      
	   var value =	$(this).attr('data-type');
	   var selected_co =	$('.cate_seleted').text(); 
	   if(value=="expriry"){
	       var coupon_list ="";
			$(this).addClass('active_se');
			if(selected_co >0){
				var coupon_list = $("input[name='checked[]']:checked").map(function () {
				return  this.value;;
			}).get();
			}
			console.log(coupon_list);
			$('.loader_expiry').show();
			$('.selectedss').removeClass('active_se');
			$(this).addClass('active_se');
			$.ajax({
			method: 'POST',
			url: '<?php echo base_url();?>admin/send_newsletter/expiry',
			dataType:"JSON",
			 data: { 
				'coupon_list':coupon_list,
			},
			success: function(data) {
				$('.All_coupons').hide();
				$('.select_coupons').hide(); 
				$('.expiry_coupons').show();
				$('.expiry_coupons').html(data);
				$('.gif_loader').hide();  
				
				var slideDown = function(btn, moreContent) {
					moreContent.slideUp(0, function() {
						moreContent.slideDown(800);
						moreContent.addClass('cs-toggle-active');
					});
					btn.html(csIconClose);
				}
				var csIconOpen = '<span>more Details</span>&nbsp;<i class="fa fa-chevron-down"></i>';
				var csIconClose = '<span>Less Details</span>&nbsp;<i class="fa fa-chevron-up"></i>';
				var csLinkOpenClose = '<div class="js-toggle-more-content cs-toggle-content-button">icon</div>';
				$('.js-toggle-container').each(function() {
					var moreContent = $(this).find('.cs-toggle-content');
					if (!moreContent) return;
					var currentIcon = csIconOpen;
					if (moreContent.hasClass('cs-toggle-active')) currentIcon = csIconClose;
					$(csLinkOpenClose.replace('icon', currentIcon)).insertAfter(moreContent);
					$(this).find('.js-toggle-more-content').bind('click', function() {
						if (moreContent.hasClass('cs-toggle-active')) {
							moreContent.slideUp(800, function() {
								moreContent.removeClass('cs-toggle-active');
							});
							$(this).html(csIconOpen);
						} else {
							slideDown($(this), moreContent);
						}
					});
				});
			}
  	 	   });
			
		} 
		if(value=="total"){
		
			$('.selectedss').removeClass('active_se');
			$(this).addClass('active_se');
			$('.expiry_coupons').hide();
			$('.select_coupons').hide();
			$('.All_coupons').show();		   
		}
        if(value=="selected" ){
		  	
          if(selected_co >0){
			$('.loader_select').show();
			$('.selectedss').removeClass('active_se');
			$(this).addClass('active_se');
			var coupon_list = $("input[name='checked[]']:checked").map(function () {
			return  this.value;;
		}).get();
	    console.log(coupon_list);

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url();?>admin/send_newsletter/selected',
			dataType:"JSON",
			 data: {
				'coupon_list':coupon_list,
			},
			success: function(data) {
				$('.expiry_coupons').hide();
				$('.All_coupons').hide();
				$('.select_coupons').show();
			    $('.select_coupons').html(data);
				$('.gif_loader').hide();
				
				var slideDown = function(btn, moreContent) {
					moreContent.slideUp(0, function() {
						moreContent.slideDown(800);
						moreContent.addClass('cs-toggle-active');
					});
					btn.html(csIconClose);
				}
				var csIconOpen = '<span>more Details</span>&nbsp;<i class="fa fa-chevron-down"></i>';
				var csIconClose = '<span>Less Details</span>&nbsp;<i class="fa fa-chevron-up"></i>';
				var csLinkOpenClose = '<div class="js-toggle-more-content cs-toggle-content-button">icon</div>';
				$('.js-toggle-container').each(function() {
					var moreContent = $(this).find('.cs-toggle-content');
					if (!moreContent) return;
					var currentIcon = csIconOpen;
					if (moreContent.hasClass('cs-toggle-active')) currentIcon = csIconClose;
					$(csLinkOpenClose.replace('icon', currentIcon)).insertAfter(moreContent);
					$(this).find('.js-toggle-more-content').bind('click', function() {
						if (moreContent.hasClass('cs-toggle-active')) {
							moreContent.slideUp(800, function() {
								moreContent.removeClass('cs-toggle-active');
							});
							$(this).html(csIconOpen);
						} else {
							slideDown($(this), moreContent);
						}
					});
				});
			}
  	 	   });
			
			
        
		  }
		  else{
			notify('fa fa-comments', 'danger', 'Title ', 'Please select some coupons');
		  }
		}
	});	

	$('.selecteds').click(function(){
      
	  var value =	$(this).attr('data-type');
	  var res = value.split("_");
	  value = res[0];
	  console.log("dataType",value);
	  var cate_id = res[1];
	  console.log("cate_id",cate_id);
	  var selected_co =	$('.cate_seleted_'+cate_id).text(); 

	  if(value=="totalex"){
		
		  var coupon_list ="";
		   $(this).addClass('active_se');
		   if(selected_co >0){
			   var coupon_list = $("input[name='checked[]']:checked").map(function () {
			   return  this.value;;
		   }).get();
		   }
		   console.log(coupon_list);
		   $('.loader_ex_'+cate_id).show();
		   $('.selecteds').removeClass('active_se');
		   $(this).addClass('active_se');
		   $.ajax({
		   method: 'POST',
		   url: '<?php echo base_url();?>admin/send_newsletter/sub_expiry',
		   dataType:"JSON",
			data: { 
			   'coupon_list':coupon_list,'cate_id':cate_id 
		   },
		   success: function(data) {
			   $('.allsub_'+cate_id).hide();
			   $('.subsel_'+cate_id).hide(); 
			   $('.subex_'+cate_id).show();
			   $('.subex_'+cate_id).html(data);
			   $('.gif_loader_sub').hide();  
			   
			   var slideDown = function(btn, moreContent) {
				   moreContent.slideUp(0, function() {
					   moreContent.slideDown(800);
					   moreContent.addClass('cs-toggle-active');
				   });
				   btn.html(csIconClose);
			   }
			   var csIconOpen = '<span>more Details</span>&nbsp;<i class="fa fa-chevron-down"></i>';
			   var csIconClose = '<span>Less Details</span>&nbsp;<i class="fa fa-chevron-up"></i>';
			   var csLinkOpenClose = '<div class="js-toggle-more-content cs-toggle-content-button">icon</div>';
			   $('.js-toggle-container').each(function() {
				   var moreContent = $(this).find('.cs-toggle-content');
				   if (!moreContent) return;
				   var currentIcon = csIconOpen;
				   if (moreContent.hasClass('cs-toggle-active')) currentIcon = csIconClose;
				   $(csLinkOpenClose.replace('icon', currentIcon)).insertAfter(moreContent);
				   $(this).find('.js-toggle-more-content').bind('click', function() {
					   if (moreContent.hasClass('cs-toggle-active')) {
						   moreContent.slideUp(800, function() {
							   moreContent.removeClass('cs-toggle-active');
						   });
						   $(this).html(csIconOpen);
					   } else {
						   slideDown($(this), moreContent);
					   }
				   });
			   });
		   }
			 });
		   
	   } 
	   if(value=="totalvoc"){
	   
		$('.selecteds').removeClass('active_se');
		$(this).addClass('active_se');

			$('.subsel_'+cate_id).hide(); 
			$('.subex_'+cate_id).hide();
			$('.gif_loader_sub').hide(); 
			$('.allsub_'+cate_id).show();		   
	   }
	   if(value=="totalslec" ){
			 
		 if(selected_co >0){
		   $('.loader_sel_'+cate_id).show();
		   $('.selecteds').removeClass('active_se');
		   $(this).addClass('active_se');
		   var coupon_list = $("input[name='checked[]']:checked").map(function () {
		   return  this.value;;
	   }).get();
	   console.log(coupon_list);

	   $.ajax({
		   method: 'POST',
		   url: '<?php echo base_url();?>admin/send_newsletter/select_sub',
		   dataType:"JSON",
			data: {
			   'coupon_list':coupon_list,'cate_id':cate_id 
		   },
		   success: function(data) {
			   $('.allsub_'+cate_id).hide();
			   $('.subex_'+cate_id).hide();
			   $('.subsel_'+cate_id).show();
			   $('.subsel_'+cate_id).html(data);
			   $('.gif_loader_sub').hide();
			   
			   var slideDown = function(btn, moreContent) {
				   moreContent.slideUp(0, function() {
					   moreContent.slideDown(800);
					   moreContent.addClass('cs-toggle-active');
				   });
				   btn.html(csIconClose);
			   }
			   var csIconOpen = '<span>more Details</span>&nbsp;<i class="fa fa-chevron-down"></i>';
			   var csIconClose = '<span>Less Details</span>&nbsp;<i class="fa fa-chevron-up"></i>';
			   var csLinkOpenClose = '<div class="js-toggle-more-content cs-toggle-content-button">icon</div>';
			   $('.js-toggle-container').each(function() {
				   var moreContent = $(this).find('.cs-toggle-content');
				   if (!moreContent) return;
				   var currentIcon = csIconOpen;
				   if (moreContent.hasClass('cs-toggle-active')) currentIcon = csIconClose;
				   $(csLinkOpenClose.replace('icon', currentIcon)).insertAfter(moreContent);
				   $(this).find('.js-toggle-more-content').bind('click', function() {
					   if (moreContent.hasClass('cs-toggle-active')) {
						   moreContent.slideUp(800, function() {
							   moreContent.removeClass('cs-toggle-active');
						   });
						   $(this).html(csIconOpen);
					   } else {
						   slideDown($(this), moreContent);
					   }
				   });
			   });
		   }
			 });
		   
		   
	   
		 }
		 else{
		   notify('fa fa-comments', 'danger', 'Title ', 'Please select some coupons');
		 }
	   }
   });

	
	var slideDown = function(btn, moreContent) {
		moreContent.slideUp(0, function() {
			moreContent.slideDown(800);
			moreContent.addClass('cs-toggle-active');
		});
		btn.html(csIconClose);
	}
	var csIconOpen = '<span>more Details</span>&nbsp;<i class="fa fa-chevron-down"></i>';
	var csIconClose = '<span>Less Details</span>&nbsp;<i class="fa fa-chevron-up"></i>';
	var csLinkOpenClose = '<div class="js-toggle-more-content cs-toggle-content-button">icon</div>';
	$('.js-toggle-container').each(function() {
		var moreContent = $(this).find('.cs-toggle-content');
		if (!moreContent) return;
		var currentIcon = csIconOpen;
		if (moreContent.hasClass('cs-toggle-active')) currentIcon = csIconClose;
		$(csLinkOpenClose.replace('icon', currentIcon)).insertAfter(moreContent);
		$(this).find('.js-toggle-more-content').bind('click', function() {
			if (moreContent.hasClass('cs-toggle-active')) {
				moreContent.slideUp(800, function() {
					moreContent.removeClass('cs-toggle-active');
				});
				$(this).html(csIconOpen);
			} else {
				slideDown($(this), moreContent);
			}
		});
	});
    
    /* Code by moaviz */


	$('.downvalue_brands').click(function(){

		
		var id_value = $(this).attr('id');
		var page_type = $(this).attr('data-pagetype');
		var res        = id_value.split("_");
		var arrow_type = res[0];
		var id         = res[2];
		var type       = res[1];
		var old_value = $('.downspan_'+type+'_'+res[2]).text();
	
			if(arrow_type == "upswap"){
				++old_value;
			}
			if(arrow_type == "downswap"){
				--old_value;
			}

		$(".downspan_"+type+"_"+id).text(old_value);
		$("#upspan_"+type+"_"+id).show();
	})
	$('.swaping').click(function(){
        var page_type = $(this).attr('data-pagetype');
		var id_value = $(this).attr('id');
		var res        = id_value.split("_");

		var arrow_type = res[0];
		var id         = res[2];
		var type       = res[1];
        var new_value = $('.downspan_'+type+'_'+res[2]).text();
	    $.ajax({
		  method:'post',
		  url:'<?php echo base_url();?>admin/sortswaping',
		  dataType:'JSON',
		  data:{
			  'new_value': new_value,
			  'item_id':id,
			  'pagetype':page_type,
			  'sorttype':type 
		  },
		  success: function(data) {	
			
		  	var update_data = data.max_value_array;
			 update_data.forEach(function (element, index) {
				console.log(element.updated_ids);
				var new_value = $('.downspan_'+type+'_'+element.updated_ids).text(element.updated_values);
			}) 
			$("#upspan_"+type+"_"+id).hide();
			notify('fa fa-comments', 'success', 'Title ', ' Sort order updated successfuly');
		  }
	  });   
 

	});
/* Code by moaviz */


	</script>

<script>
$(document).ready(function(){
// For coupon code
 $( "#coupons_code" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_code li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/brands_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons code order updated successfully');

    }
   });
  }
 });
//  For Coupons_offer
 $( "#coupons_offer" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_offer li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/brands_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons offer order updated successfully');

    }
   });
  }
 });

 //  For Coupons_free
 $( "#coupons_free" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_free li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/brands_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free items order updated successfully');
    }
   });
  }
 });

 //  For coupons_shipping
 $( "#coupons_shipping" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_shipping li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/brands_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free shipping order updated successfully');
    }
   });
  }
 });
 //  For coupons_shipping
 $( "#coupons_deals" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_deals li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/brands_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    	notify('fa fa-comments', 'success', 'Title ', ' Coupons deals order updated successfully');
    }
   });
  }
 });
  //  For Navbar 
  $( "#nav_sort" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#nav_sort li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/nav_bar_sorting/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    	notify('fa fa-comments', 'success', 'Title ', ' NavBar brands order updated successfully');
    }
   });
  }
 });
 //For popular
 $( "#popularr" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#popularr li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/popular_coupon_order/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		console.log('popular---',data);
    	notify('fa fa-comments', 'success', 'Title ', ' Popular coupon order updated successfully');
    }
   });
  }
 });
 //For popular
 $( "#popular_sort" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#popular_sort li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/popular_brands_order/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		console.log('popular---',data);
    	notify('fa fa-comments', 'success', 'Title ', ' Popular coupon order updated successfully');
    }
   });
  }
 });

 //For Category---
 $( "#nav_category_sort" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#nav_category_sort li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/nav_bar_category/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		console.log('popular---',data);
    	notify('fa fa-comments', 'success', 'Title ', ' Navbar categories order updated successfully');
    }
   });
  }
 });
 
 //For popular Category---
 $( "#popular_category_sort" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#popular_category_sort li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/popular_cat_order/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		console.log('popular---',data);
    	notify('fa fa-comments', 'success', 'Title ', ' Popular categories order updated successfully');
    }
   });
  }
 });

 // For cate sorting

 // For coupon code
 $( "#coupons_code_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_code_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons code order updated successfully');

    }
   });
  }
 });
//  For Coupons_offer
 $( "#coupons_offer_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_offer_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons offer order updated successfully');

    }
   });
  }
 });

 //  For Coupons_free
 $( "#coupons_free_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_free_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free items order updated successfully');
    }
   });
  }
 });

 //  For coupons_shipping
 $( "#coupons_shipping_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_shipping_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free shipping order updated successfully');
    }
   });
  }
 });
 //  For coupons_shipping
 $( "#coupons_deals_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#coupons_deals_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    	notify('fa fa-comments', 'success', 'Title ', ' Coupons deals order updated successfully');
    }
   });
  }
 });

 // For subcat sorting


 // For coupon code
 $( "#sub_coupons_code_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_coupons_code_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons code order updated successfully');

    }
   });
  }
 });
//  For Coupons_offer
 $( "#sub_coupons_offer_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_coupons_offer_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons offer order updated successfully');

    }
   });
  }
 });

 //  For Coupons_free
 $( "#sub_coupons_free_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_coupons_free_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free items order updated successfully');
    }
   });
  }
 });

 //  For coupons_shipping
 $( "#sub_coupons_shipping_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_coupons_shipping_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Coupons free shipping order updated successfully');
    }
   });
  }
 });
 //  For coupons_shipping
 $( "#sub_coupons_deals_cate" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_coupons_deals_cate li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_categories_order_coupon/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    	notify('fa fa-comments', 'success', 'Title ', ' Coupons deals order updated successfully');
    }
   });
  }
 });
 //  For coupons_shipping
 $( "#sub_category_sort" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#sub_category_sort li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url();?>admin/sub_cate_order/update",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    	notify('fa fa-comments', 'success', 'Title ', ' Subactegory order updated successfully');
    }
   });
  }
 });

 $( "#brands_content" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#brands_content tr').each(function(){
    page_id_array.push($(this).attr("id"));
   });

   console.log("page_id_array",page_id_array);
   $.ajax({
    url:"<?php echo base_url();?>admin/pages_content/sort_order/brand_content",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Content sort order updated successfuly');

    }
   });
  }
 });
 
});

$("#system_settings").submit(function(e){
        e.preventDefault();
		var otp    = Math.floor(1000 + Math.random() * 9000);
		var email  = $('#old_email').val();
		var otp_input  = $('#otp_input').val();
		
        console.log("otp_input",otp_input);
		$("#otp_section").show();
		if(otp_input==""){
			$.ajax({
			url:"<?php echo base_url();?>admin/send_otp",
			method:"POST",
			data:{otp:otp,email,email},
			success:function(data)
			{
				notify('fa fa-comments', 'success', 'Title ', ' You have received a 4 digits OTP code on your email '+email);
			}
		});
		}
		else{
			$.ajax({
			url:"<?php echo base_url();?>admin/check_otp",
			method:"POST",
			data:{check_opt:otp_input},
			success:function(res)
			{
				console.log("response",);
				if(res=='1'){
					var form = $("#system_settings");
					var url = form.attr('action'); 
					console.log("url",url);
					$.ajax({
					type: form.attr('method'),
					url: form.attr('action'),
					data: form.serialize()
					}).done(function(data) {
					// Optionally alert the user of success here...
					
					location.reload();

					}).fail(function(data) {
						location.reload();
					// Optionally alert the user of an error here...
					});
				}
				else{
					notify('fa fa-comments', 'success', 'Title ', ' You have enter a wrong otp ');
				}
				
			}
		});
		}
		
});
</script>
<script type="text/javascript">
   $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $(".search_select").select2();
});
$('.select_similar_brands').change(function(){
	    let main_brands_id = $('.select_similar_brands').attr('data-brands_id');
		var name   = $(this).find('option:selected').attr('id')
		var id     = $(this).val();
		
		
		
	 
		$.ajax({
		 type:"POST",
		 url:"<?php echo base_url();?>admin/similar_brands/add_similar",
		 dataType: "JSON",
		 data:{'main_brands_id': main_brands_id,'brands_id': id},
		 success:function (data_is) {
		 
			if(data_is.status == "success"){
				var section ="";
				section += ' <div data-similar_id="'+data_is.id+'" class="tag" id="'+id+'">';
				section += '  <span>';
				section += '  '+name+' ';
				section += '  </span>';
				section += '  <span class="cross_press" data-brands_id= "'+id+'" >&#x2715 </span>';
				section += ' </div>';
				$("#tags").append(section);  
			}
		 
		 }
		 });
		
	});

	$('.all_tags').on("click",".cross_press", function(){
	   let main_brands_id = $('.select_similar_brands').attr('data-brands_id');
	   var brand_id = $(this).attr('data-brands_id');
	   
	   $.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/similar_brands/delete_similar",
		dataType: "JSON",
		data:{'main_brands_id': main_brands_id,'brands_id': brand_id},
		success:function (data_is) {
		
		   if(data_is == "success"){
			 $('#tags #'+brand_id).hide();
	         
		   }
		
		}
	    });
	  
   });
   $( ".tags_drag" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('.tags_drag div').each(function(){
    page_id_array.push($(this).attr("data-similar_id"));
   });

   console.log("page_id_array",page_id_array);
   $.ajax({
    url:"<?php echo base_url();?>admin/similar_brands/sort_order",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Similar brands sort order updated successfuly');
    }
   });
  }
 });


 
//  Hidden brands
$('.select_similar_hidden_brands').change(function(){
	    let main_brands_id = $('.select_similar_hidden_brands').attr('data-brands_id');
		var name   = $(this).find('option:selected').attr('id')
		var id     = $(this).val();
		
		
		
	 
		$.ajax({
		 type:"POST",
		 url:"<?php echo base_url();?>admin/similar_hidden_brands/add_similar",
		 dataType: "JSON",
		 data:{'main_brands_id': main_brands_id,'brands_id': id},
		 success:function (data_is) {
		 
			if(data_is.status == "success"){
				var section ="";
				section += ' <div data-similar_id="'+data_is.id+'" class="tag" id="'+id+'">';
				section += '  <span>';
				section += '  '+name+' ';
				section += '  </span>';
				section += '  <span class="cross_press" data-brands_id= "'+id+'" >&#x2715 </span>';
				section += ' </div>';
				$("#tags2").append(section);  
			}
		 
		 }
		 });
		
	});

	$('.all_tags2').on("click",".cross_press", function(){
	   let main_brands_id = $('.select_similar_hidden_brands').attr('data-brands_id');
	   var brand_id = $(this).attr('data-brands_id');
	   
	   $.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/similar_hidden_brands/delete_similar",
		dataType: "JSON",
		data:{'main_brands_id': main_brands_id,'brands_id': brand_id},
		success:function (data_is) {
		
		   if(data_is == "success"){
			 $('#tags2 #'+brand_id).hide();
	         
		   }
		
		}
	    });
	  
   });
   $( ".tags2_drag" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('.tags2_drag div').each(function(){
    page_id_array.push($(this).attr("data-similar_id"));
   });

   console.log("page_id_array",page_id_array);
   $.ajax({
    url:"<?php echo base_url();?>admin/similar_hidden_brands/sort_order",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
		notify('fa fa-comments', 'success', 'Title ', ' Similar hidden brands sort order updated successfuly');
    }
   });
  }
 });
//  Hidden brands


 $("#my_account").submit(function(e){
        e.preventDefault();
		var otp    = Math.floor(1000 + Math.random() * 9000);
		var email  = $('#old_email').val();
		var otp_input  = $('#otp_input').val();
		
        console.log("otp_input",otp_input);
		$("#otp_section").show();
		if(otp_input==""){
			$.ajax({
			url:"<?php echo base_url();?>admin/send_otp_account",
			method:"POST",
			data:{otp:otp,email,email},
			success:function(data)
			{
				notify('fa fa-comments', 'success', 'Title ', ' You have received a 4 digits OTP code on your email '+email);
			}
		});
		}
		else{
			$.ajax({
			url:"<?php echo base_url();?>admin/check_otp",
			method:"POST",
			data:{check_opt:otp_input},
			success:function(res)
			{
				console.log("response",);
				if(res=='1'){
					var form = $("#my_account");
					var url = form.attr('action'); 
					console.log("url",url);
					$.ajax({
					type: form.attr('method'),
					url: form.attr('action'),
					data: form.serialize()
					}).done(function(data) {
					// Optionally alert the user of success here...
					
					location.reload();

					}).fail(function(data) {
						location.reload();
					// Optionally alert the user of an error here...
					});
				}
				else{
					notify('fa fa-comments', 'success', 'Title ', ' You have enter a wrong otp ');
				}
				
			}
		});
		}
		
});
</script>