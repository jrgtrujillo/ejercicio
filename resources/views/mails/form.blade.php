@extends('layout/index')
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
{!!Form::open(['route'=>'mail.store', 'method'=>'POST'])!!}
<div class="form-group">
  {!!Form::label('Destino')!!}
  {!!Form::email('destino', null, ['class'=>'form-control', 'placeholder'=>'Correo de Destino'])!!}
</div>
<div class="form-group">
  {!!Form::label('asunto')!!}
  {!!Form::text('asunto', null, ['class'=>'form-control', 'placeholder'=>'Asunto'])!!}
</div>
<div class="form-group">
  {!!Form::label('Mensaje')!!}
  {!!Form::textarea('mensaje', null, ['class'=>'form-control', 'placeholder'=>'Mensaje de Correo'])!!}
</div>
{!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@endsection
