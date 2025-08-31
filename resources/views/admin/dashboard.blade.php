<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard - Pharma Care</title>
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
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--muted-text);
            font-weight: 500;
        }

        .chart-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 1.5rem;
            height: 400px;
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

        .progress {
            height: 8px;
            border-radius: 4px;
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
    @include("admin.component.sidebar");

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0" style="color: var(--primary-color);">Super Admin Dashboard {{ Route::currentRouteName() }}</h4>
                    <small class="text-muted">Welcome back, Admin</small>
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
            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--primary-color);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stats-number">₹2,45,680</div>
                        <div class="stats-label">Total Revenue</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12.5% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--success-color);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stats-number">1,247</div>
                        <div class="stats-label">Total Orders</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +8.3% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--info-color);">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number">3,456</div>
                        <div class="stats-label">Active Users</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +15.2% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--warning-color);">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="stats-number">892</div>
                        <div class="stats-label">Medicines</div>
                        <div class="mt-2">
                            <small class="text-warning">
                                <i class="fas fa-exclamation-triangle"></i> 23 low stock items
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="chart-container">
                        <h5 class="mb-4" style="color: var(--primary-color);">Sales Overview</h5>
                        <div class="d-flex justify-content-center align-items-center h-75">
                            <div class="text-center">
                                <i class="fas fa-chart-line display-1 text-muted mb-3"></i>
                                <p class="text-muted">Sales Chart Placeholder</p>
                                <small class="text-muted">Chart.js or similar library would be integrated here</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-container">
                        <h5 class="mb-4" style="color: var(--primary-color);">Order Status</h5>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Completed</span>
                                <span class="fw-semibold">856</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 75%; background: var(--success-color);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Processing</span>
                                <span class="fw-semibold">234</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 45%; background: var(--warning-color);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Cancelled</span>
                                <span class="fw-semibold">157</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 25%; background: var(--danger-color);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Returned</span>
                                <span class="fw-semibold">89</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 15%; background: var(--info-color);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="table-container">
                        <div class="p-3 border-bottom">
                            <h5 class="mb-0" style="color: var(--primary-color);">Recent Orders</h5>
                        </div>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-001234</td>
                                    <td>John Doe</td>
                                    <td>₹1,250</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>2024-08-30</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-001233</td>
                                    <td>Jane Smith</td>
                                    <td>₹850</td>
                                    <td><span class="badge bg-warning text-dark">Processing</span></td>
                                    <td>2024-08-30</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-001232</td>
                                    <td>Mike Johnson</td>
                                    <td>₹675</td>
                                    <td><span class="badge bg-info">Shipped</span></td>
                                    <td>2024-08-29</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-001231</td>
                                    <td>Sarah Wilson</td>
                                    <td>₹2,100</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>2024-08-29</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-001230</td>
                                    <td>David Brown</td>
                                    <td>₹450</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td>2024-08-28</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="table-container">
                        <div class="p-3 border-bottom">
                            <h5 class="mb-0" style="color: var(--primary-color);">Low Stock Alert</h5>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                <div class="me-3">
                                    <i class="fas fa-pills text-danger"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Paracetamol 500mg</div>
                                    <small class="text-danger">Only 5 left</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                <div class="me-3">
                                    <i class="fas fa-capsules text-warning"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Ibuprofen 400mg</div>
                                    <small class="text-warning">Only 12 left</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                <div class="me-3">
                                    <i class="fas fa-prescription-bottle text-danger"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Vitamin C 500mg</div>
                                    <small class="text-danger">Only 8 left</small>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn-sm">View All Alerts</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>