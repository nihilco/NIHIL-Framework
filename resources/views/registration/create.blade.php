@extends('layouts.minimal')

@section('content')

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-block text-center">
                <div>
                  <h2>Already registered?</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="{{ route('login') }}" class="btn btn-primary active mt-3">Login Now!</a>
                </div>
              </div>
            </div>
            <div class="card p-4">
              <div class="card-block">
                <h1>Register</h1>
                <p class="text-muted">Create your account</p>

                <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" method="POST" action="{{ route('signup') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-address"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                      <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}"  aria-describedby="addon-address" placeholder="Name" value="{{ old('name') }}" autocomplete="on" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                      <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-user"><i class="icon-user"></i></span>
                      <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' form-control-danger' : '' }}"  aria-describedby="addon-user" placeholder="Username" value="{{ old('username') }}" autocomplete="on" required>
                    </div>
                    @if ($errors->has('username'))
                      <div class="form-control-feedback">{{ $errors->first('username') }}</div>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-envelope"><i class="icon-envelope"></i></span>
                      <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"  aria-describedby="addon-envelope" placeholder="Email" value="{{ old('email') }}" autocomplete="on" required>
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

                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mb-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="addon-lock"><i class="icon-lock"></i></span>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' form-control-danger' : '' }}" aria-describedby="addon-lock" placeholder="Confiirm Password" autocomplete="off" required>
                    </div>
                    @if ($errors->has('password_confirmation'))
                      <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                  </div>

                      <div class="form-group{{ $errors->has('agreed') ? ' has-danger' : '' }}">

                        <label class="switch switch-icon switch-success-outline-alt">
    <input type="checkbox" name="agreed" class="switch-input"{{ old('agreed') ? ' checked' : '' }}>
                          <span class="switch-label" data-on="" data-off=""></span>
                          <span class="switch-handle"></span>
                        </label>
    &nbsp;I agree with the <a href="#">terms</a>    

                         @if ($errors->has('agreed'))
                          <div class="form-control-feedback">{{ $errors->first('agreed') }}</div>
                         @endif
                      </div>

                <div class="row">
                  <div class="col-6">

                  </div>
                         </form>
                  <div class="col-6 text-right">
                        <button type="submit" class="btn btn-primary px-4">Register</button>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
