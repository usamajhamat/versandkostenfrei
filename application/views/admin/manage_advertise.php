<style>
.note-editor{
   width: 100%;
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
								<h5><?php echo $page_title;?></h5>
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
								<form method="POST" action="<?php echo base_url().strtolower($this->session->userdata('directory')); ?>/manage_advertise/update"  enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12">
											
										    <div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Heading</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">
														<span class="input-group-addon"><i class="icofont icofont-ui-volume"></i></span>
														<input type="text" name="heading" class="form-control" placeholder="" value="<?php echo $page_data['heading']; ?>" required>
													</div>
												</div>
											</div>
											 <div class="row">
												<label class="col-sm-4 col-lg-3 col-form-label">Content</label>
												<div class="col-sm-8 col-lg-9">
													<div class="input-group">	
														<textarea name="editor1" data-height='300' data-name='body' ><?php echo $page_data['description']; ?></textarea>
													</div>
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
									
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>