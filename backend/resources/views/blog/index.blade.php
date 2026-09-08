@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Blog</h1>
    <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card">
                @if($post->featured_image)
                <img src="{{ asset('storage/'.$post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->excerpt ?? $post->body, 120) }}</p>
                    <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Lire</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $posts->links() }}</div>
</div>
@endsection
