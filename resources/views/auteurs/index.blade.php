@extends('layouts.app')

@section('titre', 'Liste des auteurs')

@section('contenu')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des auteurs</h2>
        <a href="{{ route('auteurs.create') }}" class="btn btn-primary">
            + Ajouter un auteur
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->id }}</td>
                    <td>{{ $auteur->nom }}</td>
                    <td>{{ $auteur->prenom }}</td>
                    <td>{{ $auteur->pays }}</td>
                    <td>
                        <a href="{{ route('auteurs.edit', $auteur->id) }}"
                           class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('auteurs.destroy', $auteur->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Supprimer cet auteur ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucun auteur pour l'instant.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection