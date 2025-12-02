<?php 
    $details = $this->db->get_where('categories', array('categories_id'=>$param1))->row_array();  
    $cat_image_url = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description;
    $cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description; 
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Edit Category</h4>
			<div class="card-body">
			<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_categories/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">German Name</label>
						<div class="col-sm-9">
							<input type="text" name="name" class="form-control" value="<?php echo $details['name']; ?>" placeholder="Please Enter Category Name" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">English Name</label>
						<div class="col-sm-9">
							<input type="text" name="en_name" value="<?php echo $details['en_name']; ?>" class="form-control" placeholder="Please Enter Category English Name" required>
						</div>
					</div>
                    <div class="form-group row">
        				<label class="col-sm-3 col-form-label">Category Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="cat_image" class="form-control" >
							<label style="color:red;">Image size must be (1365*765). width: 1365px & height: 765px</label>
        				</div>
        				<div class="col-sm-2">
        				    <img src="<?php echo base_url(); ?><?php echo $cat_image_url.''.$details['cat_image'] ?>" style="width:100px;background:grey;padding:1em">
        				</div>
        			</div>
					<div class="form-group row">
        				<label class="col-sm-3 col-form-label">Category Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="font_icon" class="form-control" >
							<!--<label style="color:red;">Image  must be of svg extention</label>-->
        				</div>
        				<div class="col-sm-2">
        				    <img src="<?php echo base_url(); ?><?php echo $cat_icon_url.''.$details['font_icon'] ?>" style="width:100px;background:grey;padding:1em">
        				</div>
        			</div>
					<!--<div class="form-group row">
						<label class="col-sm-3 col-form-label">Font Icon</label>
						<div class="col-sm-9">
							<input type="text" name="font_icon" class="form-control" value="<?php echo $details['font_icon']; ?>" placeholder="Please Enter Font Icon" required>
							<br>
							<label>*Should use <a style="color:red; text-decoration: underline;" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a> icons. e.g. fa fa-user</label>
						</div>
					</div>-->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Type</label>
						<div class="col-sm-9">
							<select id="type" name="type" required="required" class="form-control">
								<option value="" disabled selected>Please select</option>
								<option value="category" <?php if($details['type'] == 'category') echo 'selected'; ?>>Category</option>
								<option value="deal"     <?php if($details['type'] == 'deal') echo 'selected'; ?>>Deal</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Heading</label>
						<div class="col-sm-9">
							<input type="text" name="cat_heading" value="<?php echo $details['cat_heading']; ?>" class="form-control" placeholder="Please Enter Category Heading" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<textarea name="description" class="form-control" placeholder="Please Enter Description" required rows="5"><?php echo $details['description']; ?></textarea>
						</div>
					</div>
					<!--<div class="form-group row">
						<label class="col-sm-3 col-form-label">Long Description</label>
						<div class="col-sm-9">
							<textarea class="summernote" name="long_description" data-height='300' data-name='body' ><?php echo $details['long_description']; ?></textarea>
						</div>
					</div>-->
					<!-- <div class="form-group row">
						<label class="col-sm-3 col-form-label">Sort Order</label>
						<div class="col-sm-9">
							<input type="number" name="sort_order" value="<?php echo $details['sort_order']; ?>" class="form-control" placeholder="Please Enter sort order" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Section Sort Order</label>
						<div class="col-sm-9">
							<input type="number" name="section_sort_order" value="<?php echo $details['section_sort_order']; ?>" class="form-control" placeholder="Please Enter section sort order" required>
						</div>
					</div> -->
                   <!-- <div class="form-group row">
						<label class="col-sm-3 col-form-label">News Letter Heading</label>
						<div class="col-sm-9">
							<input type="text" name="ns_heading" value="<?php echo $details['news_letter_heading']; ?>" class="form-control" placeholder="Please Enter Newsletter heading" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">News Letter Description</label>
						<div class="col-sm-9">
							<textarea name="ns_desc" class="form-control" rows="5"  data-height='300' data-name='body' ><?php echo $details['news_letter_description']; ?></textarea>
						</div>
					</div>	-->			
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
