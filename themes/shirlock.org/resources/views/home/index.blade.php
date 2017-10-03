@extends('layouts.template')

@section('meta')
      <meta description="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta keywords="shirlock, college, cancer, atlanta, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="567784843612818">
    
      <meta property="og:url" content="https://shirlock.org">
      <meta property="og:type" content="article">
      <meta property="og:title" content="The Shirlock Foundation">
      <meta property="og:description" content="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta property="og:image" content="https://shirlock.org/img/shirlock-logo-og.png">

      <title>Shirlock Foundation</title>
@endsection
    
@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="/img/monday-night-banner.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption d-md-block text-left">
              <h1>10th Anniversary Celebration</h1>
              <p>The Shirlock Foundation turns 10! Come out on November 5th, celebrate with us at Monday Night Brewings new Beltline Facility, and support the cause.  Tickets are on sale now, so get yours today.</p>
              <p><a class="btn btn-lg btn-primary" href="/tenth-anniversary" role="button">Buy Tickets<a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="/img/bourbon-chase-banner.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption d-md-block text-left">
              <h1>Bourbon Chase</h1>
              <p>&quot;A 200-mile relay race along the Kentucky Bourbon Trail, The Bourbon Chase celebrates the best of Kentucky. It is a 200-mile journey across the Bluegrass State – through our historic bourbon distilleries, across our majestic horse country, and into our enchanting small towns.&quot;</p>
              <p><a class="btn btn-lg btn-primary" href="https://www.bourbonchase.com/" role="button" target="_blank">Learn more</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">
      <div class="col">
        <div class="jumbotron jumbotron-shirlock">
          <div class="container text-center">
            <h2><strong>The Shirlock Foundation</strong> is committed to financially assisting the families of college students who are battling cancer.</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container" id="big-three">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-4">
          <h2>Apply Online</h2>
          <p>Are you a college student battling cancer?  Our online application is quick and easy - give it a try. We want to help.</p>
          <p><a class="btn btn-success" href="/apply" role="button">Apply &raquo;</a></p>
        </div>
        <div class="col-sm-4">
          <h2>Nominate a Loved One</h2>
          <p>Know someone who qualifies for one of our awards?  You can nominate him/her online and we will follow-up.</p>
          <p><a class="btn btn-success" href="/nominate" role="button">Nominate &raquo;</a></p>
        </div>
        <div class="col-sm-4">
          <h2>PDF Forms</h2>
          <p>Are you a paper person?  You can download any of our forms, our publically filed tax information, and other related documents.</p>
          <p><a class="btn btn-success" href="/downloads" role="button">Downloads &raquo;</a></p>
        </div>
      </div>
    </div> <!-- /container -->
    
@endsection