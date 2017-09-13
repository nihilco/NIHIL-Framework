@extends('layouts.template')

@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

      <h1>Contact</h1>

      <p>Applications should be mailed to the P.O. Box or emailed to <a href="mailto:apply@shirlock.org" target="_blank">apply@shirlock.org</a>.</p>

    <p>For all other inquiries, you can contact us by mail, email, or by completing the following form:</p>

    <form>
    <div class="form-row">
      <div class="form-group col">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Smith">
      </div>
      <div class="form-group col">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="jsmith@example.com">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="exampleFormControlInput1">Subject</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sample Subject">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
</div>
    <div class="form-row">
      <div class="form-group col">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
    </form>

    </div>
    <div class="col-md-4">

      <div class="card card-shirlock top-card">
        <div class="card-body">

          <strong>The Shirlock Foundation</strong><br />
          P.O. Box 79225<br />
          Atlanta, GA 30357<br />
          <a href="tel:14048550742" target="_blank">(404) 855-0742</a><br />
          <a href="mailto::contact@shirlock.org" target="_blank">contact@shirlock.org</a>
    
        </div>
      </div>

      <div class="card card-shirlock">
        <div class="card-body">

      <h4>Contact a Director</h4>
    <p>Our directors would love to hear from you:</p>

    <h5><a href="mailto:uriah.clemmer@shirlock.org" target="_blank">Uriah Clemmer</a><br> <small>Chief Executive Officer</small></h5>

    <h5><a href="mailto:hayley.hollerbach@shirlock.org" target="__blank">Hayley Hollerbach, R.N.</a><br> <small>Awards Director</small></h5>

    <h5><a href="mailto:ben.hollerbach@shirlock.org" target="_blank">Ben Hollerbach</a><br> <small>Chief Operations Officer</small></h5>

    <h5><a href="mailto:jonathan.torrell@shirlock.org" target="_blank">Jonathan Torrell</a><br> <small>Chief Information Officer</small></h5>
    
        </div>
      </div>
    
    </div>
  </div>
</div> <!-- /container -->
    
@endsection