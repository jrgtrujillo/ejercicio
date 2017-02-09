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
        @yield('contenido')
    </div>
    {!! Html::script('js/bootstrap.js')!!}
    {!! Html::script('js/jquery-3.1.1.min.js')!!}
    @yield('script')
  </body>
</html>
