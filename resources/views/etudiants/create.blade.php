@extends('layouts.app')
@section('titre', 'Ajouter un étudiant')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Nouvel <span>étudiant</span></h1>
    </div>
    <div class="form-card">
        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <div><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            </div>
        @endif
        <form action="{{ route('etudiants.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required placeholder="Diallo">
            </div>
            <div class="mb-4">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required placeholder="Moussa">
            </div>
            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="moussa@email.com">
            </div>
            <div class="form-actions">
                <a href="{{ route('etudiants.index') }}" class="btn-ghost">Annuler</a>
                <button type="submit" class="btn-gold" style="border:none;cursor:pointer;">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection