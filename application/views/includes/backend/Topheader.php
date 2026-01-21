<!--start header -->
<header>
<div class="topbar">
	<nav class="navbar navbar-expand gap-2 align-items-center">
		<div class="mobile-toggle-menu d-flex"><i class='bx bx-menu'></i>
		</div>

<!-- 		  <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
			 <a href="avascript:;" class="btn d-flex align-items-center"><i class="bx bx-search"></i>Search</a>
		  </div> -->

		  <div class="top-menu ms-auto">
			<ul class="navbar-nav align-items-center gap-1">
				<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
					<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
					<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="<?=base_url()?>assets/backend/images/county/02.png" width="22" alt="">
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="<?=base_url()?>assets/backend/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
						</li>
						<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="<?=base_url()?>assets/backend/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
						</li>
					</ul>
				</li>
				<li class="nav-item dark-mode d-none d-sm-flex">
					<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
					</a>
				</li>

				<li class="nav-item dropdown dropdown-app">
					<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"><i class='bx bx-grid-alt'></i></a>
					<div class="dropdown-menu dropdown-menu-end p-0">
						<div class="app-container p-2 my-2">
						  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									  <img src="<?=base_url()?>assets/backend/images/app/slack.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">Slack</p>
								  </div>
								  </div>
								</a>
							 </div>
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									  <img src="<?=base_url()?>assets/backend/images/app/behance.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">Behance</p>
								  </div>
								  </div>
							  </a>
							 </div>
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									<img src="<?=base_url()?>assets/backend/images/app/google-drive.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">Dribble</p>
								  </div>
								  </div>
								</a>
							 </div>
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									  <img src="<?=base_url()?>assets/backend/images/app/outlook.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">Outlook</p>
								  </div>
								  </div>
								</a>
							 </div>
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									  <img src="<?=base_url()?>assets/backend/images/app/github.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">GitHub</p>
								  </div>
								  </div>
								</a>
							 </div>
							 <div class="col">
							  <a href="javascript:;">
								<div class="app-box text-center">
								  <div class="app-icon">
									  <img src="<?=base_url()?>assets/backend/images/app/stack-overflow.png" width="30" alt="">
								  </div>
								  <div class="app-name">
									  <p class="mb-0 mt-1">Stack</p>
								  </div>
								  </div>
								</a>
							 </div>
	
						  </div><!--end row-->
	
						</div>
					</div>
				</li>

				<li class="nav-item dropdown dropdown-large">
					<div class="dropdown-menu dropdown-menu-end">

						<div class="header-notifications-list">
						
						</div>

					</div>
				</li>
				<li class="nav-item dropdown dropdown-large">
					<div class="dropdown-menu dropdown-menu-end">
						<div class="header-message-list">
							
							
						</div>
					</div>
				</li>


			</ul>
		</div>


		<!-- Profil utilisateur -->
		<div class="user-box dropdown">
			<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<div class="position-relative">
					<?php
					$user_name = $this->session->userdata('user');
					$user_role = $this->session->userdata('role');
					$user_photo = $this->session->userdata('photo');
					$user_email = $this->session->userdata('email');
					$initials = !empty($user_name) ? substr($user_name, 0, 2) : 'UR';
					?>
					
					<?php if (!empty($user_photo) && file_exists(FCPATH . 'uploads/profiles/' . $user_photo)): ?>
						<img src="<?= base_url('uploads/profiles/' . $user_photo) ?>" 
							 class="user-img rounded-circle border border-3 border-primary" 
							 alt="Avatar" 
							 width="40" 
							 height="40"
							 onerror="this.src='<?= base_url('assets/frontend/img/logo/urumuri.jpeg') ?>'">
					<?php else: ?>
						<div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center bg-primary text-white border border-3 border-primary"
							 style="width: 40px; height: 40px; font-weight: bold; font-size: 14px;">
							<?= $initials ?>
						</div>
					<?php endif; ?>
					
					<?php if ($user_role == 'Admin' || $user_role == 'Super Admin'): ?>
						<span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
							  style="width: 12px; height: 12px;"></span>
					<?php endif; ?>
				</div>
				
				<div class="user-info d-none d-md-block">
					<p class="user-name mb-0 fw-semibold" style="font-size: 14px;">
						<?= htmlspecialchars($user_name ?? 'Administrateur') ?>
					</p>
					<p class="designation mb-0 text-muted" style="font-size: 12px;">
						<i class="bx bx-badge-check me-1"></i>
						<?= htmlspecialchars($user_role ?? 'Administrateur') ?>
					</p>
				</div>
			</a>
			
			<ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;">
				<li>
					<div class="dropdown-header">
						<div class="d-flex align-items-center">
							<div class="me-3">
								<?php if (!empty($user_photo) && file_exists(FCPATH . 'uploads/profiles/' . $user_photo)): ?>
									<img src="<?= base_url('uploads/profiles/' . $user_photo) ?>" 
										 class="rounded-circle" 
										 width="50" 
										 height="50"
										 onerror="this.src='<?= base_url('assets/frontend/img/logo/urumuri.jpeg') ?>'">
								<?php else: ?>
									<div class="rounded-circle d-flex align-items-center justify-content-center bg-primary text-white"
										 style="width: 50px; height: 50px; font-weight: bold; font-size: 18px;">
										<?= $initials ?>
									</div>
								<?php endif; ?>
							</div>
							<div>
								<h6 class="mb-0"><?= htmlspecialchars($user_name ?? 'Administrateur') ?></h6>
								<small class="text-muted"><?= htmlspecialchars($user_email ?? 'admin@urumuri.org') ?></small>
							</div>
						</div>
					</div>
				</li>
				<li><hr class="dropdown-divider"></li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/profile') ?>">
						<i class="bx bx-user fs-5 me-2"></i>
						<span>Mon profil</span>
					</a>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="<?=base_url('Settings')?>">
						<i class="bx bx-cog fs-5 me-2"></i>
						<span>Paramètres</span>
					</a>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/notifications') ?>">
						<i class="bx bx-bell fs-5 me-2"></i>
						<span>Notifications</span>
						<span class="badge bg-primary ms-auto">3</span>
					</a>
				</li>
				<li><hr class="dropdown-divider"></li>
				<li>
					<a class="dropdown-item d-flex align-items-center text-danger" href="<?= base_url('Admin/logout') ?>">
						<i class="bx bx-log-out-circle fs-5 me-2"></i>
						<span>Déconnexion</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</div>
