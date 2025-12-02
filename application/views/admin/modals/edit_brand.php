<?php 
    $details = $this->db->get_where('brands', array('brands_id'=>$param1))->row_array();
	$brand_image_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
	$slider_image_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Edit Brand</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_brands/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly name="name" class="form-control" value="<?php echo $details['name']; ?>" placeholder="Please Enter Brand German Name" >
						</div>
                    </div>
	
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" name="title" class="form-control" value="<?php echo $details['title']; ?>" placeholder="Please Enter Title" >
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Small Title</label>
						<div class="col-sm-9">
							<input type="text" name="small_title" value="<?php echo $details['small_title']; ?>"  class="form-control" placeholder="Please Enter Small Title" >
						</div>
					</div>
					<div class="form-group row">
        				<label class="col-sm-3 col-form-label">Brand Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="brand_image" class="form-control" >
							<small style="color:red">Image dimension should be of 200X115</small>
        				</div>
        				<div class="col-sm-2">
        				    <img src="<?php echo base_url(); ?><?php echo $brand_image_url.''.$details['brand_image'] ?>" style="width:100px;background:grey;padding:1em">
        				</div>
        			</div>
					
					<div class="form-group row">
        				<label class="col-sm-3 col-form-label">Brand Slider Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="slider_image" class="form-control" >
							<small style="color:red">Image dimension should be of  120X60</small>
        				</div>
        				<div class="col-sm-2">
						   <?php 
						    if(!empty($details['slider_image'])){
						   ?>
        				    <img src="<?php echo base_url(); ?><?php echo $slider_image_url.''.$details['slider_image'] ?>" style="width:100px;background:grey;padding:1em">
							<?php }?>
        				</div>
        			</div>
			
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Website Url</label>
						<div class="col-sm-9">
							<input type="text" name="website_url" class="form-control" value="<?php echo $details['website_url']; ?>" placeholder="Please Enter Website Url" >
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Telephone</label>
						<div class="col-sm-9">
							<input type="text" value="<?php echo $details['tele_phone']; ?>" name="telephone" placeholder="Please Enter Telephone" class="form-control" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Fax</label>
						<div class="col-sm-9">
							<input type="text" value="<?php echo $details['fax']; ?>" name="fax" placeholder="Please Enter Fax" class="form-control" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="text" value="<?php echo $details['email']; ?>" name="email" class="form-control" placeholder="Please Enter Email" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea name="address" class="form-control"  rows="3"><?php echo $details['address']; ?></textarea>
						</div>
					</div>
					<div class="form-group row">
							<label class="col-sm-3 col-form-label form-check-label" for="trending">Popular shops</label>
							<div class="form-check col-sm-9">
								<input class="form-check-input" <?php if($details['popular_shop']=="1"){ echo "checked"; }?> type="checkbox" value="<?php echo $details['popular_shop'];?>" id="trending" name="pop">
							</div>
					</div>
					<div class="form-group row">
							<label class="col-sm-3 col-form-label form-check-label" for="sub_brand">Sub brand</label>
							<div class="form-check col-sm-9">
								<input class="form-check-input" <?php if($details['sub_brand']=="1"){ echo "checked"; }?> type="checkbox" value="<?php echo $details['sub_brand'];?>" id="sub_brand" name="sub_brand">
							</div>
					</div>
						<!-- <div class="form-group row" style="<?php  if(empty($details['popular_shop_order'])){echo "display:none";}?>" id="trending_order">
							<label class="col-sm-3 col-form-label">Popular Shops Order</label>
							<div class="col-sm-9">
								<input type="number"  id="trend_num" value="<?php echo $details['popular_shop_order'];?>" name="pop_shops" class="form-control" placeholder="Please Enter Popular Shops Order" >
							</div>
						</div> -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label form-check-label" for="shipping_cost">Shipping Cost</label>
						<div class="form-check col-sm-9">
							<input class="form-control" type="text" value="<?php echo $details['shipping_cost']; ?>" id="shipping_cost" name="shipping_cost">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label form-check-label" for="shipping_from">Shipping From</label>
						<div class="form-check col-sm-9">
							<input class="form-control" type="text" value="<?php echo $details['shipping_from']; ?>" id="shipping_from" name="shipping_from">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<textarea name="description" class="form-control"  rows="3"><?php echo $details['description']; ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Term and Conditions url</label>
						<div class="col-sm-9">
							<input name="tm_comdition" class="form-control" rows="5"  data-height='300' data-name='body' value="<?php echo $details['terms_condition']; ?>" >
						</div>
					</div>
					<!-- <div class="form-group row">
						<label class="col-sm-3 col-form-label">Brands Sort Order</label>
						<div class="col-sm-9">
							<input class="form-control" placeholder="Enter Sort Order" type="number" value="<?php echo $details['sort_order']; ?>"  name="sort_order">
						</div>
					</div> -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Status</label>
						<div class="col-sm-9">
							<select  name="status" required="required" class="form-control">
								<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
								<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
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
							<input type="text" name="seo_title" required="required" placeholder="Enter SEO Title" value="<?php echo $details['seo_title']; ?>" placeholder="Please Enter Telephone" class="form-control" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Seo Description</label>
						<div class="col-sm-9">
						<textarea name="seo_desc" required="required" placeholder="Enter SEO Description"  value="" class="form-control"  rows="3"><?php echo $details['seo_description']; ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Seo Keywords</label>
						<div class="col-sm-9">
						<textarea name="seo_keys" required="required" class="form-control" placeholder="Enter meta keys words"  rows="3"><?php echo $details['seo_key_words']; ?></textarea>
						<small style="color:red">keyword should comma separated*</small>
						</div>
					
					</div>
					<div class="form-group row" >
						<label class="col-sm-3 col-form-label form-check-label" for="show_ads">Show Ads</label>
						<div class="form-check col-sm-9">
							<input class="form-check-input" <?php if($details['show_ads']=="1"){ echo "checked"; }?> type="checkbox" value="0"  name="show_ads" id="show_ads">
						</div>
					</div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript" src="https://dev.eigix.com/voucherr/assets/admin/dist/summernote-bs4.js"></script>
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
</script>