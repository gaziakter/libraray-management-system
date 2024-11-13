<header id="header" class="header fixed-top d-flex align-items-center justify-content-between">
  <div class="d-flex align-items-center">
    <a href="{{url('panel/dashboard')}}" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">Library MS</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <div class="search-button">
    <a href="{{ url('panel/search/form') }}" class="btn btn-primary d-flex align-items-center"><i class="bi bi-search me-2"></i> Search Book</a>
  </div>

  <nav class="header-nav">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{Auth::user()->name}}</h6>
            <span>Full-stack Web Developer</span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
