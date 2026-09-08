@extends('layouts.front')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Témoignages</h1>
    <div class="row g-4">
        @foreach($testimonials as $t)
        <div class="col-md-4">
            <div class="card p-3">
                <p>{{ $t->message }}</p>
                <div class="d-flex align-items-center">
                    <img src="{{ $t->photo ? asset('storage/'.$t->photo) : asset('img/team-1.jpg') }}" class="rounded-circle me-3" style="width:48px;height:48px;object-fit:cover;">
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
