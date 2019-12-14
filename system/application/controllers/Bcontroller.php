<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bcontroller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function registerUser()
	{
		$name = trim(ucwords($this->input->post('name')));
		$email = trim($this->input->post('email'));
		$fb_url = trim($this->input->post("fb_url"));
		$btc_address = trim($this->input->post("btc_address"));
		$country_id = trim($this->input->post("country_id"));
		$sponser_id = trim($this->input->post("sponser_id"));
		$password = trim($this->input->post("password"));
		$userCaptcha=trim($this->input->post("userCaptcha2"));
		
		if(empty($userCaptcha)){
			$data['msg'] = $this->volanlib->error("Please enter verification code.");	
		}else if ($userCaptcha!=$this->session->userdata('captcha_code')){
			$data['msg'] = $this->volanlib->error("The verification code wasn't entered correctly");	
		}else{
			$where_array = array('email'=>$email);
			$register = $this->Frontamodel->get_data($this->tb6,$where_array);
			if(count($register)>0)
			{
				$data['msg'] = $this->volanlib->error("Email is already register");
			}
			else
			{
				$email_expiry_date = date('Y-m-d H:i:s',strtotime(' +10 minutes',strtotime($this->insert_date)));
				
				$email_verify_code = $this->getRandomString();
				
				$db_data=array(
					'name'=>$name,
					'email'=>$email,
					'fb_url'=>$fb_url,
					'btc_address'=>$btc_address,
					'country_id'=>$country_id,
					'sponser_id'=>$sponser_id,
					'password'=>$this->encType($password),
					'status'=>1,
					'email_verify'=>1,
					'insert_date'=>$this->insert_date,
					'email_verify_code'=>$email_verify_code,
					'email_expiry_date'=>$email_expiry_date
				);
				$this->Frontbmodel->insertData($this->tb6,$db_data);
				
				$message = '
					<p>Dear <strong>'. $name .', </strong></p>
				<p style="margin:5px 0;">Thanks for creating account with Globalbitco.com You’re almost to become a part of this community.
				<p>We know our registration process taken a few minutes, we promise it’ll be worthwhile. Now the last step remaining to activate your account by clicking this link and all completed.</p>
				<p>If you are facing any problem, simple copy this link given below and paste in address bar of your browser.</p>
				<br />
				<p><a href="'.base_url().'verify-account/'.$email_verify_code.'"  target="_blank">'.base_url().'verify-account/'.$email_verify_code.'</a></p>
				       
				';
				
					$sub = 'Account Verification';
						$this->phpmailer_lib->sendMail($email,$sub,$message);
				
				$data['status'] = 'success'; 
				$data['msg'] = $this->volanlib->success("Sign Up Verification Link is successfully send to your email Id. Please check your email.");
			}		
		}
		echo json_encode($data);
	}
	
	public function userForgotPassword()
	{
		$email = trim($this->input->post('email'));
		$where_array=array('email' => $email);
		$select = "user_id,name,email";
		$result = $this->Frontamodel->get_data_select($this->tb6,$where_array,$select);
		if(count($result) < 1){
			$data['msg'] = $this->volanlib->error("Email is not found");
        }else{
			foreach($result as $rs)
			{
				$name=$rs->name;
				$user_id=$rs->user_id;
			}
			
			$password_recovery_expiry_date = date('Y-m-d H:i:s',strtotime(' +10 minutes',strtotime($this->insert_date)));
			$password_recovery_code = $this->getRandomString();
			
			$up_data = array(
				'password_recovery_code'=>$password_recovery_code,
				'password_recovery_expiry_date'=>$password_recovery_expiry_date
			);
			
			$this->Frontcmodel->update_where($this->tb6,$up_data,$where_array);
			
			$message = '
					<p>Hello <strong>'.$name.', </strong></p>
				<p style="margin:5px 0;">We received a password recovery request. <br />
				If you request this, please simple copy this link given below and paste in address bar of your browser.
				<p><a href="'.base_url().'password-recovery/'.$password_recovery_code.'"  target="_blank">'.base_url().'password-recovery/'.$password_recovery_code.'</a></p>
				
				<br />
				
				<p style="margin:5px 0;">If you did not request this recovery, just ignore and delete this mail. Your account is always safe.</p>        
				';
				
				$sub = 'Password Recovery';
						$this->phpmailer_lib->sendMail($email,$sub,$message);
						
				$data['status'] = 'success'; 
				$data['msg'] = $this->volanlib->success("Password Recovery link successfully sent to your email. Please check your Inbox/ Spam/Junk Emails.");
		}
		echo json_encode($data); 
	}
	
	public function userPasswordReset()
	{
		$user_id = trim($this->input->post('user_id'));
		$password = trim($this->input->post('password'));
		
		$where_array = array('user_id'=>$user_id);
		$up_data = array(
			'password'=>$this->encType($password)
		);
		$this->Frontcmodel->update_where($this->tb6,$up_data,$where_array);
		
		$data['status'] = 'success';
		$data['msg'] = $this->volanlib->success("Password Successfully Reset.");
		
		echo json_encode($data);
	}
	
	public function updateUserPassword()
	{
		if($this->session->userdata('userlogin') == 1)
		{	
			$oldpass = trim($this->input->post('oldpass'));
			$newpass = trim($this->input->post('newpass'));
			$retypepass = trim($this->input->post('retypepass'));
			
			if($oldpass == '')
			{
			   $data['msg'] = $this->volanlib->error("Please enter old password"); 
			}
			else if($newpass == '')
			{
			   $data['msg'] = $this->volanlib->error("Please enter new password"); 
			}
			else if($retypepass == '')
			{
			   $data['msg'] = $this->volanlib->error("Please enter retype password");
			}
			else if($retypepass != $newpass)
			{
			  $data['msg'] = $this->volanlib->error("Password are not same");
			}
			else if(strlen($newpass) < 8) 
			{
				$data['msg'] = $this->volanlib->error("Password must be 8 characters"); 
			
			}
			else if(!preg_match('/[!@#$%^&*()_+|*{}<>]/', $newpass))
			{
				$data['msg'] = $this->volanlib->error("Password must contain atleast one special character"); 
			}
			else
			{
				$where=array('user_id'=>$this->session->userdata('user_id'));
				$checkoldpass = $this->Frontamodel->get_data($this->tb6,$where);
				$old_password='';
				
				foreach($checkoldpass as $rs)
				{
					$old_password=$rs->password;
				}
				
				if($this->decType($old_password) == $oldpass)
				{
					$up_data=array(
						'password'=>$this->encType($newpass),
						'password_update_date'=>$this->insert_date
					);
					$this->Frontcmodel->update_where($this->tb6,$up_data,$where);
					$data['status'] = 'success';
				}
				else
				{
					$data['msg'] = $this->volanlib->error("Old password does not match"); 
				}
			}
			echo json_encode($data);
		}
		else
		{
			$myurl = base_url().'login';
            redirect($myurl);
		}
	}
}