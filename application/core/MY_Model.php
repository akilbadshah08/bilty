<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	public $table_prefix;
	public function __construct(){
		parent::__construct();
		$this->db->db_debug = false;
		$this->table_prefix='';
		$this->table_name=strtolower(get_called_class());
		$v=$this->table_name=str_replace('_model', '', $this->table_name);

	}
    public function save($data, $additional_data) {
        $id = 0;
	    if(isset($data['id'])) {
            $id = $data['id'];
            unset($data['id']);
        }
        if($id <=0) {
            // run insert
            if(!$this->db->insert($this->table_prefix . $this->table_name, $data)) {
                $error = $this->db->error();
                throw new Exception( $error['code'] . ' ' . $error['message']);
			}
			// $str = $this->db->last_query();
			// echo "<pre>";
            // print_r($str);
			//  exit;
            $id = $this->db->insert_id();
        } else {
            // run update
            $this->db->where('id', $id);
            if(!$this->db->update($this->table_prefix.$this->table_name, $data)){
                $error = $this->db->error();
                throw new Exception( $error['code'] . ' ' . $error['message']);
            }
        }
        // Now save customer extra data
        $this->save_additional_data($id, $additional_data);
        return $id;
    }
    public function save_additional_data($id, $additional_data) {
        foreach($additional_data as $key=>$val) {
            // first check if this key already exists
            $this->db->where('parent_id', $id);
            $this->db->where('key', $key);
            $this->db->from($this->table_prefix.$this->table_name.'_data');
            $rows = $this->db->count_all_results();
            $is_json = 'no';
            if(is_array($val) || is_object($val)) {
                $val = json_encode($val);
                $is_json = 'yes';
            }
            $data = array(
                'key'=>$key,
                'value'=>$val,
                'is_json'=>$is_json
            );
            if($rows>0) {
                // update the key
                $this->db->where('parent_id', $id);
                $this->db->where('key', $key);
                $this->db->update($this->table_prefix.$this->table_name.'_data', $data);
            } else {
                $data['parent_id']=$id;
				$this->db->insert($this->table_prefix.$this->table_name.'_data', $data);
				// $str = $this->db->last_query();
				// echo "<pre>";
				// print_r($str);
				//  exit;
				//  die;
            }
        }
    }
    public function get_additional_data($id, $key = false) {
        $this->db->where('parent_id', $id);
        if($key) {
            $this->db->where('key', $key);
        }
        $this->db->from($this->table_prefix.$this->table_name.'_data');
        $result = $this->db->get();
        $data =  $result->result_array();
        // convert to key value pair
        $ret = array();
        foreach( $data as $dt ) {
            $key = $dt['key'];
            $val = $dt['value'];
            if($dt['is_json'] == 'yes') {
                $val =  json_decode($val, true);
            }
            $ret[$key] = $val;
        }
        return $ret;
    }

	public function get_column_unique_where($select,$where,$is_json=false){
		$this->db->distinct();
		$query=$this->db->select($select)->from($this->table_prefix.$this->table_name)->where($where);
		return $this->get($is_json);
	}
	public function get_all_where($where,$is_json=false){
		$query=$this->db->from($this->table_prefix.$this->table_name)->where($where);
		
        return $this->get($is_json);
	}
	public function get_all_where_in($field,$in,$is_json=false){
		$query=$this->db->from($this->table_prefix.$this->table_name)->where_in($field,implode(',',$in));		
        return $this->get($is_json);

	}
	public function get_columns_where($select,$where,$is_json=false){
		$this->db->select($select);
		return $this->get_all_where($where,$is_json);
	}

	public function get($is_json){
		//$this->db->order_by($this->get_primary_column(), "DESC");
		$result = $this->db->get();
		
		if($result && $result->num_rows()>0){
			$data=convert_all_json_to_column($result->result_array());
		} else{
			$data= [];
		}	
		if($is_json){
			return Response(['status' => 'true','data' => $data]);	
		} else{
			return $data;
		}		
	}
	public function get_row_where($where,$is_json=false){
		
		$get=$this->get_all_where($where);
		$data =!empty($get)?$get[0]:[];
		if($is_json){
			return Response(['status' => 'true','data' => $data]);	
		} else{
			return $data;
		}
	}

	public function password_encrypt($password){
		return md5($password);
	}
	public function get_rows_count($where){
		$this->db->where($where);
		return $this->db->from($this->table_prefix.$this->table_name)->count_all_results();
	}

	public function insert($data){
/*		echo "string";*/

		/*print_r($data);
		echo $this->table_name;*/
		if (!$this->db->insert($this->table_prefix.$this->table_name,$data))
		{	    
			/*echo "if";*/
			$error = $this->db->error();
		/*	$this->db->_error_message(); */
		/*	$this->db->_error_number(); */
	    	throw new Exception('model_name->record: ' . $error['code'] . ' ' . $error['message']);
		} else{
			/*echo "else";*/
			$this->db->insert_id();
			return ['status' => 'true','id' => $this->db->insert_id()];
		}

    }

    public function update($data,$where){
		$this->db->where($where);
		// print_r($where);
		// print_r($data);
		// die;
        if (!$this->db->update($this->table_prefix.$this->table_name,$data)) 
		{	   
			$error = $this->db->error();
        	throw new Exception('model_name->record: ' . $error['code'] . ' ' . $error['message']);
		}
		 
		else
		{
			return ['status' => 'true'];
		}
		
    }
    public function field_data(){
		return $this->db->field_data($this->table_prefix.$this->table_name);
    }
    public function get_primary_column(){
    	foreach ($this->field_data() as $key => $value) {
    		if($value->primary_key==1){
    			return $value->name;
    		}
    	}
    }
    public function insert_batch($data){
    	$this->db->insert_batch($this->table_prefix.$this->table_name, $data); 
	}
}