@extends('layouts.template')

@section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">

    <h1>Donate</h1>

    <form role="form" method="POST" action="/donate" id="payment-form">

              {{ csrf_field() }}

            @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif                                         

              <div class="row mb-3">
                <div class="col">                    
                  <button type="button" class="btn btn-lg btn-success" onclick="this.form.elements.namedItem('amount').value = 10">$10</button>
                  <button type="button" class="btn btn-lg btn-success" onclick="this.form.elements.namedItem('amount').value = 25">$25</button>
                  <button type="button" class="btn btn-lg btn-success" onclick="this.form.elements.namedItem('amount').value = 50">$50</button>
                   <button type="button" class="btn btn-lg btn-success" onclick="this.form.elements.namedItem('amount').value = 100">$100</button>
                   <button type="button" class="btn btn-lg btn-success" onclick="this.form.elements.namedItem('amount').value = 250">$250</button>
                  <button type="button" class="btn btn-lg btn-success">Other</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="amount">Amount</label>
                      <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" class="form-control{{ $errors->first('amount') ? ' is-invalid' : '' }}" aria-label="Amount" name="amount" title="amount">
                      </div>
                                @if($errors->first('amount'))
                <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
                @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="email">How often?</label><br />
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="recurrence" title="recurrence" id="once" autocomplete="off" value="once" checked>
                        Once
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="recurrence" title="recurrence" id="monthly" autocomplete="off" value="monthly">
                        Monthly
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="recurrence" title="recurrence" id="yearly" autocomplete="off" value="yearly">
                        Yearly
                      </label>
                    </div>
                                @if($errors->first('recurrence'))
                <div class="invalid-feedback">{{ $errors->first('recurrence') }}</div>
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
    <div class="row">
    <div class="col text-right">
            <button type="submit" class="btn btn-success btn-lg">Donate</button>
    </div>
    </div>

          </form>

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