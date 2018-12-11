@extends('layout.principal')

@section('content')
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
                                <h3 class="mb-0">Registrar denuncia:</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('denuncia.store') }}" role="form" class="panel-body" style="padding-bottom:30px;">

                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                @foreach($d1 as $den)
                                    <input type="text" hidden="true" name="id_parqueos" id="id_parqueos"  value ="{{$den->id_parqueos}}">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Nombre Dueño: </label>
                                                <input type="text" class="form-control form-control-alternative" name="nom" id="nom"  value ="{{$den->sur_name}} {{$den->last_name }}" disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Telefono de contacto:</label>
                                                <input type="text" disabled="true" name="telefono_contacto_1" id="telefono_contacto_1" class="form-control form-control-alternative" value="{{$den->telefono_contacto_1}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Cantidad de espacios:</label>
                                                <input type="text" disabled="true" name="cantidad_p" id="cantidad_p" class="form-control form-control-alternative" value="{{$den->cantidad_p}}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Direccion Parqueo: </label>
                                                <input type="text" disabled="true" name="direccion" id="direccion" class="form-control form-control-alternative" value="{{$den->direccion}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Tarifa por hora</label>
                                                <input type="text" disabled="true" name="tarifa_hora_normal" id="tarifa_hora_normal" class="form-control form-control-alternative" value="{{$den->tarifa_hora_normal}} Bs." >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-control-label" for="input-username">Foto de referencia</label>
                                            <img width="400" height="200" src="../../../images/{{$den->foto}}">
                                        </div>

                                    </div>
                                @endforeach
                                <hr class="my-4"/>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-control-label" for="input-denuncia">Tipo Denuncia:</label>
                                        <select name="cat_tipo_denuncia" id="cat_tipo_denuncia" class="form-control" >
                                            <option value="1" >Mal Servicio</option>
                                            <option value="2">Daños Vehiculo</option>
                                            <option value="3">Daño Parqueo</option>
                                            <option value="4">Parqueo mal estado</option>
                                            <option value="5">Acoso/Lenguaje Ofencivo</option>
                                            <option value="6">Irregularidades de pago</option>
                                            <option value="7">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-denuncia">Descripcion Denuncia</label>
                                            <input type="text" name="descripcion_adicional" class="form-control form-control-alternative" id="descripcion_adicional" >
                                        </div>
                                    </div>
                                </div>

                                <!--estado inicial al realizar la denuncia modo oculto-->
                                    <input type="text" value="INICIAL" class="form-control" name="estado_denuncia" readonly hidden>
                                <!--estado inicial al realizar la denuncia modo oculto-->
                                <input class="submit btn btn-danger" type="submit" value="Denunciar">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
