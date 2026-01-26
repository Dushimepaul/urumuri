<?php include VIEWPATH . 'includes/backend/Header.php'; ?>
<?php include VIEWPATH . 'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH . 'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content" style="--jaune: #FFD000; --orange: #FF8C00; --vert: #0F766E; --bleu-fonce: #062C54; --vert-bleute: #1a8c78;">

        <div class="page-breadcrumb d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <h4 class="mb-0 me-2" style="color: var(--bleu-fonce); font-weight: 600;">
                    <i class="bx bx-home-alt me-2"></i>Tableau de bord
                </h4>
                <div class="badge bg-light text-dark px-3 py-1 rounded-pill">
                    <small><i class="bx bx-calendar me-1"></i> <?= date('d/m/Y') ?></small>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-light border-start border-5 border-warning d-flex align-items-center justify-content-between shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-bell text-warning fs-4 me-3"></i>
                        <div>
                            <h6 class="alert-heading mb-0">Bienvenue sur votre tableau de bord</h6>
                            <small class="text-muted">Vous avez <?= $message_non_lus ?? 0 ?> nouveaux messages et <?= $projects_in_progress ?? 0 ?> projets en cours</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--bleu-fonce);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2 ">Nouveaux Messages</h6>
                                <h2 class="mb-0" style="color: var(--bleu-fonce); font-weight: 700;"><?= $message_non_lus ?? 0 ?></h2>
                                <small class="text-success"><i class="bx bx-up-arrow-alt"></i> Actifs</small>
                            </div>
                            <div class="avatar" style="background-color: rgba(6, 44, 84, 0.1); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <i class="bx bx-envelope fs-3" style="color: var(--bleu-fonce);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--bleu-fonce);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2">Messages reçus</h6>
                                <h2 class="mb-0" style="color: var(--bleu-fonce); font-weight: 700;"><?= $contact_count ?? 0 ?></h2>
                                <small class="text-success"><i class="bx bx-up-arrow-alt"></i> Actifs</small>
                            </div>
                            <div class="avatar" style="background-color: rgba(6, 44, 84, 0.1); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <i class="bx bx-envelope fs-3" style="color: var(--bleu-fonce);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--vert);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2">Projets réalisés</h6>
                                <h2 class="mb-0" style="color: var(--vert); font-weight: 700;"><?= $projects_completed ?? 0 ?></h2>
                                <small class="text-success"><i class="bx bx-check-circle"></i> Terminés</small>
                            </div>
                            <div class="avatar" style="background-color: rgba(15, 118, 110, 0.1); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <i class="bx bx-check-circle fs-3" style="color: var(--vert);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--orange);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2">Projets en cours</h6>
                                <h2 class="mb-0" style="color: var(--orange); font-weight: 700;"><?= $projects_in_progress ?? 0 ?></h2>
                                <small class="text-warning"><i class="bx bx-time"></i> En progression</small>
                            </div>
                            <div class="avatar" style="background-color: rgba(255, 140, 0, 0.1); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <i class="bx bx-time fs-3" style="color: var(--orange);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
           

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-2"><i class="bx bx-user me-2"></i>Visiteurs Uniques (Aujourd'hui)</h6>
                        <h2 class="mb-0" style="color: var(--bleu-fonce); font-weight: 700;"><?= $today_visitors ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-2"><i class="bx bx-chart me-2"></i>Total Visiteurs Uniques</h6>
                        <h2 class="mb-0" style="color: var(--vert-bleute); font-weight: 700;"><?= $total_visitors ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">
                            <i class="bx bx-gift me-2"></i>Statistiques des dons
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="text-center p-3 rounded" style="background-color: rgba(26, 140, 120, 0.05);">
                                    <h6 class="text-muted small mb-1">Financiers</h6>
                                    <h4 class="mb-0" style="color: var(--vert-bleute);"><?= $dons_financiers ?? 0 ?></h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 rounded" style="background-color: rgba(255, 140, 0, 0.05);">
                                    <h6 class="text-muted small mb-1">Matériels</h6>
                                    <h4 class="mb-0" style="color: var(--orange);"><?= $dons_materiels ?? 0 ?></h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 rounded" style="background-color: rgba(6, 44, 84, 0.05);">
                                    <h6 class="text-muted small mb-1">Compétences</h6>
                                    <h4 class="mb-0" style="color: var(--bleu-fonce);"><?= $competences ?? 0 ?></h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <?php 
                                $percent_remis = ($dons_total > 0) ? round(($dons_remis / $dons_total) * 100) : 0;
                            ?>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0 small">Progression des dons remis</h6>
                                <span class="badge bg-success"><?= $dons_remis ?? 0 ?> remis (<?= $percent_remis ?>%)</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?= $percent_remis ?>%; background-color: var(--vert-bleute);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-transparent border-0 py-3 text-center">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">Répartition Membres</h5>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="position-relative mb-3" style="width: 150px; height: 150px;">
                            <canvas id="memberChart"></canvas>
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <h4 class="mb-0"><?= $members_total ?? 0 ?></h4>
                                <small class="text-muted" style="font-size: 10px;">TOTAL</small>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="d-flex justify-content-between small mb-1">
                                <span><i class="bx bxs-circle me-1" style="color: var(--bleu-fonce);"></i> Fondateurs</span>
                                <strong><?= $members_fondateurs ?? 0 ?></strong>
                            </div>
                            <div class="d-flex justify-content-between small mb-1">
                                <span><i class="bx bxs-circle me-1" style="color: var(--orange);"></i> Adhérents</span>
                                <strong><?= $members_adherants ?? 0 ?></strong>
                            </div>
                            <div class="d-flex justify-content-between small mb-1">
                                <span><i class="bx bxs-circle me-1" style="color: var(--vert-bleute);"></i> Membres d'honneur</span>
                                <strong><?= $members_honneur ?? 0 ?></strong>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span><i class="bx bxs-circle me-1" style="color: var(--jaune);"></i> Sympathisants</span>
                                <strong><?= $members_sympathisants ?? 0 ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">
                            <i class="bx bx-globe me-2"></i>Visiteurs par pays
                        </h5>
                    </div>
                    <div class="card-body" style="position: relative; height: 350px;">
                        <canvas id="countryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);"><i class="bx bx-rocket me-2"></i>Actions rapides</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 text-center">
                            <div class="col-6 col-md-3">
                                <a href="<?= base_url('Contact_us') ?>" class="btn btn-outline-primary border-0 shadow-sm p-3 w-100 hover-lift">
                                    <i class="bx bx-envelope fs-2 d-block mb-2"></i> Messages
                                </a>
                            </div>
                            <div class="col-6 col-md-3">
                                <a href="<?= base_url('Projects') ?>" class="btn btn-outline-success border-0 shadow-sm p-3 w-100 hover-lift">
                                    <i class="bx bx-folder fs-2 d-block mb-2"></i> Projets
                                </a>
                            </div>
                            <div class="col-6 col-md-3">
                                <a href="<?= base_url('Dons') ?>" class="btn btn-outline-info border-0 shadow-sm p-3 w-100 hover-lift">
                                    <i class="bx bx-donate-heart fs-2 d-block mb-2"></i> Dons
                                </a>
                            </div>
                            <div class="col-6 col-md-3">
                                <a href="<?= base_url('Membres') ?>" class="btn btn-outline-warning border-0 shadow-sm p-3 w-100 hover-lift text-center">
                                    <i class="bx bx-group fs-2 d-block mb-2"></i> Membres
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Graphique des membres
    const ctxMember = document.getElementById('memberChart').getContext('2d');
    new Chart(ctxMember, {
        type: 'doughnut',
        data: {
            labels: ['Fondateurs', 'Adhérents', "Membres d'honneur", 'Sympathisants'],
            datasets: [{
                data: [
                    <?= $members_fondateurs ?? 0 ?>, 
                    <?= $members_adherants ?? 0 ?>, 
                    <?= $members_honneur ?? 0 ?>, 
                    <?= $members_sympathisants ?? 0 ?>
                ],
                backgroundColor: ['#062C54', '#FF8C00', '#1a8c78', '#FFD000'],
                borderWidth: 2,
                hoverOffset: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: { legend: { display: false } }
        }
    });

    // 2. Graphique des pays
    <?php if(!empty($visitors_country)): ?>
    const ctxCountry = document.getElementById('countryChart').getContext('2d');
    new Chart(ctxCountry, {
        type: 'bar',
        data: {
            labels: [<?php foreach($visitors_country as $c) { echo "'" . addslashes(htmlspecialchars($c->country)) . "',"; } ?>],
            datasets: [{
                label: 'Visiteurs',
                data: [<?php foreach($visitors_country as $c) { echo $c->total . ","; } ?>],
                backgroundColor: '#1a8c78',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
    <?php endif; ?>
});
</script>

<style>
    .hover-lift {transition: all 0.3s ease;height: 120px}
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08)!important; }
    .avatar { transition: all 0.3s ease; }
    .hover-lift:hover .avatar { transform: scale(1.1); ;}
    .card { border-radius: 12px; }
    .progress { border-radius: 20px; background-color: #f0f0f0; overflow: hidden; }
</style>

<?php include VIEWPATH . 'includes/backend/Footer.php'; ?>