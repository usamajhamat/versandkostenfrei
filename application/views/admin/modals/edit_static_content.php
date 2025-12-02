<?php 
    $details = $this->db->get_where('static_content', array('static_content_id'=>$param1))->row_array();  
    $upload_image_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
	$pages = $this->db->query("SELECT * FROM page_types WHERE status = 'Active' ")->result_array();
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i> Edit Static Content</h4>
			<div class="card-body">
			<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_static_content/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Type Name</label>
						<div class="col-sm-8">
							<input type="text" name="type" readonly class="form-control" value="<?php echo $details['type']; ?>" placeholder="Please Enter Content Type" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Title</label>
						<div class="col-sm-8">
							<input type="text" name="title" class="form-control" value="<?php echo $details['title']; ?>" placeholder="Please Enter Content Title" required>
						</div>
                    </div>
					<?php 
					if($details['description']!="blank"){
					?>
					<div class="form-group row" >
						<label class="col-sm-4 col-form-label">Description</label>
						<div class="col-sm-8">
							<textarea name="description" class="form-control" required rows="5"><?php echo $details['description']; ?></textarea>
						</div>
					</div>
					<?php	
					}
					?>
					<?php 
					if($details['text_1']!=null){
					?>
					<div class="form-group row" >
						<label class="col-sm-4 col-form-label">Step 1</label>
						<div class="col-sm-8">
							<textarea name="text_1" class="form-control" required rows="5"><?php echo $details['text_1']; ?></textarea>
						</div>
					</div>
					<?php	
					}
					?>

                  <?php 
					if($details['text_2']!=null){
					?>
					<div class="form-group row" >
						<label class="col-sm-4 col-form-label">Step 2</label>
						<div class="col-sm-8">
							<textarea name="text_2" class="form-control" required rows="5"><?php echo $details['text_2']; ?></textarea>
						</div>
					</div>
					<?php	
					}
					?>

                   <?php 
					if($details['text_3']!=null){
					?>
					<div class="form-group row" >
						<label class="col-sm-4 col-form-label">Step 3</label>
						<div class="col-sm-8">
							<textarea name="text_3" class="form-control" required rows="5"><?php echo $details['text_3']; ?></textarea>
						</div>
					</div>
					<?php	
					}
					?>
					
					<?php 
					
					if($details['image']!=''){
                      ?>
					   <div class="form-group row">
        				<label class="col-sm-4 col-form-label">Image</label>
        				<div class="col-sm-6">
        					<input type="file" name="image_attached" class="form-control" >
        				</div>
        				<div class="col-sm-2">
        				    <img src="<?php echo base_url(); ?><?php echo $upload_image_url.''.$details['image'] ?>" style="width:100px;background:grey;padding:1em">
        				</div>
        			  </div>
					  <?php
					}

					?>
                   
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<select  name="status" required="required" class="form-control">
								<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
								<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
							</select>
						</div>
                    </div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div> 