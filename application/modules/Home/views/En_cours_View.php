<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
    /* ================= PAGE HEADER ================= */
    .page-header {
        padding: 130px 0 90px;
        background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                    url('https://images.unsplash.com/photo-1508780709619-79562169bc64') center/cover no-repeat;
    }
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Nos Realisation</h1>
        <p class="lead opacity-75 fs-5">
            Découvrez nos actions future et en cous
        </p>
    </div>
</section>

<!-- ================= SECTION PROJETS ================= -->
<div class="container py-5">

    <!-- TITRE DE LA SECTION -->
    <div class="row mb-5">
        <div class="col text-center">
            <h2 class="fw-bold display-6">Nos Projets</h2>
            <div class="mx-auto mt-3" style="width:80px;height:3px;background:#0d6efd;"></div>
        </div>
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

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
