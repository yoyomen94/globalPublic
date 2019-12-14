<div class="row">
	<!-- [ form-element ] start -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>Profile Details</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Details</th> 
								<th>Name</th>
								<th>Details</th> 
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Name</td>
								<td><?php if(isset($user_name) && $user_name != '') echo $user_name;?></td>
								<td>Email</td>
								<td><?php if(isset($email) && $email != '') echo $email;?></td>
							</tr>
							<tr>
								<td>FB URL</td>
								<td><?php if(isset($fb_url) && $fb_url !='')  echo $fb_url;  ?></td>
								<td>BTC Address</td>
								<td><?php if(isset($btc_address) && $btc_address != '') echo $btc_address; else echo "N/A";?></td>
							</tr>
							<tr>
								<td>Sponser Id</td>
								<td><?php if(isset($sponser_id) && $sponser_id != '') echo $sponser_id; else echo "N/A";?></td>
								<td>Country</td>
								<td><?php if(isset($country_name) && $country_name != '') echo $country_name; else echo "N/A";?></td>
							</tr>
							<tr>
								<td>Last Login Date</td>
								<td><?php if(isset($last_login_date) && $last_login_date != '') echo $last_login_date; else echo "N/A";?></td>
								<td>Current Login Date</td>
								<td><?php if(isset($current_login_date) && $current_login_date != '') echo $current_login_date; else echo "N/A";?></td>
							</tr>
							<tr>
								<td>Last Login IP</td>
								<td><?php if(isset($last_login_ip) && $last_login_ip != '') echo $last_login_ip; else echo "N/A";?></td>
								<td>Current Login IP</td>
								<td><?php if(isset($current_login_ip) && $current_login_ip != '') echo $current_login_ip; else echo "N/A";?></td>
							</tr>
							<tr>
								<td>Last Password Update Date</td>
								<td><?php if(isset($password_update_date) && $password_update_date != '') echo $password_update_date; else echo "N/A";?></td>
								<td>Created Date</td>
								<td><?php if(isset($insert_date) && $insert_date != '') echo $insert_date; else echo "N/A";?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- [ form-element ] end -->
</div>