@extends('layout.principal')

@section('content')
  <div id="content">
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Listado de Usuarios</h3>
            </div>

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                  <th>E-mail</th>
                  <th>Nombre</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count())
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->email}}</td>
                      <td>{{$user->sur_name}}</td>
                      <td>
                        @if (!$user->hasRole ("Owner"))
                          <input type="button" class="btn btn-sm btn-primary" href="#" disabled="true" value="Propietario" ></input>
                          @else
                          <a class="btn btn-sm btn-primary " href="#" disabled="false" >Propietario</a>
                        @endif

                        @if (!$user->hasRole ("Admin"))
                        <input type="button" class="btn btn-sm btn-primary" href="#" disabled="true" value="Administrador" ></input>
                          @else
                          <a class="btn btn-sm btn-primary " href="#" disabled="false" >Administrador</a>
                        @endif

                        @if (!$user->hasRole ("User"))
                          <a class="btn btn-sm btn-primary " href="#" disabled="true" >Cliente</a>
                          @else
                          <a class="btn btn-sm btn-primary " href="#" disabled="false" >Cliente</a>
                        @endif

                      </td>
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
