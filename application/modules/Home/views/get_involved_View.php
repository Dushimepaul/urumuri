
<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
:root { --primary-teal: #1a8c78; --dark-teal: #146c5c; }
.donate-hero { padding: 140px 0 100px; background: linear-gradient(135deg, rgba(26,140,120,0.9), rgba(20,108,92,0.95)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1600') center/cover; color: white; text-align: center; }
.donation-card { border-radius: 30px; margin-top: -120px; box-shadow: 0 25px 60px rgba(0,0,0,0.12); background: white; }
.don-type-selector { display: flex; gap:10px; margin-bottom:30px; }
.don-type-btn { flex:1; border:none; border-radius:50px; padding:15px; cursor:pointer; font-weight:600; transition:0.3s; background: #f8f9fa; }
.don-type-btn.active { background: var(--primary-teal); color:white; }
/* Style pour forcer le rouge si nécessaire */
.form-control.is-invalid, .form-select.is-invalid { border-color: #dc3545 !important; background-image: none; }
</style>

<section class="donate-hero">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Faites un Don</h1>
        <p class="lead opacity-75 fs-5">Soutenez notre cause en quelques clics.</p>
    </div>
</section>

<section class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card donation-card">
                <div class="card-body p-5">
                    
                    <div class="don-type-selector mb-4">
                        <button type="button" class="don-type-btn active" onclick="switchDon(event, 'financier')">
                            <i class="fas fa-donate me-2"></i>Don Financier
                        </button>
                        <button type="button" class="don-type-btn" onclick="switchDon(event, 'materiel')">
                            <i class="fas fa-box-open me-2"></i>Don Matériel
                        </button>
                        <button type="button" class="don-type-btn" onclick="switchDon(event, 'competence')">
                            <i class="fas fa-lightbulb me-2"></i>Compétences
                        </button>
                    </div>

                    <form id="donationForm" method="POST" action="<?= base_url('Home/Donation') ?>" novalidate>
                        <input type="hidden" name="type_don" id="type_don" value="financier">

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nom_complet" placeholder="Nom" required>
                                    <label>Nom Complet *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <label>Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="telephone" placeholder="Tel" required>
                                    <label>Téléphone *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="pays" required>
                                        <option value="">Sélectionnez...</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="RDC">RDC</option>
                                    </select>
                                    <label>Pays *</label>
                                </div>
                            </div>
                        </div>

                        <div id="form-financier" class="don-form-section">
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="montant" placeholder="Montant">
                                        <label>Montant ($) *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mt-3">
                                        <input class="form-check-input" type="checkbox" name="paiement_recurrent">
                                        <label class="form-check-label">Don Mensuel</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label d-block">Mode de paiement *</label>
                                    <div class="d-flex gap-3 p-2 border rounded" id="mode-payement-wrapper">
                                        <?php foreach ($mode_payements as $m): ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="id_mode_payement" value="<?= $m['id_mode_payement']; ?>">
                                                <label class="form-check-label"><?= $m['description']; ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="form-materiel" class="don-form-section" style="display:none;">
                            <div class="form-floating mb-4">
                                <textarea class="form-control" name="description_materiel" style="height:100px"></textarea>
                                <label>Description du matériel *</label>
                            </div>
                        </div>

                        <div id="form-competence" class="don-form-section" style="display:none;">
                            <div class="form-floating mb-4">
                                <textarea class="form-control" name="description_competence" style="height:100px"></textarea>
                                <label>Description des compétences *</label>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn text-white" style="width: 250px; background-color: #062C54; padding: 12px; border-radius: 50px;">
                                <i class="fas fa-paper-plane me-2"></i>
                                <span id="btn-text">Faire un Don Financier</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<script>
// 1. SWITCH ENTRE LES TYPES DE DONS
function switchDon(event, type) {
    document.querySelectorAll('.don-form-section').forEach(s => s.style.display = 'none');
    document.getElementById('form-' + type).style.display = 'block';
    document.getElementById('type_don').value = type;
    
    // Reset des erreurs quand on change d'onglet
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

    let btnLabel = type === 'financier' ? 'Financier' : (type === 'materiel' ? 'Matériel' : 'Compétences');
    document.getElementById('btn-text').innerText = 'Faire un Don ' + btnLabel;

    document.querySelectorAll('.don-type-btn').forEach(btn => btn.classList.remove('active'));
    event.currentTarget.classList.add('active');
}

// 2. VALIDATION AVEC BORDURES ROUGES
document.getElementById('donationForm').addEventListener('submit', function(e) {
    let typeDon = document.getElementById('type_don').value;
    let isValid = true;

    // Liste des champs à vérifier systématiquement
    const commonFields = ['nom_complet', 'email', 'telephone', 'pays'];
    
    // Champs spécifiques
    let specificFields = [];
    if(typeDon === 'financier') specificFields = ['montant'];
    if(typeDon === 'materiel') specificFields = ['description_materiel'];
    if(typeDon === 'competence') specificFields = ['description_competence'];

    const allFieldsToCheck = [...commonFields, ...specificFields];

    allFieldsToCheck.forEach(fieldName => {
        let field = this.querySelector(`[name="${fieldName}"]`);
        if (field && field.value.trim() === "") {
            field.classList.add('is-invalid'); // AJOUTE LA BORDURE ROUGE
            isValid = false;
        } else if(field) {
            field.classList.remove('is-invalid');
        }
    });

    // Cas particulier : Radio buttons (Mode de paiement)
    if(typeDon === 'financier') {
        let radioWrapper = document.getElementById('mode-payement-wrapper');
        let radioChecked = this.querySelector('input[name="id_mode_payement"]:checked');
        if(!radioChecked) {
            radioWrapper.style.borderColor = "#dc3545";
            radioWrapper.style.borderWidth = "2px";
            isValid = false;
        } else {
            radioWrapper.style.borderColor = "#dee2e6";
        }
    }

    if (!isValid) {
        e.preventDefault(); // Bloque l'envoi
        alert("Veuillez remplir les champs encadrés en rouge.");
    }
});

// 3. RETIRER LE ROUGE DÈS QUE L'UTILISATEUR SAISIT QUELQUE CHOSE
document.querySelectorAll('.form-control, .form-select').forEach(input => {
    input.addEventListener('input', function() {
        if (this.value.trim() !== "") {
            this.classList.remove('is-invalid');
        }
    });
});
</script>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>
