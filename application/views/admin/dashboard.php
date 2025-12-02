<?php
	$total_categories   = $this->db->get('categories')->num_rows();
	$total_brands    	= $this->db->get_where('brands', array('status'=>'Active'))->num_rows();
	$total_coupons    	= $this->db->get_where('coupons', array('status'=>'Active'))->num_rows();
	$total_subscriber   = $this->db->get_where('newsletter_subscription')->num_rows();
	
?>
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">	
			<div class="page-wrapper">	
				<div class="page-body">
				    	<div class="row">
						<!-- task, page, download counter  start -->
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-lite-green update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
												<?php echo $total_categories; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Categories</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-3" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-pink update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
												<?php  echo $total_brands; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Brands</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-4" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-yellow update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
											<?php  echo $total_coupons; ?>
											<h6 class="text-white m-b-0">Total Coupons</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-1" height="50" style="display: block; width: 47px; height: 50px;" width="47"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
								   
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-green update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
											<?php  echo $total_subscriber; ?>
											<h6 class="text-white m-b-0">Total Subscribers</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-1" height="50" style="display: block; width: 47px; height: 50px;" width="47"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
								   
								</div>
							</div>
						</div>
						<?php /*
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-orenge update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
											<?php  echo $cancelled_bookings; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Cancelled Bookings</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-2" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
									
								</div>
							</div>
						</div>
						*/ ?>
					</div>
					<?php /*
					<div class="row">
						<!-- task, page, download counter  start -->
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-green update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
											<?php  echo $vehicles_type; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Vehicle Types</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-2" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
									
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-orenge update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
												<?php  echo $total_cars; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Cars</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-3" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-pink update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
												<?php  echo $total_motors; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Motors</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-3" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3">
							<div class="card bg-c-lite-green update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-9">
											<h4 class="text-white">
												<?php  echo $total_vehicles; ?>
											</h4>
											<h6 class="text-white m-b-0">Total Vehicle</h6>
										</div>
										<div class="col-3 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
											<canvas id="update-chart-3" height="50" width="47" style="display: block; width: 47px; height: 50px;"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
					</div>
					*/ ?>
				</div>
			</div>
		</div>
	</div>
</div>