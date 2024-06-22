<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class TutoresController extends Controller
{

    public function indexGestion()
    {
        $tutores = Tutor::all();
        // dd($estudiantes);
        return view('tutores.gestion-tutores', compact('tutores'));
    }

    public function indexReporte()
    {
        //
        return view('tutores.reporte-tutores');
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
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'email' => 'required|email|max:30',
            'telefono' => 'required|numeric',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.numeric' => 'El teléfono debe ser un número.',
        ]);

        // Crear un nuevo tutor
        $tutor = new Tutor([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
        ]);

        // Guardar el tutor en la base de datos
        $tutor->save();

        // Redirigir a la ruta de reporte de tutores con un mensaje de éxito
        return redirect()->route('gestion-tutores')->with('success', 'Tutor registrado exitosamente');
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
        $tutor = Tutor::findOrFail($id);

        return view('tutores.editar-tutor', compact('tutor'));
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
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'email' => 'required|email|max:30',
            'telefono' => 'required|numeric',
        ]);

        $tutor = Tutor::findOrFail($id);
        $tutor->nombre = $request->input('nombre');
        $tutor->apellido = $request->input('apellido');
        $tutor->email = $request->input('email');
        $tutor->telefono = $request->input('telefono');
        $tutor->save();

        return redirect()->route('gestion-tutores')->with('success', 'Tutor actualizado exitosamente');
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
        // Buscar el tutor por ID y eliminarlo
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        // Redirigir a la lista de tutores con un mensaje de éxito
        return redirect()->route('gestion-tutores')->with('success', 'Tutor eliminado exitosamente');
    }
}
