<?php 
     $countries =  $this->db->get('countries')->result_array();
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i>Add Currency</h4>
			<div class="card-body">
			<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_currencies/add'; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Name</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control"  placeholder="Please Enter name" required>
						</div>
                    </div>
                    <div class="form-group row">
        				<label class="col-sm-4 col-form-label">Symbol</label>
        				<div class="col-sm-8">
        					<input type="text" name="symbol" class="form-control"  placeholder="Please Enter symbol" required>
        				</div>
        			</div>
        			<div class="form-group row">
        				<label class="col-sm-4 col-form-label">Exchange Rate</label>
        				<div class="col-sm-8">
        					<input type="text" name="exchange_rate" class="form-control"  placeholder="Please Enter Exchange Rate" required>
        				</div>
        			</div>
        			<div class="form-group row">
        				<label class="col-sm-4 col-form-label">Code</label>
        				<div class="col-sm-8">
        					<input type="text" name="code" class="form-control" placeholder="Please Enter Code" required>
        				</div>
        			</div>
        			<div class="form-group row">
        				<label class="col-sm-4 col-form-label">Exchange Rate Def</label>
        				<div class="col-sm-8">
        					<input type="text" name="exchange_rate_def" class="form-control" placeholder="Please Enter Exchange Rate Def" required>
        				</div>
        			</div>
                    <div class="form-group row">
        				<label class="col-sm-4 col-form-label">Car Types</label>
        				<div class="col-sm-8">
        					<select id="country_id" name="country_id" required="required" class="form-control">
        						<option value="" disabled selected>Please select</option>
        						<?php foreach($countries as $data){ ?>
        						<option value="<?php echo $data['id'];  ?>" ><?php echo $data['name'];  ?></option>
        						<?php } ?>
        					</select>
        				</div>
        			</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<select  name="status" required="required" class="form-control">
								<option value="Active">Active</option>
								<option value="Inactive" >Inactive</option>
							</select>
						</div>
                    </div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div> 