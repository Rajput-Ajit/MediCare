<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top modern-navbar">
        <div class="container position-relative">
            <!-- Brand -->
            <a class="navbar-brand brand-shimmer d-flex align-items-center" href="#">
                <i class="fas fa-pills me-2"></i>MediCare+
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link @if($page == 'Home') active @endif" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link @if($page == 'Medicines') active @endif" href="/medicines">All Medicines</a></li>
                    <li class="nav-item"><a class="nav-link @if($page == 'Upload_Prescription') active @endif" href="/upload-prescription">Upload Prescription</a></li>
                </ul>

                <!-- Search -->
                <form action="/medicines">
                    <div class="nav-search-wrapper d-flex align-items-center position-relative me-3 @if(isset($oldSearch) && !empty($oldSearch)) active  @endif)">
                        <i class="fas fa-search search-icon me-2"></i>
                        <input type="text" class="search-input form-control"  name="search" value="{{$oldSearch ? $oldSearch : ''}}" placeholder="Search medicines, health products...">
                        <button class="btn search-btn" type="submit">Search</button>
                    
                    </div>
                </form>

                <!-- Cart/Login -->
                <ul class="navbar-nav">
                    <li class="nav-item position-relative">
                        <a class="nav-link cart-link @if($page == 'Cart') active @endif"" href="/cart">
                            <i class="fas fa-shopping-cart me-1"></i>Cart 
                            <span class="badge bg-danger cart-badge" id="cartQty">{{ session('cartQty')}}</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link @if($page == 'profile') active @endif" href="/profile"><i class="fas fa-user me-1"></i>{{session('login_user', 'User')}}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--
        <pre>
            {{ print_r(session()->all(), true) }}
        </pre>
    -->
