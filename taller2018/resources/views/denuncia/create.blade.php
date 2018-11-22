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
                                        <option value ="{{$den1->id_parqueos}}">{{ $den1->foto}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Usuario</label>
                                    <select name="id" id="id" class="form-control">
                                        @foreach($d2 as $den2)
                                        <option value ="{{$den2->id}}">{{ $den2->sur_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="input-denuncia">Tipo Denuncia:</label>
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


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-denuncia">Descripcion Denuncia</label>
                                    <input type="text" name="descripcion_adicional" class="form-control form-control-alternative" id="descripcion_adicional" >
                                </div>
                            </div>

                            <!--estado inicial al realizar la denuncia modo oculto-->

                                <input type="text" value="INICIAL" class="form-control" name="estado_denuncia" readonly hidden>


                            <input class="submit btn btn-danger" type="submit" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
