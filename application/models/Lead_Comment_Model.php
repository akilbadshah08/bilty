<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_Comment_Model extends MY_Model {

	public function get_all_where($where,$is_json=false){
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."lead_comment.user_id", 'left');
		return parent::get_all_where($where,$is_json=false);
	}
	
}