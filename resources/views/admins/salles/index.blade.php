@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-gray">Liste des Salles</h3>

    <!-- Formulaire de recherche -->
    <form action="{{ route('salle.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher une salle..." value="{{ request('query') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </div>
        </div>
    </form>

    <!-- Table des salles -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Capacité</th>
                <th>Disponibilité</th>
                <th>Équipements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($salles as $salle)
                <tr>
                    <td>{{ $salle->nom }}</td>
                    <td>{{ $salle->capacite }}</td>
                    <td>{{ $salle->disponiblite ? 'Oui' : 'Non' }}</td>
                    <td>
                        @foreach($salle->equipements as $equipement)
                            <span class="badge badge-info">{{ $equipement->nom }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('salles.edit', $salle->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('salles.destroy', $salle->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette salle ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune salle trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
