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
                    <th>Zona</th>
                    <th>Calle</th>
                    <th>Ciudad</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($zonas as $zona)
                <tr>
                    <td>{{$zona['zona']}}</td>
                    <td>{{$zona['calle']}}</td>
                    <td>{{$zona['ciudad']}}</td>

                    <td><a href="{{action('ZonaController@edit', $zona['id_zonas'])}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{action('ZonaController@destroy', $zona['id_zonas'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $zonas->links() }}<br><br>
            <a href="{{action('ZonaController@create')}}" class="btn btn-primary">Registro</a>
        </div>
        </body>
    </html>

@endsection
