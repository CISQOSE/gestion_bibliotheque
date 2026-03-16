@extends('layouts.app')

@section('titre', 'Ajouter un auteur')

@section('contenu')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Ajouter un auteur</h2>

            {{-- Affichage des erreurs de validation --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auteurs.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control"
                           value="{{ old('nom') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control"
                           value="{{ old('prenom') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pays</label>
                    <input type="text" name="pays" class="form-control"
                           value="{{ old('pays') }}" required>
                </div>

                <a href="{{ route('auteurs.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>

            </form>
        </div>
    </div>

@endsection