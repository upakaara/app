@extends('layouts.auth')

@section('content')

    <div class="g-bg-white rounded g-pa-50">
      <header class="text-center mb-4">
        <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
      </header>

      <!-- Form -->
      <form class="g-py-15" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        
        <div class="mb-4 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            autofocus
            placeholder="johndoe@gmail.com"
          >
          @if ($errors->has('email'))
              <small class="form-control-feedback">{{ $errors->first('email') }}</small>
          @endif
        </div>

        <div class="g-mb-30 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="Password"
            placeholder="Password"
            id="password"
            name="password"
          >
          @if ($errors->has('password'))
            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
          @endif
        </div>

        <div class="text-center mb-5">
          <button class="btn btn-block u-btn-primary rounded g-py-13" type="submit">Login</button>
        </div>

        <div class="d-flex justify-content-center text-center g-mb-30">
          <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
          <span class="align-self-center g-color-gray-dark-v5 mx-4">OR</span>
          <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
        </div>

        <div class="row no-gutters g-mb-40">
          <div class="col-6">
            <button class="btn btn-block u-btn-facebook rounded g-px-30 g-py-13 mr-1" type="button" onclick="location.href='{{ url('/auth/facebook') }}'">Facebook</button>
          </div>
          <div class="col-6">
            <button class="btn btn-block u-btn-lightred rounded g-px-30 g-py-13 ml-1" type="button" onclick="location.href='{{ url('/auth/google') }}'">Google</button>
          </div>
        </div>
      </form>
      <!-- End Form -->

      <footer class="text-center">
        <p class="g-color-gray-dark-v5 mb-0">Don't have an account? <a class="g-font-weight-600" href="{{ route('register') }}">signup</a>
        </p>
      </footer>
    </div>

@endsection
