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

      <title>Create Status</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Statuses', 'url' => '/statuses'],
        ['label' => 'Create', 'url' => '/statuses/create'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Create Status</h1>
        </div>
        <div class="card-block">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif
    
      <form method="POST" action="/statuses">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->first('name') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="name">Name</label>
          <input type="text" class="form-control{{ $errors->first('name') ? ' form-control-danger' : '' }}" id="name" name="name" title="name" aria-describedby="nameHelp" placeholder="Let us name this biatch" value="{{ old('name') }}" required>
          @if($errors->first('name'))
          <small id="nameHelp" class="form-control-feedback">{{ $errors->first('name') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('slug') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="slug">Slug</label>
          <input type="text" class="form-control{{ $errors->first('slug') ? ' form-control-danger' : '' }}" id="slug" name="slug" title="slug" aria-describedby="slugHelp" placeholder="let-us-name-this-biatch" value="{{ old('slug') }}" required>
          @if($errors->first('slug'))
          <small id="slugHelp" class="form-control-feedback">{{ $errors->first('slug') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('description') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="description">Description</label>
          <textarea class="form-control{{ $errors->first('description') ? 'form-control-danger' : '' }}" id="description" name="description" title="description" aria-describedby="descriptionHelp" placeholder="Have something to say?" rows="5" required>{{ old('description') }}</textarea>
          @if($errors->first('description'))
          <small id="descriptionHelp" class="form-control-feedback">{{ $errors->first('description') }}</small>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary pull-right">Create Status</button>
        </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection