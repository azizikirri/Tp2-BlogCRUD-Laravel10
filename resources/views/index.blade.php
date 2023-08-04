@extends('layouts')

@section('content')

@if($message = Session::get('success'))
<!-- Vérifie s'il y a un message de succès dans la session -->
<div class="alert alert-success">
    {{ $message }}
    <!-- Affiche le message de succès -->
</div>
@endif

<div class="card card-compact">
    <!-- Carte compacte pour afficher les données des étudiants -->
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Données des étudiants</b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
                <!-- Lien pour ajouter un nouvel étudiant -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @if(count($data) > 0)
            <!-- Vérifie s'il y a des données d'étudiants -->
                @foreach($data as $row)
                <!-- Parcourt chaque étudiant -->
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('images/' . $row->student_image) }}" class="card-img-top" alt="Student Image">
                            <!-- Affiche l'image de l'étudiant -->
                            <div class="card-body">
                                <h5 class="card-title"><mark style="background-color: yellow;">{{ $row->student_name }}</mark></h5>
                                <!-- Affiche le nom de l'étudiant -->
                                <p class="card-text"><b><u>Email :</u> </b>{{ $row->student_email }}</p>
                                <!-- Affiche l'e-mail de l'étudiant -->
                                <p class="card-text"><b><u> Genre :</u> </b> {{ $row->student_gender }}</p>
                                <!-- Affiche le genre de l'étudiant -->
                                <div class="d-grid gap-2">
                                    <a href="{{ route('students.show', $row->id) }}" class="btn btn-primary btn-sm">Détails</a>
                                    <!-- Lien pour afficher les détails de l'étudiant -->
                                    <a href="{{ route('students.edit', $row->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <!-- Lien pour modifier les données de l'étudiant -->
                                    <form method="post" action="{{ route('students.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Formulaire pour supprimer l'étudiant -->
                                        <input type="submit" class="btn btn-danger btn-sm" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">Aucune donnée trouvée</div>
                <!-- Affiche un message s'il n'y a pas de données d'étudiants -->
            @endif
        </div>
    </div>
</div>

@endsection
