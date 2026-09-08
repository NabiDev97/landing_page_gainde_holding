@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3"><h2>Articles</h2><a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Nouveau</a></div>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table"><thead><tr><th>ID</th><th>Titre</th><th>Publié</th><th>Actions</th></tr></thead><tbody>
        @foreach($posts as $p)
            <tr><td>{{ $p->id }}</td><td>{{ $p->title }}</td><td>{{ $p->published_at? $p->published_at->toDateString(): '-' }}</td><td>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.posts.show', $p) }}">Voir</a>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.edit', $p) }}">Éditer</a>
                <form action="{{ route('admin.posts.destroy', $p) }}" method="POST" style="display:inline-block">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
            </td></tr>
        @endforeach
        </tbody></table>
        {{ $posts->links() }}
    </div>
@endsection
