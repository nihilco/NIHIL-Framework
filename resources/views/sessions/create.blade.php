@extends('layouts.minimal')

@section('content')

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card p-4">
              <div class="card-block">
                <h1>Login</h1>
                <p class="text-muted">Sign in to your account</p>

                <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-envelope"><i class="icon-envelope"></i></span>
                      <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"  aria-describedby="addon-envelope" placeholder="Email" value="{{ old('email') }}" autocomplete="off" required>
                    </div>
                    @if ($errors->has('email'))
                      <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-lock"><i class="icon-lock-open"></i></span>
                      <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" aria-describedby="addon-lock" placeholder="Password" autocomplete="off" required>
                    </div>
                    @if ($errors->has('password'))
                      <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary px-4">Login</button>
                  </div>
                         </form>
                  <div class="col-6 text-right">
<a href="{{ route('password.request') }}"  class="btn btn-link p-x-0">Forgot password?</a>

                  </div>
                </div>
              
              </div>
            </div>
            <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-block text-center">
                <div>
                  <h2>Need an account?</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="{{ route('signup') }}" class="btn btn-primary active mt-3">Register Now!</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

@endsection
