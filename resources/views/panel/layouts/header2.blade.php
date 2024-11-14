<header id="header" class="header fixed-top bg-white shadow-sm py-2">
    <div class="container-fluid">
      <div class="row align-items-center">
        
        <!-- Logo Section -->
        <div class="col-lg-4 col-md-4 text-lg-start text-center">
          <a href="{{url('panel/dashboard')}}" class="logo text-decoration-none fw-bold">
            Library Management System
          </a>
        </div>
        
        <!-- Search Button Section -->
        <div class="col-lg-4 col-md-4 text-center my-2 my-lg-0">
          <a href="{{ url('panel/search/form') }}" class="btn btn-primary">
            <i class="bi bi-search me-2"></i> Search Book
          </a>
        </div>
        
        <!-- Profile and Sidebar Toggle Section -->
        <div class="col-lg-4 col-md-4 d-flex justify-content-lg-end justify-content-center align-items-center">
          
          <!-- Sidebar Toggle Icon -->
          <i class="bi bi-list toggle-sidebar-btn fs-4 me-3" style="cursor: pointer;"></i>
          
          <!-- User Profile Dropdown -->
          <div class="dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-1 fs-4"></i>
              <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-header text-center">
                <h6>{{Auth::user()->name}}</h6>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-person me-2"></i> My Profile
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}">
                  <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
              </li>
            </ul>
          </div>
          
        </div>
        
      </div>
    </div>
  </header>
  