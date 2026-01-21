<?php include VIEWPATH.'includes/frontend/Header.php'; ?>




<!-- ================= TIMELINE/HISTORY ================= 
<section class="timeline-section bg-light-bg">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-teal text-white px-4 py-2 rounded-pill fw-bold mb-3">
                NOTRE HISTORIQUE
            </span>
            <h2 class="display-5 fw-bold mt-3 mb-3">
                Parcours d'<span class="text-teal">Impact</span>
            </h2>
            <p class="text-muted mx-auto fs-5" style="max-width: 700px;">
                Les moments clés qui ont façonné notre histoire et notre engagement
            </p>
        </div>

        <div class="timeline">
            <?php if (!empty($historique)): ?>
                <?php foreach($historique as $index => $hist): ?>
                    <div class="timeline-item" style="animation-delay: <?= $index * 0.2 ?>s;">
                        <span class="timeline-date">
                            <?= date('d M Y', strtotime($hist['date_evenement'])) ?>
                        </span>
                        <div class="timeline-content">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-rocket text-teal me-2"></i>
                                <?= htmlspecialchars($hist['titre']) ?>
                            </h5>
                            <p class="text-muted mb-0">
                                <?= nl2br(htmlspecialchars($hist['description'])) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="timeline-item">
                    <div class="timeline-content text-center py-4">
                        <i class="fas fa-history fa-3x text-teal mb-3"></i>
                        <h5 class="fw-bold text-dark">Notre histoire s'écrit chaque jour</h5>
                        <p class="text-muted">Les moments marquants de notre parcours seront bientôt partagés ici.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>-->

<!-- ================= FAQ ================= -->
<section class="py-5">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <span class="badge bg-light-teal text-teal px-4 py-2 rounded-pill fw-bold mb-3">
                FAQ
            </span>
            <h2 class="display-5 fw-bold mt-3 mb-3">
                Questions <span class="text-teal">Fréquentes</span>
            </h2>
            <p class="text-muted mx-auto fs-5" style="max-width: 700px;">
                Trouvez rapidement des réponses à vos interrogations
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="accordion" id="faqAccordion">

                    <?php if (!empty($faq)): ?>
                        <?php $i = 1; ?>
                        <?php foreach($faq as $f): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $i ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                        <?= htmlspecialchars($f['Question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= htmlspecialchars($f['Response']) ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Aucune question fréquente trouvée.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>


<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
