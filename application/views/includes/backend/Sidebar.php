<!-- Sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">

    <!-- Sidebar header -->
    <div class="sidebar-header d-flex align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center">
            <img src="<?= base_url('attachments/Other/' . $this->Model->get_setting('site_logo','logo.png')) ?>" 
                 class="logo-icon me-2" alt="URUMURI ICSB Logo" width="40" height="40">
            <h4 class="logo-text mb-0 fw-bold">URUMURI_ICSB</h4>
        </div>
        <div class="mobile-toggle-icon d-lg-none">
            <i class='bx bx-x fs-4'></i>
        </div>
    </div>
    <!-- end header -->

    <!-- Navigation -->
    <ul class="metismenu" id="menu">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                <div class="parent-icon">
                    <i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <!-- Section: Contenu du site -->
        <li class="menu-section">
            <span class="menu-label">Contenu du site</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-layout'></i>
                </div>
                <div class="menu-title">Pages & Sliders</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('Carousel') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Carousels
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('About_us') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Devise') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Devise
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Mission') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Mission
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Vision') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Vision
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Objectifs') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Objectifs
                    </a>
                </li>
            </ul>
        </li>

        <!-- Section: Médias & Projets -->
        <li class="menu-section">
            <span class="menu-label">Médias & Projets</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-image'></i>
                </div>
                <div class="menu-title">Médias & Projets</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('galleries/Galleries') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Galleries
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Projects') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Parteners') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Partners
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Faq') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>FAQ
                    </a>
                </li>
            </ul>
        </li>

        <!-- Section: Dons -->
        <li class="menu-section">
            <span class="menu-label">Dons</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-donate-heart'></i>
                </div>
                <div class="menu-title">Gestion des Dons</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('Dons') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Donateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Dons/Financiers') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Dons Financiers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Dons/Materiels') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Dons Matériels
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Dons/Competences') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Dons Compétences
                    </a>
                </li>
            </ul>
        </li>

        <!-- Section: Communication -->
        <li class="menu-section">
            <span class="menu-label">Communication</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('Contact_Us') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Newsletter') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Newsletters
                    </a>
                </li>
            </ul>
        </li>

        <!-- Section: Organisation -->
        <li class="menu-section">
            <span class="menu-label">Organisation</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-group'></i>
                </div>
                <div class="menu-title">Membres</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('Categories_membre') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Catégories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Membres') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Membres
                    </a>
                </li>
            </ul>
        </li>

        <!-- Section: Utilisateurs & Paramètres -->
        <li class="menu-section">
            <span class="menu-label">Système</span>
        </li>
        
        <li class="nav-item">
            <a href="javascript:;" class="nav-link has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Utilisateurs</div>
            </a>
            <ul class="submenu">
                <li class="nav-item">
                    <a href="<?= base_url('Users') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Roles') ?>" class="nav-link">
                        <i class='bx bx-radio-circle'></i>Roles
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('Settings') ?>" class="nav-link">
                <div class="parent-icon">
                    <i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
        </li>

    </ul>
    <!-- end navigation -->

</div>
<!--end sidebar wrapper -->