<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style type="text/css">
	

   





</style>

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
