<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class EcuController extends Controller
{
    public function ecus()
    {
        // Récupérer les résultats de la requête
        $ecus = DB::table('ecus')
            ->select(
                DB::raw('libUe, GROUP_CONCAT(libEcu ORDER BY libEcu ASC) as libEcu'),
            )
            ->groupBy('libUe')
            ->get();
        return view('ecus', compact('ecus'));
    }

    public function etudiants()
    {
        $etudiants = Etudiant::all();

        return view('etudiants', compact('etudiants'));
    }

    public function details(Request $request)
    {
        $etudiant_id = $request->etudiant_id;

        $etudiant = Etudiant::findOrFail($etudiant_id);

        $notes = DB::table('note_ecus')
            ->join('etudiants', 'etudiants.id', '=', 'note_ecus.etudiant_id')
            ->join('ecus', 'note_ecus.ecu_id', '=', 'ecus.id')
            ->select(
                'etudiants.nom',
                'etudiants.prenom',
                'ecus.libUe',
                DB::raw('GROUP_CONCAT(ecus.libEcu ORDER BY ecus.libEcu ASC) as libEcu '),
                DB::raw('GROUP_CONCAT(note_ecus.note ORDER BY ecus.libEcu ASC) as note'),
                DB::raw('AVG(note_ecus.note) as moyenne')
            )
            ->groupBy(
                'etudiants.nom',
                'etudiants.prenom',
                'ecus.libUe',
            )
            ->orderBy('ecus.libUe', 'ASC')
            ->where('note_ecus.etudiant_id', '=', $etudiant_id)
            ->get();

        $moyenne_totale = DB::table('note_ecus')
            ->where('etudiant_id', $etudiant_id)
            ->avg('note');

        // Arrondir la moyenne totale à 2 décimales

        return view('details', compact(['etudiant', 'notes', 'moyenne_totale']));
    }

    public function downloadView($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);

        $notes = DB::table('note_ecus')
            ->join('etudiants', 'etudiants.id', '=', 'note_ecus.etudiant_id')
            ->join('ecus', 'note_ecus.ecu_id', '=', 'ecus.id')
            ->select(
                'etudiants.nom',
                'etudiants.prenom',
                'ecus.libUe',
                DB::raw('GROUP_CONCAT(ecus.libEcu ORDER BY ecus.libEcu ASC) as libEcu '),
                DB::raw('GROUP_CONCAT(note_ecus.note ORDER BY ecus.libEcu ASC) as note'),
                DB::raw('AVG(note_ecus.note) as moyenne')
            )
            ->groupBy(
                'etudiants.nom',
                'etudiants.prenom',
                'ecus.libUe',
            )
            ->orderBy('ecus.libUe', 'ASC')
            ->where('note_ecus.etudiant_id', '=', $etudiant_id)
            ->get();

        $moyenne_totale = DB::table('note_ecus')
            ->where('etudiant_id', $etudiant_id)
            ->avg('note');


        $html = View::make('details', compact('etudiant', 'moyenne_totale', 'notes'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('resultats.pdf');
    }
}
