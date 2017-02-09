@extends('layout/login')
@section('contenido')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}" class='form-control'>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class='form-control'>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class='form-control'>
        </div>

        <div class="form-group">
            <label for="">Confirmar Password</label>
            <input type="password" name="password_confirmation" class='form-control'>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
  </div>
</div>
@endsection
@section('script')
{!! Html::script('js/script.js')!!}
@endsection
