  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      {{-- @php
        $permissionuser = App\Models\PermissionRoleModel::getPermission('user', Auth::user()->role_id);
        $permissionrole = App\Models\PermissionRoleModel::getPermission('role', Auth::user()->role_id);
        $permissioncategory = App\Models\PermissionRoleModel::getPermission('category', Auth::user()->role_id);
        $permissionsubcategory = App\Models\PermissionRoleModel::getPermission('subcategory', Auth::user()->role_id);
        $permissionproduct = App\Models\PermissionRoleModel::getPermission('product', Auth::user()->role_id);
        $permissionsetting = App\Models\PermissionRoleModel::getPermission('setting', Auth::user()->role_id);
      @endphp --}}
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{url('panel/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'publisher') collapsed @endif" href="{{url('panel/publisher/list')}}">
          <i class="bi bi-person"></i>
          <span>Publisher</span>
        </a>
      </li><!-- End Profile Page Nav -->
        @if (!empty($permissionuser))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'user') collapsed @endif" href="{{url('panel/user')}}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (!empty($permissionrole))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'role') collapsed @endif" href="{{url('panel/role')}}">
          <i class="bi bi-person"></i>
          <span>Role</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (!empty($permissioncategory))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'category') collapsed @endif" href="{{url('panel/category')}}">
          <i class="bi bi-person"></i>
          <span>Category</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (!empty($permissionsubcategory))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'subcategory') collapsed @endif" href="{{url('panel/subcategory')}}">
          <i class="bi bi-person"></i>
          <span>Sub Category</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (!empty($permissionproduct))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'product') collapsed @endif" href="{{url('panel/product')}}">
          <i class="bi bi-person"></i>
          <span>Product</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (!empty($permissionsetting))
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'setting') collapsed @endif" href="{{url('panel/setting')}}">
          <i class="bi bi-person"></i>
          <span>Setting</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
    </ul>

  </aside><!-- End Sidebar-->