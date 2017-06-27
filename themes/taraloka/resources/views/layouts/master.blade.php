<!DOCTYPE html>
<html lang="{{ config('app.loccal') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/favicon/favicon_32x32.png">

    @yield('meta')

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/00285c63be.js"></script>
    <link href="/css/taraloka.css?t=<?php echo time(); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Lavavel -->
    <script>
         window.Laravel = {!! json_encode([
             'csrfToken' => csrf_token(),
         ]) !!};
    </script>
    <!-- End Laravel -->
         
    <!-- Piwik -->
    <script type="text/javascript">
    var _paq = _paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//pluto.nihil.co/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '6']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNod    e.insertBefore(g,s);
    })();
    </script>
    <!-- End Piwik Code -->
         
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/img/taraloka-logo-wide.png" alt="The Taraloka Foundation" /></a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/mission">mission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/newsletters">newsletters</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/partners">partners</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary" href="/donate">donate</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
        @if(Auth::guest())
            <li class="nav-item">
              <a class="btn btn-secondary" href="/signup">signup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">login</a>
            </li>
        @else
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
                                        </form>

                </div>
              </li>
        @endif
          </ul>
        </div>
      </div>
    </nav>

      @yield('content')

   <footer class="footer">
     <div class="container">
       <div class="row">
         <div class="col-sm-4">
      <!-- <img src="/img/taraloka-wordmark.png" alt="Taraloka" /> -->
      <p><span>The Taraloka Foundation</span> is a registered 501(c)(3) non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.</p>
      <p>A donation of $160 per month can pay the salary of one of our employees or sponsor all of the needs of one of our girls for one month.  A dollar goes a long way, so please make a donation today!</p>
         </div>
         <div class="col-sm-2">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="/mission">mission</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">about</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/newseletters">newsletters</a>
        </li>
              <li class="nav-item">
          <a class="nav-link" href="/partners">partners</a>
        </li>
              <li class="nav-item">
          <a class="nav-link" href="/contact">contact</a>
        </li>
              <li class="nav-item">
          <a class="btn btn-primary" href="/donate">donate</a>
        </li>
      </ul>
         </div>
         <div class="col-sm-3">

<form>
          <div class="form-group">
            <label for="exampleInputEmail1">Join our mailing list!</label>
        <div class="input-group">
              <input type="email" class="form-control" placeholder="jsmith@taraloka.org" aria-describedby="emailHelp">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Join</button>
              </span>
            </div>
            <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
  </div>
</form>
        
         </div>
         <div class="col-sm-3" id="contact">
      <h4>Contact Information</h4>

                    <address>
                      <span>The Taraloka Foundation</span><br>
                      705 Northern Avenue<br />
                      Signal Mountain, TN 37377<br />
                      <a href="tel:14236056163">+1 423.605.6163</a><br />
                      <a href="mailto:contact@taraloka.org">contact@taraloka.org</a>
                    </address>
      <nav class="nav" id="nav-social">
        <a class="nav-link" href="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
        <a class="nav-link" href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
        <a class="nav-link" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
      </nav>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-8">

        <p class="" id="copyright">Copyright &copy; 2014-<?= date('Y') ?> <span>The Taraloka Foundation</span>.  All rights reserved.</p>                                                                                                <ul class="nav" id="nav-copyright">
             <li class="nav-item">
               <a class="nav-link" href="\legal">Legal</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="\contact">Contact</a>
             </li>
           </ul>                                                                                      

         </div>
         <div class="col-sm-4" id="powered">
           Powered by <a href="https://nihil.co" target="_blank">NIHIL</a>
         </div>
       </div>
     </div>
   </footer>

   <!-- JavaScript -->
   <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <script>
       // Create a Stripe client
       var stripe = Stripe('pk_test_oBG1UuDfekCXu72oDEOjRcqk');
   </script>
   <script src="/js/taraloka.js"></script>
  </body>
</html>