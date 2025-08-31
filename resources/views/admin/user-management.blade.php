<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Pharma Care Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #10847e;
            --secondary-color: #ff6900;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --light-bg: #f8fffe;
            --dark-text: #2c3e50;
            --muted-text: #6c757d;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #0a5c59 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            transition: all 0.3s ease;
            border: none;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-left: 4px solid var(--secondary-color);
        }

        .main-content {
            margin-left: 280px;
            padding: 0;
        }

        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
        }

        .content-area {
            padding: 2rem;
        }

        .page-header {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 1.5rem;
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            margin-bottom: 1rem;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .table thead {
            background: var(--primary-color);
            color: white;
        }

        .table th {
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table td {
            border: none;
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr {
            border-bottom: 1px solid #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border: none;
        }

        .btn-primary {
            background: var(--primary-color);
        }

        .btn-success {
            background: var(--success-color);
        }

        .btn-danger {
            background: var(--danger-color);
        }

        .btn-warning {
            background: var(--warning-color);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .search-box {
            position: relative;
        }

        .search-box .form-control {
            padding-left: 2.5rem;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .search-box .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted-text);
        }

        .filter-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
     @include("admin.component.sidebar");

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0" style="color: var(--primary-color);">User Management</h4>
                    <small class="text-muted">Manage pharmacists and stock managers</small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="position-relative">
                        <i class="fas fa-bell fs-5 text-muted"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            5
                        </span>
                    </div>
                    <div class="user-avatar">
                        SA
                    </div>
                    <div>
                        <div class="fw-semibold">Super Admin</div>
                        <small class="text-muted">admin@pharmacare.com</small>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Page Header -->
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1" style="color: var(--primary-color);">User Management Dashboard</h5>
                        <p class="text-muted mb-0">Add, edit, and manage pharmacists and stock managers</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="fas fa-plus me-2"></i>Add New User
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--primary-color);">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="h4 mb-1">156</div>
                        <div class="text-muted">Total Users</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +5 this week
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--success-color);">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="h4 mb-1">89</div>
                        <div class="text-muted">Pharmacists</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +3 this week
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--info-color);">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="h4 mb-1">67</div>
                        <div class="text-muted">Stock Managers</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +2 this week
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--warning-color);">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="h4 mb-1">142</div>
                        <div class="text-muted">Active Users</div>
                        <div class="mt-2">
                            <small class="text-warning">
                                <i class="fas fa-exclamation-triangle"></i> 14 inactive
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="filter-card">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control" placeholder="Search users...">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select">
                            <option value="">All Roles</option>
                            <option value="pharmacist">Pharmacist</option>
                            <option value="stock_manager">Stock Manager</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary-color);">All Users</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download me-1"></i>Export
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-print me-1"></i>Print
                        </button>
                    </div>
                </div>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Join Date</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: var(--success-color);">
                                        DR
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Dr. Rajesh Kumar</div>
                                        <small class="text-muted">rajesh.kumar@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">Pharmacist</span>
                            </td>
                            <td>+91 9876543210</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>15 Jan 2024</td>
                            <td>2 hours ago</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: var(--info-color);">
                                        PS
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Priya Sharma</div>
                                        <small class="text-muted">priya.sharma@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">Stock Manager</span>
                            </td>
                            <td>+91 9876543211</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>10 Jan 2024</td>
                            <td>5 hours ago</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: var(--success-color);">
                                        AM
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Dr. Amit Mehta</div>
                                        <small class="text-muted">amit.mehta@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">Pharmacist</span>
                            </td>
                            <td>+91 9876543212</td>
                            <td>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </td>
                            <td>08 Jan 2024</td>
                            <td>Never</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: var(--info-color);">
                                        SK
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Sunil Kapoor</div>
                                        <small class="text-muted">sunil.kapoor@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">Stock Manager</span>
                            </td>
                            <td>+91 9876543213</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>05 Jan 2024</td>
                            <td>1 day ago</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: var(--success-color);">
                                        NS
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Dr. Neha Singh</div>
                                        <small class="text-muted">neha.singh@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">Pharmacist</span>
                            </td>
                            <td>+91 9876543214</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                            <td>02 Jan 2024</td>
                            <td>1 week ago</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Showing 1 to 5 of 156 entries</small>
                        <nav>
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: var(--primary-color); color: white;">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" placeholder="Enter full name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Role *</label>
                                <select class="form-select">
                                    <option value="">Select role</option>
                                    <option value="pharmacist">Pharmacist</option>
                                    <option value="stock_manager">Stock Manager</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">License Number</label>
                                <input type="text" class="form-control" placeholder="Enter license number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Experience (Years)</label>
                                <input type="number" class="form-control" placeholder="Enter experience">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter address"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="Enter city">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" placeholder="Enter state">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>