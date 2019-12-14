<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_AdminController extends CI_Controller 
{ 

    
   var $template  = array();
   var $data      = array();
   
   function __construct() {
        parent::__construct();
		$this->load->library(array('session','pagination','encryption','Volanlib','Volanemail','Volanimage','Excel','Curl','phpmailer_lib'));
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
		
		$this->load->Model(array('Adminamodel','Adminbmodel','Admincmodel','Admindmodel'));
		
    }
	
	public function custom_curl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch))
        {
			print "Error: " . curl_error($ch);
        }
        else
        {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			return  $transaction['rates']['INR'];
		}
	}
	
	public function layout() {
   		
		$this->template['header'] = $this->load->view('admin_layout/header', $this->data, true);
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		//$this->template['footer'] = $this->load->view('admin_layout/footer', $this->data, true);
		$this->load->view('admin_layout/index', $this->template);
	}
   
	public function loginLayout() {
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('admin_layout/index', $this->template);
	}
   
	public function meLoginLayout() {
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('me_layout/index', $this->template);
	}
	
	public function meLayout() {
   		$where = array('marketing_executive_id'=>$this->session->userdata('me_id'));
		$select = 'name,me_currency,profile_pic';
   		$result = $this->Adminamodel->get_data_select($this->tb11,$where,$select);
		foreach($result as $rs){
			$this->data['me_name'] = $rs->name;
			$this->data['wallet_currency'] = $rs->me_currency;
			$this->data['me_profile_pic'] = $rs->profile_pic;
		}
		$where = array('me_id'=>$this->session->userdata('me_id'));
		$select = "amount";
		$this->data['meWalletAmount'] = 0;
		$walletAmount = $this->Adminamodel->get_data_select($this->tb34,$where,$select);
		if(count($walletAmount)>0){
			foreach($walletAmount as $rs){
				$this->data['meWalletAmount'] = $rs->amount;
			}
		}
		
		$select = "order_no";
		$where = array('marketing_executive_id'=>$this->session->userdata('me_id'));
		$this->data['getTotalOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>2));
		$this->data['getDeliveredOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>1));
		$this->data['getInProcessOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>3));
		$this->data['getCanceledOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$this->template['header'] = $this->load->view('me_layout/header', $this->data, true);
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		//$this->template['footer'] = $this->load->view('me_layout/footer', $this->data, true);
		$this->load->view('me_layout/index', $this->template);
	}
	public function expertlayout() {
   		$where = array('employee_id'=>$this->session->userdata('expert_id'));
		$select = 'name,currency2,profile_pic';
   		$result = $this->Adminamodel->get_data_select($this->tb7,$where,$select);
		foreach($result as $rs){
			$this->data['expert_name'] = $rs->name;
			$this->data['wallet_currency'] = $rs->currency2;
			$this->data['expert_profile_pic'] = $rs->profile_pic;
		}
		
		$select = "total_amount";
		$this->data['expertWalletAmount'] = 0;
		$walletAmount = $this->Adminamodel->get_data_select($this->tb39,$where,$select);
		if(count($walletAmount)>0){
			foreach($walletAmount as $rs){
				$this->data['expertWalletAmount'] = $rs->total_amount;
			}
		}
		
		$select = "order_no";
		$where = array('employee_id'=>$this->session->userdata('expert_id'));
		$this->data['getTotalOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>2));
		$this->data['getDeliveredOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>1));
		$this->data['getInProcessOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$where = array_merge($where,array('order_status'=>3));
		$this->data['getCanceledOrder'] = count($this->Adminamodel->get_data_select($this->tb6,$where,$select));
		
		$this->template['header'] = $this->load->view('expert_layout/header', $this->data, true);
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		//$this->template['footer'] = $this->load->view('expert_layout/footer', $this->data, true);
		$this->load->view('expert_layout/index', $this->template);
	}
	public function expertloginLayout() {
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('expert_layout/index', $this->template);
	}
   
   public function randToken()
	{
		$randAlpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQURSTUVWXYZ"),0,2);
		$randNum = rand(1111,9999);
		$token = $randAlpha . $randNum;
		return $token;
	}
   
	public function decType($string){
		return $this->encryption->decrypt($string);
	}
	
	public function encType($string){
		return $this->encryption->encrypt($string);
	}
    
	public function String2Stars($string='',$first=0,$last=0,$rep='*'){
	  $begin  = substr($string,0,$first);
	  $middle = str_repeat($rep,strlen(substr($string,$first,$last)));
	  $end    = substr($string,$last);
	  $email  = $begin.$middle.$end;
	  return $email;
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
	
	function random_num($length) 
	{
		$alphabets = range('A','Z');
		$numbers = range('0','9');
	
		$final_array = array_merge($alphabets,$numbers);
		 
		$password = '';
  
		while($length--) {
		  $key = array_rand($final_array);
		  $password .= $final_array[$key];
		}
  
		return $password;
	}
	
	function ifscCode($ifsc)
	{
		$url=('https://ifsc.razorpay.com/'.$ifsc);	
		$data = $this->curl->simple_get($url);
			return $data;
		
	}
	
	public function replaceSpace($message)
	{
		return str_replace(" ","%20",$message);
	}
	
	public function sendMessage($mobile,$message)
	{
		
		$url=('http://alerts.prioritysms.com/api/web2sms.php?workingkey=Ae4b1ddb8a9898e0f75b7d41194992fda&to='.$mobile.'&sender=VFRESH&'.'message='.$message);
		$result = $this->curl->simple_get($url); 
		return "1";
	}
	
}