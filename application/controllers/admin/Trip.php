<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends MY_Controller {

	public $module_name;
	public $module_slug;
	public function __construct(){
	  parent::__construct();
       if($this->session->userdata('user')!='Admin'){
        redirect('login');
      }
	  $this->module_name='Trip';
	  $this->module_slug='trip';	
	  $this->template_folder='trip'; 
	  $this->load->model(['Bilty_Model','Trip_Model','Expenses_Model']);
    }
    
	public function index() 
	{
        $data['page_title']=$this->module_name.' Listing';
        $data['trips']=$this->Trip_Model->get_all_where(['status' => 0]);
        $this->load->view('inc/header',$data);
        $this->load->view($this->template_folder.'/list',$data);
        $this->load->view('inc/footer',$data);
		
	}
    public function add() 
    {
        if($_POST){
            $trip=$_POST['trip'];
            try{
                $trip['date']=date('Y-m-d h:i:s');
                $result=$this->Trip_Model->insert($trip);
                echo json_encode(["success" =>"true","url" => site_url('admin/trip/edit/'.$result['id'])]);
            }
            catch(Exception $e){
                echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
            }
            return;
        }
        $data['page_title']='Add '.$this->module_name;
        $this->load->view('inc/header',$data);
        $this->load->view($this->template_folder.'/add',$data);
        $this->load->view('inc/footer',$data);
    }

    public function edit($id) 
    {
    	 if($_POST){
    		$trip=$_POST['trip'];
    		try{
                $trip['date']=date('Y-m-d h:i:s');
	    		$this->Trip_Model->update($trip,['trip_id' => $id]);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/trip/edit/'.$id)]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Edit '.$this->module_name;
       $data['trip']=$this->Trip_Model->get_all_where(['trip_id' => $id]);
       $data['trip']=$data['trip'][0];
	    $this->load->view('inc/header',$data);
    	$this->load->view($this->template_folder.'/add',$data);
    	$this->load->view('inc/footer',$data);
    }
    public function external($id) 
    {
    	 if($_POST){
    		$trip=$_POST['trip'];
    		try{
	    		$this->Trip_Model->update($trip,['trip_id' => $id]);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/trip/external/'.$id)]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Edit '.$this->module_name;
       $data['trip']=$this->Trip_Model->get_all_where(['trip_id' => $id]);
       $data['trip']=$data['trip'][0];
	    $this->load->view('inc/header',$data);
    	$this->load->view($this->template_folder.'/external',$data);
    	$this->load->view('inc/footer',$data);
    }


    public function expenses($trip_id){
    	$data['expenses']=$this->Expenses_Model->get_all_where(['trip_id' => $trip_id]);
        $data['page_title']='List Expenses' ;
        $data['trip']=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
        $data['trip']=$data['trip'][0];
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/trip/list',$data);
        $this->load->view('inc/footer',$data);
    }
    public function add_expenses($trip_id) 
    {
    	 if($_POST){
    		$expenses=$_POST['expenses'];
    		try{
                $expenses['date']=date('Y-m-d');
	    		$result=$this->Expenses_Model->insert($expenses);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/trip/expenses/'.$trip_id.'/')]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Add Expenses';
       $trip=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
       $data['trip']=$trip[0];
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/trip/add',$data);
        $this->load->view('inc/footer',$data);
    }
    public function edit_expenses($trip_id,$id) 
    {
    	 if($_POST){
    		$expenses=$_POST['expenses'];
    		try{
                $expenses['date']=date('Y-m-d');
	    		$this->Expenses_Model->update($expenses,['expenses_id' => $id]);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/trip/expenses/'.$trip_id.'/')]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Edit Expenses';
       $trip=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
        $data['trip']=$trip[0];
        $data['expenses']=$this->Expenses_Model->get_all_where(['expenses_id' => $id]);
       $data['expenses']=$data['expenses'][0];
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/trip/add',$data);
        $this->load->view('inc/footer',$data);
    }

}
