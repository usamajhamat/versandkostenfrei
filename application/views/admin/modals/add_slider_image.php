<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Slider Image</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_slider_images/add'; ?>" method="post"  enctype ='multipart/form-data'>
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Slider Image</label>
				<div class="col-sm-8">
					<input type="file" name="image_name" class="form-control" required>
					<small style="color:red">Image dimension should be of 700X300</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Website Url</label>
				<div class="col-sm-8">
					<input type="text" name="website_url" placeholder="Please Enter Website Url" class="form-control" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Status</label>
				<div class="col-sm-8">
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