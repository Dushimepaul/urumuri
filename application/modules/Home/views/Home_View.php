

<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
    :root {
        --primary-teal: #1a8c78;
        --dark-teal: #146c5c;
        --light-bg: #f0fdf4;
    }

    /* Utilitaires */
    .text-teal { color: var(--primary-teal) !important; }
    .bg-teal { background-color: var(--primary-teal) !important; }
     .bg-light-teal { background-color: var(--light-teal) !important; }
    .btn-teal {
        background-color: var(--primary-teal);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-teal:hover {
        background-color: var(--dark-teal);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(26, 140, 120, 0.2);
        color: white;
    }

    /* Hero Section */
    .hero-section { height: 80vh; min-height: 500px; position: relative; overflow: hidden; }
    .carousel-full, .carousel-inner, .carousel-item { height: 100%; }
    .carousel-item img { width: 100%; height: 100%; object-fit: cover; }
    .carousel-item::after {
        content: ""; position: absolute; inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7)); z-index: 1;
    }

    /* Qui sommes-nous */
    .qui-sommes-nous img { 
        border-top-left-radius: 100px; 
        border-bottom-right-radius: 100px; 
        transition: transform 0.5s ease;
    }

    /* Cartes & Box */
    .objective-box, .activity-card, .testimonial-card {
        background: #fff;
        border-radius: 20px;
        transition: all 0.4s ease;
    }
    .objective-box:hover, .activity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(26, 140, 120, 0.12) !important;
    }



 /* --- STATISTICS --- */
    .stats-section {
        background: linear-gradient(135deg, var(--primary-teal) 0%, var(--dark-teal) 100%);
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" opacity="0.1"><path d="M0,50 C150,100 350,0 500,50 C650,100 850,0 1000,50 L1000,100 L0,100 Z"/></svg>') repeat-x bottom;
        background-size: contain;
    }
    
    .stat-item h2 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .stat-item p {
        font-size: 1.1rem;
        opacity: 0.9;
        font-weight: 500;
    }


    /* ================= TESTIMONIALS ================= */
