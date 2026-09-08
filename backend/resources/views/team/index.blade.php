@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Notre Équipe</h1>
    <div class="row g-4">
        @foreach($members as $m)
            @php
                $memberImage = null;
                if (!empty($m->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($m->photo)) {
                    $memberImage = asset('storage/' . $m->photo);
                } elseif (!empty($m->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($m->image)) {
                    $memberImage = asset('storage/' . $m->image);
                } elseif (!empty($m->photo) && file_exists(public_path('img/' . $m->photo))) {
                    $memberImage = asset('img/' . $m->photo);
                } elseif (!empty($m->image) && file_exists(public_path('img/' . $m->image))) {
                    $memberImage = asset('img/' . $m->image);
                } else {
                    $memberImage = asset('img/team-1.jpg');
                }
            @endphp
            <div class="col-md-3 text-center">
                <img src="{{ $memberImage }}" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="{{ $m->name }}">
                <h5>{{ $m->name }}</h5>
                <p class="text-muted mb-2">{{ $m->role ?? $m->title ?? 'Membre de l’équipe' }}</p>
                @if(!empty($m->bio))
                    <p class="text-muted small">{{ $m->bio }}</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
