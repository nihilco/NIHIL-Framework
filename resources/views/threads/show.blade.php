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

    <title>{{ $thread->title }}</title>
@endsection
    
@section('content')

        @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Forums', 'url' => '/forums'],
        ['label' => $forum->title, 'url' => $forum->path()],
        ['label' => $thread->title, 'url' => $thread->path()],
    ]])
  <div class="container-fluid">
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>{{ $thread->title }}</h1>
          <h2><a href="/users/{{ $thread->user->username }}">{{ $thread->user->name }}</a></h2>
        </div>
        <div class="card-block">
         {{ $thread->body }}
        </div>
      </div>
    </div>
  </div>

    @forelse($replies as $reply)
      @include('threads.reply')
    @empty
      <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-block">
        No replies at this time.
        </div>
      </div>
    </div>
  </div>
    @endforelse

    @if($replies->count() > 10)
    <div class="row">
    <div class="col"
        {{ $replies->links('vendor.pagination.bootstrap-4') }}
    </div>
    </div>
    @endif
    
      <div class="row">
    <div class="col">
      <div class="card">
    @if(!Auth::guest())
            <div class="card-header">
          Feel free to leave a reply
        </div>
        <div class="card-block">
      <form method="POST" action="{{ '/replies' }}">
          {{ csrf_field() }}
    <input type="hidden" name="resource_id" value="{{ $thread->id }}">
    <input type="hidden" name="resource_type" value="{{ get_class($thread) }}">
        <div class="form-group{{ $errors->first('content') ? ' has-danger' : '' }}">
    <textarea class="form-control{{ $errors->first('content') ? ' form-control-danger' : '' }}" id="content" name="content" title="content"  placeholder="Have something to say?" rows="5" required>{{ old('content') }}</textarea>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary pull-right">Reply</button>
    </div>
      </form>
    @else
            <div class="card-block">
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

</div>

    
@endsection