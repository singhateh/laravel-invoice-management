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
      <a href="#"><i class="fa fa-file-text"></i> <span>Invoices</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('invoices.create') }}"><i class="fa fa-plus"></i>Create Invoice</a></li>
        <li><a href="{{ route('invoices.index') }}"><i class="fa fa-cog"></i>Manage Invoices</a></li>
        <li><a href="#" class="download-csv"><i class="fa fa-download"></i>Download CSV</a></li>
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
        <li><a href="{{ route('products.create') }}"><i class="fa fa-plus"></i>Add Products</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-cog"></i>Manage Products</a></li>
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
        <li><a href="{{ route('customers.create') }}"><i class="fa fa-user-plus"></i>Add Customer</a></li>
        <li><a href="{{ route('customers.index') }}"><i class="fa fa-cog"></i>Manage Customers</a></li>
      </ul>
    </li>

    <!-- Menu 4 -->
    <li class="treeview {{ Request::is('user*') ? 'active' : '' }}">
      <a href="#"><i class="fa fa-user"></i><span>System Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('user.create') }}"><i class="fa fa-plus"></i>Add User</a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-cog"></i>Manage Users</a></li>
      </ul>
    </li>

  </ul>
  <!-- /.sidebar-menu -->
