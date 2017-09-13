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

      <title>Edit {{ $thread->title }}</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Forums', 'url' => '/forums'],
        ['label' => $forum->title, 'url' => $forum->path()],
        ['label' => $thread->title, 'url' => $thread->path()],
        ['label' => 'Edit', 'url' => $thread->path() . '/edit'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Edit {{ $thread->title }}</h1>
        </div>
        <div class="card-block">

      <form method="POST" action="{{ $thread->path() }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group{{ $errors->first('title') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="title">Title</label>
          <input type="text" class="form-control{{ $errors->first('title') ? ' form-control-danger' : '' }}" id="title" name="title" title="title" aria-describedby="titleHelp" placeholder="Let us name this biatch" value="{{ $thread->title }}" required>
          @if($errors->first('title'))
          <small id="titleHelp" class="form-control-feedback">{{ $errors->first('title') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('slug') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="slug">Slug</label>
          <input type="text" class="form-control{{ $errors->first('slug') ? ' form-control-danger' : '' }}" id="slug" name="slug" title="slug" aria-describedby="slugHelp" placeholder="let-us-name-this-biatch" value="{{ $thread->slug }}" required>
          @if($errors->first('slug'))
          <small id="slugHelp" class="form-control-feedback">{{ $errors->first('slug') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('body') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="body">Body</label>
    <textarea class="form-control{{ $errors->first('body') ? 'form-control-danger' : '' }}" id="body" name="body" title="body" aria-describedby="bodyHelp" placeholder="Have something to say?" rows="5" required>{{ $thread->body  }}</textarea>
          @if($errors->first('body'))
          <small id="bodyHelp" class="form-control-feedback">{{ $errors->first('body') }}</small>
          @endif
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary pull-right">Edit</button>
        <button type="cancel" name="cancel" value="true" class="btn btn-lg btn-link pull-right">Cancel</button>
    </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection