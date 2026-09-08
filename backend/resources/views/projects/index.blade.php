@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Nos Projets</h1>
    <div class="row g-4">
        @foreach($projects as $project)
        <div class="col-md-4">
            <div class="card">
                @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ Str::limit($project->description, 120) }}</p>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $projects->links() }}</div>
</div>
@endsection
