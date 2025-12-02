<style>

.field_set{
  border-color: #afa6a6;
  border-style: dashed;

}

</style>
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
									<span>Welcome sub-title</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href=""> <i class="fa fa-cogs"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Admin</a>
									</li>
									<li class="breadcrumb-item"><a href=""><?php echo $page_title; ?></a>
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
								<h5><?php echo $page_title; ?></h5>
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
								<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/info_blog_seo/update'; ?>" method="post"  enctype ='multipart/form-data'>
									
							
									<div class="row">	
									  <div class="col-8">	
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Title</label>
											<div class="col-sm-10">
												<input type="text" name="home_title" value="<?php echo $seo_settings[3]['title']?>" class="form-control" placeholder="Please enter Title here" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Description</label>
											<div class="col-sm-10">
										  <textarea  name="description" style="height: 117px;" class="form-control" data-height='300' data-name='body' ><?php echo $seo_settings[3]['description'] ?></textarea>
										
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Meta key words</label>
											<div class="col-sm-10">
											  <!--	<textarea style="height: 300px;" name="answer" id="description" placeholder="Please Enter Answer here" rows="3" required></textarea>-->
											  <textarea type="text" data-height='300' name="home_meta" value="" class="form-control" placeholder="Please enter meta info here" required><?php echo $seo_settings[3]['meta']?></textarea>
											  <small style="color:red">keyword should comma separated*</small>
											</div>				
										</div> 
									  </div>
							         </div>
									 
							
							
								  
                                      
                                      <div class="form-group row" style="justify-content: center;">
									    <button type="submit" class="btn btn-sm btn-info pull-left mt-3">update</button>
									  </div>	  									  
								 </form>
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
