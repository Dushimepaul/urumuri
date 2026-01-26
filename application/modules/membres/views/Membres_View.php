<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>

<div class="page-wrapper">
    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Administration</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-group"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liste exhaustive des Membres</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#newMembre">
                    <i class="bx bx-plus"></i> Nouveau Membre
                </a>
            </div>
        </div>

        <?php if($this->session->flashdata('sms')) echo $this->session->flashdata('sms'); ?>
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-sm align-middle" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>Ordre</th>
                                <th>Photo</th>
                                <th>Identification</th>
                                <th>Contacts</th>
                                <th>Catégorie</th>
                                <th>Profil</th>
                                <th>Réseaux Sociaux</th>
                                <th>Inscription</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($membres as $value) { ?>
                            <tr>
                                <td class="text-center">#<?=$value['ordre_affichage']?></td>
                                <td class="text-center">
                                    <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#Image_<?=$value['id']?>">
                                        <?php if($value['image']): ?>
                                            <img src="<?=base_url()?>attachments/membres/<?=$value['image']?>" style="width:40px; height:40px; border-radius:50%; object-fit: cover; border: 1px solid #ddd;">
                                        <?php else: ?>
                                            <div style="width:40px; height:40px; border-radius:50%; background:#e2e2e2; display:flex; align-items:center; justify-content:center; margin:auto;"><i class="bx bx-user text-secondary"></i></div>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                <td>
                                    <strong><?=$value['nom_complet']?></strong><br>
                                    <small class="text-muted"><i class="bx bx-map"></i> <?=$value['adresse'] ? $value['adresse'] : '---'?></small>
                                </td>
                                <td>
                                    <small>
                                        <i class="bx bx-envelope"></i> <?=$value['email'] ? $value['email'] : 'N/A'?><br>
                                        <i class="bx bx-phone"></i> <?=$value['telephone'] ? $value['telephone'] : 'N/A'?>
                                    </small>
                                </td>
                                <td><?=$value['nom']?></td>
                                <td><?=$value['profil']?></td>
                                
                                <td>
                                    <div class="d-flex gap-1">
                                        <?php if($value['facebook']) echo '<a href="'.$value['facebook'].'" target="_blank"><i class="bx bxl-facebook-circle text-primary"></i></a>'; ?>
                                        <?php if($value['linkedln']) echo '<a href="'.$value['linkedln'].'" target="_blank"><i class="bx bxl-linkedin-square text-info"></i></a>'; ?>
                                        <?php if($value['youtube']) echo '<a href="'.$value['youtube'].'" target="_blank"><i class="bx bxl-youtube text-danger"></i></a>'; ?>
                                        <?php if($value['instagram']) echo '<a href="'.$value['instagram'].'" target="_blank"><i class="bx bxl-instagram text-warning"></i></a>'; ?>
                                    </div>
                                </td>
                                <td><?=date('d/m/Y', strtotime($value['date_inscription']))?></td>
                                <td>
                                    <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#Status_<?=$value['id']?>">
                                        <span class="badge <?=$value['statut']=='actif'?'bg-success':'bg-danger'?>">
                                            <?=ucfirst($value['statut'])?>
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void()" data-bs-toggle="modal" data-bs-target="#update_<?=$value['id']?>"><i class="bx bx-edit text-info"></i> Modifier</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void()" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id']?>"><i class="bx bx-trash"></i> Supprimer</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="update_<?=$value['id']?>" data-bs-backdrop="static">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title text-white">Mise à jour de : <?=$value['nom_complet']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="<?=base_url('Membres/Update')?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Nom Complet</label>
                                                        <input type="text" class="form-control" name="nom_complet" value="<?=$value['nom_complet']?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?=$value['email']?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Téléphone</label>
                                                        <input type="text" class="form-control" name="telephone" value="<?=$value['telephone']?>">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label class="form-label">Adresse</label>
                                                        <input type="text" class="form-control" name="adresse" value="<?=$value['adresse']?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Ordre d'affichage</label>
                                                        <input type="number" class="form-control" name="ordre_affichage" value="<?=$value['ordre_affichage']?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Profil / Titre</label>
                                                        <input type="text" class="form-control" name="profil" value="<?=$value['profil']?>" placeholder="Ex: Directeur">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Catégorie</label>
                                                         <select name="categories_membre_id" class="form-control">
                                                        <?php foreach ($categories as $categorie): ?>
                                                         <option value="<?=$categorie['id']?>" <?= $categorie['id'] == $value['categories_membre_id']?'selected':'' ?> > <?=$categorie['nom']?> </option>
                                                      <?php endforeach ?> 
                                                       </select>
                                                        </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Image (Actuelle : <?=$value['image']?>)</label>
                                                        <input type="hidden" name="HiddenImage" value="<?=$value['image']?>">
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Lien Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="<?=$value['facebook']?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Lien LinkedIn</label>
                                                        <input type="text" class="form-control" name="linkedln" value="<?=$value['linkedln']?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Lien YouTube</label>
                                                        <input type="text" class="form-control" name="youtube" value="<?=$value['youtube']?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Lien Instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="<?=$value['instagram']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-info">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="Image_<?=$value['id']?>">
                                <div class="modal-dialog"><div class="modal-content"><div class="modal-body text-center"><img src="<?=base_url()?>attachments/membres/<?=$value['image']?>" class="img-fluid"></div></div></div>
                            </div>

                            <div class="modal fade" id="Status_<?=$value['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <form action="<?=base_url('Membres/ChangeStatus')?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <input type="hidden" name="statut" value="<?=$value['statut']?>">
                                            <div class="modal-body py-4">
                                                <h5>Changer le statut de ce membre ?</h5>
                                                <p>Statut actuel : <span class="badge bg-secondary"><?=$value['statut']?></span></p>
                                            </div>
                                            <div class="modal-footer justify-content-center border-0">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-info">Oui, Confirmer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete_<?=$value['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <form action="<?=base_url('Membres/Delete')?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <div class="modal-body py-4">
                                                <i class="bx bx-x-circle text-danger display-3"></i>
                                                <h4 class="mt-2">Suppression définitive ?</h4>
                                                <p>Voulez-vous supprimer <strong><?=$value['nom_complet']?></strong> ?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center border-0">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        </tbody>
                        <tfoot>
                        	 <tr>
                                <th>Ordre</th>
                                <th>Photo</th>
                                <th>Identification</th>
                                <th>Contacts</th>
                                <th>Profil & Catégorie</th>
                                <th>Réseaux Sociaux</th>
                                <th>Inscription</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="newMembre" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Ajouter un nouveau membre</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?=base_url('Membres/Create')?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Nom Complet *</label>
                            <input type="text" class="form-control" name="nom_complet" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="telephone">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Adresse Physique</label>
                            <input type="text" class="form-control" name="adresse">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ordre</label>
                            <input type="number" class="form-control" name="ordre_affichage" value="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Profil (Poste)</label>
                            <input type="text" class="form-control" name="profil">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">ID Catégorie</label>
                              <select name="categories_membre_id" class="form-control">
                              <?php foreach ($categories as $categorie): ?>
                                <option value="<?=$categorie['id']?>"> <?=$categorie['nom']?> </option>
                                <?php endforeach ?> 
                             </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="https://...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">LinkedIn</label>
                            <input type="text" class="form-control" name="linkedln" placeholder="https://...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">YouTube</label>
                            <input type="text" class="form-control" name="youtube" placeholder="https://...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" placeholder="https://...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer le membre</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php' ;?>