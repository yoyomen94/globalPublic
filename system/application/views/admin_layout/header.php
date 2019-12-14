<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url(); ?>assets/img/logo/logo.png" class="admin_logo" alt="Logo">
							<img src="<?php echo base_url(); ?>adminassets/img/mini-logo.png" class="admin_mini_logo" alt="Logo">
                           <span class="admin_text_logo"></span>
                        </b>
                       </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
						<ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
							<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
							<li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
						</ul>
					
						<ul class="navbar-nav my-lg-0">
                       
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></a>
								<div class="dropdown-menu dropdown-menu-right scale-up">
									<ul class="dropdown-user">
									   
										<li role="separator" class="divider"></li>
										<li><a href="<?php echo base_url().admin.'/change-password'; ?>"><i class="ti-lock"></i> Change Password</a></li> 
										<li><a href="#logoutModal" data-toggle="modal"><i class="ti-power-off"></i> Logout</a></li>
									</ul>
								</div>
							</li>
						</ul>
                </div>
            </nav>
        </header>
		
		
		<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>adminassets/images/users/profile.png" alt="user" />
                    
                       
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        
                     
                   
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url().admin.'/dashboard';?>"><i class="la la-tachometer"></i><span>Dashboard</span></a></li>
						
						 <li> <a class="waves-effect waves-dark" href="<?php echo base_url().admin.'/user-list';?>"><i class="la la-user"></i><span>User List</span></a></li>
						
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
		
		
		<div class="page-wrapper">
		
		<!--<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?php if(isset($banner_title)){ echo $banner_title; } ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().admin;?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($banner_title)){ echo $banner_title; }else{ echo"Dashboard"; } ?></li>
                    </ol>
                </div>
              
        </div>-->
	