<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
:root {
    --primary-teal: #1a8c78;
    --dark-teal: #146c5c;
    --light-bg: #f8faf9;
}
.text-teal { color: var(--primary-teal) !important; }
.bg-teal { background: var(--primary-teal) !important; }

/* ===== HERO ===== */
.contact-hero {

height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
        padding: 130px 0 90px;
        position: relative;
        background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                    url('https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?q=80&w=1600') center/cover no-repeat;
    }
   

/* ===== CONTACT CARDS ===== */
.contact-info-card {
    border: none;
    border-radius: 20px;
    transition: 0.3s;
    background: #fff;
    padding: 30px;
    height: 100%;
}
.contact-icon {
    width: 60px;
    height: 60px;
    background: var(--light-bg);
    color: var(--primary-teal);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* ===== FORMULAIRE ===== */
.form-card {
    border: none;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}
.form-control {
    border-radius: 12px;
    padding: 12px 20px;
    border: 1px solid #eee;
    background: #fdfdfd;
}
.form-control:focus {
    border-color: var(--primary-teal);
    box-shadow: 0 0 0 0.25rem rgba(26, 140, 120, 0.1);
}

/* ===== MAP ===== */
.map-container {
    border-radius: 25px;
    overflow: hidden;
    height: 400px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
</style>

<section class="contact-hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold text-white">Contactez-nous</h1>
        <p class="lead opacity-75 text-white">Nous sommes à votre écoute.</p>
    </div>
</section>


<section class="py-5">
    <div class="container">
        <div class="row g-5">
            
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Restons en <span class="text-teal">contact</span></h2>
                <p class="text-muted mb-5">
                    Que vous soyez un partenaire potentiel, un futur volontaire ou simplement curieux, n'hésitez pas à nous envoyer un message.
                </p>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3 mb-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Notre Siege</h6>
                                <p class="text-muted mb-0 small"><?= $this->Model->get_setting('site_address','bujumbura'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3 mb-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Téléphone</h6>
                                <p class="text-muted mb-0 small"><?= $this->Model->get_setting('site_phone','+257000000'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3 mb-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="text-muted mb-0 small"><?= $this->Model->get_setting('site_email','info@gmail.com'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h6 class="fw-bold mb-3">Suivez-nous</h6>
                    <div class="d-flex gap-2">
                        <a target="_blank" href="<?= $this->Model->get_setting('site_facebook','facebook.com'); ?>" class="btn btn-outline-teal btn-sm rounded-circle"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="<?= $this->Model->get_setting('site_youtube','youtube.com'); ?>" class="btn btn-outline-teal btn-sm rounded-circle"><i class="fab fa-youtube"></i></a>
                        <a target="_blank" href="<?= $this->Model->get_setting('site_linkedln','youtube.com'); ?>" class="btn btn-outline-teal btn-sm rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                        <a target="_blank" href="<?= $this->Model->get_setting('site_instagram','instagram.com'); ?>" class="btn btn-outline-teal btn-sm rounded-circle"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card form-card p-4 p-md-5">
                    <form action="<?=base_url('Home/Contact')?>" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nom Complet</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex: Jean Dupont" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Adresse Email</label>
                                <input type="email" class="form-control" name="email" placeholder="jean@exemple.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Adresse</label>
                                <input type="text" class="form-control" name="adresse" placeholder="Adresse`" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Telephone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Telephone" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Sujet</label>
                                <input type="text" class="form-control" name="subject" placeholder="Comment pouvons-nous vous aider ?" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Message</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Votre message ici..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn bg-teal text-white w-100 py-3 rounded-pill fw-bold shadow-sm">
                                    <i class="fas fa-paper-plane me-2"></i> Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <?php
                // Récupération des coordonnées depuis la base de données
                $longitude = $this->Model->get_setting('longitude', '29.34444985');
                $latitude  = $this->Model->get_setting('latitude', '-3.3761367');

                // Nettoyage des valeurs
                $longitude = str_replace('+', '', $longitude);
                $latitude  = str_replace('+', '', $latitude);

                if (!is_numeric($longitude)) $longitude = '29.34444985';
                if (!is_numeric($latitude))  $latitude  = '-3.3761367';
                ?>

                <div class="text-center mb-4">
                    <h2 class="fw-bold">Notre localisation</h2>
                    <p class="text-muted">
                        Retrouvez facilement notre emplacement sur la carte
                    </p>
                </div>

                <div class="ratio ratio-16x9 shadow rounded overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps?q=<?= $latitude ?>,<?= $longitude ?>&z=16&output=embed"
                        style="border:0;"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Localisation">
                    </iframe>
                </div>

                <div class="mt-3 text-center">
                    <span class="badge bg-primary me-2">
                        Latitude : <?= $latitude ?>
                    </span>
                    <span class="badge bg-success">
                        Longitude : <?= $longitude ?>
                    </span>
                </div>

            </div>
        </div>
    </div>
</section>




<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>