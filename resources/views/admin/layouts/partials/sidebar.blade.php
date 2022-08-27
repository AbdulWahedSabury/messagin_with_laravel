<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img id="profileImage" src="{{ auth()->user()->avatar_url }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}"
          class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <!-- users -->
      <li class="nav-item">
        <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>

      <!-- messages -->
      <li class="nav-item">
        <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}">
          <i class="far fa-comments"></i>
          <p>
            messages
          </p>
        </a>
      </li>

      {{-- appointments --}}
      {{-- <li class="nav-item">
            <a href="{{route('admin.appointments')}}" class="nav-link {{request()->is('admin/appointments')? 'active' : ''}}">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Appointments
              </p>
            </a>
          </li> --}}
      <!-- profile -->
      <li class="nav-item">
        <a href="{{ route('admin.profile.edit') }}"
          class="nav-link {{ request()->is('admin/profile/edit') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      {{-- setting --}}
      <li class="nav-item">
        <a href="{{ route('admin.site.setting') }}"
          class="nav-link {{ request()->is('admin/site/setting') ? 'active' : '' }}">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Setting
          </p>
        </a>
      </li>
      {{-- Log out --}}

      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <a href="{{ route('logout') }}" class="nav-link {{ request()->is('logout') ? 'active' : '' }}"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              logout
            </p>
          </a>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
