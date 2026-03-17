@extends('layouts.app')

@section('titre', 'Modifier un livre')

@section('contenu')

    <div class="page-header">
        <h1 class="page-title">Modifier le <span>livre</span></h1>
    </div>

    <div class="form-card">

        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <div>
                    <ul>
                        @foreach($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('livres.update', $livre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label">Titre du livre</label>
                <input type="text" name="titre" class="form-control"
                       value="{{ old('titre', $livre->titre) }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Date de publication</label>
                <input type="date" name="date_publication" class="form-control"
                       value="{{ old('date_publication', $livre->date_publication) }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Auteur</label>
                <select name="auteur_id" class="form-select" required>
                    <option value="">— Sélectionner un auteur —</option>
                    @foreach($auteurs as $auteur)
                        <option value="{{ $auteur->id }}"
                            {{ old('auteur_id', $livre->auteur_id) == $auteur->id ? 'selected' : '' }}>
                            {{ $auteur->nom }} {{ $auteur->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <a href="{{ route('livres.index') }}" class="btn-ghost">Annuler</a>
                <button type="submit" class="btn-gold" style="border:none;cursor:pointer;">Mettre à jour</button>
            </div>

        </form>
    </div>

@endsection