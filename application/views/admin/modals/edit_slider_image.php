<?php 
    $details = $this->db->get_where('slider_images', array('slider_images_id'=>$param1))->row_array();
	$slider_image_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Edit Slider Image</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_slider_images/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
        				<label class="col-sm-4 col-form-label">Slider Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="image_name" class="form-control" >
							<small style="color:red">Image dimension should be of 700X300</small>
        				</div>
        				<div class="col-sm-2">
						   <?php 
						    if(!empty($details['image_name'])){
						   ?>
        				    <img src="<?php echo base_url(); ?><?php echo $slider_image_url.''.$details['image_name'] ?>" style="width:100px;background:grey;padding:1em">
							<?php }?>
        				</div>
        			</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Website Url</label>
						<div class="col-sm-8">
							<input type="text" name="website_url" class="form-control" value="<?php echo $details['website_url']; ?>" placeholder="Please Enter Website Url" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<select  name="status" required="required" class="form-control">
								<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
								<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
							</select>
						</div>
                    </div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div>