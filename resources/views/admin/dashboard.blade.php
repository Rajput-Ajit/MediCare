<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MediCare+ Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --pharmeasy-primary: #10847e;
            --pharmeasy-secondary: #ff6900;
            --pharmeasy-light: #f8fffe;
            --pharmeasy-dark: #0a5c59;
        }

        .admin-sidebar {
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .admin-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            color: white;
        }

        .stat-card.orange {
            background: linear-gradient(135deg, var(--pharmeasy-secondary), #e55a00);
        }

        .stat-card.success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
        }

        .stat-card.info {
            background: linear-gradient(135deg, #17a2b8, #138496);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
        }

        .stat-card.danger {
            background: linear-gradient(135deg, #dc3545, #c82333);
        }

        .section-divider {
            border-top: 2px solid #e9ecef;
            margin: 2rem 0;
        }

        .table th {
            background-color: var(--pharmeasy-light);
            color: var(--pharmeasy-dark);
            font-weight: 600;
            border: none;
        }

        .badge-status {
            font-size: 0.75rem;
            padding: 0.4em 0.8em;
        }

        .progress {
            height: 8px;
            border-radius: 10px;
        }

        .chart-container {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 8px;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                width: 250px;
            }

            .admin-content {
                margin-left: 0;
            }
        }

        .metric-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 1.5rem;
        }

        .recent-activity-item {
            border-left: 3px solid var(--pharmeasy-primary);
            padding-left: 15px;
            margin-bottom: 15px;
        }

        .notification-item {
            background-color: rgba(255, 105, 0, 0.1);
            border-left: 4px solid var(--pharmeasy-secondary);
        }

        .low-stock-alert {
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid #dc3545;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include("admin.component.sidebar", ['page' => "dashboard"]);

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Dashboard</h2>
                <p class="text-muted mb-0">Welcome back! Here's what's happening with your pharmacy today.</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-success">Online</span>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i>Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Key Metrics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">₹1,25,450</h3>
                                <p class="mb-0">Today's Revenue</p>
                                <small class="opacity-75">
                                    <i class="fas fa-arrow-up me-1"></i>+12.5% from yesterday
                                </small>
                            </div>
                            <div class="metric-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card orange">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">248</h3>
                                <p class="mb-0">Orders Today</p>
                                <small class="opacity-75">
                                    <i class="fas fa-arrow-up me-1"></i>+8.2% from yesterday
                                </small>
                            </div>
                            <div class="metric-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">1,847</h3>
                                <p class="mb-0">Total Products</p>
                                <small class="opacity-75">
                                    <i class="fas fa-arrow-up me-1"></i>+15 new this week
                                </small>
                            </div>
                            <div class="metric-icon">
                                <i class="fas fa-pills"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">2,156</h3>
                                <p class="mb-0">Active Customers</p>
                                <small class="opacity-75">
                                    <i class="fas fa-arrow-up me-1"></i>+5.8% this month
                                </small>
                            </div>
                            <div class="metric-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Row -->
        <div class="row g-4 mb-4">
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-clock text-warning fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">23</h5>
                        <small class="text-muted">Pending Orders</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-truck text-info fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">45</h5>
                        <small class="text-muted">Out for Delivery</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">180</h5>
                        <small class="text-muted">Delivered Today</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-exclamation-triangle text-danger fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">12</h5>
                        <small class="text-muted">Low Stock</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-star text-warning fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">4.8</h5>
                        <small class="text-muted">Avg Rating</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-undo text-secondary fa-2x mb-2"></i>
                        <h5 class="fw-bold mb-1">3</h5>
                        <small class="text-muted">Returns</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Analytics Row -->
        <div class="row g-4 mb-4">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Sales Analytics</h5>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                    Last 7 Days
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="text-center">
                                <i class="fas fa-chart-line fa-3x mb-3"></i>
                                <p>Sales Chart Placeholder</p>
                                <small class="text-muted">Chart visualization would be rendered here using your preferred charting library</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Top Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Pain Relief</span>
                                <span class="text-muted">38%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 38%; background-color: var(--pharmeasy-primary);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Vitamins</span>
                                <span class="text-muted">28%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 28%; background-color: var(--pharmeasy-secondary);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Antibiotics</span>
                                <span class="text-muted">18%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 18%;"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Personal Care</span>
                                <span class="text-muted">12%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 12%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Others</span>
                                <span class="text-muted">4%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 4%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables and Lists Row -->
        <div class="row g-4 mb-4">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Recent Orders</h5>
                            <a href="#" class="btn btn-outline-primary btn-sm">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-semibold">#ORD-2024-001</td>
                                        <td>Rajesh Kumar</td>
                                        <td>3 items</td>
                                        <td>₹485</td>
                                        <td><span class="badge badge-status bg-warning">Processing</span></td>
                                        <td>Today, 2:30 PM</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">#ORD-2024-002</td>
                                        <td>Priya Sharma</td>
                                        <td>1 item</td>
                                        <td>₹125</td>
                                        <td><span class="badge badge-status bg-info">Shipped</span></td>
                                        <td>Today, 1:45 PM</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">#ORD-2024-003</td>
                                        <td>Amit Patel</td>
                                        <td>5 items</td>
                                        <td>₹780</td>
                                        <td><span class="badge badge-status bg-success">Delivered</span></td>
                                        <td>Today, 11:20 AM</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">#ORD-2024-004</td>
                                        <td>Sunita Gupta</td>
                                        <td>2 items</td>
                                        <td>₹340</td>
                                        <td><span class="badge badge-status bg-primary">Confirmed</span></td>
                                        <td>Today, 10:15 AM</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">#ORD-2024-005</td>
                                        <td>Vikram Singh</td>
                                        <td>4 items</td>
                                        <td>₹650</td>
                                        <td><span class="badge badge-status bg-success">Delivered</span></td>
                                        <td>Today, 9:30 AM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card h-100">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Notifications</h5>
                    </div>
                    <div class="card-body">
                        <div class="notification-item p-3 rounded mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-exclamation-triangle text-warning me-2 mt-1"></i>
                                <div>
                                    <p class="fw-semibold mb-1">Low Stock Alert</p>
                                    <p class="text-muted small mb-1">Paracetamol 500mg is running low (5 left)</p>
                                    <small class="text-muted">2 minutes ago</small>
                                </div>
                            </div>
                        </div>

                        <div class="low-stock-alert p-3 rounded mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-calendar-times text-danger me-2 mt-1"></i>
                                <div>
                                    <p class="fw-semibold mb-1">Expiry Alert</p>
                                    <p class="text-muted small mb-1">3 products expiring within 30 days</p>
                                    <small class="text-muted">15 minutes ago</small>
                                </div>
                            </div>
                        </div>

                        <div class="notification-item p-3 rounded mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-star text-warning me-2 mt-1"></i>
                                <div>
                                    <p class="fw-semibold mb-1">New Review</p>
                                    <p class="text-muted small mb-1">5-star review for Crocin Advance</p>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                            </div>
                        </div>

                        <div class="notification-item p-3 rounded">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-truck text-info me-2 mt-1"></i>
                                <div>
                                    <p class="fw-semibold mb-1">Delivery Update</p>
                                    <p class="text-muted small mb-1">New shipment from Cipla arrived</p>
                                    <small class="text-muted">3 hours ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">
                                <i class="fas fa-exclamation-triangle text-danger me-2"></i>Low Stock Alerts
                            </h5>
                            <span class="badge bg-danger">12 Items</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Current Stock</th>
                                        <th>Minimum Stock</th>
                                        <th>Category</th>
                                        <th>Last Restocked</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-start border-danger border-3">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-pills text-primary me-2"></i>
                                                <div>
                                                    <div class="fw-semibold">Paracetamol 500mg</div>
                                                    <small class="text-muted">Cipla Ltd</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">5 units</span></td>
                                        <td>10 units</td>
                                        <td>Pain Relief</td>
                                        <td>15 Sep 2024</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Restock</button>
                                        </td>
                                    </tr>
                                    <tr class="border-start border-warning border-3">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-capsules text-success me-2"></i>
                                                <div>
                                                    <div class="fw-semibold">Vitamin D3 Capsules</div>
                                                    <small class="text-muted">Sun Pharma</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">8 units</span></td>
                                        <td>15 units</td>
                                        <td>Vitamins</td>
                                        <td>10 Sep 2024</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Restock</button>
                                        </td>
                                    </tr>
                                    <tr class="border-start border-warning border-3">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-tablets text-info me-2"></i>
                                                <div>
                                                    <div class="fw-semibold">Ibuprofen 400mg</div>
                                                    <small class="text-muted">Lupin Pharma</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">12 units</span></td>
                                        <td>20 units</td>
                                        <td>Pain Relief</td>
                                        <td>12 Sep 2024</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Restock</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>