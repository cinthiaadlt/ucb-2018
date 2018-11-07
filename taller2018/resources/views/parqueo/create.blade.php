@extends('layout.principal')
@section('scripts')
<script src="{{asset('_js/parq.js')}}"></script>
@endsection
@section('content')
<link href="{{asset('css/parque.css')}}" rel="stylesheet">
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
                                <h3 class="mb-0">Registro de Parqueo:</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Direccion:</label>
                                    <input type="text" name="direccion" class="form-control-inline form-control-alternative" id="direccion" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Ubicacion:</label>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Tipo:</label>
                                    <label class="radio-inline"><input type="radio" name="optradio" checked>Calle</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">Casa</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">Edificio</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Dimensiones:</label>
    <div class="row form-group product-chooser">
    
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item selected">
    			<img src="http://renswijnmalen.nl/bootstrap/desktop_mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Mobile and Desktop</span>
    				<span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
    				<input type="radio" name="product" value="mobile_desktop" checked="checked">
    			</div>
    			<div class="clear"></div>
    		</div>
    	</div>
    	
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<img src="http://renswijnmalen.nl/bootstrap/desktop.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Desktop">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Desktop</span>
    				<span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
    				<input type="radio" name="product" value="desktop">
    			</div>
    			<div class="clear"></div>
    		</div>
    	</div>
    	
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<img src="http://renswijnmalen.nl/bootstrap/mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Mobile</span>
    				<span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
    				<input type="radio" name="product" value="mobile">
    			</div>
    			<div class="clear"></div>
    		</div>
    	</div>
    	
    </div>
                                </div>
                            </div>

                            <div class="col-auto my-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Capacidad:</label>
                                    <select name="cantidad_p" id="selecfield" class="form-control-inline" >
                                        <option selected>Seleccionar...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Imagen del Parqueo:</label>
                                        <div class="form-group col-md-4">
                                          <input id="upimg" type="file" name="filename">    
                                       </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Persona a cargo:</label>
                                    <span class="labpre">Nombre:</span><input type="text" name="telefono_contacto_1" class="form-control-inline form-control-alternative" id="telefono_contacto_1" >
                                    <span class="labpre">Celular:</span><input type="text" name="telefono_contacto_1" class="form-control-inline form-control-alternative" id="telefono_contacto_1" >
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Dias funcionamiento:</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Lun</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Mar</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Mie</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Jue</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Vie</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Sab</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="">Dom</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Horarios de atencion:</label>
                                    <span class="labpre">Inicio:</span><select class="form-control-inline" id="selecfield" name="hora_apertura" >
                                        <option selected>Seleccionar...</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                    <span class="labpre">Fin:</span><select class="form-control-inline" id="selecfield" name="estado_funcionamiento" >
                                        <option selected>Seleccionar...</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parqueo">Tarifas por hora:</label>
                                    <input type="text" placeholder="Bs." name="tarifa_hora_normal" class="form-control-inline form-control-alternative" id="tarifa_hora_normal">
                                </div>
                            </div>
                            <input class="submit btn btn-success" type="submit" value="Registrar">
                            <input class="submit btn btn-danger" type="submit" value="Cancelar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
