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
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: 
        linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
        url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32')
        center/cover no-repeat;
    background-size: cover; 
    background-position: center; 
    position: relative;  
}

.page-contain{
    z-index: 2;
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
    <div class="container page-contain">
        <h1 class="display-4 fw-bold">Galerie Multimédia</h1>
        <p class="lead opacity-75">Photos, vidéos et documents de nos activités</p>
    </div>
</section>

<!-- ================= FILTRES ================= -->
<section class="gallery-filters">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <button class="gallery-filter-btn active" data-filter="all">
                <i class="fas fa-th me-2"></i> Tous
            </button>
            <button class="gallery-filter-btn" data-filter="image">
                <i class="fas fa-image me-2"></i> Images
            </button>
            <button class="gallery-filter-btn" data-filter="video">
                <i class="fas fa-video me-2"></i> Vidéos
            </button>
            <button class="gallery-filter-btn" data-filter="link">
                <i class="fas fa-link me-2"></i> Liens
            </button>
        </div>
    </div>
</section>

<!-- ================= GALLERIE PRINCIPALE ================= -->
<section class="py-5">
    <div class="container">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== FILTRAGE DES MÉDIAS ==========
    const filterButtons = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item, .link-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Mettre à jour le bouton actif
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            
            // Filtrer les éléments
            galleryItems.forEach(item => {
                const type = item.dataset.type;
                
                if (filter === 'all' || type === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // ========== MODAL IMAGE ==========
    const imageModal = document.getElementById('imageModal');
    if (imageModal) {
        imageModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const imageUrl = button.getAttribute('data-image');
            const description = button.getAttribute('data-description');
            const date = button.getAttribute('data-date');
            
            document.getElementById('lightboxImage').src = imageUrl;
            document.getElementById('imageTitle').textContent = description || 'Image';
            document.getElementById('imageDate').innerHTML = `<i class="far fa-calendar-alt me-1"></i> ${date}`;
            
            // Stocker l'URL pour le téléchargement
            window.currentImageUrl = imageUrl;
        });
    }
    
    // ========== MODAL VIDÉO ==========
    const videoModal = document.getElementById('videoModal');
    if (videoModal) {
        videoModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const videoUrl = button.getAttribute('data-video');
            const description = button.getAttribute('data-description');
            const date = button.getAttribute('data-date');
            
            const videoSource = document.getElementById('videoSource');
            const videoElement = document.getElementById('lightboxVideo');
            
            videoSource.src = videoUrl;
            videoElement.load();
            
            document.getElementById('videoTitle').textContent = description || 'Vidéo';
            document.getElementById('videoDate').innerHTML = `<i class="far fa-calendar-alt me-1"></i> ${date}`;
            
            // Stocker l'URL pour le téléchargement
            window.currentVideoUrl = videoUrl;
        });
        
        // Réinitialiser la vidéo à la fermeture
        videoModal.addEventListener('hidden.bs.modal', function() {
            const videoElement = document.getElementById('lightboxVideo');
            videoElement.pause();
            videoElement.currentTime = 0;
        });
    }
    
    // ========== DÉTECTION YOUTUBE ==========
    function isYouTubeLink(url) {
        return url.includes('youtube.com') || url.includes('youtu.be');
    }
    
    function getYouTubeEmbedUrl(url) {
        // Convertir les différentes formes d'URL YouTube en URL embed
        let videoId = '';
        
        if (url.includes('youtu.be/')) {
            videoId = url.split('youtu.be/')[1];
        } else if (url.includes('youtube.com/watch?v=')) {
            videoId = url.split('v=')[1];
            const ampersandPosition = videoId.indexOf('&');
            if (ampersandPosition !== -1) {
                videoId = videoId.substring(0, ampersandPosition);
            }
        } else if (url.includes('youtube.com/embed/')) {
            videoId = url.split('embed/')[1];
        }
        
        return `https://www.youtube.com/embed/${videoId}?autoplay=1`;
    }
    
    // Gestion des liens YouTube dans les cartes
    document.querySelectorAll('.link-item[data-type="link"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const url = this.href;
            
            if (isYouTubeLink(url)) {
                e.preventDefault();
                
                // Préparer le modal YouTube
                const description = this.querySelector('h5').textContent;
                const dateElement = this.querySelector('.small.opacity-75');
                const date = dateElement ? dateElement.textContent.replace('Cliquer pour ouvrir', '').trim() : '';
                
                document.getElementById('youtubePlayer').src = getYouTubeEmbedUrl(url);
                document.getElementById('youtubeTitle').textContent = description;
                document.getElementById('youtubeDate').innerHTML = `<i class="far fa-calendar-alt me-1"></i> ${date}`;
                document.getElementById('youtubeLink').href = url;
                
                // Ouvrir le modal
                const youtubeModal = new bootstrap.Modal(document.getElementById('youtubeModal'));
                youtubeModal.show();
            }
            // Pour les autres liens, la navigation normale se fera
        });
    });
    
    // ========== FONCTIONS DE TÉLÉCHARGEMENT ==========
    window.downloadImage = function() {
        if (window.currentImageUrl) {
            const link = document.createElement('a');
            link.href = window.currentImageUrl;
            link.download = 'image-' + Date.now() + '.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };
    
    window.downloadVideo = function() {
        if (window.currentVideoUrl) {
            const link = document.createElement('a');
            link.href = window.currentVideoUrl;
            link.download = 'video-' + Date.now() + '.mp4';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };
    
    // ========== ANIMATION AU SCROLL ==========
    function animateOnScroll() {
        const items = document.querySelectorAll('.gallery-item, .link-item');
        
        items.forEach(item => {
            const itemTop = item.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (itemTop < windowHeight - 100) {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }
        });
    }
    
    // Initialiser l'animation
    galleryItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });
    
    setTimeout(animateOnScroll, 100);
    window.addEventListener('scroll', animateOnScroll);
    
    // ========== LAZY LOADING DES IMAGES ==========
    const lazyImages = document.querySelectorAll('.gallery-media[src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => {
        if (img.complete) return;
        imageObserver.observe(img);
    });
});
</script>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>




















