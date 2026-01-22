<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>

<!--start page wrapper -->
<div class="page-wrapper">
<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galleries</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a class="btn btn-outline-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#gallery">Nouveau Média</a>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr/>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Média/Aperçu</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $i=1; foreach ($galleries as $value) { ?>
                        <?php
                        // Déterminer le type d'affichage selon le média
                        $media_preview = '';
                        $media_full = '';
                        
                        if ($value['TypeMedia'] == 'image') {
                            $media_preview = '<img src="'.base_url().'attachments/Gallery/'.$value['Media'].'" style="width:60px; height:60px; border-radius:10px; object-fit:cover;">';
                            $media_full = '<img src="'.base_url().'attachments/Gallery/'.$value['Media'].'" style="width:100%; height:auto;">';
                        } elseif ($value['TypeMedia'] == 'video') {
                            $media_preview = '<i class="bx bx-video" style="font-size:40px; color:#0d6efd;"></i><br><small>Vidéo</small>';
                            $media_full = '<video controls style="width:100%; height:auto;">
                                            <source src="'.base_url().'attachments/Gallery/'.$value['Media'].'" type="video/mp4">
                                            Votre navigateur ne supporte pas la vidéo.
                                          </video>';
                        } elseif ($value['TypeMedia'] == 'link') {
                            $media_preview = '<i class="bx bx-link-external" style="font-size:40px; color:#198754;"></i><br><small>Lien</small>';
                            // Extraire l'ID YouTube si c'est un lien YouTube
                            $youtube_id = '';
                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $value['Media'], $matches)) {
                                $youtube_id = $matches[1];
                                $media_full = '<iframe width="100%" height="500" src="https://www.youtube.com/embed/'.$youtube_id.'" frameborder="0" allowfullscreen></iframe>';
                            } else {
                                $media_full = '<a href="'.$value['Media'].'" target="_blank" class="btn btn-primary">Ouvrir le lien</a>';
                            }
                        }
                        ?>
                        
                        <tr>
                            <td><?=$i++;?></td>
                            
                            <td>
                                <span class="badge 
                                    <?php echo $value['TypeMedia'] == 'image' ? 'bg-info' : 
                                          ($value['TypeMedia'] == 'video' ? 'bg-warning' : 'bg-success'); ?>">
                                    <?=ucfirst($value['TypeMedia'])?>
                                </span>
                            </td>

                            <td>
                                <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#Media_<?=$value['IdGallery']?>">
                                    <?=$media_preview?>
                                </a>
                            </td>

                            <td><?=substr($value['Description'], 0, 30)?>...</td>

                            <td><?=date('d/m/Y H:i', strtotime($value['Created_at']))?></td>

                            <td>
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-info" href="javascript:void()" data-bs-toggle="modal" data-bs-target="#update_<?=$value['IdGallery']?>">Modifier</a>
                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['IdGallery']?>">Supprimer</a>
                                </div>
                            </td>
                        </tr>

                        <!-- ========= MODAL UPDATE ========= -->
                        <div class="modal fade" id="update_<?=$value['IdGallery']?>" data-bs-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modifier le Média</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="<?=base_url('Galleries/Update')?>" method="POST" enctype="multipart/form-data" id="updateForm_<?=$value['IdGallery']?>">
                                        <input type="hidden" name="IdGallery" value="<?=$value['IdGallery']?>">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Type de Média</label>
                                                    <select class="form-select type-select" name="TypeMedia" onchange="toggleMediaFields(this, 'update_<?=$value['IdGallery']?>')" required>
                                                        <option value="image" <?=$value['TypeMedia'] == 'image' ? 'selected' : ''?>>Image</option>
                                                        <option value="video" <?=$value['TypeMedia'] == 'video' ? 'selected' : ''?>>Vidéo</option>
                                                        <option value="link" <?=$value['TypeMedia'] == 'link' ? 'selected' : ''?>>Lien (YouTube/URL)</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <!-- Champ pour Image/Video -->
                                                    <div id="fileField_update_<?=$value['IdGallery']?>" style="display: <?=in_array($value['TypeMedia'], ['image', 'video']) ? 'block' : 'none'?>;">
                                                        <label class="form-label">Fichier</label>
                                                        <input type="hidden" name="HiddenMedia" value="<?=$value['Media']?>">
                                                        <input type="file" class="form-control" name="Media" <?=in_array($value['TypeMedia'], ['image', 'video']) ? '' : 'disabled'?>>
                                                        <small class="text-muted">
                                                            <?php if ($value['TypeMedia'] == 'image'): ?>
                                                                Formats: JPG, PNG, GIF, JPEG
                                                            <?php elseif ($value['TypeMedia'] == 'video'): ?>
                                                                Formats: MP4, AVI, MOV, WMV
                                                            <?php endif; ?>
                                                        </small>
                                                    </div>

                                                    <!-- Champ pour Lien -->
                                                    <div id="linkField_update_<?=$value['IdGallery']?>" style="display: <?=$value['TypeMedia'] == 'link' ? 'block' : 'none'?>;">
                                                        <label class="form-label">Lien</label>
                                                        <input type="url" class="form-control" name="Link" value="<?=$value['TypeMedia'] == 'link' ? $value['Media'] : ''?>" 
                                                               <?=$value['TypeMedia'] == 'link' ? '' : 'disabled'?> 
                                                               placeholder="https://www.youtube.com/watch?v=... ou https://...">
                                                        <small class="text-muted">Collez un lien YouTube ou une URL externe</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="Description" style="height:120px;"><?=$value['Description']?></textarea>
                                                <label>Description</label>
                                            </div>

                                            <!-- Aperçu actuel -->
                                            <?php if ($value['TypeMedia'] == 'image'): ?>
                                                <div class="alert alert-info">
                                                    <strong>Image actuelle:</strong><br>
                                                    <img src="<?=base_url()?>attachments/Gallery/<?=$value['Media']?>" style="max-width:200px; max-height:150px;">
                                                </div>
                                            <?php elseif ($value['TypeMedia'] == 'video'): ?>
                                                <div class="alert alert-warning">
                                                    <strong>Vidéo actuelle:</strong> <?=$value['Media']?>
                                                </div>
                                            <?php elseif ($value['TypeMedia'] == 'link'): ?>
                                                <div class="alert alert-success">
                                                    <strong>Lien actuel:</strong> <?=$value['Media']?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-info">Enregistrer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- ========= MODAL MEDIA ========= -->
                        <div class="modal fade" id="Media_<?=$value['IdGallery']?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Aperçu du Média</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body text-center">
                                        <?=$media_full?>
                                        <hr>
                                        <div class="text-start">
                                            <h6>Description:</h6>
                                            <p><?=$value['Description']?></p>
                                            <h6>Type:</h6>
                                            <p><span class="badge 
                                                <?php echo $value['TypeMedia'] == 'image' ? 'bg-info' : 
                                                      ($value['TypeMedia'] == 'video' ? 'bg-warning' : 'bg-success'); ?>">
                                                <?=ucfirst($value['TypeMedia'])?>
                                            </span></p>
                                            <?php if ($value['TypeMedia'] == 'link'): ?>
                                                <h6>URL:</h6>
                                                <p><a href="<?=$value['Media']?>" target="_blank"><?=$value['Media']?></a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========= MODAL DELETE ========= -->
                        <div class="modal fade" id="delete_<?=$value['IdGallery']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmer la suppression</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="<?=base_url('Galleries/Delete')?>" method="POST">
                                        <input type="hidden" name="IdGallery" value="<?=$value['IdGallery']?>">
                                        
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer ce média ?</p>
                                            <p><strong>Type:</strong> <?=ucfirst($value['TypeMedia'])?></p>
                                            <?php if ($value['TypeMedia'] == 'link'): ?>
                                                <p><strong>Lien:</strong> <?=substr($value['Media'], 0, 50)?>...</p>
                                            <?php else: ?>
                                                <p><strong>Fichier:</strong> <?=$value['Media']?></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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
                            <th>#</th>
                            <th>Type</th>
                            <th>Média/Aperçu</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>

    <hr/>

