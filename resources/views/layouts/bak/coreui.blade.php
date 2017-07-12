<!DOCTYPE html>
<html lang="{{ config('app.loccal') }}">

  <head>

    @yield('meta')

    <!-- Icons -->
    <script src="https://use.fontawesome.com/00285c63be.js"></script>

      <!-- Main styles for this application -->
    <link href="/css/coreui.css" rel="stylesheet">

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

  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    @include('layouts.navbar')

    <div class="app-body">
      <!-- Sidebar -->
      <div class="sidebar">
        @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <main class="main">
        <div class="container-fluid">




        </div>
        <!-- /.conainer-fluid -->
      </main>

    </div>
    <!-- /.app-body -->

    @include('layouts.footer')

    <!-- Bootstrap and necessary plugins -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="/js/pace.min.js"></script>

    <!-- GenesisUI main scripts -->
    <script src="/js/app.js"></script>

    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <script src="/js/views/main.js"></script>

  </body>

</html>