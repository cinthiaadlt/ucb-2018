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
                        <form method="POST" action="{{ route('denuncia.update',$d->id_denuncias) }}" role="form" class="panel-body" style="padding-bottom:30px;">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Parqueo</label>
                                    <input type="text" name="id_parqueos" class="form-control form-control-alternative" id="id_parqueos" value ="{{$d->id_parqueos}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Usuario</label>
                                    <input type="text" name="id_usuarios" class="form-control form-control-alternative" id="id_usuarios" value ="{{$d->id_usuarios}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Tipo Denuncia</label>
                                    <input type="text" name="cat_tipo_denuncia" class="form-control form-control-alternative" id="cat_tipo_denuncia" value ="{{$d->cat_tipo_denuncia}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Nivel Gravedad</label>
                                    <input type="text" name="cat_nivel_gravedad" class="form-control form-control-alternative" id="cat_nivel_gravedad" value ="{{$d->cat_nivel_gravedad}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Descripcion Denuncia</label>
                                    <input type="text" name="descripcion_adicional" class="form-control form-control-alternative" id="descripcion_adicional" value ="{{$d->descripcion_adicional}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Numero Strikes</label>
                                    <input type="text" name="num_strikes" class="form-control form-control-alternative" id="num_strikes" value ="{{$d->num_strikes}}" readonly>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Estado Denuncia</label>
                                    <select name="estado_denuncia" id="estado_denuncia" class="form-control" value ="{{$d->estado_denuncia}}">
                                        <option value="Espera">Espera</option>
                                        <option value="Resuelto">Resuelto</option>

                                    </select>
                                </div>
                            </div>

                            <input class="submit btn btn-danger" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
