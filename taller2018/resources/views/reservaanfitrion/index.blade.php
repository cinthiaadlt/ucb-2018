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
                                <th>Nombre del Cliente</th>
                                <th>Direccion del Parqueo</th>
                                <th>Zona</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th>Precio Total</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reservasanfitrion as $reserva)
                            @if($reserva->dia_reserva == date("Y-m-d"))
                            <tr>
                                <td>@foreach($pq2 as $p)
                                    @if($p->id == $reserva->id_user){{ $p->sur_name }}&nbsp;{{ $p->last_name }}@endif
                                    @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_parqueos == $reserva->id_parqueos){{ $p1->direccion }} @endif
                                    <?php $aux = $p1->id_zonas?>
                                    @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                        @if($p1->id_parqueos == $reserva->id_parqueos)<?php $aux = $p1->id_zonas?>{{$pq3[$aux-1]->zona}} @endif
                                        @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_parqueos == $reserva->id_parqueos){{ number_format((float)$p1->tarifa_hora_normal, 2, '.', '') }}Bs @endif
                                    @endforeach</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>{{number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs</td>
                                <td>
                                    <form action="{{action('ReservaAnfitrionController@destroy', $reserva->id_reservas)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Quiere borrar la reserva?')">Eliminar/button>
                                    </form>
                                </td>
                            </tr>
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
                                <th>Nombre del Cliente</th>
                                <th>Direccion del Parqueo</th>
                                <th>Zona</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th>Precio Total</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reservasanfitrion as $reserva)
                            @if($reserva->dia_reserva > date("Y-m-d"))
                            <tr>
                                <td>{{$reserva->dia_reserva}}</td>
                                <td>@foreach($pq2 as $p)
                                    @if($p->id == $reserva->id_user){{ $p->sur_name }}&nbsp;{{ $p->last_name }}@endif
                                    @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_parqueos == $reserva->id_parqueos){{ $p1->direccion }} @endif
                                    <?php $aux = $p1->id_zonas?>
                                    @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                        @if($p1->id_parqueos == $reserva->id_parqueos)<?php $aux = $p1->id_zonas?>{{$pq3[$aux-1]->zona}} @endif
                                        @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_parqueos == $reserva->id_parqueos){{ number_format((float)$p1->tarifa_hora_normal, 2, '.', '') }}Bs @endif
                                    @endforeach</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>{{number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs</td>
                                <td>
                                    <form action="{{action('ReservaAnfitrionController@destroy', $reserva->id_reservas)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Quiere borrar la reserva?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{action('ReservaAnfitrionController@create')}}" class="btn btn-primary">Reservas Pasadas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
