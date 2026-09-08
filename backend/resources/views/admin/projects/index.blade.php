@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Projets</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nouveau projet</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr><th>ID</th><th>Titre</th><th>Image</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        @if($project->image)
                            <img src="{{ secure_asset('storage/'.$project->image) }}" alt="" style="height:60px">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">Éditer</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $projects->links() }}
    </div>
@endsection
