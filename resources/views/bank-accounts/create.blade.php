@extends('layouts.admin')

@section('content')
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               Create Post
               <small>some small phrase</small>
            </div>
                <!-- START row-->
                <div class="row">
                   <div class="col-sm-9">
                      <!-- START panel-->
                      <div class="panel panel-default">
                         <div class="panel-body">
                            <form role="form" method="POST" action="/posts" >
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                  <label>Title</label>
                                  <input type="text" name="title" placeholder="Enter title" class="form-control">
    @if ($errors->has('title'))
    <span class="help-block">
    <strong>{{ $errors->first('title') }}</strong>
    </span>
    @endif
                               </div>
                               <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                   <label>Content</label>
                                   <textarea name="content" class="form-control" rows="5" placeholder="Enter content..."></textarea>
        @if ($errors->has('content'))
    <span class="help-block">
    <strong>{{ $errors->first('content') }}</strong>
    </span>
    @endif
                               </div>
                               <button type="submit" class="btn btn-sm btn-primary pull-right">Create Post</button>
                            </form>
                         </div>
                      </div>
                      <!-- END panel-->
                   </div>
         </div>
      </section>
@endsection