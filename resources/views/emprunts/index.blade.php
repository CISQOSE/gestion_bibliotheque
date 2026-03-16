@extends('layouts.app')

@section('titre', 'Liste des emprunts')

@section('contenu')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des emprunts</h2>
        <a href="{{ route('emprunts.create') }}" class="btn btn-primary">
            + Nouvel emprunt
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Étudiant</th>
                <th>Livre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
                    <td>{{ $emprunt->etudiant->nom }} {{ $emprunt->etudiant->prenom }}</td>
                    <td>{{ $emprunt->livre->titre }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_retour ?? 'Non retourné' }}</td>
                    <td>
                        @if($emprunt->date_retour)
                            <span class="badge bg-success">Retourné</span>
                        @else
                            <span class="badge bg-warning text-dark">En cours</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('emprunts.destroy', $emprunt->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Supprimer cet emprunt ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Aucun emprunt pour l'instant.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection