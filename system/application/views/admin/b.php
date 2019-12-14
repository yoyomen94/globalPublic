<div class="container-fluid">
		
		<div class="row">
			<div class="col-lg-4 col-md-12">
			   <div class="card">
					<div class="card-body">
						<a class="black-font" href="<?php echo base_url().admin.'/user-list/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="la la-group icon-lg text-success"></i>
							<div class="ml-3">
								<p class="mb-0">Total Users</p>
								<h4 class=""><?php if(isset($totalUsers))echo $totalUsers; ?></h4>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
			 <div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
					<a class="black-font" href="<?php echo base_url().admin.'/list-post/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="fa fa-buysellads icon-lg text-purple"></i>
							<div class="ml-3">
								<p class="mb-0">Total Post</p>
								<h4 class=""><?php if(isset($totalAds))echo $totalAds; ?></h4>
							</div>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
			   <div class="card">
					<div class="card-body">
						<a class="black-font" href="<?php echo base_url().admin.'/main-category/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="la la-list icon-lg text-success"></i>
							<div class="ml-3">
								<p class="mb-0">Total Category</p>
								<h4 class=""><?php if(isset($totalCate))echo $totalCate; ?></h4>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			
			 <div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<a class="black-font" href="<?php echo base_url().admin.'/sub-category/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="ti-flag-alt icon-lg text-purple"></i>
							
							<div class="ml-3">
								<p class="mb-0">Total Sub Category</p>
								<h4 class=""><?php if(isset($totalSubCate))echo $totalSubCate; ?></h4>
							</div>
							
						</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<a class="black-font" href="<?php echo base_url().admin.'/child-category/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="la la-location-arrow icon-lg text-warning"></i>
							<div class="ml-3">
								<p class="mb-0">Total Child Category</p>
								<h4 class=""><?php if(isset($totalSubSubCat))echo $totalSubSubCat; ?></h4>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<a class="black-font" href="<?php echo base_url().admin.'/feedback-management/';?>">
						<div class="d-flex align-items-center justify-content-md-center">
							<i class="fa fa-comment-o icon-lg text-danger"></i>
							<div class="ml-3">
								<p class="mb-0">Total Feedback Questions</p>
								<h4 class=""><?php if(isset($totalfeedback))echo $totalfeedback; ?></h4>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
			
			
		</div>
		
		<div class="row row_col">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Latest Feedback</h4>
						<div class="table-responsive m-t-10">
							<table id="myTable" class="table table-bordered table-striped data_table_ss">
								<thead>
									<tr>
										<th>#</th>
										<th>User</th>
										<th>Feedback Question</th>
										<th>Comment</th>
										<th>Rating</th>
										<th>Date</th>
									</tr>
									</thead>
									<tbody>
									<?php if (isset($feedback)){ 
										$i=1 ; 
										$count=1 ; 
										foreach($feedback as $value){ 
										?>
										<tr id="<?php echo $value->id; ?>">
											<td><?php echo $i; ?></td>
											<td><a href="<?php echo base_url().admin.'/view-user/'.$value->user_id; ?>"><?php echo $value->name; ?></a></td>
											<td><?php echo $value->query; ?></td>
											<td><?php if($value->comment!='') echo $value->comment; else echo 'N/A'; ?></td>
											<td><?php 
											if($value->rating==1)
											{
												echo '<div class="label label-success">Terrible</div>';
											}
											else if($value->rating==2)
											{
												echo '<div class="label label-success">Bad</div>';
											}
											else if($value->rating==3)
											{
												echo '<div class="label label-info">Okay</div>';
											}
											else if($value->rating==4)
											{
												echo '<div class="label label-info">Good</div>';
											}
											else if($value->rating==5)
											{
												echo '<div class="label label-info">Great</div>';
											}
											else
											{
												echo 'N/A';
											} ?></td>
											<td><?php echo $value->insert_date; ?></td>
											
									</tr>
									<?php $i++; } } ?>
								</tbody>
							</table>
						</div>
						 <div id="msg"></div>
					</div>
				</div>
			</div>
			<br/>
		
			
		</div>
		<br>
 </div>
 
 