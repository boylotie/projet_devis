<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Débit</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 100%; padding: 20px; }
        h2 { text-align: center; }
        .infos { margin-top: 30px; }
        .infos p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reçu de Débit</h2>
        <div class="infos">
            <p><strong>Nom du client :</strong> {{ $nom }}</p>
            <p><strong>Date :</strong> {{ $date }}</p>
            <p><strong>Montant :</strong> {{ number_format($montant, 0, ',', ' ') }} FCFA</p>
            <p><strong>Motif :</strong> {{ $motif }}</p>
        </div>
        <p style="margin-top:50px;">Signature : ________________________</p>
    </div>
</body>
</html>
