@extends('layout.principal')
@section('content')
<link href="{{asset('css/parque.css')}}" rel="stylesheet">
<div id="content">
        <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBqM_uRRSwywJEZ7kyEQxg_eLbrvTU-VNA&sensor=TRUE_OR_FALSE">
</script>
<script type="text/javascript">var centreGot = false;</script>
{!!$map['js']!!}
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
                                <h3 class="mb-0">Registro de Parqueos:</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="row">
                                    <div class="col-md-12">
                                            <label for="Mapa">Seleccionar Ubicacion:</label>
                                            <div align="center">
                                                {!!$map['html']!!}
                                             </div>
                                    </div>
                                </div>
                            <form method="post" enctype="multipart/form-data" action="{{action('ParqueoController@update', $id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="Latitud">Latitud:</label>
                                          <input type="text" class="form-control" name="latitud_x" value="{{$parqueo->latitud_x}}" id="lat" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="Longitud">Longitud:</label>
                                          <input type="text" class="form-control" name="longitud_y" value="{{$parqueo->longitud_y}}" id="lon" readonly>
                                        </div>
                                      </div>

                                <div class="row">
                                        <div class="form-group col-md-12">
                                          <label for="PrimerNombre">Zonas:</label>
                                          <select name="id_zonas" id="id_zonas" class="form-control">
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
                                      <label for="Direccion">Direccion:</label>
                                      <input type="text" class="form-control" name="direccion" value="{{$parqueo->direccion}}" required>
                                    </div>
                                  </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="Cantidad">Cantidad Vehiculos:</label>
                                            <input type="number" class="form-control" name="cantidad_p" min="1" max="20" value="{{$parqueo->cantidad_p}}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="Imagen">Imagen:</label>
                                            <img width="200" height="200" src="../../../images/{{$parqueo->foto}}">
                                            <input type="file" accept="image/*" name="imagen">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="Contacto">Contacto 1:</label>
                                            <input type="text" class="form-control" name="telefono_contacto_1" value="{{$parqueo->telefono_contacto_1}}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="Contacto">Contacto 2:</label>
                                                <input type="text" class="form-control" name="telefono_contacto_2" value="{{$parqueo->telefono_contacto_2}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="HoraApertura">Hora Apertura:</label>
                                              <input type="time" class="form-control" name="hora_apertura" value="{{$parqueo->hora_apertura}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="HoraCierre">Hora Cierre:</label>
                                              <input type="time" class="form-control" name="hora_cierre" value="{{$parqueo->hora_cierre}}" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="Tarifa">Tarifa:</label>
                                                <input type="text" class="form-control" name="tarifa_hora_normal" value="{{$parqueo->tarifa_hora_normal}}" required>
                                            </div>
                                    </div>
                                        <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="Nacionalidad">Dias Funcionamiento Parqueo:</label>
                                                    @foreach($validado as $val)
                                                    <label class="checkbox-inline">
                                                        @foreach($dias as $dia)
                                                            @if($val->id_dias == $dia->id_dias)
                                                                @if($val->estado == true)
                                                                    <input type="checkbox" name="dia[]" value="{{$val->id_dias}}" checked>&nbsp;{{substr($dia->nombre, 0, 3)}}
                                                                @else 
                                                                    <input type="checkbox" name="dia[]" value="{{$val->id_dias}}">&nbsp;{{substr($dia->nombre, 0, 3)}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="Estado">Estado Funcionamiento:</label>
                                            <input type="text" value="Inactivo" class="form-control" name="estado_funcionamiento" readonly>
                                        </div>
                                    </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4" style="margin-top:60px">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
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
