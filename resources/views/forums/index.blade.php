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

      <title>Forums</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Forums', 'url' => '/forums'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    @forelse($forums->where('parent_id',null) as $tlforum)
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>
            {{ $tlforum->title }}
          </h1>
        </div>
        <div class="card-block">
    @if($forums->where('parent_id', $tlforum->id)->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Forum</th>
          <th>Threads</th>
          <th>Replies</th>
          <th>Last Reply</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
@foreach($forums->where('parent_id', $tlforum->id) as $forum)
        <tr>
          <th scope="row"><a href="{{ $forum->path() }}">{{ $forum->title }}</a></th>
          <td>{{ $forum->threads_count }}</td>
          <td>0</td>
          <td>{{  $forum->updated_at->diffForHumans() }}</td>
          <td>
        @can ('delete', $forum)
             <form action="{{ $forum->path() }}" method="POST" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
             </form>
@endcan
                   @if(!Auth::guest())
             @include('favorites.favoriter', ['resource' => $forum])
             @include('follows.follower', ['resource' => $forum])
                   @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No forums in this parent forum.</td></tr>
    @endif
    
        </div>
        <div class="card-footer text-muted">
        @can ('delete', $tlforum)
             <form action="{{ $tlforum->path() }}" method="POST" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
             </form>
@endcan
                   @include('favorites.favoriter', ['resource' => $tlforum])
                   @include('follows.follower', ['resource' => $tlforum])
        </div>
      </div>
    </div>
  </div>
    
    @empty
    <div class="row">
      <div class="col">
        <p>No forums at this time.</p>
      </div>
    </div>
    @endforelse

      <div class="row">
    <div class="col">
      <div class="card">
            <div class="card-block">
    @if(!Auth::guest())
        <a href="/forums/create" class="btn btn-lg btn-primary pull-right">New Forum</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
@endsection    