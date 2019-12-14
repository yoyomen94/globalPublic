<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Econtroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
     	
    }
		
	public function deleteData()
	{
		
		if($_POST)
		{
			$id=trim($this->security->xss_clean($this->input->post('id')));
			$id_array=explode("-",$id);
			
			if($id != '')
			{
				$where_array=array($id_array[2]=>$id_array[0]);
				$this->Admindmodel->delete($id_array[1],$where_array);
				echo $this->volanlib->success("Successfully deleted");
				die;
		
			}
			
		}
	}
	
}