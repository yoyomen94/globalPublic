<div class="row">
            <!-- [ form-element ] start -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php if(isset($user_banner_title)) echo $user_banner_title; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="updatepass" name="updatepass" method="post" >
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter New Password">
                                    </div>
									<div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="retypepass" id="retypepass" placeholder="Enter Confirm Password">
                                    </div>
                                    <button type="submit" id="submitBtn" name="submitBtn" class="btn  btn-primary">Update Password</button>
									<div class="form-group">
										 <div id="updatepassmsg"></div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>