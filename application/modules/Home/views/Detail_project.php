<?php include VIEWPATH.'includes/frontend/Header.php'; 

/* Sécurité : premier résultat */
$project = $projects[0];
?>

<!-- HERO -->
<section class="hero-bg position-relative"
    style="background-image: url('<?= base_url('https://images.unsplash.com/photo-1508780709619-79562169bc64') ?>');
           background-size: cover;
           background-position: center;
           height: 320px;">
    
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(0,0,0,0.6);"></div>

    <div class="container h-100 position-relative">
        <div class="d-flex h-100 align-items-center justify-content-center text-center text-white">
            <div>
                <h1 class="fw-bold mb-2">Détails du projet</h1>
                <p class="mb-0 opacity-75">Accueil / Projets / Détails</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTENU -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">

            <!-- ARTICLE -->
            <div class="col-lg-9">
                <article class="bg-white rounded-4 shadow-sm overflow-hidden">

                    <!-- IMAGE -->
                    <?php if (!empty($project['image'])): ?>
                        <div style="height: 420px; overflow: hidden;">
                            <img src="<?= base_url('attachments/projects/'.$project['image']) ?>"
                                 alt="<?= htmlspecialchars($project['title']) ?>"
                                 class="w-100 h-100"
                                 style="object-fit: cover;">
                        </div>
                    <?php endif; ?>

                    <!-- CONTENU -->
                    <div class="p-4 p-md-5">

                        <!-- TITRE -->
                        <h2 class="fw-bold mb-3">
                            <?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>
                        </h2>

                        <!-- META -->
                        <div class="d-flex flex-wrap gap-3 text-muted small mb-4">
                            <span>
                                <i class="bi bi-calendar-event me-1"></i>
                                Du <?= date('d M Y', strtotime($project['date_debut'])) ?>
                                au <?= date('d M Y', strtotime($project['date_fin'])) ?>
                            </span>

                            <?php if (!empty($project['status'])): ?>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    <?= htmlspecialchars($project['status']) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <hr>

                        <!-- DESCRIPTION -->
                        <div class="post-content mt-4"
                             style="line-height: 1.8; font-size: 1.05rem;">
                            <?= $project['description']; ?>
                        </div>

                    </div>
                </article>
            </div>

        </div>
    </div>
</section>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>

<style>

.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 15px 0;
}

.post-content p {
    margin-bottom: 1rem;
}

.post-content h2,
.post-content h3 {
    margin-top: 1.8rem;
    margin-bottom: 1rem;
}


</style>