var base_url=$("#base_url").val();
var admin=$("#admin").val();
var myTable;
var oTable = $('#myTable');
var valid = {
			 

			ajaxError:function(jqXHR,exception) {
				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				return msg;
			},
			
			phonenumber:function(inputtxt) {
				var phoneno = /^\d{10}$/;  
				return phoneno.test(inputtxt);
			},
			validPhone:function(inputtxt) {
				var phoneno = /^[0-9]\d{2,4}-\d{6,8}$/;  
				return phoneno.test(inputtxt);
			},
			validURL:function(inputtxt) {
				var re = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g;
				return re.test(inputtxt);
			},
			validateEmail:function(email) {
				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			},
			validFBurl:function(enteredURL) {
				var FBurl = /^(http|https)\:\/\/www.facebook.com\/.*/i;
				return FBurl.test(enteredURL);
			},
			validTwitterurl:function(enteredURL) {
				var twitterURL = /^(http|https)\:\/\/twitter.com\/.*/i;
				return twitterURL.test(enteredURL);
			},
			validYoutubeURL:function(enteredURL) {
				var youtubeURL = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
				return youtubeURL.test(enteredURL);
			},
			validGPlusURL:function(enteredURL) {
				var gPlusURL = /\+[^/]+|\d{21}/;
				return gPlusURL.test(enteredURL);
			},
			validInstagramURL:function(enteredURL) {
				var instagramURL = /(?:(?:http|https):\/\/)?(?:www.)?(?:instagram.com|instagr.am)\/([A-Za-z0-9-_\.]+)/im;
				return instagramURL.test(enteredURL);
			},
			validateExtension:function(val,type) {
				if(type==1)
					var re = /(\.jpeg|\.jpg|\.png)$/i;
				else if(type==2)
					var re = /(\.jpeg|\.jpg|\.png\.pdf|\.doc|\.xml|\.docx|\.PDF|\.DOC|\.XML|\.DOCX|\.xls|\.xlsx)$/i;
				else if(type==3)
					var re = /(\.jpeg|\.jpg|\.pdf|\.docx|\.PDF|\.DOC|\.DOCX)$/i;
				return re.test(val)
			},
			snackbar:function(msg) {
				$("#snackbar").html(msg).fadeIn('slow').delay(3000).fadeOut('slow');
			},
			snackbar2:function(msg) {
				 $("#snackbar").html(msg).fadeIn('slow');
			},
			error:function(msg) {
				return "<p class='alert alert-danger'><strong>Error </strong>"+msg+"</p>";
			},
			success:function(msg) {
				return "<p class='alert alert-success'>"+msg+"</p>";
			},
			info:function(msg) {
				return "<p class='alert alert-info'>"+msg+"</p>";
			}
	};
	
