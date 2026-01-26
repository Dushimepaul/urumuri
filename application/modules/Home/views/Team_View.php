<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style type="text/css">
	
/* ================= UTILITY CLASSES ================= */
    .text-teal { color: var(--primary-teal) !important; }
    .bg-teal { background-color: var(--primary-teal) !important; }
    .bg-light-teal { background-color: var(--light-teal) !important; }
    .border-teal { border-color: var(--primary-teal) !important; }

/* ================= TEAM MEMBERS ================= */
    .member-card {
        border: none;
        background: transparent;
        text-align: center;
        padding: 25px 15px;
        transition: all 0.3s ease;
        height: 100%;
    }

    .member-card:hover {
        transform: translateY(-5px);
    }

    .member-img-wrapper {
        width: 160px;
        height: 160px;
        margin: 0 auto 20px;
        position: relative;
        border-radius: 50%;
        padding: 5px;
        background: linear-gradient(135deg, var(--primary-teal), var(--dark-teal));
    }

    .member-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: var(--light-teal);
        color: var(--primary-teal);
        border-radius: 50%;
        margin: 0 5px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-links a:hover {
        background: var(--primary-teal);
        color: white;
        transform: translateY(-3px);
    }


    /* ===== CATÉGORIES DE MEMBRES ===== */
.member-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin: 50px 0;
}

.member-card {
    background: white;
    border-radius: 20px;
    padding: 35px 25px;
    text-align: center;
    transition: all 0.4s ease;
    border: 2px solid #e9ecef;
    position: relative;
    overflow: hidden;
}

.member-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: var(--primary-teal);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.member-card:hover::before {
    transform: scaleX(1);
}

.member-card:hover {
    transform: translateY(-10px);
    border-color: var(--primary-teal);
    box-shadow: 0 20px 40px rgba(26, 140, 120, 0.15);
}

.member-icon {
    width: 80px;
    height: 80px;
    background: var(--light-teal);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: var(--primary-teal);
    font-size: 2rem;
    transition: all 0.3s ease;
}

.member-card:hover .member-icon {
    background: var(--primary-teal);
    color: white;
    transform: rotate(5deg) scale(1.1);
}

</style>
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
                    url('https://images.pexels.com/photos/7550439/pexels-photo-7550439.jpeg') center/cover no-repeat;
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
        <h1 class="display-4 fw-bold mb-3 animate-fade-in">Notre Equipe</h1>
        <p class="lead opacity-75 fs-5 animate-fade-in" style="animation-delay: 0.2s;">
            Découvrez Les Membres Fondateurs d'Urumuri
        </p>
    </div>
</section>

<!-- ================= TEAM ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-light-teal text-teal px-4 py-2 rounded-pill fw-bold mb-3">
                NOTRE ÉQUIPE
            </span>
            <h2 class="display-5 fw-bold mt-2 mb-3">
               <span class="text-teal">LES MEMBRES FONDATEURS</span>
            </h2>
            <p class="text-muted mx-auto fs-5" style="max-width: 700px;">
                Découvrez les personnes fondateurs de URUMURU ICSB
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php if (!empty($membres)): ?>
                <?php foreach($membres as $member): ?>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="member-card">
                            <div class="member-img-wrapper">
                                <img src="<?=base_url()?>attachments/membres/<?=$member['image']?>"
                                     class="member-img"
                                     alt="<?= htmlspecialchars($member['nom_complet']) ?>"
                                     onerror="this.src='<?= base_url('assets/backend/images/user.png') ?>'">
                            </div>
                            <h5 class="fw-bold mb-2"><?= htmlspecialchars($member['nom_complet']) ?></h5>
                            <p class="text-teal small fw-bold mb-3"><?= htmlspecialchars($member['profil']) ?></p>
                            <div class="social-links">
                                <?php if ($member['linkedln'] ): ?>
                                <a href="<?= $member['linkedln'] ?? '#' ?>" target="_blank" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <?php endif ?>
                                <?php if ($member['facebook'] ): ?>
                                <a href="<?= $member['facebook'] ?? '#' ?>" target="_blank" title="Twitter">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <?php endif ?>
                                <?php if ($member['youtube'] ): ?>
                                   <a href="<?= $member['youtube'] ?? '#' ?>" target="_blank" title="LinkedIn">
                                    <i class="fab fa-youtube"></i>
                                </a> 
                                <?php endif ?>
                                <?php if ($member['instagram'] ): ?>
                                <a href="<?= $member['instagram'] ?? '#' ?>" target="_blank" title="Twitter">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="objective-box">
                        <i class="fas fa-users fa-3x text-teal mb-3"></i>
                        <h5 class="fw-bold text-dark">Équipe en construction</h5>
                        <p class="text-muted">Les informations sur notre équipe seront bientôt disponibles.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<!-- ===== CATÉGORIES DE MEMBRES ===== -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5 display-5">CATEGORIES <span class="text-teal">DES MEMBRES</span></h2>
        
        <div class="member-categories">
            <!-- Membre Fondateur -->
            <div class="member-card">
                <div class="member-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h4 class="fw-bold mb-3">Membre Fondateur</h4>
                <p class="text-muted mb-4">Signataires originaux des statuts, droit de vote permanent.</p>
                <div class="text-start mb-3">
                    
                </div>
            </div>

            <!-- Membre Adhérent -->
            <div class="member-card">
                <div class="member-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h4 class="fw-bold mb-3">Membre Adhérent</h4>
                <p class="text-muted mb-4">Membre actif avec cotisation mensuelle et droit de vote aux AG.</p>
                <div class="text-center mb-3">
                    
                </div>
            </div>

            <!-- Membre d'Honneur -->
            <div class="member-card">
                <div class="member-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h4 class="fw-bold mb-3">Membre d'Honneur</h4>
                <p class="text-muted mb-4">Reconnaissance pour contributions exceptionnelles à l'association.</p>
                <div class="text-start mb-3">
                   
                </div>
            </div>

            <!-- Membre Sympathisant -->
            <div class="member-card">
                <div class="member-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h4 class="fw-bold mb-3">Membre Sympathisant</h4>
                <p class="text-muted mb-4">Soutien ponctuel sans engagement administratif formel.</p>
                <div class="text-center mb-3">
                </div>
            </div>
        </div>
    </div>
</section>


<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
