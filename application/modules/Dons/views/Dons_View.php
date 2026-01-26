<?php include VIEWPATH.'includes/backend/Header.php'; ?>
<?php include VIEWPATH.'includes/backend/Sidebar.php'; ?>
<?php include VIEWPATH.'includes/backend/Topheader.php'; ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion des Dons</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#newDon">
                        <i class="bx bx-plus"></i> Nouveau Don
                    </a>
                </div>
            </div>
        </div>

        <?php if($this->session->flashdata('sms')) echo $this->session->flashdata('sms'); ?>
        <hr/>

        

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="donsTable" class="table table-striped table-bordered align-middle" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Donateur</th>
                                <th>Contact / Pays</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($dons as $value) { ?>
                            <tr data-type="<?= $value['type_don'] ?>" data-statut="<?= $value['statut'] ?>" data-date="<?= $value['created_at'] ?>">
                                <td><?= $value['id'] ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($value['nom_complet']) ?></strong>
                                    <?php if($value['is_mensuel'] ?? 0 == 1): ?>
                                    <br><span class="badge bg-light-info text-info"><i class="bx bx-calendar"></i> Mensuel</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <small><i class="bx bx-envelope"></i> <?= htmlspecialchars($value['email']) ?></small><br>
                                    <small><i class="bx bx-phone"></i> <?= htmlspecialchars($value['telephone']) ?></small><br>
                                    <small><i class="bx bx-map"></i> <?= htmlspecialchars($value['pays']) ?></small>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Status_<?=$value['id']?>"  class="text-decoration-none">
                                        <?php if ($value['statut'] == 'en_attente'): ?>
                               <span class="badge bg-warning text-dark">
                                <i class="bx bx-time-five"></i> En attente
                                 </span>
                             <?php else: ?>
                                   <span class="badge bg-success">
                                <i class="bx bx-check-circle"></i> Validé
                                  </span>
                              <?php endif; ?>
                                </a>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($value['created_at'])) ?><br>
                                    <small class="text-muted"><?= date('H:i', strtotime($value['created_at'])) ?></small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#view_<?= $value['id'] ?>">
                                            <i class="bx bx-show"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#update_<?= $value['id'] ?>">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= $value['id'] ?>">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Vue détaillée -->
<!-- Modal Vue détaillée -->
<div class="modal fade" id="view_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Détails du Don #<?= $value['id'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="container-fluid">

                    <!-- Informations Donateur -->
                    <h3 class="text-center p-3 border-bottom">Informations Donateur</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Nom:</strong> <?= htmlspecialchars($value['nom_complet']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($value['email']) ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Téléphone:</strong> <?= htmlspecialchars($value['telephone']) ?></p>
                            <p><strong>Pays:</strong> <?= htmlspecialchars($value['pays']) ?></p>
                        </div>
                    </div>

                    <!-- Informations Don -->
                    
                    <div class="row mb-3">



                        <!-- Dons Financiers -->
                        <div class="col-md-12 py-4">
                            <h4 class="text-center p-2 border-bottom">Dons Financiers</h4>
                            <?php 
                            $financiers = $this->Model->read('dons_financiers',['don_id' => $value['id']]); 
                            if(!empty($financiers)):
                                foreach($financiers as $f): ?>
                                    <p><strong>Montant:</strong> <?= number_format($f['montant'], 0, ',', ' ') ?> FBU</p>
                                    <p><strong>Mode de paiement:</strong> <?= htmlspecialchars($f['methode_paiement_nom'] ?? 'Non spécifié') ?></p>
                                    <p><strong>Mensuel:</strong> <?= $f['is_mensuel'] == 1 ? 'Oui' : 'Non' ?></p>
                                    <hr>
                                <?php endforeach; 
                            else: ?>
                                <p class="text-muted text-center">Aucun don financier</p>
                            <?php endif; ?>
                        </div>




                        <!-- Dons Matériels -->
                        <div class="col-md-12 py-4">
                            <h4 class="text-center p-2 border-bottom">Dons Matériels</h4>
                            <?php 
                            $materiels = $this->Model->read('dons_materiels', ['don_id' => $value['id']]);
                            if(!empty($materiels)):
                                foreach($materiels as $m): ?>
                                    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($m['description_materiel'])) ?></p>
                                    <hr>
                                <?php endforeach;
                            else: ?>
                                <p class="text-muted text-center">Aucun don matériel</p>
                            <?php endif; ?>
                        </div>
                        <!-- Dons Compétences -->

                             <div class="col-md-12 py-4">
                            <h4 class="text-center p-2 border-bottom">Compétences</h4>
                            <?php 
                            $competences = $this->Model->read('dons_competences', ['don_id' => $value['id']]);
                            if(!empty($competences)):
                                foreach($competences as $c): ?>
                                    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($c['description_contribution'])) ?></p>
                                    <hr>
                                <?php endforeach;
                            else: ?>
                                <p class="text-muted text-center">Aucune compétence</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
                            <!-- Modal de modification -->
                            <div class="modal fade" id="update_<?= $value['id'] ?>" tabindex="-1" data-bs-backdrop="static">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier le Don #<?= $value['id'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Dons/Update') ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                            <div class="modal-body row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nom complet *</label>
                                                    <input type="text" class="form-control" name="nom_complet" value="<?= htmlspecialchars($value['nom_complet']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($value['email']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Type de Don *</label>
                                                    <select class="form-select select_type_don" name="type_don" data-target="update_fields_<?= $value['id'] ?>">
                                                        <option value="financier" <?= $value['type_don']=='financier'?'selected':'' ?>>Financier</option>
                                                        <option value="materiel" <?= $value['type_don']=='materiel'?'selected':'' ?>>Matériel</option>
                                                        <option value="competence" <?= $value['type_don']=='competence'?'selected':'' ?>>Compétence</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Statut</label>
                                                    <select class="form-select" name="statut">
                                                        <option value="en_attente" <?= $value['statut']=='en_attente'?'selected':'' ?>>En attente</option>
                                                        <option value="valide" <?= $value['statut']=='valide'?'selected':'' ?>>Validé</option>
                                                        <option value="annule" <?= $value['statut']=='annule'?'selected':'' ?>>Annulé</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Téléphone *</label>
                                                    <input type="text" class="form-control" name="telephone" value="<?= htmlspecialchars($value['telephone']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Pays *</label>
                                                    <input type="text" class="form-control" name="pays" value="<?= htmlspecialchars($value['pays']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



