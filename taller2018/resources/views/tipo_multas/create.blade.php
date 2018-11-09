@extends ('layouts.app')

@section ('content')
<h1>Create</h1>
<form method="post" action="{{ route('tipoMultas.store') }}">
  {{csrf_field()}}
  <label for="">nombre_tipo_multa</label>
  <input type="text" name="nombre_tipo_multa">
  <label for="">descripcion_multa</label>
  <input type="text" name="descripcion_multa">
  <label for="">tarifa_multa</label>
  <input type="number" name="tarifa_multa">
  <label for="">cat_grado_multa</label>
  <input type="number" name="cat_grado_multa">
  <input type="submit" name="submit">
</form>
