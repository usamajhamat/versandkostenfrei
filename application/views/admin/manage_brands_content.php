<style>
  
   .page_list tr
   {
    padding:16px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
   .page_list tr.ui-state-highlight
   {
    padding: 24px;
    background-color: #fcecec;
    border: 3px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    height: 60px;
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
										<li>
											<a href="<?php echo base_url()."admin/add_page_content/".$page_id."/".$pag_type;?>" class="btn btn-success btn-sm" > <i class="fa fa-plus"></i> <?php echo $button_cap;?></a>
										</li>
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								<hr>
							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<table id="simpletable" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>
												<th>#</th>
												<th>Action</th>
												<th>Name</th>
												<th>Heading</th>
												<th>Status</th>
												<th>Date</th>												
											</tr>
										</thead>
										<tbody  class="list-unstyled page_list" id="brands_content">
											<?php $count=0; if(!empty($page_contents)){foreach($page_contents as $fetch_data): $count++;  
											  if($pag_type=="brands"){
												  $pa_name = $this->db->get_where('brands', array('brands_id'=>$fetch_data['brands_id']))->row()->name;
											  }
											  
                                              else if($pag_type=="cate"){
												$pa_name = $this->db->get_where('categories', array('categories_id'=>$fetch_data['categories_id']))->row()->name;
											 }	
											 else if($pag_type=="brands_pages"){
												$pa_name =  $this->db->get_where('brands_pages', array('brands_pages_id'=>$fetch_data['brands_pages_id']))->row()->name;
											 }	
											 else if($pag_type=="sub_cate"){
												$pa_name = $this->db->get_where('sub_categories', array('sub_categories_id'=>$fetch_data['sub_categories_id']))->row()->name;
											 }	
											 else if($pag_type=="Lastest"){
												$pa_name = "Lastest";
											 }
											 else if($pag_type=="Tips"){
												$pa_name = "Tips";
											 }
											 else if($pag_type=="Trend"){
												$pa_name = "Trending";
											 }	
											 else if($pag_type=="Popular"){
												$pa_name = "Popular";
											 }									 
											?>
											 
											<tr id="<?php echo $fetch_data["brands_contents_id"]; ?>">
												<td ><?php echo $count; ?></td>
												<td>
													<div class="dropdown dropdown open">
														<button class="btn btn-sm btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
														<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
														    <a class="dropdown-item waves-light waves-effect" href="<?php echo base_url().'admin/edit_pages_content/'.$fetch_data['brands_contents_id'].'/'.$page_id.'/'.$pag_type;?>" > <i class="fa fa-pencil"></i> Edit </a>
																						
														</div>		 				
													</div>
												</td>
												<td><?php echo $pa_name; ?></td>
												<td><?php echo $fetch_data['heading']; ?></td>
												<td><?php echo $fetch_data['status']; ?></td>
												<td><?php echo $fetch_data['date_added']; ?></td>
											</tr>
											<?php endforeach; }?>
										</tbody>										
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>