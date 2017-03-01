@extends('layouts.admin')

@section('content')
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               Create Tag
               <small>some small phrase</small>
            </div>
                <!-- START row-->
                <div class="row">
                   <div class="col-sm-9">
                      <!-- START panel-->
                      <div class="panel panel-default">
                         <div class="panel-body">
                            <form role="form" method="POST" action="/tags" >
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label>Name</label>
                                  <input type="text" name="name" placeholder="Enter name" class="form-control">
    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
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
                               <button type="submit" class="btn btn-sm btn-primary pull-right">Create Tag</button>
                            </form>
                         </div>
                      </div>
                      <!-- END panel-->
                   </div>
         </div>
      </section>
@endsection