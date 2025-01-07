@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la réservation</h1>

        <div class="card">
            <div class="card-header">
                <h3>Réservation #{{ $reservation->id }}</h3>
            </div>
            <div class="card-body">
                <h5><strong>Salle:</strong> {{ $reservation->salle->nom }}</h5>
                <p><strong>Capacité:</strong> {{ $reservation->salle->capacite }}</p>
                <p><strong>Disponibilité:</strong> {{ $reservation->salle->disponiblite ? 'Disponible' : 'Non disponible' }}</p>

                <h5><strong>Utilisateur:</strong> {{ $reservation->user->name }}</h5>
                <p><strong>Email:</strong> {{ $reservation->user->email }}</p>

                <h5><strong>Date de réservation:</strong> {{ $reservation->date_reservation }}</h5>

                <h5><strong>Status:</strong> {{ ucfirst($reservation->status) }}</h5>

                <!-- Formulaire pour changer le statut -->
                <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="approved" {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approuvée</option>
                            <option value="rejected" {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejetée</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
                </form>
            </div>
        </div>

        <br>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Retour à la liste des réservations</a>
    </div>
@endsection
