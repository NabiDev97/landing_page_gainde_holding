@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Éditer membre</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.team-members.update', $member) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nom</label><input name="name" class="form-control" value="{{ old('name', $member->name) }}" required></div>
            <div class="mb-3"><label class="form-label">Rôle</label><input name="role" class="form-control" value="{{ old('role', $member->role) }}"></div>
            <div class="mb-3"><label class="form-label">Bio</label><textarea name="bio" class="form-control">{{ old('bio', $member->bio) }}</textarea></div>
            <div class="mb-3">
                @php $mImg = null; @endphp
                @if(!empty($member->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($member->photo))
                    @php $mImg = secure_asset('storage/'.$member->photo); @endphp
                @elseif(!empty($member->photo) && file_exists(public_path('img/'.$member->photo)))
                    @php $mImg = secure_asset('img/'.$member->photo); @endphp
                @endif
                @if($mImg)
                    <img src="{{ $mImg }}" style="height:80px" class="mb-2">
                @endif
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
