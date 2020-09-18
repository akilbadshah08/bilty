<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends MY_Controller {

	public $module_name;
	public $module_slug;
	public function __construct(){
	  parent::__construct();
	  $this->module_name='Trip';
	  $this->module_slug='trip';	
	  $this->template_folder='trip'; 
	  $this->load->model(['Bilty_Model','Trip_Model','Expenses_Model']);
    }
    

    public function index(){
        $data['page_title']='List Expenses' ;
        $data['expenses']=$this->Expenses_Model->get_all_where([1=>1]);
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/list',$data);
        $this->load->view('inc/footer',$data);
    }
    public function add() 
    {
    	 if($_POST){
    		$expenses=$_POST['expenses'];
    		try{
                $expenses['date']=date('Y-m-d');
	    		$result=$this->Expenses_Model->insert($expenses);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/expenses/')]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Add Expenses';
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/add',$data);
        $this->load->view('inc/footer',$data);
    }
    public function edit($id) 
    {
    	 if($_POST){
    		$expenses=$_POST['expenses'];
    		try{
                $expenses['date']=date('Y-m-d');
	    		$this->Expenses_Model->update($expenses,['expenses_id' => $id]);
	    		echo json_encode(["success" =>"true","url" => site_url('admin/expenses/')]);
    		}
    		catch(Exception $e){
    			echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
    		}
    		return;
    	}
       $data['page_title']='Edit Expenses';
        $data['expenses']=$this->Expenses_Model->get_all_where(['expenses_id' => $id]);
       $data['expenses']=$data['expenses'][0];
        $this->load->view('inc/header',$data);
        $this->load->view('expenses/add',$data);
        $this->load->view('inc/footer',$data);
    }

}
