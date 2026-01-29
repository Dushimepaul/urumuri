<?php include VIEWPATH.'includes/backend/Header.php'; ?>
<?php include VIEWPATH.'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH.'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">FAQ</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createFaq">
                    Nouvelle FAQ
                </button>
            </div>
        </div>

        <hr>

        <!-- Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-info">
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Réponse</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $i = 1; foreach ($faq as $item): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlspecialchars($item['Question']); ?></td>
                                <td><?= htmlspecialchars(substr($item['Response'], 0, 30)); ?>...</td>

                                <!-- STATUS -->
                              <td>
                   <button type="button"
                            class="btn btn-sm <?= $item['Status'] == 1 ? 'btn-success' : 'btn-secondary'; ?>"
                           data-bs-toggle="modal"
                           data-bs-target="#status<?= $item['IdFaq']; ?>">
                         <?= $item['Status'] == 1 ? 'Actif' : 'Inactif'; ?>
                       </button>
                        </td>


                                <!-- ACTIONS -->
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                            Options
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item text-info"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#edit<?= $item['IdFaq']; ?>">
                                                    Modifier
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#delete<?= $item['IdFaq']; ?>">
                                                    Supprimer
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL STATUS -->
                            <div class="modal fade" id="status<?= $item['IdFaq']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="<?= base_url('Faq/ChangeStatus'); ?>" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Changer le statut</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <input type="hidden" name="IdFaq" value="<?= $item['IdFaq']; ?>">
                                            <input type="hidden" name="Status" value="<?= $item['Status']; ?>">
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button class="btn btn-primary">Confirmer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL EDIT -->
                            <div class="modal fade" id="edit<?= $item['IdFaq']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="<?= base_url('faq/update_faq'); ?>" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier la FAQ</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <input type="hidden" name="IdFaq" value="<?= $item['IdFaq']; ?>">

                                                <div class="mb-3">
                                                    <label class="form-label">Question</label>
                                                    <input type="text" class="form-control"
                                                           name="Question"
                                                           value="<?= htmlspecialchars($item['Question']); ?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Réponse</label>
                                                    <textarea class="form-control" rows="4"
                                                              name="Response" required><?= htmlspecialchars($item['Response']); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DELETE -->
                            <div class="modal fade" id="delete<?= $item['IdFaq']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="<?= base_url('faq/supprimer_faq'); ?>" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmation</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="IdFaq" value="<?= $item['IdFaq']; ?>">
                                                Voulez-vous vraiment supprimer cette FAQ ?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button class="btn btn-danger">Supprimer</button>
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
                                <th>Question</th>
                                <th>Réponse</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL CREATE -->
        <div class="modal fade" id="createFaq">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="<?= base_url('faq/Create_faq'); ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title">Nouvelle FAQ</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <input type="text" class="form-control" name="Question" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Réponse</label>
                                <textarea class="form-control" rows="4" name="Response" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>
