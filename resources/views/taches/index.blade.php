@extends('includes.home')
@section('content')
    <div class="container mt-5">
        <h2>Liste des Tâches</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">État</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie de tâche</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($taches as  $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->titre }}</td>
                        <td>{{ $data->date_debut }}</td>
                        <td>{{ $data->date_fin }}</td>
                        <td>{{ $data->etat }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            {{ $data->categorieTache ? $data->categorieTache->libelle : 'rien' }}
                        </td>
                        <td>
                            <a href="edit.html" class="btn btn-primary btn-sm">Modifier</a>
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucun enregistrement</td>
                    </tr>
                @endforelse
                <!-- Fin de l'exemple -->
                <!-- Répétez ce bloc pour chaque tâche -->
            </tbody>
        </table>
        <a href="{{ route('taches.create') }}" class="btn btn-success">Ajouter une Tâche</a>
    </div>
@endsection
