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
        <a class="nav-link @if(Request::segment(2) != 'publisher') collapsed @endif" href="{{url('panel/publisher')}}">
          <i class="bi bi-book-half"></i>
          <span>Publisher</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'categories') collapsed @endif" href="{{url('panel/categories')}}">
          <i class="bi bi-border-all"></i>
          <span>Categories</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'subcategories') collapsed @endif" href="{{url('panel/subcategories')}}">
          <i class="bi bi-border-all"></i>
          <span>Sub Categories</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'book') collapsed @endif" href="{{url('panel/book')}}">
        <i class="bi bi-border-all"></i>
        <span>Book</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'writer') collapsed @endif" href="{{url('panel/writer')}}">
        <i class="bi bi-border-all"></i>
        <span>Write</span>
      </a>
    </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->