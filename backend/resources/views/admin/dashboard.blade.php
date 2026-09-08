@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <p class="text-uppercase text-muted mb-1">Administration</p>
            <h1 class="mb-0">Tableau de bord</h1>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Nouveau projet</a>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary">+ Nouvel article</a>
        </div>
    </div>

    <div class="alert alert-light border shadow-sm mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <strong>Bonjour {{ auth()->user()->name ?? 'Admin' }} 👋</strong>
                <div class="text-muted small">Voici le résumé de votre activité.</div>
            </div>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">En ligne</span>
        </div>
    </div>

    @php
        $stats = [
            ['label' => 'Projets', 'value' => $counts['projects'], 'route' => route('admin.projects.index'), 'bg' => 'primary'],
            ['label' => 'Services', 'value' => $counts['services'], 'route' => route('admin.services.index'), 'bg' => 'info'],
            ['label' => 'Articles', 'value' => $counts['posts'], 'route' => route('admin.posts.index'), 'bg' => 'success'],
            ['label' => 'Utilisateurs', 'value' => $counts['users'], 'route' => route('admin.users.index'), 'bg' => 'warning'],
            ['label' => 'Équipe', 'value' => $counts['team'], 'route' => route('admin.team-members.index'), 'bg' => 'secondary'],
            ['label' => 'Témoignages', 'value' => $counts['testimonials'], 'route' => route('admin.testimonials.index'), 'bg' => 'dark'],
        ];
    @endphp

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-muted small text-uppercase">{{ $stat['label'] }}</div>
                                <div class="display-6 fw-bold mt-2">{{ $stat['value'] }}</div>
                            </div>
                            <div class="rounded-circle bg-{{ $stat['bg'] }} bg-opacity-10 text-{{ $stat['bg'] }} d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; font-weight: 700;">
                                {{ strtoupper(substr($stat['label'], 0, 1)) }}
                            </div>
                        </div>
                        <a href="{{ $stat['route'] }}" class="btn btn-link p-0 mt-3">Voir la liste</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">Derniers projets</h3>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">Voir tout</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Créé</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestProjects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->title ?? $project->name ?? '—' }}</td>
                                        <td>{{ $project->created_at?->diffForHumans() ?? '—' }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">Éditer</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Aucun projet pour le moment.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h3 class="mb-3">Actions rapides</h3>
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary text-start">Créer un projet</a>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary text-start">Ajouter un service</a>
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-success text-start">Publier un article</a>
                        <a href="{{ route('admin.team-members.create') }}" class="btn btn-outline-secondary text-start">Ajouter un membre</a>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-outline-dark text-start">Ajouter un témoignage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
