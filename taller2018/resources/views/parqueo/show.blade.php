@extends('parqueo.layout')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            {{ $parqueo->id_zonas}}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">{{ $parqueo->created_at}}</footer>
            </blockquote>
        </div>
    </div>

</div>


@endsection
