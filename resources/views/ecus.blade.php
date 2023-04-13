<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ecus</title>
</head>

<body>
    <center>
        <h2>Liste des ECUS</h2>
        <table>
            <thead>
                <tr>
                    <th>Unité d'Enseignement</th>
                    <th style="text-align: center">Eléments Constitutifs de l'Unité</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ecus as $ecu)
                    <tr>
                        <td style="text-align:center">{{ $ecu->libUe }}</td>
                        <td>
                            @foreach (explode(',', $ecu->libEcu) as $libEcu)
                                {{ $libEcu }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

</html>
