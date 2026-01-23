<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Finance</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-money"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dons Financiers</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-outline-primary" href="<?=base_url('Dons')?>">Nouveau</a>
            </div>
        </div>

        <?php if($this->session->flashdata('sms')) echo $this->session->flashdata('sms'); ?>
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Donateur</th>
                                <th>Montant</th>
                                <th>Méthode</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($dons_f as $value) { ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td><?=$value['nom_complet']?></td>
                                <td class="fw-bold text-success"><?=number_format($value['montant'], 2)?> </td>
                                <td><?=$value['description'] ?? 'N/A'?></td>
                                <td>
                                    <?php if($value['is_mensuel'] == 1): ?>
                                        <span class="badge bg-light-primary text-primary border border-primary">Mensuel</span>
                                    <?php else: ?>
                                        <span class="badge bg-light-secondary text-secondary border border-secondary">Ponctuel</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">Options</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#update_<?=$value['id']?>">Modifier</a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id']?>">Supprimer</a>
                                    </div> 
                                </td>
                            </tr>

                            <div class="modal fade" id="update_<?=$value['id']?>" tabindex="-1" data-bs-backdrop="static">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier Transaction #<?=$value['id']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?=base_url('Dons/UpdateFinanciers')?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <div class="modal-body row g-3">
                                                <div class="col-12">
                                                    <label class="form-label">Donateur</label>
                                                    <select class="form-select" name="don_id" required>
                                                        <?php foreach($donateurs as $d): ?>
                                                            <option value="<?=$d['id']?>" <?=$d['id']==$value['don_id']?'selected':''?>><?=$d['nom_complet']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Montant</label>
                                                    <input type="number" step="0.01" class="form-control" name="montant" value="<?=$value['montant']?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Méthode</label>
                                                    <select class="form-select" name="id_methode_paiement">
                                                        <?php foreach($modes as $m): ?>
                                                            <option value="<?=$m['id_mode_payement']?>" <?=$m['id_mode_payement']==$value['id_methode_paiement']?'selected':''?>><?=$m['description']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="is_mensuel" id="check<?=$value['id']?>" <?=$value['is_mensuel']==1?'checked':''?>>
                                                        <label class="form-check-label" for="check<?=$value['id']?>">Don mensuel récurrent</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info w-100">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete_<?=$value['id']?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <form action="<?=base_url('Dons/DeleteFinanciers')?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <div class="modal-body p-4">
                                                <i class="bx bx-trash text-danger display-4"></i>
                                                <h5 class="mt-2">Supprimer ?</h5>
                                                <p>Voulez-vous supprimer cette contribution de <strong><?=$value['nom_complet']?></strong> ?</p>
                                            </div>
                                            <div class="modal-footer border-0 d-flex justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
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
</div>

<?php include VIEWPATH.'includes/backend/Footer.php' ;?>