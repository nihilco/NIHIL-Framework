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

      <title>Pay Invoice #{{ $invoice->id }}</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Invoices', 'url' => '/invoives'],
        ['label' => 'Invoice #' . $invoice->id, 'url' => $invoice->path()],
        ['label' => 'Pay', 'url' => $invoice->path() . '/pay'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Pay Invoice #{{ $invoice->id }}</h1>
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
    
      <form method="POST" action="/payments">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->first('card') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="abbr">Card</label>
          <div id="card-element" class="field"></div>
          @if($errors->first('card'))
          <small id="cardHelp" class="form-control-feedback">{{ $errors->first('card') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->first('comments') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="comments">Comments</label>
          <textarea class="form-control{{ $errors->first('comments') ? 'form-control-danger' : '' }}" id="comments" name="comments" title="comments" aria-describedby="commentsHelp" placeholder="Have something to say?" rows="5" required>{{ old('comments') }}</textarea>
          @if($errors->first('comments'))
          <small id="commentsHelp" class="form-control-feedback">{{ $errors->first('comments') }}</small>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary pull-right">Pay ${{ $invoice->total }}</button>
        </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
    
  </div>
  </div>
@endsection