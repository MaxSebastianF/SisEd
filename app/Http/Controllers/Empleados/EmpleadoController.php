<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //
    public function gestion(){

        
        return view('empleados.gestionEmpleados');
    }

    public function reportes(){

        return view('empleados.reportesEmpleados');
    }
}
