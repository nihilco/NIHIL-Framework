@extends('layouts.template')

@section('meta')
      <meta description="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta keywords="shirlock, college, cancer, atlanta, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="567784843612818">
    
      <meta property="og:url" content="https://shirlock.org/downloads">
      <meta property="og:type" content="article">
      <meta property="og:title" content="Downloads | The Shirlock Foundation">
      <meta property="og:description" content="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta property="og:image" content="https://shirlock.org/img/shirlock-logo-og.png">

      <title>Downloads | Shirlock Foundation</title>
@endsection
    
@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

    <h1>Downloads</h1>

    <div class="row">
      <div class="col-sm-3 text-center">
        <a href="https://shirlock.org/files/Sara_Keene_Memorial_Scholarship-Application.pdf" target="_blank">
          <h5><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i><br />Keene Award Application</h5>
        </a>
      </div>
      <div class="col-sm-3 text-center">
        <a href="https://shirlock.org/files/Sara_Keene_Memorial_Scholarship-Nomination.pdf" target="_blank">
          <h5><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i><br />Keene Award Nomination Form</h5>
        </a>
      </div>
    </div>

    </div>
    <div class="col-md-4">

      <div class="card card-shirlock top-card">
        <div class="card-body">

          <h4>Remember, you can also <a href="/apply">apply</a> for our Keene Award or <a href="/nominate">nominate</a> a loved one online.</h3>
    
        </div>
      </div>
    
    </div>
  </div>
</div> <!-- /container -->
@endsection