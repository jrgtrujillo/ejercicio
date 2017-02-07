<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicacion</title>
    {!! Html::style('css/bootstrap.css') !!}
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> El programa
          </a>
        </div>
      </div>
    </nav>
    <div class="contaniner">
      <div class="col-xs-6 col-md-4">
        <div class="list-group">
          <a href="/usuario" class="list-group-item">Usuarios</a>
          <a href="#" class="list-group-item">Ciudad</a>
          <a href="/auth/logout" class="list-group-item">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-8">
        @yield('contenido')
      </div>
    </div>
    {!! Html::script('js/bootstrap.js')!!}
    {!! Html::script('js/jquery-3.1.1.min.js')!!}
    {!! Html::script('js/script.js')!!}
  </body>
</html>
