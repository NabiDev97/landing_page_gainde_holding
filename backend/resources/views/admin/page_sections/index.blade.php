@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Sections de page</h1>
        <a href="{{ route('admin.page-sections.create') }}" class="btn btn-primary">Créer</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr><th>Key</th><th>Titre</th><th></th></tr>
        </thead>
        <tbody>
            @foreach($sections as $s)
            <tr>
                <td>{{ $s->key }}</td>
                <td>{{ $s->title }}</td>
                <td>
                    <a href="{{ route('admin.page-sections.edit', $s) }}" class="btn btn-sm btn-secondary">Éditer</a>
                    <form action="{{ route('admin.page-sections.destroy', $s) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
