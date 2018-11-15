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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Parqueo</label>
                                    <select name="id_parqueos" id="id_parqueos" class="form-control">
                                        @foreach($d1 as $den1)
                                        <option value ="{{$den1->id_parqueos}}">{{ $den1->id_parqueos }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Usuario</label>
                                    <select name="id_usuarios" id="id_usuarios" class="form-control">
                                        @foreach($d2 as $den2)
                                        <option value ="{{$den2->id_usuarios}}">{{ $den2->id_usuarios }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Tipo Denuncia</label>
                                    <input type="text" name="cat_tipo_denuncia" class="form-control form-control-alternative" id="cat_tipo_denuncia" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Nivel Gravedad</label>
                                    <input type="text" name="cat_nivel_gravedad" class="form-control form-control-alternative" id="cat_nivel_gravedad" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Descripcion Denuncia</label>
                                    <input type="text" name="descripcion_adicional" class="form-control form-control-alternative" id="descripcion_adicional" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Numero Strikes</label>
                                    <input type="text" name="num_strikes" class="form-control form-control-alternative" id="num_strikes" >
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Estado Denuncia</label>
                                    <input type="text" value="INICIAL" class="form-control" name="estado_denuncia" readonly>

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
