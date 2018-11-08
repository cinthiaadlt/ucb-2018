@extends('layout.principal')

@section('content')
<div class="content">
        <br />
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
         @endif
        <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Passport Office</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($parqueos as $parqueo)
          @php
            $date=date('Y-m-d', $parqueo['date']);
            @endphp
          <tr>
            <td>{{$parqueo['id']}}</td>
            <td>{{$parqueo['name']}}</td>
            <td>{{$parqueo['email']}}</td>
            <td>{{$parqueo['number']}}</td>
            <td>{{$parqueo['office']}}</td>
            
            <td><a href="{{action('ParqueoController@edit', $parqueo['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('ParqueoController@destroy', $parqueo['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{action('ParqueoController@create')}}" class="btn btn-primary">Registro</a>
      </div>


@endsection
