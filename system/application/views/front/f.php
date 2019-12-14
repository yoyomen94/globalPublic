<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
					<?php  if(isset($recovery_flag) && $recovery_flag == 1){ ?>
						<img class="img-fluid mb-4" style="height: 100px;" src="<?php echo base_url(); ?>assets/img/ok.png" alt="#">
						<h4 class="mb-3 f-w-400">Password Recovery Link is expired now.</h4>
						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>" class="btn btn-primary btn-block mb-4">HOME</a>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url().'login'; ?>" class="btn btn-primary btn-block mb-4">LOGIN</a>
							</div>
						</div>
					<?php }else{ ?>
						<h3 class="mb-3">Globalbitco</h3>
						<h4 class="mb-3 f-w-400">Password Reset</h4>
						<form method="post" name="passwordResetFrm" id="passwordResetFrm">
							<input type="hidden" name="user_id" id="user_id" value="<?php if(isset($user_id)) echo $user_id; ?>" >
							<div class="form-group mb-3">
								<label class="floating-label" for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="">
							</div>
							<div class="form-group mb-3">
								<label class="floating-label" for="conf_password">Confirm Password</label>
								<input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="">
							</div>
							<button class="btn btn-primary btn-block mb-4" type="submit" name="submitBtn" id="submitBtn" >Reset</button>
							<p class="mb-2">Already have an account? <a href="<?php echo base_url().'login'; ?>" class="f-w-400">Login</a></p>
							<div id="alert_msg"></div>
						</form>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>