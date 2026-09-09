@component('mail::message')
# Nouvelle demande de devis

Une nouvelle demande de devis a été reçue depuis le site GAÏNDE-HOLDING.

- Nom : {{ $contact->name }}
- Email : {{ $contact->email }}
- Téléphone : {{ $contact->phone ?? 'Non renseigné' }}
- Type de projet : {{ $validated['project_type'] ?? 'Non précisé' }}
- Adresse du projet : {{ $validated['project_address'] ?? 'Non précisé' }}
- Surface : {{ $validated['surface'] ?? 'Non précisé' }}
- Budget : {{ $validated['budget'] ?? 'Non précisé' }}
- Date de début souhaitée : {{ $validated['start_date'] ?? 'Non précisé' }}
- Délai prévu : {{ isset($validated['duration_months']) ? $validated['duration_months'] . ' mois' : 'Non précisé' }}

## Description du projet
{{ $validated['details'] }}

Une pièce jointe PDF contenant le détail de cette demande est jointe à ce message.

Merci,
{{ config('app.name') }}
@endcomponent