.testimonial-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
    position: relative;
    margin: 20px 0;
}
.testimonial-card::before {
    content: '"';
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 4rem;
    color: var(--primary-teal);
    opacity: 0.2;
    font-family: Georgia, serif;
}
.testimonial-img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-teal);
}


    

    /* Animation Cœur */
    .animate-pulse { animation: pulse-heart 2s infinite; }
    @keyframes pulse-heart {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
</style>

<section class="hero-section">
    <div id="heroCarousel" class="carousel slide carousel-fade carousel-full" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($carousels as $key => $row): ?>
                <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>" data-bs-interval="5000">
                    <img src="<?= base_url('attachments/Carousel/' . $row['Image']) ?>" alt="<?= $row['Title'] ?>">
                    <div class="carousel-caption text-center" style="z-index: 10; bottom: 20%;">
                        <h1 class="display-4 fw-bold text-white"><?= $row['Title'] ?></h1>
                        <p class="lead text-white-50 mb-4"><?= $row['Description'] ?></p>
                        <div class="d-flex gap-3 justify-content-center">
                            <a href="<?=base_url('Home/Actions')?>" class="btn btn-teal btn-lg rounded-pill px-4 fw-bold">Notre Travail</a>
                            <a href="<?=base_url('Home/Involved')?>" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-bold">Faire un don</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="qui-sommes-nous py-5 mt-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold mb-3">A Propos</span>
                <h2 class="display-5 fw-bold mb-4"><span class="text-teal">QUI</span> SOMMES-NOUS ?</h2>
                <div class="ps-4 border-start border-teal border-4 mb-4">
                    <p class="lead fw-semibold text-teal mb-0"><?= $about_us['title'] ?? 'Urumuri' ?></p>
                </div>
                <p class="text-muted lh-lg">
                    <?= (strlen(strip_tags($about_us['details'])) > 300) ? substr(strip_tags($about_us['details']), 0, 300) . '...' : strip_tags($about_us['details']) ?>
                </p>
                <a href="<?=base_url('Home/AboutUs')?>" class="btn btn-teal btn-lg rounded-pill px-4 mt-3">En savoir plus <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="<?= base_url('attachments/Other/' . $this->Model->get_setting('site_favicon', 'logo.png')) ?>" class="img-fluid shadow-lg border border-5 border-white w-75">
            </div>
        </div>
    </div>
</section>

<!-- STATISTICS SECTION -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4 col-6 stat-item">
                <h2 class="display-4 fw-bold"><?= date('Y')-2026; ?></h2>
                <p class="opacity-90">Years of Experience</p>
            </div>
            <div class="col-md-4 col-6 stat-item">
                <h2 class="display-4 fw-bold"><?= $totalprojectrealise ?></h2>
                <p class="opacity-90">Projets Réalisés</p>
            </div>
            <div class="col-md-4 col-6 stat-item">
                <h2 class="display-4 fw-bold"><?= $totalprojectencours ?></h2>
                <p class="opacity-90">Projets En Cours</p>
            </div>
        </div>
    </div>
</section>


<!-- ================= OBJECTIVES ================= -->
<section class="py-5 bg-light-teal">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mt-3 mb-3">
                Objectifs <span class="text-teal">Spécifiques</span>
            </h2>
            <p class="text-muted mx-auto fs-5" style="max-width: 700px;">
                Nous œuvrons à travers cinq piliers fondamentaux pour générer un impact durable au sein de la communauté.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php if (!empty($objectifs)): ?>
                <?php foreach($objectifs as $obj): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="objective-box">
                            <div class="icon-circle">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-3">
                                <?= htmlspecialchars($obj['Objectif']) ?>
                            </h5>
                            <p class="text-muted small mb-0">
                                <?= htmlspecialchars($obj['Details']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="objective-box">
                        <i class="fas fa-info-circle fa-3x text-teal mb-3"></i>
                        <h5 class="fw-bold text-dark">Aucun objectif disponible</h5>
                        <p class="text-muted">Les objectifs seront bientôt publiés.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>





<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase">Objectifs</span>
            <h2 class="display-5 fw-bold">Projects</h2>
            <a href="<?=base_url('Home/Actions')?>" class="btn text-white rounded-pill px-4" style="background-color: #062C54;">Voir tout</a>
        </div>
        <!-- CARDS DES PROJETS -->
    <div class="row g-4">
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="overflow-hidden">
                            <img src="<?= base_url('attachments/projects/'.$project['image']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($project['title']) ?>">
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge badge-completed"><?= htmlspecialchars($project['status']) ?></span>
                                <?php if (!empty($project['date_debut']) && !empty($project['date_fin'])): ?>
                                    <small class="text-muted fw-bold">
                                        <?= date('d M Y', strtotime($project['date_debut'])) ?>
                                        -
                                        <?= date('d M Y', strtotime($project['date_fin'])) ?>
                                    </small>
                                <?php endif; ?>
                            </div>

                            <h4 class="card-title fw-bold"><?= htmlspecialchars($project['title']) ?></h4>
                            <p class="card-text text-muted">
                                <?= strlen($project['description']) > 120 
                                    ? substr($project['description'], 0, 120) . '...' 
                                    : $project['description']; ?>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 p-4 pt-0">
                            <a href="<?= base_url('Home/Home/detail_progects/' . $project['id']) ?>" class="btn btn-outline-primary btn-custom btn-sm w-100">Découvrir le projet</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center text-muted">Aucun projet disponible pour le moment.</p>
            </div>
        <?php endif; ?>
    </div>
    </div>
</section>

<?php if(!empty($parteners)): ?>
<section class="py-5 bg-light border-top">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Nos partenaires</h2>
        <div class="partners-slider">
            <?php foreach ($parteners as $partener) : ?>
                <div class="partner-item px-3 text-center">
                    <img style="width:100px;" src="<?=$partener['link']?>" alt="Logo" title="<?=$partener['description']?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ================= TÉMOIGNAGES ================= 
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-teal bg-opacity-10 text-teal px-3 py-2 rounded-pill fw-bold">
                TÉMOIGNAGES
            </span>
            <h2 class="display-5 fw-bold mt-2">
                Ce qu'ils disent de <span class="text-teal">nos actions</span>
            </h2>
        </div>
        
        <div class="testimony-slider row g-4 mt-5">

            <?php foreach ($testimony as $item) : ?>
            <div class="col-lg-4 px-2">
                <div class="testimonial-card h-100">
                    <div class="d-flex align-items-center mb-3">
                        <img src="<?= htmlspecialchars(base_url('attachments/Testimony/'.$item['Image'])) ?>" 
                             class="testimonial-img me-3" 
                             alt="Témoin 1">
                        <div>
                            <h5 class="fw-bold mb-1"><?=$item['Testifier']?></h5>
                            <p class="text-muted small"><?=$item['Poste']?></p>
                        </div>
                    </div>
                    <p class="text-muted">
                        <?=$item['Details']?>
                    </p>
                     <div class="text-warning border-top pt-3">
                            <?php 
                            $rating = isset($item['rating']) ? $item['rating'] : 5;
                            for ($i = 0; $i < 5; $i++) {
                                echo '<i class="fas fa-star' . ($i < $rating ? '' : '-half-alt') . '"></i>';
                            }
                            ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
-->

<section class="py-5 mb-5">
    <div class="container">
        <div class="donation-cta-section text-center text-white shadow-lg p-5 rounded-4" style="background: linear-gradient(135deg, #1a8c78, #0f5144); position: relative; overflow: hidden;">
            <div class="mb-4"> <i class="fas fa-hand-holding-heart fa-3x animate-pulse"></i> </div>
            <h2 class="display-4 fw-bold mb-3">Soutenez notre mission</h2>
            <p class="lead mb-4 opacity-90 mx-auto" style="max-width: 700px;">Chaque contribution nous aide à transformer des vies et à bâtir un avenir meilleur pour la jeunesse.</p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="<?=base_url('Home/Involved')?>" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-teal"> <i class="fas fa-heart me-2"></i> Faire un don</a>
            </div>
        </div>
    </div>
</section>



<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
