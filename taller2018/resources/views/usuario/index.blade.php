@extends('layout.principal')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <!-- th>ID</th-->
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Username</th>
        <th>Nacionalidad</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($usuarios as $usuario)
      <tr>
        <!--td>{{$usuario['id_usuarios']}}</td-->
        <td>{{$usuario['primer_nombre']}}</td>
        <td>{{$usuario['primer_apellido']}}</td>
        <td>{{$usuario['nombre_usuario']}}</td>
        <td>{{$usuario['nacionalidad']}}</td>
        
        <td><a href="{{action('UsuarioController@edit', $usuario['id_usuarios'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('UsuarioController@destroy', $usuario['id_usuarios'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $usuarios->links() }}<br><br>
  <a href="{{action('UsuarioController@create')}}" class="btn btn-primary">Registro</a>
  </div>
  </body>
</html>
@endsection