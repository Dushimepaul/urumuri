<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>URUMURI ICSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
     
    <!-- Slick CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/bootstrap.min.css">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/style.css">
    
    <style>
        
    </style>
</head>
<body>

<!-- ================= HEADER TOP ================= -->
<div class="header-top py-2">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
        <div class="social">
            <span class="Follow">Follow us:</span>
            <a target="_blank" href="<?= $this->Model->get_setting('site_facebook','facebook.com'); ?>"><i class="fab fa-facebook-f"></i></a>
            <a target="_blank" href="<?= $this->Model->get_setting('site_instagram','instagram.com'); ?>"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="<?= $this->Model->get_setting('site_youtube','youtube.com'); ?>"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="contact d-none d-md-flex justify-content-center gap-3 flex-wrap">
            <span class="text-muted">|</span>
            <p class="mb-0"><i class="fas fa-envelope"></i> <?= $this->Model->get_setting('site_email','exemple@gmail.com'); ?> </p>
            <span class="text-muted">|</span>
            <p class="mb-0"><i class="fas fa-phone"></i> <?= $this->Model->get_setting('site_phone','+257000000'); ?></p>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="<?= base_url('attachments/Other/' . $this->Model->get_setting('site_favicon', 'logo.png')) ?>" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <i class="fas fa-bars-staggered"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link active" href="<?=base_url('')?>">
                       Accueil
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?=base_url('Home/AboutUs')?>" data-bs-toggle="dropdown">
                        </i>À propos
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="<?=base_url('Home/AboutUs')?>"><i class="me-2"></i>Vision et Mission</a></li>
                        <li><a class="dropdown-item" href="<?=base_url('Home/Objectifs')?>"><i class="me-2"></i>Objectifs</a></li>
                        <li><a class="dropdown-item" href="<?=base_url('Home/Team')?>"><i class="me-2"></i>Team</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?=base_url('Home/Actions')?>" data-bs-toggle="dropdown">
                       Projets
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="<?=base_url('Home/Actions')?>"><i class="me-2"></i>Projets réalisés</a></li>
                        <li><a class="dropdown-item" href="<?=base_url('Home/En_cours')?>"><i class="me-2"></i>Projets en cours</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Home/Faq')?>">
                        FAQ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Home/Galleries')?>">
                        Galleries
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Home/ContactUs')?>">
                        Contact
                    </a>
                </li>

                <li class="nav-item ms-lg-2">
                    <a class="nav-link btn-involved" href="<?=base_url('Home/Involved')?>">
                        </i>Donation
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main>