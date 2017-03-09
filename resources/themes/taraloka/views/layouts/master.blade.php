<!DOCTYPE html>
<html lang="{{ config('app.local') }}">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" type="image/png" href="/img/favicon/favicon_32x32.png">
          <meta description="The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
          <meta keywords="taraloka, sikkim, india, foundation, nihil">
          <meta author="Uriah M. Clemmer IV">

          <meta property="fb:app_id" content="187097078310518">

          <title>Taraloka Foundation</title>
          <meta name="og:url" content="https://taraloka.org">
      <meta name="og:type" content="article">
      <meta name="og:title" content="Taraloka Foundation">
      <meta name="og:description" content="The Taraloka Foundation is a registered 501(c)3 non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta name="og:image" content="https://taraloka.org/themes/taraloka/img/taraloka-logo.png">
      <link href="/css/bootstrap.css" rel="stylesheet">
      <link href="/css/font-awesome.min.css" rel="stylesheet">
      <link href="/css/taraloka.css" rel="stylesheet">
          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '187097078310518',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
   </script>

</head>
<body>

<!-- WRAP MAJORITY OF PAGE FOR STICKY FOOTER -->
<!-- START: SITE WRAPPER -->
<div id="site-wrapper">

  <!-- START: SITE HEADER -->
  <section id="site-header">
    <div class="container">

      <div class="row">

        <!-- START: HEADER LOGO -->
        <div class="col-sm-3 col-md-2">
          <a href="/"><img class="img-responsive" src="/img/taraloka-logo.png" alt="The Taraloka Foundation" /></a>
        </div>
        <!-- END: HEADER LOGO -->

        <!-- START: HEADER CONTACT -->
        <div class="col-sm-9 col-md-10" style="padding-right: 0;">
          <div class="row">
            <div class="col-sm-12 text-right">

          <a href="/register" class="btn btn-mystic">register</a>
                <a href="/login" class="btn btn-mystic">login</a>

            </div>
            <div class="col-sm-12 text-right">

              <!-- START: HEADER LOGO -->
              <nav class="navbar navbar-default" id="navbar-main" role="navigation"><!-- 65.4 -->
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="/mission">Mission</a></li>
                      <li><a href="/about">About</a></li>
                      <li><a href="/newsletters">Newsletters</a></li>
                      <li><a href="/partners">Partners</a></li>
                      <!--<li><a href="/shop">Shop</a></li>-->
                      <li><a href="/contact">Contact</a></li>
                      <li><a class="btn btn-default" id="navbar-btn" href="/donate">donate</a></li>
                    </ul>


                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
              <!-- END: HEADER LOGO -->

            </div>
          </div>
        </div>
        <!-- END: HEADER CONTACT -->

      </div>

    </div>
  </section>
  <!-- END: SITE HEADER -->

       @yield('content')  

</div>
<!-- END: SITE WRAPPER -->

