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

      <title>Threads - Taraloka</title>
@endsection
    
@section('content')

<section class="container site-content">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
<a href="#">{{ $thread->user->name }}</a>
posted
{{ $thread->title }}
          </div>
          <div class="card-block">
            {{ $thread->body }}
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    @foreach($thread->replies as $reply)
      @include('forums::threads.reply')
    @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    @if(!Auth::guest())
      <form method="post" action="{{ $thread->path() . '/replies'}}">
          {{ csrf_field() }}
        <div class="form-group">
          <textarea class="form-control" id="body" name="body" title="body"  placeholder="Have something to say?" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-primary pull-right">Reply</button>
      </form>
    @else
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif
    </div>
  </div>
</section>
    
@endsection    