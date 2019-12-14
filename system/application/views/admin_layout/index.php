<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<title>
        <?php if(isset($title)){ echo $title;}?>
    </title>
	
	<link href="<?php echo base_url();?>adminassets/css/glyphicon.css" rel="stylesheet">
	<link href="<?php echo base_url();?>adminassets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>adminassets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="<?php echo base_url();?>adminassets/css/dropzone.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>adminassets/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>adminassets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
	 
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>adminassets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url();?>adminassets/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url();?>adminassets/css/lightgallery.css" rel="stylesheet">
    <link href="<?php echo base_url();?>adminassets/css/calendarorganizer.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>adminassets/css/custom.css" rel="stylesheet">
	
	<link href="<?php echo base_url();?>adminassets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
 <?php if(isset($header)) echo $header ;?>
	<?php if(isset($middle)) echo $middle ;?>
 <?php if(isset($footer)) echo $footer ;?>
</div>

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog modal-frame modal-top">
		<div class="modal-content">
		  
		  <div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-9 text-right">
						<p>Are you sure you want to logout? If you logout then your session is terminated.</p>
					</div>
					<div class="col-md-3 text-right">
						<button class="btn btn-info waves-effect waves-light" data-dismiss="modal">Cancel</button>
						<a href="<?php echo base_url().admin.'/logout'; ?>" class="btn btn-info waves-effect waves-light">Logout</a>
						
					</div>
				</div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>

	<div id="delete-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                   
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title send_frm_txt">Confirmation</h4>
					<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
				</div>
					<input type="hidden" id="delete_id" name="delete_id" value="">
				<div class="modal-body send_frm_txt" style="padding: 5%;" id="block_con">Are you sure to want to delete this ?</div>
				
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
					<button type="submit" data-dismiss="modal" class="btn btn-success" onClick="deleteFunction();">Ok</button>
				</div>
			</div>
		</div>
    </div>
	
	<div id="mailReplyModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
		<form method="post" id="sendMailFrm">
		  <div class="modal-header">
			<h4 class="modal-title">Send Mail</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">
			<div class="form-group">
				<input type="text" class="form-control" id="m_name" name="m_name" placeholder="Name" >
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="email_id" name="email_id" placeholder="To" >
			</div>
			<div class="form-group">
				<textarea class="form-control" id="send_message" name="send_message" placeholder="Message" rows="5"  maxlength="255"></textarea>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-info waves-effect waves-light" id="mailSendBtn">Send</button>
		  </div>
		</form>
		</div>

	  </div>
	</div>
	
	<div class="modal fade " id="open-img-modal" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
        <button type="button" class="close" style="text-align:right" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img class="my_image"/>
      </div>
	</div>
  </div>
