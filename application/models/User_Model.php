<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends MY_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(['User_Model','Role_Model']);
	
	}
	public function login($email,$pass){
		$query=$this->db->select('*')->from('lm_user')->where(['email_id' => $email, 'password' => $this->password_encrypt($pass)]);
		$result = $this->db->get();
		if($result->num_rows()>0){
			$user=$result->result_array();
			return $user[0];
		} else{
			return false;
		}
	}
	
	public  function insert_user_with_role($data,$redirect_url='')
	{
		$this->db->trans_start();
		parent::insert($data['user']);
		$data['role']['user_id']=$this->db->insert_id();
		if(!empty($data['role'])){
			$this->Role_Model->insert($data['role']);
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Errors"]);
		} else{
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => site_url($redirect_url.$data['role']['user_id'].'?r=added')]);
		}
	}

	public  function update_user_with_role($data,$condition,$redirect_url='')
	{
	
		$this->db->trans_start();
		parent::update($data['user'],$condition);
		$this->Role_Model->update($data['role'],$condition);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Errors"]);
		} else{
			return Response(['status' => 'true','msg' => "Successfuly Updated",'url' => $redirect_url.'?r=updated']);
		}

	}
}