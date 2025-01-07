@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Administrateurs</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="d-flex">
                            <!-- Utilisation du proxy pour vérifier la permission de suppression -->
                                <form action="{{ route('admin.delete', $admin->id) }}" class="m-1" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>

                                <form action="{{ route('admins.toggleSuspension', $admin->id) }}" class="m-1" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn {{ $admin->suspended ? 'btn-success' : 'btn-warning' }}">
                                        {{ $admin->suspended ? 'Réactiver' : 'Suspendre' }}
                                    </button>
                                </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Vérifier si l'utilisateur a la permission de créer un admin -->
        {{-- @if($adminPermissionsProxy->createAdmin(auth()->user())) --}}
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Ajouter un Administrateur</a>
        {{-- @else --}}
            {{-- <span>Pas de permission pour créer un admin</span> --}}
        {{-- @endif --}}
    </div>
@endsection
