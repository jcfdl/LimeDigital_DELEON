<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <!--<a href="">
      <span class="fa fa-globe"></span>
    </a>-->

    <a href="/administrator" class="navbar-brand">
      <span class="brand-icon"><i class="fa fa-gg"></i></span>
      <span class="brand-name">Infinity</span>
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
        <!--<li class="nav-item dropdown hidden-float">
          <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <i class="zmdi zmdi-hc-lg zmdi-search"></i>
          </a>
        </li>-->
        <li class="nav-item">
           <a href="{{ route('blog.home') }}">
            <span class="fa fa-globe"></span>
          </a>
        </li>
       
        <li class="nav-item"> 
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-hc-lg zmdi-power"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>        
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="{{ Auth::user()->media ? Auth::user()->media->name : 'http://place-hold.it/283x283' }}" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">{{ Auth::user()->name }}</a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>User</small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">                
                <li>
                  <a class="text-color show-page" href="profile" data-page="profile">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>                
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="active">
          <a href="{{ route('admin.home') }}" class="show-dashboard">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>
        <li class="has-submenu open">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-copy zmdi-hc-lg"></i>
            <span class="menu-text">Pages Management</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu" style="display: block;">
            <li><a href="all" class="show-page" data-page="all"><span class="menu-text">View All</span></a></li>
            <li><a href="new" class="show-page" data-page="new"><span class="menu-text">Add New</span></a></li>
            <li><a href="media" class="show-page" data-page="media"><span class="menu-text">Media</span></a></li>
            <li><a href="category" class="show-page" data-page="category"><span class="menu-text">Categories</span></a></li>
          </ul>
        </li>
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->

<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->