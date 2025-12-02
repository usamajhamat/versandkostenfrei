<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add User Group</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_user_groups/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Group Name</label>
				<div class="col-sm-8">
					<input type="text" name="name" class="form-control" placeholder="Please Enter Group Name" required>
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