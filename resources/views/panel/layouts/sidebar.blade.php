  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{url('panel/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'book') collapsed @endif" href="{{url('panel/book')}}">
          <i class="bi bi-book"></i>
          <span>Book</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'bookissue') collapsed @endif" href="{{url('panel/bookissue')}}">
          <i class="bi bi-journals"></i>
          <span>Book Issue</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'student') collapsed @endif" href="{{url('panel/student')}}">
          <i class="bi bi-people-fill"></i>
          <span>Student</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'categories') collapsed @endif" href="{{url('panel/categories')}}">
          <i class="bi bi-border-all"></i>
          <span>Categories</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'subcategories') collapsed @endif" href="{{url('panel/subcategories')}}">
          <i class="bi bi-bookshelf"></i>
          <span>Sub Categories</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'author') collapsed @endif" href="{{url('panel/author')}}">
          <i class="bi bi-person-bounding-box"></i>
          <span>Author</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'publisher') collapsed @endif" href="{{url('panel/publisher')}}">
          <i class="bi bi-book-half"></i>
          <span>Publisher</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'role') collapsed @endif" href="{{url('panel/role')}}">
          <i class="bi bi-shield-lock-fill"></i>
          <span>Role</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'user') collapsed @endif" href="{{url('panel/user')}}">
          <i class="bi bi-person-circle"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->