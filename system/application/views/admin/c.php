<div class="container-fluid">
      
    <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"><?php if(isset($banner_title2)){ echo $banner_title2; }?> 
			   <a href="#add-main-category" class="btn btn_orange pull-right-sm mt_10_xs link_scroll" >Add Main Category</a></h4>
               <div class="table-responsive m-t-10">
					<table id="mainCategoryTable" class="table table-bordered table-striped data_table_ss">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Url</th>
								<th>Keywords</th>
								<th>Icon</th>
								<th>Slug</th>
								<th>Date</th>
								<th>Action</th>
								
							</tr>
						</thead>
					</table>
			   
					<?php
					/*
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Url</th>
                           <th>Icon</th>
                           <th>Slug</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (isset($getCategory)){ 									$i=1 ; 									$count=1 ; 									foreach($getCategory as $value){ ?>									
                        <tr id="<?php echo $value->category_id; ?>">
                           <td><?php echo $i; ?></td>
                           <td><?php echo $value->category_name; ?></td>
                           <td><?php echo $value->url; ?></td>
                           <td>
							<div class="thumbnail-item hidden-xs-down">
								<a href="#"><img src="<?php echo base_url().'upload/category/'.$value->category_icon;?>" class="thumbnail thumb_sm"/></a>
								<div class="img_tooltip img_tooltip_sm">
									<img src="<?php echo base_url().'upload/category/'.$value->category_icon;?>" alt="" />
								</div> 
							</div> 
							<img src="<?php echo base_url().'upload/category/'.$value->category_icon;?>" alt="" width="24" class="d-lg-none d-md-none d-sm-none" />
						   </td>
                           <td><?php echo $value->slug; ?></td>
                           <td><?php echo $value->insert_date; ?></td>
                           <td nowrap>
						   
						   <a title="Edit" href="javascript:void(0);" data-href="<?php echo base_url().admin; ?>/edit-category/<?php echo $value->category_id; ?>" class="openPopupMain"><i class="fa fa-pencil text-inverse m-r-10"></i></a>
						   
						   <?php if ($value->status == 1) { ?>												<a title="block" class="success" href="" id="<?php echo 'success-'.$value->category_id .'-'.'tb_category'.'-'.'category_id-status'; ?>" onclick="return blockFunctionData(this.id);"><i class="fa fa-ban text-success m-r-10"></i></a> 											<?php } else { ?>												<a class="danger" href="" id="<?php echo 'danger-'.$value->category_id .'-'.'tb_category'.'-'.'category_id-status'; ?>" onclick="return blockFunctionData(this.id);"><i class="fa fa-ban text-danger m-r-10"></i></a> 											<?php } ?>										</td>
                        </tr>
                        <?php $i++; } } ?>							
                     </tbody>
                  </table>
				  */
				  ?>
               </div>
               <div id="msg"></div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
		<span class="label label-info col-lg-12">For hindi, type your text and press space button and it will automatically convert in hindi</span>
	</div>
   </div>
   <div class="row" id="add-main-category">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"><?php if(isset($banner_title)){ echo $banner_title; }?></h4>
               <form class="form-horizontal"  id="categoryFrm" method="post" enctype="multipart/formdata">
                  									
                  <div class="form-group row">
                     <div class="col-md-4 col-xs-12">
					 <label>Category Name</label>					
					 <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category  name" value="<?php if(isset($category_name)) echo $category_name; ?>" <?php if(!isset($category_id)){ ?>onBlur="getStrUrl(this.value);" <?php } ?> />				
					 </div>
					 
					 <div class="col-md-4 col-xs-12">								<label>Category Name(In Hindi)</label>								<input type="text" class="form-control hindi_trnas" id="category_name_hindi" name="category_name_hindi" placeholder="Enter Category  name in hindi" value="<?php if(isset($category_name_hindi)) echo $category_name_hindi; ?>" />							</div>
					 
					 
                  <div class="col-md-4 col-xs-12">								<label>Category Url </label>								<input type="text" class="form-control" id="url" name="url" placeholder="Enter url" value="<?php if(isset($url)) echo $url; ?>" <?php if(isset($category_id)){echo 'readonly';}?> />							</div>
                  </div>
				  <div class="form-group row">
                     <div class="col-md-4 col-xs-12">								<label>Category Keywords </label>								<input type="text" class="form-control" id="cat_keyword" name="cat_keyword" placeholder="Enter Comma-separated values." value="<?php if(isset($cat_keyword)) echo $cat_keyword; ?>" />							</div>
                 <div class="col-md-4 col-xs-12">
                     <div class="form-group">								<label>Icon<span class="red">(Max Size & Dimension : 30KB & 256*256 )</span></label>								<input type="file" class="form-control" id="category_icon" name="category_icon" onchange="return validateImageExtensionOther(this.value,1)" />							</div>
                  </div>
                 																		
                  <div class="col-md-4 col-xs-12">								<label>Display Order Number</label>								<input type="number" class="form-control" id="slug" name="slug" placeholder="Enter Display order number" value="<?php if(isset($slug)) echo $slug; ?>" />							</div>
                  </div>
                  <div class="form-group">							<button type="submit" class="btn btn-info waves-effect waves-light" id="submitBtn" name="submitBtn">Submit</button>																											</div>
                  <div class="form-group m-b-0">
                     <div id="alert_msg"></div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   
   
</div>


<div id="mainCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Edit Main Category</h4>		<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>