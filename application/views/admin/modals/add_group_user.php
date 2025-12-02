<?php 
	$user_groups = $this->db->query("SELECT * FROM user_roles WHERE user_roles_id > '2' AND status = 'Active' ")->result_array();
?>
<style>
.password_div i {
    margin-left: -30px;
    cursor: pointer;
	margin-top: 10px;
}
.password_div{
	display:flex;
}
</style>
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Group User</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_group_users/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">User Name</label>
				<div class="col-sm-8">
					<input type="text" name="user_name" autocomplete="none" class="form-control" placeholder="Please Enter User Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="email" name="email" autocomplete="none" class="form-control" placeholder="Please Enter Email" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Password</label>
				<div class="col-sm-8 password_div">
					<input type="text" name="password" id="password" autocomplete="none" class="form-control" placeholder="Please Enter Password" required>
					<i class="fa fa-eye" id="togglePassword"></i>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Phone Number</label>
				<div class="col-sm-8">
					<input type="text" name="mobile_no" class="form-control" placeholder="Please Enter Phone Number" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Profile Image</label>
				<div class="col-sm-8">
					<input type="file" name="profile_image" class="form-control" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">User Group</label>
				<div class="col-sm-8">
					<select id="user_group_id" name="user_group_id" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php foreach($user_groups as $fetch_data){ ?>
							<option value="<?php echo $fetch_data['user_roles_id']; ?>"><?php echo $fetch_data['role_name']; ?></option>
						<?php } ?>
					</select>
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
<script>
$( document ).ready(function() {
	togglePassword = document.querySelector('#togglePassword');
	password = document.querySelector('#password');
	togglePassword.addEventListener('click', function (e) {
		// toggle the type attribute
		type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye slash icon
		this.classList.toggle('fa-eye-slash');
	});
});
</script>