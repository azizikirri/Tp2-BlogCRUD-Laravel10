<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * Affiche une liste des ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Récupère les données des étudiants les plus récents et les pagine par groupe de 5
        $data = Student::latest()->paginate(5);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     *Affiche le formulaire de création d'une nouvelle ressource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Stocke une nouvelle ressource dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'student_name'          =>  'required',
            'student_email'         =>  'required|email|unique:students',
            'student_image'         =>  'required'
        ]);
      // Génère un nom de fichier unique en utilisant le timestamp et l'extension de l'image
        $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();
        // Déplace l'image téléchargée vers le dossier public/images
        request()->student_image->move(public_path('images'), $file_name);
        // Crée une nouvelle instance de Student
        $student = new Student;
        // Remplit les attributs de l'étudiant avec les valeurs du formulaire
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_gender = $request->student_gender;
        $student->student_image = $file_name;
        // Enregistre l'étudiant dans la base de données
        $student->save();
        // Redirige vers la liste des étudiants avec un message de succès
        return redirect()->route('students.index')->with('success', 'Student Added successfully.');
    }
    /**
     * Affiche une ressource spécifique.

     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    /**
     * Affiche le formulaire de modification d'une ressource spécifique.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Met à jour une ressource spécifique dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // Valide les données du formulaire de mise à jour

        $request->validate([
            'student_name'      =>  'required',
            'student_email'     =>  'required|email',
            'student_image'     =>  'image'
        ]);

        // Récupère le nom de l'image actuellement enregistrée

        $student_image = $request->hidden_student_image;

        if($request->student_image != '')  // Vérifie si une nouvelle image a été téléchargée
        {
            // Génère un nom de fichier unique en utilisant le timestamp et l'extension de la nouvelle image
            //$student_image = uniqid().'.'.$request->student_image->extension();
            $student_image = time() . '.' . request()->student_image->getClientOriginalExtension();
            // Déplace la nouvelle image téléchargée vers le dossier public/images
            request()->student_image->move(public_path('images'), $student_image);
        }
        // Récupère l'étudiant à mettre à jour en utilisant l'ID caché dans le formulaire
        $student = Student::find($request->hidden_id);
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_gender = $request->student_gender;
        $student->student_image = $student_image;
        $student->save();// Enregistre les modifications de l'étudiant dans la base de données
        return redirect()->route('students.index')->with('success', 'Student Data has been updated successfully');// Redirige vers la liste des étudiants avec un message de succès
    }
    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // Supprime l'étudiant de la base de données
         $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Data deleted successfully');// Redirige vers la liste des étudiants avec un message de succès

    }
}
