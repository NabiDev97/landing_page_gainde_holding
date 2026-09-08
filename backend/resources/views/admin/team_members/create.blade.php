@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Nouveau membre</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="mb-3"><label class="form-label">Nom</label><input name="name" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Rôle</label><input name="role" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Bio</label><textarea name="bio" class="form-control"></textarea></div>
            <div class="mb-3"><label class="form-label">Photo</label><input type="file" name="photo" class="form-control"></div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
