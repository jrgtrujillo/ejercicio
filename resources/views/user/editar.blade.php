@extends('layout.index')
@section('contenido')
@if(count($errors)> 0)
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <ul>
    @foreach($errors->all() as $error)
    <li>{!!$error!!}</li>
    @endforeach
  </ul>
</div>
@endif
  {!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'PUT'])!!}
  <div class="form-group">
    {!!Form::label('Nombre:')!!}
    {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre de Cliente'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('E-mail:')!!}
    {!!Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'E-mail'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Pais:')!!}
    {!!Form::select('pais', [], null, ['id'=>'pais', 'class'=>'form-control', 'placeholder'=>'Seleccione...'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Departamento:')!!}
    {!!Form::select('departamento', [], null, ['id'=>'departamento', 'class'=>'form-control', 'placeholder'=>'Seleccione...'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Ciudad:')!!}
    {!!Form::select('id_ciudad', [], null, ['id'=>'ciudad', 'class'=>'form-control', 'placeholder'=>'Seleccione...'])!!}
  </div>
  {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
  {!!Form::close()!!}
@endsection
