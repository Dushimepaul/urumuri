<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
*/

class Dashboard extends My_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        // Récupérer toutes les catégories en une seule requête
        $this->db->select('id, nom');
        $categories = $this->db->get('categories_membre')->result_array();
        
        // Créer un tableau associatif [nom_categorie => id]
        $category_ids = [];
        foreach ($categories as $category) {
            $category_ids[$category['nom']] = $category['id'];
        }
        
        // Initialiser les compteurs des membres
        $members_fondateurs = 0;
        $members_adherants = 0;
        $members_honneur = 0;
        $members_sympathisants = 0;
        
        // Compter les membres pour chaque catégorie trouvée
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
        
        if (isset($category_ids['Membres d\'honneur'])) {
            $members_honneur = $this->Model->count('membres', [
                'categories_membre_id' => $category_ids['Membres d\'honneur'],
                'statut' => 'actif'
            ]);
        }
        
        if (isset($category_ids['Membres sympathisants'])) {
            $members_sympathisants = $this->Model->count('membres', [
                'categories_membre_id' => $category_ids['Membres sympathisants'],
                'statut' => 'actif'
            ]);
        }
        
        // Calculer le total des membres actifs
        $members_total = $members_fondateurs + $members_adherants + $members_honneur + $members_sympathisants;
        
        // Récupérer les autres statistiques
        $contact_count = $this->Model->count('contact_us');
        $projects_completed = $this->Model->count('projects', ['status' => 'completed']);
        $projects_in_progress = $this->Model->count('projects', ['status' => 'ongoing']);
        
        // Statistiques des dons
        $dons_total = $this->Model->count('dons');
        $dons_financiers = $this->Model->count('dons_financiers');
        $dons_materiels = $this->Model->count('dons_materiels');
        $competences = $this->Model->count('dons_competences');
        $dons_remis = $this->Model->count('dons', ['statut' => 'valide']);
        $dons_non_remis = $this->Model->count('dons', ['statut' => 'en_attente']);
        
        // Statistiques supplémentaires (si vous voulez les utiliser)
        $events_active = $this->Model->count('events', ['IsActive' => 1]);
        $testimonies_approved = $this->Model->count('testimonies', ['status' => 'approved']);
        $testimonies_pending = $this->Model->count('testimonies', ['status' => 'pending']);
        $newsletter_count = $this->Model->count('newsletter');
        $volunteers_count = $this->Model->count('volunteers');
        $gallery_count = $this->Model->count('gallery');
        
        // Préparer les données pour la vue
        $data = [
            // Statistiques principales
            'contact_count' => $contact_count,
            'projects_completed' => $projects_completed,
            'projects_in_progress' => $projects_in_progress,
            
            // Dons
            'dons_total' => $dons_total,
            'dons_financiers' => $dons_financiers,
            'dons_materiels' => $dons_materiels,
            'competences' => $competences,
            'dons_remis' => $dons_remis,
            'dons_non_remis' => $dons_non_remis,
            
            // Membres
            'members_total' => $members_total,
            'members_fondateurs' => $members_fondateurs,
            'members_adherants' => $members_adherants,
            'members_honneur' => $members_honneur,
            'members_sympathisants' => $members_sympathisants,
            
            // Autres statistiques (optionnelles)
            'events_active' => $events_active,
            'testimonies_approved' => $testimonies_approved,
            'testimonies_pending' => $testimonies_pending,
            'newsletter_count' => $newsletter_count,
            'volunteers_count' => $volunteers_count,
            'gallery_count' => $gallery_count,
        ];
        
        // Charger la vue avec les données
        $this->load->view('Dashboard_View', $data);
    }
}