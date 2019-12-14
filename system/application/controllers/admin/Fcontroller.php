<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fcontroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
     	
    }
		
		
		public function blockDataFunction() 
		{
				$id = $this->input->post('id');
			    $table = $this->input->post('table');
			    $id_name = $this->input->post('table_id');
				$status_name = $this->input->post('status_name');
				
				
				$where=array($id_name => $id);
				 $result = $this->Adminamodel->get_data($table,$where);
				$status='';
				foreach($result as $register)
				{
					$status=$register->$status_name;	
				}
				
				if($status=='1')
				{
					$status='0';				
					$msg='Block';
				}
				else
				{
					$status='1';				
					$msg='UnBlock';
				}
				$data=array($status_name=>$status);
				$this->Admincmodel->update_where($table,$data,$where);
				echo $this->volanlib->success($msg." Successfully");
				die;
		}
	
}