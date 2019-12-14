<div class="auth-wrapper">
	<div class="auth-content width-70">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h3 class="mb-3">Globalbitco</h3>
						<h4 class="mb-3 f-w-400">Sign up</h4>
					<form method="post" name="registerfrm" id="registerfrm">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="Email">Email address</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="fb_url">Facebook URL</label>
									<input type="text" class="form-control" id="fb_url" name="fb_url" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="btc_address">BTC Address</label>
									<input type="text" class="form-control" id="btc_address" name="btc_address" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<select class="form-control" name="country_id" id="country_id">
										<option value="">-Select Country-</option>
										<?php if(isset($country)){
											foreach($country as $rs){
										?>
											<option value="<?php echo $rs->country_id; ?>"<?php if(isset($country_id) && $country_id == $rs->country_id){ echo "selected"; } ?>><?php echo $rs->country_name; ?></option>
										<?php
											}
										} ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="sponser_id">Sponsor's Id</label>
									<input type="text" class="form-control" id="sponser_id" name="sponser_id" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="confirm_password">Confirm Password</label>
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div id="capcha_id" class="col-md-6">
								<div class="form-group mb-3">
									<label class="floating-label" for="image_code">Enter Captcha</label>
									<input class="form-control" type="text" autocomplete="off" id="image_code" name="userCaptcha2">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<img src="<?php echo base_url().'get-captcha?rand='.rand(1111,9999);?>" id='captchaimg3' alt="captcha"> 
									<a onclick="refreshCaptcha();"><i class="fas fa-sync" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<button class="btn btn-primary btn-block mb-4" type="submit" name="registerBtn" id="registerBtn" >Sign up</button>
						<p class="mb-2">Already have an account? <a href="<?php echo base_url().'login'; ?>" class="f-w-400">Login</a></p>
						<div id="alert_msg"></div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
