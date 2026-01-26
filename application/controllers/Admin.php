<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/

class Admin extends MY_Controller {

	public function index()
	{
		$this->load->view('Login_View');
	}

	public function Login(){
		$this->load->view('Dashboard/Dashboard_View');
	}


	public function do_login($value = '')
{
    $username = $this->input->post('email');
    $password = $this->input->post('password');

    $checkUsername = $this->Model->check_email($username);
    
    if ($checkUsername == TRUE) {

        $login = $this->Model->login($username, $password);
        
        // Vérifier si $login existe et n'est pas vide
        if (!empty($login) && isset($login['is_active']) && $login['is_active'] != 0) {
            
            $result = $this->Model->readOne('users', ['id' => $login['id']]);
            
            // Vérifier si readOne retourne des résultats
            if (!empty($result)) {
                $role = $this->Model->readOne('roles', ['id' => $result['role_id']]); // Note: 'role_id' au lieu de 'id'
                $membres = $this->Model->readOne('membres', ['id' => $result['membre_id']]); // Note: 'membre_id' au lieu de 'id'
                
                // Vérifier si les données existent
                $user_name = !empty($membres['nom_complet']) ? $membres['nom_complet'] : $result['email'];
                $user_photo = !empty($membres['image']) ? $membres['image'] : 'default-avatar.jpg';
                $user_role = !empty($role['name']) ? $role['name'] : 'Utilisateur';
                
                $session = array(
                    'idUser' => $result['id'],
                    'email' => $result['email'],
                    'user' => $user_name,
                    'photo' => $user_photo,
                    'role' => $user_role,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($session);
                
                // Message de succès
                $this->session->set_flashdata('success', 'Connexion réussie ! Bienvenue ' . $user_name);
                
                redirect(base_url('Dashboard'));

            } else {

                 $this->session->set_flashdata([
                        'sms' => '<div class="alert alert-danger mt-1 message">
                        Impossible de récupérer les informations utilisateur.
                      </div>'
        ]);
                redirect(base_url('Admin'));
            }
        } else {
            $this->session->set_flashdata([
                        'sms' => '<div class="alert alert-danger mt-1 message">
                        <strong>Oups!</strong> Mot de passe incorrect ou compte non activé.
                      </div>']);
            redirect(base_url('Admin'));
        }
    } else {
          $this->session->set_flashdata([
                        'sms' => '<div class="alert alert-danger mt-1 message">
                        <strong>Oups!</strong> Email incorrect ou compte désactivé.
                      </div>']);

        redirect(base_url('Admin'));
    }
}

public function logout()
{
    // Détruire toutes les données de session
    $session_data = array(
        'idUser',
        'email', 
        'user',
        'photo',
        'role',
        'logged_in'
    );
    
    $this->session->unset_userdata($session_data);
    
    // OU détruire complètement la session
    $this->session->sess_destroy();
    
    // Message de déconnexion
    $this->session->set_flashdata('success', 
        '<div id="message" class="alert alert-success text-center">
            <strong>Déconnexion réussie !</strong> À bientôt.
        </div>'
    );
    
    redirect(base_url('Admin'));
}
}
