

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
                                    <h3 class="mb-0">Editar Vehiculo</h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('vehiculo.update',$vh->id_vehiculos) }}" role="form" class="panel-body" style="padding-bottom:30px;">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">

                                    <input type="text" name="id_users" id="id_users" hidden="true" value="{{$vh->id_users}}" >


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Modelo</label>
                                            <select name="id_modelos" id="id_modelos" class="form-control" value ="{{$vh->id_modelos}}">
                                                @foreach($vh2 as $v)
                                                    <option value ="{{$v->id_modelos}}" @if($v->id_modelos==$vh->modelo) selected='selected' @endif>{{ $v->modelo }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Color</label>
                                            <input type="text" name="color" id="color" class="form-control form-control-alternative" value="{{$vh->color}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Placa</label>
                                            <input type="text" name="placa" id="placa" class="form-control form-control-alternative" value="{{$vh->placa}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Tipo Vehiculo</label>
                                            <input type="text" name="cat_tipo_vehiculo" id="cat_tipo_vehiculo" class="form-control form-control-alternative" value="{{$vh->cat_tipo_vehiculo}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="Imagen">Foto Vehiculo:</label>
                                        <br>
                                        <img width="200" height="200" src="../../../images/{{$vh->foto_vehiculo}}">
                                        <input type="file" accept="image/*" name="foto_vehiculo">
                                    </div>
                                </div>

                                <input class="submit btn btn-success" type="submit" value="Actualizar Datos">
                                <a href="/list" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





