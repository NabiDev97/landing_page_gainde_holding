@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Éditer témoignage</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nom</label><input name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required></div>
            <div class="mb-3"><label class="form-label">Rôle/Société</label><input name="role" class="form-control" value="{{ old('role', $testimonial->role) }}"></div>
            <div class="mb-3"><label class="form-label">Message</label><textarea name="message" class="form-control">{{ old('message', $testimonial->message) }}</textarea></div>
            <div class="mb-3">
                @php $ttImg = null; @endphp
                @if(!empty($testimonial->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($testimonial->photo))
                    @php $ttImg = secure_asset('storage/'.$testimonial->photo); @endphp
                @elseif(!empty($testimonial->photo) && file_exists(public_path('img/'.$testimonial->photo)))
                    @php $ttImg = secure_asset('img/'.$testimonial->photo); @endphp
                @endif
                @if($ttImg)
                    <img src="{{ $ttImg }}" style="height:80px" class="mb-2">
                @endif
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
