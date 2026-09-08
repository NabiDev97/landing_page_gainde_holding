@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Nouvel article</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="mb-3"><label class="form-label">Titre</label><input name="title" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Extrait</label><input name="excerpt" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Contenu</label><textarea name="body" class="form-control" rows="8"></textarea></div>
            <div class="mb-3"><label class="form-label">Image</label><input type="file" name="featured_image" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Date de publication</label><input type="date" name="published_at" class="form-control"></div>
            <button class="btn btn-primary">Publier</button>
        </form>
    </div>
@endsection
