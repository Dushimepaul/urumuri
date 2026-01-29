<?php include VIEWPATH.'includes/frontend/Header.php'; ?>

<style>
:root { --primary-teal: #1a8c78; --dark-teal: #146c5c; --bg-light: #f8f9fa; }
.donate-hero { padding: 140px 0 100px; position: relative; background: linear-gradient(135deg, rgba(0,0,0,.65), rgba(0,0,0,.65)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1600') center/cover; color: white; text-align: center; }
.donation-card { border-radius: 30px; margin-top: -120px; box-shadow: 0 25px 60px rgba(0,0,0,0.12); background: white; border: none; }

/* Tabs */
.don-type-selector { display: flex; gap:10px; margin-bottom:30px; }
.don-type-btn { flex:1; border:none; border-radius:50px; padding:15px; cursor:pointer; font-weight:600; transition:0.3s; background: var(--bg-light); color: #666; }
.don-type-btn.active { background: var(--primary-teal); color:white; }

/* Custom Searchable Select */
.autocomplete-container { position: relative; }
.autocomplete-results { 
    position: absolute; top: 100%; left: 0; right: 0; z-index: 1000; 
    background: white; border: 1px solid #ddd; border-top: none; 
    max-height: 250px; overflow-y: auto; border-radius: 0 0 10px 10px; 
    box-shadow: 0 10px 20px rgba(0,0,0,0.1); display: none;
}
.autocomplete-item { padding: 12px 15px; cursor: pointer; border-bottom: 1px solid #f1f1f1; }
.autocomplete-item:hover, .autocomplete-item.active { background-color: #e9ecef; color: var(--primary-teal); }
.autocomplete-item:last-child { border-bottom: none; }

/* Status Styles */
.form-control.is-invalid { border-color: #dc3545 !important; }
#country_info { transition: 0.3s; background-color: #f0fdfa; border: 1px solid #ccfbf1; border-radius: 15px; }
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
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="don-type-selector mb-4">
                            <button type="button" class="don-type-btn active" onclick="switchDon(event, 'financier')"><i class="fas fa-donate me-2"></i>Financier</button>
                            <button type="button" class="don-type-btn" onclick="switchDon(event, 'materiel')"><i class="fas fa-box-open me-2"></i>Matériel</button>
                            <button type="button" class="don-type-btn" onclick="switchDon(event, 'competence')"><i class="fas fa-lightbulb me-2"></i>Compétences</button>
                        </div>

                        <form id="donationForm" method="POST" action="<?= base_url('Home/Donation') ?>" novalidate>
                            <input type="hidden" name="type_don" id="type_don" value="financier">
                            <input type="hidden" name="pays" id="selected_country_name"> <div class="row g-4 mb-4">
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
                                    <div class="form-floating autocomplete-container">
                                        <input type="text" class="form-control" id="country_search" placeholder="Chercher un pays..." autocomplete="off">
                                        <label>Pays de résidence *</label>
                                        <div id="autocomplete_list" class="autocomplete-results"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Téléphone *</label>
                                    <div class="input-group">
                                        <select class="form-select flex-grow-0" style="width: 130px;" id="phone_country" name="indicatif" required>
                                            <option value="">Code</option>
                                            <?php if(isset($pays)): foreach($pays as $p): ?>
                                                <option value="<?= $p['ITU_T_Telephone_Code'] ?>" data-country="<?= $p['pays'] ?>">
                                                    <?= $p['ITU_T_Telephone_Code'] ?> (<?= $p['ISO_3166_1_2_Letter_Code'] ?>)
                                                </option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <input type="tel" class="form-control" name="telephone" placeholder="Numéro" required pattern="[0-9]{6,15}">
                                    </div>
                                </div>
                            </div>

                           

                            <div id="form-financier" class="don-form-section">
                                <div class="row g-4 mb-4">

                                    <div class="col-md-6"><div class="form-floating">
                                          <input type="number" class="form-control" name="montant" id="input_montant" placeholder="Montant">
                                            <label for="input_montant">
                                           Montant (<span id="label_devise">FBU</span>) *
                                          </label>
                                        </div>
                                     </div>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" name="paiement_recurrent" id="mensuel"><label class="form-check-label" for="mensuel">Don mensuel</label></div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold small text-uppercase">Mode de paiement *</label>
                                        <div class="d-flex flex-wrap gap-3 p-3 border rounded bg-light" id="mode-payement-wrapper">
                                            <?php foreach ($mode_payements as $m): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="id_mode_payement" value="<?= $m['id_mode_payement']; ?>" id="pay<?= $m['id_mode_payement']; ?>">
                                                    <label class="form-check-label" for="pay<?= $m['id_mode_payement']; ?>"><?= $m['description']; ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="form-materiel" class="don-form-section" style="display:none;">
                                <div class="form-floating mb-4"><textarea class="form-control" name="description_materiel" style="height:120px"></textarea><label>Description du matériel *</label></div>
                            </div>

                            <div id="form-competence" class="don-form-section" style="display:none;">
                                <div class="form-floating mb-4"><textarea class="form-control" name="description_competence" style="height:120px"></textarea><label>Description des compétences *</label></div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn text-white shadow-lg" style="width: 280px; background-color: #062C54; padding: 15px; border-radius: 50px; font-weight:600;">
                                    <i class="fas fa-heart me-2"></i><span id="btn-text">Faire un Don Financier</span>
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
// Transfert des données PHP vers JS
const countries = <?php echo json_encode($pays ?? []); ?>;

/**
 * LOGIQUE AUTOCOMPLETE (RECHERCHE)
 */
const searchInput = document.getElementById('country_search');
const resultsList = document.getElementById('autocomplete_list');
const hiddenCountryInput = document.getElementById('selected_country_name');

searchInput.addEventListener('input', function() {
    const val = this.value.toLowerCase();
    resultsList.innerHTML = '';
    if (!val) { resultsList.style.display = 'none'; return; }

    const filtered = countries.filter(c => c.pays.toLowerCase().includes(val));
    
    if (filtered.length > 0) {
        filtered.forEach(c => {
            const div = document.createElement('div');
            div.className = 'autocomplete-item';
            div.innerHTML = `<strong>${c.pays}</strong> <small class="text-muted">(${c.ITU_T_Telephone_Code})</small>`;
            div.onclick = function() { selectCountry(c); };
            resultsList.appendChild(div);
        });
        resultsList.style.display = 'block';
    } else {
        resultsList.style.display = 'none';
    }
});

/**
 * Sélectionne un pays et met à jour tous les champs liés
 */
function selectCountry(country) {
    // 1. Mise à jour des champs de saisie
    searchInput.value = country.pays;
    hiddenCountryInput.value = country.pays;
    resultsList.style.display = 'none';

    // 2. Synchronisation de l'indicatif téléphonique
    const phoneSelect = document.getElementById('phone_country');
    if (phoneSelect) {
        phoneSelect.value = country.ITU_T_Telephone_Code;
    }

    // 3. Mise à jour dynamique de la devise dans le label du montant
    const labelDevise = document.getElementById('label_devise');
    if (labelDevise) {
        // Affiche le code ISO (EUR, USD, FBU) ou FBU par défaut
        labelDevise.innerText = country.ISO_4217_Currency_Code || 'FBU';
    }

    
}

/**
 * Fermeture de la liste de suggestions au clic extérieur
 */
document.addEventListener('click', (e) => {
    if (e.target !== searchInput && e.target !== resultsList) {
        resultsList.style.display = 'none';
    }
});

/**
 * GESTION DES ONGLETS ET VALIDATION (REPRISE)
 */
function switchDon(event, type) {
    document.querySelectorAll('.don-type-btn').forEach(btn => btn.classList.remove('active'));
    event.currentTarget.classList.add('active');
    document.querySelectorAll('.don-form-section').forEach(s => s.style.display = 'none');
    document.getElementById('form-' + type).style.display = 'block';
    document.getElementById('type_don').value = type;
    const labels = {'financier': 'Financier', 'materiel': 'Matériel', 'competence': 'de Compétences'};
    document.getElementById('btn-text').innerText = 'Faire un Don ' + labels[type];
}

document.getElementById('donationForm').addEventListener('submit', function(e) {
    let isValid = true;
    const type = document.getElementById('type_don').value;
    const toValidate = ['nom_complet', 'email', 'telephone', 'indicatif'];

    if(type === 'financier') toValidate.push('montant');
    if(!hiddenCountryInput.value) { searchInput.classList.add('is-invalid'); isValid = false; }

    toValidate.forEach(name => {
        const field = document.querySelector(`[name="${name}"]`);
        if (field && !field.value) { field.classList.add('is-invalid'); isValid = false; }
    });

    if (!isValid) {
        e.preventDefault();
        alert("Veuillez remplir tous les champs obligatoires.");
    }
});
</script>

<?php include VIEWPATH.'includes/frontend/Footer.php'; ?>