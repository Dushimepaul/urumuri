<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Logistique</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-package"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dons Matériels</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-outline-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#newMateriel">Nouveau Don</a>
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
                                <th>Téléphone</th>
                                <th>Description du Matériel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($materiels as $value) { ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td><strong><?=$value['nom_complet']?></strong></td>
                                <td><?=$value['telephone']?></td>
                                <td>
                                    <?php 
                                        $desc = $value['description_materiel'];
                                        echo (strlen($desc) > 60) ? substr($desc, 0, 60).'...' : $desc;
                                    ?>
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
                                            <h5 class="modal-title">Modifier le matériel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?=base_url('Dons_Materiels/Update')?>" method="POST">
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
                                                <div class="col-12">
                                                    <label class="form-label">Description du matériel</label>
                                                    <textarea class="form-control" name="description_materiel" rows="4" required><?=$value['description_materiel']?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-info">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete_<?=$value['id']?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <form action="<?=base_url('Dons_Materiels/Delete')?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <div class="modal-body p-4">
                                                <i class="bx bx-trash-alt text-danger display-4"></i>
                                                <h5 class="mt-2">Confirmer la suppression ?</h5>
                                                <p>Voulez-vous retirer ce matériel donné par <strong><?=$value['nom_complet']?></strong> ?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
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

<div class="modal fade" id="newMateriel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enregistrer un Don Matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?=base_url('Dons_Materiels/Create')?>" method="POST">
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label class="form-label">Donateur</label>
                        <select class="form-select" name="don_id" required>
                            <option value="">-- Choisir le donateur --</option>
                            <?php foreach($donateurs as $d): ?>
                                <option value="<?=$d['id']?>"><?=$d['nom_complet']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description (ex: Moto, Ordinateur, Habits...)</label>
                        <textarea class="form-control" name="description_materiel" rows="4" placeholder="Détaillez le matériel ici..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php' ;?>