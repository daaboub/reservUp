<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Salle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
    // public function index()
    // {
    //     return view('user.reservation.index');
    // }

    public function index()
    {
        // Récupérer toutes les salles avec leurs équipements
        $salles = Salle::with('equipements')->get();

        // Retourner la vue avec les données des salles
        return view('user.reservation.salle', compact('salles'));
    }

    public function show($id)
    {
        $salle = Salle::with('equipements')->findOrFail($id);
        return view('user.reservation.show', compact('salle'));
    }


    public function ReservationHistory()
    {

        // Récupérer les réservations avec les relations
    $reservations = Reservation::with('salle', 'user')->where('user_id', '=', Auth::id())->get();

    // Créer un document XML avec DOMDocument
    $dom = new \DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    // Ajouter l'instruction de traitement pour le fichier XSL
    $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="/reservations.xsl"');
    $dom->appendChild($xslt);

    // Créer l'élément racine <reservations>
    $root = $dom->createElement('reservations');
    $dom->appendChild($root);

    // Ajouter les réservations au document XML
    foreach ($reservations as $reservation) {
        $res = $dom->createElement('reservation');

        $res->appendChild($dom->createElement('id', $reservation->id));
        $res->appendChild($dom->createElement('salle', $reservation->salle->nom));
        $res->appendChild($dom->createElement('user', $reservation->user->name));
        $res->appendChild($dom->createElement('date', $reservation->date_reservation));
        $res->appendChild($dom->createElement('status', $reservation->status));

        $root->appendChild($res);
    }

    // Retourner le XML
    return response($dom->saveXML(), 200)
        ->header('Content-Type', 'application/xml');
    }

    public function store(Request $request)
    {

        $request->validate([
            'salle_id' => 'required|exists:salles,id',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'salle_id' => $request->salle_id,
            'date_reservation' => Carbon::now(),
            'status' => 'pendding',
        ]);

        return redirect()->route('reservation.index')->with('success', 'Réservation réussie !');
    }
}
