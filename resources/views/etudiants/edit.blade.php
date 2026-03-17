@extends('layouts.app')
@section('titre', 'Modifier un étudiant')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Modifier l'<span>étudiant</span></h1>
    </div>
    <div class="form-card">
        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <div><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            </div>
        @endif
        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $etudiant->nom) }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $etudiant->prenom) }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $etudiant->email) }}" required>
            </div>
            <div class="form-actions">
                <a href="{{ route('etudiants.index') }}" class="btn-ghost">Annuler</a>
                <button type="submit" class="btn-gold" style="border:none;cursor:pointer;">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection