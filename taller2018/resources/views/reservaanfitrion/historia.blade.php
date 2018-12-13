@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Historial de Reservas:</h3>
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
                                <th>Cliente</th>
                                <th>Fecha Reserva</th>
                                <th>Direccion</th>
                                <th>Zona</th>
                                <th>Precio Total</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th>Estado de Reserva</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php date_default_timezone_set('America/La_Paz');
                            $id_host = auth()->user()->id;

                            ?>
                            @foreach($reservasanfitrion as $reserva )

                            <tr>
                                <td>@foreach($pq2 as $p)
                                    @if($p->id == $reserva->id_user){{ $p->sur_name }}&nbsp;{{ $p->last_name }}@endif
                                    @endforeach</td>
                                <td>{{$reserva->dia_reserva}}</td>
                                <td>@foreach($pq1 as $p1)
                                        @if($p1->id_parqueos == $reserva->id_parqueos){{ $p1->direccion }} @endif
                                        <?php $aux = $p1->id_zonas?>
                                        @endforeach</td>
                                    <td>@foreach($pq1 as $p1)
                                            @if($p1->id_parqueos == $reserva->id_parqueos)<?php $aux = $p1->id_zonas?>{{$pq3[$aux-1]->zona}} @endif
                                            @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_parqueos == $reserva->id_parqueos){{ number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs @endif
                                    @endforeach</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>
                                    @if($reserva->estado_reserva == '0')
                                        <b> Cancelado</b>
                                    @endif

                                    @if($reserva->estado_reserva == '1')
                                        <b>Finalizado</b>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{action('ReservaAnfitrionController@index')}}" class="btn btn-primary">Reservas Hoy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
