<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_membre extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}

    public function index()
    {
        $data['categories_membre'] = $this->Model->read('categories_membre',null,'id');
        $this->load->view('categories_membreView', $data);
    }

    
    public function Creer_categories_membre()
    {
        $data = [
            'nom'         => $this->input->post('nom', true),
            'description' => $this->input->post('description', true),
            'droit_vote'  => $this->input->post('droit_vote') ? 1 : 0
        ];

        $rsp = $this->Model->create('categories_membre', $data);

        $this->_setMessage($rsp, 'créée');
        redirect('categories_membre');
    }

    public function Update_categories_membre()
    {
        $id = $this->input->post('id');

        $data = [
            'nom'         => $this->input->post('nom', true),
            'description' => $this->input->post('description', true),
            'droit_vote'  => $this->input->post('droit_vote') ? 1 : 0
        ];

        $rsp = $this->Model->update(
            'categories_membre',
            ['id' => $id],
            $data
        );

        $this->_setMessage($rsp, 'mise à jour');
        redirect('categories_membre');
    }

    public function Supprimer_categories_membre()
    {
        $id = $this->input->post('id');

        $rsp = $this->Model->delete(
            'categories_membre',
            ['id' => $id]
        );

        $this->_setMessage($rsp, 'supprimée');
        redirect('categories_membre');
    }

   
    public function Toggle_droit_vote($id)
    {
        $cat = $this->Model->getOne(
            'categories_membre',
            ['id' => $id]
        );

        if (!$cat) {
            redirect('categories_membre');
        }

        $newStatus = $cat['droit_vote'] == 1 ? 0 : 1;

        $this->Model->update(
            'categories_membre',
            ['id' => $id],
            ['droit_vote' => $newStatus]
        );

        redirect('categories_membre');
    }

    /* ================= MESSAGE FLASH ================= */
    private function _setMessage($status, $action)
    {
        if ($status) {
            $this->session->set_flashdata('sms',
                '<div class="alert alert-success">Catégorie '.$action.' avec succès.</div>'
            );
        } else {
            $this->session->set_flashdata('sms',
                '<div class="alert alert-danger">Erreur, veuillez réessayer.</div>'
            );
        }
    }
}
