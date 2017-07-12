<button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
<a class="navbar-brand" href="{{ url('/') }}">NIHIL Framework</a>
<ul class="nav navbar-nav d-md-down-none">
  <li class="nav-item">
    <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
  </li>
</ul>
<ul class="nav navbar-nav ml-auto">
  <li class="nav-item d-md-down-none">
    <a class="nav-link" href="/search"><i class="fa fa-search" aria-hidden="true"></i></a>
  </li>
  <li class="nav-item d-md-down-none">
     <a class="nav-link" href="#"><i class="fa fa-database" aria-hidden="true"></i></a>
  </li>
  @if (!Auth::guest())
  <li class="nav-item d-md-down-none">
    <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
  </li>
  <li class="nav-item d-md-down-none">
    <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <!--<img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">-->
     <span class="d-md-down-none">{{ auth()->user()->username }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-header text-center">
        <strong>Account</strong>
      </div>
      <a class="dropdown-item" href="/users/{{ auth()->user()->username }}"><i class="fa fa-user"></i> Profile</a>
      <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
      <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
      <a href="{{ route('logout') }}" title="Logout" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </div>
  </li>
  @else
  <li class="nav-item d-md-down-none">
    <a class="nav-link" href="{{ route('signup') }}">Signup</a>
  </li>
  <li class="nav-item d-md-down-none">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
  </li>
  @endif
  <li class="nav-item d-md-down-none">
    <a class="nav-link navbar-toggler aside-menu-toggler" href="#">☰</a>
  </li>
</ul>