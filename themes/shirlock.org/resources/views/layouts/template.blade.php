<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Uriah M. Clemmer IV">
    <link rel="icon" href="/img/favicon.ico">

    <title>Shirlock Foundation</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/250f7c85cc.js"></script>

    <!-- Custom styles for this template -->
      <link href="/css/shirlock.css?t={{  time() }}" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-shirlock">
      <a class="navbar-brand" href="/">Shirlock Foundation</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <!--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#donateModal">Donate</button>-->
            <a class="nav-link btn btn-success" href="/donate">Donate</a>
          </li>
        </ul>
        <!--<ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary my-2 my-sm-0" href="/signup">Signup</a>
          </li>
        </ul>-->
      </div>
    </nav>

      @yield('content')

    <footer class="footer">
      <div class="container">
<div class="row">
<div class="col-sm-8" id="footer-copyright">
Copyright &copy; 2007 - 2017 The <strong>Shirlock Foundation</strong>. All rights reserved.
</div>
<div class="col-sm-4" id="footer-powered">
Powered by <a href="https://www.nihil.co" target="_blank">NIHIL</a>
</div>
</div>

      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="donateModalLabel">Donate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form role="form" method="POST" action="/donate" id="donation-form">
          <div class="modal-body">
              {{ csrf_field() }}
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
                      <input type="text" class="form-control" aria-label="Amount" name="amount" title="amount">
                    </div>
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
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="jsmith@example.com" name="email" title="email">
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
                    <textarea class="form-control" id="comments" name="comments" title="comments" rows="3"></textarea>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link btn-lg" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success btn-lg">Donate</button>
          </div>
          </form>
        </div>
      </div>
    </div>
                     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @include('layouts.js')                          
  </body>
</html>
