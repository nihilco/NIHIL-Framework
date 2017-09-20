@extends('layouts.template')

@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

      <h1>Contact</h1>

      <p>Applications should be mailed to the P.O. Box or emailed to <a href="mailto:apply@shirlock.org" target="_blank">apply@shirlock.org</a>.</p>

    <p>For all other inquiries, you can contact us by mail, email, or by completing the following form:</p>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif
    
    <form method="POST" action="/contact">
    {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="name" class="form-control-label">Name</label>
        <input type="text" class="form-control{{ $errors->first('name') ? ' is-invalid' : '' }}" id="name" placeholder="John Smith" name="name" title="name" aria-descriptedby="nameHelp" value="{{ old('name') }}">
          @if($errors->first('name'))
          <div id="nameHelp" class="invalid-feedback">{{ $errors->first('name') }}</div>
          @endif    
      </div>
      <div class="form-group col-sm-6">
        <label for="email" class="form-control-label">Email</label>
        <input type="email" class="form-control{{ $errors->first('email') ? ' is-invalid' : '' }}" id="email" placeholder="jsmith@example.com" name="email" title="email" aria-descriptedby="emailHelp" value="{{ old('email') }}">
              @if($errors->first('email'))
          <div id="emailHelp" class="invalid-feedback">{{ $errors->first('email') }}</div>
          @endif
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="subject" class="form-control-label">Subject</label>
        <input type="text" class="form-control{{ $errors->first('subject') ? ' is-invalid' : '' }}" id="subject" placeholder="Sample Subject" name="subject" title="subject" aria-descriptedby="subjectHelp" value="{{ old('subject') }}">
              @if($errors->first('subject'))
          <div id="subjectHelp" class="invalid-feedback">{{ $errors->first('subject') }}</div>
          @endif
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="message" class="form-control-label">Message</label>
    <textarea class="form-control{{ $errors->first('message') ? ' is-invalid' : '' }}" id="message" rows="7" name="message" title="message" aria-descriptedby="messageHelp">{{ old('message') }}</textarea>
              @if($errors->first('message'))
          <div id="messageHelp" class="invalid-feedback">{{ $errors->first('message') }}</div>
          @endif
      </div>
</div>
    <div class="form-row">
      <div class="form-group col-sm-12">
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