<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // $this->not_logged_in();
    }

    
	public function index()
	{
		$data['projects']=$this->Model->read('projects',null,'id');
		$this->load->view('projects_View',$data);
	
	}


	public function ChangeStatus()
{
    $id     = $this->input->post('id');
    $status = $this->input->post('status');

    // Bascule du statut
    if ($status === 'ongoing') {
        $new_status = 'completed';
    } else {
        $new_status = 'ongoing';
    }

    $rsp = $this->Model->update(
        'projects',
        ['id' => $id],
        ['status' => $new_status]
    );

    if ($rsp) {
        $this->session->set_flashdata([
            'sms' => '<div class="alert alert-success mt-1 message">
                        Statut du projet mis à jour avec succès.
                      </div>'
        ]);
    } else {
        $this->session->set_flashdata([
            'sms' => '<div class="alert alert-danger mt-1 message">
                        <strong>Oups !</strong> Erreur inconnue, contactez l’administrateur.
                      </div>'
        ]);
    }

    redirect(base_url('projects'));
}



	function Createprojects(){
		$title=$this->input->post('title');
		$description=$this->input->post('description');
		$image=$this->upload_document($_FILES['image']['tmp_name'],$_FILES['image']['name']);

		$data=array('title'=>$title,
	                'description'=>$description,
	                'image'=>$image,
	                
	               );
		$rsp=$this->Model->create('projects',$data);

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
		redirect(base_url('projects'));

		// print_r($data);
	}

	function Updateprojects(){
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$description=$this->input->post('description');
       
		if (!empty($_FILES['image']['name'])) {
		  $image=$this->upload_document($_FILES['image']['tmp_name'],$_FILES['image']['name']);
		}else{
		  $image=$this->input->post('HiddenImage');
		}
		

		$data=array('title'=>$title,
	                'description'=>$description,
	                'image'=>$image,
	                
	               );
		$rsp=$this->Model->update('projects',['id'=>$id],$data);

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
		redirect(base_url('projects'));
	}


	function Deleteprojects(){
		$id=$this->input->post('id');
		$rsp=$this->Model->delete('projects',['id'=>$id]);

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
		redirect(base_url('projects'));
	}







	  //upload images
	public function upload_document($nom_file,$nom_champ)
	{
	      $ref_folder =FCPATH.'attachments/projects/';
	      $code=date("YmdHis").uniqid();
	      $fichier=basename($code);
	      $file_extension = pathinfo($nom_champ, PATHINFO_EXTENSION);
	      $file_extension = strtolower($file_extension);
	      $valid_ext = array('gif','jpg','png','jpeg','JPG','PNG','JPEG');

	      if(!is_dir($ref_folder)) //create the folder if it does not already exists   
	      {
	          mkdir($ref_folder,0777,TRUE);                                        
	      }  
	      move_uploaded_file($nom_file, $ref_folder.$fichier.".".$file_extension);
	      // $pathfile="attachments/shop_images/".$fichier.".".$file_extension;
	      $image_name=$fichier.".".$file_extension;
	      return $image_name;
	}
}
