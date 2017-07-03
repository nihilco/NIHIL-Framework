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
   <!-- SWEET ALERT-->
   <link rel="stylesheet" href="/vendor/sweetalert/dist/sweetalert.css">      
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
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
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
            <form role="search" action="search.html" class="navbar-form">
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
      <!-- sidebar-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <!-- START sidebar nav-->
               <ul class="nav">
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading ">
                     <span>Main Navigation</span>
                  </li>
                  <li class=" active">
                     <a href="/dashboard" title="Single View">
                        <em class="fa fa-home"></em>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="nav-heading ">
                     <span>Content Management</span>
                  </li>
                  <li class="">
                     <a href="/pages" title="Single View">
                        <em class="fa fa-file-text-o"></em>
                        <span>Pages</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/posts" title="Single View">
                        <em class="fa fa-thumb-tack"></em>
                        <span>Posts</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/comments" title="Single View">
                        <em class="fa fa-comments"></em>
                        <span>Comments</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/categories" title="Single View">
                        <em class="fa fa-folder"></em>
                        <span>Categories</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/tags" title="Single View">
                        <em class="fa fa-hashtag"></em>
                        <span>Tags</span>
                     </a>
                  </li>
                  <li class="nav-heading ">
                     <span>eCommerce</span>
                  </li>
                  <li class="">
                     <a href="/products" title="Single View">
                        <em class="fa fa-barcode"></em>
                        <span>Products</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/invoices" title="Single View">
                        <em class="fa fa-briefcase"></em>
                        <span>Invoices</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/orders" title="Single View">
                        <em class="fa fa-shopping-cart"></em>
                        <span>Orders</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/transactions" title="Single View">
                        <em class="fa fa-usd"></em>
                        <span>Transactions</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/customers" title="Single View">
                        <em class="fa fa-flag"></em>
                        <span>Customers</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/subscriptions" title="Single View">
                        <em class="fa fa-calendar"></em>
                        <span>Subscriptions</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/plans" title="Single View">
                        <em class="fa fa-cubes"></em>
                        <span>Plans</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/accounts" title="Single View">
                        <em class="fa fa-lock"></em>
                        <span>Accounts</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/addresses" title="Single View">
                        <em class="fa fa-truck"></em>
                        <span>Addresses</span>
                     </a>
                  </li>
                  <li class="nav-heading ">
                     <span>Support</span>
                  </li>
                  <li class="">
                     <a href="/tickets" title="Single View">
                        <em class="fa fa-support"></em>
                        <span>Tickets</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/types" title="Single View">
                        <em class="fa fa-filter"></em>
                        <span>Types</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/replies" title="Single View">
                        <em class="fa fa-thumbs-up"></em>
                        <span>Replies</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/resolutions" title="Single View">
                        <em class="fa fa-check-circle"></em>
                        <span>Resolutions</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/priorities" title="Single View">
                        <em class="fa fa-exclamation-circle"></em>
                        <span>Priorities</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/statuses" title="Single View">
                        <em class="fa fa-compass"></em>
                        <span>Statuses</span>
                     </a>
                  </li>
                  <li class="nav-heading ">
                     <span>Access Control</span>
                  </li>
                  <li class="">
                     <a href="/users" title="Single View">
                        <em class="fa fa-user"></em>
                        <span>Users</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/groups" title="Single View">
                        <em class="fa fa-users"></em>
                        <span>Groups</span>
                     </a>
                  </li>
                          <li class="">
                     <a href="/resources" title="Single View">
                        <em class="fa fa-database"></em>
                        <span>Resources</span>
                     </a>
                  </li>
               </ul>
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>
      @if (!Auth::guest())
      <!-- offsidebar-->
      <aside class="offsidebar hide">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul role="tablist" class="nav nav-tabs nav-justified">
                  <li role="presentation" class="active">
                     <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                        <em class="icon-equalizer fa-lg"></em>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                        <em class="icon-user fa-lg"></em>
                     </a>
                  </li>
               </ul>
               <!-- Tab panes-->
               <div class="tab-content">
                  <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                     <h3 class="text-center text-thin">Tab 1</h3>
                     <ul class="nav">
                         <li>
                             <div class="p-lg text-center">
                                 <!-- Optional link to list more users-->
                                 <a href="{{ route('logout') }}" title="Logout" class="btn btn-block btn-default" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                             </div>
                         </li>
                     </ul>
                  </div>
                  <div id="app-chat" role="tabpanel" class="tab-pane fade">
                     <h3 class="text-center text-thin">Tab 2</h3>
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>
      @endif

      @yield('content')

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
   <script src="/vendor/sweetalert/dist/sweetalert.min.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- =============== APP SCRIPTS ===============-->
   <script src="/js/angel.js"></script>
   <script type="text/javascript">
     var stripe = Stripe('<?php if($account = \App\Models\Account::find(constant('NF_ACCOUNT_ID'))){echo $account->publishable_key; }else{ echo env('STRIPE_PUBLISHABLE_KEY'); } ?>');
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
