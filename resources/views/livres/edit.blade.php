@extends('layouts.app')

@section('titre', 'Modifier un livre')

@section('contenu')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Modifier le livre</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('livres.update', $livre->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="titre" class="form-control"
                           value="{{ old('titre', $livre->titre) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de publication</label>
                    <input type="date" name="date_publication" class="form-control"
                           value="{{ old('date_publication', $livre->date_publication) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Auteur</label>
                    <select name="auteur_id" class="form-select" required>
                        <option value="">-- Choisir un auteur --</option>
                        @foreach($auteurs as $auteur)
                            <option value="{{ $auteur->id }}"
                                {{ old('auteur_id', $livre->auteur_id) == $auteur->id ? 'selected' : '' }}>
                                {{ $auteur->nom }} {{ $auteur->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <a href="{{ route('livres.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>

            </form>
        </div>
    </div>

@endsection