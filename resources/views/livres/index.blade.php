@extends('layouts.app')

@section('titre', 'Livres')

@section('contenu')

    <div class="page-header">
        <h1 class="page-title">Liste des <span>livres</span></h1>
        <a href="{{ route('livres.create') }}" class="btn-gold">+ Ajouter</a>
    </div>

    <div class="table-wrap">
        <table class="data-table">
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
                        <td style="color:var(--text)">{{ $livre->titre }}</td>
                        <td>{{ $livre->date_publication }}</td>
                        <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                        <td>
                            <a href="{{ route('livres.edit', $livre->id) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-del"
                                    onclick="return confirm('Supprimer ce livre ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="5">Aucun livre enregistré pour l'instant.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection