<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/

class Donation extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email'); 
        $this->load->helper('url');   
    }

    public function index()
    {
        $type_don = $this->input->post('type_don');
        $montant = $this->input->post('montant');
        $nom = $this->input->post('nom_complet');
        $email = $this->input->post('email');
        $phone = $this->input->post('telephone');
        $pays = $this->input->post('pays');
        $is_mensuel = $this->input->post('paiement_recurrent') ? 1 : 0;
        $id_mode_payement = $this->input->post('id_mode_payement');

         $logo_url = base_url('attachments/Other/' . $this->Model->get_setting('site_logo', 'logo.png'));

        // Vérifier si le donateur existe déjà via l'email
        $existing = $this->Model->read('dons', ['email' => $email]);
        if (!empty($existing)) {
            $don_id = $existing[0]['id'];
        } else {
            // Don commun
            $data = array(
                'nom_complet' => $nom,
                'email'       => $email,
                'telephone'   => $phone,
                'pays'        => $pays,
                'type_don'    => $type_don,
            );
            $don_id = $this->Model->createLastId('dons', $data);
        }

        $rsp = false; // Initialiser la variable pour éviter les erreurs si aucun don n'est créé

        // Don financier
        if ($type_don === 'financier') {
            $financier = array(
                'don_id' => $don_id,
                'id_methode_paiement' => $id_mode_payement,
                'is_mensuel' => $is_mensuel,
                'montant' => $montant,
            );

            $rsp = $this->Model->create('dons_financiers', $financier);

            $message = "
            <div style='font-family: Arial, sans-serif; text-align: center; background-color: #f8f9fa; padding: 20px;'>
                        <img src='$logo_url' alt='URUMURI_ICSB Logo' style='max-height: 60px; height: auto; margin-bottom: 20px;'>
                        <p style='font-size: 16px; color: #333;'>Bonjour $nom,</p>
                        <p style='font-size: 16px; color: #333;'>Merci pour votre don financier de $montant .<br>Votre soutien nous est précieux !</p>
                        <p style='font-size: 14px; color: #777; margin-top: 20px;'>&copy; " . date('Y') . " URUMURI ICSB</p>
                   </div>";
                   
        }

        // Don matériel
        if ($type_don === 'materiel') {
            $materiel = array(
                'don_id' => $don_id,
                'description_materiel' => $this->input->post('description_materiel')
            );
            $rsp = $this->Model->create('dons_materiels', $materiel);

            $message = "
                 <div style='font-family: Arial, sans-serif; text-align: center; background-color: #f8f9fa; padding: 20px;'>
                        <img src='$logo_url' alt='URUMURI_ICSB Logo' style='max-height: 60px; height: auto; margin-bottom: 20px;'>
                        <p style='font-size: 16px; color: #333;'>Bonjour $nom,</p>
                        <p style='font-size: 16px; color: #333;'>Merci pour votre don matériel.<br>Votre contribution aide énormément notre association !</p>
                        <p style='font-size: 14px; color: #777; margin-top: 20px;'>&copy; " . date('Y') . " URUMURI ICSB</p>
                   </div>";

        }

        // Don compétence
        if ($type_don === 'competence') {
            $competence = array(
                'don_id' => $don_id,
                'description_contribution' => $this->input->post('description_competence')
            );
            $rsp = $this->Model->create('dons_competences', $competence);

            $message = "<div style='font-family: Arial, sans-serif; text-align: center; background-color: #f8f9fa; padding: 20px;'>
                        <img src='$logo_url' alt='URUMURI_ICSB Logo' style='max-height: 60px; height: auto; margin-bottom: 20px;'>
                        <p style='font-size: 16px; color: #333;'>Bonjour $nom,</p>
                        <p style='font-size: 16px; color: #333;'>Merci pour votre contribution en compétences.<br>Votre soutien intellectuel et vos idées sont précieuses !</p>
                        <p style='font-size: 14px; color: #777; margin-top: 20px;'>&copy; " . date('Y') . " URUMURI ICSB</p>
                   </div>";
        }


           
            $smtp_pass = $this->Model->get_setting('password_email16caractere', 'xxxxxxxx');
            $smtp_email = $this->Model->get_setting('site_email', 'exemple@gmail.com');

        // Envoyer l'email si le don a été enregistré
        if ($rsp) {
            $config = [
                'protocol'    => 'smtp',
                'smtp_host'   => 'smtp.gmail.com',
                'smtp_port'   => 587,
                'smtp_user'   => $smtp_email,
                'smtp_pass'   => $smtp_pass, // ATTENTION : Ne jamais exposer le mot de passe en production
                'mailtype'    => 'html',
                'charset'     => 'utf-8',
                'smtp_crypto' => 'tls',
                'newline'     => "\r\n"
            ];
            $this->email->initialize($config);

            $this->email->from($smtp_email, 'URUMURI_ICSB');
            $this->email->to($email);
            $this->email->subject('Merci pour votre don');
            $this->email->message($message);
            $this->email->send();
        }

        redirect(base_url('Home/Involved'));
    }
}
