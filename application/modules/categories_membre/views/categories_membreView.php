<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>
<div class="page-wrapper">
	<div class="page-content">

		<!-- Breadcrumb -->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Admin</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active">Categories Membre</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addcategories_membre">
					Nouvelle Catégorie
				</button>
			</div>
		</div>

		<hr/>

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nom</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

						<?php $i = 1; foreach ($categories_membre as $value): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $value['nom']; ?></td>
								<td><?= $value['description']; ?></td>

								<td>
									<div class="dropdown">
										<button class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">Options</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update_<?= $value['id']; ?>">Modifier</a>
											<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#detail_<?= $value['id']; ?>">Description</a>
											<a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= $value['id']; ?>">Supprimer</a>
										</div>
									</div>
								</td>
							</tr>

							<!-- MODAL MODIFIER -->
							<div class="modal fade" id="update_<?= $value['id']; ?>" tabindex="-1">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Modifier Catégorie</h5>
											<button class="btn-close" data-bs-dismiss="modal"></button>
										</div>

										<form action="<?= base_url('categories_membre/Update_categories_membre'); ?>" method="POST">
											<input type="hidden" name="id" value="<?= $value['id']; ?>">

											<div class="modal-body">

												<div class="mb-3">
													<label>Nom</label>
													<input type="text" class="form-control" name="nom" value="<?= $value['nom']; ?>" required>
												</div>

												<div class="mb-3">
													<label>Description</label>
													<textarea class="form-control" name="description" rows="4" required><?= $value['description']; ?></textarea>
												</div>


											</div>

											<div class="modal-footer">
												<button class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
												<button class="btn btn-info" type="submit">Modifier</button>
											</div>
										</form>

									</div>
								</div>
							</div>

							<!-- MODAL DETAIL -->
							<div class="modal fade" id="detail_<?= $value['id']; ?>" tabindex="-1">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Description complète</h5>
											<button class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<?= nl2br($value['description']); ?>
										</div>
									</div>
								</div>
							</div>

							<!-- MODAL SUPPRIMER -->
							<div class="modal fade" id="delete_<?= $value['id']; ?>" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Confirmation</h5>
											<button class="btn-close" data-bs-dismiss="modal"></button>
										</div>

										<form action="<?= base_url('categories_membre/Supprimer_categories_membre'); ?>" method="POST">
											<input type="hidden" name="id" value="<?= $value['id']; ?>">
											<div class="modal-body">
												Voulez-vous vraiment supprimer cette catégorie ?
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
												<button class="btn btn-danger" type="submit">Supprimer</button>
											</div>
										</form>

									</div>
								</div>
							</div>

						<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- MODAL AJOUT -->
		<div class="modal fade" id="addcategories_membre" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Nouvelle Catégorie</h5>
						<button class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<form action="<?= base_url('categories_membre/Creer_categories_membre'); ?>" method="POST">
						<div class="modal-body">

							<div class="mb-3">
								<label>Nom</label>
								<input type="text" class="form-control" name="nom" required>
							</div>

							<div class="mb-3">
								<label>Description</label>
								<textarea class="form-control" name="description" rows="4" required></textarea>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
							<button class="btn btn-info" type="submit">Enregistrer</button>
						</div>
					</form>

				</div>
			</div>
		</div>

	</div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>