</div>


<!-- ========= MODAL NEW GALLERY ========= -->
<div class="modal fade" id="gallery" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Nouveau Média</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="<?=base_url('Galleries/Create')?>" method="POST" enctype="multipart/form-data" id="newGalleryForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Type de Média</label>
                            <select class="form-select" name="TypeMedia" id="typeMediaSelect" onchange="toggleMediaFields(this, 'new')" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="image">Image</option>
                                <option value="video">Vidéo</option>
                                <option value="link">Lien (YouTube/URL)</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <!-- Champ pour Image/Video -->
                            <div id="fileField_new" style="display: none;">
                                <label class="form-label">Fichier *</label>
                                <input type="file" class="form-control" name="Media" id="mediaFile" disabled required>
                                <small class="text-muted" id="fileHelp"></small>
                            </div>

                            <!-- Champ pour Lien -->
                            <div id="linkField_new" style="display: none;">
                                <label class="form-label">Lien *</label>
                                <input type="url" class="form-control" name="Link" id="mediaLink" disabled required 
                                       placeholder="https://www.youtube.com/watch?v=... ou https://...">
                                <small class="text-muted">Collez un lien YouTube ou une URL externe</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="Description" style="height:120px;" placeholder="Description du média"></textarea>
                        <label>Description</label>
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

