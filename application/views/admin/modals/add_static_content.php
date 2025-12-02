<?php 
	
	$pages = $this->db->query("SELECT * FROM page_types WHERE status = 'Active' ")->result_array();
?>

<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Static Content</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_static_content/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Type Name</label>
				<div class="col-sm-8">
					<input type="text" name="type" class="form-control" placeholder="Please Enter Content Type" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Title</label>
				<div class="col-sm-8">
					<input type="text" name="title" class="form-control" placeholder="Please Enter Content Title" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Description</label>
				<div class="col-sm-8">
					<textarea name="description" class="form-control" required rows="5"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Image</label>
				<div class="col-sm-8">
					<input type="file" name="image_attached" class="form-control" >
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