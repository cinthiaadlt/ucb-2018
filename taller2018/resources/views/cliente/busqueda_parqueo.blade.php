@extends('layout.principal')

@section('content')
    <div id="content">
        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBqM_uRRSwywJEZ7kyEQxg_eLbrvTU-VNA&sensor=TRUE_OR_FALSE">
        </script>
        <script type="text/javascript">var centreGot = false;</script>
        {!!$map['js']!!}
        <div class="container-fluid mt--7">
            <div class="row">

                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Parqueos Disponibles</h3>
                        </div>
                        <div align="center">
                            {!!$map['html']!!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
