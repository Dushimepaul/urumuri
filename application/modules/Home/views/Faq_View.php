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
                    url('https://pixabay.com/images/download/faq-2639673.png') center/cover no-repeat;
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
        <h1 class="display-4 fw-bold mb-3 animate-fade-in">FAQ</h1>
        <p class="lead opacity-75 fs-5 animate-fade-in" style="animation-delay: 0.2s;">
            Questions Fréquentes
        </p>
    </div>
</section>

<!-- ================= FAQ ================= -->
<section class="py-5 bg-light">
    <div class="container-fluid">

        <!-- ===== TITRE ===== -->
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

        <!-- ===== ACCORDION ===== -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="accordion" id="faqAccordion">
                    <?php if (!empty($faq)): ?>
                        <?php $i = 1; ?>
                        <?php foreach($faq as $f): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $i ?>">
                                    <button class="accordion-button collapsed" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" 
                                            aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                        <?= htmlspecialchars($f['Question'], ENT_QUOTES, 'UTF-8') ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $i ?>" class="accordion-collapse collapse" 
                                     aria-labelledby="heading<?= $i ?>" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= nl2br(htmlspecialchars($f['Response'], ENT_QUOTES, 'UTF-8')) ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted text-center">Aucune question fréquente trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>