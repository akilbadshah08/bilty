<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_Model extends MY_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(['State_Model']);
	}

	public function get_all_where($where,$is_json=false){

		$this->db->join($this->table_prefix."state", $this->table_prefix."state.state_id = ".$this->table_prefix."city.state_id", 'left');
		$query=$this->db->select('*')->from($this->table_prefix.'city')->where($this->filter_where($where));
		$result = $this->db->get();
		
		if($result && $result->num_rows()>0){
			$data=$result->result_array();
		} else{
			$data= [];
		}	
		if($is_json){
			return Response(['status' => 'true','data' => $data]);	
		} else{
			return $data;
		}
	}
	public  function filter_where($where){
		if(isset($where) && !empty($where)) foreach($where as $key =>$value){
			if($key == 'city_id' || $key == 'state_id'){
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'city.'.$tempk]=$temp;
			}
		}
		return $where;
	}


}