@extends('layouts')
<!--
    Indique que cette vue étend un modèle de mise en page parent appelé 'layouts'
-->

@section('content')
<!--
    Définit une section nommée 'content' qui sera remplie par le contenu spécifique de cette vue
-->

<div class="card">
    <!--
 Définit une carte pour afficher le formulaire de modification-->

	<div class="card-header">Modifier Student</div>
	<div class="card-body">
		<form method="post" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
			@csrf <!--
                Génère un jeton CSRF (Cross-Site Request Forgery) pour protéger le formulaire contre les attaques CSRF
            -->
			@method('PUT')<!--
                Spécifie la méthode HTTP PUT pour la soumission du formulaire, utilisée pour mettre à jour les données de l'étudiant
            -->
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Student Name</label>
              <!-- Crée un champ de saisie de texte pour le nom de l'étudiant et pré-remplit sa valeur avec la valeur actuelle du nom de l'étudiant-->
				<div class="col-sm-10">
					<input type="text" name="student_name" class="form-control" value="{{ $student->student_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Student Email</label>
				<div class="col-sm-10">
                    <!--
                    Crée un champ de saisie de texte pour l'e-mail de l'étudiant et pré-remplit sa valeur avec la valeur actuelle de l'e-mail de l'étudiant-->
					<input type="text" name="student_email" class="form-control" value="{{ $student->student_email }}" />

				</div>
			</div>
			<div class="row mb-4">
                <!--Crée un menu déroulant pour sélectionner le genre de l'étudiant.-->
				<label class="col-sm-2 col-label-form">Student Gender</label>
				<div class="col-sm-10">
					<select name="student_gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Student Image</label>
				<div class="col-sm-10">
					<input type="file" name="student_image" />
					<br />
					<img src="{{ asset('images/' . $student->student_image) }}" width="100" class="img-thumbnail" /><!--Stocke la valeur de l'image de l'étudiant dans un champ masqué pour la soumission du formulaire-->
					<input type="hidden" name="hidden_student_image" value="{{ $student->student_image }}" />
				</div>
			</div>
			<div class="text-center">
                <!-- Stocke l'ID de l'étudiant dans un champ masqué pour la soumission du formulaire-->
				<input type="hidden" name="hidden_id" value="{{ $student->id }}" />
				<input type="submit" class="btn btn-primary" value="Modifier" />
                <!--Affiche le bouton de soumission du formulaire pour mettre à jour les données de l'étudiant-->
			</div>
		</form>
	</div>
</div>
<script>

        //Définit la valeur sélectionnée du genre de l'étudiant en utilisant la valeur actuelle du genre de l'étudiant

document.getElementsByName('student_gender')[0].value = "{{ $student->student_gender }}";
</script>

@endsection('content')
