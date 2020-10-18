
  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>My</b>Bl</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MY</b>Blog</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php  $currentUser = Auth::user();  ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{$currentUser->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{$currentUser->name}} - {{ $currentUser->roles->first()->display_name }}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/edit-account" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$currentUser->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="/admin/dashboard">
          <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-alt"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-left pull-right"></i>
              <i class='fas fa-angle-left'></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blog.index')}}"><i class="fas fa-circle-notch"></i> All Post</a></li>
            <li><a href="{{ route('blog.create')}}"><i class="fas fa-circle-notch"></i> Add New</a></li>
          </ul>
        </li>
        @if (check_user_permissions(request(), "Categories@index"))
        <li>
          <a href="{{ route('categories.index')}}">
            <i class="fa fa-folder"></i> <span>Categories</span>
          </a>
        </li>
        @endif
        @if (check_user_permissions(request(), "Users@index"))
        <li>
          <a href="{{ route('users.index')}}">
            <i class="fa fa-user"></i> <span>Manage Users</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
