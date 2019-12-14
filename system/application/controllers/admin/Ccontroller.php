<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccontroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
     	
    }
	
		
	//for checking login detail
	public function loginCheck()
	{
		$name = trim($this->input->post('name'));
        $password = trim($this->input->post('password'));
		
		$where_array=array('username' => $name);
		$result = $this->Adminamodel->get_data($this->tb2,$where_array);
		
		$db_pass='';
		foreach($result as $rs)
		{
			$admin_id=$rs->id;
			$db_pass=$this->decType($rs->password);
		}
		
		if ($db_pass!=$password)
		{
		  $data['msg'] = $this->volanlib->error("Invalid login details"); 
		}
		else
		{
			$this->session->set_userdata('adminlogin', 1);
			$this->session->set_userdata('login_type', 1);
			$this->session->set_userdata('adminid', $name);
			$this->session->set_userdata('admin_id', $admin_id);
			$data['status'] = 'success'; 
			$data['msg'] = $this->volanlib->success("Login successful.. Redirecting..");	
		}	
		echo json_encode($data);
	}
}
