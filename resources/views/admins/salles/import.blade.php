@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-gray">Importer des Salles depuis un fichier XML</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('salle.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="xml_file">Choisir le fichier XML :</label>
                    <input type="file" name="xml_file" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">
                    <i class="fas fa-file-import"></i> Importer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
