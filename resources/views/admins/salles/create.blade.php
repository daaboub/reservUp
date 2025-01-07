@extends("layouts.app")

@section("content")
<div class="container">
    <h3 class="text-gray">Créer une salle</h3>

    <!-- Formulaire de création de salle -->
    <form action="{{ route('salles.store') }}" method="POST">
        @csrf

        <!-- Champ Nom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="nom">Nom de la salle</label>
                <input type="text" class="form-control form-control-user" id="nom" name="nom" placeholder="Nom" required>
            </div>
        </div>

        <!-- Champ Capacité -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="capacite">Capacité</label>
                <input type="number" class="form-control form-control-user" id="capacite" name="capacite" placeholder="Capacité" required>
            </div>
        </div>

        <!-- Champ Disponibilité -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="disponibilite">Disponibilité</label>
                <select name="disponbilite" id="disponibilite" class="form-control" required>
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
        </div>

        <!-- Liste des Équipements -->
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="equipements">Les Équipements</label><br>
                @foreach ($equipements as $equipement)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="equipements[]" value="{{ $equipement->id }}" id="equipement_{{ $equipement->id }}" class="form-check-input">
                        <label for="equipement_{{ $equipement->id }}" class="form-check-label">{{ $equipement->nom }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bouton d'envoi -->
        <div class="form-group row mt-3">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection
