@extends('layouts.app')

@section('titre', 'Liste des étudiants')

@section('contenu')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des étudiants</h2>
        <a href="{{ route('etudiants.create') }}" class="btn btn-primary">
            + Ajouter un étudiant
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}"
                           class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Supprimer cet étudiant ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucun étudiant pour l'instant.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection