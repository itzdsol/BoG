<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}">
            <img src="/assets/images/logo.png" alt="logo">
        </a>
    </div>

    <ul id="metismenu" class="list-unstyled components">
        <li @if((request()->segment(2) == 'dashboard')) class="active" @endif>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-house"></i>Dashboard
                    <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        <li @if((request()->segment(2) == 'orders')) class="active" @endif>
            <a href="{{ route('admin.orders') }}"><i class="fas fa-file-invoice"></i>Orders
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        <li @if((request()->segment(2) == 'products')) class="active" @endif @if((request()->segment(2) == 'product')) class="active" @endif>
            <a href="{{ route('admin.products') }}"><i class="fas fa-cube"></i>Products
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
    </ul>
</nav>