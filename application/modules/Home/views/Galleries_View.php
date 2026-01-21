<?php 
include VIEWPATH.'includes/frontend/Header.php'; 
?>

<style>
:root {
    --primary-teal: #1a8c78;
    --dark-teal: #146c5c;
    --light-bg: #f8faf9;
}

.text-teal { color: var(--primary-teal) !important; }
.bg-teal { background: var(--primary-teal) !important; }

/* ================= PAGE HEADER ================= */
.page-header {
    padding: 130px 0 90px;
    background: 
        linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
        url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32')
        center/cover no-repeat;
}

/* ================= FILTRES GALLERIE ================= */
.gallery-filters {
    background: var(--light-bg);
    padding: 20px 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 5px 15px rgba(0,0,0,.05);
}
.gallery-filter-btn {
    border: none;
    background: transparent;
    padding: 10px 25px;
    border-radius: 30px;
    font-weight: 500;
    color: #666;
    transition: all 0.3s ease;
}
.gallery-filter-btn:hover,
.gallery-filter-btn.active {
    background: var(--primary-teal);
    color: white;
    transform: translateY(-2px);
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
.gallery-type.photos { background: #2196f3; }
.gallery-type.videos { background: #f44336; }
.gallery-type.documents { background: #4caf50; }
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
.gallery-count {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255,255,255,0.9);
    color: var(--primary-teal);
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
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

/* ================= ALBUM DÉTAIL ================= */
.album-header {
    background: linear-gradient(135deg, var(--primary-teal), var(--dark-teal));
    color: white;
    padding: 60px 0;
    margin-bottom: 40px;
}
.album-meta {
    display: flex;
    gap: 20px;
    margin-top: 15px;
    font-size: 0.9rem;
    opacity: 0.9;
}
.album-stats {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,.1);
}
.stat-icon {
    width: 50px;
    height: 50px;
    background: var(--light-bg);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-teal);
    font-size: 1.5rem;
    margin-bottom: 15px;
}

/* ================= MASONRY GALLERY ================= */
.masonry-grid {
    column-count: 3;
    column-gap: 20px;
}
.masonry-item {
    break-inside: avoid;
    margin-bottom: 20px;
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}
.masonry-img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
}
.masonry-item:hover .masonry-img {
    transform: scale(1.05);
}
.masonry-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), transparent);
    color: white;
    padding: 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.masonry-item:hover .masonry-caption {
    opacity: 1;
}

/* ================= DOCUMENTS ================= */
.document-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
    transition: all 0.3s ease;
    border: 1px solid #eee;
}
.document-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,.12);
    border-color: var(--primary-teal);
}
.doc-icon {
    width: 60px;
    height: 60px;
    background: var(--light-bg);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-teal);
    font-size: 1.8rem;
    margin-bottom: 15px;
}
.doc-size {
    color: #666;
    font-size: 0.85rem;
}

/* ================= VIDÉOS ================= */
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
.video-duration {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(0,0,0,.7);
    color: white;
    padding: 3px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
}

/* ================= TÉLÉCHARGEMENTS ================= */
.downloads-section {
    background: linear-gradient(135deg, var(--primary-teal), var(--dark-teal));
    color: white;
    border-radius: 20px;
    overflow: hidden;
}
.download-card {
    background: rgba(255,255,255,0.1);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}
