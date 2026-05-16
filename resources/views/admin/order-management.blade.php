<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management - MediCare+ Admin</title>
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

        .section-divider {
            border-top: 2px solid #e9ecef;
            margin: 2rem 0;
        }

        .sidebar-toggle {
            display: none;
        }

        .order-timeline {
            position: relative;
            padding-left: 30px;
        }

        .order-timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--pharmeasy-primary);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -24px;
            top: 8px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--pharmeasy-primary);
        }

        .timeline-item.completed::before {
            background: #28a745;
        }

        .timeline-item.current::before {
            background: var(--pharmeasy-secondary);
            width: 14px;
            height: 14px;
            left: -26px;
            top: 6px;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            color: white;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                width: 250px;
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .btn-primary {
            background-color: var(--pharmeasy-primary);
            border-color: var(--pharmeasy-primary);
        }

        .btn-primary:hover {
            background-color: var(--pharmeasy-dark);
            border-color: var(--pharmeasy-dark);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include("admin.component.sidebar", ['page' => "orders"]);

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-primary sidebar-toggle me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Orders Management</h2>
                    <p class="text-muted mb-0">Manage and track all customer orders</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="fas fa-download me-2"></i>Export Orders
                </button>
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

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart fa-2x mb-2" style="color: var(--pharmeasy-primary);"></i>
                        <h4 class="fw-bold mb-1">248</h4>
                        <p class="text-muted mb-0">Total Orders Today</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                        <h4 class="fw-bold mb-1">23</h4>
                        <p class="text-muted mb-0">Pending Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-truck fa-2x text-info mb-2"></i>
                        <h4 class="fw-bold mb-1">45</h4>
                        <p class="text-muted mb-0">Out for Delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                        <h4 class="fw-bold mb-1">180</h4>
                        <p class="text-muted mb-0">Delivered Today</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="card p-4 mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Search Orders</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Order ID, Customer name..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Date Range</label>
                    <select class="form-select" id="dateFilter">
                        <option value="">All Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="custom">Custom Range</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Payment</label>
                    <select class="form-select" id="paymentFilter">
                        <option value="">All Payments</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Payment Pending</option>
                        <option value="failed">Payment Failed</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100">
                        <i class="fas fa-undo me-2"></i>Clear
                    </button>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Recent Orders</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                    </div>
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
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">#ORD-2024-001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-2">RK</div>
                                        <div>
                                            <div class="fw-semibold">Rajesh Kumar</div>
                                            <small class="text-muted">+91 98765 43210</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3 items</td>
                                <td>₹485.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <span class="badge bg-warning status-badge">
                                        <span class="status-indicator" style="background: #ffc107;"></span>
                                        Processing
                                    </span>
                                </td>
                                <td>Today, 2:30 PM</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal" onclick="loadOrderDetails('ORD-2024-001')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateOrderModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#trackingModal">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#ORD-2024-002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-2">PS</div>
                                        <div>
                                            <div class="fw-semibold">Priya Sharma</div>
                                            <small class="text-muted">+91 87654 32109</small>
                                        </div>
                                    </div>
                                </td>
                                <td>1 item</td>
                                <td>₹125.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <span class="badge bg-info status-badge">
                                        <span class="status-indicator" style="background: #17a2b8;"></span>
                                        Shipped
                                    </span>
                                </td>
                                <td>Today, 1:45 PM</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal" onclick="loadOrderDetails('ORD-2024-002')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateOrderModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#trackingModal">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#ORD-2024-003</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-2">AP</div>
                                        <div>
                                            <div class="fw-semibold">Amit Patel</div>
                                            <small class="text-muted">+91 76543 21098</small>
                                        </div>
                                    </div>
                                </td>
                                <td>5 items</td>
                                <td>₹780.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <span class="badge bg-success status-badge">
                                        <span class="status-indicator" style="background: #28a745;"></span>
                                        Delivered
                                    </span>
                                </td>
                                <td>Today, 11:20 AM</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal" onclick="loadOrderDetails('ORD-2024-003')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#invoiceModal">
                                            <i class="fas fa-file-invoice"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#refundModal">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#ORD-2024-004</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-2">SG</div>
                                        <div>
                                            <div class="fw-semibold">Sunita Gupta</div>
                                            <small class="text-muted">+91 65432 10987</small>
                                        </div>
                                    </div>
                                </td>
                                <td>2 items</td>
                                <td>₹340.00</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <span class="badge bg-primary status-badge">
                                        <span class="status-indicator" style="background: var(--pharmeasy-primary);"></span>
                                        Confirmed
                                    </span>
                                </td>
                                <td>Today, 10:15 AM</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal" onclick="loadOrderDetails('ORD-2024-004')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateOrderModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#ORD-2024-005</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-2">VS</div>
                                        <div>
                                            <div class="fw-semibold">Vikram Singh</div>
                                            <small class="text-muted">+91 54321 09876</small>
                                        </div>
                                    </div>
                                </td>
                                <td>4 items</td>
                                <td>₹650.00</td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>
                                    <span class="badge bg-danger status-badge">
                                        <span class="status-indicator" style="background: #dc3545;"></span>
                                        Cancelled
                                    </span>
                                </td>
                                <td>Today, 9:30 AM</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal" onclick="loadOrderDetails('ORD-2024-005')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#reactivateModal">
                                            <i class="fas fa-redo"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Showing 1 to 5 of 248 orders
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">50</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- View Order Modal -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-shopping-cart me-2"></i>Order Details - <span id="orderIdSpan">#ORD-2024-001</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Customer Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Customer Information</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div class="customer-avatar me-3" style="width: 50px; height: 50px;">RK</div>
                                <div>
                                    <div class="fw-bold">Rajesh Kumar</div>
                                    <div class="text-muted">rajesh.kumar@email.com</div>
                                    <div class="text-muted">+91 98765 43210</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Order Summary</h6>
                            <div class="row g-2">
                                <div class="col-6"><strong>Order Date:</strong></div>
                                <div class="col-6">18 Sep 2024, 2:30 PM</div>
                                <div class="col-6"><strong>Payment:</strong></div>
                                <div class="col-6"><span class="badge bg-success">Paid</span></div>
                                <div class="col-6"><strong>Status:</strong></div>
                                <div class="col-6"><span class="badge bg-warning">Processing</span></div>
                                <div class="col-6"><strong>Total Amount:</strong></div>
                                <div class="col-6 fw-bold">₹485.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Delivery Address</h6>
                        <div class="border rounded p-3 bg-light">
                            <strong>Rajesh Kumar</strong><br>
                            123, Green Valley Apartments<br>
                            Near City Hospital, Main Road<br>
                            Mumbai, Maharashtra - 400001<br>
                            <strong>Phone:</strong> +91 98765 43210
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Order Items</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Medicine</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <strong>Paracetamol 500mg</strong><br>
                                                <small class="text-muted">Strip of 10 tablets - Cipla Ltd</small>
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>₹25.00</td>
                                        <td>₹50.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <strong>Vitamin D3 1000 IU</strong><br>
                                                <small class="text-muted">Bottle of 30 capsules - Sun Pharma</small>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>₹180.00</td>
                                        <td>₹180.00</td>
                                    </tr>
                                    <tr>
									<!-- Order Items continued from main table -->
                                        <tr>
                                            <td>
                                                <div>
                                                    <strong>Crocin Advance</strong><br>
                                                    <small class="text-muted">Strip of 15 tablets - GSK</small>
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td>₹255.00</td>
                                            <td>₹255.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                            <td class="fw-bold">₹485.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">Delivery Charges:</td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end fw-bold">Total Amount:</td>
                                            <td class="fw-bold text-primary">₹485.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Order Timeline -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Order Timeline</h6>
                            <div class="order-timeline">
                                <div class="timeline-item completed">
                                    <strong>Order Placed</strong>
                                    <div class="text-muted">18 Sep 2024, 2:30 PM</div>
                                </div>
                                <div class="timeline-item completed">
                                    <strong>Payment Confirmed</strong>
                                    <div class="text-muted">18 Sep 2024, 2:32 PM</div>
                                </div>
                                <div class="timeline-item current">
                                    <strong>Processing</strong>
                                    <div class="text-muted">18 Sep 2024, 3:15 PM</div>
                                </div>
                                <div class="timeline-item">
                                    <strong>Shipped</strong>
                                    <div class="text-muted">Pending</div>
                                </div>
                                <div class="timeline-item">
                                    <strong>Delivered</strong>
                                    <div class="text-muted">Pending</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update Status</button>
                        <button type="button" class="btn btn-outline-info">Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Order Status Modal -->
        <div class="modal fade" id="updateOrderModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-edit me-2"></i>Update Order Status
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Order ID</label>
                                <input type="text" class="form-control" value="#ORD-2024-001" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Status</label>
                                <select class="form-select">
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="processing" selected>Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tracking Number</label>
                                <input type="text" class="form-control" placeholder="Enter tracking number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Notes</label>
                                <textarea class="form-control" rows="3" placeholder="Add any notes about this status update"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifyCustomer">
                                <label class="form-check-label" for="notifyCustomer">
                                    Notify customer via SMS and Email
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Update Status</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tracking Modal -->
        <div class="modal fade" id="trackingModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-map-marker-alt me-2"></i>Order Tracking
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-2">Tracking Number</h6>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>TRK123456789
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-2">Estimated Delivery</h6>
                                <div class="alert alert-success">
                                    <i class="fas fa-clock me-2"></i>20 Sep 2024, 6:00 PM
                                </div>
                            </div>
                        </div>
                        
                        <!-- Live Map Placeholder -->
                        <div class="mb-4">
                            <div class="border rounded bg-light p-5 text-center">
                                <i class="fas fa-map fa-3x text-muted mb-3"></i>
                                <h6 class="text-muted">Live Tracking Map</h6>
                                <p class="text-muted mb-0">Real-time delivery tracking would be displayed here</p>
                            </div>
                        </div>

                        <!-- Delivery Progress -->
                        <div class="order-timeline">
                            <div class="timeline-item completed">
                                <strong>Order Picked Up</strong>
                                <div class="text-muted">18 Sep 2024, 4:30 PM - Distribution Center Mumbai</div>
                            </div>
                            <div class="timeline-item completed">
                                <strong>In Transit</strong>
                                <div class="text-muted">19 Sep 2024, 8:00 AM - On the way to delivery hub</div>
                            </div>
                            <div class="timeline-item current">
                                <strong>Out for Delivery</strong>
                                <div class="text-muted">19 Sep 2024, 2:00 PM - Assigned to delivery partner</div>
                            </div>
                            <div class="timeline-item">
                                <strong>Delivered</strong>
                                <div class="text-muted">Expected: 20 Sep 2024, 6:00 PM</div>
                            </div>
                        </div>

                        <!-- Delivery Partner Info -->
                        <div class="mt-4 p-3 border rounded bg-light">
                            <h6 class="fw-bold mb-2">Delivery Partner</h6>
                            <div class="d-flex align-items-center">
                                <div class="customer-avatar me-3">RP</div>
                                <div>
                                    <strong>Raj Patel</strong><br>
                                    <small class="text-muted">+91 99887 66554</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-info">Contact Delivery Partner</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancel Order Modal -->
        <div class="modal fade" id="cancelOrderModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            <i class="fas fa-times me-2"></i>Cancel Order
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Are you sure you want to cancel this order? This action cannot be undone.
                        </div>
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Cancellation Reason</label>
                                <select class="form-select" required>
                                    <option value="">Select reason</option>
                                    <option value="customer_request">Customer Request</option>
                                    <option value="out_of_stock">Out of Stock</option>
                                    <option value="payment_failed">Payment Failed</option>
                                    <option value="address_issue">Address Issue</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Additional Notes</label>
                                <textarea class="form-control" rows="3" placeholder="Add any additional notes"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="processRefund">
                                <label class="form-check-label" for="processRefund">
                                    Process automatic refund (if payment was made)
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Keep Order</button>
                        <button type="button" class="btn btn-danger">Cancel Order</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Modal -->
        <div class="modal fade" id="invoiceModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-file-invoice me-2"></i>Invoice - #ORD-2024-003
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="invoice-content">
                            <!-- Invoice Header -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4 class="fw-bold" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-pills me-2"></i>MediCare<span style="color: var(--pharmeasy-secondary);">+</span>
                                    </h4>
                                    <p class="mb-1">123 Medical Street</p>
                                    <p class="mb-1">Mumbai, Maharashtra 400001</p>
                                    <p class="mb-1">Phone: +91 22 1234 5678</p>
                                    <p class="mb-0">Email: support@medicare.com</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 class="fw-bold">INVOICE</h5>
                                    <p class="mb-1"><strong>Invoice #:</strong> INV-2024-003</p>
                                    <p class="mb-1"><strong>Order #:</strong> #ORD-2024-003</p>
                                    <p class="mb-1"><strong>Date:</strong> 18 Sep 2024</p>
                                    <p class="mb-0"><strong>Due Date:</strong> Paid</p>
                                </div>
                            </div>

                            <!-- Customer Details -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-2">Bill To:</h6>
                                    <p class="mb-1"><strong>Amit Patel</strong></p>
                                    <p class="mb-1">456 Business Complex</p>
                                    <p class="mb-1">Near Metro Station</p>
                                    <p class="mb-1">Delhi, India - 110001</p>
                                    <p class="mb-0">Phone: +91 76543 21098</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-2">Ship To:</h6>
                                    <p class="mb-1"><strong>Amit Patel</strong></p>
                                    <p class="mb-1">456 Business Complex</p>
                                    <p class="mb-1">Near Metro Station</p>
                                    <p class="mb-1">Delhi, India - 110001</p>
                                    <p class="mb-0">Phone: +91 76543 21098</p>
                                </div>
                            </div>

                            <!-- Invoice Items -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Item Description</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Paracetamol 500mg - Strip of 10 tablets</td>
                                            <td>3</td>
                                            <td>₹25.00</td>
                                            <td>₹75.00</td>
                                        </tr>
                                        <tr>
                                            <td>Vitamin D3 1000 IU - Bottle of 30 capsules</td>
                                            <td>1</td>
                                            <td>₹180.00</td>
                                            <td>₹180.00</td>
                                        </tr>
                                        <tr>
                                            <td>Amoxicillin 250mg - Strip of 10 capsules</td>
                                            <td>2</td>
                                            <td>₹85.00</td>
                                            <td>₹170.00</td>
                                        </tr>
                                        <tr>
                                            <td>Crocin Advance - Strip of 15 tablets</td>
                                            <td>2</td>
                                            <td>₹55.00</td>
                                            <td>₹110.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ibuprofen 400mg - Strip of 10 tablets</td>
                                            <td>1</td>
                                            <td>₹35.00</td>
                                            <td>₹35.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                            <td class="fw-bold">₹570.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">Discount:</td>
                                            <td>₹20.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">Delivery Charges:</td>
                                            <td>₹30.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">Tax (5%):</td>
                                            <td>₹27.50</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td colspan="3" class="text-end fw-bold">Total Amount:</td>
                                            <td class="fw-bold">₹780.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Payment Info -->
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-2">Payment Information:</h6>
                                    <p class="mb-1"><strong>Payment Method:</strong> Credit Card</p>
                                    <p class="mb-1"><strong>Transaction ID:</strong> TXN1234567890</p>
                                    <p class="mb-0"><strong>Payment Status:</strong> <span class="badge bg-success">Paid</span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p class="mb-1"><small>Thank you for your business!</small></p>
                                    <p class="mb-0"><small>This is a computer generated invoice.</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-info">Download PDF</button>
                        <button type="button" class="btn btn-primary">Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Refund Modal -->
        <div class="modal fade" id="refundModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-undo me-2"></i>Process Refund
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Order Total</label>
                                <input type="text" class="form-control" value="₹780.00" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Refund Type</label>
                                <select class="form-select">
                                    <option value="full">Full Refund</option>
                                    <option value="partial">Partial Refund</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Refund Amount</label>
                                <input type="number" class="form-control" value="780.00" step="0.01">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Refund Reason</label>
                                <select class="form-select">
                                    <option value="">Select reason</option>
                                    <option value="damaged">Damaged Product</option>
                                    <option value="wrong_item">Wrong Item Delivered</option>
                                    <option value="customer_request">Customer Request</option>
                                    <option value="quality_issue">Quality Issue</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Notes</label>
                                <textarea class="form-control" rows="3" placeholder="Add refund notes"></textarea>
                            </div>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Refund will be processed to the original payment method within 3-5 business days.
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-warning">Process Refund</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reactivate Order Modal -->
        <div class="modal fade" id="reactivateModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-redo me-2"></i>Reactivate Order
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            This order was previously cancelled. Are you sure you want to reactivate it?
                        </div>
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Status</label>
                                <input type="text" class="form-control" value="Cancelled" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Status</label>
                                <select class="form-select">
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="processing">Processing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Reason for Reactivation</label>
                                <textarea class="form-control" rows="3" placeholder="Enter reason for reactivating this order"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifyCustomerReactivate">
                                <label class="form-check-label" for="notifyCustomerReactivate">
                                    Notify customer about order reactivation
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success">Reactivate Order</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Export Orders Modal -->
        <div class="modal fade" id="exportModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-download me-2"></i>Export Orders
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Export Format</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exportFormat" id="csvFormat" value="csv" checked>
                                    <label class="form-check-label" for="csvFormat">
                                        <i class="fas fa-file-csv me-2"></i>CSV Format
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exportFormat" id="excelFormat" value="excel">
                                    <label class="form-check-label" for="excelFormat">
                                        <i class="fas fa-file-excel me-2"></i>Excel Format
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exportFormat" id="pdfFormat" value="pdf">
                                    <label class="form-check-label" for="pdfFormat">
                                        <i class="fas fa-file-pdf me-2"></i>PDF Format
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date Range</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="date" class="form-control" placeholder="From Date">
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="form-control" placeholder="To Date">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Order Status</label>
                                <select class="form-select">
                                    <option value="">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Include Fields</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeCustomer" checked>
                                            <label class="form-check-label" for="includeCustomer">Customer Details</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeItems" checked>
                                            <label class="form-check-label" for="includeItems">Order Items</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includePayment" checked>
                                            <label class="form-check-label" for="includePayment">Payment Info</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeAddress">
                                            <label class="form-check-label" for="includeAddress">Delivery Address</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeTracking">
                                            <label class="form-check-label" for="includeTracking">Tracking Info</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeNotes">
                                            <label class="form-check-label" for="includeNotes">Order Notes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-download me-2"></i>Export Orders
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('show') && 
                !sidebar.contains(event.target) && 
                !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });

        // Load order details function
        function loadOrderDetails(orderId) {
            document.getElementById('orderIdSpan').textContent = '#' + orderId;
            // Here you would typically load order data via AJAX
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const orderId = row.querySelector('td:first-child').textContent.toLowerCase();
                const customerName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                
                if (orderId.includes(searchTerm) || customerName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter functionality
        function applyFilters() {
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;
            const paymentFilter = document.getElementById('paymentFilter').value;
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                let showRow = true;
                
                // Status filter
                if (statusFilter) {
                    const statusText = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                    if (!statusText.includes(statusFilter)) {
                        showRow = false;
                    }
                }
                
                // Payment filter
                if (paymentFilter) {
                    const paymentText = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                    if (paymentFilter === 'paid' && !paymentText.includes('paid')) {
                        showRow = false;
                    } else if (paymentFilter === 'pending' && !paymentText.includes('pending')) {
                        showRow = false;
                    } else if (paymentFilter === 'failed' && !paymentText.includes('failed')) {
                        showRow = false;
                    }
                }
                
                row.style.display = showRow ? '' : 'none';
            });
        }

        // Add event listeners for filters
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('dateFilter').addEventListener('change', applyFilters);
        document.getElementById('paymentFilter').addEventListener('change', applyFilters);

        // Clear filters
        document.querySelector('.btn-outline-secondary[onclick*="Clear"]').addEventListener('click', function() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('dateFilter').value = '';
            document.getElementById('paymentFilter').value = '';
            
            // Show all rows
            document.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = '';
            });
        });

        // Print functionality
        function printInvoice() {
            const printContent = document.querySelector('.invoice-content').innerHTML;
            const originalContent = document.body.innerHTML;
            
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }

        // Export functionality
        function exportOrders(format) {
            // In a real application, this would send a request to the server
            console.log('Exporting orders in ' + format + ' format');
            alert('Orders exported successfully in ' + format.toUpperCase() + ' format!');
        }

        // Notification function
        function showNotification(message, type = 'success') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 5000);
        }

        // Form submission handlers
        document.addEventListener('DOMContentLoaded', function() {
            // Update order status
            const updateStatusButtons = document.querySelectorAll('#updateOrderModal .btn-primary');
            updateStatusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    showNotification('Order status updated successfully!', 'success');
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('updateOrderModal'));
                    modal.hide();
                });
            });

            // Cancel order
            const cancelOrderButtons = document.querySelectorAll('#cancelOrderModal .btn-danger');
            cancelOrderButtons.forEach(button => {
                button.addEventListener('click', function() {
                    showNotification('Order cancelled successfully!', 'warning');
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('cancelOrderModal'));
                    modal.hide();
                });
            });

            // Process refund
            const refundButtons = document.querySelectorAll('#refundModal .btn-warning');
            refundButtons.forEach(button => {
                button.addEventListener('click', function() {
                    showNotification('Refund processed successfully!', 'info');
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('refundModal'));
                    modal.hide();
                });
            });

            // Reactivate order
            const reactivateButtons = document.querySelectorAll('#reactivateModal .btn-success');
            reactivateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    showNotification('Order reactivated successfully!', 'success');
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('reactivateModal'));
                    modal.hide();
                });
            });

            // Export orders
            const exportButtons = document.querySelectorAll('#exportModal .btn-primary');
            exportButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const selectedFormat = document.querySelector('input[name="exportFormat"]:checked').value;
                    exportOrders(selectedFormat);
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
                    modal.hide();
                });
            });
        });

        // Real-time updates simulation
        function simulateRealTimeUpdates() {
            setInterval(() => {
                // Update stats randomly (for demonstration)
                const stats = [
                    document.querySelector('.card-body h4'), // Total orders
                    document.querySelectorAll('.card-body h4')[1], // Pending
                    document.querySelectorAll('.card-body h4')[2], // Out for delivery
                    document.querySelectorAll('.card-body h4')[3]  // Delivered
                ];
                
                stats.forEach(stat => {
                    if (stat) {
                        const currentValue = parseInt(stat.textContent);
                        const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                        const newValue = Math.max(0, currentValue + change);
                        stat.textContent = newValue.toString();
                    }
                });
            }, 30000); // Update every 30 seconds
        }

        // Initialize real-time updates
        simulateRealTimeUpdates();
    </script>

</body>
</html>