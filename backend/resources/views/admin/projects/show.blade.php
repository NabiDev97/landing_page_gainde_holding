@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>{{ $project->title }}</h2>
        @if($project->image)<img src="{{ secure_asset('storage/'.$project->image) }}" style="max-width:300px" class="mb-3">@endif
        <div>{!! nl2br(e($project->description)) !!}</div>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
