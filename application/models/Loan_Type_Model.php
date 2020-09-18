<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_Type_Model extends MY_Model {
	public function get_all_where($where,$is_json=false){
		$this->db->join($this->table_prefix."product pc", "pc.product_id = ".$this->table_prefix."loan_type.loan_type_category", 'left');
		$query=$this->db->from($this->table_prefix.'loan_type')->where($this->filter_where($where));
		$result = $this->db->get();
		if($result && $result->num_rows()>0){
			$data=$result->result_array();
			usort($data,'cmp');
		} else{
			$data= [];
		}	
		if($is_json)
		{
			return Response(['status' => 'true','data' => $data]);	
		} 
		else{
			return $data;
		}
	}
	
	public function filter_where($where){
		if(isset($where) && !empty($where)) foreach($where as $key =>$value)
		{
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'loan_type.'.$tempk]=$temp;
			
		}
		return $where;
	}
}