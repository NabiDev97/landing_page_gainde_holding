@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <h2>{{ $member->name }}</h2>
        @if($member->photo)<img src="{{ secure_asset('storage/'.$member->photo) }}" style="height:100px">@endif
        <div class="mt-3">{{ $member->bio }}</div>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
