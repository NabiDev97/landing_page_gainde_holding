<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de devis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        .page {
            padding: 30px 35px 20px;
        }
        .header {
            display: table;
            width: 100%;
            border-bottom: 2px solid #f59e0b;
            padding-bottom: 18px;
            margin-bottom: 24px;
        }
        .logo-wrap {
            display: table-cell;
            width: 90px;
            vertical-align: middle;
        }
        .logo {
            width: 76px;
            height: auto;
            display: block;
        }
        .title-wrap {
            display: table-cell;
            vertical-align: middle;
            padding-left: 14px;
        }
        h1 {
            font-size: 24px;
            margin: 0;
            color: #111827;
            line-height: 1.3;
        }
        .subtitle {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            padding: 11px 10px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            width: 210px;
            color: #111827;
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
        }
        .footer-note {
            margin-top: 24px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="page">
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

        <div class="footer-note">
            Document généré le {{ now()->translatedFormat('d/m/Y à H:i') }}.
        </div>
    </div>
</body>
</html>
