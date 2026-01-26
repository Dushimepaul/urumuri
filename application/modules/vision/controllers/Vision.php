<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *@author:    Dushime Paul
 * Email:    dushimeyesupaulin@gmail.com
*/

class Vision extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}
    
	public function index()
	{
		$data['vision']=$this->Model->read('vision',null,'id');
		$this->load->view('Vision_View',$data);
	}


	function CreateVision(){
		$Description=$this->input->post('Description');
		

		$data=array('content'=>$Description,
	               );
		$rsp=$this->Model->create('vision',$data);

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
		redirect(base_url('Vision'));
	}



	function UpdateVision(){
		$id=$this->input->post('id');
        $Description=$this->input->post('Description');
		
		

		$data=array('content'=>$Description,
	               );
		$rsp=$this->Model->update('vision',['id'=>$id],$data);

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
		redirect(base_url('vision'));
	}


	

	function DeleteVision(){
		$id=$this->input->post('id');
		$rsp=$this->Model->delete('vision',['id'=>$id]);

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
		redirect(base_url('vision'));
	}
}

