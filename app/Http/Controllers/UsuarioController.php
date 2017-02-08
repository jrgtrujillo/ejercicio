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
    public function index()
    {
      $usuarios = \App\Usuario::all();
      $municipio = \App\Ciudad::lists('nombre', 'id');
      foreach ($usuarios as $user) {
        $user->id_ciudad = $municipio[$user->id_ciudad];
      }
      return view('user.index',compact('usuarios'));
    }

    public function listing(){
      $paises = \App\Pais::all();
      return response()->json(
        $paises->toArray()
      );
    }

    public function obtenerCiudades(Request $request, $id){
      if($request->ajax()){
        $ciudades = \App\Ciudad::ciudades($id);
        return response()->json($ciudades);
      }
    }

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
    public function edit($id)
    {
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
    public function update(ActualizarUsuarioRequest $request, $id)
    {
      $usuarios = \App\Usuario::find($id);
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
    public function destroy($id)
    {
      \App\Usuario::destroy($id);
      return redirect('/usuario');
    }
}
