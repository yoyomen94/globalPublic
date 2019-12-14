<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dcontroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
     	if ( ! $this->session->userdata('adminlogin'))
		{
			$allowed = array('login');
			if ( ! in_array($this->router->fetch_method(), $allowed))
			{
				$myurl = base_url() .admin;
				redirect($myurl);
			}
        }
    }
	
	
	
}
