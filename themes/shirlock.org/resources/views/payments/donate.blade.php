@extends('layouts.template')

@section('meta')
      <meta description="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta keywords="shirlock, college, cancer, atlanta, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="567784843612818">
    
      <meta property="og:url" content="https://shirlock.org/donate">
      <meta property="og:type" content="article">
      <meta property="og:title" content="Donate | The Shirlock Foundation">
      <meta property="og:description" content="The Shirlock Foundation is a registered 501(c)3 organization committed to financially assisting the families of college students who are battling cancer.">
      <meta property="og:image" content="https://shirlock.org/img/shirlock-logo-og.png">

      <title>Donate | Shirlock Foundation</title>
@endsection
    
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
                      <!--<label class="btn btn-secondary">
                        <input type="radio" name="recurrence" title="recurrence" id="monthly" autocomplete="off" value="monthly">
                        Monthly
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="recurrence" title="recurrence" id="yearly" autocomplete="off" value="yearly">
                        Yearly
                      </label>-->
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

          <h4><strong>The Shirlock Foundation</strong> is a registered 501(c)(3) non-profit organization and your donation is tax deductible.</h3>

          <h5 class="mt-3">Corporate Matching</h5>
          <p>Many employers will match your gift to us.  Print your donation receipt and share it with your human resources department to work from the inside-out, or <a href="/contact">contact us</a> to work from the outside-in.</p>

          <h5 class="mt-3">Wish to donate by check?</h5>
                <p>Simply mail your donation to us at the following address:</p>
                <p><strong>The Shirlock Foundation</strong><br />P.O. Box 79225<br />Atlanta, GA 30357</p>
                
        </div>
      </div>
    
    </div>
  </div>
</div> <!-- /container -->
@endsection