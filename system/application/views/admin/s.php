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
									<td>Mobile</td>
									<td><?php if(isset($mobile) && $mobile != '') echo $mobile;?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php if(isset($gender) && $gender ==0) { echo 'Male'; } else if($gender==1) { echo 'Female'; } else { echo "N/A"; } ?></td>
								</tr>
								<tr>
									<td>DOB</td>
									<td><?php if(isset($dob) && $dob != '') echo $dob;else echo "N/A";?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Address Detail</h4>
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
									<td>Landmark</td>
									<td><?php if(isset($landmark) && $landmark !='') { echo $landmark; } else { echo "N/A"; } ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php if(isset($corresspondance_add) && $corresspondance_add != '') echo $corresspondance_add;else echo "N/A";?></td>
								</tr>
								<tr>
									<td>Latitude</td>
									<td><?php if(isset($latitude) && $latitude !='') { echo $latitude; } else { echo "N/A"; } ?></td>
								</tr>
								<tr>
									<td>Longitude</td>
									<td><?php if(isset($longitude) && $longitude != '') echo $longitude;else echo "N/A";?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><?php if(isset($banner_title2)){ echo $banner_title2; }?></h4>
					<div class="table-responsive m-t-10">
						<table id="postUserTable" class="table table-bordered table-striped data_table_ss">
						<input type="hidden" name="user_id" value="<?php if(isset($user_id)) echo $user_id; ?>" id="user_id">
							<thead>
								<tr>
									<th>#</th>
									<th>Post ID</th>
									<th>Post Title</th>
									<th>Category Name</th>
									<th>Sub Category Name</th>
									<th>Child Category Name</th>
									<th>Rent</th>
									<th>Added Date</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
					<div id="msg"></div>
				</div>
			</div>
		</div>
	</div>
</div>