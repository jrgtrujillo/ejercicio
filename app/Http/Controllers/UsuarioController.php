<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CrearUsuarioRequest;
use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Controllers\Controller;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Funcion que lista los usuarios creados
    public function index()
    {
      $usuarios = \App\Usuario::all();
      // Lista los municipios para enviar el nombre del municipio en la consulta de usuarios
      $municipio = \App\Ciudad::lists('nombre', 'id');
      foreach ($usuarios as $user) {
        $user->id_ciudad = $municipio[$user->id_ciudad];
      }
      return view('user.index',compact('usuarios'));
    }

    // Funcion para listar paises que son cargados en el formulario de registro de usuarios
    public function listing(){
      $paises = \App\Pais::all();
      return response()->json(
        $paises->toArray()
      );
    }

    // Lista las ciudades por departamento cargados en el formulario de registro de usuarios
    public function obtenerCiudades(Request $request, $id){
      if($request->ajax()){
        $ciudades = \App\Ciudad::ciudades($id);
        return response()->json($ciudades);
      }
    }

    // Lista los departamentos por pais cargados en el formulario de registro de usuarios
    public function obtenerDepartamentos(Request $request, $id){
      if($request->ajax()){
        $ciudades = \App\Departamento::departamentos($id);
        return response()->json($ciudades);
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Carga la vista para crear usuarios
    public function create()
    {
        return view('user.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // Funcion para crear usuarios validados en el Request CrearUsuarioRequest
    public function store(CrearUsuarioRequest $request)
    {
      \App\Usuario::create([
        'nombre'=>$request['nombre'],
        'id_ciudad'=>$request['ciudad'],
        'correo'=>$request['correo']
      ]);

      return redirect('/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // Funcion para consultar los datos de un usuario
     // Carga el formulario para editar usuarios
    public function edit($id)
    {
      // Consulta los datos de usuario por id y son enviados a la vista de editar usuario
      $usuarios = \App\Usuario::find($id);
      return view('user.editar', ['usuario'=>$usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // Funcion para actualizar usuario validada por el request ActualizarUsuarioRequest
    public function update(ActualizarUsuarioRequest $request, $id)
    {
      // Consutla de usuario por identificacion
      $usuarios = \App\Usuario::find($id);
      // Se envian los datos a actualizar
      $usuarios->fill($request->all());
      $usuarios->save();

      return redirect('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Funcion para eliminar Usuarios
    public function destroy($id)
    {
      \App\Usuario::destroy($id);
      return redirect('/usuario');
    }
}
