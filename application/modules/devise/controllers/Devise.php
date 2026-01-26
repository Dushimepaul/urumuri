<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devise extends MY_Controller {

	function __construct()
    {
        parent::__construct();
       if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}

    
	public function index()
	{
		$data['devise']=$this->Model->read('devise',null,'id_devise');
		$this->load->view('deviseView',$data);
	}

	  public function read(){
	  	$data=$this->Model->read('devise');
	  	echo json_encode($data);
	  }


	function Creer_devise(){
		$devise=$this->input->post('devise');
		

		$data=array('devise'=>$devise);
	               
		$rsp=$this->Model->create('devise',$data);

		if ($rsp) {
			$sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     Content created successfully.
						 </div>';
		}else{
            $sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
						 </div>';
		}
		$this->session->set_flashdata($sms);
		redirect(base_url('devise'));
	}



	function Update_devise(){
		$id=$this->input->post('id_devise');
        $devise=$this->input->post('devise');
		
		

		$data=array('devise'=>$devise,
	               );
		$rsp=$this->Model->update('devise',['id_devise'=>$id],$data);

		if ($rsp) {
			$sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     Content updated successfully.
						 </div>';
		}else{
            $sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
						 </div>';
		}
		$this->session->set_flashdata($sms);
		redirect(base_url('devise'));
	}


	

	function Supprimer_mision(){
		$id=$this->input->post('id_devise');
		$rsp=$this->Model->delete('devise',['id_devise'=>$id]);

		if ($rsp) {
			$sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     Content deleted successfully.
						 </div>';
		}else{
            $sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
						 </div>';
		}
		$this->session->set_flashdata($sms);
		redirect(base_url('devise'));
	}
}
