<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/

class Dashboard extends My_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('Admin');
        }
    }

    public function index()
    {   
        // 1. RÉCUPÉRATION DES CATÉGORIES
        $this->db->select('id, nom');
        $categories = $this->db->get('categories_membre')->result_array();
        
        $category_ids = [];
        foreach ($categories as $category) {
            $category_ids[$category['nom']] = $category['id'];
        }
        
        // 2. COMPTAGE DES MEMBRES PAR CATÉGORIE
        $members_fondateurs = 0;
        $members_adherants = 0;
        $members_honneur = 0;
        $members_sympathisants = 0;
        
        if (isset($category_ids['Membres fondateurs'])) {
            $members_fondateurs = $this->Model->count('membres', [
                'categories_membre_id' => $category_ids['Membres fondateurs'],
                'statut' => 'actif'
            ]);
        }
        
        if (isset($category_ids['Membres adhérents'])) {
            $members_adherants = $this->Model->count('membres', [
                'categories_membre_id' => $category_ids['Membres adhérents'],
                'statut' => 'actif'
            ]);
        }
        
        // Notez l'apostrophe courbe ici : ’
        $label_honneur = "Membres d’honneur"; 

         if (isset($category_ids[$label_honneur])) {
      $members_honneur = $this->Model->count('membres', [
        'categories_membre_id' => $category_ids[$label_honneur],
        'statut' => 'actif'
        ]);
       }
        
        if (isset($category_ids['Membres sympathisants'])) {
            $members_sympathisants = $this->Model->count('membres', [
                'categories_membre_id' => $category_ids['Membres sympathisants'],
                'statut' => 'actif'
            ]);
        }
        
        // Calcul du total
        $members_total = $members_fondateurs + $members_adherants + $members_honneur + $members_sympathisants;
        
        // 3. PRÉPARATION DU TABLEAU DATA
        $data = [
            // Statistiques principales
            'message_non_lus' => $this->Model->count('contact_us',['is_readed' => 1]),
            'contact_count'        => $this->Model->count('contact_us'),
            'projects_completed'   => $this->Model->count('projects', ['status' => 'completed']),
            'projects_in_progress' => $this->Model->count('projects', ['status' => 'ongoing']),
            
            // Dons
            'dons_total'      => $this->Model->count('dons'),
            'dons_financiers' => $this->Model->count('dons_financiers'),
            'dons_materiels'  => $this->Model->count('dons_materiels'),
            'competences'     => $this->Model->count('dons_competences'),
            'dons_remis'      => $this->Model->count('dons', ['statut' => 'valide']),
            'dons_non_remis'  => $this->Model->count('dons', ['statut' => 'en_attente']),
            
            // Membres
            'members_total'         => $members_total,
            'members_fondateurs'    => $members_fondateurs,
            'members_adherants'     => $members_adherants,
            'members_honneur'       => $members_honneur,
            'members_sympathisants' => $members_sympathisants,
            
            // Autres
            'newsletter_count' => $this->Model->count('newsletter'),
            'gallery_count'    => $this->Model->count('gallery'),
        ];

        // 4. STATISTIQUES DES VISITEURS (LOGS)
        
        // Visiteurs uniques aujourd'hui
        $data['today_visitors'] = $this->db
            ->select('ip_address')
            ->distinct()
            ->where('visit_date', date('Y-m-d'))
            ->get('visitors_logs')
            ->num_rows();

        // Visiteurs uniques totaux
        $data['total_visitors'] = $this->db
            ->select('ip_address')
            ->distinct()
            ->get('visitors_logs')
            ->num_rows();

        // Visiteurs par pays
        $data['visitors_country'] = $this->db
            ->select('country, COUNT(*) as total')
            ->from('visitors_logs')
            ->group_by('country')
            ->get()
            ->result();

        // Visiteurs par jour (7 derniers jours)
        $data['visits_by_day'] = $this->db
            ->select('visit_date, COUNT(*) as total')
            ->from('visitors_logs')
            ->where('visit_date >=', date('Y-m-d', strtotime('-6 days')))
            ->group_by('visit_date')
            ->order_by('visit_date', 'ASC')
            ->get()
            ->result();

        // 5. CHARGEMENT DE LA VUE
        $this->load->view('Dashboard_View', $data);
    }
}