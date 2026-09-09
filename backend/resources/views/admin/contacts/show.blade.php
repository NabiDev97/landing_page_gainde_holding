@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <p class="text-uppercase text-muted mb-1">Administration</p>
            <h1 class="mb-0">Détail de la demande</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">Retour</a>
            <a href="{{ route('admin.contacts.download', $contact) }}" class="btn btn-success">Télécharger PDF</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <p class="text-muted mb-1">Nom</p>
                    <h5>{{ $contact->name }}</h5>
                </div>
                <div class="col-md-6">
                    <p class="text-muted mb-1">Email</p>
                    <h5>{{ $contact->email }}</h5>
                </div>
                <div class="col-md-6">
                    <p class="text-muted mb-1">Téléphone</p>
                    <h5>{{ $contact->phone ?? 'Non renseigné' }}</h5>
                </div>
                <div class="col-md-6">
                    <p class="text-muted mb-1">Objet</p>
                    <h5>{{ $contact->subject ?? 'Demande de devis' }}</h5>
                </div>
                <div class="col-12">
                    <p class="text-muted mb-2">Détails</p>
                    <div class="border rounded p-3 bg-light-subtle">
                        <pre class="mb-0 whitespace-pre-wrap">{{ $contact->message }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
