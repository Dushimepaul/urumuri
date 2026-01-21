<?php include VIEWPATH.'includes/backend/Header.php'; ?>
<?php include VIEWPATH.'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH.'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content">

        <?php if($this->session->flashdata('sms')) echo $this->session->flashdata('sms'); ?>

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Ajouter un utilisateur</a>
            </div>
        </div>
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom et Prenom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actif</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($users as $user): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <?php 
                                        $membre = $this->Model->read('membres', ['id' => $user['membre_id']]);
                                        echo !empty($membre) ? $membre[0]['nom_complet'] : 'N/A'; 
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <?php 
                                        $role = $this->Model->read('roles', ['id' => $user['role_id']]);
                                        echo !empty($role) ? $role[0]['display_name'] : 'N/A'; 
                                    ?>
                                </td>
                                
                                <td><?= $user['is_active'] ? 'Oui' : 'Non'; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown">Options</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-info" href="#" data-bs-toggle="modal" data-bs-target="#updateUser_<?= $user['id']; ?>">Modifier</a>
                                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteUser_<?= $user['id']; ?>">Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Modifier -->
                            <div class="modal fade" id="updateUser_<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Modifier l'utilisateur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Users/Update'); ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Mot de passe (laisser vide si inchangé)</label>
                                                    <input type="password" class="form-control" name="pass_word">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Rôle</label>
                                                    <select class="form-control" name="role_id" required>
                                                        <?php 
                                                            $roles = $this->Model->read('roles');
                                                            foreach($roles as $role_option):
                                                        ?>
                                                        <option value="<?= $role_option['id']; ?>" <?= $role_option['id']==$user['role_id']?'selected':'' ?>>
                                                            <?= $role_option['display_name']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Membre</label>
                                                    <select class="form-control" name="membre_id" required>
                                                        <?php 
                                                            $membres = $this->Model->read('membres');
                                                            foreach($membres as $membre_option):
                                                        ?>
                                                        <option value="<?= $membre_option['id']; ?>" <?= $membre_option['id']==$user['membre_id']?'selected':'' ?>>
                                                            <?= $membre_option['nom_complet']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="is_active" value="1" <?= $user['is_active'] ? 'checked':'' ?>>
                                                    <label class="form-check-label">Actif</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Supprimer -->
                            <div class="modal fade" id="deleteUser_<?= $user['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Supprimer l'utilisateur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Users/Delete'); ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet utilisateur : <strong><?= $user['email']; ?></strong> ?</p>
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
                                <th>Nom et Prenom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actif</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Ajouter -->
        <div class="modal fade" id="addUserModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Ajouter un nouvel utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= base_url('Users/Create'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label>Mot de passe</label>
                                <input type="password" class="form-control" name="pass_word" required>
                            </div>
                            <div class="mb-3">
                                <label>Rôle</label>
                                <select class="form-control" name="role_id" required>
                                    <?php 
                                        $roles = $this->Model->read('roles');
                                        foreach($roles as $role_option):
                                    ?>
                                    <option value="<?= $role_option['id']; ?>"><?= $role_option['display_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Membre</label>
                                <select class="form-control" name="membre_id" required>
                                    <?php 
                                        $membres = $this->Model->read('membres');
                                        foreach($membres as $membre_option):
                                    ?>
                                    <option value="<?= $membre_option['id']; ?>"><?= $membre_option['nom_complet']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
                                <label class="form-check-label">Actif</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>
