<?php include VIEWPATH.'includes/backend/Header.php'; ?>
<?php include VIEWPATH.'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH.'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content" style="--jaune: #FFD000; --orange: #FF8C00; --vert: #0F766E; --bleu-fonce: #062C54; --vert-bleute: #1a8c78;">

        <!-- Breadcrumb amélioré -->
        <div class="page-breadcrumb d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <h4 class="mb-0 me-2" style="color: var(--bleu-fonce); font-weight: 600;">
                    <i class="bx bx-home-alt me-2"></i>Tableau de bord
                </h4>
                <div class="badge bg-light text-dark px-3 py-1 rounded-pill">
                    <small><i class="bx bx-calendar me-1"></i> <?= date('d/m/Y') ?></small>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary d-flex align-items-center">
                    <i class="bx bx-download me-1"></i> Exporter
                </button>
                <button type="button" class="btn" style="background-color: var(--vert-bleute); color: white;">
                    <i class="bx bx-refresh me-1"></i> Actualiser
                </button>
            </div>
        </div>

        <!-- Alertes et notifications -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-light border-start border-5 border-warning d-flex align-items-center justify-content-between" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-bell text-warning fs-4 me-3"></i>
                        <div>
                            <h6 class="alert-heading mb-0">Bienvenue sur votre tableau de bord</h6>
                            <small class="text-muted">Vous avez <?= $contact_count ?? 0 ?> nouveaux messages et <?= $projects_in_progress ?? 0 ?> projets en cours</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>

        <!-- Statistiques principales -->
        <div class="row g-3 mb-4">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--bleu-fonce);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2">Messages reçus</h6>
                                <h2 class="mb-0" style="color: var(--bleu-fonce); font-weight: 700;"><?= $contact_count ?? 0 ?></h2>
                                <small class="text-success"><i class="bx bx-up-arrow-alt"></i> +12% ce mois</small>
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
                                <small class="text-success"><i class="bx bx-up-arrow-alt"></i> +8% ce mois</small>
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

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-lift" style="border-top: 4px solid var(--vert-bleute);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-2">Total membres</h6>
                                <h2 class="mb-0" style="color: var(--vert-bleute); font-weight: 700;"><?= $members_total ?? 0 ?></h2>
                                <small class="text-success"><i class="bx bx-up-arrow-alt"></i> +5% ce mois</small>
                            </div>
                            <div class="avatar" style="background-color: rgba(26, 140, 120, 0.1); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <i class="bx bx-group fs-3" style="color: var(--vert-bleute);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Dons -->
        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">
                            <i class="bx bx-gift me-2"></i>Statistiques des dons
                        </h5>
                        <select class="form-select form-select-sm w-auto">
                            <option selected>Ce mois</option>
                            <option>Ce trimestre</option>
                            <option>Cette année</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center p-3 rounded" style="background-color: rgba(26, 140, 120, 0.05);">
                                    <div class="me-3">
                                        <div class="rounded-circle p-3" style="background-color: rgba(26, 140, 120, 0.1);">
                                            <i class="bx bx-wallet fs-4" style="color: var(--vert-bleute);"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Dons financiers</h6>
                                        <h4 class="mb-0" style="color: var(--vert-bleute);"><?= $dons_financiers ?? 0 ?></h4>
                                        <small class="text-success">+15%</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="d-flex align-items-center p-3 rounded" style="background-color: rgba(255, 140, 0, 0.05);">
                                    <div class="me-3">
                                        <div class="rounded-circle p-3" style="background-color: rgba(255, 140, 0, 0.1);">
                                            <i class="bx bx-package fs-4" style="color: var(--orange);"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Dons matériels</h6>
                                        <h4 class="mb-0" style="color: var(--orange);"><?= $dons_materiels ?? 0 ?></h4>
                                        <small class="text-warning">+8%</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="d-flex align-items-center p-3 rounded" style="background-color: rgba(6, 44, 84, 0.05);">
                                    <div class="me-3">
                                        <div class="rounded-circle p-3" style="background-color: rgba(6, 44, 84, 0.1);">
                                            <i class="bx bx-book-open fs-4" style="color: var(--bleu-fonce);"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Compétences</h6>
                                        <h4 class="mb-0" style="color: var(--bleu-fonce);"><?= $competences ?? 0 ?></h4>
                                        <small class="text-info">+12%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Graphique simple -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Évolution des dons</h6>
                                <div class="text-muted">
                                    <small>Réalisé: <span class="text-success"><?= $dons_remis ?? 0 ?></span> | 
                                    En attente: <span class="text-warning"><?= $dons_non_remis ?? 0 ?></span></small>
                                </div>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" style="width: 75%; background-color: var(--vert-bleute);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section membres -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">
                            <i class="bx bx-user-circle me-2"></i>Répartition des membres
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <div class="rounded-circle p-2" style="background-color: var(--bleu-fonce);">
                                        <i class="bx bx-star text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Fondateurs</h6>
                                    <small class="text-muted"><?= $members_fondateurs ?? 0 ?> membres</small>
                                </div>
                                <div class="badge" style="background-color: var(--bleu-fonce); color: white;">
                                    <?= $members_fondateurs && $members_total ? round(($members_fondateurs/$members_total)*100, 1) : 0 ?>%
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <div class="rounded-circle p-2" style="background-color: var(--orange);">
                                        <i class="bx bx-user-plus text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Adhérents</h6>
                                    <small class="text-muted"><?= $members_adherants ?? 0 ?> membres</small>
                                </div>
                                <div class="badge" style="background-color: var(--orange); color: white;">
                                    <?= $members_adherants && $members_total ? round(($members_adherants/$members_total)*100, 1) : 0 ?>%
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="rounded-circle p-2" style="background-color: var(--jaune);">
                                        <i class="bx bx-heart text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Sympathisants</h6>
                                    <small class="text-muted"><?= $members_sympathisants ?? 0 ?> membres</small>
                                </div>
                                <div class="badge" style="background-color: var(--jaune); color: black;">
                                    <?= $members_sympathisants && $members_total ? round(($members_sympathisants/$members_total)*100, 1) : 0 ?>%
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <div class="position-relative d-inline-block">
                                <canvas id="memberChart" width="120" height="120"></canvas>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <h4 class="mb-0"><?= $members_total ?? 0 ?></h4>
                                    <small class="text-muted">Total</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-3">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0" style="color: var(--bleu-fonce);">
                            <i class="bx bx-rocket me-2"></i>Actions rapides
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="<?= base_url('admin/messages') ?>" class="card action-card border-0 text-decoration-none text-center p-4 hover-lift">
                                    <div class="card-body">
                                        <div class="avatar mx-auto mb-3" style="background-color: rgba(6, 44, 84, 0.1); width: 70px; height: 70px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-envelope fs-3" style="color: var(--bleu-fonce);"></i>
                                        </div>
                                        <h6 class="mb-0">Voir les messages</h6>
                                        <small class="text-muted"><?= $contact_count ?? 0 ?> non lus</small>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-3">
                                <a href="<?= base_url('admin/projects') ?>" class="card action-card border-0 text-decoration-none text-center p-4 hover-lift">
                                    <div class="card-body">
                                        <div class="avatar mx-auto mb-3" style="background-color: rgba(15, 118, 110, 0.1); width: 70px; height: 70px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-folder fs-3" style="color: var(--vert);"></i>
                                        </div>
                                        <h6 class="mb-0">Gérer projets</h6>
                                        <small class="text-muted"><?= $projects_in_progress ?? 0 ?> en cours</small>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-3">
                                <a href="<?= base_url('admin/dons') ?>" class="card action-card border-0 text-decoration-none text-center p-4 hover-lift">
                                    <div class="card-body">
                                        <div class="avatar mx-auto mb-3" style="background-color: rgba(26, 140, 120, 0.1); width: 70px; height: 70px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-donate-heart fs-3" style="color: var(--vert-bleute);"></i>
                                        </div>
                                        <h6 class="mb-0">Dons & financements</h6>
                                        <small class="text-muted">Gérer les contributions</small>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-3">
                                <a href="<?= base_url('admin/membres') ?>" class="card action-card border-0 text-decoration-none text-center p-4 hover-lift">
                                    <div class="card-body">
                                        <div class="avatar mx-auto mb-3" style="background-color: rgba(255, 140, 0, 0.1); width: 70px; height: 70px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-user-circle fs-3" style="color: var(--orange);"></i>
                                        </div>
                                        <h6 class="mb-0">Membres</h6>
                                        <small class="text-muted"><?= $members_total ?? 0 ?> inscrits</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


<script>
// Script simple pour le graphique circulaire
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('memberChart').getContext('2d');
    const fondateurs = <?= $members_fondateurs ?? 0 ?>;
    const adherents = <?= $members_adherants ?? 0 ?>;
    const sympathisants = <?= $members_sympathisants ?? 0 ?>;
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Fondateurs', 'Adhérents', 'Sympathisants'],
            datasets: [{
                data: [fondateurs, adherents, sympathisants],
                backgroundColor: [
                    '#062C54',  // bleu-fonce
                    '#FF8C00',  // orange
                    '#FFD000'   // jaune
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = fondateurs + adherents + sympathisants;
                            const percentage = total > 0 ? Math.round((context.raw / total) * 100) : 0;
                            return `${context.label}: ${context.raw} (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '65%'
        }
    });
});
</script>

<style>
.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
.action-card:hover {
    background-color: #f8f9fa;
}
.avatar {
    transition: transform 0.3s ease;
}
.hover-lift:hover .avatar {
    transform: scale(1.1);
}
.progress {
    border-radius: 10px;
}
.progress-bar {
    border-radius: 10px;
}
</style>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>