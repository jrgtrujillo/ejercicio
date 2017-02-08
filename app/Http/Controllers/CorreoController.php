<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\CrearCorreoRequest;
use App\Http\Controllers\Controller;


class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
