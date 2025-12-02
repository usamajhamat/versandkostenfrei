<?php 

	if($pg_type=="brands"){
		$details_pages = $this->db->get_where('brands', array('brands_id'=>$param2))->row_array();
		$re_name = $details_pages['name'];
	}
	else if($pg_type=="sub_cate"){
		$details_pages = $this->db->get_where('sub_categories', array('sub_categories_id'=>$param2))->row_array();
		$re_name = $details_pages['name'];
	}
	else if($pg_type=="cate"){
		$details_pages = $this->db->get_where('categories', array('categories_id'=>$param2))->row_array();
		$re_name = $details_pages['name'];
	}
	else if($pg_type=="brands_pages"){
		$details_pages = $this->db->get_where('brands_pages', array('brands_pages_id'=>$param2))->row_array();
		$re_name = $details_pages['name'];
	}
    else if($pg_type=="Lastest"){
		$re_name = "Lastest";
		$param2="0";
	}
	else if($pg_type=="Tips"){
		$re_name = "Tips";
		$param2="0";
	}
	else if($pg_type=="Trend"){
		$re_name = "Trending";
		$param2="0";
	}
	else if($pg_type=="Popular"){
		$re_name = "Popular";
		$param2="0";
	}

    $details = $this->db->get_where('brands_contents', array('brands_contents_id'=>$param1))->row_array();
	$brand_image_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
	$slider_image_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;

?>

<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4><?php echo $page_title; ?></h4>
									<span><?php echo $page_sub_title; ?></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="#"> <i class="fa fa-cogs"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Admin</a>
									</li>
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $page_title; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->
				<div class="page-body">
					<div class="row">
						<div class="card col-md-12">
							<div class="card-header">
								<h5>Manage System Setting</h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								
								<hr>  
							</div>  
							<div class="card-block">
								<form autocomplete="off" action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/pages_content/edit/'.$param1.'/'.$pg_type; ?>" method="post"  enctype ='multipart/form-data'>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" name="name" readonly value="<?php echo $re_name;?>" class="form-control" placeholder="Please Enter Brand Name" required>
											<input type="hidden" name="pages_id"  value="<?php echo $param2; ?>" class="form-control"  required>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Content Heading</label>
										<div class="col-sm-9">
											<input type="text" value="<?php echo $details['heading']?>" name="cont_heading" placeholder="Please Enter Content heading" class="form-control" required>
										</div>
									</div> 
									
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Description</label>
										<div class="col-sm-9">
											<textarea  name="editor1" data-height='300' data-name='body' ><?php echo $details['description']?></textarea>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-9">
											<select  name="status" required="required" class="form-control "  >
												<option value="Active" <?php if($details['status'] == 'Active') echo 'selected'; ?>>Active</option>
												<option value="Inactive" <?php if($details['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-info pull-right">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>