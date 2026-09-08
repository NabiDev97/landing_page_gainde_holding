@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>{{ $service->name }}</h2>
        <div>{{ $service->description }}</div>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
