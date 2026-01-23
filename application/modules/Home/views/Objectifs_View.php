<?php include VIEWPATH.'includes/frontend/Header.php'; ?>
<style>
     /* ================= PAGE HEADER ================= */
    .page-header {
        height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
        padding: 130px 0 90px;
        position: relative;
        background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                    url('https://c.pxhere.com/photos/d6/be/team_teamwork_team_spirit_together_cooperation_community_partnership_cooperate-1403218.jpg!d') center/cover no-repeat;
    }
    .flur{
        position: absolute;
        inset: 0;
        backdrop-filter: blur(3px);
        background: rgba(0, 0, 0, 0.2);
    }

</style>
<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="flur"></div>
    <div class="container">
        <h1 class="display-4 fw-bold mb-3 animate-fade-in">Objectifs</h1>
        <p class="lead opacity-75 fs-5 animate-fade-in" style="animation-delay: 0.2s;">
            Découvrez les Objectifs d'Urumuri
        </p>
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


<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
