@extends('layouts.admin')

@section('content')
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               Create Payment
               <small>some small phrase</small>
            </div>
                <!-- START row-->
                <div class="row">
                   <div class="col-sm-9">
                      <!-- START panel-->
                      <div class="panel panel-default">
                         <div class="panel-body">
                            <form role="form" method="POST" action="/payments" >
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('charge_id') ? ' has-error' : '' }}">
                                  <label>Charge ID</label>
                                  <input type="text" name="charge_id" placeholder="Enter charge id" class="form-control">
    @if ($errors->has('charge_id'))
    <span class="help-block">
    <strong>{{ $errors->first('charge_id') }}</strong>
    </span>
    @endif
                               </div>
                               <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                   <label>Notes</label>
                                   <textarea name="notes" class="form-control" rows="5" placeholder="Enter notes..."></textarea>
        @if ($errors->has('notes'))
    <span class="help-block">
    <strong>{{ $errors->first('notes') }}</strong>
    </span>
    @endif
                               </div>
                               <button type="submit" class="btn btn-sm btn-primary pull-right">Create Payment</button>
                            </form>
                         </div>
                      </div>
                      <!-- END panel-->
                   </div>
         </div>
      </section>
@endsection