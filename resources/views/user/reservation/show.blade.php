@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Détails de la Salle : {{ $salle->nom }}</h2>

        <div class="card">
            <div class="card-header">
                <h5>{{ $salle->nom }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Capacité:</strong> {{ $salle->capacite }} personnes</p>
                <p><strong>Disponibilité:</strong> {{ $salle->disponiblite ? 'Disponible' : 'Non Disponible' }}</p>
                
                <h6>Équipements disponibles :</h6>
                <ul>
                    @foreach ($salle->equipements as $equipement)
                        <li>{{ $equipement->nom }}</li>
                    @endforeach
                </ul>
                
                @if($salle->disponiblite)
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        <input type="hidden" name="salle_id" value="{{ $salle->id }}">
                        <button type="submit" class="btn btn-success">Réserver cette salle</button>
                    </form>
                @else
                    <button class="btn btn-secondary" disabled>Indisponible</button>
                @endif
            </div>
        </div>
    </div>
@endsection
