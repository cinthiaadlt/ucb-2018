@extends('layout.principal')

@section('content')
    <div id="content">
        <div class="container-fluid mt--7">
            <div class="row">

                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Informacion del parqueo</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">Atras</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- DATOS DEL PARQUEO SELECCIONADO EN EL MAPA-->
                                <h6 class="heading-small text-muted mb-4">Datos Parqueo</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Direccion</label>
                                                <input type="text" disabled="true" name="direccion" id="direccion" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Cantidad de espacios</label>
                                                <input type="text" disabled="true" name="espacios" id="espacios" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Telefono de contacto</label>
                                                <input type="text" disabled="true" name="telefono" id="telefono" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Tarifa por hora</label>
                                                <input type="text" disabled="true" name="tarifa" id="tarifa" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-control-label" for="input-username">Foto de referencia</label>
                                            <img width="400" height="200" src="./images/'+value.foto+'">
                                        </div>
                                        <div class="col-lg-6>
                                            <label class="form-control-label" for="input-username">Tarifa por hora</label>
                                            <input type="text" disabled="true" name="tarifa" id="tarifa" class="form-control form-control-alternative" value="{{$vh->color}}" >
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />

                                <!-- DATOS PARA LA RESERVA -->
                                <h6 class="heading-small text-muted mb-4">Datos para la Rervacion</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Country</label>
                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal code</label>
                                                <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



