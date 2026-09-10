<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de devis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #111827;
            margin: 0;
            padding: 30px 35px 20px;
            background: #ffffff;
        }
        .header {
            display: table;
            width: 100%;
            border-bottom: 2px solid #C9B36B;
            padding-bottom: 16px;
            margin-bottom: 22px;
        }
        .logo-wrap {
            display: table-cell;
            width: 92px;
            vertical-align: middle;
        }
        .logo-wrap svg {
            width: 78px;
            height: 78px;
            display: block;
        }
        .title-wrap {
            display: table-cell;
            vertical-align: middle;
            padding-left: 14px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            color: #111827;
            line-height: 1.3;
        }
        .subtitle {
            margin-top: 4px;
            font-size: 11px;
            color: #6b7280;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 11px 10px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }
        .label {
            width: 220px;
            font-weight: bold;
            color: #111827;
        }
        pre {
            margin: 0;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-wrap">
            <svg width="90" height="90" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="GAÏNDE-HOLDING">
                <rect x="5" y="5" width="80" height="80" rx="12" fill="#111827"/>
                <rect x="16" y="16" width="58" height="58" rx="10" fill="#C9B36B"/>
                <path d="M29 58 L45 24 L61 58" fill="none" stroke="#ffffff" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M34 46 H56" stroke="#ffffff" stroke-width="7" stroke-linecap="round"/>
                <text x="45" y="74" text-anchor="middle" font-size="9" font-family="Arial, sans-serif" font-weight="700" fill="#111827">GH</text>
            </svg>
        </div>
        <div class="title-wrap">
            <h1>Demande de devis</h1>
            <div class="subtitle">GAÏNDE-HOLDING</div>
        </div>
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
            <td><pre>{{ $validated['details'] }}</pre></td>
        </tr>
    </table>
</body>
</html>
