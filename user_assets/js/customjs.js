var base_url=$("#base_url").val();
var user=$("#user").val();
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
	
	$("#registerfrm").submit(function(e) {
		var name = $("#name").val();
		var email = $("#email").val();
		var fb_url = $("#fb_url").val();
		var btc_address = $("#btc_address").val();
		var country_id = $("#country_id").val();
		var sponser_id = $("#sponser_id").val();
		var password = $("#password").val();
		var confirm_password = $("#confirm_password").val();
		var image_code = $("#image_code").val();
		
		if(name == "" || name.charAt(0)==' '){
			$("#alert_msg").html(valid.error('Please enter name')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(email == ""){
			$("#alert_msg").html(valid.error('Please enter email')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(!valid.validateEmail(email)){
			$("#alert_msg").html(valid.error('Please enter valid email')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(fb_url == ""){
			$("#alert_msg").html(valid.error('Please enter facebook url')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(!valid.validFBurl(fb_url)){
			$("#alert_msg").html(valid.error('Please enter valid facebook url')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(btc_address == ""){
			$("#alert_msg").html(valid.error('Please enter btc address')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(country_id == ""){
			$("#alert_msg").html(valid.error('Please select country')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(password == ""){
			$("#alert_msg").html(valid.error('Please enter password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(confirm_password == ""){
			$("#alert_msg").html(valid.error('Please enter confirm password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(confirm_password != password){
			$("#alert_msg").html(valid.error('Confirm password not matched')).fadeIn('slow').delay(2500).fadeOut('slow');
		}
		else
		{
			$("#registerBtn").attr("disabled",true);	   
			var changeBtn = $("#registerBtn").html();
			$("#registerBtn").html("Submitting..");
			$.ajax({
				url: base_url + 'register-user',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (data)
				{
					if(data.status=="success")
					{
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2500).fadeOut('slow');
						$("#registerfrm")[0].reset();
					}
					else
					{
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2500).fadeOut('slow');
						refreshCaptcha();
					}
					$("#registerBtn").attr("disabled",false);
					$("#registerBtn").html(changeBtn);
				},
				error: function (jqXHR, exception) {
					var msg = valid.ajaxError(jqXHR,exception);
					$("#alert_msg").html(valid.error(msg)).fadeIn('slow').delay(5000).fadeOut('slow');
					$("#registerBtn").attr("disabled",false);
					$("#registerBtn").html(changeBtn);
				}
			});
		}
		e.preventDefault();
	});     
	
	$("#loginFrm").submit(function(e) {
		var name = $("#name").val();
		var password = $("#password").val();
		
		if(name == ""){
			$("#alert_msg").html(valid.error('Please enter email.')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(password == ""){
			$("#alert_msg").html(valid.error('Please enter password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}
		else
		{
			$("#submitBtn").attr("disabled",true);	   
			var changeBtn = $("#submitBtn").html();
			$("#submitBtn").html("Authentication..");
			$.ajax({
				url: base_url + 'user-login',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (data)
				{
					if(data.status=="success")
					{
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2500).fadeOut('slow');
						var url = base_url + user +"/dashboard";
						$(location).attr('href', url);
					}
					else
					{
						$("#alert_msg").html(data.msg).fadeIn('slow').delay(2500).fadeOut('slow');
						refreshCaptcha();
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
	
	$("#to-recover").on("click", function() {
		$("#loginFrm").slideUp(), $("#recoverform").fadeIn('slow');
    });
	
	$("#to-login").on("click", function() {
        $("#recoverform").slideUp(), $("#loginFrm").fadeIn('slow');
    });
	
	$("#recoverform").submit(function(e) {
		var email = $("#email").val();
		if(email == ""){
			$("#recovermsg").html(valid.error('Please enter enter')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else{
		
			$("#recoverSubmitBtn").attr("disabled",true);	   
			var changeBtn = $("#recoverSubmitBtn").html();
			$("#recoverSubmitBtn").html("Sending..");
			$.ajax({ 
				url: base_url + 'user-forgot-password',
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
		}
        e.preventDefault();	
    });
	
	$("#passwordResetFrm").submit(function(e) {
		
		var password = $("#password").val();
		var conf_password = $("#conf_password").val();
		
		if(password == ""){
			$("#alert_msg").html(valid.error('Please enter password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(conf_password == ""){
			$("#alert_msg").html(valid.error('Please enter confirm password')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else if(conf_password != password){
			$("#alert_msg").html(valid.error('Confirm password not matched')).fadeIn('slow').delay(2500).fadeOut('slow');
		}else{
			$("#submitBtn").attr("disabled",true);	   
			var changeBtn = $("#submitBtn").html();
			$("#submitBtn").html("Submitting..");
			$.ajax({ 
				url: base_url + 'user-password-reset',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: "json", 
				success: function (data)
				{
					if(data.status == "success") 
					{
						$("#alert_msg").html(data.msg);
						$("#passwordResetFrm")[0].reset();
					}else{
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
	
	$("#updatepass").submit(function(e){
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
			$("#submitBtn").html("Updating..");
			$.ajax({
				type: "POST",
				url: base_url + "update-user-password",
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
	
});	
function snackbar(msg) {
    $("#snackbar").html(msg).fadeIn('slow').delay(6000).fadeOut('slow');
}
function snackbar2(msg) {
    $("#snackbar").html(msg).fadeIn('slow');
}

function refreshCaptcha(){
	var img = document.images['captchaimg3']; 
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}