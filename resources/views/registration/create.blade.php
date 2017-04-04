@extends('layouts.minimal')

@section('content')

                <div class="panel-body">
                   <p class="text-center pv">SIGNUP TO GET INSTANT ACCESS.</p>
                   <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" method="POST" action="{{ route('signup') }}">
                      {{ csrf_field() }}
                      <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                         <label for="name" class="text-muted">Name</label>
                         <input id="name" type="text" class="form-control" name="name" placeholder="John Smith" autocomplete="off" value="{{ old('name') }}" required autofocus>
                         <span class="fa fa-user form-control-feedback text-muted"></span>
                         @if ($errors->has('name'))
                         <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                         </span>
                         @endif
                      </div>
                      <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                         <label for="username" class="text-muted">Username</label>
                         <input id="username" type="text" class="form-control" name="username" placeholder="jsmith" autocomplete="off" value="{{ old('username') }}" required>
                         <span class="fa fa-user form-control-feedback text-muted"></span>
                         @if ($errors->has('username'))
                         <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                         </span>
                         @endif
                      </div>
                      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                         <label for="email" class="text-muted">Email</label>
                         <input id="email" type="email" class="form-control" name="email" placeholder="jsmith@example.com" autocomplete="off" value="{{ old('email') }}" required>
                         <span class="fa fa-envelope form-control-feedback text-muted"></span>
                         @if ($errors->has('email'))
                         <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                         </span>
                         @endif
                      </div>
                      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                         <label for="password" class="text-muted">Password</label>
                         <input id="password" type="password" class="form-control" name="password" placeholder="W0rdP@ss!" required>
                         <span class="fa fa-lock form-control-feedback text-muted"></span>
                         @if ($errors->has('password'))
                         <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                         </span>
                         @endif
                      </div>
                      <div class="form-group has-feedback">
                         <label for="password_confirmation" class="text-muted">Confirm Password</label>
                         <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="W0rdP@ss!" data-parsley-equalto="#password" required>
                         <span class="fa fa-lock form-control-feedback text-muted"></span>
                      </div>
                      <div class="form-group has-feedback{{ $errors->has('agreed') ? ' has-error' : '' }}">
    <div class="checkbox c-checkbox">
                                <label>
                               <input type="checkbox" name="agreed" data-parsley-multiple="agreed" {{ old('agreed') ? 'checked' : '' }}>
                               <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
                            </label>
    </div>
                         @if ($errors->has('agreed'))
                         <span class="help-block">
                            <strong>{{ $errors->first('agreed') }}</strong>
                         </span>
                         @endif
                      </div>
    
                      <button type="submit" class="btn btn-block btn-primary mt-lg">Create account</button>
                   </form>
                   <p class="pt-lg text-center">Have an account?</p><a href="{{ route('login') }}" class="btn btn-block btn-default">Login</a>
                </div>
             </div>
@endsection
