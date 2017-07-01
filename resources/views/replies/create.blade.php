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

      <title>Replies - Taraloka</title>
@endsection
    
@section('content')

<section class="container site-content">
  <div class="row">
    <div class="col-sm-12">
      <h1>Create Reply</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form method="POST" action="{{ $thread->path() . '/replies'}}">
          {{ csrf_field() }}
        <div class="form-group{{ $errors->first('body') ? ' has-danger' : '' }}">
    <label class="form-control-label" for="">Body</label>
    <textarea class="form-control{{ $errors->first() ? ' form-control-danger' : '' }}" id="body" name="body" title="body"  placeholder="Have something to say?" rows="5" required>{{ old('body') }}</textarea>
@if($errors->first('body'))
    <small class="form-control-feedback">{{ $errors->first('body') }}</small>
    @endif
        </div>
<div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary pull-right">Create Reply</button>
    </div>
      </form>

    </div>
  </div>
</section>
    
@endsection    