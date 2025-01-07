@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Liste des Salles Disponibles</h2>

        @if($salles->isEmpty())
            <div class="alert alert-warning">
                Aucune salle disponible pour le moment.
            </div>
        @else
            <div class="row">
                @foreach($salles as $salle)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ $salle->nom }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Capacité:</strong> {{ $salle->capacite }} personnes</p>
                                <p><strong>Disponibilité:</strong> {{ $salle->disponiblite ? 'Disponible' : 'Non Disponible' }}</p>
                                
                                <h6>Équipements disponibles:</h6>
                                <ul>
                                    @foreach ($salle->equipements as $equipement)
                                        <li>{{ $equipement->nom }}</li>
                                    @endforeach
                                </ul>
                                @if($salle->disponiblite)
                                    <a href="{{ route('reservation.show', $salle->id) }}" class="btn btn-primary">Voir Détails et Réserver</a>
                                @else
                                    <button class="btn btn-secondary" disabled>Indisponible</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
