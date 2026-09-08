@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Services</h2>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Nouveau service</a>
        </div>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table">
            <thead><tr><th>ID</th><th>Image</th><th>Titre</th><th>Actions</th></tr></thead>
            <tbody>
            @foreach($services as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>
                        @php $sImg = null; @endphp
                        @if(!empty($s->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($s->image))
                            @php $sImg = secure_asset('storage/'.$s->image); @endphp
                        @elseif(!empty($s->image) && file_exists(public_path('img/'.$s->image)))
                            @php $sImg = secure_asset('img/'.$s->image); @endphp
                        @endif
                        @if($sImg)
                            <img src="{{ $sImg }}" alt="thumb" style="width:80px;height:auto;border-radius:4px;">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $s->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.services.show', $s) }}">Voir</a>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.services.edit', $s) }}">Éditer</a>
                        <form action="{{ route('admin.services.destroy', $s) }}" method="POST" style="display:inline-block">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $services->links() }}
    </div>
@endsection
