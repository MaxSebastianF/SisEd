<?php

namespace App\Http\Controllers\Tutores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //
    public function gestion(){

        
        return view('tutores.gestionTutores');
    }

    public function reportes(){

        return view('tutores.reportesTutores');
    }
}
