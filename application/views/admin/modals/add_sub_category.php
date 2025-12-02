<?php $categories = $this->db->query("SELECT * FROM categories WHERE status = 'Active' ")->result_array();?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Sub Category</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_sub_categories/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">German Name</label>
				<div class="col-sm-9">
					<input type="text" name="name" class="form-control" placeholder="Please Enter Sub Category German Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">English Name</label>
				<div class="col-sm-9">
					<input type="text" name="en_name" class="form-control" placeholder="Please Enter Sub Category English Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Heading</label>
				<div class="col-sm-9">
					<input type="text" name="heading" class="form-control" placeholder="Please Enter Sub Category Heading" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Categories</label>
				<div class="col-sm-9">
					<select id="categories_id" name="categories_id" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php foreach($categories as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['categories_id']; ?>"><?php echo $fetch_data['name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Sub Category Image</label>
				<div class="col-sm-9">
					<input type="file" name="sub_cat_image" class="form-control" required>
					<label style="color:red;">Image size must be (1365*765). width: 1365px & height: 765px</label>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Description</label>
				<div class="col-sm-9">
					<textarea name="description" class="form-control" placeholder="Please Enter Description" required rows="5"></textarea>
				</div>
			</div>
			<!-- <div class="form-group row" >
				<label class="col-sm-3 col-form-label form-check-label" for="trending">Main cate page order</label>
				<div class="form-check col-sm-9">
					<input class="form-check-input" type="checkbox" value="0" id="trending" name="sub_order" id="trending">
				</div>
			</div>
			<div class="form-group row" style="display:none" id="trending_order">
				<label class="col-sm-3 col-form-label">Sort Order</label>
				<div class="col-sm-9">
					<input type="number" id="trend_num" name="sub_order_val" class="form-control" placeholder="Please Enter Sort Order" >
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="col-sm-3 col-form-label">Long Description</label>
				<div class="col-sm-9">
					<textarea name="long_description" class="summernote" data-height='300' data-name='body' ></textarea>
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
</script>