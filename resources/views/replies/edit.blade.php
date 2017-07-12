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

      <title>Edit Reply #{{ $reply->id }}</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Replies', 'url' => '/replies'],
        ['label' => 'Reply #' . $reply->id, 'url' => $reply->path()],
        ['label' => 'Edit', 'url' => $reply->path() . '/edit'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Edit Reply</h1>
        </div>
        <div class="card-block">

      <form method="POST" action="{{ $reply->path() }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group{{ $errors->first('content') ? ' has-danger' : '' }}">
    <textarea class="form-control{{ $errors->first('content') ? ' form-control-danger' : '' }}" id="content" name="content" title="content"  placeholder="Have something to say?" rows="5" required>{{ $reply->content }}</textarea>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary pull-right">Edit</button>
        <button type="cancel" class="btn btn-lg btn-link pull-right">Cancel</button>
    </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection