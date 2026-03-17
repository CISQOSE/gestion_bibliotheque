@extends('layouts.app')

@section('titre', 'Inscription')

@section('contenu')
<div class="auth-wrap">
    <div class="auth-card">

        <div class="auth-logo">Bibliothèque</div>
        <div class="auth-sub">Créer un compte</div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Nom complet</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required placeholder="Jean Dupont">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Adresse email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required placeholder="votre@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required placeholder="Minimum 6 caractères">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation"
                       class="form-control" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-submit">
                Créer le compte
            </button>
        </form>

        <div class="auth-footer">
            Déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </div>

    </div>
</div>
@endsection