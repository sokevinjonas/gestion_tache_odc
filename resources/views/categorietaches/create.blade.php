@extends('includes.home')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des taches</title>
    </head>

    <body>
        <h1>Categorie de taches</h1>

        <form action=" {{ route('categories.store') }} " method=POST>
            @csrf

            <label for="">Libelle</label>
            <input type="text" name="libelle" required>

            <label for="">Description</label>
            <textarea name="description" id="" cols="5" rows="5"></textarea>

            <button type="submit">Enregistrer</button>

        </form>
    </body>

    </html>
@endsection
