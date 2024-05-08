<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="{{route('admin.bc_dashboard')}}">
                <img class="d-none d-lg-block blur-up lazyloaded img-60"
                     src="{{asset('back/images/logo.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                                                                               aria-hidden="true"></i></a>
        <div class="sidebar-user">
            @if(is_null(auth()->user()->photo))
                <img src="{{asset('back/images/admin.jpg')}}" alt="avatar" class="img-60">
            @else
                <img src="{{ asset("storage/".auth()->user()->photo) }}" alt="avatar" class="img-60">

            @endif
            <div>
                <h6 class="f-14">{{auth()->user()->first_name}}</h6>
                <p></p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{route('admin.bc_dashboard')}}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="users"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.bc_customers')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                    <li>
                        <a  href="{{route('admin.bc_administrators')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>Administrators</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="settings"></i>
                    <span>Settings</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.bc_countries')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>Countries</span>
                        </a>
                    </li>
                    <li>
                        <a  href="{{route('admin.bc_cryptos')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>Crypto Money</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="trending-up"></i>
                    <span>All Trades</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.bc_trade_pending')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>Pending</span>
                        </a>
                    </li>
                    <li>
                        <a  href="{{route('admin.bc_trade_all')}}">
                            <i class="fa fa-circle-o"></i>
                            <span>All</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="{{route('auth.sign_out')}}">
                    <i data-feather="log-in"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
