@extends('layout.principal')
@section('content')
<link href="{{asset('css/parque.css')}}" rel="stylesheet">
<div id="content">

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                    @endif


                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Validar Parqueos:</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">

                        <form method="post" action="{{action('ValidacionController@update', $id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group hidden">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Latitud" hidden>Latitud:</label>
                                    <input type="text" class="form-control" name="latitud_x" value="{{$parqueo->latitud_x}}" id="lat" readonly hidden>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Longitud" hidden>Longitud:</label>
                                    <input type="text" class="form-control" name="longitud_y" value="{{$parqueo->longitud_y}}" id="lon" readonly hidden>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="PrimerNombre" hidden>Zonas:</label>

                                    <select name="id_zonas" id="id_zonas" class="form-control" readonly hidden>
                                        @foreach($pq2 as $p)
                                        @if($p->id_zonas == $parqueo['id_zonas'])
                                        <option value="{{$p->id_zonas}}" selected>{{ $p->zona }}</option>
                                        @else
                                        <option value ="{{$p->id_zonas}}">{{ $p->zona }}</option>@endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Direccion" hidden>Direccion:</label>
                                    <input type="text" class="form-control" name="direccion" value="{{$parqueo->direccion}}" readonly hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Cantidad" hidden>Cantidad Vehiculos:</label>
                                    <input type="text" class="form-control" name="cantidad_p" value="{{$parqueo->cantidad_p}}" readonly hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Contacto" hidden>Contacto 1:</label>
                                    <input type="text" class="form-control" name="telefono_contacto_1" value="{{$parqueo->telefono_contacto_1}}" readonly hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Contacto" hidden>Contacto 2:</label>
                                    <input type="text" class="form-control" name="telefono_contacto_2" value="{{$parqueo->telefono_contacto_2}}" readonly hidden>
                                </div>
                            </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Imagen">Imagen Validacion:</label>
                                    <input type="file" accept="image/*" name="filename">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Observacion">Observaciones:</label>
                                    <input type="text" class="form-control" name="observacion" value="" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Estado">Estado Funcionamiento:</label>

                                    <select name="estado_funcionamiento" id="estado_funcionamiento" class="form-control" value ="{{$parqueo->estado_funcionamiento}}">
                                        <option value="1">Aprobar</option>
                                        <option value="2">Denegar</option>
                                        <option value="3">Observar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4" style="margin-top:60px">
                                    <button type="submit" class="btn btn-success">Validar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
