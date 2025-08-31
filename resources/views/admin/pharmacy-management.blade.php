<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management - Pharma Care Admin</title>
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

        .pharmacy-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .pharmacy-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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

        .rating {
            color: #ffc107;
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
                    <h4 class="mb-0" style="color: var(--primary-color);">Pharmacy Management</h4>
                    <small class="text-muted">Approve/reject new pharmacy registrations</small>
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
                        <h5 class="mb-1" style="color: var(--primary-color);">Pharmacy Registration Management</h5>
                        <p class="text-muted mb-0">Review and approve new pharmacy applications</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i>Export Report
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add Pharmacy
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--primary-color);">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="h4 mb-1">245</div>
                        <div class="text-muted">Total Pharmacies</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12 this month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--warning-color);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="h4 mb-1">18</div>
                        <div class="text-muted">Pending Approval</div>
                        <div class="mt-2">
                            <small class="text-warning">
                                <i class="fas fa-exclamation-triangle"></i> Requires attention
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--success-color);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="h4 mb-1">227</div>
                        <div class="text-muted">Approved</div>
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +8 this week
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--danger-color);">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="h4 mb-1">34</div>
                        <div class="text-muted">Rejected</div>
                        <div class="mt-2">
                            <small class="text-danger">
                                <i class="fas fa-arrow-down"></i> -2 this week
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
                            <input type="text" class="form-control" placeholder="Search pharmacies...">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select">
                            <option value="">All Cities</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="delhi">Delhi</option>
                            <option value="bangalore">Bangalore</option>
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

            <!-- Pending Approvals Section -->
            <div class="mb-4">
                <h5 class="mb-3" style="color: var(--primary-color);">
                    <i class="fas fa-clock me-2"></i>Pending Approvals (18)
                </h5>
                <div class="row g-4">
                    <!-- Pending Pharmacy Card 1 -->
                    <div class="col-lg-6">
                        <div class="pharmacy-card border-start border-warning border-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="fw-bold mb-1">MediPlus Pharmacy</h6>
                                    <small class="text-muted">Applied on: 25 Aug 2024</small>
                                </div>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Owner</small>
                                    <div class="fw-semibold">Dr. Rahul Gupta</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">License No.</small>
                                    <div class="fw-semibold">PH12345678</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Phone</small>
                                    <div class="fw-semibold">+91 9876543210</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">City</small>
                                    <div class="fw-semibold">Mumbai</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block">Address</small>
                                <div class="fw-semibold">Shop No. 15, Ground Floor, Andheri West, Mumbai - 400058</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-check me-1"></i>Approve
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-times me-1"></i>Reject
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </button>
                                </div>
                                <small class="text-muted">5 days pending</small>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Pharmacy Card 2 -->
                    <div class="col-lg-6">
                        <div class="pharmacy-card border-start border-warning border-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="fw-bold mb-1">HealthCare Pharmacy</h6>
                                    <small class="text-muted">Applied on: 24 Aug 2024</small>
                                </div>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Owner</small>
                                    <div class="fw-semibold">Mrs. Priya Sharma</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">License No.</small>
                                    <div class="fw-semibold">PH87654321</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Phone</small>
                                    <div class="fw-semibold">+91 9876543211</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">City</small>
                                    <div class="fw-semibold">Delhi</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block">Address</small>
                                <div class="fw-semibold">A-15, Lajpat Nagar, New Delhi - 110024</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-check me-1"></i>Approve
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-times me-1"></i>Reject
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </button>
                                </div>
                                <small class="text-muted">6 days pending</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Pharmacies Table -->
            <div class="table-container">
                <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary-color);">All Registered Pharmacies</h5>
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
                            <th>Pharmacy Details</th>
                            <th>Owner</th>
                            <th>License</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Apollo Pharmacy</div>
                                    <small class="text-muted">Reg. Date: 15 Jan 2024</small>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Dr. Amit Shah</div>
                                    <small class="text-muted">+91 9876543200</small>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold">PH11223344</div>
                                <small class="text-success">Valid</small>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Mumbai</div>
                                    <small class="text-muted">Bandra West</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            <td>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <small class="text-muted ms-1">4.2</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">MedPlus Pharmacy</div>
                                    <small class="text-muted">Reg. Date: 12 Jan 2024</small>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Dr. Neha Patel</div>
                                    <small class="text-muted">+91 9876543201</small>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold">PH55667788</div>
                                <small class="text-success">Valid</small>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Bangalore</div>
                                    <small class="text-muted">Koramangala</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            <td>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">4.8</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Wellness Pharmacy</div>
                                    <small class="text-muted">Reg. Date: 10 Jan 2024</small>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Dr. Rajesh Kumar</div>
                                    <small class="text-muted">+91 9876543202</small>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold">PH99887766</div>
                                <small class="text-warning">Expiring Soon</small>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Delhi</div>
                                    <small class="text-muted">Connaught Place</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">Under Review</span>
                            </td>
                            <td>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <small class="text-muted ms-1">3.5</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">HealthFirst Pharmacy</div>
                                    <small class="text-muted">Reg. Date: 08 Jan 2024</small>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Mrs. Sunita Singh</div>
                                    <small class="text-muted">+91 9876543203</small>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold">PH44556677</div>
                                <small class="text-danger">Expired</small>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">Pune</div>
                                    <small class="text-muted">Hadapsar</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-danger">Suspended</span>
                            </td>
                            <td>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <small class="text-muted ms-1">2.1</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Showing 1 to 4 of 245 entries</small>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>