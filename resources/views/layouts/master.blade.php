<!DOCTYPE html>
<html lang="{{ config('app.local') }}">
      
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/favicon.png">
      
    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
      
    <!-- Icons -->
    <script src="https://use.fontawesome.com/00285c63be.js"></script>
    <link href="/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/css/style.css?t=<?= time() ?>" rel="stylesheet">
    <link href="/css/nihilframework.css?t=<?= time() ?>" rel="stylesheet">
      
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
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

  <!-- BODY options, add following classes to body to change options

    // Header options
    1. '.header-fixed'- Fixed Header

    // Sidebar options
    1. '.sidebar-fixed'- Fixed Sidebar
    2. '.sidebar-hidden'- Hidden Sidebar
    3. '.sidebar-off-canvas'- Off Canvas Sidebar
    4. '.sidebar-minimized'- Minimized Sidebar (Only icons)
    5. '.sidebar-compact'  - Compact Sidebar

    // Aside options
    1. '.aside-menu-fixed'- Fixed Aside Menu
    2. '.aside-menu-hidden'- Hidden Aside Menu
    3. '.aside-menu-off-canvas'- Off Canvas Aside Menu

    // Footer options
    1. '.footer-fixed'- Fixed footer

  -->

  <body class="app header-fixed sidebar-fixed aside-mune-fixed">
    <div id="app">
    <header class="app-header navbar">
      @include('layouts.navbar')
    </header>

    <div class="app-body">


      <div class="sidebar">
        @include('layouts.sidebar')
      </div>

      
      <!-- Main content -->
      <main class="main">
        @yield('content')
      </main>


      <aside class="aside-menu">
        @include('layouts.menubar')
      </aside>

      <flash title="{{ session('flash')['title'] }}" message="{{ session('flash')['message'] }}"></flash>
    </div>

    <footer class="app-footer">
      Copyright &copy; 2009-{{ date('Y') }} The NIHIL Corporation.  All rights reserved.
      <span class="float-right">Powered by <a href="http://nihil.co" target="_blank">NIHIL</a></span>
    </footer>
      </div>
    <!-- Bootstrap and necessary plugins -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="/js/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <!-- GenesisUI main scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/nihilframework.js"></script>
    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->

  </body>
</html>