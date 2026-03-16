@extends('layouts.app')

@section('titre', 'Liste des livres')

@section('contenu')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des livres</h2>
        <a href="{{ route('livres.create') }}" class="btn btn-primary">
            + Ajouter un livre
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Date de publication</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->date_publication }}</td>
                    <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                    <td>
                        <a href="{{ route('livres.edit', $livre->id) }}"
                           class="btn btn-sm btn-warning btn-action">
                            Modifier
                        </a>

                        <form action="{{ route('livres.destroy', $livre->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-action"
                                onclick="return confirm('Supprimer ce livre ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucun livre pour l'instant.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection