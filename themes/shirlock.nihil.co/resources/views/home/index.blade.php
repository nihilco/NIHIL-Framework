@extends('layouts.template')
    
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
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>10th Anniversary Celebration</h1>
              <p>The Shirlock Foundation turns 10! Come out on November 5th, celebrate with us at Monday Night Brewings new Beltline Facility, and support the cause.  Tickets are on sale now, so get yours today.</p>
              <p><a class="btn btn-lg btn-primary" href="tenth-anniversay.html" role="button">Buy Tickets<a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="/img/bourbon-chase-banner.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Boubon Chase</h1>
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

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Apply Online</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-success" href="apply.html" role="button">Apply &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Nominate a Loved One</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-success" href="nominate.html" role="button">Nominate &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>PDF Forms</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-success" href="downloads.html" role="button">Download &raquo;</a></p>
        </div>
      </div>
    </div> <!-- /container -->
    
@endsection