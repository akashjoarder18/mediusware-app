  @php
  $current_route=request()->route()->getName();
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
       <span class="brand-text font-weight-light">Welcome</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-assets/dist/img/sayed.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if(isset(auth()->user()->name))
            {{auth()->user()->name}}
            @endif
          </a>
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
            <a href="" class="nav-link {{$current_route=='dashboard'?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Welcome
              </p>
            </a>
          </li>
          <li class="nav-item {{$current_route=='transection.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='transection.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Transection Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('transection.index')}}" class="nav-link {{$current_route=='transection.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Transections</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{$current_route=='get.deposit.show'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='get.deposit.show'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Deposit Transection
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('get.deposit.show')}}" class="nav-link {{$current_route=='get.deposit.show'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Deposit</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>