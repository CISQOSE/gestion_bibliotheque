{{-- ========================================
     auteurs/index.blade.php
======================================== --}}
@extends('layouts.app')
@section('titre', 'Auteurs')
@section('contenu')
    <div class="page-header">
        <h1 class="page-title">Liste des <span>auteurs</span></h1>
        <a href="{{ route('auteurs.create') }}" class="btn-gold">+ Ajouter</a>
    </div>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th><th>Nom</th><th>Prénom</th><th>Pays</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($auteurs as $auteur)
                    <tr>
                        <td>{{ $auteur->id }}</td>
                        <td style="color:var(--text)">{{ $auteur->nom }}</td>
                        <td>{{ $auteur->prenom }}</td>
                        <td>{{ $auteur->pays }}</td>
                        <td>
                            <a href="{{ route('auteurs.edit', $auteur->id) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('auteurs.destroy', $auteur->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn-del" onclick="return confirm('Supprimer ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row"><td colspan="5">Aucun auteur enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection