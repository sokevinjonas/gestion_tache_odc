<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use App\Models\CategorieTache;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    public function index()
    {   
        // $taches = Tache::all();
        $taches = Tache::with('categorieTache')->get();
        return view('taches.index', compact('taches'));
    }

    public function create()
    {   
        $categorieTache = CategorieTache::all();
        return view('taches.create', compact('categorieTache'));
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'titre' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'etat' => 'required|string',
            'description' => 'nullable|string',
            'categorietache_id' => 'required|integer',
        ]);
        $user = Auth::user();
        $tache = new Tache();
        $tache->titre = $data['titre'];
        $tache->date_debut = $data['date_debut'];
        $tache->date_fin = $data['date_fin'];
        $tache->etat = $data['etat'];
        $tache->description = $data['description'];
        $tache->user_id = $user->id;
        $tache->categorietache_id = $data['categorietache_id'];

        $tache->save();

        return redirect()->route('taches.index');
    }


    public function edit($id)
    {
        $taches = Tache::findOrFail($id);

        return view('taches.edit',compact('taches'));
    }

    public function update($id)
    {
        $taches = Tache::findOrFail($id);
        $request->validate([
            'titre' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'etat' => 'required',
            'description' => 'nulllable',
            'categorietache_id' => 'required',
        ]);

        return redirect()->route('taches.index');
    }

    public function destroy($id)
    {
        Tache::destroy($id);
        return redirect()->route('taches.index');
    }
}