<script>
// Fonction pour basculer entre les champs selon le type de média
function toggleMediaFields(selectElement, formType) {
    const selectedType = selectElement.value;
    const formId = formType === 'new' ? 'new' : selectElement.id.replace('typeMediaSelect_', '').replace('type-select', '');
    
    // Récupérer les éléments DOM
    const fileField = document.getElementById('fileField_' + formType + (formType === 'new' ? '' : '_' + formId));
    const linkField = document.getElementById('linkField_' + formType + (formType === 'new' ? '' : '_' + formId));
    const fileInput = document.getElementById(formType === 'new' ? 'mediaFile' : 'Media_' + formId);
    const linkInput = document.getElementById(formType === 'new' ? 'mediaLink' : 'Link_' + formId);
    const fileHelp = document.getElementById('fileHelp');
    
    // Cacher tous les champs d'abord
    if (fileField) fileField.style.display = 'none';
    if (linkField) linkField.style.display = 'none';
    
    // Désactiver tous les inputs
    if (fileInput) {
        fileInput.disabled = true;
        fileInput.required = false;
    }
    if (linkInput) {
        linkInput.disabled = true;
        linkInput.required = false;
    }
    
    // Afficher et configurer selon le type sélectionné
    if (selectedType === 'image') {
        if (fileField) fileField.style.display = 'block';
        if (fileInput) {
            fileInput.disabled = false;
            fileInput.required = true;
            fileInput.accept = '.jpg,.jpeg,.png,.gif,.JPG,.JPEG,.PNG,.GIF';
        }
        if (fileHelp) fileHelp.textContent = 'Formats acceptés: JPG, PNG, GIF, JPEG (Max 5MB)';
    } 
    else if (selectedType === 'video') {
        if (fileField) fileField.style.display = 'block';
        if (fileInput) {
            fileInput.disabled = false;
            fileInput.required = true;
            fileInput.accept = '.mp4,.avi,.mov,.wmv,.flv,.webm,.MP4,.AVI,.MOV';
        }
        if (fileHelp) fileHelp.textContent = 'Formats acceptés: MP4, AVI, MOV, WMV, FLV, WebM (Max 50MB)';
    } 
    else if (selectedType === 'link') {
        if (linkField) linkField.style.display = 'block';
        if (linkInput) {
            linkInput.disabled = false;
            linkInput.required = true;
        }
    }
    
    // Réinitialiser les valeurs si on change de type
    if (formType === 'new') {
        if (fileInput && selectedType !== 'image' && selectedType !== 'video') {
            fileInput.value = '';
        }
        if (linkInput && selectedType !== 'link') {
            linkInput.value = '';
        }
    }
}

