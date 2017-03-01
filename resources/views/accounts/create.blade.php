@extends('layouts.admin')

@section('content')
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               Create Account
               <small>some small phrase</small>
            </div>
                <!-- START row-->
                <div class="row">
                   <div class="col-sm-9">
                      <!-- START panel-->
                      <div class="panel panel-default">
                         <div class="panel-body">
                            <form role="form" method="POST" action="/accounts" >
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('account_id') ? ' has-error' : '' }}">
                                  <label>Account ID</label>
                                  <input type="text" name="account_id" placeholder="Enter account id" class="form-control">
    @if ($errors->has('account_id'))
    <span class="help-block">
    <strong>{{ $errors->first('account_id') }}</strong>
    </span>
    @endif
                               </div>
                               <div class="form-group{{ $errors->has('publishable_key') ? ' has-error' : '' }}">
                                  <label>Publishable Key</label>
                                  <input type="text" name="publishable_key" placeholder="Enter publishable key" class="form-control">
    @if ($errors->has('publishable_key'))
    <span class="help-block">
    <strong>{{ $errors->first('publishable_key') }}</strong>
    </span>
    @endif
                               </div>
                               <div class="form-group{{ $errors->has('secret_key') ? ' has-error' : '' }}">
                                  <label>Secret Key</label>
                                  <input type="text" name="secret_key" placeholder="Enter secret key" class="form-control">
    @if ($errors->has('secret_key'))
    <span class="help-block">
    <strong>{{ $errors->first('secret_key') }}</strong>
    </span>
    @endif
                               </div>

                               <button type="submit" class="btn btn-sm btn-primary pull-right">Create Account</button>
                            </form>
                         </div>
                      </div>
                      <!-- END panel-->
                   </div>
         </div>
      </section>
@endsection