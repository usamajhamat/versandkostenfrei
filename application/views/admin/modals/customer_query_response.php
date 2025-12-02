<?php 
    $details = $this->db->get_where('contact_us', array('contact_us_id'=>$param1))->row_array();
	
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-reply"></i> Customer Query Response</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_customer_query/update/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Name</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control" value="<?php echo $details['name']; ?>" placeholder="Please Enter Brand Name" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="text" name="email" class="form-control" value="<?php echo $details['email']; ?>" placeholder="Please Enter Brand Name" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Your Answer</label>
						
					</div>
					
					<div class="form-group row">
						<div class="col-sm-12">
							<textarea class="summernote" name="answer" data-height='300' data-name='body' ></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-info pull-right">Send</button>
				</form>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript" src="https://dev.eigix.com/voucherr/assets/admin/dist/summernote-bs4.js"></script>
<script>
 $('.summernote').summernote({
	height: 300,
	tabsize: 3
  });
</script>