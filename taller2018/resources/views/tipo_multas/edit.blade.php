@extends ('layouts.app')

@section ('content')
<h1>Edit</h1>
<form method="post" action="{{ route('tipoMultas.update', $tipoMultas->id_tipo_multa) }}">
  {{csrf_field()}}
  <input type="hidden" name="_method" value="PUT">
  <label for="">nombre_tipo_multa</label>
  <input type="text" name="nombre_tipo_multa" value="{{$tipoMultas->nombre_tipo_multa}}">
  <label for="">descripcion_multa</label>
  <input type="text" name="descripcion_multa" value="{{$tipoMultas->descripcion_multa}}">
  <label for="">tarifa_multa</label>
  <input type="number" name="tarifa_multa" value="{{$tipoMultas->tarifa_multa}}">
  <label for="">cat_grado_multa</label>
  <input type="number" name="cat_grado_multa" value="{{$tipoMultas->cat_grado_multa}}">
  <input type="submit" name="submit">
  <form method="post" action="/tipoMultas/{{$tipoMultas->id_tipo_multa}}">
    <input type="hidden" name="_method" value="delete">
    <input type="submit" value="delete">
  </form>
</form>
