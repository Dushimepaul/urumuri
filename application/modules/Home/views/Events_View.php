<?php 
include VIEWPATH.'includes/frontend/Header.php'; 

$today = date('Y-m-d'); // Date actuelle pour filtrer les événements
?>

<style>
:root {
    --primary-teal: #1a8c78;
    --dark-teal: #146c5c;
    --light-bg: #f8faf9;
}

.text-teal { color: var(--primary-teal) !important; }
.bg-teal { background: var(--primary-teal) !important; }

/* ================= PAGE HEADER ================= */
.page-header {
    padding: 130px 0 90px;
    background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)), 
                url('https://images.unsplash.com/photo-1511578314322-379afb476865') center/cover no-repeat;
}

.page-header h1 { font-size: 3rem; }
.page-header p { font-size: 1.2rem; }

/* ================= ÉVÉNEMENTS ================= */
.card, .gallery-item {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s ease;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}
.card:hover, .gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,.12);
}
.card img, .gallery-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.card:hover img, .gallery-item:hover .gallery-img {
    transform: scale(1.05);
}
.card-body h5 { font-size: 1.25rem; color: #2c3e50; }
.card-body p { font-size: 0.85rem; line-height: 1.4; margin-bottom: 0.5rem; }

.btn-teal {
    background-color: var(--primary-teal);
    color: #fff;
    transition: background 0.3s ease;
}
.btn-teal:hover {
    background-color: var(--dark-teal);
}

/* ================= GALERIE ================= */
.gallery-item {
    position: relative;
    cursor: pointer;
}
.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(26, 140, 120, 0.8);
    color: #fff;
    text-align: center;
    padding: 5px;
    font-size: 0.85rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="fw-bold">Nos Événements</h1>
        <p class="lead opacity-75">Participez à nos activités et rencontres</p>
    </div>
</section>

<!-- ================= ÉVÉNEMENTS À VENIR ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Événements à venir</h2>
            <p class="text-muted">Ne manquez pas nos prochains événements, formations et promotions.</p>
        </div>

        <div class="row g-4">
            <?php if(!empty($upcoming_events)): ?>
                <?php foreach($upcoming_events as $eve): 
                    $start_date = date('d M Y', strtotime($eve['date_debut']));
                    $end_date   = date('d M Y', strtotime($eve['date_fin']));
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('attachments/events/'.$eve['image']) ?>" class="card-img-top" alt="<?= $eve['titre'] ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $eve['titre'] ?></h5>
                            <p class="text-muted mb-2" style="font-size: 0.75rem;">
                                <?= substr($eve['description'], 0, 100) ?>...
                            </p>
                            <p class="card-text mb-1"><strong>Date :</strong> <?= $start_date ?> - <?= $end_date ?></p>
                            <p class="card-text mb-3"><strong>Lieu :</strong> <?= $eve['lieu'] ?></p>
                            <a href="#" class="btn btn-teal mt-auto">S’inscrire</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Aucun événement à venir pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ================= GALERIE DES ÉVÉNEMENTS PASSÉS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold mb-4">Galerie des <span class="text-teal">Événements Passés</span></h3>
            <p class="text-muted">Revivez les moments forts de nos activités</p>
        </div>

        <div class="row g-3">
            <?php if(!empty($past_events)): ?>
                <?php foreach($past_events as $event): ?>
                    <div class="col-md-3 col-6">
                        <div class="gallery-item">
                            <img src="<?= base_url('attachments/events/'.$event['image']) ?>" class="gallery-img" alt="<?= $event['titre'] ?>">
                            <div class="gallery-overlay"><?= $event['titre'] ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Aucun événement passé disponible.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>