@extends('layouts.master')

@section('meta')
      <meta description="The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta keywords="taraloka, sikkim, india, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="187097078310518">
   
      <meta name="og:url" property="og:url" content="https://taraloka.org">
      <meta name="og:type" property="og:type" content="article">
      <meta name="og:title" property="og:title" content="Taraloka Foundation">
      <meta name="og:description" property="og:description" content="The Taraloka Foundation is a registered 501(c)3 non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta name="og:image" property="og:image" content="https://taraloka.org/img/taraloka-logo-og-dark.png">

      <title>Home - Taraloka</title>
@endsection
    
@section('content')
<div id="carouselMain" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselMain" data-slide-to="0" class="active"></li>
        <li data-target="#carouselMain" data-slide-to="1"></li>
        <li data-target="#carouselMain" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid hidden-sm-down" src="/img/girls-waterfall-large.jpg" alt="Girls at a waterfall">
          <img class="d-block img-fluid hidden-md-up" src="/img/girls-waterfall-small.jpg" alt="Girls at a waterfall">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid hidden-sm-down" src="/img/hugs-and-smiles-large.jpg" alt="Hugs and smiles">
          <img class="d-block img-fluid hidden-md-up" src="/img/hugs-and-smiles-small.jpg" alt="Hugs and smiles">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
        </div>
        <div class="carousel-item">
              <img class="d-block img-fluid hidden-sm-down" src="/img/headlamp-large.jpg" alt="Headlamps">
          <img class="d-block img-fluid .hidden-md-up" src="/img/headlamp-small.jpg" alt="Headlamps">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselMain" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselMain" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
@endsection
