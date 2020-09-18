<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout_Model extends MY_Model {

	
	public function __construct(){
		parent::__construct();
		$this->load->model(['Agent_Model','Role_Model','User_Model','Bank_File_Model','Lead_Transfer_Model','Lead_Model','Setting_Model']);
	}

	public function get_all_where($where,$is_json=false)
	{

		//$this->db->group_by('lm_payout.agent_id,lm_payout.lead_id');
		$this->db->join($this->table_prefix."customer", $this->table_prefix."customer.id = ".$this->table_prefix."payout.customer_id", 'left');
		$this->db->join($this->table_prefix."agent", $this->table_prefix."agent.agent_id = ".$this->table_prefix."payout.agent_id", 'left');
		$this->db->join($this->table_prefix."bank", $this->table_prefix."bank.bank_id = ".$this->table_prefix."payout.bank_id", 'left');
		$this->db->join($this->table_prefix."lead", $this->table_prefix."lead.id = ".$this->table_prefix."payout.lead_id", 'left');
		$this->db->join($this->table_prefix."product", $this->table_prefix."product.product_id = ".$this->table_prefix."payout.product", 'left');
		$this->db->join($this->table_prefix."bank_file", $this->table_prefix."bank_file.file_id = ".$this->table_prefix."payout.file_id", 'left');
		$query=$this->db->select('lm_payout.*,lm_customer.*,lm_bank.*,lm_lead.*,lm_agent.*,lm_product.*,lm_bank_file.*')->from($this->table_prefix.'payout')->where($this->filter_where($where));
		$result = $this->db->get();
		
		if($result && $result->num_rows()>0)
		{
			$data=convert_all_json_to_column($result->result_array());
		}else{
			$data= [];
		}	
		if($is_json){
			return Response(['status' => 'true','data' => $data]);	
		} else{
			return $data;
		}
	}
	// public function by_group(){
	// 	$this->db->join()
	// }
	public function add_bulk_payouts($lead_id){
		$settings=$this->Setting_Model->get_row_where(['name'=>'commission']);
		$connector_p=$settings['value']['connector'];
		$referral_p=$settings['value']['referral'];
		$franchise_p=$settings['value']['franchise'];
		$channel_partner_p=$settings['value']['channel-partner'];
		$lead=$this->Lead_Model->get_row_where(['id' => $lead_id]);
		$bank_files=$this->Bank_File_Model->get_all_where(['lead_id' => $lead_id,'file_status' => 'approved']);
		// print_r($bank_files);
		// die;
		$agents=$this->Lead_Transfer_Model->get_all_where(['lead_id' => $lead_id]);
		$agent_ids=array_column($agents, 'from');
		$agent_ids[]=$lead['agent_id'];

		if($lead['connector_referral_id']!=0){
			$connector_refferals=$this->Agent_Model->get_row_where(['agent_id'=>$lead['connector_referral_id']]);
			//$connector_refferals=$lead['connector_referral_id'];	
		}


		$agents=$this->Agent_Model->get_all_where_in('agent_id',$agent_ids);

		foreach ($bank_files as $key => $file) {

			$bank_percentage=$file['bank_deals_with'][$file['product']]['payout'];
			$admin_amount=($bank_percentage/100)*$file['amount_disbursed'];

			if(isset($connector_refferals)){
				if($connector_refferals['agent_type'] == 'connector'){
					$commision_percentage=$connector_p;
				} else if($connector_refferals['agent_type'] == 'referral'){
					$commision_percentage=$referral_p;
				}
				$payout_amount=($commision_percentage/100)*$admin_amount;
				$admin_amount=$admin_amount-$payout_amount;
				$this->add_payout($file,$connector_refferals['agent_id'],$payout_amount);
			}
			foreach ($agents as $key => $value) {
				if($value['agent_type']=='franchise'){
					$commision_percentage=$franchise_p;
				} else if($value['agent_type']=='channel-partner'){
					$commision_percentage=$channel_partner_p;
				}
				$payout_amount=($commision_percentage/100)*$admin_amount;
				$admin_amount=$admin_amount-$payout_amount;
				$this->add_payout($file,$value['agent_id'],$payout_amount);
			}


			//
			// continue;
			// parent::insert([
			// 				'customer_id' => $lead['customer_id'],
			// 				''

			// 				]);
		}
	
		$this->Lead_Model->update_status('approved',$lead_id);
		

		//print_r($agent_ids);
	}


	public function change_status($payout_id,$status){
		parent::update(['payout_status' => $status],['payout_id' => $payout_id]);
	}

	public  function add_payout($file,$agent_id,$payout_amount){
		//$data['admin_percentage']=$file['bank_deals_with'][$file['product']]['payout'];
		$data['payout_amount']=$payout_amount;
		$data['product']=$file['product'];
		$data['file_id']=$file['file_id'];
		$data['bank_id']=$file['bank_id'];
		$data['lead_id']=$file['lead_id'];
		$data['amount_disbursed']=$file['amount_disbursed'];
		$data['payout_status']='pending';
		$data['agent_id']=$agent_id;
		$data['customer_id']=$file['customer_id'];
		parent::insert($data);
		//echo $this->db->last_query();
	}

	public  function filter_where($where)
	{
		if(isset($where) && !empty($where)) foreach($where as $key =>$value){
			if($key == 'agent_id' || $key == 'customer_id' || $key == 'payout_id' || $key == 'lead_id'){
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'role.'.$tempk]=$temp;
			}
		}
		return $where;
	}	
}