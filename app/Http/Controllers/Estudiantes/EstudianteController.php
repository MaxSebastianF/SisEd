<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    //
    public function gestion(){

        return view('estudiantes.gestionEstudiantes');
    }

    public function reportes(){

        return view('estudiantes.reportesEstudiantes');
    }
}
