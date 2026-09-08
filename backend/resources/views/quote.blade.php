@include('partials.head', ['title' => 'Demande de Devis'])
<body>
@include('partials.navbar')

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Obtenir un devis</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="/">Accueil</a></h6>
        <h6 class="text-white m-0 px-3">/</h6>
        <h6 class="text-uppercase text-white m-0">Devis</h6>
    </div>
</div>

<div class="container-fluid py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">Obtenez votre devis personnalisé</h1>
        <p class="fs-5 mb-0">Remplissez le formulaire ci-dessous et notre équipe vous contactera rapidement pour discuter de votre projet.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row gx-5 justify-content-center">
        <div class="col-lg-10">
            <form action="{{ route('contact.store') }}" method="POST" class="quote-form bg-light p-5 rounded">
                @csrf

                <h5 class="text-uppercase mb-4 text-primary fw-bold"><i class="bi bi-person-circle me-2"></i>Informations personnelles</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control border-0" placeholder="Nom complet*" style="height: 55px;" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control border-0" placeholder="Adresse email*" style="height: 55px;" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control border-0" placeholder="Numéro de téléphone" style="height: 55px;">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" name="project_address" value="{{ old('project_address') }}" class="form-control border-0" placeholder="Adresse du projet" style="height: 55px;">
                    </div>
                </div>

                <h5 class="text-uppercase mb-4 text-primary fw-bold"><i class="bi bi-building me-2"></i>Type de projet</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label fw-bold">Sélectionnez le type de projet*</label>
                        <select name="project_type" class="form-select border-0" style="height: 55px;" required>
                            <option value="" disabled {{ old('project_type') ? '' : 'selected' }}>Choisir un type de projet...</option>
                            <option value="Construction Nouvelle" {{ old('project_type') === 'Construction Nouvelle' ? 'selected' : '' }}>Construction nouvelle</option>
                            <option value="Rénovation" {{ old('project_type') === 'Rénovation' ? 'selected' : '' }}>Rénovation</option>
                            <option value="Aménagement" {{ old('project_type') === 'Aménagement' ? 'selected' : '' }}>Aménagement</option>
                            <option value="Extension" {{ old('project_type') === 'Extension' ? 'selected' : '' }}>Extension</option>
                            <option value="Démolition" {{ old('project_type') === 'Démolition' ? 'selected' : '' }}>Démolition</option>
                            <option value="Autre" {{ old('project_type') === 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>
                </div>

                <h5 class="text-uppercase mb-4 text-primary fw-bold"><i class="bi bi-ruler me-2"></i>Détails du projet</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-4">
                        <input type="text" name="surface" value="{{ old('surface') }}" class="form-control border-0" placeholder="Surface (m²)" style="height: 55px;">
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" name="budget" value="{{ old('budget') }}" class="form-control border-0" placeholder="Budget estimé" style="height: 55px;">
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control border-0" style="height: 55px;">
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="number" name="duration_months" value="{{ old('duration_months') }}" class="form-control border-0" placeholder="Délai prévu (mois)" style="height: 55px;">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label fw-bold">Description détaillée du projet*</label>
                        <textarea name="details" class="form-control border-0" rows="6" placeholder="Décrivez votre projet, vos besoins et vos attentes..." required>{{ old('details') }}</textarea>
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="privacy" required>
                    <label class="form-check-label" for="privacy">
                        J'accepte que mes données soient utilisées pour me contacter concernant ma demande de devis.
                    </label>
                </div>

                <button type="submit" class="btn btn-primary px-5 py-3">
                    <i class="bi bi-send me-2"></i> Demander un devis
                </button>
            </form>
        </div>
    </div>
</div>

@include('partials.footer')

</body>
