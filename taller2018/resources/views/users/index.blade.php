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
                  <th>Enrole</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count())
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->email}}</td>
                      <td>{{$user->sur_name}}</td>
                      <td><a class="btn btn-primary btn-xs" href="{{action('UsersRoleController@edit', $user->id)}}" >
                        Admin</a></td>
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
