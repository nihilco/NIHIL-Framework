@extends('layouts.admin')

@section('content')
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               Create Ticket
               <small>some small phrase</small>
            </div>
                <!-- START row-->
                <div class="row">
                   <div class="col-sm-9">
                      <!-- START panel-->
                      <div class="panel panel-default">
                         <div class="panel-body">
                            <form role="form" method="POST" action="/tickets" >
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('one_liner') ? ' has-error' : '' }}">
                                  <label>One Liner</label>
                                  <input type="text" name="one_liner" placeholder="Enter one liner" class="form-control">
    @if ($errors->has('one_liner'))
    <span class="help-block">
    <strong>{{ $errors->first('one_liner') }}</strong>
    </span>
    @endif
                               </div>
                               <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                   <label>Description</label>
                                   <textarea name="description" class="form-control" rows="5" placeholder="Enter description..."></textarea>
        @if ($errors->has('description'))
    <span class="help-block">
    <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif
                               </div>
                               <button type="submit" class="btn btn-sm btn-primary pull-right">Create Ticket</button>
                            </form>
                         </div>
                      </div>
                      <!-- END panel-->
                   </div>
         </div>
      </section>
@endsection