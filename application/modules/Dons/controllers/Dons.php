<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dons extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}

    public function index() {
        $data['dons'] = $this->Model->read('dons', null, 'id','DESC');
        $data['methodes_paiement'] = $this->Model->read('mode_payement', null, 'id_mode_payement');
        $data['pays'] = $this->Model->read('pays', null, 'pays','ASC');
        $this->load->view('Dons_View', $data);
    }


   public function ChangeStatus() {
    $id = $this->input->post('id');
    $current_status = $this->input->post('current_status');

    // Bascule entre 'valide' et 'en_attente'
    $new_status = ($current_status == 'en_attente') ? 'valide' : 'en_attente';

    // Mise à jour de la colonne 'statut' (vérifiez que le nom de la colonne est bien 'statut')
    $rsp = $this->Model->update('dons', ['id' => $id], ['statut' => $new_status]);

    if ($rsp) {
        $sms['sms'] = '<div class="alert alert-success fade show mt-1 message fade show" role="alert">
                               Le statut a été mis à jour avec succès !
                           </div>';              
    } else {
        $sms['sms'] = '<div class="alert alert-success fade show mt-1 message fade show" role="alert">
                               <strong>Oups!</strong> Une erreur est survenue, contactez l\'administrateur.
                           </div>';                 
    }

    $this->session->set_flashdata($sms);
    redirect(base_url('Dons'));
}



     public function Create() {
 $nom        = $this->input->post('nom_complet', true);
    $email      = $this->input->post('email', true);
    $phone      = $this->input->post('telephone', true);
    $pays       = $this->input->post('pays', true);
    $type_don   = $this->input->post('type_don', true);
    $id_mode_payement = $this->input->post('id_mode_payement', true);

    // Vérifier si le donateur existe déjà
    $existing = $this->Model->read('dons', ['email' => $email]);

    if (!empty($existing)) {
        $don_id = $existing[0]['id'];
    } else {
        // Créer un nouveau donateur
        $data = [
            'nom_complet' => $nom,
            'email'       => $email,
            'telephone'   => $phone,
            'pays'        => $pays,
            'type_don'    => $type_don
        ];
        $don_id = $this->Model->createLastId('dons', $data);
    }

    $success = false;

    // Créer les détails selon le type de don
    switch ($type_don) {
        case 'financier':
            $financier = [
                'don_id'             => $don_id,
                'montant'            => $this->input->post('montant', true),
                'id_methode_paiement'=> $id_mode_payement,
                'is_mensuel'         => $this->input->post('paiement_recurrent') ? 1 : 0
            ];
            $success = $this->Model->create('dons_financiers', $financier);
            break;

        case 'materiel':
            $materiel = [
                'don_id'              => $don_id,
                'description_materiel'=> $this->input->post('description_materiel', true)
            ];
            $success = $this->Model->create('dons_materiels', $materiel);
            break;

        case 'competence':
            $competence = [
                'don_id'                  => $don_id,
                'description_contribution'=> $this->input->post('description_competence', true)
            ];
            $success = $this->Model->create('dons_competences', $competence);
            break;
    }

    if ($success) {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-success">Le don a été enregistré avec succès !</div>'
        );
    } else {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-danger">Erreur lors de l\'enregistrement du détail du don.</div>'
        );
    }

    redirect(base_url('Dons'));
    }

    public function Update() {
       $id = $this->input->post('id', true);
    $nom        = $this->input->post('nom_complet', true);
    $email      = $this->input->post('email', true);
    $phone      = $this->input->post('telephone', true);
    $pays       = $this->input->post('pays', true);

    $data = [
        'nom_complet' => $nom,
        'email'       => $email,
        'telephone'   => $phone,
        'pays'        => $pays
    ];

    $updated = $this->Model->update('dons', ['id' => $id], $data);

    if ($updated) {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-success">Donateur mis à jour avec succès !</div>'
        );
    } else {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-danger">Erreur lors de la mise à jour du donateur.</div>'
        );
    }


        redirect(base_url('Dons'));
    }

    public function Delete() {
       
    $id = $this->input->post('id', true);

    // Supprimer les détails associés selon le type
    $this->Model->delete('dons_financiers', ['don_id' => $id]);
    $this->Model->delete('dons_materiels', ['don_id' => $id]);
    $this->Model->delete('dons_competences', ['don_id' => $id]);


    $deleted = $this->Model->delete('dons', ['id' => $id]);

    if ($deleted) {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-success">Donateur supprimé avec succès !</div>'
        );
    } else {
        $this->session->set_flashdata('sms', 
            '<div class="alert alert-danger">Erreur lors de la suppression du donateur.</div>'
        );
    }

    redirect(base_url('Dons'));
    }




    public function Financiers() {
        // Lecture avec jointures pour avoir les noms des donateurs et modes de paiement
        $this->db->select('df.*, d.nom_complet,mp.description');
        $this->db->from('dons_financiers df');
        $this->db->join('dons d', 'd.id = df.don_id');
        $this->db->join('mode_payement mp', 'mp.id_mode_payement = df.id_methode_paiement', 'left');
        $this->db->order_by('df.id', 'DESC');
        $data['dons_f'] = $this->db->get()->result_array();

        // Pour les listes déroulantes des modals
        $data['donateurs'] = $this->Model->read('dons');
        $data['modes'] = $this->Model->read('mode_payement');

        $this->load->view('Dons_financier_View', $data);
    }

    
    public function UpdateFinanciers() {
        $id = $this->input->post('id');
        $data = [
            'don_id'              => $this->input->post('don_id'),
            'montant'             => $this->input->post('montant'),
            'id_methode_paiement' => $this->input->post('id_methode_paiement'),
            'is_mensuel'          => $this->input->post('is_mensuel') ? 1 : 0
        ];

        $this->Model->update('dons_financiers', ['id' => $id], $data);
        $this->session->set_flashdata('sms', '<div class="alert alert-info">Transaction mise à jour.</div>');
        redirect('Dons/Financiers');
    }

    public function DeleteFinanciers() {
        $id = $this->input->post('id');
        $this->Model->delete('dons_financiers', ['id' => $id]);
        $this->session->set_flashdata('sms', '<div class="alert alert-danger">Transaction supprimée.</div>');
        redirect('Dons/Financiers');
    }





    public function Competences() {
        // Jointure pour récupérer le nom du donateur depuis la table dons
        $this->db->select('dc.*, d.nom_complet, d.email');
        $this->db->from('dons_competences dc');
        $this->db->join('dons d', 'd.id = dc.don_id');
        $this->db->order_by('dc.id', 'DESC');
        $data['competences'] = $this->db->get()->result_array();

        // Récupérer la liste des donateurs pour le formulaire d'ajout
        $data['donateurs'] = $this->Model->read('dons');

        $this->load->view('Dons_Competences_View', $data);
    }


    public function UpdateCompetences() {
        $id = $this->input->post('id');
        $data = [
            'don_id'                   => $this->input->post('don_id'),
            'description_contribution' => $this->input->post('description_contribution')
        ];

        $this->Model->update('dons_competences', ['id' => $id], $data);
        $this->session->set_flashdata('sms', '<div class="alert alert-info">Description mise à jour.</div>');
        redirect('Dons/Competences');
    }

    public function DeleteCompetences() {
        $id = $this->input->post('id');
        $this->Model->delete('dons_competences', ['id' => $id]);
        $this->session->set_flashdata('sms', '<div class="alert alert-danger">Entrée supprimée.</div>');
        redirect('Dons/Competences');
    }





    public function Materiels() {
        // Lecture avec jointure pour afficher le nom du donateur
        $this->db->select('dm.*, d.nom_complet, d.telephone');
        $this->db->from('dons_materiels dm');
        $this->db->join('dons d', 'd.id = dm.don_id');
        $this->db->order_by('dm.id', 'DESC');
        $data['materiels'] = $this->db->get()->result_array();

        // Pour les listes déroulantes
        $data['donateurs'] = $this->Model->read('dons');

        $this->load->view('Dons_materiel_View', $data);
    }

    public function UpdateMateriels() {
        $id = $this->input->post('id');
        $data = [
            'don_id'               => $this->input->post('don_id'),
            'description_materiel' => $this->input->post('description_materiel')
        ];

        $this->Model->update('dons_materiels', ['id' => $id], $data);
        $this->session->set_flashdata('sms', '<div class="alert alert-info">Description du matériel mise à jour.</div>');
        redirect('Dons/Materiels');
    }

    public function DeleteMateriels() {
        $id = $this->input->post('id');
        $this->Model->delete('dons_materiels', ['id' => $id]);
        $this->session->set_flashdata('sms', '<div class="alert alert-danger">Enregistrement supprimé.</div>');
        redirect('Dons/Materiels');
    }
}