<?php include VIEWPATH.'includes/frontend/Header.php'; 

/* Sécurité : premier résultat */
$project = $projects[0];
?>
<style>
    .page-header {
        height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
        padding: 130px 0 90px;
        position: relative;
        background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                    url('https://images.unsplash.com/photo-1508780709619-79562169bc64') center/cover no-repeat;
    }

</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="flur"></div>
    <div class="container">
        <h1 class="display-4 fw-bold mb-3 animate-fade-in">Détails du projet</h1>
        <p class="lead opacity-75 fs-5 animate-fade-in" style="animation-delay: 0.2s;">
            Accueil / Projets / Détails
        </p>
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