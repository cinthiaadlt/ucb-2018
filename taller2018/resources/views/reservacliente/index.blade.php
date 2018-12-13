@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Reservas del <?php date_default_timezone_set('America/La_Paz'); echo date("d-m-Y")?>:</h3>
                    </div>

                    <div class="table-responsive">

                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif

                        <table class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th>Contacto</th>
                                <th>Parqueo</th>
                                <th>Zona</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th>Total a pagar</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($prueba as $reserva)
                            @if($reserva->dia_reserva == date("Y-m-d") )
                                @if($reserva->estado_reserva =='2')
                            <tr>
                                <td>{{$reserva->telefono_contacto_1}}</td>
                                <td>{{ $reserva->direccion }}</td>
                                <td>{{$reserva->zona}}</td>
                                <td>{{ number_format((float)$reserva->tarifa_hora_normal, 2, '.', '') }}Bs</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>{{ number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs</td>
                                <td>
                                    <form action="{{action('ReservaClienteController@destroy', $reserva->id_reservas)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Quiere cancelar la reserva?')">Cancelar</button>
                                        <a class="btn btn-sm btn-facebook" href="{{route('reservacliente.show', $reserva->id_parqueos)}}">Denunciar</a>
                                        <a class="btn btn-sm btn-warning" href="{{action('ReservaClienteController@finalizar',$reserva->id_reservas)}}">Finalizar</a>
                                    </form>



                                </td>
                            </tr>
                                @endif
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                        <div class="card-header border-0">
                            <h3 class="mb-0">Reservas Futuras:</h3>
                        </div>
    
                        <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Contacto</th>
                                <th>Parqueo</th>
                                <th>Zona</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($prueba as $reserva)
                            @if($reserva->dia_reserva > date("Y-m-d"))
                            <tr>
                                <td>{{$reserva->dia_reserva}}</td>
                                <td>{{$reserva->telefono_contacto_1}}</td>
                                <td>{{ $reserva->direccion }}</td>
                                <td>{{$reserva->zona}}</td>
                                <td>{{ number_format((float)$reserva->tarifa_hora_normal, 2, '.', '') }}Bs</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>{{ number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs</td>
                                <td>
                                    <form action="{{action('ReservaClienteController@destroy', $reserva->id_reservas)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Quiere cancelar la reserva?')">Cancelar</button>

                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{action('ReservaClienteController@create')}}" class="btn btn-primary">Reservas Pasadas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
