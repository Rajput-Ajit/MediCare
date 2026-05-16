<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Management - MediCare+ Admin</title>
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
            transform: translateX(0);
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
            padding: 10px 15px;
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

        .customer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .customer-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            color: white;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .section-divider {
            border-top: 2px solid rgba(255, 255, 255, 0.2);
            margin: 2rem 0;
        }

        .sidebar-toggle {
            display: none;
        }

        .btn-primary {
            background-color: var(--pharmeasy-primary);
            border-color: var(--pharmeasy-primary);
        }

        .btn-primary:hover {
            background-color: var(--pharmeasy-dark);
            border-color: var(--pharmeasy-dark);
        }

        .loyalty-badge {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #333;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .order-history-item {
            border-left: 3px solid var(--pharmeasy-primary);
            padding-left: 15px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include("admin.component.sidebar", ['page' => "user"]);

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-primary sidebar-toggle me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Customer Management</h2>
                    <p class="text-muted mb-0">Manage and track all customer information</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                    <i class="fas fa-plus me-2"></i>Add Customer
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
                        <i class="fas fa-users fa-2x mb-2" style="color: var(--pharmeasy-primary);"></i>
                        <h4 class="fw-bold mb-1">2,847</h4>
                        <p class="text-muted mb-0">Total Customers</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-user-plus fa-2x text-success mb-2"></i>
                        <h4 class="fw-bold mb-1">127</h4>
                        <p class="text-muted mb-0">New This Month</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-star fa-2x text-warning mb-2"></i>
                        <h4 class="fw-bold mb-1">543</h4>
                        <p class="text-muted mb-0">VIP Customers</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-clock fa-2x text-info mb-2"></i>
                        <h4 class="fw-bold mb-1">89</h4>
                        <p class="text-muted mb-0">Active Today</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="card p-4 mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Search Customers</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Name, phone, email...">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Status</label>
                    <select class="form-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="blocked">Blocked</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Customer Type</label>
                    <select class="form-select">
                        <option value="">All Types</option>
                        <option value="regular">Regular</option>
                        <option value="vip">VIP</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Location</label>
                    <select class="form-select">
                        <option value="">All Cities</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="delhi">Delhi</option>
                        <option value="bangalore">Bangalore</option>
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

        <!-- Customers Table -->
        <div class="card">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Customer List</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exportModal">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
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
                                <th>Customer</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>Orders</th>
                                <th>Total Spent</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-3">RK</div>
                                        <div>
                                            <div class="fw-semibold">Rajesh Kumar</div>
                                            <small class="text-muted">ID: CUS-001</small>
                                            <div><span class="loyalty-badge">VIP</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>+91 98765 43210</div>
                                    <small class="text-muted">rajesh.kumar@email.com</small>
                                </td>
                                <td>Mumbai, Maharashtra</td>
                                <td>
                                    <span class="fw-semibold">47</span>
                                    <small class="text-muted d-block">orders</small>
                                </td>
                                <td>
                                    <span class="fw-semibold">₹23,450</span>
                                </td>
                                <td>
                                    <span class="badge bg-success customer-status">
                                        <span class="status-indicator" style="background: #28a745;"></span>
                                        Active
                                    </span>
                                </td>
                                <td>15 Jan 2023</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewCustomerModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomerModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#orderHistoryModal"><i class="fas fa-history me-2"></i>Order History</a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loyaltyModal"><i class="fas fa-gift me-2"></i>Loyalty Points</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-warning" href="#" data-bs-toggle="modal" data-bs-target="#blockCustomerModal"><i class="fas fa-ban me-2"></i>Block Customer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-3">PS</div>
                                        <div>
                                            <div class="fw-semibold">Priya Sharma</div>
                                            <small class="text-muted">ID: CUS-002</small>
                                            <div><span class="badge bg-light text-dark">Regular</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>+91 87654 32109</div>
                                    <small class="text-muted">priya.sharma@email.com</small>
                                </td>
                                <td>Delhi, Delhi</td>
                                <td>
                                    <span class="fw-semibold">23</span>
                                    <small class="text-muted d-block">orders</small>
                                </td>
                                <td>
                                    <span class="fw-semibold">₹8,920</span>
                                </td>
                                <td>
                                    <span class="badge bg-success customer-status">
                                        <span class="status-indicator" style="background: #28a745;"></span>
                                        Active
                                    </span>
                                </td>
                                <td>28 Mar 2023</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewCustomerModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomerModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#orderHistoryModal"><i class="fas fa-history me-2"></i>Order History</a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loyaltyModal"><i class="fas fa-gift me-2"></i>Loyalty Points</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-warning" href="#" data-bs-toggle="modal" data-bs-target="#blockCustomerModal"><i class="fas fa-ban me-2"></i>Block Customer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="customer-avatar me-3">VS</div>
                                        <div>
                                            <div class="fw-semibold">Vikram Singh</div>
                                            <small class="text-muted">ID: CUS-005</small>
                                            <div><span class="badge bg-light text-dark">Regular</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>+91 54321 09876</div>
                                    <small class="text-muted">vikram.singh@email.com</small>
                                </td>
                                <td>Pune, Maharashtra</td>
                                <td>
                                    <span class="fw-semibold">8</span>
                                    <small class="text-muted d-block">orders</small>
                                </td>
                                <td>
                                    <span class="fw-semibold">₹1,890</span>
                                </td>
                                <td>
                                    <span class="badge bg-danger customer-status">
                                        <span class="status-indicator" style="background: #dc3545;"></span>
                                        Blocked
                                    </span>
                                </td>
                                <td>18 Sep 2024</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewCustomerModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomerModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#unblockCustomerModal">
                                            <i class="fas fa-unlock"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#orderHistoryModal"><i class="fas fa-history me-2"></i>Order History</a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loyaltyModal"><i class="fas fa-gift me-2"></i>Loyalty Points</a></li>
                                            </ul>
                                        </div>
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
                Showing 1 to 3 of 2,847 customers
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
                        <a class="page-link" href="#">570</a>
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

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">
                        <i class="fas fa-user-plus me-2"></i>Add New Customer
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email *</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number *</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Gender</label>
                                <select class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Blood Group</label>
                                <select class="form-select">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Customer Type</label>
                                <select class="form-select">
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="vip">VIP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Address</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">City</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">State</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">PIN Code</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Medical Conditions</label>
                                <textarea class="form-control" rows="2" placeholder="Any chronic conditions, allergies, etc."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Customer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Customer Modal -->
    <!-- View Customer Modal -->
    <div class="modal fade" id="viewCustomerModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user me-2"></i>Customer Details - Rajesh Kumar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Customer Info -->
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <div class="customer-avatar mx-auto mb-3" style="width: 80px; height: 80px; font-size: 32px;">RK</div>
                                <h5 class="fw-bold">Rajesh Kumar</h5>
                                <span class="loyalty-badge">VIP Customer</span>
                                <div class="mt-2">
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Contact Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <strong>Phone:</strong><br>
                                        <a href="tel:+919876543210">+91 98765 43210</a>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Email:</strong><br>
                                        <a href="mailto:rajesh.kumar@email.com">rajesh.kumar@email.com</a>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Address:</strong><br>
                                        123, Green Valley Apartments<br>
                                        Near City Hospital, Main Road<br>
                                        Mumbai, Maharashtra - 400001
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Details & Stats -->
                        <div class="col-md-8">
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <h4 class="fw-bold mb-1 text-primary">47</h4>
                                            <small class="text-muted">Total Orders</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <h4 class="fw-bold mb-1 text-success">₹23,450</h4>
                                            <small class="text-muted">Total Spent</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <h4 class="fw-bold mb-1 text-warning">1,250</h4>
                                            <small class="text-muted">Loyalty Points</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <h4 class="fw-bold mb-1 text-info">₹498</h4>
                                            <small class="text-muted">Avg Order</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Details -->
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Personal Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <strong>Customer ID:</strong><br>
                                            CUS-001
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Date of Birth:</strong><br>
                                            15 Aug 1985
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Gender:</strong><br>
                                            Male
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Blood Group:</strong><br>
                                            B+
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Joined Date:</strong><br>
                                            15 Jan 2023
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Last Order:</strong><br>
                                            18 Sep 2024
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medical Information -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Medical Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <strong>Chronic Conditions:</strong><br>
                                            Hypertension, Diabetes Type 2
                                        </div>
                                        <div class="col-12">
                                            <strong>Allergies:</strong><br>
                                            Penicillin, Sulpha drugs
                                        </div>
                                        <div class="col-12">
                                            <strong>Current Medications:</strong><br>
                                            Metformin 500mg, Amlodipine 5mg
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Orders -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Recent Orders</h6>
                                </div>
                                <div class="card-body">
                                    <div class="order-history-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>#ORD-2024-001</strong> - ₹485.00
                                                <div class="text-muted small">3 items • 18 Sep 2024</div>
                                            </div>
                                            <span class="badge bg-warning">Processing</span>
                                        </div>
                                    </div>
                                    <div class="order-history-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>#ORD-2024-012</strong> - ₹320.00
                                                <div class="text-muted small">2 items • 15 Sep 2024</div>
                                            </div>
                                            <span class="badge bg-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="order-history-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>#ORD-2024-008</strong> - ₹750.00
                                                <div class="text-muted small">5 items • 10 Sep 2024</div>
                                            </div>
                                            <span class="badge bg-success">Delivered</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCustomerModal">Edit Customer</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Customer Modal -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>Edit Customer - Rajesh Kumar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name *</label>
                                <input type="text" class="form-control" value="Rajesh Kumar" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email *</label>
                                <input type="email" class="form-control" value="rajesh.kumar@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number *</label>
                                <input type="tel" class="form-control" value="+91 98765 43210" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" class="form-control" value="1985-08-15">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Gender</label>
                                <select class="form-select">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Blood Group</label>
                                <select class="form-select">
                                    <option value="B+" selected>B+</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Customer Type</label>
                                <select class="form-select">
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="vip" selected>VIP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Address</label>
                                <textarea class="form-control" rows="2">123, Green Valley Apartments, Near City Hospital, Main Road</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">City</label>
                                <input type="text" class="form-control" value="Mumbai">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">State</label>
                                <input type="text" class="form-control" value="Maharashtra">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">PIN Code</label>
                                <input type="text" class="form-control" value="400001">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Medical Conditions</label>
                                <textarea class="form-control" rows="2">Hypertension, Diabetes Type 2. Allergies: Penicillin, Sulpha drugs</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status</label>
                                <select class="form-select">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="blocked">Blocked</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Loyalty Points</label>
                                <input type="number" class="form-control" value="1250" readonly>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="editEmailNotifications" checked>
                                    <label class="form-check-label" for="editEmailNotifications">
                                        Send email notifications about orders and offers
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="editSmsNotifications" checked>
                                    <label class="form-check-label" for="editSmsNotifications">
                                        Send SMS notifications about orders
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update Customer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Message Modal -->
    <div class="modal fade" id="sendMessageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-envelope me-2"></i>Send Message to Rajesh Kumar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Message Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="messageType" id="emailMessage" value="email" checked>
                                <label class="form-check-label" for="emailMessage">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="messageType" id="smsMessage" value="sms">
                                <label class="form-check-label" for="smsMessage">
                                    <i class="fas fa-sms me-2"></i>SMS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="messageType" id="bothMessage" value="both">
                                <label class="form-check-label" for="bothMessage">
                                    <i class="fas fa-paper-plane me-2"></i>Email & SMS
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Subject</label>
                            <input type="text" class="form-control" placeholder="Enter message subject">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Message Template</label>
                            <select class="form-select mb-2">
                                <option value="">Custom Message</option>
                                <option value="welcome">Welcome Message</option>
                                <option value="order_reminder">Order Reminder</option>
                                <option value="health_tip">Health Tip</option>
                                <option value="offer">Special Offer</option>
                                <option value="birthday">Birthday Wishes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="scheduleMessage">
                                <label class="form-check-label" for="scheduleMessage">
                                    Schedule message for later
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-none" id="scheduleDateTime">
                            <label class="form-label fw-semibold">Schedule Date & Time</label>
                            <input type="datetime-local" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Send Message</button>
                </div>
            </div>
        </div>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script>
        // Minimal JavaScript for basic functionality
        
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar on outside click (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('show') && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });

        // Schedule message toggle
        document.getElementById('scheduleMessage').addEventListener('change', function() {
            const scheduleDiv = document.getElementById('scheduleDateTime');
            if (this.checked) {
                scheduleDiv.classList.remove('d-none');
            } else {
                scheduleDiv.classList.add('d-none');
            }
        });

        // Simple notification system
        function showNotification(message, type = 'success') {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);
            
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }

        // Form submissions (using Bootstrap's built-in modal events)
        document.addEventListener('DOMContentLoaded', function() {
            // Add customer
            document.querySelector('#addCustomerModal .btn-primary').addEventListener('click', function() {
                showNotification('Customer added successfully!', 'success');
                bootstrap.Modal.getInstance(document.getElementById('addCustomerModal')).hide();
            });

            // Update customer
            document.querySelector('#editCustomerModal .btn-primary').addEventListener('click', function() {
                showNotification('Customer updated successfully!', 'success');
                bootstrap.Modal.getInstance(document.getElementById('editCustomerModal')).hide();
            });

            // Send message
            document.querySelector('#sendMessageModal .btn-primary').addEventListener('click', function() {
                showNotification('Message sent successfully!', 'info');
                bootstrap.Modal.getInstance(document.getElementById('sendMessageModal')).hide();
            });

            // Block customer
            document.querySelector('#blockCustomerModal .btn-warning').addEventListener('click', function() {
                showNotification('Customer blocked successfully!', 'warning');
                bootstrap.Modal.getInstance(document.getElementById('blockCustomerModal')).hide();
            });

            // Unblock customer
            document.querySelector('#unblockCustomerModal .btn-success').addEventListener('click', function() {
                showNotification('Customer unblocked successfully!', 'success');
                bootstrap.Modal.getInstance(document.getElementById('unblockCustomerModal')).hide();
            });

            // Export customers
            document.querySelector('#exportModal .btn-primary').addEventListener('click', function() {
                const format = document.querySelector('input[name="exportFormat"]:checked').value;
                showNotification(`Customers exported in ${format.toUpperCase()} format!`, 'info');
                bootstrap.Modal.getInstance(document.getElementById('exportModal')).hide();
            });
        });
    </script>
    </body>
</html>