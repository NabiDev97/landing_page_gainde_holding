@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3"><h2>Témoignages</h2><a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Nouveau</a></div>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table"><thead><tr><th>ID</th><th>Photo</th><th>Nom</th><th>Message</th><th>Actions</th></tr></thead><tbody>
        @foreach($testimonials as $t)
            <tr><td>{{ $t->id }}</td>
                <td>
                    @php $tImg = null; @endphp
                    @if(!empty($t->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($t->photo))
                        @php $tImg = asset('storage/'.$t->photo); @endphp
                    @elseif(!empty($t->photo) && file_exists(public_path('img/'.$t->photo)))
                        @php $tImg = asset('img/'.$t->photo); @endphp
                    @endif
                    @if($tImg)
                        <img src="{{ $tImg }}" alt="thumb" style="width:80px;height:auto;border-radius:4px;">
                    @else
                        —
                    @endif
                </td>
                <td>{{ $t->name }}</td>
                <td>{{ Str::limit($t->message, 80) }}</td>
                <td>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.testimonials.show', $t) }}">Voir</a>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.testimonials.edit', $t) }}">Éditer</a>
                <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" style="display:inline-block">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
            </td></tr>
        @endforeach
        </tbody></table>
        {{ $testimonials->links() }}
    </div>
@endsection
