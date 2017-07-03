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
      <h1>{{ $thread->title }}</h1>
      <h2><a href="/forums/profiles/{{ $thread->user->username }}">{{ $thread->user->name }}</a></h2>
      {{ $thread->body }}
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    
    <table class="table table-striped table-bordered">
      <tbody>
    
    @forelse($replies as $reply)
      @include('threads.reply')
    @empty
      <tr><td>No replies at this time.</td></tr>
    @endforelse
    
      </tbody>
    </table>

    @if(!Auth::guest())
      <form method="POST" action="{{ $thread->path() . '/replies'}}">
          {{ csrf_field() }}
        <div class="form-group{{ $errors->first('body') ? ' has-danger' : '' }}">
    <textarea class="form-control{{ $errors->first('body') ? ' form-control-danger' : '' }}" id="body" name="body" title="body"  placeholder="Have something to say?" rows="5" required>{{ old('body') }}</textarea>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary pull-right">Reply</button>
    </div>
      </form>
    @else
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif    

    {{ $replies->links('vendor.pagination.bootstrap-4') }}
    
    </div>
  </div>
</section>
    
@endsection    