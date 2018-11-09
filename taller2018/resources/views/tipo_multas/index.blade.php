@extends ('layouts.app')

@section ('content')

<ul>
  @foreach($multas as $multa)
    <li><a href="{{route('tipoMultas.edit', $multa->id_tipo_multa)}}">{{$multa->nombre_tipo_multa}}</a></li>
  @endforeach
</ul>
