<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
 { 
    
   var $template  = array();
   var $data      = array();
   
   function __construct() {
        parent::__construct();
		$this->load->library(array('session','encryption','Capcha','Curl','Volanlib','Volanimage','Volanemail','phpmailer_lib'));
		$this->load->helper(array('url','captcha'));
		$this->load->Model(array('Frontamodel','Frontbmodel','Frontcmodel'));
	}
	
	public function frontLayout()
	{
		$this->template['header'] = $this->load->view('layout/header', $this->data, true);
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
		$this->load->view('layout/index', $this->template);
	}
	
	public function loginLayout()
	{
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('user_layout/index', $this->template);
	}
	
	public function userLayout()
	{
		$user_id = $this->session->userdata('user_id');
		$where = array('user_id'=>$user_id);
		$select = 'name';
		$result = $this->Frontamodel->get_data_select($this->tb6,$where,$select);
		foreach($result as $rs){
			$this->data['name'] = $rs->name;
		}
		$this->template['header'] = $this->load->view('user_layout/header', $this->data, true);
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->template['footer'] = $this->load->view('user_layout/footer', $this->data, true);
		$this->load->view('user_layout/main_index', $this->template);
	}
	
	public function decType($string){
		return $this->encryption->decrypt($string);
	}
	
	public function encType($string){
		return $this->encryption->encrypt($string);
	}
	
	public function base64Encode($string)
	{
		return base64_encode(strtr($string,'/','/'));
	}
	
	public function base64Decode($string)
	{
		return base64_decode(strtr($string, '._-', '+/='));
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
}