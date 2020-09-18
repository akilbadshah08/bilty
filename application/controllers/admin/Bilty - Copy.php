<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilty extends MY_Controller {

	public $module_name;
	public $module_slug;
	public function __construct(){
	  parent::__construct();
	  $this->module_name='Bilty';
	  $this->module_slug='bilty';	
	  $this->template_folder='bilty'; 
	 	  $this->load->model(['Bilty_Model']);
	  if(!$this->validate_user()){
	  	redirect('admin/login');
	  }
    }
    
	public function index() 
	{
		$data['page_title']=$this->module_name.' Listing';
		$this->load->view('list',$data);
	}

    public function add() 
    {
        $data['page_title']='Add '.$this->module_name;
        $this->load->('add',$data);
    }
}
 
}
