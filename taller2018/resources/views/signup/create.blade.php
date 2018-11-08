<!-- create.blade.php -->
@extends('layout.principal')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>¡Regístrate!</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Registro de Usuarios</h2><br/>
      <form method="post" action="{{url('usuarios')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="PrimerNombre">Nombre:</label>
            <input type="text" class="form-control" name="primer_nombre">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="PrimerApellido">Apellido:</label>
              <input type="text" class="form-control" name="primer_apellido">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Username">Username:</label>
              <input type="text" class="form-control" name="nombre_usuario">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="Password">Password:</label>
                <input type="password" class="form-control" name="password">
              </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                  <div class="form-group col-md-4">
                    <label for="Nacionalidad">Nacionalidad:</label>
                    <input type="text" class="form-control" name="nacionalidad">
                  </div>
                </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
         });
    </script>
  </body>
</html>
@endsection
