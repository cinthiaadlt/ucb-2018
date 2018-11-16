@extends ('layouts.app')

@section ('content')
<h1>Edit</h1>
<form method="post" action="{{ route('role.update', $role->id_roles) }}">
  {{csrf_field()}}
  <input type="hidden" name="_method" value="PUT">
  <label for="">nombre_role</label>
  <input type="text" name="nombre_role" value="{{$role->nombre_role}}">
  <label for="">descripcion_role</label>
  <input type="text" name="descripcion_role" value="{{$role->descripcion_role}}">
  <input type="submit" name="submit">
  <form method="post" action="/role/{{$role->id_roles}}">
    <input type="hidden" name="_method" value="delete">
    <input type="submit" value="delete">
  </form>
</form>
