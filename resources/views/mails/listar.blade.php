@extends('layout.index')
@section('contenido')
  <div class="row">
    <table class="table">
      <thead>
        <th>Enviar a:</th>
        <th>Asunto</th>
        <th>Estado</th>
        <th>Remitente</th>
      </thead>
      @foreach($correos as $correo)
      <tbody>
        <td>{{$correo->destino}}</td>
        <td>{{$correo->asunto}}</td>
        <td>
          @if($correo->enviado == 0)
          No Enviado
          @else
          Enviado
          @endif
        </td>
        <td>{{$correo->remite}}</td>
      </tbody>
      @endforeach
    </table>
  </div>
  <a href="/enviar" class="btn btn-primary">Enviar Correos</a>
@endsection
