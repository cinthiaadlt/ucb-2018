@extends('layout.principal')

@section('content')

<h1 class="text-center">Parqueos</h1>

<div class="container">

    <a class="btn btn-info mb-3" href="{{ route('parqueo.create') }}" >Registrar Parqueo</a>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Zona</th>
                <th scope="col">Direccion</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Cantidad Veiculos</th>
                <th scope="col">Foto</th>
                <th scope="col">Telefono 1</th>
                <th scope="col">Telefono 2</th>
                <th scope="col">Actividad</th>
                <th scope="col">Estado del Parqueo</th>
                <th scope="col">Validacion</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($parqueos as $parqueo)
            <tr>
                <th scope="row">{{ $parqueo->id_parqueos}}</th>
                <td><a href="{{ route('parqueo.show', $parqueo->id_parqueos) }}"> {{ $parqueo->id_zonas}}</a></td>
                <td>{{ $parqueo->direccion}}</td>
                <td>{{ $parqueo->latitud_x}}</td>
                <td>{{ $parqueo->longitud_y}}</td>
                <td>{{ $parqueo->cantidad_p}}</td>
                <td>{{ $parqueo->foto}}</td>
                <td>{{ $parqueo->telefono_contacto_1}}</td>
                <td>{{ $parqueo->telefono_contacto_2}}</td>
                <td>{{ $parqueo->estado_funcionamiento}}</td>
                <td>{{ $parqueo->cat_estado_parqueo}}</td>
                <td>{{ $parqueo->cat_validacion}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('parqueo.edit', $parqueo->id_parqueos) }}">Editar</a>

                    <form action="{{ route('parqueo.destroy', $parqueo->id_parqueos) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger mt-3" onclick="return confirm('¿Quiere borrar el parqueo?')" >Eliminar</button>

                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{ $parqueos->links() }}

</div>


@endsection
