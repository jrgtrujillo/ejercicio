@extends('layout.index')
@section('contenido')
  <div class="row">
    <div class="col-xs-6 col-sm-4">
      <a class="btn btn-primary" href="usuario/create" role="button">Agregar</a>
    </div>
    <div class="col-xs-6 col-sm-4">
    </div>
  </div>
  <div class="row">
    <table class="table">
      <thead>
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Correo</th>
        <th>Accion</th>
      </thead>
      @foreach($usuarios as $usuario)
      <tbody>
        <td>{{$usuario->nombre}}</td>
        <td>{{$usuario->id_ciudad}}</td>
        <td>{{$usuario->correo}}</td>
        <td>
          {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = [$usuario->id], $attributes = ['class'=>'btn btn-primary'])!!}
          {!!Form::open(['route'=>['usuario.update', $usuario->id], 'method'=>'DELETE'])!!}
          {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
          {!!Form::close()!!}
        </td>
      </tbody>
      @endforeach
    </table>
  </div>
@endsection