<div class="modal fade" id="Status_<?=$value['id']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Changer le statut ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="<?=base_url('Dons/ChangeStatus')?>" method="POST">
                <div class="modal-body text-center">
                    <input type="hidden" name="id" value="<?=$value['id']?>">
                    <input type="hidden" name="current_status" value="<?=$value['statut']?>">
                    
                    <p>Voulez-vous changer le statut du don de :<br>
                    <strong><?= ($value['statut'] == 'en_attente') ? '<span class="text-warning">En attente</span>' : '<span class="text-success">Validé</span>' ?></strong> 
                    vers 
                    <strong><?= ($value['statut'] == 'en_attente') ? '<span class="text-success">Validé</span>' : '<span class="text-warning">En attente</span>' ?></strong> ?
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Confirmer le changement</button>
                </div>
            </form>
        </div>
    </div>
</div>


                            <!-- Modal de suppression -->
                            <div class="modal fade" id="delete_<?= $value['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Confirmer la suppression</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?= base_url('Dons/Delete') ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <i class="bx bx-error-circle bx-lg text-danger"></i>
                                                </div>
                                                <p class="text-center">
                                                    Êtes-vous sûr de vouloir supprimer le don de<br>
                                                    <strong><?= htmlspecialchars($value['nom_complet']) ?></strong> ?
                                                </p>
                                                <div class="alert alert-warning">
                                                    <i class="bx bx-info-circle"></i> Cette action supprimera également tous les détails associés.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- Modal d'ajout -->
