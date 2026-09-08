@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1>{{ $post->title }}</h1>
    @if($post->featured_image)
    <img src="{{ secure_asset('storage/'.$post->featured_image) }}" class="img-fluid mb-4" alt="{{ $post->title }}">
    @endif
    <div>{!! $post->body !!}</div>
    <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
