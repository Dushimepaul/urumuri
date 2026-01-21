<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/


class Home extends My_Controller
{
    /**

     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
    }


    public function index()
{   
    // Récupérer le dernier about_us
    $about_us_data = $this->Model->read('about_us', null, 'id_about_us', 'DESC', 1);
    $data['about_us'] = !empty($about_us_data) ? $about_us_data[0] : null;

    
     $data['totalprojectrealise']=$this->Model->count('projects',['status'=>'ongoing']);
     $data['totalprojectencours']=$this->Model->count('projects',['status'=>'completed']);


     $data['projects']=$this->Model->read('projects',['status'=>'completed'],'id',3);

    // Récupérer les carousels actifs
    $data['carousels'] = $this->Model->read('carousels', ['IsActive' => 1], 'IdCarousel');

    // Optionnel : partenaires actifs
    $data['parteners'] = $this->Model->read('partener', ['status' => 1], 'id_partner');

    $data['objectifs']=$this->Model->read('objectifs',null,'id_objectif');

    $data['news_media']=$this->Model->read('news_media',null,'id_news_media');
    $data['events'] = $this->Model->read('events', null, 'id');

    
        $data['testimony']=$this->Model->read('testimonies',null,'IdTestimony');

    // Charger la vue
    $this->load->view('Home_View', $data);
}


    public function AboutUs(){
        $about_us_data = $this->Model->read('about_us', null, 'id_about_us', 'DESC', 1);
        $data['about_us'] = !empty($about_us_data) ? $about_us_data[0] : null;

        

        $data['historique']=$this->Model->read('historique',['statut' => 1],'ordre_affichage','asc');

        

        $devise_data = $this->Model->read('devise', null, 'id_devise', 'DESC', 1);
    $data['devise'] = !empty($devise_data) ? $devise_data[0] : null;

    $mission_data = $this->Model->read('mission', null, 'id_mission', 'DESC', 1);
    $data['mission'] = !empty($mission_data) ? $mission_data[0] : null;

    $vision_data = $this->Model->read('vision', null, 'id', 'DESC', 1);
    $data['vision'] = !empty($vision_data) ? $vision_data[0] : null;

    $data['membres'] = $this->Model->read('membres', ['statut' => 1], 'ordre_affichage','asc');
        $this->load->view('AboutUs_View',$data);
    }

    public function ContactUs(){
        $this->load->view('ContactUs_View');
    }

    public function Actions(){
        
        $data['totalprojectrealise']=$this->Model->count('projects',['status'=>'ongoing']);
        $data['totalprojectencours']=$this->Model->count('projects',['status'=>'completed']);

        $data['projects']=$this->Model->read('projects',['status'=>'completed'],'id');

        $this->load->view('Actions_View',$data);
    }

    public function En_cours(){
        
        $data['totalprojectrealise']=$this->Model->count('projects',['status'=>'ongoing']);
        $data['totalprojectencours']=$this->Model->count('projects',['status'=>'completed']);

        $data['projects']=$this->Model->read('projects',['status'=>'ongoing'],'id');

        $this->load->view('En_cours_View',$data);
    }

    public function Actualite(){
        $data['Actualite']=$this->Model->read('news_media',null,'id_news_media');
        $this->load->view('Actualite_View',$data);
    }




    public function Events() {

    $today = date('Y-m-d');

    // Événements à venir : date_debut >= aujourd'hui
    $data['upcoming_events'] = $this->Model->read('events',['IsActive' => 1, 'date_debut >=' => $today],'date_debut','ASC'
    );

    // Événements passés : date_fin < aujourd'hui
    $data['past_events'] = $this->Model->read('events',['IsActive' => 1, 'date_fin <' => $today],
        'date_debut','DESC'
    );

    // Charger la vue
    $this->load->view('Events_View', $data);
}




    public function Involved(){
        $data['mode_payements'] = $this->Model->read('mode_payement', null, 'id_mode_payement');
        $this->load->view('get_involved_View',$data);
    }
    
    public function Galleries(){
        $data['galleries'] = $this->Model->read('gallery', null, 'IdGallery');
        $this->load->view('Galleries_View',$data);
    }
    


    public function Team(){
        $data['membres'] = $this->Model->read('membres', ['statut' => 1], 'ordre_affichage','asc');
        $this->load->view('Team_View',$data);

    }
    

    public function Objectifs(){
        $data['objectifs']=$this->Model->read('objectifs',null,'id_objectif');
        $this->load->view('Objectifs_View',$data);
    }

    public function Faq(){
        $data['faq']=$this->Model->read('faq',['Status' => 1],'IdFaq','asc');
        $this->load->view('Faq_View',$data);
    }
}
