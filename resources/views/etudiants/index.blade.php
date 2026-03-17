@extends('layouts.app')
@section('titre', 'Étudiants')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Liste des <span>étudiants</span></h1>
        <a href="{{ route('etudiants.create') }}" class="btn-gold">+ Ajouter</a>
    </div>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr><th>#</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td style="color:var(--text)">{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn-del" onclick="return confirm('Supprimer ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row"><td colspan="5">Aucun étudiant enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection