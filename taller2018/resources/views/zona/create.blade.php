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
                                <h3 class="mb-0">Registro de Zonas</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('zona.store') }}" role="form" class="form-group" style="padding-bottom:30px;">

                            {{ csrf_field() }}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-zona">Zona</label>
                                    <select name="zona" id="zona" class="form-control" >
                                        <option value="Miraflores">Miraflores</option>
                                        <option value="Alto Obrajes">Alto Obrajes</option>
                                        <option value="Obrajes">Obrajes</option>
                                        <option value="Sopocachi">Sopocachi</option>
                                        <option value="San Pedro">San Pedro</option>
                                        <option value="Calacoto">Calacoto</option>
                                        <option value="Irpavi">Irpavi</option>

                                    </select>
                                </div>
                            </div>

                            <!--
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-zona">Calle</label>
                                    <input type="text" name="calle" class="form-control form-control-alternative" id="calle" >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-zona">Ciudad</label>
                                    <select name="ciudad" id="ciudad" class="form-control" >
                                        <option value="La Paz">La Paz</option>
                                        <option value="El Alto">El Alto</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Tarija">Tarija</option>
                                        <option value="Sucre">Sucre</option>
                                        <option value="Oruro">Oruro</option>

                                    </select>
                                </div>
                            </div> -->

                            <input class="submit btn btn-danger" type="submit" value="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
