<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de devis</title>
    <style>
        body { font-family: Arial, sans-serif; color: #222; margin: 30px; }
        .header { border-bottom: 2px solid #f97316; padding-bottom: 10px; margin-bottom: 25px; }
        h1 { font-size: 24px; color: #111827; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 10px 8px; border-bottom: 1px solid #e5e7eb; vertical-align: top; }
        .label { font-weight: bold; width: 220px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Demande de devis - GAÏNDE-HOLDING</h1>
    </div>

    <table>
        <tr>
            <td class="label">Nom</td>
            <td>{{ $contact->name }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>{{ $contact->email }}</td>
        </tr>
        <tr>
            <td class="label">Téléphone</td>
            <td>{{ $contact->phone ?? 'Non renseigné' }}</td>
        </tr>
        <tr>
            <td class="label">Type de projet</td>
            <td>{{ $validated['project_type'] ?? 'Non précisé' }}</td>
        </tr>
        <tr>
            <td class="label">Adresse du projet</td>
            <td>{{ $validated['project_address'] ?? 'Non précisé' }}</td>
        </tr>
        <tr>
            <td class="label">Surface</td>
            <td>{{ $validated['surface'] ?? 'Non précisé' }} m²</td>
        </tr>
        <tr>
            <td class="label">Budget estimé</td>
            <td>{{ $validated['budget'] ?? 'Non précisé' }}</td>
        </tr>
        <tr>
            <td class="label">Date de début souhaitée</td>
            <td>{{ $validated['start_date'] ?? 'Non précisé' }}</td>
        </tr>
        <tr>
            <td class="label">Délai prévu</td>
            <td>{{ isset($validated['duration_months']) ? $validated['duration_months'] . ' mois' : 'Non précisé' }}</td>
        </tr>
        <tr>
            <td class="label">Description détaillée</td>
            <td>{{ $validated['details'] }}</td>
        </tr>
    </table>
</body>
</html>
