<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // Liste des utilisateurs
    public function index()
    {
        $data['users'] = $this->Model->read('users', null, 'id');
        $this->load->view('Users_View', $data);
    }

    // Création d’un utilisateur
    public function Create()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('pass_word');
        $role_id    = $this->input->post('role_id');
        $membre_id  = $this->input->post('membre_id');
        $is_active  = $this->input->post('is_active') ?? 1;

        // Vérifier si l'email existe déjà
        $existing = $this->Model->read('users', ['email' => $email]);
        if (!empty($existing)) {
            $this->session->set_flashdata('sms','<div class="alert alert-warning">Email déjà utilisé.</div>');
            redirect(base_url('Users'));
            return;
        }

        $data = [
            'email'     => $email,
            'pass_word' => password_hash($password, PASSWORD_BCRYPT),
            'role_id'   => $role_id,
            'membre_id' => $membre_id,
            'is_active' => $is_active
        ];

        $rsp = $this->Model->create('users', $data);

        if ($rsp) {
            $this->session->set_flashdata('sms','<div class="alert alert-success">Utilisateur créé avec succès.</div>');
        } else {
            $this->session->set_flashdata('sms','<div class="alert alert-danger">Erreur lors de la création.</div>');
        }

        redirect(base_url('Users'));
    }

    // Mise à jour d’un utilisateur
    public function Update()
    {
        $id = $this->input->post('id');
        $user = $this->Model->read('users', ['id' => $id]);
        if (!$user) {
            $this->session->set_flashdata('sms','<div class="alert alert-warning">Utilisateur non trouvé.</div>');
            redirect(base_url('Users'));
            return;
        }

        $email     = $this->input->post('email');
        $password  = $this->input->post('pass_word');
        $role_id   = $this->input->post('role_id');
        $membre_id = $this->input->post('membre_id');
        $is_active = $this->input->post('is_active') ?? 1;

        // Vérifier l'email unique
        $existing = $this->Model->read('users', ['email' => $email]);
        if (!empty($existing) && $existing[0]['id'] != $id) {
            $this->session->set_flashdata('sms','<div class="alert alert-warning">Email déjà utilisé par un autre utilisateur.</div>');
            redirect(base_url('Users'));
            return;
        }

        $data = [
            'email'     => $email,
            'role_id'   => $role_id,
            'membre_id' => $membre_id,
            'is_active' => $is_active,
            'updated_at'=> date('Y-m-d H:i:s')
        ];

        // Hash du mot de passe si changé
        if (!empty($password)) {
            $data['pass_word'] = password_hash($password, PASSWORD_BCRYPT);
        }

        $rsp = $this->Model->update('users', ['id' => $id], $data);

        if ($rsp) {
            $this->session->set_flashdata('sms','<div class="alert alert-success">Utilisateur mis à jour avec succès.</div>');
        } else {
            $this->session->set_flashdata('sms','<div class="alert alert-danger">Erreur lors de la mise à jour.</div>');
        }

        redirect(base_url('Users'));
    }

    // Suppression d’un utilisateur
    public function Delete()
    {
        $id = $this->input->post('id');

        $rsp = $this->Model->delete('users', ['id' => $id]);

        if ($rsp) {
            $this->session->set_flashdata('sms','<div class="alert alert-success">Utilisateur supprimé avec succès.</div>');
        } else {
            $this->session->set_flashdata('sms','<div class="alert alert-danger">Erreur lors de la suppression.</div>');
        }

        redirect(base_url('Users'));
    }
}
