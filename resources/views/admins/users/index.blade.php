@extends("layouts.app")
@section("content")
    <div class="container mt-5">
        <h1 class="mb-4">{{ __('messages.users')}}</h1>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Formulaire pour suspendre l'utilisateur -->
                            <form action="{{ route('users.suspend', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir suspendre ce compte ?')">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn {{ $user->suspended ? 'btn-success' : 'btn-warning' }}">
                                    {{ $user->suspended ? 'Réactiver' : 'Suspendre' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
