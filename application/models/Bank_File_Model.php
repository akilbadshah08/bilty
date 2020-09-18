<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_File_Model extends MY_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(['Customer_Model','Payout_Model']);
	}
	public function get_all_where($where,$is_json=false){

		$this->db->join($this->table_prefix."bank", $this->table_prefix."bank.bank_id = ".$this->table_prefix."bank_file.bank_id", 'left');
		$this->db->join($this->table_prefix."customer", $this->table_prefix."customer.id = ".$this->table_prefix."bank_file.customer_id", 'left');
		$query=$this->db->from($this->table_prefix.'bank_file')->where($this->filter_where($where));
		return $this->get($is_json);			
	}
	public function filter_where($where){
		if(isset($where) && !empty($where)) foreach($where as $key =>$value){
			if($key == 'lead_id' || $key == 'customer_id' || $key =='agent_id'){
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'bank_file.'.$tempk]=$temp;
			}
		}
		return $where;
	}
	
	public  function file_approve($data,$where,$redirect_url='')
	{
		$this->db->trans_start();
		$data['file_status']='approved';
		$data['date_of_disbursal']=date('Y-m-d',strtotime($data['date_of_disbursal']));
		parent::update($data,$where);
		$file_data=$this->get_row_where($where);
		$file_data['product']=$data['product'];

		// $this->Payout_Model->insert(['agent_id' => $file_data['agent_id'], 'lead_id' => $file_data['lead_id'],'customer_id' => $file_data['customer_id'], 'file_no' => $file_data['file_no'], 'bank_id' => $file_data['bank_id'],'product' => $file_data['product'],'amount_disbursed' => $file_data['amount_disbursed']
		//  ]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} else{
			return Response(['status' => 'true','msg' => "Successfuly Updated",'url' => agent_url('bankfile/index/'.$file_data['lead_id'])]);
		}
	}

	

}