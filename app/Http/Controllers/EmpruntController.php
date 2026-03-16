<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\Etudiant;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with(['livre', 'etudiant'])->get();
        return view('emprunts.index', compact('emprunts'));
    }

    public function create()
    {
        $livres    = Livre::all();
        $etudiants = Etudiant::all();
        return view('emprunts.create', compact('livres', 'etudiants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livre_id'     => 'required|exists:livres,id',
            'etudiant_id'  => 'required|exists:etudiants,id',
            'date_emprunt' => 'required|date',
            'date_retour'  => 'nullable|date|after:date_emprunt',
        ]);

        Emprunt::create($request->all());

        return redirect()->route('emprunts.index')
                         ->with('success', 'Emprunt enregistré !');
    }

    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return redirect()->route('emprunts.index')
                         ->with('success', 'Emprunt supprimé !');
    }
}
