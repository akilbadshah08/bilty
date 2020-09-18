<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $user_data=[];
	public $request;
	public $curent_user_level;
	public function  __construct(){
		parent::__construct();
		$this->load->library('form_validation');	

	}

}
