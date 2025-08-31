<!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                <i class="fas fa-pills me-2"></i>Pharma Care
            </a>
        </div>
        <ul class="nav flex-column sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.user-management') ? 'active' : '' }}" href="{{ route('admin.user-management')}}">
                    <i class="fas fa-users me-2"></i> User Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pharmacy-management') ? 'active' : '' }}" href="{{ route('admin.pharmacy-management')}}">
                    <i class="fas fa-store me-2"></i> Pharmacy Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.medicine-management') ? 'active' : '' }}" href="{{ route('admin.medicine-management')}}">
                    <i class="fas fa-capsules me-2"></i> Medicine Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.order-management') ? 'active' : '' }}" href="{{ route('admin.order-management')}}">
                    <i class="fas fa-shopping-cart me-2"></i> Orders Management
                </a>
            </li>
           <hr>
            <li class="nav-item">
                <a class="nav-link" href="#logout">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </nav>