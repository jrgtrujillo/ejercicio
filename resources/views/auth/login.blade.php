@extends('layout/login')
@section('contenido')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div class="form-group">

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="form-group">
          <a href="register" class="btn btn-primary">Registrar</a>
        </div>
    </form>
  </div>
</div>
@endsection
