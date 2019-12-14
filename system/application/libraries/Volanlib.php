<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Volanlib {
	
	public function __construct() 
	{
		$CI =& get_instance();
		$CI->cur_date = date("Y-m-d");
		$CI->insert_date = date("Y-m-d H:i:s");
		$CI->ip = $_SERVER['REMOTE_ADDR'];
		$CI->tb2="tb_admin";
		$CI->tb3="tb_country";
		$CI->tb4="tb_state";
		$CI->tb5="tb_district";
		$CI->tb6="tb_user";
		$CI->tb7="tb_ph_plans";
		$CI->present_date = date("Y-m-d");
		$CI->insert_date2=date("Y-m-d");
	}
	
		
	function error($msg)
	{
		return "<p class='alert alert-danger'><strong>Error </strong>".$msg."</p>";
	}

	function success($msg)
	{
		return "<p class='alert alert-success'>".$msg."</p>";
	}
	
	function uniqRandom($lenght = 7)
	{
		srand ((double) microtime() * 1000000);
		$random = rand();
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num_len=$lenght-2;
		$rand_str = substr(str_shuffle($characters),0,2);
		return $rand_str.substr($random,0,$num_len);
		
	}
	
	function getRandomString($length = 40) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
    }


	public function time_ago_in_php($timestamp){
  
	  /* date_default_timezone_set("Asia/Kolkata"); */         
	  $time_ago        = strtotime($timestamp);
	  $current_time    = time();
	  $time_difference = $current_time - $time_ago;
	  $seconds         = $time_difference;
	  
	  $minutes = round($seconds / 60); // value 60 is seconds  
	  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
	  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
	  $weeks   = round($seconds / 604800); // 7*24*60*60;  
	  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
	  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
					
	  if ($seconds <= 60){

		return "Just Now";

	  } else if ($minutes <= 60){

		if ($minutes == 1){

		  return "one minute ago";

		} else {

		  return "$minutes minutes ago";

		}

	  } else if ($hours <= 24){

		if ($hours == 1){

		  return "an hour ago";

		} else {

		  return "$hours hrs ago";

		}

	  } else if ($days <= 7){

		if ($days == 1){

		  return "yesterday";

		} else {

		  return "$days days ago";

		}

	  } else if ($weeks <= 4.3){

		if ($weeks == 1){

		  return "a week ago";

		} else {

		  return "$weeks weeks ago";

		}

	  } else if ($months <= 12){

		if ($months == 1){

		  return "a month ago";

		} else {

		  return "$months months ago";

		}

	  } else {
		
		if ($years == 1){

		  return "one year ago";

		} else {

		  return "$years years ago";

		}
	  }
	}


	
}