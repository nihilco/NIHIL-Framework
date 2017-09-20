@extends('layouts.template')

@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

      <h1>Tenth Anniversary Celebration</h1>

      <img src="/img/monday-night-banner.jpg" class="img-fluid" alt="Tenth Anniversary Celebration" />

    </div>
    <div class="col-md-4">

      <div class="card card-shirlock top-card">
        <div class="card-body">

    <strong>Where: </strong>Monday Night Brewing<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;933 Lee Street SW<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atlanta, GA 30310<br />
    <strong>Date: </strong>November 5, 2017<br />
    <strong>Time: </strong>4:00PM to 7:00PM<br />
    <strong>Price: </strong>$35/person<br />
    <button type="button" class="btn btn-lg btn-success mt-3" data-toggle="modal" data-target="#ticketModal">Buy Tickets</button>

    <!-- Modal -->
    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="donateModalLabel">Buy Tickets</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="/tickets/buy" id="payment-form">
          <div class="modal-body">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif                                         
                                         
              {{ csrf_field() }}
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Number of Tickets</label>
                    <div class="input-group">
                    <select class="form-control{{ $errors->first('quantity') ? ' is-invalid' : '' }}" id="quantity" name="quantity" title="quantity" aria-describedby="basic-addon-2">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                      <span class="input-group-addon" id="basic-addon2">at $35/ticket</span>
                    </div>
                                         @if($errors->first('quantity'))
                                         <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                         @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control{{ $errors->first('email') ? ' is-invalid' : '' }}" id="email" placeholder="jsmith@example.com" name="email" title="email">
                                         @if($errors->first('email'))
                                         <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                         @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="card-element">Credit Card</label>
                    <div id="card-element" class="form-control">
                      <!-- a Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display Element errors -->
                    <div id="card-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control{{ $errors->first('comments') ? ' is-invalid' : '' }}" id="comments" name="comments" title="comments" rows="3"></textarea>
                                         @if($errors->first('comments'))
                                         <div class="invalid-feedback">{{ $errors->first('comments') }}</div>
                                         @endif
                  </div>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link btn-lg" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success btn-lg">Buy Tickets</button>
          </div>
                                                     </form>
        </div>
      </div>
    </div>
                                         
        </div>
      </div>
    
    </div>
  </div>
</div> <!-- /container -->
    
@endsection