<?php $permissions = $this->db->get_where('pages_access', array('user_roles_id'=>$param1))->row_array(); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-check"></i>Manage Group Permissions</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_user_groups/permissions/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="container-fluid">
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['all_bookings']; ?>" <?php if($permissions['all_bookings'] == 1) echo 'checked'; ?> id="all_bookings" name="all_bookings">
								<label class="form-check-label" for="all_bookings">
									Manage All Bookings
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['pending_bookings']; ?>" <?php if($permissions['pending_bookings'] == 1) echo 'checked'; ?> id="pending_bookings" name="pending_bookings">
								<label class="form-check-label" for="pending_bookings">
									Manage Pending Bookings
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['accepted_bookings']; ?>" <?php if($permissions['accepted_bookings'] == 1) echo 'checked'; ?> id="accepted_bookings" name="accepted_bookings">
								<label class="form-check-label" for="accepted_bookings">
									Manage Accepted Bookings
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['rejected_bookings']; ?>" <?php if($permissions['rejected_bookings'] == 1) echo 'checked'; ?> id="rejected_bookings" name="rejected_bookings">
								<label class="form-check-label" for="rejected_bookings">
									Manage Rejected Bookings
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['cancelled_bookings']; ?>" <?php if($permissions['cancelled_bookings'] == 1) echo 'checked'; ?> id="cancelled_bookings" name="cancelled_bookings">
								<label class="form-check-label" for="cancelled_bookings">
									Manage Cancelled Bookings
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['car_types']; ?>" <?php if($permissions['car_types'] == 1) echo 'checked'; ?> id="car_types" name="car_types">
								<label class="form-check-label" for="car_types">
									Manage Car Types
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['vehicle_model']; ?>" <?php if($permissions['vehicle_model'] == 1) echo 'checked'; ?> id="vehicle_model" name="vehicle_model">
								<label class="form-check-label" for="vehicle_model">
									Manage Vehicle Models
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['vehicle_make']; ?>" <?php if($permissions['vehicle_make'] == 1) echo 'checked'; ?> id="vehicle_make" name="vehicle_make">
								<label class="form-check-label" for="vehicle_make">
									Manage Vehicle Makes
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['roof_type']; ?>" <?php if($permissions['roof_type'] == 1) echo 'checked'; ?> id="roof_type" name="roof_type">
								<label class="form-check-label" for="roof_type">
									Manage Roof Type
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['gear_type']; ?>" <?php if($permissions['gear_type'] == 1) echo 'checked'; ?> id="gear_type" name="gear_type">
								<label class="form-check-label" for="gear_type">
									Manage Gear Type
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['fuel_type']; ?>" <?php if($permissions['fuel_type'] == 1) echo 'checked'; ?> id="fuel_type" name="fuel_type">
								<label class="form-check-label" for="fuel_type">
									Manage Fuel Type
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['manage_cars']; ?>" <?php if($permissions['manage_cars'] == 1) echo 'checked'; ?> id="manage_cars" name="manage_cars">
								<label class="form-check-label" for="manage_cars">
									Manage Cars
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['manage_motors']; ?>" <?php if($permissions['manage_motors'] == 1) echo 'checked'; ?> id="manage_motors" name="manage_motors">
								<label class="form-check-label" for="manage_motors">
									Manage Motors
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['payment_methods']; ?>" <?php if($permissions['payment_methods'] == 1) echo 'checked'; ?> id="payment_methods" name="payment_methods">
								<label class="form-check-label" for="payment_methods">
									Manage Payment Methods
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['currencies']; ?>" <?php if($permissions['currencies'] == 1) echo 'checked'; ?> id="currencies" name="currencies">
								<label class="form-check-label" for="currencies">
									Manage Currencies
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['manage_topups']; ?>" <?php if($permissions['manage_topups'] == 1) echo 'checked'; ?> id="manage_topups" name="manage_topups">
								<label class="form-check-label" for="manage_topups">
									Manage Topup
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['transactions']; ?>" <?php if($permissions['transactions'] == 1) echo 'checked'; ?> id="transactions" name="transactions">
								<label class="form-check-label" for="transactions">
									Manage Transactions
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['withdrawal']; ?>" <?php if($permissions['withdrawal'] == 1) echo 'checked'; ?> id="withdrawal" name="withdrawal">
								<label class="form-check-label" for="withdrawal">
									Manage Withdrawal
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['manage_users']; ?>" <?php if($permissions['manage_users'] == 1) echo 'checked'; ?> id="manage_users" name="manage_users">
								<label class="form-check-label" for="manage_users">
									Manage Users
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['manage_myprofile']; ?>" <?php if($permissions['manage_myprofile'] == 1) echo 'checked'; ?> id="manage_myprofile" name="manage_myprofile">
								<label class="form-check-label" for="manage_myprofile">
									Manage Profiles
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?php echo $permissions['system_settings']; ?>" <?php if($permissions['system_settings'] == 1) echo 'checked'; ?> id="system_settings" name="system_settings">
								<label class="form-check-label" for="system_settings">
									Manage System Settings
								</label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function() {
		$('.form-check-input').change(function() {
			if(this.checked) {
				$(this).val('1');
				// var returnVal = confirm("Are you sure?");
				// $(this).prop("checked", returnVal);
			} else {
				$(this).val('0');
			}   
		});
	});
</script>