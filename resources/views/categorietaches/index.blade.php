@extends('includes.home')
@section('content')
    <h1>Liste des categories</h1>

    <a href="{{ route('categories.create') }}">
        Ajouter
    </a>
    @foreach ($categories as $categorie)
        <ul>
            <li>
                {{ $categorie->libelle }}
                {{ $categorie->description }}

                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">


                    <a class="btn btn-info" href="{{ route('categories.show', $categorie->id) }}">Detail</a>
                    <a class="btn btn-primary" href="{{ route('categories.edit', $categorie->id) }}">Modifier</a>



                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Etes-vous sûr de vouloir supprimer?')">Supprimer</button>

                </form>
            </li>
        </ul>
    @endforeach
@endsection
