<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<title><?php echo $page_title; ?> </title>
		
	   <?php $this->load->view(strtolower($this->session->userdata('directory')).'/theme/top'); ?>
	</head>

	<body>
		<!-- Pre-loader start -->
		<div class="theme-loader">
			<div class="ball-scale">
				<div class='contain'>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pre-loader end -->
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper">
				<?php $this->load->view(strtolower($this->session->userdata('directory')).'/theme/header'); ?>
				<div class="pcoded-main-container">
					<div class="pcoded-wrapper">
						<?php $this->load->view(strtolower($this->session->userdata('directory')).'/theme/sidebar'); ?>
						<?php $this->load->view(strtolower($this->session->userdata('directory')).'/'.$page_name); ?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('modal'); ?>
		<?php $this->load->view(strtolower($this->session->userdata('directory')).'/theme/script'); ?>
	</body>
</html>
