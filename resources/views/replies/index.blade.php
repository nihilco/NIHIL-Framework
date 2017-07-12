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

      <title>Replies</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Replies', 'url' => '/replies'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Replies</h1>
        </div>
        <div class="card-block">
    @if($replies->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>User</th>
          <th>Resource ID</th>
          <th>Resource Type</th>
          <th>Last Update</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($replies as $reply)
        <tr>
          <th scope="row"><a href="{{ $reply->path() }}">{{ $reply->user->username }}</a></th>
          <td>{{ $reply->resource_id }}</td>
          <td>{{ $reply->resource_type }}</td>
          <td>{{ $reply->updated_at->diffForHumans() }}</td>
          <th>&nbsp;</th>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No replies at this time.</td></tr>
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
        <a href="/replies/create" class="btn btn-lg btn-primary pull-right">New Reply</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to manage replies.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
@endsection