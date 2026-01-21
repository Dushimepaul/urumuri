<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author:    dushime paul
 * Email:     dushimeyesupaulin@gmail.com
 * Date :     Le 20/01/2026
 * https://github.com/Dushimepaul
*/

class Contact extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Affichage page
    public function index()
    {
        $data = [
            'FullName'    => $this->input->post('name', TRUE),
            'Email'       => $this->input->post('email', TRUE),
            'Subject'     => $this->input->post('subject', TRUE),
            'Message'     => $this->input->post('message', TRUE),
            'PhoneNumber' => $this->input->post('phone', TRUE),
            'location'    => $this->input->post('adresse', TRUE),
        ];

        // Insertion BD
        $rsp = $this->Model->create('contact_us', $data);

        if ($rsp) {

            /* ================= EMAIL ================= */

            $config = [
                'protocol'    => 'smtp',
                'smtp_host'   => 'smtp.gmail.com',
                'smtp_port'   => 587,
                'smtp_user'   => 'dushimeyesupaulin@gmail.com',
                'smtp_pass'   => 'pmhkniuvlqnwyblm',
                'smtp_crypto' => 'tls',
                'mailtype'    => 'html',
                'charset'     => 'utf-8',
                'newline'     => "\r\n"
            ];

            $this->email->initialize($config);

            //Visiteur → Association
            $this->email->from('dushimeyesupaulin@gmail.com', 'URUMURI ICSB');
            $this->email->reply_to($data['Email'], $data['FullName']);
            $this->email->to('dushimeyesupaulin@gmail.com');
            $this->email->subject("Quelqu'un vous a contacté sur le site Urumuri");
            $this->email->message(nl2br($data['Message']));
            $this->email->send();

            //Confirmation → Visiteur
            $this->email->clear();

            $this->email->from('dushimeyesupaulin@gmail.com', 'URUMURI ICSB');
            $this->email->to($data['Email']);
            $this->email->subject('Message envoyé avec succès');
            $this->email->message("
                Bonjour {$data['FullName']},<br><br>
                Votre message a été envoyé avec succès.<br>
                Nous vous répondrons dans les plus brefs délais.<br><br>
                Cordialement,<br>
                URUMURI ICSB
            ");
            $this->email->send();

            // MESSAGE JSON SERVEUR
            $this->session->set_flashdata('notification', "Votre message envoyé avec succès");
        }

        redirect(base_url('Home/ContactUs'));
    }


    public function Newsletter(){
        $email = $this->input->post('email');

        $data = array(
            'email' => $email
        );

        $rsp = $this->Model->create('newsletter', $data);

        $sms = [];
        if ($rsp) {
            $sms['sms'] = '<div class="alert alert-success fade show mt-1 message" role="alert">
                             Email ajouté avec succès.
                         </div>';
        } else {
            $sms['sms'] = '<div class="alert alert-danger fade show mt-1 message" role="alert">
                             <strong>Oups!</strong> Cet email existe déjà ou une erreur est survenue.
                         </div>';
        }

        $this->session->set_flashdata($sms);
        redirect(base_url('Home'));
    }
}