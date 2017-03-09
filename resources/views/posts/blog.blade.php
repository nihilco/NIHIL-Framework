@extends('layouts.admin')

@section('content')

<!-- Main section-->
          <section>
         <!-- Page content-->
                      <div class="content-wrapper">
                <div class="row">
                   <!-- Blog Content-->
                   <div class="col-lg-9">

<?php
    $cols = array();
    $c = 1;
    foreach($posts as $post)
    {
        $cols[$c][] = $post;
     
        if($c == 3) {
            $c = 1;
        }else{
            $c++;
        }
    }
?>
@if(count($posts))    
                      <div class="row">
                         <!-- Posts column 1-->
                         <div class="col-lg-4">
    @foreach($cols[1] as $post)
    @include('posts.post')
    @endforeach

                         </div>
                         <!-- Posts column 2-->
                         <div class="col-lg-4">
    @foreach($cols[2] as $post)
    @include('posts.post')
    @endforeach
                         </div>
                         <!-- Posts column 3-->
                         <div class="col-lg-4">
    @foreach($cols[3] as $post)
    @include('posts.post')
    @endforeach
                         </div>
                      </div>
@else
    <div class="row">
        <div class="col-lg-12">
            No posts found.
        </div>
    </div>
@endif
                   </div>
                   <!-- Blog Sidebar-->
                   <div class="col-lg-3">
                      <!-- Search-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Search</div>
                         <div class="panel-body">
                            <form class="form-horizontal">
                               <div class="input-group">
                                  <input type="text" placeholder="Search for..." class="form-control">
                                  <span class="input-group-btn">
                                     <button type="button" class="btn btn-default">
                                        <em class="fa fa-search"></em>
                                     </button>
                                  </span>
                               </div>
                            </form>
                         </div>
                      </div>
                      <!-- Categories-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Categories</div>
                         <div class="panel-body">
                            <ul class="list-unstyled">
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Smartphones</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Mobiles</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Tech</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Inpiration</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Workspace</a>
                               </li>
                            </ul>
                         </div>
                      </div>
                      <!-- Tag Cloud-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Tag Cloud</div>
                         <div class="panel-body">
                            <div id="jqcloud" class="center-block"></div>
                         </div>
                      </div>
                      <!-- Ads-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Ads</div>
                         <div class="panel-body">
                            <a href="">
                               <img src="img/mockup.png" class="img-responsive img-thumbnail">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
    
@endsection