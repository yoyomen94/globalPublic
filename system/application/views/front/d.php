<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h3 class="mb-3">Globalbitco</h3>
						<h4 class="mb-3 f-w-400">Login</h4>
						<form method="post" name="loginFrm" id="loginFrm">
							<div class="form-group mb-3">
								<label class="floating-label" for="name">Email</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="">
							</div>
							<div class="form-group mb-3">
								<label class="floating-label" for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="">
							</div>
							<div class="form-group mb-3" id="capcha_id">
								<label class="floating-label" for="image_code">Enter Captcha</label>
								<input class="form-control" type="text" autocomplete="off" id="image_code" name="userCaptcha2">
							</div>
							<div class="form-group mb-3">
								<img src="<?php echo base_url().'get-captcha?rand='.rand(1111,9999);?>" id='captchaimg3' alt="captcha"> 
								<a onclick="refreshCaptcha();"><i class="fas fa-sync" aria-hidden="true"></i></a>
							</div>
							<button class="btn btn-primary btn-block mb-4" type="submit" name="submitBtn" id="submitBtn" >Login</button>
							<p class="mb-2"> <a href="javascript:void(0)" id="to-recover" class="f-w-400">Forgot Password?</a></p>
							<div id="alert_msg"></div>
						</form>
						
						<form method="post" name="recoverform" id="recoverform" style="display:none;">
							<div class="form-group mb-3">
								<label class="floating-label" for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="">
							</div>
							<button class="btn btn-primary btn-block mb-4" type="submit" name="recoverSubmitBtn" id="recoverSubmitBtn" >Reset</button>
							<p class="mb-2"><a class="f-w-400" href="javascript:void(0)" id="to-login">Back to Login</a></p>
							<div class="form-group">
								<div id="recovermsg"></div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
