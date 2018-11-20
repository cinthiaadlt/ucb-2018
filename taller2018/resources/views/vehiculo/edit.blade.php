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
                                <h3 class="mb-0">Edición de Vehiculos</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('vehiculo.update',$vh->id_vehiculos) }}" role="form" class="panel-body" style="padding-bottom:30px;">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username"> Usuario Propietario</label>
                                    <select name="id_usuarios" id="id_usuarios" class="form-control" value ="{{$vh->id_usuarios}}">
                                        <option value="1">option one</option>
                                        <option value="2">option two</option>

                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Modelo</label>

                                    <select name="id_modelos" id="id_modelos" class="form-control" value ="{{$vh->id_modelos}}">
                                        @foreach($vh2 as $v)
                                            <option value ="{{$v->id_modelos}}" @if($v->id_modelos==$vh->modelo) selected='selected' @endif>{{ $v->modelo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Color</label>
                                    <input type="text" name="color" id="color" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Placa</label>
                                    <input type="text" name="placa" id="placa" class="form-control form-control-alternative" value="{{$vh->placa}}" >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Foto Vehiculo</label>
                                    <input type="text" name="foto_vehiculo" id="foto_vehiculo"class="form-control form-control-alternative" value="{{$vh->foto_vehiculo}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Tipo Vehiculo</label>
                                    <input type="text" name="cat_tipo_vehiculo" id="cat_tipo_vehiculo" class="form-control form-control-alternative" value="{{$vh->cat_tipo_vehiculo}}">
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
