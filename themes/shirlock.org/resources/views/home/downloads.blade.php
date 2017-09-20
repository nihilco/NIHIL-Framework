@extends('layouts.template')

@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

    <h1>Downloads</h1>

    <div class="row">
      <div class="col-sm-3 text-center">
        <a href="https://shirlock.org/files/The_Sara_Keene_Memorial_Scholarship_Application.pdf" target="_blank">
          <h5><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i><br />Keene Award Application</h5>
        </a>
      </div>
      <div class="col-sm-3 text-center">
        <a href="https://shirlock.org/files/The_Sara_Keene_Memorial_Scholarship_Nomination_Form.pdf" target="_blank">
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