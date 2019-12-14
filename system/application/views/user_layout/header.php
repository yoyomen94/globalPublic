	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?php echo base_url();  ?>user_assets/images/user/profile.png" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?php if(isset($name)) echo $name; ?></div>
						</div>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item">
						<a href="<?php echo base_url().user.'/dashboard'; ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					
					<li class="nav-item">
						<a href="<?php echo base_url().user.'/user-profile'; ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
					</li>
					<?php					/*
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-feather"></i></span><span class="pcoded-mtext">Provide Help (PH)</span></a>
						<ul class="pcoded-submenu">
							<li><a href="<?php echo base_url().user.'/provide-help'; ?>">Provide Help (PH)</a></li>
						</ul>
					</li>					*/					?>
					
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->						Globalbitsco
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<span><?php if(isset($name)) echo $name; ?></span>
										<a href="<?php echo  base_url().'user-logout'; ?>" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="<?php echo base_url().user.'/user-profile'; ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="<?php echo base_url().user.'/update-password'; ?>" class="dropdown-item"><i class="feather icon-mail"></i> Update Password</a></li>
										<li><a href="<?php echo base_url().'user-logout'; ?>" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-content">
			<!-- [ breadcrumb ] start -->
			<div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="page-header-title">
								<h5 class="m-b-10"><?php if(isset($banner_title)) echo $banner_title; ?></h5>
							</div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url().user.'/dashboard'; ?>"><i class="feather icon-home"></i></a></li>
								<li class="breadcrumb-item"><a href="#!"><?php if(isset($user_banner_title)) echo $user_banner_title; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- [ breadcrumb ] end -->