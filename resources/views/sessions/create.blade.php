@extends('layouts.minimal')

@section('content')
                  <div class="panel-body">
                     <p class="text-center pv">SIGN IN TO CONTINUE.</p>
                     <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="text-muted">Email</label>
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="jsmith@example.com" autocomplete="off" required autofocus>
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
                        <div class="clearfix">
                           <div class="checkbox c-checkbox pull-left mt0">
                              <label>
                                 <input type="checkbox" name="remember" data-parsley-multiple="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <span class="fa fa-check"></span>Remember Me
                              </label>
                           </div>
                           <div class="pull-right"><a href="{{ route('password.request') }}" class="text-muted">Forgot your password?</a>
                           </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
                     </form>
                     <p class="pt-lg text-center">Need to Signup?</p><a href="{{ route('signup') }}" class="btn btn-block btn-default">Register Now</a>
                  </div>
               </div>

@endsection
