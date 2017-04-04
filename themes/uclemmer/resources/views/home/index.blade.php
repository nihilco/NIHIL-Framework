<?php
use App\Post;
?>

@extends('layouts.master')

@section('content')

  <div class="blog-header">
    <div class="container">
      <h1 class="blog-title">uclemmer blog</h1>
      <p class="lead blog-description">Ordo ab chao - order out of chaos.</p>
    </div>
  </div>

  <div class="container">

    <div class="row">

      <div class="col-sm-8 blog-main">

    @php
        $posts = Post::all()->sortByDesc("published_at");
    @endphp
    
    @if(count($posts) > 0)

        @php
            $c = 1;
        @endphp
        @foreach($posts as $post)

            @if($c == 1)
                @include('posts.post')
            @else
                @include('posts.short')
            @endif

            @php
                $c++;
            @endphp
                    
        @endforeach
        
    @else

        <p>No posts.</p>
        
    @endif

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->        
        
@endsection