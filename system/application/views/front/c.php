<div class="auth-wrapper">
	<div class="auth-content width-40">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img class="img-fluid mb-4" style="height: 100px;" src="<?php echo base_url(); ?>assets/img/ok.png" alt="#">
						<h4 class="mb-3 f-w-400"><?php if(isset($msg)) echo $msg; ?></h4>
						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>" class="btn btn-primary btn-block mb-4">HOME</a>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url().'login'; ?>" class="btn btn-primary btn-block mb-4">LOGIN</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
