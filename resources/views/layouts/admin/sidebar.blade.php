<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
$menu = 'menu-open';
$active = 'active menu-open';

$generalNav = Request::is("admin/company-information*");
$socialNav = Request::is("admin/social*");
$academicNav = Request::is("admin/academic*");
$subacademicNav= Request::is("admin/subacademic*");
$resourceNav = Request::is("admin/resource/category*");
$resdataNav = Request::is("admin/resource/data*");
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.dashboard')}}" class="brand-link">
               <img src="{{asset('images/HEH-LOGO.png')}}" alt="AdminLTE Logo"
                    class="brand-image  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HEH</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/HEH-LOGO.png')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Himalaya Eye Hospital</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt iCheck"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- @include('layouts.admin.sidebar.allnav') --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