</div>
	
	<input type="hidden" id="base_url" value="<?php echo base_url();?>">
	<input type="hidden" id="admin" value="<?php echo admin;?>">
	<input type="hidden" id="p_id_user" value="<?php if(isset($p_id_user)){ echo $p_id_user;} ?>">
	<div id="snackbar"></div>
		
    <script src="<?php echo base_url();?>adminassets/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>adminassets/plugins/moment/moment.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>adminassets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>adminassets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>adminassets/js/jquery.slimscroll.js"></script>
    
	<script src="<?php echo base_url();?>adminassets/js/waves.js"></script>
   
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>adminassets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>adminassets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>adminassets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo base_url();?>adminassets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
	 <script src="<?php echo base_url();?>adminassets/js/jasny-bootstrap.js"></script>
	 
	<!-- This is data table -->
    <script src="<?php echo base_url();?>adminassets/plugins/datatables/jquery.dataTables.min.js"></script> 
	
	<script src="<?php echo base_url();?>adminassets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	
	<script src="<?php echo base_url(); ?>adminassets/js/bootstrap-datetimepicker.js"></script>
	
	<script src="<?php echo base_url(); ?>adminassets/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>adminassets/plugins/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url();?>adminassets/js/dropzone.js"></script>
	
	<script src="<?php echo base_url();?>adminassets/js/jquery.countdown.js"></script>
	<script src="<?php echo base_url();?>adminassets/js/calendarorganizer.min.js"></script>
	<script src="<?php echo base_url();?>adminassets/js/customjs.js"></script>
	<script src="<?php echo base_url();?>adminassets/js/lightgallery-all.min.js"></script>
	
	
	<script>	
	$('.mdate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });	
	$('.mdatetime').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm:ss' });
	</script>
	
	<script>
		function matchStart (term, text){
			if (text.toUpperCase().indexOf(term.toUpperCase()) == 0){
				return true;
			}
			return false;
		}
		$(document).ready(function() {
			$.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
				$(".select_expert").select2({
				matcher: oldMatcher(matchStart),
				dropdownParent: $("#task-assign-modal")
				})
			});
		});
	</script>
	
	<script>
		var FromEndDate = new Date();
		 var d = new Date("2000-01-01");
			$('.form_date').datetimepicker({
				 weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				<?php if(isset($task_flag)){?>
				startDate: FromEndDate, 
				<?php } ?>
				<?php if(isset($date_flag)){?>
				  endDate: FromEndDate, 
				<?php } ?>
				<?php if(isset($edit_pro_flag)){?>
				  endDate: d, 
				<?php } ?>
				
				forceParse: 0
			});
	</script>
	
	<script type="text/javascript">
		var dataTable ='';
		var customFieldDataTable;
				
				<?php if(isset($userTableFlag) && $userTableFlag==1){ ?>
				/* sub category datatable */
				dataTable = $('#userTable').DataTable( {
					"processing": true,
					"serverSide": true,
					"order": [0,"desc"],
					"ajax":{"url":base_url+"user-table-grid-data","type": "POST","dataType": "json"},
					"columns": [
						  { "data": "#" },
						  { "data": "name" },
						  { "data": "email" },
						  { "data": "fb_url" },
						  { "data": "btc_address" },
						  { "data": "insert_date" },
						  { "data": null },
					],
					 columnDefs: [{
						targets: [-1], render: function (a, b, data, d) {
							 var action='';
							var action ='<a title="View" href="'+base_url+admin+'/view-user/'+data.user_id+'"><i class="la la-binoculars text-primary m-r-10"></i></a>';
							 if (data.status == 1) {
								action+='<a title="block" class="success blockUnblock" href="" id="success-'+data.user_id+'-tb_user-user_id-status"><i class="fa fa-ban text-success m-r-10"></i></a>';
							}else{
								action+='<a class="danger blockUnblock" href="" id="danger-'+data.user_id+'-tb_user-user_id-status"><i class="fa fa-ban text-danger m-r-10"></i></a>'; 
							} 
							return action;
						}
					}],	
					
				} );
				
				dataTable.on('page.dt', function() {
				  $('html, body').animate({
					scrollTop: $(".dataTables_wrapper").offset().top-50
				   }, 'slow');
				});
				
				<?php } ?>
				
	</script>
	
<script>
$(document).ready(function(){
	$(".open-img-modal"	).click(function(){
		var imgsrc = $(this).data('id');
		 	$('.my_image').attr('src',imgsrc);
			$("#open-img-modal").modal('show');
	})	
});
</script>
<script>
$(document).ready(function(){
	$(".close").click(function(){
		$(".open-img-modal").modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
	})	
});
</script>
<script type="text/javascript">
	 $(document).ready(function () {
		 $(".numberinput").forceNumeric();
	 });
	jQuery.fn.forceNumeric = function () {
     return this.each(function () {
         $(this).keydown(function (e) {
             var key = e.which || e.keyCode;

             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
             // numbers   
                 key >= 48 && key <= 57 ||
             // Numeric keypad
                 key >= 96 && key <= 105 ||
             // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
             // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
             // Home and End
                key == 35 || key == 36 ||
             // left and right arrows
                key == 37 || key == 39 ||
             // Del and Ins
                key == 46 || key == 45)
                 return true;

             return false;
         });
     });
 }
 
 
	$('.form_time').datetimepicker({format: 'H:00 P',autoclose: 1,startView: 1,minView: 1, minuteStep: 60});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMxpy_LToCwrLdVioKcs_mYmIWpItpPDA&libraries=places&callback=initMap"
        async defer></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("elements", "1", {packages: "transliteration", "nocss" : true});

