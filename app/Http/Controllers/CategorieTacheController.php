<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieTacheController extends Controller
{
    public function index()
    {
        return view('categorietaches.index');
    }
}