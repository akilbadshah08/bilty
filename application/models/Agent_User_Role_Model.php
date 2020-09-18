<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_User_Role_Model extends MY_Model {

	
	public function __construct(){
		parent::__construct();
		$this->load->model(['Agent_Model','Role_Model','User_Model']);
	}

	public function get_all_where($where,$is_json=false)
	{
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."role.user_id", 'left');
		$this->db->join($this->table_prefix."agent", $this->table_prefix."agent.agent_id = ".$this->table_prefix."role.agent_id", 'left');
		$query=$this->db->select('*')->from($this->table_prefix.'role')->where($this->filter_where($where));
		$result = $this->db->get();
		
		if($result && $result->num_rows()>0)
		{
			$data=$result->result_array();
		}else{
			$data= [];
		}	
		if($is_json){
			return Response(['status' => 'true','data' => $data]);	
		} else{
			return $data;
		}
	}
	
	public  function filter_where($where)
	{
		if(isset($where) && !empty($where)) foreach($where as $key =>$value){
			if($key == 'agent_id' || $key == 'user_id'){
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'role.'.$tempk]=$temp;
			}
		}
		return $where;
	}	
	public  function insert($data,$redirect_url='')
	{
		$user=$data['user'];
	//	print_r($user);
		$agent=$data['agent'];
	//	print_r($agent);	
		$this->db->trans_start();
		$this->Agent_Model->insert($agent);
		$agent_id=$this->db->insert_id();
		$this->User_Model->insert($user);
		$user_id=$this->db->insert_id();
		$rr=$this->Role_Model->insert(['user_id'=>$user_id,'agent_id'=>$agent_id]);
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} else{
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => site_url($redirect_url.$agent_id.'?r=added')]);
		}
	}
	public function update($data,$where,$redirect_url='')
	{
		$user=$data['user'];
		$agent=$data['agent'];

		$this->db->trans_start();
		$this->Agent_Model->update($agent,['agent_id' => $where['agent_id']]);
		$this->User_Model->update($user,['user_id' => $where['user_id']]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} else{
			return Response(['status' => 'true','msg' => "Successfuly Updated",'url' => $redirect_url.'?r=updated']);
		}
	}
	public static function generate_unique_id($id){
		return strtotime(date('Ymdhis'));
	}
	public function delete($redirect_url){
		$this->load->model(['Agent_Model']);
		$agent_id=$this->Agent_Model->update(['agent_delete' => 1],['agent_id' => $id]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		       echo "false";
		} else{
			redirect($redirect_url);
		}
	}
}