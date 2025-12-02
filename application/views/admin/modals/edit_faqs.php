<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<?php 
    $details = $this->db->get_where('faqs', array('faqs_id'=>$param1))->row_array();
	$page_types = $this->db->query("SELECT * FROM page_types WHERE status = 'Active' ")->result_array();
?>
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-pencil"></i> Edit Faqs</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_faqs/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Question</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $details['question']; ?>" name="question" class="form-control" placeholder="Please Enter Category Name" required>
					<input type="hidden" name="unique_id" value="<?php echo $details['unique_id'];?>" class="form-control" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Answer</label>
				<div class="col-sm-8">
					<textarea class="editor" id="editor" name="answer" data-height='300' data-name='body' ><?php echo $details['answer']; ?></textarea>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Question Type</label>
				<div class="col-sm-8">
					<select id="question_type" name="question_type" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php foreach($page_types as $fetch_data){ ?>
							<option <?php if($details['question_type']==$fetch_data['page_types_id']){ echo "selected"; }?> value="<?php echo $fetch_data['page_types_id']; ?>"><?php echo $fetch_data['page_name']; ?></option>    
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Status</label>
				<div class="col-sm-8">
					<select  name="status" required="required" class="form-control">
						<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
						<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
					</select>
				</div>
            </div>
			<button type="submit" class="btn btn-info pull-right">Update</button>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.js"></script>
<script>
 

      tinymce.init({
         selector: '#editor',
           width : "100%",
           // change this value according to your HTML
 				  plugins: 'media,image,imagetools,link,autoresize,autosave,code,table',				
  				 
      });
    </script>