@extends('layouts.app')
@section('titre', 'Emprunts')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Liste des <span>emprunts</span></h1>
        <a href="{{ route('emprunts.create') }}" class="btn-gold">+ Nouvel emprunt</a>
    </div>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th><th>Étudiant</th><th>Livre</th>
                    <th>Date d'emprunt</th><th>Date de retour</th>
                    <th>Statut</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emprunts as $emprunt)
                    <tr>
                        <td>{{ $emprunt->id }}</td>
                        <td style="color:var(--text)">{{ $emprunt->etudiant->nom }} {{ $emprunt->etudiant->prenom }}</td>
                        <td>{{ $emprunt->livre->titre }}</td>
                        <td>{{ $emprunt->date_emprunt }}</td>
                        <td>{{ $emprunt->date_retour ?? '—' }}</td>
                        <td>
                            @if($emprunt->date_retour)
                                <span class="badge-status badge-returned">Retourné</span>
                            @else
                                <span class="badge-status badge-ongoing">En cours</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn-del" onclick="return confirm('Supprimer ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row"><td colspan="7">Aucun emprunt enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection