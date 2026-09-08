@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>{{ $post->title }}</h2>
        @if($post->featured_image)<img src="{{ asset('storage/'.$post->featured_image) }}" style="max-width:300px" class="mb-3">@endif
        <div>{!! nl2br(e($post->body)) !!}</div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
