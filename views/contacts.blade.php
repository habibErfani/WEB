<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion de contacts</title>
</head>
<body>
<table>
    <thead style="background-color:
#ddd; font-weight: bold;">
    <tr>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Téléphone</td>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $c)
        <tr>
            <td>{{ $c->nom}}</td>
            <td>{{ $c->prenom}}</td>
            <td>{{ $c->telephone}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</main>
</body>
</html>