// Validation du formulaire pour les modals d'update
document.addEventListener('DOMContentLoaded', function() {
    // Pour chaque formulaire d'update
    <?php foreach ($galleries as $value): ?>
    const updateForm_<?=$value['IdGallery']?> = document.getElementById('updateForm_<?=$value['IdGallery']?>');
    if (updateForm_<?=$value['IdGallery']?>) {
        updateForm_<?=$value['IdGallery']?>.addEventListener('submit', function(e) {
            const typeSelect = this.querySelector('.type-select');
            const selectedType = typeSelect ? typeSelect.value : '';
            
            if (selectedType === 'link') {
                const linkInput = this.querySelector('input[name="Link"]');
                if (linkInput && !linkInput.value.trim()) {
                    e.preventDefault();
                    alert('Veuillez entrer un lien valide');
                    linkInput.focus();
                }
            } else if (selectedType === 'image' || selectedType === 'video') {
                const fileInput = this.querySelector('input[name="Media"]');
                // Si un nouveau fichier est sélectionné, valider l'extension
                if (fileInput && fileInput.files.length > 0) {
                    const fileName = fileInput.files[0].name;
                    const fileExt = fileName.split('.').pop().toLowerCase();
                    
                    if (selectedType === 'image') {
                        const validImageExt = ['jpg', 'jpeg', 'png', 'gif'];
                        if (!validImageExt.includes(fileExt)) {
                            e.preventDefault();
                            alert('Format de fichier invalide. Formats acceptés: JPG, PNG, GIF, JPEG');
                            fileInput.value = '';
                            fileInput.focus();
                        }
                    } else if (selectedType === 'video') {
                        const validVideoExt = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
                        if (!validVideoExt.includes(fileExt)) {
                            e.preventDefault();
                            alert('Format de fichier invalide. Formats acceptés: MP4, AVI, MOV, WMV, FLV, WebM');
                            fileInput.value = '';
                            fileInput.focus();
                        }
                    }
                }
            }
        });
    }
    <?php endforeach; ?>
    
    // Pour le formulaire de création
    const newForm = document.getElementById('newGalleryForm');
    if (newForm) {
        newForm.addEventListener('submit', function(e) {
            const typeSelect = document.getElementById('typeMediaSelect');
            const selectedType = typeSelect ? typeSelect.value : '';
            
            if (!selectedType) {
                e.preventDefault();
                alert('Veuillez sélectionner un type de média');
                typeSelect.focus();
                return;
            }
            
            if (selectedType === 'link') {
                const linkInput = document.getElementById('mediaLink');
                if (!linkInput || !linkInput.value.trim()) {
                    e.preventDefault();
                    alert('Veuillez entrer un lien valide');
                    linkInput.focus();
                }
            } else if (selectedType === 'image' || selectedType === 'video') {
                const fileInput = document.getElementById('mediaFile');
                if (!fileInput || fileInput.files.length === 0) {
                    e.preventDefault();
                    alert('Veuillez sélectionner un fichier');
                    fileInput.focus();
                    return;
                }
                
                const fileName = fileInput.files[0].name;
                const fileExt = fileName.split('.').pop().toLowerCase();
                
                if (selectedType === 'image') {
                    const validImageExt = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!validImageExt.includes(fileExt)) {
                        e.preventDefault();
                        alert('Format de fichier invalide. Formats acceptés: JPG, PNG, GIF, JPEG');
                        fileInput.value = '';
                        fileInput.focus();
                    }
                } else if (selectedType === 'video') {
                    const validVideoExt = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
                    if (!validVideoExt.includes(fileExt)) {
                        e.preventDefault();
                        alert('Format de fichier invalide. Formats acceptés: MP4, AVI, MOV, WMV, FLV, WebM');
                        fileInput.value = '';
                        fileInput.focus();
                    }
                }
            }
        });
    }
});

// Réinitialiser le formulaire de création quand le modal est fermé
document.getElementById('gallery').addEventListener('hidden.bs.modal', function () {
    document.getElementById('newGalleryForm').reset();
    document.getElementById('fileField_new').style.display = 'none';
    document.getElementById('linkField_new').style.display = 'none';
    if (document.getElementById('mediaFile')) {
        document.getElementById('mediaFile').disabled = true;
    }
    if (document.getElementById('mediaLink')) {
        document.getElementById('mediaLink').disabled = true;
    }
});
</script>

<?php include VIEWPATH.'includes/backend/Footer.php' ;?>