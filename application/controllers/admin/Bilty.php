<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilty extends MY_Controller {

	public $module_name;
	public $module_slug;
	public function __construct(){
	  parent::__construct();
      if($this->session->userdata('user')!='Admin'){\
        redirect('login');
      }
	  $this->module_name='Bilty';
	  $this->module_slug='bilty';	
	  $this->template_folder='bilty'; 
	 $this->load->model(['Bilty_Model','Trip_Model']);
	  
    }
    
	public function index($trip_id) 
	{
		$data['page_title']=$this->module_name.' Listing';
		$data['bilties']=$this->Bilty_Model->get_all_where(['trip_id' => $trip_id]);
        $trip=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
        $data['trip']=$trip[0];
        
        $this->load->view('inc/header',$data);
        $this->load->view('bilty/list',$data);
        $this->load->view('inc/footer',$data);
	}

    public function add($trip_id) 
    {

        if($_POST){
            $bilty=$_POST['bilty'];
            try{
                $bilty['total_detail']=json_encode($_POST['detail']);
                $result=$this->Bilty_Model->insert($bilty);
                echo json_encode(["success" =>"true","url" => site_url('admin/bilty/index/'.$trip_id.'/')]);
            }
            catch(Exception $e){
                     //           echo $this->db->last_query();
                echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
            }
            return;
        }
        $trip=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
        $data['trip']=$trip[0];
        $data['page_title']='Add '.$this->module_name;
        $this->load->view('inc/header',$data);
        $this->load->view($this->template_folder.'/add',$data);
        $this->load->view('inc/footer',$data);
    }

    public function edit($trip_id,$id) 
    {
         if($_POST){
            $bilty=$_POST['bilty'];
            try{
                $bilty['total_detail']=json_encode($_POST['detail']);
                $this->Bilty_Model->update($bilty,['bilty_id' => $id]);
                echo json_encode(["success" =>"true","url" => site_url('admin/bilty/index/'.$trip_id.'/')]);
            }
            catch(Exception $e){
                echo json_encode(["success" =>"false","msg" =>  $e->getMessage()]);
            }
            return;
        }
        $data['page_title']='Edit '.$this->module_name;
        $trip=$this->Trip_Model->get_all_where(['trip_id' => $trip_id]);
        $data['trip']=$trip[0];
        $data['bilty']=$this->Bilty_Model->get_all_where(['bilty_id' => $id]);
        $data['bilty']=$data['bilty'][0];
        $data['detail']=$data['bilty']['total_detail'];
        $this->load->view('inc/header',$data);
        $this->load->view($this->template_folder.'/add',$data);
        $this->load->view('inc/footer',$data);
    }
 
}
