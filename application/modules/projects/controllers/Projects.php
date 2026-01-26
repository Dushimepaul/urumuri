

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
         redirect('Admin');
        $this->load->library('email');
    }
}

    /* ==============================
     * LIST PROJECTS
     * ============================== */
    public function index()
    {
        $data['projects'] = $this->Model->read('projects', null, 'id');
        $this->load->view('projects_View', $data);
    }

    /* ==============================
     * CHANGE PROJECT STATUS
     * ============================== */
    	public function ChangeStatus()
{
    $id     = $this->input->post('id');
    $status = $this->input->post('status');

    // Bascule du statut
    if ($status === 'ongoing') {
        $new_status = 'completed';
    } else {
        $new_status = 'ongoing';
    }

    $rsp = $this->Model->update(
        'projects',
        ['id' => $id],
        ['status' => $new_status]
    );

    if ($rsp) {
        $this->session->set_flashdata([
            'sms' => '<div class="alert alert-success mt-1 message">
                        Statut du projet mis à jour avec succès.
                      </div>'
        ]);
    } else {
        $this->session->set_flashdata([
            'sms' => '<div class="alert alert-danger mt-1 message">
                        <strong>Oups !</strong> Erreur inconnue, contactez l’administrateur.
                      </div>'
        ]);
    }

    redirect(base_url('projects'));
}

    /* ==============================
     * CREATE PROJECT
     * ============================== */
    public function Createprojects()
    {
        $title       = $this->input->post('title', TRUE);
        $description = $this->input->post('description', TRUE);

        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $image = $this->upload_document($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        }

        $data = [
            'title'       => $title,
            'description' => $description,
            'image'       => $image,
            'status'      => 'ongoing',
            'created_at'  => date('Y-m-d H:i:s')
        ];

        $project_id = $this->Model->createLastId('projects', $data);

        if ($project_id) {
            $this->sendNewsletter($project_id, $title, $description);
            $this->setFlash('success', 'Projet créé avec succès.');
        } else {
            $this->setFlash('danger', 'Erreur inconnue, contactez l’administrateur.');
        }

        redirect('projects');
    }

    /* ==============================
     * UPDATE PROJECT
     * ============================== */
    public function Updateprojects()
    {
        $id          = $this->input->post('id', TRUE);
        $title       = $this->input->post('title', TRUE);
        $description = $this->input->post('description', TRUE);

        if (!empty($_FILES['image']['name'])) {
            $image = $this->upload_document($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        } else {
            $image = $this->input->post('HiddenImage', TRUE);
        }

        $data = [
            'title'       => $title,
            'description' => $description,
            'image'       => $image
        ];

        $rsp = $this->Model->update('projects', ['id' => $id], $data);

        if ($rsp) {
            $this->setFlash('success', 'Projet mis à jour avec succès.');
        } else {
            $this->setFlash('danger', 'Erreur inconnue, contactez l’administrateur.');
        }

        redirect('projects');
    }

    /* ==============================
     * DELETE PROJECT
     * ============================== */
    public function Deleteprojects()
    {
        $id = $this->input->post('id', TRUE);

        $rsp = $this->Model->delete('projects', ['id' => $id]);

        if ($rsp) {
            $this->setFlash('success', 'Projet supprimé avec succès.');
        } else {
            $this->setFlash('danger', 'Erreur inconnue, contactez l’administrateur.');
        }

        redirect('projects');
    }

/* ==============================
     * SEND NEWSLETTER
     * ============================== */
    private function sendNewsletter($project_id, $title, $description)
    {
        $emails = $this->Model->read('newsletter');
        if (!$emails) return;

        $smtp_email = $this->Model->get_setting('site_email', 'exemple@gmail.com');
        $smtp_pass  = $this->Model->get_setting('password_email16caractere', 'xxxxxxxx');

        $config = [
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.gmail.com',
            'smtp_port'   => 587,
            'smtp_user'   => $smtp_email,
            'smtp_pass'   => $smtp_pass,
            'smtp_crypto' => 'tls',
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'newline'     => "\r\n"
        ];

        $this->email->initialize($config);

        foreach ($emails as $row) {
            $this->email->clear(TRUE);
            $this->email->from($smtp_email, 'URUMURI_ICSB');
            $this->email->to($row['email']);
            $this->email->subject($title);
            $this->email->message($this->newsletterTemplate($project_id, $title, $description));
            $this->email->send();
        }
    }

    /* ==============================
     * NEWSLETTER TEMPLATE
     * ============================== */
    private function newsletterTemplate($id, $title, $description)
    {
        return '
        <h2>New Project Published</h2>
        <p><strong>'.$title.'</strong></p>
        <p>'.$description.'</p>
        <a href="'.base_url('Home/detail_projects/'.$id).'">View Project</a>
        ';
    }

    /* ==============================
     * FLASH MESSAGE HELPER
     * ============================== */
    private function setFlash($type, $message)
    {
        $this->session->set_flashdata([
            'sms' => '<div class="alert alert-'.$type.' mt-1 message">'.$message.'</div>'
        ]);
    }

    /* ==============================
     * UPLOAD IMAGE
     * ============================== */
    public function upload_document($tmp_name, $original_name)
    {
        $folder = FCPATH.'attachments/projects/';
        if (!is_dir($folder)) {
            mkdir($folder, 0777, TRUE);
        }

        $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (!in_array($ext, $allowed)) {
            return null;
        }

        $filename = date('YmdHis').uniqid().'.'.$ext;
        move_uploaded_file($tmp_name, $folder.$filename);

        return $filename;
    }
}