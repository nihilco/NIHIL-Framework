@extends('layouts.master')

@section('content')
    <!-- START: SITE BANNER -->
        <section id="site-banner">

      <div class="row">

    <!-- START: CTA SLIDER -->
             <div class="col-sm-12">

               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 <!-- Indicators -->
                 <ol class="carousel-indicators">
                 <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                 <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                 </ol>

                 <!-- Wrapper for slides -->
                 <div class="carousel-inner">
                 <div class="item active">
                   <img src="/img/girls-waterfall-cropped.png" alt="Slide 1" />
                   <div class="carousel-caption">
                         <!--<h2><a href="/donate">Make your end of the year donation today.</a></h2>-->
                     </div>
                 </div>
                 </div>

                 <!-- Controls -->
                 <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                 <span class="glyphicon glyphicon-chevron-left"></span>
                 </a>
                 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                 <span class="glyphicon glyphicon-chevron-right"></span>
                 </a>-->
               </div>
             </div>
         <!-- END: CTA SLIDER -->

                </div>

              </section>
              <!-- END: SITE BANNER -->
@endsection
