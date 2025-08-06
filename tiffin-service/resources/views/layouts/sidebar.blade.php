<aside class="main-sidebar bgcolor elevation-4">
    <a href="/" class="brand-link text-light">
        <span class="brand-text font-weight-light"> Tiffin Service</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
         <div class="user-panel mt-3  d-flex align-items-center">
            <div class="image">
                <i class="fas fa-user-circle fa-2x text-light"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block text-light">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tiffins.index') }}" class="nav-link {{ request()->is('tiffins*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Tiffins</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staff.index') }}" class="nav-link {{ request()->is('staff*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Staff</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('expenses.index') }}" class="nav-link {{ request()->is('expenses*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Expenses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer-payments.index') }}" class="nav-link {{ request()->is('customer-payments*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Customer Payments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staff-payments.index') }}" class="nav-link {{ request()->is('staff-payments*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Staff Payments</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-left text-light">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
