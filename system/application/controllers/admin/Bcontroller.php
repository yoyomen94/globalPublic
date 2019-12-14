<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bcontroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
     	
    }
	
	public function forgotPassword()
	{	
		$email = trim($this->input->post('email'));
		
        if($email == '') 
		{
            $data['msg'] = $this->volanlib->error("Please enter your email"); 
        }
       
		$where_array=array('admin_email' => $email);
		$result = $this->Adminamodel->get_data($this->tb2,$where_array);
			
        if(count($result) < 1){
			$data['msg'] = $this->volanlib->error("Email is not found");
        }
       else
	   {
		  
		   foreach($result as $rs)
		   {
			   $username=$rs->username;
				$id=$rs->id;
				$password=$this->decType($rs->password);
				
					$message = '
					<p>Hello <strong>Admin, </strong></p>
				<p style="margin:5px 0;">Admin Panel received a password recovery request. <br />
				If you request this, please check your login details in below section.
				<p>User Name- <strong>' . $username . '</strong></p>
				<p>Password- <strong>' . $password . '</strong></p>
				<br />
				
				<p style="margin:5px 0;">If you did not request this recovery, just ignore and delete this mail. Your account is always safe.</p>        
				';
					$sub = 'Password Recovery';
					$this->phpmailer_lib->sendMail($email,$sub,$message);
						//if ($this->volanemail->sendMail($email,$sub,$message)){}
						$data['status'] = 'success'; 
						$data['msg'] = $this->volanlib->success("Password successfully sent to your email. Please check your Inbox/ Spam/Junk Emails.");	
					
						
				
		   }
	   }
	  
	   echo json_encode($data); 
		 
    }
	
	public function updatePassword()
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
			if($this->session->userdata('login_type') == 1)
			{
				$where=array('id'=>$this->session->userdata('admin_id'));
				$checkoldpass = $this->Adminamodel->get_data($this->tb2,$where);
				$old_password='';
				
				foreach($checkoldpass as $rs)
				{
					$old_password=$rs->password;
				}
				
				if($this->decType($old_password) == $oldpass)
				{
					$up_data=array('password'=>$this->encType($newpass));
					
					if ($this->session->userdata('login_type') == 1)
					{
						$this->Admincmodel->update_where($this->tb2,$up_data,$where);
					}
					
					$data['status'] = 'success';
				}
				else
				{
					$data['msg'] = $this->volanlib->error("Old password does not match"); 
				}
			}
		}
		echo json_encode($data);
    }
	
	public function submitPage()
	{
	
		if($this->session->userdata('adminlogin') != 0)
		{
			$page_id=trim($this->input->post('page_id'));
			$page_title=trim(ucwords($this->input->post('page_title')));
			$web_url=trim(strtolower($this->input->post('web_url')));
			$seo_title=trim($this->input->post('seo_title'));
			$focus_keyword=trim($this->input->post('focus_keyword'));
			$meta_description=trim($this->input->post('meta_description'));
			$meta_keywords=trim($this->input->post('meta_keywords'));
			$meta_remaining=trim($this->input->post('meta_remaining'));
			$open_graph=trim($this->input->post('open_graph'));
			
			$old_open_graph_image=$this->input->post('old_open_graph_image');
		
			if($_FILES['open_graph_image']['name']!=''){
				$targetDir = 'upload/menu_images/';
				$filename=$this->volanimage->upload_image($targetDir,$_FILES['open_graph_image']);
				if($old_open_graph_image!=''){
					$path=$targetDir.$old_open_graph_image;
					if(file_exists($path)){
						unlink($path);
					}
				}
			}else{
				$filename=$old_open_graph_image;
			}
			
			$db_data=array(
				'page_title'=>$page_title,
				'web_url'=>$web_url,
				'seo_title'=>$seo_title,
				'focus_keyword'=>$focus_keyword,
				'meta_keywords'=>$meta_keywords,
				'meta_description'=>$meta_description,
				'meta_remaining'=>$meta_remaining,
				'open_graph'=>$open_graph,
				'open_graph_image'=>$filename
				
			);
			if($page_id == ''){
				$this->Adminbmodel->insertData($db_data,$this->tb40);
				$data['status'] = 'success';
				$data['msg'] = $this->volanlib->success("Successfully Add.");
			}else{
				$where = array('page_id'=>$page_id);
				$this->Admincmodel->update_where($this->tb40,$db_data,$where);
				$data['status'] = 'update';
				$data['open_graph_image'] = $filename;
				$data['msg'] = $this->volanlib->success("Successfully Updated.");
			}
		}
		else
		{
			$data['msg'] = $this->volanlib->error("Session expired, Please Login again");
		}
		echo json_encode($data); 
	}
	public function userTableGridData()
	{
		 
		$columns = array( 
				0 =>'user_id', 
				1 =>'name', 
				2 =>'email', 
				3 =>'fb_url', 
				4 =>'btc_address', 
				5=>'insert_date', 
				6 =>'user_id'
				
				
			);
			
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];
		
		$sql = "SELECT DATE_FORMAT(".$this->tb6.".insert_date,'%d %b %Y %r') as insert_date,name,user_id,status,email,fb_url,btc_address";
		$sql.=" FROM ".$this->tb6." WHERE 1=1 ";
	
		$totalData = $this->Adminamodel->data_search_count($sql);	
		$totalFiltered = $totalData;
		
		if(!empty($this->input->post('search')['value'])){
			$search = $this->input->post('search')['value'];
			$sql.=" AND ( name LIKE '".$search."%' ";    
			$sql.=" OR email LIKE '".$search."%' ";
			$sql.=" OR fb_url LIKE '".$search."%' ";
			$sql.=" OR btc_address LIKE '".$search."%' ";
			$sql.=" OR insert_date LIKE '".$search."%' ) group by unique_token";	
			
			$tb_data =  $this->Adminamodel->data_search($sql);
			$totalFiltered = $this->Adminamodel->data_search_count($sql);
			//$totalFiltered = $this->Adminamodel->data_search_count_groupby($sql,$group_by);
		}else{
			$sql.=" ORDER BY ". $order."   ".$dir."  LIMIT ".$start." ,".$limit."   ";
			$tb_data = $this->Adminamodel->data_search($sql);
		}
		
		$i=$start+1;
		$data = array();
		if(!empty($tb_data))
		{
			foreach ($tb_data as $rs)
			{
				$nestedData=array();	
											
				$nestedData['#'] = $i;
				$nestedData['name'] = $rs->name;
				$nestedData['email'] = $rs->email;
				$nestedData['fb_url'] = $rs->fb_url?$rs->fb_url:'N/A';;
				$nestedData['insert_date'] = $rs->insert_date;
				$nestedData['status'] = $rs->status;
				$nestedData['btc_address'] = $rs->btc_address;
				$nestedData['user_id'] = $rs->user_id;
				
				$data[] = $nestedData;
				$i++;
			}
		}

		$json_data = array(
					"draw"            => intval($this->input->post('draw')),  
					"recordsTotal"    => intval($totalData),  
					"recordsFiltered" => intval($totalFiltered), 
					"data"            => $data   
					);
			
		echo json_encode($json_data); 
	}
	
}