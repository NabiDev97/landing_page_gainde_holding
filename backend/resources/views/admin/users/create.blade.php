@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Créer un utilisateur</h1>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmer le mot de passe</label>
            <input name="password_confirmation" type="password" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" name="is_admin" id="is_admin" {{ old('is_admin') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_admin">Administrateur</label>
        </div>
        <button class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
