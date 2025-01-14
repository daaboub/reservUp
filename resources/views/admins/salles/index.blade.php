@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-gray">{{ __('messages.room_list') }}</h3>

    <!-- Formulaire de recherche -->
    <form action="{{ route('salle.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="{{ __('messages.salle_index_search')}}..." value="{{ request('query') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i> {{ __('messages.salle_index_search_btn') }}
                </button>
            </div>
        </div>
    </form>

    <!-- Table des salles -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('messages.salle_index_nom') }}</th>
                <th>{{ __('messages.salle_index_capacite') }}</th>
                <th>{{ __('messages.salle_index_disponibilite') }}</th>
                <th>{{ __('messages.salle_index_equipement') }}</th>
                <th>{{ __('messages.salle_index_action') }}</th>
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
                        <a href="{{ route('salles.edit', $salle->id) }}" class="btn btn-warning btn-sm">{{ __('messages.salle_index_modify_btn') }}</a>
                        <form action="{{ route('salles.destroy', $salle->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette salle ?')">{{ __('messages.salle_index_delete_btn') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('messages.salle_index_empty') }}.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
