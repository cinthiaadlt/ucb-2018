@extends('layout.principal')
@section('scripts')
<script src="{{asset('_js/parq.js')}}"></script>
@endsectiongi
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
                                <h3 class="mb-0">Registro de Parqueos:</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <form method="post" action="{{url('parqueo')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4">
                                    <label for="Name">Name:</label>
                                    <input type="text" class="form-control" name="name">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                    <div class="form-group col-md-4">
                                      <label for="Email">Email:</label>
                                      <input type="text" class="form-control" name="email">
                                    </div>
                                  </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                    <div class="form-group col-md-4">
                                      <label for="Number">Phone Number:</label>
                                      <input type="text" class="form-control" name="number">
                                    </div>
                                  </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4">
                                    <input type="file" name="filename">    
                                 </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4">
                                    <strong>Date : </strong>  
                                    <input class="date form-control"  type="text" id="datepicker" name="date">   
                                 </div>
                                </div>
                                 <div class="row">
                                  <div class="col-md-4"></div>
                                    <div class="form-group col-md-4">
                                        <lable>Passport Office</lable>
                                        <select name="office">
                                          <option value="Mumbai">Mumbai</option>
                                          <option value="Chennai">Chennai</option>
                                          <option value="Delhi">Delhi</option>  
                                          <option value="Bangalore">Bangalore</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4" style="margin-top:60px">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
