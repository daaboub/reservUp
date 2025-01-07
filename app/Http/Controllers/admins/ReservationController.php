<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('salle', 'user')->get();

        return view('admins.reservation.index', compact('reservations'));

    }


    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Validation du statut
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        
        // Mise à jour du statut
        $reservation->status = $request->status;
        $reservation->save();
        
        // Retourner à la page des réservations avec un message de succès
        return redirect()->route('reservations.index')->with('success', 'Le statut de la réservation a été mis à jour.');
    }

    public function show($id)
    {
        // Récupérer la réservation en utilisant son ID
        $reservation = Reservation::with(['salle', 'user'])->findOrFail($id);

        // Retourner la vue 'admin.reservations.show' avec les données de la réservation
        return view('admins.reservation.show', compact('reservation'));
    }
}
