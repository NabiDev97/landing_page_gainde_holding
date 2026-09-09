<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de devis</title>
    <style>
        body { font-family: Arial, sans-serif; color: #1f2937; margin: 30px; }
        .header { border-bottom: 2px solid #f59e0b; padding-bottom: 10px; margin-bottom: 30px; }
        h1 { font-size: 24px; margin: 0; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 10px 8px; border-bottom: 1px solid #e5e7eb; vertical-align: top; }
        .label { font-weight: bold; width: 220px; }
        pre { white-space: pre-wrap; font-family: Arial, sans-serif; }
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
            <td class="label">Objet</td>
            <td>{{ $contact->subject ?? 'Demande de devis' }}</td>
        </tr>
        <tr>
            <td class="label">Message</td>
            <td><pre>{{ $contact->message }}</pre></td>
        </tr>
    </table>
</body>
</html>
