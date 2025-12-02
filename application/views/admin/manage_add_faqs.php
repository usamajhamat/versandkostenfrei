<?php 
 $page_types = $this->db->query("SELECT * FROM page_types WHERE status = 'Active' ")->result_array();


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
								<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_add_faqs/add/'; ?>" method="post"  enctype ='multipart/form-data'>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Question</label>
										<div class="col-sm-9">
                                        <input type="text" name="question" class="form-control" placeholder="Please Enter Question" required>
				                    	<input type="hidden" name="unique_id" value="<?php echo $brand_id; ?>" class="form-control" />  
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-sm-3 col-form-label">Answer</label>
										<div class="col-sm-9">
											<textarea row="300" name="editor1" data-height='300' data-name='body' ></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Question Type</label>
										<div class="col-sm-9">
										<select id="question_type" name="question_type" required="required" class="form-control">
                                            <option value="" disabled >Please select <?php echo $page_id; ?></option>
                                            <?php foreach($page_types as $fetch_data){ ?>
                                                <option <?php if($page_id ==  $fetch_data["page_types_id"]){ echo "selected"; } ?>  value="<?php echo $fetch_data['page_types_id']; ?>"><?php echo $fetch_data['page_name']; ?></option>    
                                            <?php } ?>
                                        </select> 
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