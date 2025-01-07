@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Administrateur</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <h5>Permissions :</h5>
            <div class="row">
                @foreach($abilities as $ability)
                <div class="form-check form-switch custom-switch col-md-3">
                    <input type="checkbox" class="form-check-input ability-checkbox @error('roles') is-invalid @enderror" id="{{ $ability->abbr }}" name="roles[]" value="{{ $ability->id }}">
                    <label class="form-check-label" for="{{ $ability->abbr }}">{{ $ability->name }}</label>
                </div>
            @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
