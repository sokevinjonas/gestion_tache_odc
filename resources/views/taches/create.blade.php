@extends('includes.home')
@section('content')
    <div class="container mt-5">
        <h2>Formulaire</h2>
        <form action="{{ route('taches.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin">
            </div>
            <div class="form-group">
                <label for="etat">État</label>
                <select class="form-control" id="etat" name="etat">
                    <option value="">Sélectionner un état</option>
                    <option value="en cours">En cours</option>
                    <option value="terminé">Terminé</option>
                    <option value="annulé">Annulé</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="categorietache_id">Catégorie de tâche</label>
                <select class="form-control" id="categorietache_id" name="categorietache_id">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categorieTache as $category)
                        <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                    @endforeach
                    <!-- Ajoutez d'autres options selon vos besoins -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    @endsection
