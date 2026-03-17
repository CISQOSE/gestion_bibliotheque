@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
<div class="auth-wrap">
    <div class="auth-card">

        <div class="auth-logo">Bibliothèque</div>
        <div class="auth-sub">Espace de gestion</div>

        @if($errors->any())
            <div class="alert-app alert-danger-app mb-4">
                <span>✕</span> {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert-app alert-success-app mb-4">
                <span>✦</span> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Adresse email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" autofocus required
                       placeholder="votre@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required placeholder="••••••••">
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" name="remember"
                       class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="btn-submit">
                Se connecter
            </button>
        </form>

        <div class="auth-footer">
            Pas encore de compte ?
            <a href="{{ route('register') }}">Créer un compte</a>
        </div>

    </div>
</div>
@endsection