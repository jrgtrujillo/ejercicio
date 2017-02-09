<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\CrearCorreoRequest;
use App\Http\Controllers\Controller;
use App\Jobs\EnviarCorreo;


class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // Metodo para listar los Correos y su estado
    public function index()
    {
      $correos = \App\Correo::all();
      return view('mails.listar',compact('correos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Muestra formulario para el envio de correos
    public function create()
    {
        return view('mails/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // Registrar datos para enviar correo, vienen desde la vista mails/form
     // Los datos son validados por el Request CrearCorreoRequest
     // Para los datos de remitente se utilizan los datos de autenticacion
    public function store(CrearCorreoRequest $request)
    {
      $usuario = Auth::user();
      \App\Correo::create([
        'destino'=>$request['destino'],
        'mensaje'=>$request['mensaje'],
        'asunto'=>$request['asunto'],
        'id_user'=>$usuario->id,
        'enviaddo'=>'0',
        'remite'=>$usuario->email,
      ]);

      return view('mails/form')->with('mensaje', 'Correo enviado correctamente');
    }

    // Funcion que se encarga de ejecutar el Job EnviarCorreo
    public function enviarCorreos(Request $request){
      // Listar los correos que se encuentran en enviado=0
      $tcorreos = \App\Correo::noenviados();
      // Iteracion de los correos para enviar los datos del correo al Job EnviarCorreo
      foreach ($tcorreos as $correo) {
        $this->dispatch(new EnviarCorreo($correo));
      }
      // Listar correos para verificar el nuevo estado
      $correos = \App\Correo::all();
      return view('mails.listar',compact('correos'));

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
        //
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
    }
}
