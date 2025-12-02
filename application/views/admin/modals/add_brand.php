<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Brand</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_brands/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-9">
					<input type="text" id="b_name" name="name" class="form-control" placeholder="Please Enter Brand Name" required>
					<small style="color:red;" id="special_msg"></small>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Title</label>
				<div class="col-sm-9">
					<input type="text" name="title" class="form-control" placeholder="Please Enter Title" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Small Title</label>
				<div class="col-sm-9">
					<input type="text" name="small_title" class="form-control" placeholder="Please Enter Small Title" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Brand Image</label>
				<div class="col-sm-9">
					<input type="file" name="brand_image" class="form-control" required>
					<small style="color:red">Image dimension should be of 200X115</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Brand Slider Image</label>
				<div class="col-sm-9">
					<input type="file" name="slider_image" class="form-control" >
					<small style="color:red">Image dimension should be of 120X60</small>
				</div>
			</div>
			<?php /*
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Slider Image</label>
				<div class="col-sm-9">
					<input type="file" name="slider_image" class="form-control" required>
					<small style="color:red">Image dimension should be of 700X300</small>
				</div>
			</div>
			*/ ?>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Website Url</label>
				<div class="col-sm-9">
					<input type="text" name="website_url" placeholder="Please Enter Website Url" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Telephone</label>
				<div class="col-sm-9">
					<input type="text" name="telephone" placeholder="Please Enter Telephone" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Fax</label>
				<div class="col-sm-9">
					<input type="text" name="fax" placeholder="Please Enter Fax" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input type="text" name="email" class="form-control" placeholder="Please Enter Email" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-9">
					<textarea name="address" class="form-control"  rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row" >
				<label class="col-sm-3 col-form-label form-check-label" for="trending">Popular shops</label>
				<div class="form-check col-sm-9">
					<input class="form-check-input" type="checkbox" value="0"  name="pop" id="trending">
				</div>
			</div>
			<div class="form-group row" >
				<label class="col-sm-3 col-form-label form-check-label" for="sub_brand">Sub brand</label>
				<div class="form-check col-sm-9">
					<input class="form-check-input" type="checkbox" value="0"  name="sub_brand" id="sub_brand">
				</div>
			</div>
			<!-- <div class="form-group row" style="display:none" id="trending_order">
				<label class="col-sm-3 col-form-label">Popular Shops Order</label>
				<div class="col-sm-9">
					<input type="number" id="trend_num" name="pop_shops" class="form-control" placeholder="Please Enter Popular Shops Order" >
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label form-check-label" for="shipping_cost">Shipping Cost</label>
				<div class="form-check col-sm-9">
					<input class="form-control" type="text" value="" id="shipping_cost" name="shipping_cost">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label form-check-label" for="shipping_from">Shipping From</label>
				<div class="form-check col-sm-9">
					<input class="form-control" type="text" value="" id="shipping_from" name="shipping_from">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Description</label>
				<div class="col-sm-9">
					<textarea name="description" class="form-control"  rows="3"></textarea>
				</div>
			</div>
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">Long Description</label>
				<div class="col-sm-9">
					<textarea name="long_description" class="summernote" data-height='300' data-name='body' ></textarea>
				</div>
			</div> -->
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">News Letter Heading</label>
				<div class="col-sm-9">
					<input type="text" name="ns_heading" class="form-control" placeholder="Please Enter Newsletter heading" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">News Letter Description</label>
				<div class="col-sm-9">
					<textarea name="ns_desc" class="form-control" rows="5"  data-height='300' data-name='body' ></textarea>
				</div>
			</div>-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Term and Conditions url</label>
				<div class="col-sm-9">
					<input name="tm_comdition" class="form-control" rows="5"  data-height='300' data-name='body' >
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-3 col-form-label">Brands Sort Order</label>
				<div class="col-sm-9">
					<input class="form-control" type="number" value="" placeholder="Enter Sort Order"  name="sort_order">
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status</label>
				<div class="col-sm-9">
					<select id="status" name="status" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Active">Active</option>
						<option value="Inactive">Inactive</option>
					</select>
				</div>
			</div>
			<div class=" ">
				<b>Seo Settings</b>
				<hr>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Seo Title</label>
				<div class="col-sm-9">
					<input type="text" name="seo_title" required="required" placeholder="Enter SEO Title" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Seo Description</label>
				<div class="col-sm-9">
				   <textarea name="seo_desc" required="required" placeholder="Enter SEO Description" class="form-control"  rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Seo Keywords</label>
				<div class="col-sm-9">
				   <textarea name="seo_keys" required="required" placeholder="Enter meta keys words" class="form-control"  rows="3"></textarea>
				   <small style="color:red">keyword should comma separated*</small>
				</div>
				
			</div>
			<div class="form-group row" >
				<label class="col-sm-3 col-form-label form-check-label" for="show_ads">Show Ads</label>
				<div class="form-check col-sm-9">
					<input class="form-check-input" type="checkbox" value="0"  name="show_ads" id="show_ads">
				</div>
			</div>
			<button type="submit" class="btn btn-info pull-right">Add</button>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.js"></script>
<script>
 $('.summernote').summernote({
	height: 300,
	tabsize: 3
  });
</script>
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
				$('#trend_num').val('');   
				$("#trend_num").removeAttr("required");
				$("#trending_order").hide();   
			   }
			    if(this.id=="tips"){
				$('#tip_order').val('');   	
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
	$('#b_name').on('keyup', function (event) {
    var value = $('#b_name').val();
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
        $('#b_name').val(value.replace(/[&\/\\#^+()$~%.'":*?<>{}!@]/g, ''));
		$('#b_name').val(value.replaceAll("-", ' '));
	   $('#special_msg').text("Special characters not allowed");

    }
});
</script>