jQuery(function($) {
	"use strict";
	
	$(document).on('click', '.copyData', function(e){
		var copyText = $(this).data('text');
		var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val(copyText).select();
		  document.execCommand("copy");
		  $temp.remove();
		  valid.snackbar('Copied to Clipboard');
	});
	
	$('.select2box').select2();
	$('.boot_select').selectpicker()
	
	$('#myTable').DataTable({ "bRetrieve": true });
	
	$('body').tooltip({
		selector: '.lp_cat_a'
	});
	
	$('.link_scroll').click(function() {	
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {		
			var target = $(this.hash);		
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');		
			if (target.length) {			
				$('html, body').animate({		
					scrollTop: target.offset().top - 70			
				}, 1500);			
				return false;	
			}		
		}	
	});
	
	var x=0;
	var y=0;
	
	$(document).on({
		mouseenter:function(e) {

			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;
			$(this).css('z-index','15')
			.children("div.img_tooltip")
			.css({'bottom': -10,'left': x,'display':'block'});
			
		},
		mousemove:function(e) {
			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;
			$(this).children("div.img_tooltip").css({'bottom': -10,'left': x + 20});
			
		},
		mouseleave:function() {
			
			$(this).css('z-index','1')
			.children("div.img_tooltip")
			.animate({"opacity": "hide"}, "fast");
		}
	}, "div.thumbnail-item");	
	
	$(document).on('click', '.blockUnblock', function(e){
		var id = $(this).attr('id');
        var myArray = id.split('-');
		var table_id=myArray[3];
	
        $.ajax({
            type: "POST",
            url:  base_url + 'block-data-function',
            data: 'id=' + myArray[1]+"&table="+myArray[2]+"&table_id="+table_id+"&status_name="+myArray[4],
            success: function(data) 
            {	
		
				
				if(myArray[0]=='danger')
                {
                    $("#"+id).html('<i class="fa fa-ban text-success m-r-10"></i>');
					
                   $("#"+id).attr('id','success-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                else
                {
					$("#"+id).html('<i class="fa fa-ban text-danger m-r-10"></i>');
					$("#"+id).attr('id','danger-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                $("#msg").html(data);
                $("#msg").fadeIn('slow').delay(5000).fadeOut('slow');
            },
			error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
        });
		
		e.preventDefault();	
    }); 
	
	$(document).on('click', '.meBlockUnblock', function(e){
		var id = $(this).attr('id');
        var myArray = id.split('-');
		var table_id=myArray[3];
	
        $.ajax({
            type: "POST",
            url:  base_url + 'block-data-function',
            data: 'id=' + myArray[1]+"&table="+myArray[2]+"&table_id="+table_id+"&status_name="+myArray[4],
            success: function(data) 
            {	
		
				
				if(myArray[0]=='danger')
                {
                    $("#"+id).html('<i class="fa fa-ban text-success m-r-10"></i>');
					
                   $("#"+id).attr('id','success-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                else
                {
					$("#"+id).html('<i class="fa fa-ban text-danger m-r-10"></i>');
					$("#"+id).attr('id','danger-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                $("#me_msg").html(data);
                $("#me_msg").fadeIn('slow').delay(5000).fadeOut('slow');
            },
			error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#me_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
        });
		
		e.preventDefault();	
    });
	
	$("#loginform").submit(function(e) {	
		var username = $("#name").val();
		var password = $("#password").val();
		if(username == ''){
			$("#loginmsg").html(valid.error('Please enter username')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(password == ''){
			$("#loginmsg").html(valid.error('Please enter password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else{
		$("#loginmsg").html(valid.info("Authenticating.."));
        $("#submitBtn").attr("disabled",true);	   
		var changeBtn = $("#submitBtn").html();
		$("#submitBtn").html("Authenticating..");
			$.ajax({ 
				url: base_url + 'loginCheck',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (data)
				{	
					if(data.status == "success") 
					{
						$("#loginmsg").html(data.msg);
						var url = base_url + admin + "/dashboard";
						$(location).attr('href', url);
					}else{
						$("#loginmsg").html(data.msg).fadeIn('slow').delay(2500).fadeOut('slow');
						$("#submitBtn").attr("disabled",false);
						$("#submitBtn").html(changeBtn);
					}
				},
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#loginmsg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					$("#submitBtn").attr("disabled",false);
					$("#submitBtn").html(changeBtn);
				}
			});
		}
        e.preventDefault();	
    });
	
	$("#recoverform").submit(function(e) {	
		$("#recoverSubmitBtn").attr("disabled",true);	   
		var changeBtn = $("#recoverSubmitBtn").html();
		$("#recoverSubmitBtn").html("Sending..");
		$.ajax({ 
			url: base_url + 'forgot-password',
            type: 'POST',
            data: new FormData( this ),
			processData: false,
			contentType: false,
			dataType: "json", 
            success: function (data)
            {	
				
				if(data.status == "success") 
				{
                    $("#recovermsg").html(data.msg);
                    $("#recoverform")[0].reset();
                }else{
                    $("#recovermsg").html(data.msg);
                    $("#recovermsg").fadeIn('slow').delay(2500).fadeOut('slow');
                   
                }
				
				$("#recoverSubmitBtn").attr("disabled",false);
				$("#recoverSubmitBtn").html(changeBtn);
            },
			error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#recovermsg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					$("#recoverSubmitBtn").attr("disabled",false);
					$("#recoverSubmitBtn").html(changeBtn);
			} 
        });
        e.preventDefault();	
    });
	
	$("#pageFrm").submit(function(e) {
		var page_title = $("#page_title").val();
		var seo_title = $("#seo_title").val();
		var web_url = $("#web_url").val();
		var focus_keyword = $("#focus_keyword").val();
		var meta_keywords = $("#meta_keywords").val();
		var meta_description = $("#meta_description").val();
		var open_graph = $("#open_graph").val();
		if(page_title == ''){
			$('#alert_msg').html(valid.error('Please enter page title')).fadeIn('slow').delay(2000).fadeOut('slow');
		}else if(web_url == ''){
			$('#alert_msg').html(valid.error('Please enter web URL')).fadeIn('slow').delay(2000).fadeOut('slow');
		}else{
		
			$("#submitBtn").attr("disabled",true);	   
			var changeBtn = $("#submitBtn").html();
			$("#submitBtn").html("Submitting..");
			$.ajax({ 
				url: base_url + 'submit-page',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (data)
				{	
					if(data.status == "success") 
					{
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2000).fadeOut('slow');
						$('#pageFrm')[0].reset();
					}else if(data.status == "update"){
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2000).fadeOut('slow');	
					}else{
						$("#old_open_graph_image").val(data.open_graph_image);
                        $("#ajax_open_graph_image").attr('src', base_url + 'upload/menu_images/' + data.open_graph_image);
						$("#alert_msg").html(data.msg);
						$("#alert_msg").fadeIn('slow').delay(2500).fadeOut('slow');
					   
					}
					$("#submitBtn").attr("disabled",false);
					$("#submitBtn").html(changeBtn);
				},
				error: function (jqXHR, exception) {
						var msg = valid.ajaxError(jqXHR,exception);
						$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
						$("#submitBtn").attr("disabled",false);
						$("#submitBtn").html(changeBtn);
				}
			});
		}
        e.preventDefault();	
    });
	
	$("#updatepass").submit(function(e) 
	{
		var oldpass = $("#oldpass").val();
		var newpass = $("#newpass").val();
		var retypepass = $("#retypepass").val();
		
		if(oldpass == '')
		{
			$("#updatepassmsg").html(valid.error('Please enter old password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}
		else if(newpass == '')
		{
			$("#updatepassmsg").html(valid.error('Please enter new password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}
		else if(retypepass == '')
		{
			$("#updatepassmsg").html(valid.error('Please enter confirm password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}
		else
		{
			$("#submitBtn").attr("disabled",true);	   
			var changeBtn = $("#submitBtn").html();
			$("#submitBtn").html("Submitting..");
			$.ajax({
				type: "POST",
				url: base_url + "update-password",
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (data) {
					if (data.status == 'success'){
						$("#updatepassmsg").html(valid.success("Password updated successfully!"));
						$("#updatepassmsg").fadeIn('slow').delay(5000).fadeOut('slow');
						$('#updatepass')[0].reset();
					}else{
						$("#updatepassmsg").html(data.msg);
						$("#updatepassmsg").fadeIn('slow').delay(5000).fadeOut('slow');
					}
					$("#submitBtn").attr("disabled",false);
					$("#submitBtn").html(changeBtn);
				},
				error: function (jqXHR, exception) {
						var msg = valid.ajaxError(jqXHR,exception);
						$("#updatepassmsg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
						$("#submitBtn").attr("disabled",false);
						$("#submitBtn").html(changeBtn);
				}
			});
		}
		e.preventDefault();	
    });
	
	$(document).on('keypress', '.mobile-valid', function(e){
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		// for 10 digit number only
		if ($this.val().length > 9) {
			e.preventDefault();
			return false;
		}
		if (e.charCode < 54 && e.charCode > 47) {
			if ($this.val().length == 0) {
				e.preventDefault();
				return false;
			} else {
				return true;
			}

		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	
	
	$(document).on('keypress', '.name-valid', function(e){
		if (event.charCode!=0) {
			var regex = new RegExp("^[a-zA-Z ]*$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			if (!regex.test(key)) {
				event.preventDefault();
				return false;
			}
		}
	});
	
	
	$(document).on('click', '.openPopupMain', function(e){
		
		var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#mainCategoryModal').modal({show:true});
			OnLoad();
        });
		
    }); 
	
	$(document).on('click', '.openPopupFeedback', function(e){
		
		var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#feedbackModal').modal({show:true});
			OnLoad();
        });
		
    }); 
	
	if(localStorage.alert_msg){
		$("#alert_msg").html(localStorage.getItem("alert_msg")).fadeIn('slow').delay(2500).fadeOut('slow');
		localStorage.removeItem('alert_msg');
	}
	
});	

function getValue() {
	var array = []; 
	$('.test:checked').each(function(){
		array.push($(this).val());
	});
	$('#radio_button').val(array);
}	
function removeCustomIcon(id)
	{
		var custom_field_id=$("#custom_field_id").val();
		var values = custom_field_id.split(',');
		for(var i = 0 ; i < values.length ; i++) 
		{
			if(values[i] == id) {
			  values.splice(i, 1);
			  values.join(',');
			}
		}
		$("#custom_field_id").val(values);
		$("."+id).remove();
	}
function blockFunctionData(id) 
{
	
		var myArray = id.split('-');
		var table_id=myArray[3];
	
        $.ajax({
            type: "POST",
            url:  base_url + 'block-data-function',
            data: 'id=' + myArray[1]+"&table="+myArray[2]+"&table_id="+table_id+"&status_name="+myArray[4],
            success: function(data) 
            {	
		
				
				if(myArray[0]=='danger')
                {
                    $("#"+id).html('<i class="fa fa-ban text-success m-r-10"></i>');
					
                   $("#"+id).attr('id','success-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                else
                {
					$("#"+id).html('<i class="fa fa-ban text-danger m-r-10"></i>');
					$("#"+id).attr('id','danger-'+myArray[1]+'-'+myArray[2]+'-'+table_id+'-'+myArray[4]);
                }
                $("#msg").html(data);
                $("#msg").fadeIn('slow').delay(5000).fadeOut('slow');
            },
			error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
        });
	return false;
}

function deleteConfrim(id)
{
	$("#delete_id").val(id);
	
	$("#block_con").html("Are you sure want to delete this item");
	$('#delete-confirm').modal({backdrop: 'static'});
}

function deleteFunction()
{
	var id = $("#delete_id").val();
	var array=id.split("-");
	
		$.ajax( {
			type: 'POST',
			url: base_url +'delete-data',
			data: 'id='+id, 
			success: function(result) 
			{
				$("#msg").html(result);
				$("#"+array[0]).hide();
			}
			,
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
		});
}

var _validFileExtensions1 = [".jpeg", ".jpg", ".png"]; 
function ValidateSingleInput1(oInput,FileExtensions) { 
	if(FileExtensions==1)
	{
		var _validFileExtensions1 = [".jpeg", ".jpg", ".png"]; 
	}else if(FileExtensions==2){
		var _validFileExtensions1 = [".zip",".pdf",".jpeg", ".jpg", ".png"]; 
	}
	
   if (oInput.type == "file") {     
   var sFileName1 = oInput.value;    
   if (sFileName1.length > 0) {     
   var blnValid1 = false;          
   for (var j = 0; j < _validFileExtensions1.length; j++) 
   {  
   var sCurExtension1 = _validFileExtensions1[j];    
   if (sFileName1.substr(sFileName1.length - sCurExtension1.length, sCurExtension1.length).toLowerCase() == sCurExtension1.toLowerCase())
	   {                  
			blnValid1 = true; 
		 
		
			break;            
	   }          
   }        
   if (!blnValid1)
	   {         
   snackbar("Sorry, file is invalid");        
   oInput.value = "";             
   return false;          
   }     
   }  
   }	
   return true;
}

	
function getUrl(val, type) {

	$.ajax({
		type: 'POST',
		url: base_url + 'get-url',
		data: {val: val,type: type},
		dataType: "json", 
		success: function(data) {
			if(data.status=="success"){
				if(type=="blog")
					$("#url").val(data.url);
				if(type=="gallery_category")
					$("#gallery_category_url").val(data.url);
				if(type=="news_category")
					$("#news_category_url").val(data.url);
				if(type=="news")
					$("#news_url").val(data.url);
			}else{
				$("#alert_msg").html(valid.error("URL already exists.")).fadeIn('slow').delay(5000).fadeOut('slow');
			}
		   
				
		},error: function(jqXHR, exception) {
			var msg = valid.ajaxError(jqXHR,exception);
			$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
			
		} 
	});
}	

function snackbar(msg) {
    $("#snackbar").html(msg).fadeIn('slow').delay(6000).fadeOut('slow');
}
function snackbar2(msg) {
    $("#snackbar").html(msg).fadeIn('slow');
}

function mailReply(name, mailId)
{
	$("#mailReplyModal").modal("show");
	$("#m_name").val(name);
	$("#email_id").val(mailId);
}

function validateImageExtensionOther(val,id_name)
{
	if(id_name==1)
		var fileUpload = document.getElementById("category_icon");
	if(id_name==2)
		var fileUpload = document.getElementById("subcategory_icon");
	if(id_name==3)
		var fileUpload = document.getElementById("sub_subcategory_icon");
	if(id_name==4)
		var fileUpload = document.getElementById("child_sub_subcategory_icon");
	if(id_name==5)
		var fileUpload = document.getElementById("product_cover_image");



	if(!valid.validateExtension(val,1)) 
    {            
		valid.snackbar('Invalid file type (only .jpeg,.jpg,.png allowed)');
		
		return false;
    }
 
        //Check whether HTML5 is supported.
       else if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
   
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
					var file = fileUpload.files[0];//get file   
					var sizeKB = file.size / 1024;
                    var height = this.height;
                    var width = this.width;
                    if (height > 256 || width > 256) {
						valid.snackbar('Height and Width must not exceed 256px.');
						$("#category_icon").val('');
						$("#subcategory_icon").val('');
						$("#sub_subcategory_icon").val('');
                        return false;
                    }
					
					if(sizeKB>30)
					{
						valid.snackbar('Icon size must not exceed 30Kb.');
						$("#category_icon").val('');
						$("#subcategory_icon").val('');
						$("#sub_subcategory_icon").val('');
                        return false;
					}
					
						$("#submitBtn").attr("disabled",false);
					
                    return true;
                };
 
            }
        }  
}	
function editvalidateImageExtensionOther(val,id_name)
{
	if(id_name==1)
		var fileUpload = document.getElementById("u_category_icon");
	if(id_name==2)
		var fileUpload = document.getElementById("u_subcategory_icon");
	if(id_name==3)
		var fileUpload = document.getElementById("u_sub_subcategory_icon");
	if(id_name==4)
		var fileUpload = document.getElementById("child_sub_subcategory_icon");
	if(id_name==5)
		var fileUpload = document.getElementById("product_cover_image");



	if(!valid.validateExtension(val,1)) 
    {            
		valid.snackbar('Invalid file type (only .jpeg,.jpg,.png allowed)');
		
		return false;
    }
 
        //Check whether HTML5 is supported.
       else if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
   
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
					var file = fileUpload.files[0];//get file   
					var sizeKB = file.size / 1024;
                    var height = this.height;
                    var width = this.width;
                    if (height > 256 || width > 256) {
						valid.snackbar('Height and Width must not exceed 256px.');
						$("#u_category_icon").val('');
						$("#u_subcategory_icon").val('');
						$("#u_sub_subcategory_icon").val('');
                        return false;
                    }
					
					if(sizeKB>30)
					{
						valid.snackbar('Icon size must not exceed 30Kb.');
						$("#u_category_icon").val('');
						$("#u_subcategory_icon").val('');
						$("#u_sub_subcategory_icon").val('');
                        return false;
					}
					
						$("#submitBtn").attr("disabled",false);
					
                    return true;
                };
 
            }
        }  
}	
			
function getStrUrl(val) {
	
	
    $.ajax({
        type: 'POST',
        url: base_url + 'get-url',
        data: {
            val: val
          },
        success: function(result) {
			$("#url").val(result);
        }
    });
 
}

function validExtension(val,type)
{
	if(!valid.validateExtension(val,type)) 
    {            
		valid.snackbar('Invalid file type (only .jpeg,.jpg,.png allowed)');
		$(".uimg").val(''); 
		return false;
    }
}

function getBusinessName(work_profile,type)
{
	if(type == 1){
		if(work_profile == 4){
			$("#business_name").val('Ezzeex');
			$("#business_name").attr('readonly',true);
		}else{
			$("#business_name").val('');
			$("#business_name").attr('readonly',false);
		}
	}else{
		if(work_profile == 4){
			$("#u_business_name").val('Ezzeex');
			$("#u_business_name").attr('readonly',true);
		}else{
			$("#u_business_name").val('');
			$("#u_business_name").attr('readonly',false);
		}
	}
}

function checkWorkProfile(work_profile,type){
	if(type == 1){
		if(work_profile == 2){
			$('#work_profile').attr('disabled', true);
			$('#business_name').attr('disabled', true);
		}
		else{
			$('#work_profile').attr('disabled', false);
			$('#business_name').attr('disabled', false);
		}
	}
}

function taskAssginModal(order_id)
{
	$.ajax({
		type: 'POST',
		url: base_url + 'get-order-details',
		data: {order_id:order_id},
		dataType: "json",
		success: function(data) {
			$("#word").val(data.word);
			$("#currency").val(data.currency);
			$("#quoted_amount").val(data.full_payment);
			$("#manual_amount").val(data.manual_amount);
			$("#order_id").val(order_id);
			$("#task_order_number").html("( Order Number: "+order_id+")");
			$('#task-assign-modal').modal({backdrop: 'static'});
		}
	});
}

function getExpertDetails(employee_id)
{
	if(employee_id == "")
	{
		$("#email").val('');
		$("#country").val('');
		$("#work_profile").val('');
	}
	else
	{
		$.ajax({
			type: 'POST',
			url: base_url + 'get-expert-details',
			data: {employee_id:employee_id},
			dataType: "json",
			success: function(data) {
				$("#email").val(data.email);
				$("#country").val(data.country);
				$("#work_profile").val(data.work_profile);
			}
		});
	}
}

function copyOrderId()
{
	$('#snackbar').show();
	$("#snackbar").html("Copied to Clipboard").fadeIn('slow').delay(5000).fadeOut('slow');
	copyToClipboard(document.getElementById("copy_order_id"));
	
}

function copyAllDetails()
{
	$('#snackbar').show();
	$("#snackbar").html("Copied to Clipboard").fadeIn('slow').delay(5000).fadeOut('slow');
	copyToClipboard(document.getElementById("ord_details"));
}

function copyToClipboard(elem) {
	
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

function payTdsRate(pay_tds)
{
	var pay_tds = $("input[name='pay_tds']:checked").val();
	if(pay_tds == 1){
		$(".dis_tds_rate").css("display","block");
	}else{
		$(".dis_tds_rate").css("display","none");
	}
}

function getEmployee(type)
{
	$("#email").val('');
	$("#phone").val('');
	$("#employee_id").html('<option value="">Getting Recordes...</option>');
	$.ajax({
		type: 'POST',
		url: base_url + 'get-employee',
		data: {type:type},
		dataType: "json",
		success: function(data) {
			$("#employee_id").html(data.list);
		}
	});
}

function getEmployeeDetails(id)
{
	var type = $("#select_type").val();
	$.ajax({
		type: 'POST',
		url: base_url + 'get-employee-details',
		data: {id:id,type:type},
		dataType: "json",
		success: function(data) {
			$("#email").val(data.email);
			$("#phone").val(data.phone);
		}
	});
}

function getSubCat(id)
{
	var value=$("#category_name").val();
	if(value==0)
	{
		$("#sub_category_name").html('<option value="0">All</option>');
		$("#child_category_name").html('<option value="0">All</option>');
		$("#child_sub_category_name").html('<option value="0">All</option>');
	}
	else
	{
		$("#sub_category_name").html('<option value="">Loading Sub Category...</option>');
		$.ajax({
			url: base_url + 'get-sub-cat-name',
			type: 'POST',
			data: {id:id},
			dataType: "json",
			success: function (data)
			{
				$("#sub_category_name").html('');
				if(data.getSubCategory!='')
				{
					
					$("#sub_category_name").append('<option value="">Select Sub Category</option><option value="0">All</option>');
					$.each(data.getSubCategory, function (key, val) {
						$("#sub_category_name").append('<option value="'+val.subcategory_id+'">'+val.subcategory_name+'</option>');
					});
				}
				else
				{
					$("#sub_category_name").html('<option value="">Select Sub Category</option><option value="0">All</option>');
				}
			}
		});
	}
}

function getChildCat(id)
{
	var category_name = $('#category_name').val();
	var value = $('#sub_category_name').val();
	if(value==0)
	{
		$("#child_category_name").html('<option value="0">All</option>');
		$("#child_sub_category_name").html('<option value="0">All</option>');
	}
	else
	{
		$("#child_category_name").html('<option value="">Loading Child Category...</option>');
		$.ajax({
			url: base_url + 'get-child-cat-name',
			type: 'POST',
			data: {id:id,category_name:category_name},
			dataType: "json",
			success: function (data)
			{
				$("#child_category_name").html('');
				if(data.getChildCategory!='')
				{
					
					$("#child_category_name").append('<option value="">Select Child Category</option><option value="0">All</option>');
					$.each(data.getChildCategory, function (key, val) {
						$("#child_category_name").append('<option value="'+val.sub_subcategory_id+'">'+val.sub_subcategory_name+'</option>');
					});
				}
				else
				{
					$("#child_category_name").html('<option value="">Select Child Category</option><option value="0">All</option>');
				}
			}
		});
	}
}

function getCurrentSubCat(val)
{
	/* val=$("#category_id").val(); */
	if(val!='')
	{
	$("#subcategory_id").html('<option>Getting value.......</option>');
		$.ajax( {
			  url:base_url+'get-current-subcategory',
			  type: 'POST',
			   data: {val:val},
				success: function(data) 
			   { 
					
					$("#subcategory_id").html(data);
					if(localStorage.subcategory_id){
						$('#subcategory_id').val(localStorage.subcategory_id);
						getCurrentSubSubCat(localStorage.subcategory_id);
						localStorage.removeItem('subcategory_id');
					}
					
					 
			   },
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
				});
				return false;
	}
}
function getSubCatCustom(val)
{
	if(val!='')
	{
		$.ajax( {
			  url:base_url+'get-sub-cat-custom',
			  type: 'POST',
			   data: {val:val},
				success: function(data) 
			   { 
					
					$("#subcategory_id").html(data);
					getChildCatCustom();
					 
			   },
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
				});
				return false;
	}
}
function getChildCatCustom()
{
	var val=$("#subcategory_id").val();
	if(val!='')
	{
		 $(".overlay").show();
		$.ajax( {
			  url:base_url+'get-child-cat-custom',
			  type: 'POST',
			   data: {val:val},
				success: function(data) 
			   { 
			    $(".overlay").hide();
					$("#child_category_id").html(data);
			   },
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
				});
				return false;
	}
}
function createCustomFieldHtml(val)
{
	$("#field_name_div").show();
	$("#field_type_dv").show();
	$("#custom_field").html('');
	if(val==2)
	{
		$("#custom_field").html("<div class='form-body'><div class='form-group'><label>Radio Option</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div></div><div class='form-body'><div class='form-group'><label>Radio Option(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div>");
		$("#field_type_dv").hide();
		///Radio
	}
	else if(val==1)
	{
		$("#field_type_dv").show();
	}
	else if(val==3)
	{
		$("#custom_field").html("<div class='form-body'><div class='form-group'><label>Checkbox Option</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div><div class='form-group'><label>Checkbox Option(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div>");
		$("#field_type_dv").hide();
		///Checkbox
	}
	else if(val==4)
	{
		$("#custom_field").html("<div class='form-body'><div class='form-group'><label>Dropdown List</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div><div class='form-group'><label>Dropdown List(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div>");
		///DropDown
		$("#field_type_dv").hide();
	}
	else if(val=='')
	{
		$("#field_name_div").hide();
		$("#field_type_dv").hide();
	}
	OnLoad();
}
function createCustomFieldPost(val)
{
	$("#field_name_div").show();
	$("#field_type_dv").show();
	$("#custom_field").html('');
	if(val==2)
	{
		$("#custom_field").html("<div class='row'><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Radio Option</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div></div></div><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Radio Option(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div></div></div>");
		$("#field_type_dv").hide();
		///Radio
	}
	else if(val==1)
	{
		$("#field_type_dv").show();
	}
	else if(val==3)
	{
		$("#custom_field").html("<div class='row'><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Checkbox Option</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div></div></div><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Checkbox Option(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div></div></div>");
		$("#field_type_dv").hide();
		///Checkbox
	}
	else if(val==4)
	{
		$("#custom_field").html("<div class='row'><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Dropdown List</label><input type='text' class='form-control' id='field_val' name='field_val' placeholder='Enter Comma-separated values.' /></div></div></div><div class='col-lg-4'><div class='form-body'><div class='form-group'><label>Dropdown List(In Hindi)</label><input type='text' class='form-control hindi_trnas' id='field_val_hindi' name='field_val_hindi' placeholder='Enter Comma-separated values.' /></div></div></div></div>");
		///DropDown
		$("#field_type_dv").hide();
	}
	else if(val=='')
	{
		$("#field_name_div").hide();
		$("#field_type_dv").hide();
	}
	OnLoad();
}
function checkMobile(val)
{
	if(val!='')
	{
		$.ajax( {
			  url:base_url+'check-user-mobile',
			  type: 'POST',
			   data: {val:val},
			   dataType: "json",
				success: function(data) 
			   {
				   if(data.status=="fail")
				   {
						valid.snackbar("Mobile number already exist");
				   }
			   },
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
				});
				return false;
	}
}
function getExistContactDetail(val)
{
	if(val!='')
	{
		$.ajax( {
			  url:base_url+'get-contact-detail',
			  type: 'POST',
			   dataType: "json",
			   data: {val:val},
				success: function(data) 
			   { 
					$("#exist_mobile").val(data.mobile);
					$("#exist_name").val(data.name);
			   },
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					
				}
				});
				return false;
	}
}
function getRecordByDate()
{
	var ads_by = $("#ads_by").val();
	$.ajax(
	{
		type: "POST",	
		url: base_url + admin + '/dashboard',
		data:{ads_by:ads_by},
		success: function(data) 
		{
			location.reload();
		},
	});
}	