<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">

		<div class="navbar-logo">
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu"></i>
			</a>
			<a href="<?php echo base_url(); ?>">
				<img class="img-fluid" style="height: 50px;" src="<?php echo base_url(); ?>uploads/admin/<?php echo $this->db->get_where('system_settings',array('type'=>'system_image'))->row()->description;?>" alt="Theme-Logo" />
			</a>
			<a class="mobile-options">
				<i class="feather icon-more-horizontal"></i>
			</a>
		</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-left">
				<li class="header-search">
					<div class="main-search morphsearch-search">
						<div class="input-group">
							<span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
							<input type="text" class="form-control">
							<span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
						</div>
					</div>
				</li>
				<li>
					<a href="#!" onclick="javascript:toggleFullScreen()">
						<i class="feather icon-maximize full-screen"></i>
					</a>
				</li>
			</ul>
			<ul class="nav-right">
				<li class="user-profile header-notification">
					<div class="dropdown-primary dropdown">
						<div class="dropdown-toggle" data-toggle="dropdown">
							<?php 
								$role_id = $this->session->userdata('role_id');
								$path_img = 'uploads/users/';
								if($role_id == 1){
									$user_img = $this->db->get_where('users_system',array('users_system_id'=>$this->session->userdata('users_id')))->row()->user_image;
							?>
								<img src="<?php echo base_url().$path_img.$user_img; ?>" class="img-radius" style="width: 45px;"alt="User-Profile-Image">
							<?php } ?>
							<span><?php echo $this->session->userdata('user_name'); ?></span>
							<i class="feather icon-chevron-down"></i>  
						</div>
						<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<?php if($role_id == 1){?>
							<li>
								<a href="<?php echo base_url(); ?>admin/myprofile">
									<i class="feather icon-user"></i> Account Settings
								</a>
							</li>
							<?php }  ?>
							<li>
								<a href="<?php echo base_url(); ?>admin/logout">
									<i class="feather icon-log-out"></i> Logout
								</a>
							</li>
						</ul>

					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>