@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>{{ $testimonial->name }}</h2>
        @if($testimonial->photo)<img src="{{ asset('storage/'.$testimonial->photo) }}" style="height:100px">@endif
        <div class="mt-3">{{ $testimonial->message }}</div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
