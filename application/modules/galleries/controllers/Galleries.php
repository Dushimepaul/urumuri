<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }

    
    public function index()
    {
        $data['galleries'] = $this->Model->read('gallery', null, 'IdGallery');
        $this->load->view('galleries_views', $data);
    }

    function GalleriesDetail($GalleryDetail){
        $IdGallery = explode('_', $GalleryDetail);
        $data['detail'] = $this->Model->readOne('gallery', ['IdGallery' => $IdGallery[0]]);
        $this->load->view('GalleriesDetail_View', $data);
    }

    function SaveDetail(){
        $IdGallery = $this->input->post('IdGallery');
        $Description = $this->input->post('Description');
        
        $rsp = $this->Model->update('gallery', 
            ['IdGallery' => $IdGallery], 
            ['Description' => $Description]
        );
        
        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             Content updated successfully.
                         </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
                         </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Galleries'));
    }

    function Create(){
        $TypeMedia = $this->input->post('TypeMedia');
        $Description = $this->input->post('Description');
        
        // Gestion du média selon le type
        if ($TypeMedia == 'link') {
            $Media = $this->input->post('Link');
        } else {
            // Pour image ou video, on upload le fichier
            $Media = $this->upload_document($_FILES['Media']['tmp_name'], $_FILES['Media']['name']);
        }

        $data = array(
            'TypeMedia' => $TypeMedia,
            'Media' => $Media,
            'Description' => $Description
        );
        
        $rsp = $this->Model->create('gallery', $data);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             Content created successfully.
                         </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
                         </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Galleries'));
    }

    function Update(){
        $IdGallery = $this->input->post('IdGallery');
        $TypeMedia = $this->input->post('TypeMedia');
        $Description = $this->input->post('Description');
        
        // Gestion du média selon le type
        if ($TypeMedia == 'link') {
            $Media = $this->input->post('Link');
            $data = array(
                'TypeMedia' => $TypeMedia,
                'Media' => $Media,
                'Description' => $Description
            );
        } else {
            // Pour image ou video
            if (!empty($_FILES['Media']['name'])) {
                $Media = $this->upload_document($_FILES['Media']['tmp_name'], $_FILES['Media']['name']);
            } else {
                $Media = $this->input->post('HiddenMedia');
            }
            
            $data = array(
                'TypeMedia' => $TypeMedia,
                'Media' => $Media,
                'Description' => $Description
            );
        }

        $rsp = $this->Model->update('gallery', ['IdGallery' => $IdGallery], $data);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             Content updated successfully.
                         </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
                         </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Galleries'));
    }

    function Delete(){
        $IdGallery = $this->input->post('IdGallery');
        
        // Récupérer l'entrée pour supprimer le fichier si nécessaire
        $gallery_item = $this->Model->readOne('gallery', ['IdGallery' => $IdGallery]);
        
        // Supprimer le fichier s'il s'agit d'une image ou vidéo
        if ($gallery_item && in_array($gallery_item->TypeMedia, ['image', 'video'])) {
            $file_path = FCPATH . 'attachments/Gallery/' . $gallery_item->Media;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        $rsp = $this->Model->delete('gallery', ['IdGallery' => $IdGallery]);

        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             Content deleted successfully.
                         </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-background fade show mt-1 message" role="alert">
                             <strong class="text-danger">Oups!</strong> An unknown error, contact admin!.
                         </div>';
        }
        $this->session->set_flashdata($sms);
        redirect(base_url('Galleries'));
    }

    // Upload documents
    public function upload_document($nom_file, $nom_champ)
    {
        $ref_folder = FCPATH . 'attachments/Gallery/';
        $code = date("YmdHis") . uniqid();
        $fichier = basename($code);
        $file_extension = pathinfo($nom_champ, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        
        // Extensions valides pour images et vidéos
        $valid_ext_images = array('gif', 'jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        $valid_ext_videos = array('mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'MP4', 'AVI', 'MOV');
        $valid_ext = array_merge($valid_ext_images, $valid_ext_videos);

        if (!in_array($file_extension, $valid_ext)) {
            // Gérer l'erreur d'extension invalide
            return false;
        }

        if (!is_dir($ref_folder)) {
            mkdir($ref_folder, 0777, TRUE);
        }
        
        move_uploaded_file($nom_file, $ref_folder . $fichier . "." . $file_extension);
        $media_name = $fichier . "." . $file_extension;
        
        return $media_name;
    }
    
    // Fonction pour extraire l'ID YouTube d'un lien
    function extractYouTubeId($url) {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : false;
    }
    
    // Fonction pour générer l'embed URL YouTube
    function getYouTubeEmbedUrl($url) {
        $videoId = $this->extractYouTubeId($url);
        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }
        return $url;
    }
}