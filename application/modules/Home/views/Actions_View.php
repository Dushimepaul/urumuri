<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
    /* ================= PAGE HEADER ================= */
    .page-header {
        padding: 130px 0 90px;
        background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                    url('https://images.unsplash.com/photo-1508780709619-79562169bc64') center/cover no-repeat;
    }



.btn-lg {
    transition: all 0.3s ease;
}

.btn-lg:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}


    /* ================= GRILLE GALLERIE ================= */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}
.gallery-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s ease;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}
.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}
.gallery-media {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.gallery-item:hover .gallery-media {
    transform: scale(1.08);
}
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), transparent 50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
.gallery-type {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(0,0,0,.7);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    backdrop-filter: blur(10px);
}
.gallery-type.image { background: #2196f3; }
.gallery-type.video { background: #f44336; }
.gallery-type.link { background: #4caf50; }
.gallery-date {
    color: rgba(255,255,255,0.8);
    font-size: 0.85rem;
    margin-bottom: 5px;
}
.gallery-title {
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
    line-height: 1.4;
}

/* ================= LIGHTBOX ================= */
.lightbox-modal .modal-content {
    background: transparent;
    border: none;
}
.lightbox-modal .modal-body {
    padding: 0;
    position: relative;
}
.lightbox-img {
    width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 10px;
}
.lightbox-video {
    width: 100%;
    height: 70vh;
    border-radius: 10px;
}
.lightbox-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,.5);
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}
.lightbox-nav:hover {
    background: var(--primary-teal);
    transform: translateY(-50%) scale(1.1);
}
.lightbox-nav.prev { left: 20px; }
.lightbox-nav.next { right: 20px; }
.lightbox-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), transparent);
    color: white;
    padding: 30px 20px 20px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.lightbox-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    font-size: 0.9rem;
    opacity: 0.8;
}

/* ================= VIDÉOS ================= */

.gallery-item {
    display: block;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.gallery-item .fab.fa-youtube {
    text-shadow: 0 5px 15px rgba(0,0,0,0.6);
}

.video-thumbnail {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
}
.video-thumbnail::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,.3);
    transition: background 0.3s ease;
}


.video-thumbnail:hover::before {
    background: rgba(0,0,0,.5);
}

.play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-teal);
    font-size: 1.8rem;
    transition: all 0.3s ease;
}
.video-thumbnail:hover .play-btn {
    background: var(--primary-teal);
    color: white;
    transform: translate(-50%, -50%) scale(1.1);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
    .lightbox-nav { width: 40px; height: 40px; font-size: 1.2rem; }
}

/* Style pour les liens externes */
.link-item {
    height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}
.link-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}
.link-icon {
    font-size: 3rem;
    margin-bottom: 15px;
}
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Nos Realisation</h1>
        <p class="lead opacity-75 fs-5">
            Découvrez les projets réalisés par Urumuri
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





<!-- ================= GALLERIE PRINCIPALE ================= -->
<section class="py-5">
    <div class="container">

<!-- ===== TITRE PAGE GALLERY ===== -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h1 class="fw-bold display-6 mb-2">
            Galerie
        </h1>

        <p class="text-muted mb-4">
            Découvrez nos photos et vidéos liées à nos événements et projets
        </p>

        <div class="mx-auto"
             style="width: 80px; height: 4px; background: #0d6efd; border-radius: 10px;">
        </div>

    </div>
</section>
        <?php if (!empty($galleries)): ?>
            <div class="gallery-grid" id="galleryContainer">
                <?php foreach ($galleries as $gallery): ?>
                    <?php if ($gallery['TypeMedia'] == 'image'): ?>
                        <!-- CARD IMAGE -->
                        <div class="gallery-item" 
                             data-type="image"
                             data-bs-toggle="modal" 
                             data-bs-target="#imageModal"
                             data-image="<?= base_url('attachments/gallery/' . $gallery['Media']) ?>"
                             data-description="<?= htmlspecialchars($gallery['Description'] ?? '') ?>"
                             data-date="<?= date('d/m/Y', strtotime($gallery['Created_at'])) ?>">
                            
                            <img src="<?= base_url('attachments/gallery/' . $gallery['Media']) ?>" 
                                 class="gallery-media" 
                                 alt="<?= htmlspecialchars($gallery['Description'] ?? 'Image') ?>"
                                 onerror="this.src='https://via.placeholder.com/400x300?text=Image+Non+Disponible'">
                            
                            <span class="gallery-type image">Image</span>
                            
                            <div class="gallery-overlay">
                                <p class="gallery-date">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    <?= date('d/m/Y', strtotime($gallery['Created_at'])) ?>
                                </p>
                                <h5 class="gallery-title">
                                    <?= !empty($gallery['Description']) ? htmlspecialchars(substr($gallery['Description'], 0, 60)) . '...' : 'Sans description' ?>
                                </h5>
                            </div>
                        </div>

                    <?php elseif ($gallery['TypeMedia'] == 'video'): ?>
                        <!-- CARD VIDEO -->
                        <div class="gallery-item"
                             data-type="video"
                             data-bs-toggle="modal" 
                             data-bs-target="#videoModal"
                             data-video="<?= base_url('attachments/gallery/' . $gallery['Media']) ?>"
                             data-description="<?= htmlspecialchars($gallery['Description'] ?? '') ?>"
                             data-date="<?= date('d/m/Y', strtotime($gallery['Created_at'])) ?>">
                            
                            <video class="gallery-media" muted>
                                <source src="<?= base_url('attachments/gallery/' . $gallery['Media']) ?>" type="video/mp4">
                            </video>
                            
                            <span class="gallery-type video">Vidéo</span>
                            
                            <div class="video-play-overlay">
                                <div class="play-btn">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            
                            <div class="gallery-overlay">
                                <p class="gallery-date">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    <?= date('d/m/Y', strtotime($gallery['Created_at'])) ?>
                                </p>
                                <h5 class="gallery-title">
                                    <?= !empty($gallery['Description']) ? htmlspecialchars(substr($gallery['Description'], 0, 60)) . '...' : 'Vidéo' ?>
                                </h5>
                            </div>
                        </div>

                    <?php else: ?>

                    <?php 
                  $youtubeId = $this->Model->getYoutubeId($gallery['Media']);
                  $thumbnail = $youtubeId 
                  ? "https://img.youtube.com/vi/$youtubeId/maxresdefault.jpg"
                  : base_url('assets/images/video-placeholder.jpg');
                    ?>

