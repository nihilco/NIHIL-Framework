<!DOCTYPE html>
<html lang="{{ config('app.local') }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{ config('app.name', 'NIHIL Framework') }}</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="/vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="/vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="/css/angel.css" id="angelcss">
   <link rel="stylesheet" href="/css/main.css" id="maincss">
   <!-- Piwik -->
   <script type="text/javascript">
     var _paq = _paq || [];
     /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
     _paq.push(['trackPageView']);
     _paq.push(['enableLinkTracking']);
    (function() {
        var u="//pluto.nihil.co/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
   </script>
   <!-- End Piwik Code -->
   <!-- Scripts -->
   <script>
       window.Laravel = {!! json_encode([
           'csrfToken' => csrf_token(),
       ]) !!};
   </script>
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="{{ url('/') }}" class="navbar-brand">
                  <div class="brand-logo">
                    {{ config('app.name', 'NIHIL Framework') }}
                  </div>
                  <div class="brand-logo-collapsed">
                     NF
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">

               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Search icon-->
                  <li>
                     <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                     </a>
                  </li>
                  @if (Auth::guest())
                  <li>
                     <a href="{{ route('signup') }}">Signup</a>
                  </li>
                  <li>
                     <a href="{{ route('login') }}">Login</a>
                  </li>
                  @else
                  <!-- START Offsidebar button-->
                  <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>
                  <!-- END Offsidebar menu-->
                  @endif
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form role="search" action="/search" class="navbar-form">
               <div class="form-group has-feedback">
                  <input type="text" placeholder="Type and hit enter ..." class="form-control">
                  <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
               </div>
               <button type="submit" class="hidden btn btn-default">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         <!-- END Top Navbar-->
      </header>
      <div class="container">
          @yield('content')
      </div>
      <!-- Page footer-->
      <footer>
         <span>Copyright &copy; 2009-<?= date('Y'); ?> The NIHIL Corporation.  All rights reserved.</span>
      </footer>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- STRIPE -->
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript" src="https://js.stripe.com/v3/"></script>                                    
   <!-- MODERNIZR-->
   <script src="/vendor/modernizr/modernizr.custom.js"></script>
   <!-- JQUERY-->
   <script src="/vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="/vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- JQUERY EASING-->
   <script src="/vendor/jquery.easing/js/jquery.easing.js"></script>
   <!-- ANIMO-->
   <script src="/vendor/animo.js/animo.js"></script>
   <!-- LOCALIZE-->
   <script src="/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- =============== APP SCRIPTS ===============-->
   <script src="/js/angel.js"></script>
</body>

</html>
