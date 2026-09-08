@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Utilisateurs</h1>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Créer un utilisateur</a>
        </div>
    </div>

    <form class="row g-2 mb-3" method="GET" action="{{ route('admin.users.index') }}">
        <div class="col-auto">
            <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Recherche nom ou email">
        </div>
        <div class="col-auto">
            <select name="is_admin" class="form-select">
                <option value="">Tous</option>
                <option value="1" {{ request('is_admin')==='1' ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ request('is_admin')==='0' ? 'selected' : '' }}>Non-admin</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-secondary">Filtrer</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.users.index', array_merge(request()->except('page'), ['export' => 'csv'])) }}">Export CSV</a>
        </div>
    </form>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

    <table class="table">
        <thead>
            <tr><th>#</th><th>Nom</th><th>Email</th><th>Admin</th><th></th></tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->is_admin ? 'Oui' : 'Non' }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-secondary">Éditer</a>
                    <form action="{{ route('admin.users.destroy', $u) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection
