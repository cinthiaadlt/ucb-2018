@extends('layout.unlogged')
@section('content')

  <div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">

        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <small>Ingresar con correo y contraseña</small>
          </div>
          <form method="POST" action="{{ route('login') }}">
          @csrf
          <!--Email -->
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!--Password -->
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required pattern="[a-zA-Z0-9]+" title="Ingresa solo numeros y letras">
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                @endif
              </div>
            </div>
            <div class="custom-control custom-control-alternative custom-checkbox">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                {{ __('Recordarme') }}
              </label>
            </div>
            <div class="text-center">
              <button type="submit"  class="btn btn-primary my-4">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
      <!--
      <div class="row mt-3">
        <div class="col-6">
          <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('¿Olvidó la contraseña?') }}</a>
        </div>

        <div class="col-6 text-right">
          <a href="{{ url('register') }}"class="text-light"><small>Crear una cuenta</small></a>
        </div>
      </div>
    -->
    </div>
  </div>
  </div>
@endsection






