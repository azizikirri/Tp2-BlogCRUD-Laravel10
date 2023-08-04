@extends('layouts')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détails de l'étudiant</b></div>
			<div class="col col-md-6">
				<a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">Voir tous</a>
				<!-- Lien pour afficher tous les étudiants -->
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Nom de l'étudiant</b></label>
			<div class="col-sm-10">
				{{ $student->student_name }}
				<!-- Affiche le nom de l'étudiant -->
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Email de l'étudiant</b></label>
			<div class="col-sm-10">
				{{ $student->student_email }}
				<!-- Affiche l'email de l'étudiant -->
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Genre de l'étudiant</b></label>
			<div class="col-sm-10">
				{{ $student->student_gender }}
				<!-- Affiche le genre de l'étudiant -->
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Image de l'étudiant</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $student->student_image) }}" width="200" class="img-thumbnail" />
				<!-- Affiche l'image de l'étudiant -->
			</div>
		</div>
	</div>
</div>

@endsection('content')
