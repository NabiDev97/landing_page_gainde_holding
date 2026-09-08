@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1>{{ $project->title }}</h1>
    @if($project->image)
    <img src="{{ asset('storage/'.$project->image) }}" class="img-fluid mb-4" alt="{{ $project->title }}">
    @endif
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