function OnLoad() {                

                            var options = {
                                sourceLanguage:
                                google.elements.transliteration.LanguageCode.ENGLISH,
                                destinationLanguage:
                                [google.elements.transliteration.LanguageCode.HINDI],
                                shortcutKey: 'ctrl+g',
                                transliterationEnabled: true
                            };

                    var control = new
                    google.elements.transliteration.TransliterationControl(options);
					var translate_data = document.getElementsByClassName('hindi_trnas');
					
								control.makeTransliteratable(translate_data);
                    

    } //end onLoad function

    google.setOnLoadCallback(OnLoad);
</script> 

<?php 
	if(isset($product_img) && isset($product_img) && $product_img!=""){ 
	?>
	<script>
	var file_data = <?php echo $product_img;?>;
	var r=0;
	var i=0;
	var dropzone_array = new Array();
	var rem_array = new Array();
	Dropzone.autoDiscover = false; 
	$(function() {
			var fileList = new Array;
			var myDropzoneOptions = {
				maxFiles: 10,
				addRemoveLinks: true,
				clickable: true,
				url: base_url+admin+"/upload-images"
			}; 
			var myDropzone = new Dropzone('#drop', myDropzoneOptions);
			console.log(file_data);
			$.each(file_data, function(key,value){
				var mockFile = { name: value.name, size: value.size };

			 if(value.size!=0 && value.name!=undefined){
				
					myDropzone.options.addedfile.call(myDropzone, mockFile);
					myDropzone.options.thumbnail.call(myDropzone, mockFile, base_url+"upload/post/"+value.name);
					dropzone_array[i]=value.name;
					
					rem_array[i]={"serverFileName" : value.name, "fileName" : value.name,"fileId" : i };
					var dzs = dropzone_array.join();
					$("#product_images").val(dzs);
					 i++;
				} 
			});	
			
			myDropzone.on("success", function(file, serverFileName) {
                        fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                        dropzone_array[i]=serverFileName;
                        rem_array[i]={"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
						var dzs = dropzone_array.join();
						$("#product_images").val(dzs);
                        i++;

            });
			
			myDropzone.on("removedfile", function(file) {
				var rmvFile = "";
				
				for(f=0;f<rem_array.length;f++){

					if(rem_array[f].fileName == file.name)
					{
						rmvFile = rem_array[f].serverFileName;

					}

				}
				
				if (rmvFile){
					
					$.ajax({
						url: base_url+admin+'/delete-upload-images',
						type: "POST",
						data: { "fileList" : rmvFile },
						success: function(data) {
							var index = dropzone_array.indexOf(rmvFile);
							if (index > -1) {
							   dropzone_array.splice(index, 1);
							}
							var dzs = dropzone_array.join();
							$("#product_images").val(dzs);
							var product_images_val = $("#product_images").val();
							if(product_images_val!="")
								$("#drop").addClass("dz-started");
						} 
					});
				}
			});
	});
	</script>
	
	<?php }else{
		?>
	<script>
	var dropzone_array = new Array();
		Dropzone.autoDiscover = false;
		jQuery(function($) {
			
			var r=0;

			var i=0;
			var fileList = new Array;
			$("#drop").dropzone({
				dictDefaultMessage: 'Drop your images here or click to upload (Max 3 images)',
				maxFiles: 10,
				acceptedFiles: '.jpg,.jpeg,.png',
				addRemoveLinks: true,
				url: base_url+admin+"/upload-images",
				 init: function() {
							
					$(this.element).addClass("dropzone");

					this.on("success", function(file, serverFileName) {
						fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
						dropzone_array[i]=serverFileName;
						var dzs = dropzone_array.join();
						$("#product_images").val(dzs);
						i++;

					});
					this.on("removedfile", function(file) {
						var rmvFile = "";
						for(f=0;f<fileList.length;f++){

							if(fileList[f].fileName == file.name)
							{
								rmvFile = fileList[f].serverFileName;

							}

						}
						
						if (rmvFile){
							
							$.ajax({
								url: base_url+admin+'/delete-upload-images',
								type: "POST",
								data: { "fileList" : rmvFile },
								success: function(data) {
									var index = dropzone_array.indexOf(rmvFile);
									if (index > -1) {
									   dropzone_array.splice(index, 1);
									}
									var dzs = dropzone_array.join();
									$("#product_images").val(dzs);
								} 
							});
						}
					});

				}
			});
		});
		
	</script>
	
	<?php } ?>
<script>
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };



    var input = document.getElementById('autocomplete');

    function initMap() {
        var geocoder;
        var autocomplete;
		var lat_pos=parseFloat($('#latitude').val());
		
		if(isNaN(lat_pos))
		{
		  lat_pos=26.9619641;
		}
		
		var lng_pos=parseFloat($('#longitude').val());
		if(isNaN(lng_pos))
		{
			lng_pos=75.78079789999992;
		}
		var myLatLng = {lat: lat_pos, lng: lng_pos};

        geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
			
            center: myLatLng ,
		zoom: 13 
        });
		
		
		var marker = new google.maps.Marker({
			map: map,
			position: myLatLng,
			draggable: true
		  });
        var card = document.getElementById('locationField');
        autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        //var infowindowContent = document.getElementById('infowindow-content');
        //infowindow.setContent(infowindowContent);
        

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
			
			var lat= autocomplete.getPlace().geometry.location.lat();
			var long_l= autocomplete.getPlace().geometry.location.lng();
           $('#latitude').val(lat);
           $('#longitude').val(long_l);
			var city='';
			var landmark='';
			for (var i=0; i<place.address_components.length; i++)
			{
				if (place.address_components[i].types[1] == "locality") {
						//this is the object you are looking for City
						 city = place.address_components[i].long_name;
					}
					else if (place.address_components[i].types[0] == "administrative_area_level_2") {
						//this is the object you are looking for City
						 city = place.address_components[i].long_name;
					}
			}
			for (var i=0; i<place.address_components.length; i++)
			{
				if (place.address_components[i].types[0] == "sublocality_level_2") {
						//this is the object you are looking for City
						 landmark = place.address_components[i].long_name;
					}
					else if (place.address_components[i].types[0] == "sublocality_level_1") {
						//this is the object you are looking for City
						 landmark = place.address_components[i].long_name;
					}
			}
			
			
			$('#landmark').val(landmark);
			$('#city').val(city);
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
            fillInAddress();

        });

        function fillInAddress(new_address) { // optional parameter
            if (typeof new_address == 'undefined') {
                var place = autocomplete.getPlace(input);
            } else {
                place = new_address;
            }
            
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({
                'latLng': marker.getPosition()
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
					//console.log(results);
                    if (results[0]) {
                        //console.log(autocomplete);
                        $('#autocomplete').val(results[0].formatted_address);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
						//var landmark = results[0].address_components[2].long_name;
						
						//console.log(results);
						var city='';
						var landmark='';
						for (var i=0; i<results[0].address_components.length; i++)
						{
							if (results[0].address_components[i].types[0] == "locality") {
									//this is the object you are looking for City
									 city = results[0].address_components[i].long_name;
								}
								else if (results[0].address_components[i].types[0] == "administrative_area_level_2") {
									//this is the object you are looking for City
									 city = results[0].address_components[i].long_name;
								}
						}
						for (var i=0; i<results[0].address_components.length; i++)
						{
							if (results[0].address_components[i].types[2] == "sublocality_level_2") {
									//this is the object you are looking for City
									 landmark = results[0].address_components[i].long_name;
								}
								else if (results[0].address_components[i].types[2] == "sublocality_level_1") {
									//this is the object you are looking for City
									 landmark = results[0].address_components[i].long_name;
								}
								
						}
						console.log(results[0].address_components);
						console.log(city);
						console.log(landmark);
						$('#landmark').val(landmark);
						$('#city').val(city);
                        // google.maps.event.trigger(autocomplete, 'place_changed');
                        fillInAddress(results[0]);
                    }
                }
            });
        });
    }
</script>
</body>
</html>