@extends('layouts')

@section('content')

@if($errors->any())
<!-- Vérifie si des erreurs existent -->
<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
		<!-- Affiche chaque erreur dans une liste -->
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif

<div class="card">
	<div class="card-header">Ajouter un étudiant</div>
	<div class="card-body">
		<form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
			@csrf
			<!-- Génère un jeton CSRF pour protéger le formulaire -->
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nom de l'étudiant</label>
				<div class="col-sm-10">
					<input type="text" name="student_name" class="form-control" />
					<!-- Champ de saisie de texte pour le nom de l'étudiant -->
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email de l'étudiant</label>
				<div class="col-sm-10">
					<input type="text" name="student_email" class="form-control" />
					<!-- Champ de saisie de texte pour l'e-mail de l'étudiant -->
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Genre de l'étudiant</label>
				<div class="col-sm-10">
					<select name="student_gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<!-- Menu déroulant pour sélectionner le genre de l'étudiant -->
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image de l'étudiant</label>
				<div class="col-sm-10">
					<input type="file" name="student_image" />
					<!-- Champ de téléchargement de fichier pour l'image de l'étudiant -->
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ajouter" />
				<!-- Bouton de soumission du formulaire pour ajouter l'étudiant -->
			</div>
		</form>
	</div>
</div>

@endsection('content')
