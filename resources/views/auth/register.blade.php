@extends('layouts.app')

@section('titre', 'Inscription')

@section('contenu')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center">
                <h4 class="mb-0">Créer un compte</h4>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nom complet</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation"
                               class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        S'inscrire
                    </button>
                </form>

            </div>
            <div class="card-footer text-center">
                Déjà un compte ?
                <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </div>

    </div>
</div>
@endsection