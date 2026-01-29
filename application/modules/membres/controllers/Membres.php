<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membres extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}
    public function index()

    {   
        // Récupérer tous les membres avec leurs catégories
        $data['membres'] = $this->Model->readQuery("
            SELECT m.*, cm.nom as nom
            FROM membres m
            LEFT JOIN categories_membre cm ON m.categories_membre_id = cm.id
            ORDER BY m.ordre_affichage ASC
        ");
        
        $data['categories'] = $this->Model->read('categories_membre');
        
        $this->load->view('Membres_View', $data);
    }

    function ChangeStatus(){
      $id = $this->input->post('id');
      $statut = $this->input->post('statut');
      
      // Toggle entre actif et inactif
      $new_status = ($statut == 'actif') ? 'inactif' : 'actif';
      
      $rsp = $this->Model->update('membres', ['id' => $id], ['statut' => $new_status]);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-success fade show mt-1 message fade show" role="alert">
                               Statut du membre mis à jour avec succès.
                           </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-danger fade show mt-1 message fade show" role="alert">
                               <strong class="text-danger">Oups!</strong> Une erreur est survenue.
                           </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Membres'));    
    }

    function Create(){
        $nom_complet = $this->input->post('nom_complet');
        $email = $this->input->post('email');
        $telephone = $this->input->post('telephone');
        $profil = $this->input->post('profil');
        $categories_membre_id = $this->input->post('categories_membre_id');
        $ordre_affichage = $this->input->post('ordre_affichage');
        
        // Gestion de l'image comme dans Carousel
        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $image = $this->upload_document($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        }

        $data = array(
            'nom_complet' => $nom_complet,
            'email' => $email,
            'telephone' => $telephone,
            'profil' => $profil,
            'categories_membre_id' => $categories_membre_id,
            'ordre_affichage' => $ordre_affichage,
            'image' => $image,
            'facebook' => $this->input->post('facebook'),
            'linkedln' => $this->input->post('linkedln'),
            'youtube' => $this->input->post('youtube'),
            'instagram' => $this->input->post('instagram'),
            'adresse' => $this->input->post('adresse')
        );

        $rsp = $this->Model->create('membres', $data);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-success fade show mt-1 message" role="alert">
                               Membre ajouté avec succès.
                           </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-danger fade show mt-1 message" role="alert">
                               Erreur lors de la création.
                           </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Membres'));
    }

    function Update(){
        $id = $this->input->post('id');
        
        if (!empty($_FILES['image']['name'])) {
            $image = $this->upload_document($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        } else {
            $image = $this->input->post('HiddenImage');
        }

        $data = array(
            'nom_complet' => $this->input->post('nom_complet'),
            'email' => $this->input->post('email'),
            'telephone' => $this->input->post('telephone'),
            'profil' => $this->input->post('profil'),
            'categories_membre_id' => $this->input->post('categories_membre_id'),
            'ordre_affichage' => $this->input->post('ordre_affichage'),
            'image' => $image,
            'facebook' => $this->input->post('facebook'),
            'linkedln' => $this->input->post('linkedln'),
            'youtube' => $this->input->post('youtube'),
            'instagram' => $this->input->post('instagram'),
            'adresse' => $this->input->post('adresse')
        );

        $rsp = $this->Model->update('membres', ['id' => $id], $data);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-success fade show mt-1 message" role="alert">
                               Informations du membre mises à jour.
                           </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-danger fade show mt-1 message" role="alert">
                               Erreur de mise à jour.
                           </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Membres'));
    }

    function Delete(){
        $id = $this->input->post('id');
        $rsp = $this->Model->delete('membres', ['id' => $id]);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-success fade show mt-1 message" role="alert">
                               Membre supprimé définitivement.
                           </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-danger fade show mt-1 message" role="alert">
                               Erreur lors de la suppression.
                           </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Membres'));
    }

    // Fonction d'upload adaptée au dossier membres
    public function upload_document($nom_file, $nom_champ)
    {
        $ref_folder = FCPATH.'attachments/membres/';
        $code = date("YmdHis").uniqid();
        $fichier = basename($code);
        $file_extension = strtolower(pathinfo($nom_champ, PATHINFO_EXTENSION));
        $valid_ext = array('gif','jpg','png','jpeg');

        if(!is_dir($ref_folder)) 
        {
            mkdir($ref_folder, 0777, TRUE);                                         
        }  
        move_uploaded_file($nom_file, $ref_folder.$fichier.".".$file_extension);
        return $fichier.".".$file_extension;
    }
}