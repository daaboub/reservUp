@extends("layouts.app")

@section("content")
<div class="container mt-4">
    <h2 class="mb-4">Liste des Réservations</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nom de la Salle</th>
                <th>Nom de l'Utilisateur</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservation->salle->nom }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>
                        <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select class="form-control" name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>En Attente</option>
                                <option value="approved" {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approuvée</option>
                                <option value="rejected" {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejetée</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">Voir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune réservation trouvée</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
