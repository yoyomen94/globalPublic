<form class="form-horizontal"  id="feedbackFrmUpdate" method="post" enctype="multipart/formdata">
  <input type="hidden" id="feedback_id" name="feedback_id" value="<?php if(isset($feedback_id)) echo $feedback_id; ?>" />					
  <div class="form-body">
  <div class="row">
  <div class="col-md-6">
	 <div class="form-group">								<label>Feedback Question</label>								<input type="text" class="form-control" id="u_query" name="feedback" placeholder="Enter Feedback Question" value="<?php if(isset($query)) echo $query; ?>"/>							</div>
	 </div>
	 <div class="col-md-6">
	 <div class="form-group">	
	 <label>Feedback Question(In Hindi)</label>								
	 <input type="text" class="form-control hindi_trnas" id="query_hindi" name="feedback_hindi" placeholder="Enter Feedback Question in hindi" value="<?php if(isset($query_hindi)) echo $query_hindi; ?>" />							
	 </div>
	 
  </div>
  </div>																
  <div class="form-body">
	 <div class="form-group">								<label>Display Order Number</label>								<input type="number" class="form-control" id="u_slug" name="slug" placeholder="Enter Display order number" value="<?php if(isset($slug)) echo $slug; ?>" min=0 />							</div>
  </div>
  <div class="form-group">							<button type="submit" class="btn btn-info waves-effect waves-light" id="updateBtn" name="updateBtn">Update</button>																											</div>
  <div class="form-group m-b-0">
	 <div id="u_alert_msg"></div>
  </div>
</form>