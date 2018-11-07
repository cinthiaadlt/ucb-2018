@extends('layout.principal')

@section('content')
    <div id="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Parqueos Disponibles</h3>
                        </div>
                        <div class="table-responsive">
                            {!!$map['html']!!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
