@extends('layouts.app')

@section('titre', 'Ajouter un livre')

@section('contenu')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Ajouter un livre</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('livres.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="titre" class="form-control"
                           value="{{ old('titre') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de publication</label>
                    <input type="date" name="date_publication" class="form-control"
                           value="{{ old('date_publication') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Auteur</label>
                    <select name="auteur_id" class="form-select" required>
                        <option value="">-- Choisir un auteur --</option>
                        @foreach($auteurs as $auteur)
                            <option value="{{ $auteur->id }}"
                                {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>
                                {{ $auteur->nom }} {{ $auteur->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <a href="{{ route('livres.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>

            </form>
        </div>
    </div>

@endsection