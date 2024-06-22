<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{

    public function indexGestion()
    {
        $cursos = Curso::all();
        // dd($estudiantes);
        return view('cursos.gestion-curso', compact('cursos'));
    }

    public function indexReporte()
    {
        //
        return view('cursos.reporte-curso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'curso' => 'required|numeric',
            'paralelo' => 'required|string|max:1',
        
        ], [
            'curso.required' => 'El curso es obligatorio.',
            'paralelo.required' => 'El paralelo es obligatorio.',
        ]);

        // Crear un nuevo curso
        $curso = new Curso([
            'curso' => $request->input('curso'),
            'paralelo' => $request->input('paralelo'),
        ]);

        // Guardar el curso en la base de datos
        $curso->save();

        // Redirigir a la ruta de reporte de curso con un mensaje de éxito
        return redirect()->route('gestion-curso')->with('success', 'Curso registrado exitosamente');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $curso = Curso::findOrFail($id);

        return view('cursos.editar-curso', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'curso' => 'required|numeric',
            'paralelo' => 'required|string|max:1',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->curso = $request->input('curso');
        $curso->paralelo = $request->input('paralelo');
  
        $curso->save();

        return redirect()->route('gestion-curso')->with('success', 'Curso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Buscar el curso por ID y eliminarlo
        $curso = Curso::findOrFail($id);
        $curso->delete();

        // Redirigir a la lista de curso con un mensaje de éxito
        return redirect()->route('gestion-curso')->with('success', 'Curso eliminado exitosamente');
    }
}
