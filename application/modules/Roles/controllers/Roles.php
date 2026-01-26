<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/

class Roles extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
    }
}

    // Affichage des rôles
    public function index()
    {
        $data['roles'] = $this->Model->read('roles', null, 'id');
        $this->load->view('Roles_View', $data);
    }

    // Création d’un rôle
    public function Create()
    {
        $data = array(
            'name'         => $this->input->post('name'),
            'display_name' => $this->input->post('display_name'),
            'description'  => $this->input->post('description')
        );

        $rsp = $this->Model->create('roles', $data);

        if ($rsp) {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-success mt-1">Rôle créé avec succès.</div>'
            );
        } else {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-danger mt-1">Erreur lors de la création du rôle.</div>'
            );
        }

        redirect(base_url('Roles'));
    }

    // Mise à jour
    public function Update()
    {
        $id = $this->input->post('id');

        $data = array(
            'name'         => $this->input->post('name'),
            'display_name' => $this->input->post('display_name'),
            'description'  => $this->input->post('description')
        );

        $rsp = $this->Model->update('roles', ['id' => $id], $data);

        if ($rsp) {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-success mt-1">Rôle mis à jour avec succès.</div>'
            );
        } else {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-danger mt-1">Erreur lors de la mise à jour du rôle.</div>'
            );
        }

        redirect(base_url('Roles'));
    }

    // Suppression
    public function Delete()
    {
        $id = $this->input->post('id');

        // Vérifier si le rôle est utilisé
        $using_role = $this->Model->read('users', ['role_id' => $id]);
        if (!empty($using_role)) {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-warning mt-1">
                    Ce rôle ne peut pas être supprimé car il est attribué à un ou plusieurs enseignants.
                 </div>'
            );
            redirect(base_url('Roles'));
            return;
        }

        $rsp = $this->Model->delete('roles', ['id' => $id]);

        if ($rsp) {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-success mt-1">Rôle supprimé avec succès.</div>'
            );
        } else {
            $this->session->set_flashdata(
                'sms',
                '<div class="alert alert-danger mt-1">Erreur lors de la suppression du rôle.</div>'
            );
        }

        redirect(base_url('Roles'));
    }
}
