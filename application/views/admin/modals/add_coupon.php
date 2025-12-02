
<style>
	.select2-container {
  box-sizing: border-box;
  display: inline-block;
  margin: 0;
  position: relative;
  vertical-align: middle;
  z-index: 99999999999;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 34px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 27px;
    position: absolute;
    top: 5px;
    right: 1px;
    width: 20px;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 0px;
    height: 35px;
}
.field_set {
    border-color: #afa6a6;
    border-style: dashed;
}
</style>
<?php 
    $date               =  date("Y-m-d H:i:s");
	$last_coupon_id     = $this->db->order_by('coupons_id','desc')->get_where('coupons', array('status'=>"Active"))->row()->coupons_id;
	$details            = $this->db->get_where('coupons', array('coupons_id'=>$last_coupon_id))->row_array();
	$categories         = $this->db->query("SELECT * FROM categories WHERE status = 'Active' ")->result_array();
	$brands             = $this->db->query("SELECT * FROM brands WHERE 1 ")->result_array();
	$sub_categories = $this->db->get_where('sub_categories',array('status'=>'Active','categories_id'=>$details['categories_id']))->result_array();

?>
<div class="card"> 
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Coupon</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_coupons/add/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Short Tagline</label>
				<div class="col-sm-8">
					<input type="text" value="" name="short_tagline" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Coupon Image</label>
				<div class="col-sm-8">
					<input type="file" name="coupon_image" class="form-control" >
					<small style="color:red">Image dimension should be of 200X115</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Min Order Price </label>
				<div class="col-sm-8">
					<input type="text" value="" name="min_order_price" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Description</label>
				<div class="col-sm-8">
					<textarea name="description" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Brand URL</label>
				<div class="col-sm-8">
					<input type="text" id="brand_url" name="brand_redirect_url" value="" required="required" class="form-control" placeholder="Enter Brand Redirect URL"  >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Redemption Type</label>
				<div class="col-sm-8">
					<select id="" name="redp_type"  class="form-control">
						<option value="" disabled selected>Please select</option>
					    <option value="New"  >New customer</option>
					    <option value="Existing" >Existing customer</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Brands</label>
				<div class="col-sm-8">
					<select id="brands_id"  name="brands_id[]" required="required"  class="form-control search_select2" multiple  placeholder="Please select" data-search="true">
						<!-- <option value=""  selected >Please select</option> -->
						
						<?php foreach($brands as $fetch_data){ ?>
							<option data-url="<?php echo $fetch_data['website_url'];?>" value="<?php echo $fetch_data['brands_id']; ?>" 
								
							>

								<?php echo $fetch_data['name']; ?>
									
								</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Coupon Type</label>
				<div class="col-sm-8">
					<select id="coupon_type" onchange="choose_code_type(this.id)" name="coupon_type" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php 
							if($this->session->userdata('role_id')!=2){
							?>
						<option value="Coupon">Coupon</option>
						<?php
							}
							?>
						<option value="Deals" >Deals</option>
						<option value="Offer" >Discount</option>
						<option value="Free Shipping" >Free Shipping</option>
						<option value="Free Items">Free Items</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Categories</label>
				<div class="col-sm-8">
					<select id="categories_id" onchange="sub_cate(this.value)"  name="categories_id" class="form-control search_select" placeholder="Please select" >
						<option value="" disabled selected>Please select</option>
						<?php foreach($categories as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['categories_id']; ?>" ><?php echo $fetch_data['en_name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>


			<div id="sub_cate_paste">
			 
			 <?php  
			 if($sub_categories){ 
			 ?>
			  <div class="form-group row">
				<label class="col-sm-4 col-form-label">Sub Categories</label>
				<div class="col-sm-8">
					<select id="categories_id"  name="sub_categories_id" class="search_select form-control edit_select" placeholder="Please select" data-search="true" >
						<option value=""  selected>Please select</option>
						<?php foreach($sub_categories as $sub_fetch_data){ ?>
							<option value="<?php echo $sub_fetch_data['sub_categories_id']; ?>" ><?php echo $sub_fetch_data['en_name']; ?></option>
						<?php } ?>
					</select>
				</div>
			 </div>
			 <?php  }?>
			</div>
			
			<!--<div class="form-group row">
				<label class="col-sm-4 col-form-label">Old price</label>
				<div class="col-sm-8">
					<input type="text" name="old_price" class="form-control" placeholder="Please Enter Old Price">
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Discount Type</label>
				<div class="col-sm-8">
					<select id="discount_type" name="discount_type" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Percentage" >Percentage</option>
						<option value="Fixed" >Fixed</option>
						<option value="Custom" >Custom</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Discount Value</label>
				<div class="col-sm-8">
					<input type="text" value="" name="discount_value" class="form-control" placeholder="Please Enter Discount Value" required>
				</div>
			</div>
			<div class="form-group row" >
				<label class="col-sm-4 col-form-label">Coupon Code</label>
				<div class="col-sm-8">
					<input type="text" name="coupon_code" id="coupon_code" 	 value="" class="form-control" placeholder="Please Enter Coupon Code" >
				</div>
			</div>
	
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Start Date</label>
				<div class="col-sm-8">
					<input type="date" value="" name="start_date" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Start Time</label>
				<div class="col-sm-8">
					<input type="time" value="" name="start_time" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">End Date</label>
				<div class="col-sm-8">
					<input type="date" id="" value="" name="end_date" class="form-control " >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">End Time</label>
				<div class="col-sm-8">
					<input type="time" value="" name="end_time" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Redemption Instruction</label>
				<div class="col-sm-8">
					<textarea name="redem_info" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label form-check-label" for="special">Special Coupon</label>
				<div class="form-check col-sm-8">
					<input class="form-check-input" type="checkbox"  value="" id="special" name="special">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label form-check-label" for="special">Popular Coupon</label>
				<div class="form-check col-sm-8">
					<input class="form-check-input" type="checkbox"  value="" id="popular" name="popular">
				</div>
			</div>
			<div class="form-group row" style="display:none" id="special_text">
				<label class="col-sm-4 col-form-label"  for="special">Special Lebal</label>
				<div class="form-check col-sm-8">
					<input type="text"  id="sp_text" name="special_text" value=""  placeholder="Enter special text" class="form-control" >
				</div>
			</div>
			<!-- <div class="form-group row" >
				<label class="col-sm-4 col-form-label form-check-label" for="trending">Trending</label>
				<div class="form-check col-sm-8">
					<input class="form-check-input" type="checkbox" value="0" id="trending" name="trending" id="trending">
				</div>
			</div> -->
			<!-- <div class="form-group row" style="display:none" id="trending_order">
				<label class="col-sm-4 col-form-label">Trending Sort Order</label>
				<div class="col-sm-8">
					<input type="number" id="trend_num" name="trending_order" class="form-control" value="<?php echo $max_trending_order; ?>" placeholder="Please Enter Trending List Order" >
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label form-check-label" for="tips">Tips</label>
				<div class="form-check col-sm-8">
					<input class="form-check-input" type="checkbox" value="0"  id="tips" name="tips">
				</div>
			</div> -->
		
			<!-- <div class="form-group row " style="display:none" id="tips_order">
				<label class="col-sm-4 col-form-label">Tips Sort Order</label>
				<div class="col-sm-8">
					<input type="number" id="tip_order" name="tips_order"  value="<?php echo $max_tips_order; ?>" class="form-control" placeholder="Please Enter Tips List Order" readonly>
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label">Lastest Sort Order</label>
				<div class="col-sm-8">
					<input type="number" id="lastest_order" name="lastest_order" value="<?php echo $max_lastest_order; ?>" class="form-control" placeholder="Please Enter Lastest List Order" readonly >
				</div>
			</div> -->
			
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label">Popular Sort Order</label>
				<div class="col-sm-8">
					<input type="number" id="popular_order" name="popular_order"  value="<?php echo $max_popular_order; ?>" class="form-control" placeholder="Please Enter Popular List Order"readonly >
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label">Brands Page Order</label>
				<div class="col-sm-8">
					<input type="number" id="brands_page_order" name="brands_page_order" value="<?php echo $max_brands_page_order; ?>" class="form-control" placeholder="Please Enter Popular Brands Page Order" readonly >
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label">Category Page Order</label>
				<div class="col-sm-8">
					<input type="number" id="cate_page_order" name="cate_page_order" value="<?php echo $max_cate_page_order; ?>" class="form-control" placeholder="Please Enter PopuCategorylar cate_page_order" readonly>
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-4 col-form-label">Sub Category Order</label>
				<div class="col-sm-8">
					<input type="number" id="sub_cate_order" name="sub_cate_order"  value="<?php echo $max_sub_cate_order; ?>" class="form-control" placeholder="Please Enter Popular sub Category Order" readonly >
				</div>
			</div> -->
		
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Status</label>
				<div class="col-sm-8">
					<select id="status" name="status" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Active" >Active</option>
						<option value="Inactive" >Inactive</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Top Similar Brands</label>
				<div class="col-sm-8">
					<select id="top_similar_brands_id"  name="top_similar_brands_id[]" class="form-control select2" multiple  placeholder="Please select" data-search="true">
						<!-- <option value=""  selected >Please select</option> -->
						
						<?php foreach($brands as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['brands_id']; ?>" 
								
							>

								<?php echo $fetch_data['name']; ?>
									
								</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Other Similar Brands</label>
				<div class="col-sm-8">
					<select id="similar_brands_id"  name="similar_brands_id[]"  class="form-control select2" multiple  placeholder="Please select" data-search="true">
						<!-- <option value=""  selected >Please select</option> -->
						
						<?php foreach($brands as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['brands_id']; ?>" 
								
							>

								<?php echo $fetch_data['name']; ?>
									
								</option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			<button type="submit" class="btn btn-info pull-right">Add</button>
		</form>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.form-check-input').change(function() {
			
			if(this.checked) {
			   if(this.id=="trending"){
				   
				$("#trending_order").show();  
                $("#trend_num").attr("required", "true");				
			   }
			    if(this.id=="tips"){
					
				$("#tips_order").show(); 
              	 $("#tip_order").attr("required", "true");			
			   }
			    if(this.id=="special"){
					
				$("#special_text").show(); 
                $("#sp_text").attr("required", "true");  				
			   }
				$(this).val('1');
				// var returnVal = confirm("Are you sure?");
				// $(this).prop("checked", returnVal);
			} else {
				 if(this.id=="trending"){
				/* $('#trend_num').val('');  */  
				$("#trend_num").removeAttr("required");
				$("#trending_order").hide();   
			   }
			    if(this.id=="tips"){
				/* $('#tip_order').val('');    */	
				$('#tip_order').removeAttr("required"); 	
				$("#tips_order").hide();   
			   }
			    if(this.id=="special"){
				$('#sp_text').val('');	
				$('#sp_text').removeAttr("required");	
				$("#special_text").hide();   
			   }
				$(this).val('0');
			}   
		});
	});
</script>
<script type="text/javascript" src="https://dev.eigix.com/voucherr/assets/admin/dist/summernote-bs4.js"></script>
<script>
 $('.summernote').summernote({
	height: 300,
	tabsize: 3
  });
  function choose_code_type(id){
		
		var selected_opt = $( "#"+id+" option:selected" ).val();
		if(selected_opt == 'Coupon'){
			$("#coupon_code").attr("required", "true");
			
		} else {
			
			$("#coupon_code").removeAttr("required");
		}
	}



</script>

 <script type="text/javascript">
   $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $(".search_select").select2();
   $(".search_select2").select2({closeOnSelect: false});
   $("select").select2({closeOnSelect: false});

	$(".search_select2").on("select2:select", function (evt) {
	var element = evt.params.data.element;
	var $element = $(element);
	
	$element.detach();
	$(this).append($element);
	$(this).trigger("change");
	});
});

$('#brands_id').change(function(){

	var link = $('#brands_id option:selected').attr('data-url');
	$('#brand_url').val(link);
	console.log("linklink",link);
})
</script>