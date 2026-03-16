<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;

class AuteurController extends Controller
{
    // Afficher la liste
    public function index()
    {
        $auteurs = Auteur::all();
        return view('auteurs.index', compact('auteurs'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('auteurs.create');
    }

    // Enregistrer en base
    public function store(Request $request)
    {
        $request->validate([
            'nom'    => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays'   => 'required|string|max:100',
        ]);

        Auteur::create($request->all());

        return redirect()->route('auteurs.index')
                         ->with('success', 'Auteur ajouté avec succès !');
    }

    // Afficher le formulaire d'édition
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    // Modifier en base
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom'    => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays'   => 'required|string|max:100',
        ]);

        $auteur->update($request->all());

        return redirect()->route('auteurs.index')
                         ->with('success', 'Auteur modifié avec succès !');
    }

    // Supprimer
    public function destroy(Auteur $auteur)
    {
        $auteur->delete();

        return redirect()->route('auteurs.index')
                         ->with('success', 'Auteur supprimé !');
    }
}
