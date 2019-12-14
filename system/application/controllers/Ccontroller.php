<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ccontroller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
		
		 
    }

	public function userLogin()
	{
		$username=trim($this->input->post('name'));
		$password=trim($this->input->post('password'));
		
		$userCaptcha=trim($this->input->post("userCaptcha2"));
		if(empty($userCaptcha)){
			$data['msg'] = $this->volanlib->error("Please enter verification code.");	
		}else if ($userCaptcha!=$this->session->userdata('captcha_code')){
			$data['msg'] = $this->volanlib->error("The verification code wasn't entered correctly");	
		}else{
		
			$where=array('email'=>$username);
			$result=$this->Frontamodel->get_data_where($this->tb6,$where);
			
			$db_pass='';
			foreach($result as $rs)
			{
				$user_id=$rs->user_id;
				$db_pass=$this->decType($rs->password);
				$status=$rs->status;
				$email_verify=$rs->email_verify;
				
				$last_login_date=$rs->last_login_date;
				$current_login_date=$rs->current_login_date;
				$last_login_ip=$rs->last_login_ip;
				$current_login_ip=$rs->current_login_ip;
			}
			
			if ($db_pass!=$password)
			{
			  $data['msg'] = $this->volanlib->error("Invalid login details"); 
			}
			else
			{
				if($status == 0)
				{
					$data['msg'] = $this->volanlib->error("Permission Denied, contact to Administrator.."); 
				}
				else
				{
					if($email_verify == 0){
						$data['msg'] = $this->volanlib->error("Email is not verified yet"); 
					}
					else{
						
						$where_array = array('user_id'=>$user_id);
						$up_data = array(
							'last_login_date'=>$current_login_date,
							'current_login_date'=>$this->insert_date,
							'last_login_ip'=>$current_login_ip,
							'current_login_ip'=>$this->ip
						);
						$this->Frontcmodel->update_where($this->tb6,$up_data,$where_array);
						
						$this->session->set_userdata('userlogin', 1);
						$this->session->set_userdata('user_id', $user_id);
						$data['status'] = 'success'; 
						$data['msg'] = $this->volanlib->success("Login successful.. Redirecting..");
					}	
				}					
			}
		}
		echo json_encode($data); 
	}
}