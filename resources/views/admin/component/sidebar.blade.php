<!-- Sidebar -->
<div class="admin-sidebar" id="sidebar">
        <div class="p-4">
            <h4 class="text-white fw-bold mb-4">
                <i class="fas fa-pills me-2"></i>MediCare<span style="color: var(--pharmeasy-secondary);">+</span>
                <br><small class="fs-6 opacity-75">Admin Panel</small>
            </h4>
        </div>
        
        <nav class="nav flex-column px-3">
            <a class="nav-link @if($page == 'dashboard') active @endif" href="dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a class="nav-link @if($page == 'add') active @endif" href="add-medicines"><i class="fas fa-plus-circle me-2"></i>Add Medicine</a>
            <a class="nav-link @if($page == 'medicines') active @endif" href="medicine-management"><i class="fas fa-pills me-2"></i>All Medicines</a>
            <a class="nav-link @if($page == 'orders') active @endif" href="order-management"><i class="fas fa-shopping-cart me-2"></i>Orders</a>
            <a class="nav-link @if($page == 'user') active @endif" href="user-management"><i class="fas fa-users me-2"></i>Customers</a>
            <a class="nav-link" href="#"><i class="fas fa-chart-bar me-2"></i>Analytics</a>
            <a class="nav-link" href="#"><i class="fas fa-tags me-2"></i>Categories</a>
            <a class="nav-link" href="#"><i class="fas fa-truck me-2"></i>Delivery</a>
            <a class="nav-link" href="#"><i class="fas fa-cog me-2"></i>Settings</a>
            <div class="section-divider"></div>
            <a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
        </nav>
    </div>