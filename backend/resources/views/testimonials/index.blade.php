@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Témoignages</h1>
    <div class="row g-4">
        @foreach($testimonials as $t)
        @php
            $testimonialImage = null;
            if (!empty($t->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($t->photo)) {
                $testimonialImage = secure_asset('storage/' . $t->photo);
            } elseif (!empty($t->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($t->image)) {
                $testimonialImage = secure_asset('storage/' . $t->image);
            } elseif (!empty($t->photo) && file_exists(public_path('img/' . $t->photo))) {
                $testimonialImage = secure_asset('img/' . $t->photo);
            } elseif (!empty($t->image) && file_exists(public_path('img/' . $t->image))) {
                $testimonialImage = secure_asset('img/' . $t->image);
            } else {
                $testimonialImage = secure_asset('img/testimonial.jpg');
            }
        @endphp
        <div class="col-md-4">
            <div class="card p-3">
                <p>{{ $t->message }}</p>
                <div class="d-flex align-items-center">
                    <img src="{{ $testimonialImage }}" class="rounded-circle me-3" style="width:48px;height:48px;object-fit:cover;" alt="{{ $t->name }}">
                    <div>
                        <strong>{{ $t->name }}</strong><br>
                        <small class="text-muted">{{ $t->position }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
