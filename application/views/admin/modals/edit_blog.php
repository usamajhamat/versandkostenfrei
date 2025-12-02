
<?php 
$details = $this->db->get_where('voucherr_blogs', array('voucherr_blogs_id'=>$param1))->row_array();
$blog_image_url = $this->db->get_where('system_settings',array('type'=>'blogs_img_url'))->row()->description;
$categories = $this->db->query("SELECT * FROM categories WHERE status = 'Active' ")->result_array();

?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-pencil"></i> Edit Blog</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_voucher_blogs/edit/'.$details['voucherr_blogs_id']; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Heading</label>
				<div class="col-sm-9">
					<input type="text" name="heading" value="<?php echo $details['heading']?>" class="form-control" placeholder="Please Enter Heading" required>
				</div>
			</div>
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">Categories</label>
				<div class="col-sm-9">
					<select id="categories_id" onchange="sub_cate(this.value)"  name="categories_id" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php foreach($categories as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['categories_id']; ?>" <?php if($details['categories_id']==$fetch_data['categories_id']){ echo "selected"; }?>><?php echo $fetch_data['name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>-->
		
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Blog Image</label>
				<div class="col-sm-6">
					<input type="file" name="blog_image" class="form-control" >
					<!--<label style="color:red;">Image size must bhi (267*164). width: 267px & height: 164px</label>-->
				</div>
				<div class="col-sm-2">
					<img src="<?php echo base_url(); ?><?php echo $blog_image_url.''.$details['blog_image'] ?>" style="width:100px;background:grey;padding:1em">
				</div>
        	</div>
			
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Long Description</label>
				<div class="col-sm-9">
					<textarea name="long_description" class="summernote" data-height='300' data-name='body' ><?php echo $details['description']; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status</label>
				<div class="col-sm-9">
					<select id="status" name="status" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Active" <?php if($details['status']=="Active"){ echo "selected"; }?>>Active</option>
						<option value="Inactive" <?php if($details['status']=="Inactive"){ echo "selected"; }?>>Inactive</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-info pull-right">Update</button>
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