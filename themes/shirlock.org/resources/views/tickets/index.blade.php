@extends('layouts.template')

@section('meta')
      <meta description="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta keywords="shirlock, college, cancer, atlanta, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="567784843612818">
    
      <meta property="og:url" content="https://shirlock.org/about">
      <meta property="og:type" content="article">
      <meta property="og:title" content="About | Shirlock Foundation">
      <meta property="og:description" content="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta property="og:image" content="https://shirlock.org/img/shirlock-logo-og.png">

      <title>Tickets | Shirlock Foundation</title>
@endsection
    
@section('content')

  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Tickets</h1>
        </div>
        <div class="card-block">
    @if($tickets->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Ticket</th>
          <th>User</th>
          <th>Last Update</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tickets as $ticket)
        <tr>
<th scope="row"><a href="{{ $ticket->path() }}">{{ $ticket->slug }}</a></th>
          <td>{{ $ticket->creator->name }}</td>
          <td>{{ $ticket->updated_at->diffForHumans() }}</td>
          <th>&nbsp;</th>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No tickets at this time.</td></tr>
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
        <a href="/invoices/create" class="btn btn-lg btn-primary pull-right">New Ticket</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to manage tickets.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
@endsection