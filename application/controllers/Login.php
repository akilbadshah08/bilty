<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

public function __construct(){
	parent::__construct();

}	

public function index(){
	if($this->session->userdata('user')=='Admin'){
        redirect('admin/trip');
     }
	$vdata=[];
	if(isset($_POST['email'])){
		if($_POST['email']=="akil.badshah08@gmail.com" && $_POST['password'] == "admin!@#"){
			$this->session->set_userdata(['user' => "Admin"]);
			redirect("admin/Trip");
		}	
		else{
			$vdata['error']="Username password is not correct";
		}
	}
		
	$this->load->view('login',$vdata);
	}


	#change password
		



public function logout(){
	$this->session->sess_destroy();
	redirect('login');
}
}