  <section id="wrapper">
        <div class="login-register">
			<div class="login-box card">
				<div class="panel-logo">
					<img alt="Logo" class="admin_logo" src="<?php echo base_url(); ?>/assets/img/logo/logo.png">
					<span>ADMIN</span>
				</div>
                <div class="card-body">
					
                    <form method="post" class="form-horizontal" id="loginform">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="name" type="text" name="name" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Password?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn_orange btn-block text-uppercase waves-effect waves-light" id="submitBtn" type="submit">Login</button>
                            </div>
                        </div>
						
						<div class="form-group">
                            
								<div id="loginmsg"></div>
							
						</div>
                      
                     
                    </form>
                    <form method="post" class="form-horizontal" id="recoverform">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="email" name="email" placeholder="<?php if(isset($email)) echo $email; ?>"> </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12">
                                <button class="btn btn_orange btn-block text-uppercase waves-effect waves-light" id="recoverSubmitBtn" type="submit">Reset</button>
                            </div>
                        </div>
						<div class="form-group text-center">
                            <div class="col-xs-12">
                                <button class="btn btn-block text-uppercase waves-effect waves-light" id="to-login" type="button">Back to Login</button>
                            </div>
                        </div>
						<div class="form-group">
                            
								<div id="recovermsg"></div>
							
						</div>
						
                    </form>
                </div>
            </div>
        </div>
		<!--<div class="developed_by">Developed and Maintained by <a href="http://volansoft.com" target="_BLANK">Volan Software &amp; Technologies</a></div>-->
    </section>