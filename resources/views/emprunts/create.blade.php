@extends('layouts.app')
@section('titre', 'Nouvel emprunt')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Nouvel <span>emprunt</span></h1>
    </div>
    <div class="form-card">
        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <div><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            </div>
        @endif
        <form action="{{ route('emprunts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label">Étudiant</label>
                <select name="etudiant_id" class="form-select" required>
                    <option value="">— Sélectionner un étudiant —</option>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" {{ old('etudiant_id') == $etudiant->id ? 'selected' : '' }}>
                            {{ $etudiant->nom }} {{ $etudiant->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Livre</label>
                <select name="livre_id" class="form-select" required>
                    <option value="">— Sélectionner un livre —</option>
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ old('livre_id') == $livre->id ? 'selected' : '' }}>
                            {{ $livre->titre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Date d'emprunt</label>
                <input type="date" name="date_emprunt" class="form-control"
                       value="{{ old('date_emprunt', date('Y-m-d')) }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Date de retour prévue
                    <span style="color:var(--text-muted);font-size:0.7rem;"> — optionnelle</span>
                </label>
                <input type="date" name="date_retour" class="form-control" value="{{ old('date_retour') }}">
            </div>
            <div class="form-actions">
                <a href="{{ route('emprunts.index') }}" class="btn-ghost">Annuler</a>
                <button type="submit" class="btn-gold" style="border:none;cursor:pointer;">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection