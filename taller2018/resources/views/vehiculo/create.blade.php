@extends('layout.main')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
    <div class="panel form-element-padding">
        <div class="panel-heading">
            <h4>Basic Element</h4>
        </div>

        <form method="POST" action="{{ route('vehiculo.store') }}" role="form" class="panel-body" style="padding-bottom:30px;">
            {{ csrf_field() }}

            <div class="col-md-12">

                <div class="form-group"><label class="col-sm-2 control-label text-right">Usuario Propietario</label>
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding-0">
                            <select name="id_usuarios" id="id_usuarios" class="form-control">
                                <option value="1">option one</option>
                                <option value="2">option two</option>

                            </select>
                        </div>

                    </div>
                </div>
                <br>
                <br>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Modelos Autos</label>
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding-0">
                            <select name="id_modelos" id="id_modelos" class="form-control">
                                <option value="1">option one</option>
                                <option value="2">option two</option>
                            </select>
                        </div>

                    </div>
                </div>
                <br>
                <br>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Color</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="color" id="color"></div>
                </div>
                <br>
                <br>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Placa</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="placa" id="placa"></div>
                </div>
                <br>
                <br>


                <div class="form-group"><label class="col-sm-2 control-label text-right">Foto Vehiculo</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="foto_vehiculo" id="foto_vehiculo"></div>
                </div>
                <br>
                <br>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Tipo Vehiculo</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="cat_tipo_vehiculo" id="cat_tipo_vehiculo"></div>
                </div>
                <br>
                <br>

                <input class="submit btn btn-danger" type="submit" value="Submit">

        </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('js')
    <script src="asset/js/jquery.min.js"></script>

@endsection