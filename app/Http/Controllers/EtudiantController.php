<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'    => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email'  => 'required|email|unique:etudiants,email',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant ajouté !');
    }

    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom'    => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email'  => 'required|email|unique:etudiants,email,' . $etudiant->id,
        ]);

        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant modifié !');
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant supprimé !');
    }
}
