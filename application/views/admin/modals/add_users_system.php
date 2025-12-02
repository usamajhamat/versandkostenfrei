
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add User</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_users/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">User Role</label>
				<div class="col-sm-9">
					<select class="form-control" name="users_roles_id" required>
					<option value="" disabled selected>Please select Role</option>
					
					 <option value="2">Manager</option>
					 <option value="4">Content Manager</option>
					 <option value="5">Sort order manager</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input type="email" name="email" class="form-control" placeholder ="Please enter Email" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Password</label>
				<div class="col-sm-9">
					<input type="password" name="password" class="form-control" placeholder ="Please enter Password" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">First Name</label>
				<div class="col-sm-9">
					<input type="text" name="first_name" class="form-control" placeholder="Please enter First Name" required>
					<!--<label style="color:red;">Image  must be of svg extention-->
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Mobile</label>
				<div class="col-sm-9">
					<input type="text" name="mobile" class="form-control" placeholder="Please Enter Font Mobile" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">City</label>
				<div class="col-sm-9">
				<input type="text" name="city" class="form-control" placeholder="Please Enter Font City" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-9">
					<input type="text" name="address" class="form-control" placeholder="Please Enter Category Address" required>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-3 col-form-label">User Image</label>
				<div class="col-sm-9">
					<input name="user_image" type="file" class="form-control" placeholder="Please Enter user Image" required>
				</div>
			</div> -->
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">Is Deleted</label>
				<div class="col-sm-9">
					<select id="is_deleted" name="is_deleted" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>-->
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