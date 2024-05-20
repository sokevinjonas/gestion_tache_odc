<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieTache;

class CategorieTacheController extends Controller
{
    public function index()
    {   
        $categories = CategorieTache::all();
        
        return view('categorietaches.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categorietaches.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'required',
        ]);

        CategorieTache::create($request->all());

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $categorie = CategorieTache::findOrFail($id);
        return view('categorietaches.show',compact('categorie'));
    }
    public function edit($id)
    {
        $categorie = CategorieTache::findOrFail($id);

        return view('categorietaches.edit',compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $categorie = CategorieTache::findOrFail($id);
        $request()->validate([
            'libelle' => 'required',
        ]);

        $input = $request->all();
        $categorie->update($input);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        CategorieTache::destroy($id);
        return redirect()->route('categories.index');
    }
}