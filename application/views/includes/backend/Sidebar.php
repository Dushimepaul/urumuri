<!--sidebar wrapper -->
				<div class="sidebar-wrapper" data-simplebar="true">
					<div class="sidebar-header">
						<div>
							<img src="<?= base_url('attachments/Other/' . $this->Model->get_setting('site_logo','logo.png')) ?>" class="logo-icon" alt="logo icon">
						</div>
						<div>
							<h4 class="logo-text">URUMURI_ICSB</h4>
						</div>
						<div class="mobile-toggle-icon ms-auto"><i class='bx bx-x'></i>
						</div>
					 </div>
					<!--navigation-->
					<ul class="metismenu" id="menu">
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class='bx bx-home-alt'></i>
								</div>
								<div class="menu-title">Dashboard</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Dashboard')?>"><i class='bx bx-radio-circle'></i>Dashboard</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class="bx bx-category"></i>
								</div>
								<div class="menu-title">MENU</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Carousel')?>"><i class='bx bx-radio-circle'></i>Carousels</a>
									<li> <a href="<?=base_url('About_us')?>"><i class='bx bx-radio-circle'></i>About us</a>
								</li>
								<li> <a href="<?=base_url('Devise')?>"><i class='bx bx-radio-circle'></i>Devise</a>
								</li>
								<li> <a href="<?=base_url('Mission')?>"><i class='bx bx-radio-circle'></i>Mission</a>
								</li>
								<li> <a href="<?=base_url('Vision')?>"><i class='bx bx-radio-circle'></i>Vision</a>
								</li>
								<li> <a href="<?=base_url('Objectifs')?>"><i class='bx bx-radio-circle'></i>Objectifs</a>
								</li>
								<li> <a href="<?=base_url('galleries/Galleries')?>"><i class='bx bx-radio-circle'></i>Galleries</a>
								</li>
                                <li><a href="<?=base_url('Parteners')?>"><i class='bx bx-radio-circle'></i>Parteners</a></li>
                                <li><a href="<?=base_url('Projects')?>"><i class='bx bx-radio-circle'></i>Projects</a></li>
                
							</ul>
						</li>

						<li>
							<a class="has-arrow" href="javascript:;">
								<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
								</div>
								<div class="menu-title">Dons</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Dons')?>"><i class='bx bx-radio-circle'></i>Donateur</a>
								</li>
								<li> <a href="<?=base_url('Dons/Financiers')?>"><i class='bx bx-radio-circle'></i>Dons Financier</a>
								</li>
								<li> <a href="<?=base_url('Dons/Materiels')?>"><i class='bx bx-radio-circle'></i>Dons Materiels</a>
								</li>
								<li> <a href="<?=base_url('Dons/Competences')?>"><i class='bx bx-radio-circle'></i>Dons Competences</a>
								</li>
							</ul>
						</li>

						<li>
							<a class="has-arrow" href="javascript:;">
								<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
								</div>
								<div class="menu-title">Contact</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Contact_Us')?>"><i class='bx bx-radio-circle'></i>contact_us</a>
								</li>
								<li> <a href="<?=base_url('Newsletter')?>"><i class='bx bx-radio-circle'></i>Newsletters</a>
								</li>
							</ul>
						</li>
						
					
						
						<li>
							<a class="has-arrow" href="#">
								<div class="parent-icon"><i class="bx bx-repeat"></i>
								</div>
								<div class="menu-title">membres</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Categories_membre')?>"><i class='bx bx-radio-circle'></i>Categories Members</a>
								</li>
								<li> <a href="<?=base_url('Membres')?>"><i class='bx bx-radio-circle'></i>Membres</a>
								</li>
							</ul>
						</li>
						<li class="menu-label">Users & Settings</li>
						<li>
							<a class="has-arrow" href="javascript:;">
								<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
								</div>
								<div class="menu-title">Users</div>
							</a>
							<ul>
								<li> <a href="<?=base_url('Users')?>"><i class='bx bx-radio-circle'></i>Users</a>
								</li>
								<li> <a href="<?=base_url('Roles')?>"><i class='bx bx-radio-circle'></i>Roles</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?=base_url('Settings')?>">
								<div class="parent-icon"><i class="bx bx-grid-alt"></i>
								</div>
								<div class="menu-title">Settings</div>
							</a>
						</li>
						
						
					</ul>
					<!--end navigation-->
				</div>
				<!--end sidebar wrapper -->



				