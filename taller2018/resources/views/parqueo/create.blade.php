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
                                <h3 class="mb-0">Registro de Parqueo</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('zona.store') }}" role="form" class="form-group" style="padding-bottom:30px;">

                            {{ csrf_field() }}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Zona</label>
                                    <select name="id_zonas" id="id_zonas" class="form-control">
                                        @foreach($pq2 as $p)
                                        <option value ="{{$p->id_zonas}}">{{ $p->zona }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Direccion</label>
                                    <input type="text" name="direccion" class="form-control form-control-alternative" id="direccion" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Latitud</label>
                                    <input type="text" name="latitud_x" class="form-control form-control-alternative" id="latitud_x" >
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Longitud</label>
                                    <input type="text" name="longitud_y" class="form-control form-control-alternative" id="longitud_y" >
                                </div>
                            </div>

                            <div class="col-auto my-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Cantidad de Espacios</label>
                                    <select name="cantidad_p" id="cantidad_p" class="form-control" >
                                        <option selected>Seleccionar...</option>
                                        <option value="1">Uno</option>
                                        <option value="2">Dos</option>
                                        <option value="3">Tres</option>
                                        <option value="4">Cuatro</option>
                                        <option value="5">Cinco</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Foto</label>
                                    <input type="text" name="foto" class="form-control form-control-alternative" id="foto" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Telefono de Contacto 1</label>
                                    <input type="text" name="telefono_contacto_1" class="form-control form-control-alternative" id="telefono_contacto_1" >
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Telefono de Contacto 2</label>
                                    <input type="text" name="telefono_contacto_2" class="form-control form-control-alternative" id="telefono_contacto_2">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Estado de Funcionamiento</label>
                                    <select class="form-control" id="estado_funcionamiento" name="estado_funcionamiento" >
                                        <option selected>Seleccionar...</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Estado del Parqueo</label>
                                    <select class="form-control" id="cat_estado_parqueo" name="cat_estado_parqueo" >
                                        <option selected>Seleccionar...</option>
                                        <option value="excelente">Excelente</option>
                                        <option value="bueno">Bueno</option>
                                        <option value="regular">Regular</option>
                                        <option value="malo">Malo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Codigo de Validacion</label>
                                    <input type="text" name="cat_validacion" class="form-control form-control-alternative" id="cat_validacion" >
                                </div>
                            </div>

                            <input class="submit btn btn-danger" type="submit" value="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
