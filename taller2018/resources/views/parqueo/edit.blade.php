@extends('parqueo.layout')

@section('content')

<h1 class="text-center">Registrar Parqueos</h1>
<hr>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container">

    <form action="{{ route('parqueo.update', $parqueo->id_parqueos) }}" method="POST" class="needs-validation" novalidate>

        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_zona">Zona</label>
                    <select id="id_zona" name="id_zona" value="{{ $parqueo->id_zona }}" class="form-control">
                        <option selected>Zona del Parqueo</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip01">Direccion</label>
                    <input type="text" name="direccion"  value="{{ $parqueo->direccion }}" class="form-control" id="validationTooltip01" placeholder="Direccion del Parqueo">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese una direccion de parqueo.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip02">Latitud</label>
                    <input type="text" name="latitud_x"  value="{{ $parqueo->latitud_x }}" class="form-control" id="validationTooltip02" placeholder="Latitud Mapa">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese la latitud.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip03">Longitud</label>
                    <input type="text" name="longitud_y"  value="{{ $parqueo->longitud_y }}" class="form-control" id="validationTooltip03" placeholder="Longitud Mapa">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese la longitud.
                    </div>
                </div>
            </div>
            <div class="col-auto my-1">
                <div class="form-group">
                    <label for="cantidad_p">Cantidad de Espacios</label>
                    <select class="custom-select mr-sm-2" id="cantidad_p" name="cantidad_p"  value="{{ $parqueo->cantidad_p }}" >
                        <option selected>Seleccionar...</option>
                        <option value="1">Uno</option>
                        <option value="2">Dos</option>
                        <option value="3">Tres</option>
                        <option value="4">Cuatro</option>
                        <option value="5">Cinco</option>

                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip04">Foto</label>
                    <input type="text" name="foto"  value="{{ $parqueo->foto }}" class="form-control" id="validationTooltip04" placeholder="Foto Parqueo">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese una foto.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip05">Telefono de Contacto 1</label>
                    <input type="text" name="telefono_contacto_1"  value="{{ $parqueo->telefono_contacto_1 }}" class="form-control" id="validationTooltip05" placeholder="Telefono 1">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese un numero de telefono.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <strong>Telefono de Contacto 2</strong>
                    <input type="text" name="telefono_contacto_2"  value="{{ $parqueo->telefono_contacto_2 }}" class="form-control" placeholder="Telefono 2">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="estado_funcionamiento">Horarios de Funcionamiento</label>
                    <select class="custom-select mr-sm-2" id="estado_funcionamiento" name="estado_funcionamiento"  value="{{ $parqueo->estado_funcionamiento }}" >
                        <option selected>Seleccionar...</option>
                        <option value="1">24 Horas</option>
                        <option value="2">Mañana</option>
                        <option value="3">Tarde</option>
                        <option value="4">Noche</option>
                        <option value="4">Madrugada</option>
                        <option value="4">Mañana-Tarde</option>
                        <option value="4">Tarde-Noche</option>
                        <option value="4">Noche-Madrugada</option>
                        <option value="4">Madrugada-Mañana</option>

                    </select>

                    <strong>Estado Funcionamiento</strong>
                    <input type="text" name="estado_funcionamiento"  value="{{ $parqueo->estado_funcionamiento }}" class="form-control" placeholder="Estado Funcionamiento">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="cat_estado_parqueo">Estado del Parqueo</label>
                    <select class="custom-select mr-sm-2" id="cat_estado_parqueo" name="cat_estado_parqueo"  value="{{ $parqueo->cat_estado_parqueo }}" >
                        <option selected>Seleccionar...</option>
                        <option value="1">Excelente</option>
                        <option value="2">Bueno</option>
                        <option value="3">Regular</option>
                        <option value="4">Malo</option>

                    </select>

                    <!--
                    <input type="text" name="cat_estado_parqueo" class="form-control" placeholder="Condiciones del Parqueo">
                    -->

                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="validationTooltip06">Codigo de Validacion</label>
                    <input type="text" name="cat_validacion"  value="{{ $parqueo->cat_validacion }}" class="form-control" id="validationTooltip06" placeholder="Validacion del Parqueo">
                    <div class="valid-tooltip">
                        ¡Correcto!
                    </div>
                    <div class="invalid-tooltip">
                        Porfavor ingrese el codigo de validacion.
                    </div>
                </div>
            </div>
            <div class="col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>

</div>


@endsection
