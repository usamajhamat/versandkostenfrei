<?php 
    $details       = $this->db->get_where('sub_categories', array('sub_categories_id'=>$param1))->row_array();  
    $cat_image_url = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;
	$categories    = $this->db->query("SELECT * FROM categories WHERE status = 'Active' ")->result_array();
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Edit Sub Category</h4>
			<div class="card-body">
			<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_sub_categories/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">German Name</label>
						<div class="col-sm-9">
							<input type="text" name="name" class="form-control" value="<?php echo $details['name']; ?>" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">English Name</label>
						<div class="col-sm-9">
							<input type="text" name="en_name" class="form-control" value="<?php echo $details['en_name']; ?>" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Heading</label>
						<div class="col-sm-9">
							<input type="text" name="heading" class="form-control" value="<?php echo $details['heading']; ?>" placeholder="Please Enter Category Heading" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Categories</label>
						<div class="col-sm-9">
							<select id="categories_id" name="categories_id" required="required" class="form-control">
								<option value="" disabled >Please select</option>
								<?php foreach($categories as $fetch_data){ ?>
									<option value="<?php echo $fetch_data['categories_id']; ?>" <?php if($fetch_data['status'] == $details['name']) echo 'selected'; ?>><?php echo $fetch_data['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
                    <div class="form-group row">
        				<label class="col-sm-3 col-form-label">Category Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="sub_cat_image" class="form-control" >
							<label style="color:red;">Image size must be (1365*765). width: 1365px & height: 765px</label>
        				</div>
        				<div class="col-sm-2">
        				    <img src="<?php echo base_url(); ?><?php echo $cat_image_url.''.$details['sub_cat_image'] ?>" style="width:100px;background:grey;padding:1em">
        				</div>
        			</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<textarea name="description" class="form-control" placeholder="Please Enter Description" required rows="5"><?php echo $details['description']; ?></textarea>
						</div>
					</div>
					<!-- <div class="form-group row">
							<label class="col-sm-3 col-form-label form-check-label" for="trending">Main cate page order</label>
							<div class="form-check col-sm-9">
								<input class="form-check-input" <?php if($details['sub_sort']=="1"){ echo "checked"; }?> type="checkbox" value="<?php echo $details['sub_sort'];?>" id="trending" name="sub_order">
							</div>
						</div>
						<div class="form-group row" style="<?php  if(empty($details['sort_order'])){echo "display:none";}?>" id="trending_order">
							<label class="col-sm-3 col-form-label">Sort Order</label>
							<div class="col-sm-9">
								<input type="number"  id="trend_num" value="<?php echo $details['sort_order'];?>" name="sub_order_val" class="form-control" placeholder="Please Enter Sort Order" >
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
							<input type="text" name="seo_title" required="required" placeholder="Enter SEO Title" value="<?php echo $details['seo_title']; ?>" placeholder="Please Enter Telephone" class="form-control" required>
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
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
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