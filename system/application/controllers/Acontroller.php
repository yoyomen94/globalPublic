<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acontroller extends MY_Controller {

	public function __construct() {
        parent::__construct();
	}
	
	public function index()
	{
		$this->data['title'] = "Globalbitsco";
        $this->data['meta_description'] = '<meta name="keywords" content="" />
        <meta name="description" content="" />';
		$this->middle = 'front/a';
        $this->frontLayout();
	}
	
	public function signUp()
	{
		$this->data['title'] = "Sign Up Page";
		$this->data['meta_description'] = '<meta name="keywords" content="" />
		<meta name="description" content="" />';
		$by = 'country_name';
		$select = "country_name,country_id";
		$where_array = array('status'=>1);
		$this->data['country'] = $this->Frontamodel->get_data_latest_where_asc($this->tb3,$where_array,$by,$select);
		$this->data['country_id'] = 1;
		$this->middle = 'front/b';
		$this->loginLayout();
	}
	
	public function getCaptcha() {
		$captcha_code1=$this->capcha->phpcaptcha('#173665', '#fff', 120, 40, 10, 25);
		$this->session->set_userdata('captcha_code1',$captcha_code1);
	}
	
	public function verifyAccount()
	{
		$code = $this->uri->segment(2);
		$where_array = array('email_verify_code'=>$code);
		$columns = "email_verify,email_expiry_date,email_verify_code";
		$result = $this->Frontamodel->get_data_select($this->tb6,$where_array,$columns);
		if(count($result)>0){
			foreach($result as $rs){
				$email_verify = $rs->email_verify;
				$email_expiry_date = $rs->email_expiry_date;
			}
			if($email_verify == 1){
				$this->data['msg'] = "Your Account is already verified.";
			}else if($this->insert_date > $email_expiry_date){
				$this->data['msg'] = "Verification Link is expired now.";
			}else{
				$up_data = array(
					'email_verify'=>1
				);
				$this->Frontcmodel->update_where($this->tb6,$up_data,$where_array);
				$this->data['msg'] = "Your Account is successfully verified.";
			}
			$this->middle = 'front/c';
			$this->loginLayout();
		}else{
			$myurl = base_url();
            redirect($myurl);
		}
	}
	
	public function login()
	{
		if($this->session->userdata('userlogin') != 1 )
		{
			$this->data['title']="Login";
			$this->middle = 'front/d'; 
			$this->loginLayout();
		}
		else
		{
			$myurl = base_url().user.'/dashboard';
			redirect($myurl);
		}
	}
	
	public function userDashboard()
	{
		if($this->session->userdata('userlogin') == 1 )
		{
			$this->data['user_banner_title']="Dashboard";
			$this->data['title'] = "Dashboard";
			$this->data['banner_title'] = "Dashboard";
			$this->middle = 'front/e';
			$this->userLayout();
		}
		else
		{
			$myurl = base_url().'login';
			redirect($myurl);
		}
	}
	
	public function userLogout()
	{
		$this->session->unset_userdata('userlogin');
		$this->session->unset_userdata('user_id');
		$myurl = base_url().'login';
        redirect($myurl);
	}
	
	public function passwordRecovery()
	{
		$code = $this->uri->segment(2);
		$where_array = array('password_recovery_code'=>$code);
		$columns = "password_recovery_expiry_date,password_recovery_code,user_id";
		$result = $this->Frontamodel->get_data_select($this->tb6,$where_array,$columns);
		if(count($result)>0){
			foreach($result as $rs){
				$password_recovery_expiry_date = $rs->password_recovery_expiry_date;
				$this->data['user_id'] = $rs->user_id;
			}
			if($this->insert_date > $password_recovery_expiry_date){
				$this->data['recovery_flag'] = 1;
			}else{
				$this->data['recovery_flag'] = 2;
			}
			$this->middle = 'front/f';
			$this->loginLayout();
		}else{
			$myurl = base_url();
            redirect($myurl);
		}
	}
	
	public function updatePassword()
	{
		if($this->session->userdata('userlogin') == 1){
			$this->data['title'] = "Update Password";
			$this->data['banner_title'] = "Update Password";
			$this->data['user_banner_title']="Update Password";
			$this->middle = 'front/g';
			$this->userLayout();
		}else{
			$myurl = base_url().'login';
            redirect($myurl);
		}
	}
	
	public function userProfile()
	{
		if($this->session->userdata('userlogin') == 1){
			$this->data['title'] = "User Profile";
			$this->data['banner_title'] = "User Profile";
			$this->data['user_banner_title']="User Profile";
			
			$where_array = array('user_id'=>$this->session->userdata('user_id'));
			$joins = array(
				array(
					'table' => $this->tb3,
					'condition' => $this->tb3.'.country_id = '.$this->tb6.'.country_id',
					'jointype' => 'LEFT'
				),
			);
			$columns = 'name,email,DATE_FORMAT('.$this->tb6.'.insert_date,"%d-%m-%Y %r") as insert_date,fb_url,btc_address,sponser_id,DATE_FORMAT(password_update_date,"%d-%m-%Y %r") as password_update_date,DATE_FORMAT(last_login_date,"%d-%m-%Y %r") as last_login_date,DATE_FORMAT(current_login_date,"%d-%m-%Y %r") as current_login_date,last_login_ip,current_login_ip,country_name';
			$rs = $this->Frontamodel->get_joins_where_row($this->tb6,$columns,$joins,$where_array);
			if(count(array($rs))>0){
				
				$this->data['user_name'] = $rs->name;
				$this->data['email'] = $rs->email;
				$this->data['insert_date'] = $rs->insert_date;
				$this->data['fb_url'] = $rs->fb_url;
				$this->data['btc_address'] = $rs->btc_address;
				$this->data['sponser_id'] = $rs->sponser_id;
				$this->data['password_update_date'] = $rs->password_update_date;
				$this->data['last_login_date'] = $rs->last_login_date;
				$this->data['current_login_date'] = $rs->current_login_date;
				$this->data['last_login_ip'] = $rs->last_login_ip;
				$this->data['current_login_ip'] = $rs->current_login_ip;
				$this->data['country_name'] = $rs->country_name;
				
				$this->middle = 'front/h';
				$this->userLayout();
			}else{
				$myurl = base_url().user.'/dashboard';
				redirect($myurl);
			}
		}else{
			$myurl = base_url().'login';
            redirect($myurl);
		}
	}
	
	public function provideHelp()
	{
		if($this->session->userdata('userlogin') == 1)
		{
			$this->data['title'] = "Provide Help (PH)";
			$this->data['banner_title'] = "Provide Help (PH)";
			$this->data['user_banner_title']="Provide Help (PH)";
			
			$where = array('status'=>1);
			$this->data['phPlans'] = $this->Frontamodel->get_data($this->tb7,$where);
			
			$this->middle = 'front/i';
			$this->userLayout();
		}
		else
		{
			$myurl = base_url().'login';
            redirect($myurl);
		}
	}
}