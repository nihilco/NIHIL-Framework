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

      <title>Create User</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Users', 'url' => '/users'],
        ['label' => 'Create', 'url' => '/users/create'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Create User</h1>
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
    
      <form method="POST" action="/users">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->first('name') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="name">Name</label>
          <input type="text" class="form-control{{ $errors->first('name') ? ' form-control-danger' : '' }}" id="name" name="name" title="name" aria-describedby="nameHelp" placeholder="John Smith" value="{{ old('name') }}" required>
          @if($errors->first('name'))
          <small id="nameHelp" class="form-control-feedback">{{ $errors->first('name') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('username') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="username">Username</label>
          <input type="text" class="form-control{{ $errors->first('username') ? ' form-control-danger' : '' }}" id="username" name="username" title="username" aria-describedby="usernameHelp" placeholder="jsmith" value="{{ old('username') }}" required>
          @if($errors->first('abbr'))
          <small id="usernameHelp" class="form-control-feedback">{{ $errors->first('username') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('email') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="email">Email</label>
          <input type="email" class="form-control{{ $errors->first('email') ? ' form-control-danger' : '' }}" id="email" name="email" title="email" aria-describedby="emailHelp" placeholder="jsmith@example.com" value="{{ old('email') }}" required>
          @if($errors->first('email'))
          <small id="emailHelp" class="form-control-feedback">{{ $errors->first('email') }}</small>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary pull-right">Create User</button>
        </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection