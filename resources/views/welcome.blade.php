<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>LARAVEL</h1>
    <p>
        <a href="{{ route('ecus') }}">Liste des Ecus</a>
    </p>
    <p>
        <a href="{{ route('etudiants') }}">Liste des Etudiants</a>
    </p>
</body>

</html>
