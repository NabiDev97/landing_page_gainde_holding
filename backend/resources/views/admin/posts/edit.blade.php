@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Éditer article</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Titre</label><input name="title" class="form-control" value="{{ old('title', $post->title) }}" required></div>
            <div class="mb-3"><label class="form-label">Extrait</label><input name="excerpt" class="form-control" value="{{ old('excerpt', $post->excerpt) }}"></div>
            <div class="mb-3"><label class="form-label">Contenu</label><textarea name="body" class="form-control" rows="8">{{ old('body', $post->body) }}</textarea></div>
            <div class="mb-3">@if($post->featured_image)<img src="{{ secure_asset('storage/'.$post->featured_image) }}" style="height:80px" class="mb-2">@endif<label class="form-label">Image</label><input type="file" name="featured_image" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Date de publication</label><input type="date" name="published_at" class="form-control" value="{{ optional($post->published_at)->toDateString() }}"></div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
