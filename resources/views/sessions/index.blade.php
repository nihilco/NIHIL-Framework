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

      <title>Sessions</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Sessions', 'url' => '/sessions'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Sessions</h1>
        </div>
        <div class="card-block">
    @if($sessions->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>User</th>
          <th>IP Address</th>
          <th>Last Update</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sessions as $session)
        <tr>
          <th scope="row"><a href="{{ $session->path() }}">{{ $session->user->username }}</a></th>
          <td>{{ $session->ip_address }}</td>
          <td>{{ $session->updated_at->diffForHumans() }}</td>
          <th>&nbsp;</th>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No sessions at this time.</td></tr>
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
        <a href="/sessions/create" class="btn btn-lg btn-primary pull-right">New Session</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to manage sessions.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
@endsection