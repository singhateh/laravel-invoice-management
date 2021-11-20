 <!-- Sidebar Menu -->
 <ul class="sidebar-menu">
    <li class="header">MENU</li>
    <!-- Menu 0.1 -->
    <li class="treeview {{ Request::is('home') ? 'active' : '' }}">
      <a href="{{ route('home') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>

    </li>
    <!-- Menu 1 -->
     <li class="treeview {{ Request::is('invoices*') ? 'active' : '' }}">
      <a href="#"><i class="fa fa-file-text-o"></i> <span>Invoices</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          @if (Request::is('invoices*'))
            <li><a href="#" class="openCreateModal"><i class="fa fa-plus"></i>Create Invoice</a></li>
          @endif
        <li><a href="{{ route('invoices.index') }}"><i class="fa fa-list"></i> Invoices List</a></li>
      </ul>
    </li>
    <!-- Menu 2 -->
     <li class="treeview {{ Request::is('products*') ? 'active' : '' }}">
      <a href="#"><i class="fa fa-archive"></i><span>Products</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @if (Request::is('products*'))
        <li><a href="#" class="openCreateModal"><i class="fa fa-plus"></i>Create Products</a></li>
        @endif

        <li><a href="{{ route('products.index') }}"><i class="fa fa-list"></i>Products List</a></li>
      </ul>
    </li>
    <!-- Menu 3 -->
    <li class="treeview {{ Request::is('customers*') ? 'active' : '' }}">
      <a href="#"><i class="fa fa-users"></i><span>Customers</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @if (Request::is('customers*'))
        <li><a href="#" class="openCreateModal"><i class="fa fa-plus"></i>Create Customer</a></li>
        @endif
        <li><a href="{{ route('customers.index') }}"><i class="fa fa-list"></i> Customers List</a></li>
      </ul>
    </li>

    <!-- Menu 4 -->
    <li class="treeview {{ Request::is('user*') ? 'active' : '' }}">
      <a href="#"><i class="fa fa-user"></i><span> Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @if (Request::is('user*'))
        <li><a href="#" class="openCreateModal"><i class="fa fa-plus"></i>Create User</a></li>
        @endif
        <li><a href="{{ route('user.index') }}"><i class="fa fa-list"></i> Users List</a></li>
      </ul>
    </li>
    <li class="treeview {{ Request::is('settings*') ? 'active' : '' }}">
        <a href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> <span>System Settings</span>
        </a>
      </li>
  </ul>
  <!-- /.sidebar-menu -->
