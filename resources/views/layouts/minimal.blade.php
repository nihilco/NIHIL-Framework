<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

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
            <div class="block-center mt-xl wd-xl">
               <!-- START panel-->
               <div class="panel panel-dark panel-flat">
                  <div class="panel-heading nf-heading text-center">
                     <a href="{{ url('/') }}" class="minimal-header">
                       {{ config('app.name', 'NIHIL Framework') }}
                     </a>
                  </div>

@yield('content')

               <!-- END panel-->
               <div class="p-lg text-center">
                <span>Copyright &copy; 2009-<?= date('Y') ?> The NIHIL Corporation.</span><br />
                <span>All rights reserved.</span>
         </div>
      </div>
   </div>
  <!-- =============== VENDOR SCRIPTS ===============-->
  <!-- MODERNIZR-->
  <script src="/vendor/modernizr/modernizr.custom.js"></script>
  <!-- JQUERY-->
  <script src="/vendor/jquery/dist/jquery.js"></script>
  <!-- BOOTSTRAP-->
  <script src="/vendor/bootstrap/dist/js/bootstrap.js"></script>
  <!-- STORAGE API-->
  <script src="/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
  <!-- PARSLEY-->
  <script src="/vendor/parsleyjs/dist/parsley.min.js"></script>
  <!-- =============== APP SCRIPTS ===============-->
  <script src="/js/angel.js"></script>
</body>

</html>