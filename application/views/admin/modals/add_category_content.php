<?php 

$details = $this->db->get_where('categories', array('categories_id'=>$param1))->row_array();

?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Category Content</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/category_content/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-9">
					<input type="text" name="name" readonly value="<?php echo $details['name']?>" class="form-control" placeholder="Please Enter Brand Name" required>
					<input type="hidden" name="brands_id"  value="<?php echo $param1; ?>" class="form-control"  required>
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
					<input type="text" name="cont_heading" placeholder="Please Enter Content heading" class="form-control" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Description</label>
				<div class="col-sm-9">
					<textarea name="cont_description" class="summernote" data-height='300' data-name='body' ></textarea>
				</div>
			</div>
			
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