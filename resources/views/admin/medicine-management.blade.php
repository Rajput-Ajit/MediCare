<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management - MediCare+ Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ================== Variables ================== */
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

        /* ================== Sidebar ================== */
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

        /* ================== Main Content ================== */
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

        /* ================== Cards ================== */
        .card, .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: none;
            transition: all 0.3s ease;
        }

        .card:hover, .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-header {
            background: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
            border: none;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            margin-bottom: 1rem;
        }

        .stats-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--muted-text);
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* ================== Table ================== */
        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: var(--primary-color);
            color: white;
        }

        .table th, .table td {
            border: none;
            padding: 1rem;
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

        /* ================== Buttons ================== */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /* ================== Modals ================== */
        .modal-header {
            background: var(--primary-color);
            color: white;
        }

        /* ================== Customer Info ================== */
        .customer-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .customer-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* ================== Order Status ================== */
        .order-status {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .status-pending { background: var(--warning-color); }
        .status-confirmed { background: var(--info-color); }
        .status-processing { background: var(--secondary-color); }
        .status-shipped { background: var(--success-color); }
        .status-delivered { background: var(--success-color); }
        .status-cancelled { background: var(--danger-color); }

        .medicine-item {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
     @include("admin.component.sidebar");

    <!-- Main Content -->
    <div class="main-content">
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0" style="color: var(--primary-color);">Order Management System</h4>
                    <small class="text-muted">Process customer orders and manage prescriptions</small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="position-relative">
                        <i class="fas fa-bell fs-5 text-muted"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
                    </div>
                    <div class="user-avatar">AD</div>
                    <div>
                        <div class="fw-semibold">Admin</div>
                        <small class="text-muted">admin@medicare.com</small>
                    </div>
                </div>
            </div>
        </nav>

        <div class="content-area">
            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--warning-color);"><i class="fas fa-clock"></i></div>
                        <div class="stats-number">12</div>
                        <div class="stats-label">Pending Orders</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--info-color);"><i class="fas fa-file-medical"></i></div>
                        <div class="stats-number">8</div>
                        <div class="stats-label">Need Prescription Review</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--success-color);"><i class="fas fa-check-circle"></i></div>
                        <div class="stats-number">45</div>
                        <div class="stats-label">Processed Today</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: var(--danger-color);"><i class="fas fa-times-circle"></i></div>
                        <div class="stats-number">3</div>
                        <div class="stats-label">Cancelled Orders</div>
                    </div>
                </div>
            </div>

            <!-- Order Table -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Current Orders Queue</h5>
                    <div class="d-flex gap-2">
                        <select class="form-select" style="width: auto;">
                            <option>All Orders</option>
                            <option>Pending</option>
                            <option>Need Review</option>
                            <option>Ready to Ship</option>
                        </select>
                        <button class="btn btn-success"><i class="fas fa-sync me-1"></i>Refresh</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order Details</th>
                                <th>Customer</th>
                                <th>Items & Prescription</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
							<!-- Sample Order 1 -->
							<tr>
								<td>
									<div class="fw-semibold">#ORD-2024-156</div>
									<small class="text-muted">Today, 2:30 PM</small>
									<br>
									<small class="text-info">Online Payment</small>
								</td>
								<td>
									<div class="customer-info">
										<div class="customer-avatar">JD</div>
										<div>
											<div class="fw-semibold">John Doe</div>
											<small class="text-muted">+91 9876543210</small>
											<br>
											<small class="text-muted">Mumbai, Maharashtra</small>
										</div>
									</div>
								</td>
								<td>
									<div class="medicine-item">
										<strong>Paracetamol 500mg</strong> (Qty: 2)
										<span class="badge bg-warning text-dark ms-2">Rx Required</span>
									</div>
									<div class="medicine-item">
										<strong>Ibuprofen 400mg</strong> (Qty: 1)
										<span class="badge bg-warning text-dark ms-2">Rx Required</span>
									</div>
									<div class="medicine-item">
										<strong>Vitamin C 500mg</strong> (Qty: 1)
										<span class="badge bg-success ms-2">OTC</span>
									</div>
									<button class="btn btn-sm btn-outline-info mt-2" data-bs-toggle="modal" data-bs-target="#prescriptionModal">
										<i class="fas fa-file-medical me-1"></i>View Prescription
									</button>
								</td>
								<td>
									<div class="fw-semibold text-success">₹265</div>
									<small class="text-success">Payment Confirmed</small>
									<br>
									<small class="text-success">Saved: ₹96</small>
								</td>
								<td>
									<div class="d-flex align-items-center mb-2">
										<span class="order-status status-pending"></span>
										<span class="badge bg-warning text-dark">Pending Review</span>
									</div>
									<small class="text-muted">Awaiting prescription verification</small>
								</td>
								<td>
									<div class="btn-group-vertical gap-1">
										<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveOrderModal">
											<i class="fas fa-check me-1"></i>Approve
										</button>
										<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
											<i class="fas fa-times me-1"></i>Cancel
										</button>
										<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
											<i class="fas fa-eye me-1"></i>Details
										</button>
									</div>
								</td>
							</tr>

							<!-- Sample Order 2 -->
							<tr>
								<td>
									<div class="fw-semibold">#ORD-2024-155</div>
									<small class="text-muted">Today, 1:15 PM</small>
									<br>
									<small class="text-info">COD</small>
								</td>
								<td>
									<div class="customer-info">
										<div class="customer-avatar">PS</div>
										<div>
											<div class="fw-semibold">Priya Sharma</div>
											<small class="text-muted">+91 9876543211</small>
											<br>
											<small class="text-muted">Delhi, NCR</small>
										</div>
									</div>
								</td>
								<td>
									<div class="medicine-item">
										<strong>Insulin Injection</strong> (Qty: 1)
										<span class="badge bg-warning text-dark ms-2">Rx Required</span>
									</div>
									<div class="medicine-item">
										<strong>Blood Sugar Monitor</strong> (Qty: 1)
										<span class="badge bg-success ms-2">OTC</span>
									</div>
									<button class="btn btn-sm btn-outline-success mt-2">
										<i class="fas fa-check-circle me-1"></i>Prescription Verified
									</button>
								</td>
								<td>
									<div class="fw-semibold text-success">₹850</div>
									<small class="text-warning">COD</small>
								</td>
								<td>
									<div class="d-flex align-items-center mb-2">
										<span class="order-status status-confirmed"></span>
										<span class="badge bg-success">Ready to Ship</span>
									</div>
									<small class="text-muted">Prescription verified</small>
								</td>
								<td>
									<div class="btn-group-vertical gap-1">
										<button class="btn btn-sm btn-primary">
											<i class="fas fa-shipping-fast me-1"></i>Ship Now
										</button>
										<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
											<i class="fas fa-eye me-1"></i>Details
										</button>
									</div>
								</td>
							</tr>

							<!-- Sample Order 3 -->
							<tr>
								<td>
									<div class="fw-semibold">#ORD-2024-154</div>
									<small class="text-muted">Yesterday, 5:00 PM</small>
									<br>
									<small class="text-info">Online Payment</small>
								</td>
								<td>
									<div class="customer-info">
										<div class="customer-avatar">AK</div>
										<div>
											<div class="fw-semibold">Amit Kumar</div>
											<small class="text-muted">+91 9876543212</small>
											<br>
											<small class="text-muted">Bangalore, Karnataka</small>
										</div>
									</div>
								</td>
								<td>
									<div class="medicine-item">
										<strong>Amoxicillin 250mg</strong> (Qty: 3)
										<span class="badge bg-warning text-dark ms-2">Rx Required</span>
									</div>
									<div class="medicine-item">
										<strong>Multivitamins</strong> (Qty: 2)
										<span class="badge bg-success ms-2">OTC</span>
									</div>
									<button class="btn btn-sm btn-outline-info mt-2" data-bs-toggle="modal" data-bs-target="#prescriptionModal">
										<i class="fas fa-file-medical me-1"></i>View Prescription
									</button>
								</td>
								<td>
									<div class="fw-semibold text-success">₹1,200</div>
									<small class="text-success">Payment Confirmed</small>
								</td>
								<td>
									<div class="d-flex align-items-center mb-2">
										<span class="order-status status-processing"></span>
										<span class="badge bg-secondary text-white">Processing</span>
									</div>
									<small class="text-muted">Preparing for shipment</small>
								</td>
								<td>
									<div class="btn-group-vertical gap-1">
										<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveOrderModal">
											<i class="fas fa-check me-1"></i>Approve
										</button>
										<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
											<i class="fas fa-times me-1"></i>Cancel
										</button>
										<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
											<i class="fas fa-eye me-1"></i>Details
										</button>
									</div>
								</td>
							</tr>
						</tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== Modals ================== -->
    <!-- Prescription Modal -->
    <div class="modal fade" id="prescriptionModal" tabindex="-1" aria-labelledby="prescriptionModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="prescriptionModalLabel">Prescription Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Prescription preview or uploaded file display...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Approve</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Approve Order Modal -->
    <div class="modal fade" id="approveOrderModal" tabindex="-1" aria-labelledby="approveOrderLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="approveOrderLabel">Approve Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to approve this order?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success">Yes, Approve</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Cancel Order Modal -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cancelOrderLabel">Cancel Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to cancel this order?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger">Yes, Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="orderDetailsLabel">Order Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>All order items, customer info, payment status, and prescription details.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================== Bootstrap JS ================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
