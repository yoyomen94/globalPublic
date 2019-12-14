<div class="container-fluid">
	<div class="row row_col">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">User Detail</h4>
					<div class="table-responsive m-t-40">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
								   <th class="w-25">Name</th>
								   <th>Details</th> 
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Name</td>
									<td><?php if(isset($name) && $name != '') echo $name;?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php if(isset($email) && $email != '') echo $email;?></td>
								</tr>
								<tr>
									<td>FB URL</td>
									<td><?php if(isset($fb_url) && $fb_url !='')  echo $fb_url;  ?></td>
								</tr>
								<tr>
									<td>BTC Address</td>
									<td><?php if(isset($btc_address) && $btc_address != '') echo $btc_address; else echo "N/A";?></td>
								</tr>
								<tr>
									<td>Date Added</td>
									<td><?php if(isset($insert_date) && $insert_date != '') echo $insert_date; else echo "N/A";?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>