<?php 
    
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Tv slier</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_tv_slider/add/'; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
        				<label class="col-sm-4 col-form-label">Tv Slider Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="image" class="form-control" >
							<small style="color:red">Image dimension should be of 300X200</small>
        				</div>
        				<div class="col-sm-2">
						
        				</div>
        			</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Link Url</label>
						<div class="col-sm-8">
							<input type="text" name="link" class="form-control"  placeholder="Please Enter link Url" required>
						</div>
                    </div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Start Date</label>
						<div class="col-sm-8">
							<input type="date" name="start_date" class="form-control"  placeholder="Please Enter Start Date" required>
						</div>
                    </div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">End Date</label>
						<div class="col-sm-8">
							<input type="date" name="end_date" class="form-control"  placeholder="Please Enter End Date" required>
						</div>
                    </div>
                    <!-- <div class="form-group row">
						<label class="col-sm-4 col-form-label">Caption</label>
						<div class="col-sm-8">
							<input type="text" name="desc" class="form-control"  placeholder="Please Enter small Caption" required>
						</div>
                    </div> -->
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