@extends("layouts.app")

@section("content")
<div class="container">
    <h3 class="text-gray">Modifier la salle : {{ $salle->nom }}</h3>
    
    <!-- Formulaire de modification -->
    <form action="{{ route('salles.update', $salle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom de la salle :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $salle->nom }}" required>
        </div>

        <div class="form-group">
            <label for="capacite">Capacité :</label>
            <input type="number" class="form-control" id="capacite" name="capacite" value="{{ $salle->capacite }}" required>
        </div>

        <div class="form-group">
            <label for="disponbilite">Disponibilité :</label>
            <select class="form-control" id="disponbilite" name="disponbilite" required>
                <option value="1" {{ $salle->disponbilite ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$salle->disponbilite ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <div class="form-group">
            <label>Équipements :</label>
            <div class="form-check">
                @foreach($equipements as $equipement)
                    <label class="form-check-label" for="equipement_{{ $equipement->id }}">
                        <input type="checkbox" class="form-check-input" id="equipement_{{ $equipement->id }}" name="equipements[]" value="{{ $equipement->id }}"
                        {{ $salle->equipements->contains($equipement->id) ? 'checked' : '' }}>
                        {{ $equipement->nom }}
                    </label><br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('salles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