.download-card:hover {
    background: rgba(255,255,255,0.15);
    transform: translateY(-5px);
}
.download-btn {
    background: white;
    color: var(--primary-teal);
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.download-btn:hover {
    background: var(--dark-teal);
    color: white;
    transform: translateY(-2px);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 992px) {
    .masonry-grid { column-count: 2; }
}
@media (max-width: 768px) {
    .masonry-grid { column-count: 1; }
    .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
    .lightbox-nav { width: 40px; height: 40px; font-size: 1.2rem; }
}
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Galerie Multimédia</h1>
        <p class="lead opacity-75">Photos, vidéos et documents de nos activités</p>
    </div>
</section>



<!-- ================= GALLERIE PRINCIPALE ================= -->
<section class="py-5">
    <div class="container">
        <!-- Section Albums -->
        <div class="row mb-5" id="albums-section" data-category="albums">
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold">Albums Photos</h3>
                    <a href="#" class="text-teal fw-bold text-decoration-none">
                        Voir tous <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Album 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#albumModal" data-album="1">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0" 
                         class="gallery-media" 
                         alt="Forum Innovation 2024">
                    <span class="gallery-type photos">Photos</span>
                    <span class="gallery-count">24 photos</span>
                    <div class="gallery-overlay">
                        <p class="gallery-date">15 Mars 2024</p>
                        <h5 class="gallery-title">Forum Innovation Sociale 2024</h5>
                    </div>
                </div>
            </div>
            
            <!-- Album 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#albumModal" data-album="2">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865" 
                         class="gallery-media" 
                         alt="Atelier Coding">
                    <span class="gallery-type photos">Photos</span>
                    <span class="gallery-count">18 photos</span>
                    <div class="gallery-overlay">
                        <p class="gallery-date">10 Mars 2024</p>
                        <h5 class="gallery-title">Atelier Coding pour Jeunes Filles</h5>
                    </div>
                </div>
            </div>
            
            <!-- Album 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#albumModal" data-album="3">
                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd" 
                         class="gallery-media" 
                         alt="Campagne Reforestation">
                    <span class="gallery-type photos">Photos</span>
                    <span class="gallery-count">32 photos</span>
                    <div class="gallery-overlay">
                        <p class="gallery-date">5 Mars 2024</p>
                        <h5 class="gallery-title">Campagne de Reforestation 2024</h5>
                    </div>
                </div>
            </div>
            
            <!-- Album 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#albumModal" data-album="4">
                    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72" 
                         class="gallery-media" 
                         alt="Conférence Leadership">
                    <span class="gallery-type photos">Photos</span>
                    <span class="gallery-count">21 photos</span>
                    <div class="gallery-overlay">
                        <p class="gallery-date">20 Février 2024</p>
                        <h5 class="gallery-title">Conférence Leadership Jeune</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section Vidéos -->
        <div class="row mb-5" id="videos-section" data-category="videos">
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold">Vidéos</h3>
                    <a href="#" class="text-teal fw-bold text-decoration-none">
                        Voir toutes <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Vidéo 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Documentaire">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">15:30</span>
                </div>
                <h5 class="fw-bold mb-2">Documentaire: Notre Impact 2023</h5>
                <p class="text-muted small">Bilan de nos réalisations sur l'année écoulée</p>
            </div>
            
            <!-- Vidéo 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/9bZkp7q19f0">
                    <img src="https://img.youtube.com/vi/9bZkp7q19f0/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Témoignages">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">8:45</span>
                </div>
                <h5 class="fw-bold mb-2">Témoignages des Bénéficiaires</h5>
                <p class="text-muted small">Histoires inspirantes de jeunes que nous accompagnons</p>
            </div>
            
            <!-- Vidéo 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/LDU_Txk06tM">
                    <img src="https://img.youtube.com/vi/LDU_Txk06tM/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Reportage">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">12:20</span>
                </div>
                <h5 class="fw-bold mb-2">Reportage: Les Jardins Communautaires</h5>
                <p class="text-muted small">Comment les jardins transforment les quartiers</p>
            </div>
        </div>



        <!-- Vidéo1 YOUTUBE AVEC LINK-->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Documentaire">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">15:30</span>
                </div>
                <h5 class="fw-bold mb-2">Documentaire: Notre Impact 2023</h5>
                <p class="text-muted small">Bilan de nos réalisations sur l'année écoulée</p>
            </div>
            
            <!-- Vidéo 2 YOUTUBE AVEC LINK -->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/9bZkp7q19f0">
                    <img src="https://img.youtube.com/vi/9bZkp7q19f0/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Témoignages">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">8:45</span>
                </div>
                <h5 class="fw-bold mb-2">Témoignages des Bénéficiaires</h5>
                <p class="text-muted small">Histoires inspirantes de jeunes que nous accompagnons</p>
            </div>
            
            <!-- Vidéo 3 YOUTUBE AVEC LINK-->
            <div class="col-lg-4 col-md-6">
                <div class="video-thumbnail mb-4" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="https://www.youtube.com/embed/LDU_Txk06tM">
                    <img src="https://img.youtube.com/vi/LDU_Txk06tM/maxresdefault.jpg" 
                         class="gallery-media" 
                         alt="Reportage">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="video-duration">12:20</span>
                </div>
                <h5 class="fw-bold mb-2">Reportage: Les Jardins Communautaires</h5>
                <p class="text-muted small">Comment les jardins transforment les quartiers</p>
            </div>
        </div>

    </div>
</section>



<!-- ================= MODAL VIDÉO ================= -->
<div class="modal fade lightbox-modal" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close position-absolute" 
                        data-bs-dismiss="modal" 
                        style="top:15px;right:15px;z-index:10;background:white;padding:10px;">
                </button>
                
                <iframe id="videoPlayer" class="lightbox-video" 
                        src="" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
                
                <div class="lightbox-caption">
                    <h5 id="videoTitle">Titre de la vidéo</h5>
                    <div class="lightbox-info">
                        <span id="videoDuration">Durée</span>
                        <span id="videoDate">Date</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>