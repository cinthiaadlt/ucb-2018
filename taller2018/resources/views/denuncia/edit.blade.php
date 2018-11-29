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
                                <h3 class="mb-0">Estado de la denuncia:</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('denuncia.update',$denuncia->id_denuncias) }}" role="form" class="panel-body" style="padding-bottom:30px;">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <!--parqueo al que se le hizo la denuncia en modo oculto-->
                                <input type="text" name="id_parqueos" class="form-control form-control-alternative" id="id_parqueos" value ="{{$denuncia->id_parqueos}}" readonly hidden>

                            <!--usuario que realizo la denuncia en modo oculto-->

                                <input type="text" name="id" class="form-control form-control-alternative" id="id" value ="{{$denuncia->id}}" readonly hidden>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="input-denuncia">Tipo Denuncia:</label>
                                    <select name="cat_tipo_denuncia" id="cat_tipo_denuncia" class="form-control" readonly>
                                        <option value="{{$denuncia->cat_tipo_denuncia}}" selected>

                                                @if($denuncia->cat_tipo_denuncia == '1')
                                                    Mal Servicio
                                                @else
                                                    @if($denuncia->cat_tipo_denuncia == '2')
                                                        Daño Vehiculo
                                                    @else
                                                        @if($denuncia->cat_tipo_denuncia == '3')
                                                            Daño Parqueo
                                                        @else
                                                            @if($denuncia->cat_tipo_denuncia == '4')
                                                                Parqueo mal estado
                                                            @else
                                                                @if($denuncia->cat_tipo_denuncia == '5')
                                                                    Acoso / Lenguaje Ofensivo
                                                                @else
                                                                    @if($denuncia->cat_tipo_denuncia == '6')
                                                                        Irregularidades de pago
                                                                    @else
                                                                        @if($denuncia->cat_tipo_denuncia == '7')
                                                                            Otros
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="input-denuncia">Nivel Gravedad:</label>
                                    <select name="cat_nivel_gravedad" id="cat_nivel_gravedad" class="form-control" readonly >
                                        <option value="{{$denuncia->cat_nivel_gravedad}}" >
                                            @if($denuncia->cat_nivel_gravedad == '1')
                                                Bajo
                                            @else
                                                @if($denuncia->cat_nivel_gravedad == '2')
                                                    Medio
                                                @else
                                                    @if($denuncia->cat_nivel_gravedad == '3')
                                                        Alto
                                                    @endif
                                                @endif
                                            @endif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Descripcion Denuncia</label>
                                    <input type="text" name="descripcion_adicional" class="form-control form-control-alternative" id="descripcion_adicional" value ="{{$denuncia->descripcion_adicional}}" readonly>
                                </div>
                            </div>
                            </div>

                            <!--numero de strikes que tiene el denunciado en modo oculto-->
                                <input type="text" name="num_strikes" class="form-control form-control-alternative" id="num_strikes" value ="{{$denuncia->num_strikes}}" readonly hidden>

                            <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Estado Denuncia</label>
                                    <select name="estado_denuncia" id="estado_denuncia" class="form-control" value ="{{$denuncia->estado_denuncia}}">
                                        <option value="INICIAL">INICIAL</option>
                                        <option value="PROCEDENTE">PROCEDENTE</option>
                                        <option value="ARBITRARIO">ARBITRARIO</option>
                                        <option value="RESUELTO">RESUELTO</option>
                                        <option value="DENEGADO">DENEGADO</option>

                                    </select>
                                </div>
                            </div>
                            </div>

                            <input class="submit btn btn-danger" type="submit" value="Guardar">
                            <a href="{{action('DenunciaController@show', $denuncia->id_parqueos)}}" class="btn btn-primary">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
