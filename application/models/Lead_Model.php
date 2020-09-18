<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_Model extends MY_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(['Customer_Model','Agent_Model','Lead_Transfer_Model','Lead_Internal_Transfer_Model','Lead_Status_Log_Model','Internal_Lead_Assignment_Model']);
	}
	public function get_assign_leads($agent_id,$user_id, $is_json = false){

		$lead_ids=$this->Internal_Lead_Assignment_Model->get_all_where(['lm_internal_lead_assignment.user_id' => $user_id]);
		// print_r($lead_ids);
		// die;
		// echo $this->db->last_query();
		// die;
		$lead_ids=array_column($lead_ids, 'lead_id');
		if(isset($_GET['start'])){
			$this->db->limit(10, $_GET['start']); 
		}
        $this->db->select('lm_lead.*, lm_product.*, lm_agent.*,concat(lm_user.first_name,lm_user.last_name) as agent_user_name, lm_loan_type.*, lm_customer.first_name, lm_customer.last_name, lm_customer.email, lm_customer.mobile');
		$this->db->join($this->table_prefix."customer", $this->table_prefix."customer.id = ".$this->table_prefix."lead.customer_id", 'left');
		$this->db->join($this->table_prefix."product", $this->table_prefix."product.product_id = ".$this->table_prefix."lead.product_id", 'left');
		//$this->db->join($this->table_prefix."city", $this->table_prefix."city.city_id = ".$this->table_prefix."customer.customer_city", 'left');
		//$this->db->join($this->table_prefix."state", $this->table_prefix."state.state_id = ".$this->table_prefix."customer.customer_state", 'left');
		$this->db->join($this->table_prefix."agent", $this->table_prefix."agent.agent_id = ".$this->table_prefix."lead.agent_id", 'left');
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."lead.agent_user_id", 'left');
		$this->db->join($this->table_prefix."loan_type", $this->table_prefix."loan_type.loan_type_id = ".$this->table_prefix."lead.sub_product_id", 'left');

		$this->db->from($this->table_prefix.'lead');

      //  $this->db->order_by("lm_lead.id", "DESC");

		$this->db->where_in('lm_lead.id',$lead_ids);		
		
		return $this->get($is_json);
		
	}
	
	public function get_all_where($where,$is_json=false){
		  
		if(isset($where['agent_id'])){
			$agent_childs=$this->Agent_Model->get_all_where(['agent_parent_id' => $where['agent_id']]);

		}
		if(isset($_GET['start'])){
			$this->db->limit(10, $_GET['start']); 
		}
        $this->db->select('lm_lead.*, lm_product.*, lm_agent.*,concat(lm_user.first_name,lm_user.last_name) as agent_user_name, lm_loan_type.*, lm_customer.first_name, lm_customer.last_name, lm_customer.email, lm_customer.mobile');
		$this->db->join($this->table_prefix."customer", $this->table_prefix."customer.id = ".$this->table_prefix."lead.customer_id", 'left');
		$this->db->join($this->table_prefix."product", $this->table_prefix."product.product_id = ".$this->table_prefix."lead.product_id", 'left');
		$this->db->join($this->table_prefix."agent", $this->table_prefix."agent.agent_id = ".$this->table_prefix."lead.agent_id", 'left');
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."lead.agent_user_id", 'left');
		$this->db->join($this->table_prefix."loan_type", $this->table_prefix."loan_type.loan_type_id = ".$this->table_prefix."lead.sub_product_id", 'left');


        $this->db->order_by("lm_lead.id", "DESC");

		$query=$this->db->from($this->table_prefix.'lead')->where($this->filter_where($where));
		if(isset($where['agent_id'])){
			
			if(!empty($agent_childs)){ 
				$agent_childs=array_column($agent_childs, 'agent_id');
				$this->db->or_where_in('lm_lead.agent_id',$agent_childs);
			}
		}
		 return $this->get($is_json);
		 
	}

	public function get_leads_by_lead_ids($leads_ids,$is_json=false){

        $this->db->select('lm_lead.*, lm_product.*, lm_agent.*,concat(lm_user.first_name,lm_user.last_name) as agent_user_name, lm_loan_type.*, lm_customer.first_name, lm_customer.last_name, lm_customer.email, lm_customer.mobile');
		$this->db->join($this->table_prefix."customer", $this->table_prefix."customer.id = ".$this->table_prefix."lead.customer_id", 'left');
		$this->db->join($this->table_prefix."product", $this->table_prefix."product.product_id = ".$this->table_prefix."lead.product_id", 'left');
		//$this->db->join($this->table_prefix."city", $this->table_prefix."city.city_id = ".$this->table_prefix."customer.customer_city", 'left');
		//$this->db->join($this->table_prefix."state", $this->table_prefix."state.state_id = ".$this->table_prefix."customer.customer_state", 'left');
		$this->db->join($this->table_prefix."agent", $this->table_prefix."agent.agent_id = ".$this->table_prefix."lead.agent_id", 'left');
		$this->db->join($this->table_prefix."user", $this->table_prefix."user.user_id = ".$this->table_prefix."lead.agent_user_id", 'left');
		$this->db->join($this->table_prefix."loan_type", $this->table_prefix."loan_type.loan_type_id = ".$this->table_prefix."lead.sub_product_id", 'left');


        $this->db->order_by("lm_lead.id", "DESC");

		$query=$this->db->from($this->table_prefix.'lead')->where_in('lm_lead.id',$leads_ids);
		return $this->get($is_json);
	}

	public  function filter_where($where){
		if(isset($where) && !empty($where)) foreach($where as $key =>$value){
			if($key == 'id' || $key == 'user_id' || $key =='agent_id'){
				$temp=$value;
				$tempk=$key;
				unset($where[$key]);
				$where[$this->table_prefix.'lead.'.$tempk]=$temp;
			}
		}
		return $where;
	}


	public function insert($data,$redirect_url='')
	{

		$customer=!empty($data['customer'])?$data['customer']:[];
		$lead=!empty($data['lead'])?$data['lead']:[];
		$customer_info=[];
	/*	print_r($data);*/
		$this->db->trans_start();

		if(!empty($customer)){
			if(!empty($customer['customer_id']))
			{
			/*	echo "if block";*/
				$lead['customer_id']=$customer['customer_id'];
				unset($customer['customer_id']);
				$this->Customer_Model->update($customer,['customer_id' =>$lead['customer_id']]);	
			} 
			else
			{

				$this->Customer_Model->insert($customer);
				if(!empty($lead)){
					$lead['customer_id']=$this->db->insert_id();
				}
				$id = $this->db->insert_id();
				$customer_info=$customer;
				$customer_info['id']=$id;
			}

		}

		if(!empty($lead)){
			parent::insert($lead);
			$id = $this->db->insert_id();
					
		}
		
		$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
			{
			    return Response(['status' => 'false','msg' => "Internal Error"]);
			}
			else
			{
				$CI=get_instance();

				return Response(['status' => 'true','customer_info' => $customer_info,'csrf'=> $CI->csrf_generator(),'msg' => "Successfuly Added",'url' => site_url($redirect_url.$id.'/1?r=added')]);
			}	


	}
	public function update_applicant($data,$where,$redirect_url='')
	{
		/*print_r($where);
*/		/* die(); */
		$customer=$data['customer'];
		$this->db->trans_start();
		$this->Customer_Model->update($customer,$where);	
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} 
		else
		{
			//echo "success";
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => $redirect_url.'?r=updated']);
		}

	}
	public function update_status($status,$lead_id)
	{    
		
		parent::update(['loan_status' => $status],['id' => $lead_id]);
		$this->Lead_Status_Log_Model->insert(['lead_id' => $lead_id, 'status' => $status,'date' => date('Y-m-d')]);
		
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} 
		else
		{

			return Response(['status' => 'true','msg' => "Successfuly Added",'url' =>site_url().'/'.$this->uri->segment(1).'/lead']);
		}
	}
	public function lead_assign($agent_id,$from_agent,$where,$redirect_url='')
	{
	
		$this->db->trans_start();
		$this->Lead_Transfer_Model->insert(['lead_id' => $where['id'], 'from' => $from_agent ,'to' => $agent_id,'date' => date('Y-m-d')]);
	
		parent::update(['agent_id' => $agent_id],$where);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} 
		else
		{
			//echo "success";
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => $redirect_url.'?r=updated']);
		}

	}
	public function internal_lead_assign($agent_user_ids,$where,$redirect_url='')
	{
	
		$this->db->trans_start();

		// Clear old entries
		$this->db->where(['lead_id' => $where['id']]);
		$this->db->delete('lm_internal_lead_assignment');
		

		foreach( $agent_user_ids as $agent_user_id ) {
			$this->Lead_Internal_Transfer_Model->insert(['lead_id' => $where['id'] ,'to' => $agent_user_id,'date' => date('Y-m-d')]);

			$this->Internal_Lead_Assignment_Model->insert(['lead_id' => $where['id'] ,'user_id' => $agent_user_id]);	
		}
		


		// parent::update(['agent_user_id' => $agent_user_id],$where);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} 
		else
		{
			//echo "success";
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => $redirect_url.'?r=updated']);
		}

	}

	
	public function update($data,$where,$redirect_url='')
	{   
		/*print_r($where);
*/		/* die(); */
		$lead=$data['lead'];
		// print_r($data);
		$this->db->trans_start();
		if(isset($data['customer']['customer_id'])){

			$customer=$data['customer'];
			/*echo "in the if block";*/	
			$this->Customer_Model->update($customer,['customer_id' =>$customer['customer_id']]);
			/*echo "in the if block";	*/
		}
	              
		parent::update($lead,$where); 
       
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return Response(['status' => 'false','msg' => "Internal Error"]);
		} 
		else
		{
			//echo "success";
			return Response(['status' => 'true','msg' => "Successfuly Added",'url' => $redirect_url.'?r=updated']);
		}

	}
	
}