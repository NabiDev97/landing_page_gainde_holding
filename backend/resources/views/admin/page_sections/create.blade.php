@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Créer une section</h1>
    <form method="POST" action="{{ route('admin.page-sections.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Key (identifiant)</label>
            <input name="key" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu (HTML)</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
