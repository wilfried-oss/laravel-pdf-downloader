<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Etudiants</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto text-center">
                <h2>Liste des Etudiants</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle">ORDRE</th>
                            <th style="text-align: center; vertical-align: middle">NOM</th>
                            <th style="text-align: center; vertical-align: middle">PRENOMS</th>
                            <th style="text-align: center; vertical-align: middle">TELECHARGER</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td>
                                    {{ $etudiant->id }}
                                </td>
                                <td>
                                    <a href="#" style="text-decoration: none; color: black;"
                                        title="VOIR RESULTATS ETUDIANT"
                                        onclick="event.preventDefault(); document.getElementById('details-form').submit()">
                                        {{ $etudiant->nom }}
                                    </a>
                                </td>
                                <td>
                                    <a href="#" style="text-decoration: none; color: black;"
                                        title="VOIR RESULTATS ETUDIANT"
                                        onclick="event.preventDefault(); document.getElementById('details-form').submit()">
                                        {{ $etudiant->prenom }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('downloadView', $etudiant->id) }}">Télécharger Résultats</a>
                                </td>
                            </tr>
                            <form action="{{ route('details') }}" method="post" id="details-form">
                                @csrf
                                <input type="text" name="etudiant_id" hidden value="{{ $etudiant->id }}">
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
