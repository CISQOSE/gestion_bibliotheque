@extends('layouts.app')
@section('titre', 'Ajouter un auteur')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Nouvel <span>auteur</span></h1>
    </div>
    <div class="form-card">
        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <div><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            </div>
        @endif
        <form action="{{ route('auteurs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required placeholder="Hugo">
            </div>
            <div class="mb-4">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required placeholder="Victor">
            </div>
            <div class="mb-4">
                <label class="form-label">Pays</label>
                <input type="text" name="pays" class="form-control" value="{{ old('pays') }}" required placeholder="France">
            </div>
            <div class="form-actions">
                <a href="{{ route('auteurs.index') }}" class="btn-ghost">Annuler</a>
                <button type="submit" class="btn-gold" style="border:none;cursor:pointer;">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection