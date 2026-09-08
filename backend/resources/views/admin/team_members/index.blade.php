@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3"><h2>Équipe</h2><a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">Nouveau</a></div>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table"><thead><tr><th>ID</th><th>Photo</th><th>Nom</th><th>Rôle</th><th>Actions</th></tr></thead><tbody>
        @foreach($members as $m)
            <tr><td>{{ $m->id }}</td>
                <td>
                    @if($m->photo)
                        <img src="{{ asset('storage/'.$m->photo) }}" alt="thumb" style="width:80px;height:auto;border-radius:4px;">
                    @else
                        —
                    @endif
                </td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->role }}</td>
                <td>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.team-members.show', $m) }}">Voir</a>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.team-members.edit', $m) }}">Éditer</a>
                <form action="{{ route('admin.team-members.destroy', $m) }}" method="POST" style="display:inline-block">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
            </td></tr>
        @endforeach
        </tbody></table>
        {{ $members->links() }}
    </div>
@endsection
