<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            border: 1px solid #ccc;
        }

        td,
        th {
            border: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-align: left;
        }

        td:first-child {
            font-weight: bold;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 100px;
        }
    </style>
    <title>Détails Etudiant</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Nom : {{ mb_strtoupper($etudiant->nom) }}</h2>
                <h2>Prénoms : {{ $etudiant->prenom }}</h2>
                <h4>Moyenne Totale : {{ $moyenne_totale }} </h4>
            </div>
            <table class="mt-5 table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="vertical-align: middle; text-align: center">UNITE D'ENSEIGNEMENT</th>
                        <th style="vertical-align: middle; text-align: center">LISTE ECUS</th>
                        <th style="vertical-align: middle; text-align: center">NOTE</th>
                        <th style="vertical-align: middle; text-align: center">MOYENNE UE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td style="vertical-align: middle; text-align: center">{{ $note->libUe }}</td>
                            <td style="vertical-align: middle; text-align: center">
                                @foreach (explode(',', $note->libEcu) as $libEcu)
                                    {{ $libEcu }} <br>
                                @endforeach
                            </td>
                            <td style="vertical-align: middle; text-align: center">
                                @foreach (explode(',', $note->note) as $notes)
                                    {{ $notes }} <br>
                                @endforeach
                            </td>
                            <td style="vertical-align: middle; text-align: center">
                                {{ $note->moyenne }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
