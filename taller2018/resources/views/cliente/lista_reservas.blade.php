@extends('layout.principal')

@section('content')
    <div id="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Listado Reservas</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>Nro</th>
                                    <th>Dueño Parqueo</th>
                                    <th>Direccion</th>
                                    <th>Hora Inicio <br> Reserva</th>
                                    <th>Hora Fin <br> Reserva</th>
                                    <th>Estado</th>
                                    <th>Finalizar <br> Reserva</th>
                                    <th>Eliminar <br> Reserva</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($l->count())
                                    @foreach($l as $reserva)
                                        <tr>
                                            <td>{{$reserva->id_reservas}}</td>
                                            <td>{{$reserva->sur_name}}  {{$reserva->last_name}} </td>
                                            <td>{{$reserva->direccion}}</td>
                                            <td>{{$reserva->h_inicio_reserva}}</td>
                                            <td>{{$reserva->h_fin_reserva}}</td>
                                            <td>{{$reserva->estado_reserva}}</td>

                                            <td><a class="btn btn-github btn-sm" href="{{action('ReservaController@destroy', $reserva->id_reservas)}}"  >
                                                    <i class="ni ni-time-alarm"></i></a></td>
                                            <td><a class="btn btn-danger btn-sm" href="{{action('ReservaController@destroy', $reserva->id_reservas)}}" >
                                                    <i class="ni ni-fat-delete"></i></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                        {{ $l->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

