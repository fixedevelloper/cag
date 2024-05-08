<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{!! route('back.dashboard') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->user_type==\App\Models\User::CUSTOMER_TYPE)
                <li><a href="{!! route('customer.list_announcement') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-list-1"></i>
                        <span class="nav-text">Announcements</span>
                    </a>
                </li>
                <li><a href="{!! route('customer.my_favorite') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-heart"></i>
                        <span class="nav-text">Favorites</span>
                    </a>
                </li>
            <li><a href="{!! route('customer.my_trip') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-bookmark"></i>
                    <span class="nav-text">My Trips</span>
                </a>
            </li>
            <li><a href="{!! route('customer.follow_annonce') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-route"></i>
                    <span class="nav-text">Follow a Trip</span>
                </a>
            </li>
            <li><a href="{!! route('customer.setting') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-1"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->user_type==\App\Models\User::DRIVER_TYPE)
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-list-1"></i>
                        <span class="nav-text">Annoucements</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{!! route('driver.create_announce') !!}">Create</a></li>
                        <li><a href="{!! route('driver.my_announce') !!}">List</a></li>
                    </ul>
                </li>
                <li><a href="{!! route('driver.vehicles') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-list"></i>
                        <span class="nav-text">My cars</span>
                    </a>
                </li>
                <li><a href="{!! route('driver.my_trip') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-bookmark"></i>
                        <span class="nav-text">My Trips</span>
                    </a>
                </li>
                <li><a href="{!! route('driver.follow_annonce') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-route"></i>
                        <span class="nav-text">Follow a Trip</span>
                    </a>
                </li>
                <li><a href="{!! route('driver.settings') !!}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-1"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
            @endif
            <li><a href="{!! route('auth.sign_out') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-lock-1"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>

        <div class="book-box">
            <img src="images/book.png" alt="">
            <a href="javascript:void(0);">Use mobile application</a>
        </div>
        <div class="copyright">
            <p><strong>{!! config('app.name') !!}</strong> © 2024 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by Creativ-soft</p>
        </div>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
