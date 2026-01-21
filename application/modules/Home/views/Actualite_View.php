<?php 
include VIEWPATH.'includes/frontend/Header.php'; 
?>

<!-- ================= STYLES ================= -->
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
    background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
                url('https://images.unsplash.com/photo-1499750310107-5fef28a66643') center/cover no-repeat;
    text-align: center;
    color: white;
}

/* ================= ARTICLES ================= */
.article-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s ease;
    height: 100%;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
    margin-bottom: 20px;
}
.article-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0,0,0,.12);
}
.article-img {
    height: 220px;
    object-fit: cover;
    width: 100%;
    transition: transform 0.5s ease;
}
.article-card:hover .article-img {
    transform: scale(1.05);
}
.article-category {
    background: var(--primary-teal);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    position: absolute;
    top: 15px;
    left: 15px;
}
.article-meta {
    font-size: 0.9rem;
    color: #666;
}
.article-meta i {
    color: var(--primary-teal);
    margin-right: 5px;
}
.article-read-time {
    background: var(--light-bg);
    color: var(--primary-teal);
    padding: 3px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
}

/* ================= SIDEBAR ================= */
.sidebar-widget {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}
.widget-title {
    color: var(--primary-teal);
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--light-bg);
}

/* ================= PAGINATION ================= */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin-top: 20px;
}
.pagination li {
    margin: 0 5px;
}
.pagination li a {
    padding: 6px 12px;
    border: 1px solid var(--primary-teal);
    border-radius: 5px;
    color: var(--primary-teal);
    text-decoration: none;
    cursor: pointer;
}
.pagination li.active a {
    background-color: var(--primary-teal);
    color: white;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .article-img { height: 180px; }
}
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-header">
    <div class="container">
        <h1 class="display-4 fw-bold">Notre Blog</h1>
        <p class="lead opacity-75">Actualités, réflexions et analyses sur nos actions</p>
    </div>
</section>

<!-- ================= CONTENU PRINCIPAL ================= -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- ARTICLES PRINCIPAUX -->
            <div class="col-lg-12">
                <div id="articles-list">
                    <div class="list row g-4">
                        <?php if(!empty($Actualite)): ?>
                            <?php foreach($Actualite as $article): ?>
                            <div class="col-md-4 article-item">
                                <div class="article-card">
                                    <div class="position-relative overflow-hidden">
                                        <img src="<?= base_url('attachments/news_media/'.$article['image']); ?>" 
                                             class="article-img" 
                                             alt="<?= htmlspecialchars($article['title']) ?>">
                                        <span class="article-category">Actualités</span>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="article-meta">
                                                <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($article['date_insertion'])) ?>
                                            </div>
                                            <span class="article-read-time">5 min</span>
                                        </div>
                                        <h4 class="fw-bold mb-3 name"><?= htmlspecialchars($article['title']) ?></h4>
                                        <p class="text-muted details">
                                            <?= substr(strip_tags($article['details']), 0, 100) ?>...
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="<?= base_url('blog/article/'.$article['id_news_media']) ?>" 
                                               class="text-teal fw-bold text-decoration-none">
                                                Lire l'article <i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                            <div class="article-meta">
                                                <i class="far fa-comments"></i> 0
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">Aucun article disponible pour le moment.</p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Pagination dynamique -->
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>