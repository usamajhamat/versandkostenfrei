<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Image</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/upload_images/add'; ?>" method="post"  enctype ='multipart/form-data'>
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Image</label>
				<div class="col-sm-8">
					<input type="file" name="image_name" class="form-control" required>
				
				</div>
			</div>
			
		
			<button type="submit" class="btn btn-info pull-right">Add</button>
		</form>
	</div>
</div>