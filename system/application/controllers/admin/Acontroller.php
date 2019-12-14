<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acontroller extends MY_AdminController {

    public function __construct() {
        parent::__construct();
		 if ($this->session->userdata('adminlogin') == 0)
		{
			$allowed = array('login');
			if ( ! in_array($this->router->fetch_method(), $allowed))
			{
				$myurl = base_url() .admin;
				redirect($myurl);
			}
        } 
    }
	
	// login page 
    public function login()	
	{
		if ($this->session->userdata('adminlogin') == 0){
			$this->data['title'] = "Login Page";
			$getAdmin = $this->Adminamodel->getData($this->tb2);
				if(isset($getAdmin[0]->admin_email))
					$this->data['email'] = $this->String2Stars($getAdmin[0]->admin_email,3,-5);
			$this->data['login_flag'] = 1;	
			$this->middle = 'admin/a'; 
			$this->loginLayout();
        }
		else
		{
            $myurl = base_url() .admin.'/dashboard';
            redirect($myurl);
        }
    }
	
	//dashboard for admin
    public function welcomeAdmin()
	{
		$this->data['title'] = "Dashboard";
		$this->data['banner_title'] = "Dashboard";	
		$this->data['dashboardPostTableFlag'] = 1;	
		
		$getUsers = $this->Adminamodel->getData($this->tb3);
		$this->data['totalUsers'] = count($getUsers);
		
		$getAds = $this->Adminamodel->getData($this->tb3);
		$this->data['totalAds'] = count($getAds);
		
		//category count
		$getCate = $this->Adminamodel->getData($this->tb3);
		$this->data['totalCate'] = count($getCate);
		
		$getSubCate = $this->Adminamodel->getData($this->tb3);
		$this->data['totalSubCate'] = count($getSubCate);
		
		$getSubSubCat = $this->Adminamodel->getData($this->tb3);
		$this->data['totalSubSubCat'] = count($getSubSubCat);
		
		$getFeedback = $this->Adminamodel->getData($this->tb3);
		$this->data['totalfeedback'] = count($getFeedback);
		
		$ads_by='';
		$ads_by = $this->input->post('ads_by');
		if($ads_by!=''){ 
			
			$this->session->set_userdata('ads_by',$ads_by);
		}
		else if($this->session->userdata('ads_by')!=''){
			$ads = $this->session->userdata('ads_by');
			
		} 
		
		$array[]=array('Day','20');
		$array[]=array('Week','40');
		$array[]=array('Month','50');
		$array[]=array('All','250');
		$this->data['piedata'] =$array;
		//echo "<pre>";print_r($array);die;
		
		$this->middle = 'admin/b'; 
		$this->layout();
    }
	
	public function changePassword()
	{
		$this->data['title'] = "Change Password";
		$this->data['banner_title'] = "Change Password";
		$this->middle = 'admin/c1';   
		$this->layout();
       
    }
	public function getUrl()
	{
		$url_val=trim(strtolower($this->input->post('val')));
		if($url_val!='')
		{
			$url = preg_replace('/[^a-zA-Z0-9\/_|+ -]/',' ' ,$url_val);
			$url = strtolower(trim($url, '-'));
			$url = preg_replace("/[\/_|+ -]+/",'-', $url);
			$url=trim($url,"-");
			echo $url; die;
		}
	}
	public function listPage()
	{
		$this->data['title'] = "List Page";
		$this->data['banner_title'] = "List Page";
		$this->data['getPage'] = $this->Adminamodel->getData($this->tb40);
		$this->middle = 'admin/d'; 
		$this->layout();
	}
	
    public function logout()
	{
        $this->session->unset_userdata('adminlogin');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('adminid');
        $myurl = base_url() .admin;
        redirect($myurl);
    }
	
	public function userList()
	{
		$this->data['title'] = "List User";
		$this->data['banner_title'] = "List User";
		$this->data['banner_title2'] = "List User";
		$this->data['userTableFlag']=1;
		$this->middle = 'admin/r';
		$this->layout();
	}
	public function viewUser()
	{
		$this->data['title'] = "View User";
		$this->data['banner_title'] = "View User";
		$this->data['banner_title2'] = "Post Detail";
		$user_id=$this->uri->segment(3);
		$where=array($this->tb6.'.user_id'=>$user_id);
		
		$colums = "name,DATE_FORMAT(".$this->tb6.".insert_date,'%d %b %Y %r') as insert_date,email,fb_url,btc_address";
		$this->data['getDetail'] = $this->Adminamodel->get_data_select($this->tb6,$where,$colums);
		foreach($this->data['getDetail'] as $rs)
		{
			$this->data['name'] = $rs->name;
			$this->data['email'] = $rs->email;
			$this->data['fb_url'] = $rs->fb_url;
			$this->data['btc_address'] = $rs->btc_address;
			$this->data['insert_date'] = $rs->insert_date;
		}
		$this->data['user_id']=$user_id;
		$this->middle = 'admin/d';
		$this->layout();
	}
	
}

