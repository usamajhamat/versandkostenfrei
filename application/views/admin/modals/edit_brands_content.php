<?php 
    $details_brands = $this->db->get_where('brands', array('brands_id'=>$param2))->row_array();
    $details = $this->db->get_where('brands_contents', array('brands_id'=>$param1))->row_array();
	$brand_image_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
	$slider_image_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;

?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Edit Brands content</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/brand_content/edit'; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" name="name" readonly value="<?php echo $details_brands['name']?>" class="form-control" placeholder="Please Enter Brand Name" required>
							<input type="hidden" name="brands_id"  value="<?php echo $param2; ?>" class="form-control"  required>
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
						<label class="col-sm-3 col-form-label">Content Heading</label>
						<div class="col-sm-9">
							<input type="text" value="<?php echo $details['heading']?>" name="cont_heading" placeholder="Please Enter Content heading" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<textarea name="cont_description" class="summernote" data-height='300' data-name='body' ><?php echo $details['description']?></textarea>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Status</label>
						<div class="col-sm-9">
							<select  name="status" required="required" class="form-control">
								<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
								<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
							</select>
						</div>
                    </div>
					<button type="submit" class="btn btn-info pull-right">Update</button>
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