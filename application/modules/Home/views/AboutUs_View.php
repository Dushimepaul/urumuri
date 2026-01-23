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
                    url('https://images.unsplash.com/photo-1508780709619-79562169bc64') center/cover no-repeat;
    }


  /* ================= DEVISE ================= */
    .devise-banner {
        height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
        background: linear-gradient(135deg, var(--primary-teal), var(--dark-teal));
        color: #fff;
        padding: 60px 0;
    }

    .devise-banner::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.3;
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
        <h1 class="display-4 fw-bold mb-3 animate-fade-in">À Propos de Nous</h1>
        <p class="lead opacity-75 fs-5 animate-fade-in" style="animation-delay: 0.2s;">
            Découvrez la Vision et la Mission d'Urumuri
        </p>
    </div>
</section>

<!-- ================= DEVISE ================= -->
<section class="devise-banner text-center">
    <div class="container position-relative z-2">
        <h2 class="fw-light mb-3 small text-uppercase letter-spacing-2 opacity-90">Notre Devise</h2>
        <p class="display-6 fw-bold mb-0 animate-fade-in">«<?= htmlspecialchars($devise["devise"] ?? '') ?>»</p>
    </div>
</section>

<!-- ================= ABOUT US + VISION/MISSION ================= -->
<section class="py-5 mt-4">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-7">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold mb-3">NOTRE HISTOIRE</span>
                <h2 class="display-5 fw-bold mb-4"><span class="text-teal">QUI</span> SOMMES-NOUS ?</h2>
                <div class="ps-4 border-start border-teal border-4 mb-4">
                    <p class="lead fw-bold text-teal mb-0"><?= $about_us['title'] ?? 'Urumuri' ?></p>
                </div>

                <div class="text-muted lh-lg mb-4">
                    <?= $about_us['details'] ?? 'Contenu en cours de rédaction...' ?>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="mission-card p-4 shadow-sm">
                            <div class="icon-box">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4 class="fw-bold text-teal mb-3">Notre Vision</h4>
                            <p class="text-muted mb-0">
                                <?= htmlspecialchars($vision["content"] ?? '') ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mission-card p-4 shadow-sm">
                            <div class="icon-box">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h4 class="fw-bold text-teal mb-3">Notre Mission</h4>
                            <p class="text-muted mb-0">
                                <?= htmlspecialchars($mission["content"] ?? '') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>



        
   