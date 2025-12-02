<?php 

if($param2=="brands"){
	$details = $this->db->get_where('brands', array('brands_id'=>$param1))->row_array();
	$re_name = $details['name'];
}
else if($param2=="sub_cate"){
	$details = $this->db->get_where('sub_categories', array('sub_categories_id'=>$param1))->row_array();
	$re_name = $details['name'];
}
else if($param2=="cate"){
	$details = $this->db->get_where('categories', array('categories_id'=>$param1))->row_array();
	$re_name = $details['name'];

}
else if($param2=="brands_pages"){
	$details = $this->db->get_where('brands_pages', array('brands_pages_id'=>$param1))->row_array();
	$re_name = $details['name'];
}
else if($param2=="Lastest"){
	$re_name = "Lastest";
	$param1="0";
}
else if($param2=="Tips"){
	$re_name = "Tips";
	$param1="0";
}
else if($param2=="Trend"){
	$re_name = "Trend";
	$param1="0";
}
else if($param2=="Popular"){
	$re_name = "Popular";
	$param1="0";
}



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
								<h5><?php echo $page_sub_title;?></h5>
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
								<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/pages_content/add/'.$param2; ?>" method="post"  enctype ='multipart/form-data'>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" name="name" readonly value="<?php echo $re_name?>" class="form-control" placeholder="Please Enter Brand Name" required>
											<input type="hidden" name="pages_id"  value="<?php echo $param1; ?>" class="form-control"  required>
										</div>
									</div>
									
									<?php /*
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Slider Image</label>
										<div class="col-sm-9">
											<input type="file" name="slider_image" class="form-control" required>
											<small style="color:red">Image dimension should be of 700X300</small>
										</div>
									</div>
									*/ ?>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Content Heading</label>
										<div class="col-sm-9">
											<input type="text" name="cont_heading" placeholder="Please Enter Content heading" class="form-control" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Description</label>
										<div class="col-sm-9">
											<textarea name="editor1"  data-height='300' data-name='body' ></textarea>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-9">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>