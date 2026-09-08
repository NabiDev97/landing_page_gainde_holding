@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Éditer service</h2>
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nom</label><input name="name" class="form-control" value="{{ old('name', $service->name) }}" required></div>
            <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control">{{ old('description', $service->description) }}</textarea></div>
            <div class="mb-3"><label class="form-label">Icone (classe)</label><input name="icon" class="form-control" value="{{ old('icon', $service->icon) }}"></div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                @php $svcImg = null; @endphp
                @if(!empty($service->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->image))
                    @php $svcImg = asset('storage/'.$service->image); @endphp
                @elseif(!empty($service->image) && file_exists(public_path('img/'.$service->image)))
                    @php $svcImg = asset('img/'.$service->image); @endphp
                @endif
                @if($svcImg)
                    <div class="mb-2"><img src="{{ $svcImg }}" alt="service" style="max-width:150px;height:auto;"></div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
