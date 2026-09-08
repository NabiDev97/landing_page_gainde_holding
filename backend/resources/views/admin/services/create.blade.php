@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Nouveau service</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="mb-3"><label class="form-label">Nom</label><input name="name" class="form-control" required value="{{ old('name') }}"></div>
            <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control">{{ old('description') }}</textarea></div>
            <div class="mb-3"><label class="form-label">Icone (classe)</label><input name="icon" class="form-control" value="{{ old('icon') }}"></div>
            <div class="mb-3"><label class="form-label">Image</label><input type="file" name="image" class="form-control"></div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
