<!-- resources/views/admin/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <h3>Supprimer un compte administrateur</h3>
    <form action="{{ route('admin.delete', $userId) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection
