<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Medicines - MediCare+ Admin</title>
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

        .search-filters {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .medicine-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--pharmeasy-light), #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pharmeasy-primary);
        }

        .stock-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .stock-high { background-color: #28a745; }
        .stock-medium { background-color: #ffc107; }
        .stock-low { background-color: #dc3545; }

        .action-buttons .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
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

            .table-responsive {
                font-size: 0.875rem;
            }

            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 2px;
            }
        }

        .pagination .page-link {
            color: var(--pharmeasy-primary);
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #11afa8ff;
            border-color: #b6eeebff;
            color:rgba(255, 255, 255, 0.61);
        }

        .pagination .page-link:hover {
            background-color: var(--pharmeasy-light);
            border-color: var(--pharmeasy-primary);
        }

        .filter-chip {
            background-color: var(--pharmeasy-light);
            border: 1px solid var(--pharmeasy-primary);
            color: var(--pharmeasy-primary);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-chip.active {
            background-color: var(--pharmeasy-primary);
            color: white;
        }

        .bulk-actions {
            background-color: var(--pharmeasy-primary);
            color: white;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 20px;
            display: none;
        }

        .bulk-actions.show {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include("admin.component.sidebar", ['page' => "medicines"]);

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-primary sidebar-toggle me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">All Medicines</h2>
                    <p class="text-muted mb-0">Manage your complete medicine inventory</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{route('admin.add-medicines')}}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Medicine
                </a>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i>{{$name}}
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
                        <i class="fas fa-pills fa-2x mb-2" style="color: var(--pharmeasy-primary);"></i>
                        <h4 class="fw-bold mb-1">{{ $totalMedicine }}</h4>
                        <p class="text-muted mb-0">Total Medicines</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                        <h4 class="fw-bold mb-1">{{$inStock}}</h4>
                        <p class="text-muted mb-0">In Stock</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                        <h4 class="fw-bold mb-1">{{$lowStock}}</h4>
                        <p class="text-muted mb-0">Low Stock</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-times-circle fa-2x text-danger mb-2"></i>
                        <h4 class="fw-bold mb-1">{{$outOfStock}}</h4>
                        <p class="text-muted mb-0">Out of Stock</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="search-filters p-4 mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Search Medicines</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search by name, manufacturer..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Category</label>
                    <select class="form-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        <option value="pain-relief">Pain Relief</option>
                        <option value="antibiotics">Antibiotics</option>
                        <option value="vitamins">Vitamins</option>
                        <option value="cardiac">Cardiac Care</option>
                        <option value="diabetes">Diabetes Care</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Stock Status</label>
                    <select class="form-select" id="stockFilter">
                        <option value="">All Stock</option>
                        <option value="in-stock">In Stock</option>
                        <option value="low-stock">Low Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Sort By</label>
                    <select class="form-select" id="sortBy">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                        <option value="stock">Stock</option>
                        <option value="date">Date Added</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                        <i class="fas fa-undo me-2"></i>Clear
                    </button>
                </div>
            </div>
            
            <!-- Quick Filter Chips -->
            <div class="mt-3">
                <label class="form-label fw-semibold mb-2">Quick Filters:</label>
                <div class="d-flex flex-wrap gap-2">
                    <span class="filter-chip" onclick="applyQuickFilter('prescription')">Prescription Required</span>
                    <span class="filter-chip" onclick="applyQuickFilter('otc')">Over the Counter</span>
                    <span class="filter-chip" onclick="applyQuickFilter('expiring')">Expiring Soon</span>
                    <span class="filter-chip" onclick="applyQuickFilter('new')">Recently Added</span>
                    <span class="filter-chip" onclick="applyQuickFilter('bestseller')">Best Sellers</span>
                </div>
            </div>
        </div>

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="bulkActions">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span id="selectedCount">0</span> items selected
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-edit me-2"></i>Bulk Edit
                    </button>
                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-trash me-2"></i>Delete Selected
                    </button>
                </div>
            </div>
        </div>

        <!-- Medicines Table -->
        <div class="card">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Medicine Inventory</h5>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="medicinesTable">
                        <thead>
                            <tr>
                                <th width="50">
                                    <input type="checkbox" class="form-check-input" id="selectAll" onchange="toggleSelectAll()">
                                </th>
                                <th>Medicine</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Updated Date</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicines as $medicine)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input medicine-checkbox" value="1">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="medicine-image me-3">
                                            <i class="fas fa-pills"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">
                                                {{$medicine->medicineName}}
                                            </div>
                                            <small class="text-muted">
                                                {{$medicine->packSize}}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$medicine->category}}
                                </td>
                                <td>
                                    {{$medicine->manufacturer}}
                                </td>
                                <td>
                                    @if($medicine->minStock > $medicine->stockQuantity)
                                        <span class="stock-indicator stock-low"></span>
                                        <span class="fw-semibold text-danger">
                                            {{$medicine->stockQuantity}} units
                                        </span>
                                    @else
                                        <span class="stock-indicator stock-high"></span>
                                        <span class="fw-semibold text-success">
                                            {{$medicine->stockQuantity}} units
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    <div>₹{{$medicine->sellingPrice}}</div>
                                    <small class="text-muted text-decoration-line-through">₹{{$medicine->mrp}}</small>
                                </td>
                                <td>
                                    @if($medicine->stockQuantity == 0)
                                        <span class="badge bg-danger badge-status">Out Of Stock</span>
                                    @elseif($medicine->status == 'active')
                                        <span class="badge bg-success badge-status">Active</span>
                                    @elseif($medicine->status == 'inactive') 
                                        <span class="badge bg-warning badge-status">In Active</span>  
                                    @endif
                                    
                                    @if($medicine->prescriptionRequired == 'yes')
                                        <div><small class="text-warning">Prescription Required</small></div>
                                    @endif
                                </td>
                                <td>
                                    {{$medicine->updated_at->format('d M Y g:i A')}}
                                </td>
                                <td>
                                    <div class="action-buttons d-flex gap-1">
                                        <button class="btn btn-outline-primary btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                {{ $medicines->links('pagination::bootstrap-5') }}
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

        // Select all functionality
        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.medicine-checkbox');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            
            updateBulkActions();
        }

        // Update bulk actions visibility
        function updateBulkActions() {
            const checkboxes = document.querySelectorAll('.medicine-checkbox:checked');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');
            
            if (checkboxes.length > 0) {
                bulkActions.classList.add('show');
                selectedCount.textContent = checkboxes.length;
            } else {
                bulkActions.classList.remove('show');
            }
        }

        // Add event listeners to individual checkboxes
        document.querySelectorAll('.medicine-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#medicinesTable tbody tr');
            
            rows.forEach(row => {
                const medicineName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const manufacturer = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                
                if (medicineName.includes(searchTerm) || manufacturer.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter functionality
        function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const stock = document.getElementById('stockFilter').value;
            const rows = document.querySelectorAll('#medicinesTable tbody tr');
            
            rows.forEach(row => {
                let showRow = true;
                
                // Category filter
                if (category && !row.querySelector('td:nth-child(3)').textContent.toLowerCase().includes(category.replace('-', ' '))) {
                    showRow = false;
                }
                
                // Stock filter
                if (stock) {
                    const stockText = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                    if (stock === 'low-stock' && !stockText.includes('5 units') && !stockText.includes('18 units')) {
                        showRow = false;
                    } else if (stock === 'out-of-stock' && !stockText.includes('0 units')) {
                        showRow = false;
                    } else if (stock === 'in-stock' && (stockText.includes('0 units') || stockText.includes('5 units'))) {
                        showRow = false;
                    }
                }
                
                row.style.display = showRow ? '' : 'none';
            });
        }

        // Add event listeners for filters
        document.getElementById('categoryFilter').addEventListener('change', applyFilters);
        document.getElementById('stockFilter').addEventListener('change', applyFilters);

        // Clear filters function
        function clearFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('stockFilter').value = '';
            document.getElementById('sortBy').value = 'name';
            
            // Remove active class from filter chips
            document.querySelectorAll('.filter-chip').forEach(chip => {
                chip.classList.remove('active');
            });
            
            // Show all rows
            document.querySelectorAll('#medicinesTable tbody tr').forEach(row => {
                row.style.display = '';
            });
        }

        // Quick filter functionality
        function applyQuickFilter(filterType) {
            const chip = event.target;
            const isActive = chip.classList.contains('active');
            
            // Remove active class from all chips
            document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
            
            if (!isActive) {
                chip.classList.add('active');
                
                // Apply specific filter logic
                const rows = document.querySelectorAll('#medicinesTable tbody tr');
                
                rows.forEach(row => {
                    let showRow = false;
                    
                    switch(filterType) {
                        case 'prescription':
                            showRow = row.textContent.includes('Prescription Required');
                            break;
                        case 'otc':
                            showRow = row.textContent.includes('OTC');
                            break;
                        case 'expiring':
                            // For demo, showing low stock items as "expiring soon"
                            showRow = row.textContent.includes('5 units') || row.textContent.includes('18 units');
                            break;
                        case 'new':
                            // For demo, showing recent dates
                            showRow = row.textContent.includes('15 Sep') || row.textContent.includes('14 Sep');
                            break;
                        case 'bestseller':
                            // For demo, showing pain relief medicines
                            showRow = row.textContent.includes('Pain Relief');
                            break;
                    }
                    
                    row.style.display = showRow ? '' : 'none';
                });
            } else {
                // Show all rows if deactivating filter
                document.querySelectorAll('#medicinesTable tbody tr').forEach(row => {
                    row.style.display = '';
                });
            }
        }

        // Sort functionality
        document.getElementById('sortBy').addEventListener('change', function() {
            const sortBy = this.value;
            const tbody = document.querySelector('#medicinesTable tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            
            rows.sort((a, b) => {
                let aValue, bValue;
                
                switch(sortBy) {
                    case 'name':
                        aValue = a.querySelector('td:nth-child(2)').textContent.trim();
                        bValue = b.querySelector('td:nth-child(2)').textContent.trim();
                        break;
                    case 'price':
                        aValue = parseFloat(a.querySelector('td:nth-child(6)').textContent.replace('₹', ''));
                        bValue = parseFloat(b.querySelector('td:nth-child(6)').textContent.replace('₹', ''));
                        break;
                    case 'stock':
                        aValue = parseInt(a.querySelector('td:nth-child(5)').textContent.match(/\d+/)[0]);
                        bValue = parseInt(b.querySelector('td:nth-child(5)').textContent.match(/\d+/)[0]);
                        break;
                    case 'date':
                        aValue = new Date(a.querySelector('td:nth-child(8)').textContent);
                        bValue = new Date(b.querySelector('td:nth-child(8)').textContent);
                        break;
                    default:
                        return 0;
                }
                
                if (typeof aValue === 'string') {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue - aValue; // Descending order for numbers and dates
                }
            });
            
            // Clear tbody and append sorted rows
            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Re-add event listeners after any DOM manipulation
            document.querySelectorAll('.medicine-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActions);
            });
        });
    </script>
</body>
</html>