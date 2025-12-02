<?php

$page_data      = $this->db->get_where('static_pages',array('page_name'=>'faqs'))->row_array();

?>
<div class="card">
	<h4 class="card-header mt-0"></i>Faqs Seo Settings</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_faqs/update_faqs'; ?>" method="post"  enctype ='multipart/form-data'>
			
		
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Seo Title</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $page_data['seo_title']; ?>" name="seo_title" required="required" placeholder="Enter SEO Title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Seo Description</label>
                    <div class="col-sm-9">
                    <textarea name="seo_desc"  required="required" placeholder="Enter SEO Description" class="form-control"  rows="3"><?php echo $page_data['seo_desc']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Seo Keywords</label>
                    <div class="col-sm-9">
                    <textarea name="seo_keys" required="required" placeholder="Enter meta keys words" class="form-control"  rows="3"><?php echo $page_data['seo_keys']; ?></textarea>
                    <small style="color:red">keyword should comma separated*</small>
                    </div>
                    
                </div>
                <div class="row">
                    <label class="col-sm-4 col-lg-3 col-form-label"> </label>
                    <div class="col-sm-8 col-lg-9">
                        <div class="input-group" style="justify-content: flex-end;">
                            <button type="sunmit" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </div>
				
			</div>
			
		</form>
	</div>
</div>
