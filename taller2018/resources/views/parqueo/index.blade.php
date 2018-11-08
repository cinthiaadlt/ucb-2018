@extends('layout.principal')

@section('content')
<div class="content">
        <br />
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
         @endif
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Zona</th>
            <th>Direccion</th>
            <th>Capacidad</th>
            <th>Imagen</th>
            <th>Contacto</th>
            <th>Estado</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($parqueos as $parqueo)
          <tr>
            <td>@foreach($pq2 as $p)
                @if($p->id_zonas == $parqueo['id_zonas']){{ $p->zona }}@endif
                @endforeach</td>
            <td>{{$parqueo['direccion']}}</td>
            <td>{{$parqueo['cantidad_p']}}</td>
            <td>{{$parqueo['foto']}}</td>
            <td><option>{{$parqueo['telefono_contacto_1']}}</option><option>{{$parqueo['telefono_contacto_2']}}</option></td>
            <td>@if($parqueo['estado_funcionamiento'] == '0') Invalido @endif</td>
            
            <td><a href="{{action('ParqueoController@edit', $parqueo['id_parqueos'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('ParqueoController@destroy', $parqueo['id_parqueos'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{action('ParqueoController@create')}}" class="btn btn-primary">Registro</a>
      </div>


@endsection
