<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_Lead_Assignment_Model extends MY_Model {

	public function __construct(){
		parent::__construct();

	}
	public function get_all_where($where,$is_json=false){
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."internal_lead_assignment.user_id", 'left');

        

		$query=$this->db->from($this->table_prefix.'internal_lead_assignment')->where($where);
		
		return $this->get($is_json);
		 
	}
	// public  function filter_where($where){
	// 	if(isset($where) && !empty($where)) foreach($where as $key =>$value){
	// 		if($key == 'lead_id'){
	// 			$temp=$value;
	// 			$tempk=$key;
	// 			unset($where[$key]);
	// 			$where[$this->table_prefix.'internal_lead_assignment.'.$tempk]=$temp;
	// 		}
	// 	}
	// 	return $where;
	// }

}