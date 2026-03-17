@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center">
                <h4 class="mb-0">Connexion</h4>
            </div>
            <div class="card-body p-4">

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" autofocus required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember"
                               class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Se connecter
                    </button>
                </form>

            </div>
            <div class="card-footer text-center">
                Pas de compte ?
                <a href="{{ route('register') }}">S'inscrire</a>
            </div>
        </div>

    </div>
</div>
@endsection