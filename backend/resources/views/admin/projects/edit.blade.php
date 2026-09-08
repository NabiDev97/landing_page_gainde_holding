@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Éditer projet</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                @if($project->image)<div class="mb-2"><img src="{{ secure_asset('storage/'.$project->image) }}" style="height:80px"></div>@endif
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
