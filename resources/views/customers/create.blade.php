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

      <title>Create Customer</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Customers', 'url' => '/customers'],
        ['label' => 'Create', 'url' => '/customers/create'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Create Customer</h1>
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
    
      <form method="POST" action="/customers">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->first('stripeId') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="stripeId">Stripe ID</label>
          <input type="text" class="form-control{{ $errors->first('stripeId') ? ' form-control-danger' : '' }}" id="stripeId" name="stripeId" title="stripeId" aria-describedby="stripeIdHelp" placeholder="cus_000000000000" value="{{ old('stripeId') }}" required>
          @if($errors->first('stripeId'))
          <small id="stripeIdHelp" class="form-control-feedback">{{ $errors->first('stripeId') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('account') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="account">Account</label>          
          <select class="form-control{{ $errors->first('account') ? ' form-control-danger' : '' }}" id="account" name="account" title="account" aria-describedby="accountHelp" required>
    @foreach($accounts as $account)
    <option value="{{ $account->id }}">{{ $account->name }}</option>
    @endforeach
          </select>
          @if($errors->first('account'))
          <small id="accountHelp" class="form-control-feedback">{{ $errors->first('account') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('user') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="user">User</label>          
          <select class="form-control{{ $errors->first('user') ? ' form-control-danger' : '' }}" id="user" name="user" title="user" aria-describedby="userHelp" required>
    @foreach($users as $user)
    <option value="{{ $user->id }}">{{ $user->username }}</option>
    @endforeach
          </select>
          @if($errors->first('user'))
          <small id="userHelp" class="form-control-feedback">{{ $errors->first('user') }}</small>
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
          <button type="submit" class="btn btn-lg btn-primary pull-right">Create Customer</button>
        </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection