@extends('layouts.master')

@section('meta')
      <meta description="The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta keywords="taraloka, sikkim, india, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="187097078310518">
    
      <meta name="og:url" property="og:url" content="https://taraloka.org/about">
      <meta name="og:type" property="og:type" content="article">
      <meta name="og:title" property="og:title" content="Taraloka Foundation">
      <meta name="og:description" property="og:description" content="The Taraloka Foundation is a registered 501(c)3 non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta name="og:image" property="og:image" content="https://taraloka.org/img/taraloka-logo-og-dark.png">

      <title>Forums - Taraloka</title>
@endsection
    
@section('content')

<section class="container site-content">
  <div class="row">
    <div class="col-sm-12">
      <h1>Forums</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">

<table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Threads</th>
          <th>Replies</th>
          <th>Last Update</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($forums as $forum)
        <tr>
          <th><h4><a href="{{ $forum->path() }}">{{ $forum->title }}</a></h4></th>
          <td>{{ $forum->threads_count }}</td>
          <td>{{ $forum->replyCount() }}</td>
          <td>{{ $forum->lastUpdate() }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
   
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    @if(!Auth::guest())
        <a href="/forums/create" class="btn btn-lg btn-primary pull-right">New Forum</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif
    </div>
  </div>
</section>
    
@endsection    