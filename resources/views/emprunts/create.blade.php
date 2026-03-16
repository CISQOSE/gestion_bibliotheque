@extends('layouts.app')

@section('titre', 'Nouvel emprunt')

@section('contenu')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Enregistrer un emprunt</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('emprunts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Étudiant</label>
                    <select name="etudiant_id" class="form-select" required>
                        <option value="">-- Choisir un étudiant --</option>
                        @foreach($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}"
                                {{ old('etudiant_id') == $etudiant->id ? 'selected' : '' }}>
                                {{ $etudiant->nom }} {{ $etudiant->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Livre</label>
                    <select name="livre_id" class="form-select" required>
                        <option value="">-- Choisir un livre --</option>
                        @foreach($livres as $livre)
                            <option value="{{ $livre->id }}"
                                {{ old('livre_id') == $livre->id ? 'selected' : '' }}>
                                {{ $livre->titre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date d'emprunt</label>
                    <input type="date" name="date_emprunt" class="form-control"
                           value="{{ old('date_emprunt', date('Y-m-d')) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de retour prévue
                        <span class="text-muted">(optionnelle)</span>
                    </label>
                    <input type="date" name="date_retour" class="form-control"
                           value="{{ old('date_retour') }}">
                </div>

                <a href="{{ route('emprunts.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Enregistrer l'emprunt
                </button>

            </form>
        </div>
    </div>

@endsection