<!-- EXCLUDE FOOTER FROM WRAPPER SO IT WILL STICK -->
<!-- START: SITE FOOTER -->
<div id="site-footer">

  <div id="footer-navigation">
    <div class="container">

      <div class="row">

        <!-- START: FOOTER NAVIGATION 1 -->
        <div class="col-sm-4">

          <div class="row">
            <div class="col-sm-12">

              <ul class="list-inline">
                <li><a href="/"><img src="/img/taraloka-wordmark.png" alt="Taraloka Foundation" style="width:150px;" /></a></li>
              </ul>

            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p><strong class="font-green">The Taraloka Foundation</strong> is a registered 501(c)3 non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.</p>
              <p>A donation of $160 per month can pay the salary of one of our employees or sponsor all of the needs of one of our girls for one month.  A dollar goes a long way, so please make a donation today!</p>
            </div>
          </div>

        </div>
        <!-- END: FOOTER NAVIGATION 1 -->

        <!-- START: FOOTER NAVIGATION 1 -->
        <div class="col-sm-2">

          <div class="row">
            <div class="col-sm-12 text-center">

              <ul class="list-unstyled" id="footer-menu">
                <li><a href="/mission">mission</a></li>
                <li><a href="/about">about</a></li>
                <li><a href="/newsletters">newsletters</a></li>
                <li><a href="/partners">partners</a></li>
                <!--<li><a href="/shop">shop</a></li>-->
                <li><a href="/contact">contact</a></li>
                <li><a href="/donate" class="btn btn-default">donate</a></li>
              </ul>


            </div>
          </div>

        </div>
        <!-- END: FOOTER NAVIGATION 1 -->

        <!-- START: FOOTER NAVIGATION 2 -->
        <div class="col-sm-3">

          <div class="row">
            <div class="col-xs-6">
              <a href="#" data-toggle="modal" data-target="#footerPic1"><img src="/img/girl-1.png" class="img-responsive" alt="Girl 1" /></a>
              <!-- Modal -->
              <div class="modal fade" id="footerPic1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  <img src="/img/girl-1.png" class="img-responsive" alt="Girl 1" />
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <a href="#" data-toggle="modal" data-target="#footerPic2"><img src="/img/girl-2.png" class="img-responsive" alt="Girl 2" /></a>
              <!-- Modal -->
              <div class="modal fade" id="footerPic2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  <img src="/img/girl-2.png" class="img-responsive" alt="Girl 1" />
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-xs-6">
              <a href="#" data-toggle="modal" data-target="#footerPic3"><img src="/img/girl-3.png" class="img-responsive" alt="Girl 3" /></a>
              <!-- Modal -->
              <div class="modal fade" id="footerPic3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  <img src="/img/girl-3.png" class="img-responsive" alt="Girl 1" />
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <a href="#" data-toggle="modal" data-target="#footerPic4"><img src="/img/girl-4.png" class="img-responsive" alt="Girl 4" /></a>
              <!-- Modal -->
              <div class="modal fade" id="footerPic4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  <img src="/img/girl-4.png" class="img-responsive" alt="Girl 1" />
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- END: FOOTER NAVIGATION 2 -->

        <!-- START: FOOTER NAVIGATION 2 -->
        <div class="col-sm-3">

          <div class="row">
            <div class="col-sm-12" id="footer-contact">
              <h4>Contact Information</h4>

              <address>
                <strong class="font-green">The Taraloka Foundation</strong><br>
                705 Northern Avenue<br />
                Signal Mountain, TN 37377<br />
                <a href="tel:14236056163">423.605.6163</a><br />
                <a href="mailto:contact@taraloka.org">contact@taraloka.org</a>
              </address>

              <ul class="list-inline">
                <li><a href="https://www.facebook.com/TaralokaFoundation" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
                <!--<li><a href="#" target="_blank"><i class="fa fa-2x fa-twitter"></i></a></li>-->
                <li><a href="https://plus.google.com/100164349293155842593" rel="publisher" target="_blank"><i class="fa fa-2x fa-google-plus"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-2x fa-youtube"></i></a></li>
                <li><a href="mailto:contact@taraloka.org" target="_blank"><i class="fa fa-2x fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>

        </div>
        <!-- END: FOOTER NAVIGATION 2 -->

      </div>

      <div class="row" id="footer-legal">

        <!-- START: FOOTER COPYRIGHT -->
        <div class="col-sm-8">
          <p>Copyright 2014 &copy; <strong class="font-green">The Taraloka Foundation</strong>.  All rights reserved.  <!--<a href="/privacy" style="margin:0 10px">Privacy</a>  <a href="/terms" style="margin:0 5px">Terms</a>--></p>
        </div>
        <!-- END: FOOTER COPYRIGHT -->

        <!-- START: FOOTER POWERED -->
        <div class="col-sm-4" id="footer-powered">
          <p>Powered by <a href="http://www.nihil.co" target="_blank">NIHIL</a></p>
        </div>
        <!-- END: FOOTER POWERED -->

      </div>

    </div>
  </div>

</div>
<!-- END: SITE FOOTER -->

   <!-- STRIPE -->
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript" src="https://js.stripe.com/v3/"></script>                                    
     
<script src="/js/jquery.js"></script>

   <script type="text/javascript">
     var stripe = Stripe('<?php if($account = \App\Account::find(constant('NF_ACCOUNT_ID'))){echo $account->publishable_key; }else{ echo env('STRIPE_PUBLISHABLE_KEY'); } ?>');
     var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
    base: {
	// Add your base input styles here. For example:
	fontSsize: '14px',
	lineHeight: '1.52857143',
	color: '#3a3f51'
    }
};

// Create an instance of the card Element
var card = elements.create('card', {hidePostalCode: false, style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
	displayError.textContent = event.error.message;
    } else {
	displayError.textContent = '';
    }
});

// Create a token or display an error the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
	if (result.error) {
	    // Inform the user if there was an error
	    var errorElement = document.getElementById('card-errors');
	    errorElement.textContent = result.error.message;
	} else {
	    // Send the token to your server
	    stripeTokenHandler(result.token);
	}
    });
});

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

$(document).ready(function(e){
    $(".nf-img-check").click(function(){
        $(this).toggleClass("nf-check");
    });
});

   </script>
     
</body>
</html>