</header>
<!--end header -->

<style>
/* Styles personnalisés */
.user-img {
    object-fit: cover;
}
.avatar-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
}
.dropdown-header {
    padding: 1rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 0.375rem 0.375rem 0 0;
}
.dropdown-header h6 {
    color: white;
    margin-bottom: 0.25rem;
}
.dropdown-header small {
    color: rgba(255, 255, 255, 0.8);
}
.notification-list .dropdown-item:hover,
.message-list .dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
.badge-notification {
    position: absolute;
    top: -5px;
    right: -5px;
    font-size: 10px;
    padding: 2px 5px;
}
.search-bar .input-group {
    max-width: 400px;
}
@media (max-width: 768px) {
    .user-info {
        display: none !important;
    }
}
</style>

<script>
// Toggle mode sombre
document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    const icon = this.querySelector('i');
    if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('bx-moon');
        icon.classList.add('bx-sun');
        localStorage.setItem('darkMode', 'enabled');
    } else {
        icon.classList.remove('bx-sun');
        icon.classList.add('bx-moon');
        localStorage.setItem('darkMode', 'disabled');
    }
});

// Charger le mode préféré
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    const icon = document.querySelector('#darkModeToggle i');
    icon.classList.remove('bx-moon');
    icon.classList.add('bx-sun');
}
</script>