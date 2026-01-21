<?php include VIEWPATH.'includes/backend/Header.php'; ?>
<?php include VIEWPATH.'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH.'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content">

        <?php if($this->session->flashdata('sms')) echo $this->session->flashdata('sms'); ?>

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#addRole">
                    Ajouter un rôle
                </a>
            </div>
        </div>
        <hr/>

        <!-- TABLE -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom système</th>
                                <th>Nom affiché</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($roles as $role): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlspecialchars($role['name']); ?></td>
                                <td><?= htmlspecialchars($role['display_name']); ?></td>
                                <td><?= htmlspecialchars($role['description']); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                                            Options
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-info" data-bs-toggle="modal"
                                               data-bs-target="#update_<?= $role['id']; ?>">Modifier</a>
                                            <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                               data-bs-target="#delete_<?= $role['id']; ?>">Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL UPDATE -->
                            <div class="modal fade" id="update_<?= $role['id']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier le rôle</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Roles/Update'); ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $role['id']; ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Nom système</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="<?= htmlspecialchars($role['name']); ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Nom affiché</label>
                                                    <input type="text" class="form-control" name="display_name"
                                                           value="<?= htmlspecialchars($role['display_name']); ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description"
                                                              rows="3"><?= htmlspecialchars($role['description']); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-info">Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DELETE -->
                            <div class="modal fade" id="delete_<?= $role['id']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Supprimer le rôle</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Roles/Delete'); ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $role['id']; ?>">
                                            <div class="modal-body">
                                                <p>Voulez-vous supprimer ce rôle :</p>
                                                <strong><?= htmlspecialchars($role['display_name']); ?></strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nom système</th>
                                <th>Nom affiché</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL ADD -->
        <div class="modal fade" id="addRole" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un rôle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= base_url('Roles/Create'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nom système</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label>Nom affiché</label>
                                <input type="text" class="form-control" name="display_name" required>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-info">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>
