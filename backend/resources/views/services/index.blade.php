@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Nos Services</h1>
    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-md-4">
            <div class="card h-100">
                @if($service->image)
                <img src="{{ asset('storage/'.$service->image) }}" class="card-img-top" alt="{{ $service->name ?? $service->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name ?? $service->title }}</h5>
                    <p class="card-text">{{ Str::limit($service->description, 120) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
