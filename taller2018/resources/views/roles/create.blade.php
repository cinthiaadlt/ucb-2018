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
                <h3 class="mb-0">Registro de Roles</h3>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" role="form" class="form-group" style="padding-bottom:30px;">
              {{ csrf_field() }}

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="nombre_role">Nombre</label>
                  <input type="text" name="nombre_rol" id="nombre_role" class="form-control form-control-alternative" >
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="descripcion_role">Descripción</label>
                  <input type="text" name="descripcion_rol" id="descripcion_role" class="form-control form-control-alternative" >
                </div>
              </div>
              <input class="submit btn btn-danger" type="submit" value="Registrar">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
