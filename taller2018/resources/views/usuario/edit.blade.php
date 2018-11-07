<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ABM Usuarios Laravel </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Editar</h2><br  />
        <form method="post" action="{{action('UsuarioController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="primer_nombre">Nombre:</label>
            <input type="text" class="form-control" name="primer_nombre" value="{{$usuario->primer_nombre}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="primer_apellido">Apellido</label>
              <input type="text" class="form-control" name="primer_apellido" value="{{$usuario->primer_apellido}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="nombre_usuario">Username:</label>
              <input type="text" class="form-control" name="nombre_usuario" value="{{$usuario->nombre_usuario}}">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="password">Password:</label>
                <input type="text" class="form-control" name="password" value="{{$usuario->password}}">
              </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                  <div class="form-group col-md-4">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" class="form-control" name="nacionalidad" value="{{$usuario->nacionalidad}}">
                  </div>
                </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>