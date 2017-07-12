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

      <title>Threads</title>
@endsection
    
@section('content')

        @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Forums', 'url' => '/forums'],
        ['label' => 'Threads', 'url' => '/forums/threads'],
    ]])
  <div class="container-fluid">
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Threads</h1>
        </div>
        <div class="card-block">

    <table class="table table-striped table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Thread</th>
          <th>Forum</th>
          <th>Owner</th>
          <th>Replies</th>
          <th>Last Update</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

    @forelse($threads as $thread)
      @include('threads.thread')
    @empty
      <tr><td colspan="6">No threads at this time.</td></tr>
    @endforelse
    
      </tbody>
    </table>


        </div>
      </div>
    </div>
  </div>

@endsection