<div class="modal fade" id="newDon" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Enregistrer un nouveau don</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('Dons/Create') ?>" method="POST">
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom complet *</label>
                        <input type="text" class="form-control" name="nom_complet" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type de Don *</label>
                        <select id="new_type_don" class="form-select select_type_don" name="type_don" data-target="new_fields">
                            <option value="">-- Sélectionner --</option>
                            <option value="financier">Financier</option>
                            <option value="materiel">Matériel</option>
                            <option value="competence">Compétence</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Téléphone *</label>
                        <input type="text" class="form-control" name="telephone" required>
                    </div>

                    <div id="new_fields" class="row g-3 px-0 m-0">
                        <div class="col-md-4 field-financier" style="display:none;">
                            <label class="form-label">Montant (FBU) *</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="montant">
                        </div>
                        
                        <div class="col-md-4 field-financier" style="display:none;">
                            <label class="form-label">Mode de Paiement *</label>
                            <select class="form-select" name="id_mode_payement">
                                <option value="">-- Sélectionner --</option>
                                <?php foreach($methodes_paiement as $methode): ?>
                                <option value="<?= $methode['id_mode_payement'] ?>"><?= htmlspecialchars($methode['description']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4 field-financier" style="display:none;">
                            <label class="form-label">Récurrence</label>
                            <div class="form-check form-switch" style="padding-top: 8px;">
                                <input class="form-check-input" type="checkbox" name="paiement_recurrent" id="is_mensuel">
                                <label class="form-check-label" for="is_mensuel">Don Mensuel ?</label>
                            </div>
                        </div>

                        <div class="col-md-12 field-materiel" style="display:none;">
                            <label class="form-label">Description du Matériel *</label>
                            <textarea class="form-control" name="description_materiel" rows="3" placeholder="Détaillez les objets donnés..."></textarea>
                        </div>

                        <div class="col-md-12 field-competence" style="display:none;">
                            <label class="form-label">Description de la Compétence *</label>
                            <textarea class="form-control" name="description_competence" rows="3" placeholder="Quelle aide technique apportez-vous ?"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Pays *</label>
                        <input type="text" class="form-control" name="pays" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer le Don</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Initialiser DataTable
    $('#donsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
        },
        order: [[5, 'desc']],
        pageLength: 25
    });

    // Fonction pour basculer l'affichage des champs
    function toggleDonFields(selectElement) {
        const selectedType = $(selectElement).val();
        const targetContainerId = $(selectElement).data('target');
        const container = $('#' + targetContainerId);

        // Cacher tous les champs spécifiques
        container.find('.field-financier, .field-materiel, .field-competence').hide().find('input, select, textarea').removeAttr('required');

        // Afficher les champs correspondants
        if (selectedType === 'financier') {
            container.find('.field-financier').fadeIn().find('input, select').attr('required', 'required');
        } else if (selectedType === 'materiel') {
            container.find('.field-materiel').fadeIn().find('textarea').attr('required', 'required');
        } else if (selectedType === 'competence') {
            container.find('.field-competence').fadeIn().find('textarea').attr('required', 'required');
        }
    }

    // Écouteur sur le changement de type
    $('.select_type_don').on('change', function() {
        toggleDonFields(this);
    });

    // Initialisation pour les modals de modification
    $('.select_type_don').each(function() {
        toggleDonFields(this);
    });

    // Changement de statut via AJAX
    $('.change-status').on('click', function(e) {
        e.preventDefault();
        const button = $(this).closest('.dropdown').find('.status-btn');
        const donId = button.data('id');
        const newStatut = $(this).data('statut');
        
        $.ajax({
            url: '<?= base_url("Dons/changeStatut") ?>',
            method: 'POST',
            data: {
                id: donId,
                statut: newStatut
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    // Mettre à jour le bouton
                    let btnClass = 'btn-warning';
                    if(newStatut == 'valide') btnClass = 'btn-success';
                    if(newStatut == 'annule') btnClass = 'btn-danger';
                    
                    button.removeClass('btn-success btn-danger btn-warning')
                          .addClass(btnClass)
                          .text(newStatut.replace('_', ' ').charAt(0).toUpperCase() + newStatut.replace('_', ' ').slice(1));
                    
                    // Mettre à jour l'attribut data-statut de la ligne
                    button.closest('tr').attr('data-statut', newStatut);
                    
                    toastr.success('Statut mis à jour avec succès');
                } else {
                    toastr.error(response.message || 'Erreur lors de la mise à jour');
                }
            },
            error: function() {
                toastr.error('Erreur serveur');
            }
        });
    });

    // Charger les statistiques
    function loadStats() {
        $.ajax({
            url: '<?= base_url("Dons/getStats") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    $('#statsContainer').fadeIn();
                    $('#totalDons').text(response.stats.total);
                    
                    // Trouver les comptes par type et statut
                    let totalMontant = response.stats.total_montant || 0;
                    let enAttente = 0;
                    let valides = 0;
                    
                    response.stats.par_type.forEach(function(item) {
                        // Pourrait être utilisé pour d'autres affichages
                    });
                    
                    response.stats.par_statut.forEach(function(item) {
                        if(item.statut == 'en_attente') enAttente = item.count;
                        if(item.statut == 'valide') valides = item.count;
                    });
                    
                    $('#totalMontant').text(totalMontant.toLocaleString() + ' FBU');
                    $('#enAttente').text(enAttente);
                    $('#valides').text(valides);
                }
            }
        });
    }

    // Bouton refresh stats
    $('#refreshStats').on('click', function() {
        loadStats();
        toastr.info('Statistiques actualisées');
    });

    // Charger les stats au démarrage
    loadStats();

    // Filtres
    function applyFilters() {
        const type = $('#filterType').val();
        const statut = $('#filterStatut').val();
        const dateStart = $('#filterDateStart').val();
        const dateEnd = $('#filterDateEnd').val();
        
        $('#donsTable tbody tr').each(function() {
            const row = $(this);
            const rowType = row.data('type');
            const rowStatut = row.data('statut');
            const rowDate = row.data('date');
            
            let show = true;
            
            if(type && rowType !== type) show = false;
            if(statut && rowStatut !== statut) show = false;
            
            if(dateStart && rowDate < dateStart) show = false;
            if(dateEnd && rowDate > dateEnd + ' 23:59:59') show = false;
            
            if(show) {
                row.show();
            } else {
                row.hide();
            }
        });
    }

    $('#filterType, #filterStatut, #filterDateStart, #filterDateEnd').on('change', applyFilters);

    // Validation des formulaires
    $('form').on('submit', function() {
        const typeDon = $(this).find('.select_type_don').val();
        
        if(typeDon == 'financier') {
            const montant = $(this).find('input[name="montant"]').val();
            if(!montant || parseFloat(montant) <= 0) {
                toastr.error('Veuillez saisir un montant valide');
                return false;
            }
        }
        
        return true;
    });
});
</script>

<?php include VIEWPATH.'includes/backend/Footer.php'; ?>