@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Éditer la section {{ $section->key }}</h1>
    <form method="POST" action="{{ route('admin.page-sections.update', $section) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input name="title" class="form-control" value="{{ $section->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu (HTML)</label>
            <textarea name="content" class="form-control" rows="6">{{ $section->content }}</textarea>
        </div>
        <button class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
