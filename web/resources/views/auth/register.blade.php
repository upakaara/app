@extends('layouts.auth')

@section('content')

    <div class="g-bg-white rounded g-pa-50">
      <header class="text-center mb-4">
        <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
      </header>

      <!-- Form -->
      <form class="g-py-15" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        
        <div class="mb-4 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="text"
            id="first_name"
            name="first_name"
            value="{{ old('first_name') }}"
            placeholder="John"
            autofocus
          >
          @if ($errors->has('first_name'))
              <small class="form-control-feedback">{{ $errors->first('first_name') }}</small>
          @endif
        </div>
        
        <div class="mb-4 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="text"
            id="last_name"
            name="last_name"
            value="{{ old('last_name') }}"
            placeholder="Doe"
          >
          @if ($errors->has('last_name'))
              <small class="form-control-feedback">{{ $errors->first('last_name') }}</small>
          @endif
        </div>
        
        <div class="mb-4 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="johndoe@gmail.com"
          >
          @if ($errors->has('email'))
              <small class="form-control-feedback">{{ $errors->first('email') }}</small>
          @endif
        </div>

        <div class="g-mb-30 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="password"
            placeholder="Password"
            id="password"
            name="password"
          >
          @if ($errors->has('password'))
            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
          @endif
        </div>
        
        <div class="g-mb-30 u-has-error-v1">
          <input
            class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
            type="password"
            placeholder="Confirm Password"
            id="password-confirm"
            name="password_confirmation"
          >
        </div>
        
        <div class="g-mb-30 u-has-error-v1">
          <label class="form-check-inline u-check g-pl-25">
            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}>
            <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
              <i class="fa" data-check-icon=""></i>
            </div>
            I agree with terms and conditions.
          </label>
          @if ($errors->has('terms'))
            <small class="form-control-feedback">{{ $errors->first('terms') }}</small>
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
        <p class="g-color-gray-dark-v5 mb-0">Already have an account? <a class="g-font-weight-600" href="{{ route('login') }}">signin</a>
        </p>
      </footer>
    </div>
    
@endsection
    
