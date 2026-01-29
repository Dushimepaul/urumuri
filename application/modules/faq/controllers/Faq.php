<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller{
    function __construct(){

        parent::__construct();
        //$this->not_logged_in();
        $this->load->model('Model');
    }
    function index(){
        
		$data['faq']=$this->Model->read('faq',null,'IdFaq');
        $this->load->view('faq_view',$data);
    }


    function ChangeStatus(){
	  $Id=$this->input->post('IdFaq');
	  $IsActive=$this->input->post('Status');
	  if ($IsActive==1) {
	  	$status=0;
	  }else{
	  	$status=1;
	  }
	  $rsp=$this->Model->update('faq',['IdFaq'=>$Id],['Status'=>$status]);

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
		redirect(base_url('Faq'));	
	}



    function Create_faq(){
        $Question=$this->input->post('Question');
        $Response=$this->input->post('Response');

        $data=array(
            'Question'=>$Question,
            'Response'=>$Response
        );
             $rps=$this->Model->create('faq',$data);
    

    
		if ($rsp) {
			$sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     Content created successfully.
						 </div>';
		}
        else{
            $sms['sms']='<div class="alert alert-background fade show mt-1 message" role="alert">
						     <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
						 </div>';

                             }
        $this->session->set_flashdata($sms);
        redirect(base_url('faq'));
    


   
    }

    function update_faq(){
        $IdFaq=$this->input->post('IdFaq');
        $Question=$this->input->post('Question');
		$Response=$this->input->post('Response');

         $data=array(
            'Question'=>$Question,
            'Response'=>$Response,
        );
        $rsp=$this->Model->update('faq',['IdFaq'=>$IdFaq],$data);

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
		redirect(base_url('faq'));
		
    }

    function supprimer_faq(){
		$IdFaq=$this->input->post('IdFaq');
		$rsp=$this->Model->delete('faq',['IdFaq'=>$IdFaq]);

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
		redirect(base_url('faq'));
    }
}