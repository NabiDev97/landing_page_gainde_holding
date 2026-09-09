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
            border-bottom: 2px solid #f59e0b;
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
            @if(!empty($logoSvg))
                {!! $logoSvg !!}
            @endif
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
            <td class="label">Objet</td>
            <td>{{ $contact->subject ?? 'Demande de devis' }}</td>
        </tr>
        <tr>
            <td class="label">Date de la demande</td>
            <td>{{ $contact->created_at ? $contact->created_at->translatedFormat('d/m/Y à H:i') : 'Non renseignée' }}</td>
        </tr>
        <tr>
            <td class="label">Message</td>
            <td><pre>{{ $contact->message }}</pre></td>
        </tr>
    </table>
</body>
</html>
