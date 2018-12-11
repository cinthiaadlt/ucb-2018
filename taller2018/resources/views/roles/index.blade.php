@extends('layout.principal')

@section('content')
  <div id="content">
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Listado de Roles</h3>
              <br>

              <div class="pull-right">
                <div class="btn-group">
                  <a href="{{ route('roles.create') }}" class="btn btn-sm btn-slack" >Añadir Nuevo Rol</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @if($roles->count())
                  @foreach($roles as $role)
                    <tr>
                      <td>{{$role->id_roles}}</td>
                      <td>{{$role->nombre_role}}</td>
                      <td>{{$role->descripcion_role}}</td>
                      <td><a class="btn btn-sm btn-twitter" href="{{action('RoleController@edit', $role->id_roles)}}" >Editar</a></td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="8">No hay registro !!</td>
                  </tr>
                @endif

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