<!-- CARD LINK (Youtube/autres) -->
<a href="<?= htmlspecialchars($gallery['Media']) ?>" 
   class="gallery-item link-item position-relative"
   data-type="link"
   target="_blank"
   rel="noopener noreferrer">

    <!-- THUMBNAIL -->
    <div class="ratio ratio-16x9 overflow-hidden rounded-top">
        <img src="<?= $thumbnail ?>"
             alt="Miniature vidéo"
             class="w-100 h-100"
             style="object-fit: cover;">
    </div>

    <!-- ICON PLAY -->
    <div class="position-absolute top-50 start-50 translate-middle text-white"
         style="font-size: 3rem;">
        <i class="fab fa-youtube"></i>
    </div>

    <span class="gallery-type link">Youtube</span>

    <div class="text-center p-4">
        <h5 class="fw-bold mb-2">
            <?= !empty($gallery['Description']) 
                ? htmlspecialchars(substr($gallery['Description'], 0, 50)) . '...' 
                : 'Vidéo YouTube' ?>
        </h5>

        <p class="small mb-0 opacity-75">
            <i class="far fa-calendar-alt me-1"></i>
            <?= date('d/m/Y', strtotime($gallery['Created_at'])) ?>
        </p>

        <p class="small mt-2 text-danger">
            <i class="fas fa-play me-1"></i>
            Lire la vidéo
        </p>
    </div>
</a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- MESSAGE SI AUCUNE GALERIE -->
            <div class="text-center py-5">
                <div class="py-5">
                    <i class="bx bx-image-alt bx-lg text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mb-3">Aucun média disponible</h4>
                    <p class="text-muted">La galerie sera bientôt mise à jour avec nos derniers médias.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- ===== BOUTON VOIR TOUTES LES PHOTOS ===== -->
<div class="text-center mt-5">
    <a href="<?=base_url('Home/Galleries')?>"
       class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">

        <i class="bi bi-images me-2"></i>
        Voir toutes les photos
    </a>
</div>
</section>




<!-- ================= MODAL IMAGE ================= -->
<div class="modal fade lightbox-modal" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close position-absolute" 
                        data-bs-dismiss="modal" 
                        style="top:15px;right:15px;z-index:10;background:white;padding:10px;">
                </button>
                
                <img id="lightboxImage" class="lightbox-img" src="" alt="">
                
                <div class="lightbox-caption">
                    <h5 id="imageTitle">Titre de l'image</h5>
                    <div class="lightbox-info">
                        <span id="imageDate">
                            <i class="far fa-calendar-alt me-1"></i> Date
                        </span>
                        <button class="btn btn-sm btn-light" onclick="downloadImage()">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODAL VIDÉO ================= -->
<div class="modal fade lightbox-modal" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close position-absolute" 
                        data-bs-dismiss="modal" 
                        style="top:15px;right:15px;z-index:10;background:white;padding:10px;">
                </button>
                
                <video id="lightboxVideo" class="lightbox-video" controls>
                    <source id="videoSource" src="" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                
                <div class="lightbox-caption">
                    <h5 id="videoTitle">Titre de la vidéo</h5>
                    <div class="lightbox-info">
                        <span id="videoDate">
                            <i class="far fa-calendar-alt me-1"></i> Date
                        </span>
                        <button class="btn btn-sm btn-light" onclick="downloadVideo()">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODAL YOUTUBE ================= -->
<div class="modal fade lightbox-modal" id="youtubeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close position-absolute" 
                        data-bs-dismiss="modal" 
                        style="top:15px;right:15px;z-index:10;background:white;padding:10px;">
                </button>
                
                <iframe id="youtubePlayer" class="lightbox-video" 
                        src="" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
                
                <div class="lightbox-caption">
                    <h5 id="youtubeTitle">Titre YouTube</h5>
                    <div class="lightbox-info">
                        <span id="youtubeDate">
                            <i class="far fa-calendar-alt me-1"></i> Date
                        </span>
                        <a id="youtubeLink" href="#" target="_blank" class="btn btn-sm btn-light">
                            <i class="fas fa-external-link-alt me-1"></i> Ouvrir sur YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
