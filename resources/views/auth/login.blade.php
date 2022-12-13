@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center" style="height: 80vh;">
  <div class="row flex-fill justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header fw-bold">{{ __('Login') }}</div>
        <div class="card-body py-5">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                }}</label>

              <div class="col-md-6">
                <div class="input-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required>
                  <a role="button" style="text-decoration: none;" toggle="#password" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                </div>
                @if ($errors->any())
                  <span class="text-danger">Invalid email atau password</span>
                @endif
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                {{-- @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif --}}
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
      $('.show-hide').click(function() {
          var id = $(this).attr('toggle');
          var input = $(id);
          var eye = $("a[toggle='"+ id +"'] i");

          eye.toggleClass('fa-eye fa-eye-slash');
          if (input.attr('type') == 'password') {
              input.attr('type', 'text')
          } else {
              input.attr('type', 'password')
          }
      })
    </script>
@endsection