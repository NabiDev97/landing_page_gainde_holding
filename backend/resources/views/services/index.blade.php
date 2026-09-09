@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Nos Services</h1>
    <div class="row g-4">
        @foreach($services as $service)
        @php
            $serviceImage = null;
            if (!empty($service->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->image)) {
                $serviceImage = secure_asset('storage/' . $service->image);
            } elseif (!empty($service->image) && file_exists(public_path('img/' . $service->image))) {
                $serviceImage = secure_asset('img/' . $service->image);
            } else {
                $serviceImage = secure_asset('img/service-1.jpg');
            }
        @endphp
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ $serviceImage }}" class="card-img-top" alt="{{ $service->name ?? $service->title }}">
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
