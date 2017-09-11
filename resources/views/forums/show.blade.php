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

    <title>{{ $forum->title }}</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Forums', 'url' => '/forums'],
        ['label' => $forum->title, 'url' => $forum->path()],
    ]])
  <div class="container-fluid">
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>{{ $forum->title }}</h1>
        </div>
        <div class="card-block">
    @if($forum->threads->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Thread</th>
          <th>Replies</th>
          <th>Last Reply</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
@foreach($forum->threads as $thread)
        <tr>
          <th scope="row"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></th>
          <td>{{ $thread->replies->count() }}</td>
          <td>{{ $thread->created_at->diffForHumans() }}</td>
          <th>
@if(!Auth::guest())
    @include('votes.voter', ['resource' => $thread])
    @include('favorites.favoriter', ['resource' => $thread])
    @include('follows.follower', ['resource' => $thread])
@endif

      @can('update', $thread)
        <a href="{{ $thread->path() . '/edit' }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
      @endcan
@can ('delete', $thread)
             <form action="{{ $thread->path() }}" method="POST" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
             </form>
@endcan
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No threads at this time.</td></tr>
    @endif
    
        </div>
      </div>
    </div>
  </div>

      <div class="row">
    <div class="col">
      <div class="card">
            <div class="card-block">
    @if(!Auth::guest())
        <a href="{{ $forum->path() }}/threads/create" class="btn btn-lg btn-primary pull-right">New Thread</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    
@endsection    