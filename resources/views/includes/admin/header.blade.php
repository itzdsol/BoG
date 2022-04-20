<button type="button" id="sidebarCollapse" class="btn btn-info">
    <i class="fas fa-align-left"></i>
</button>
<div class="dashboard_header">
    <div class="dashboard_left">
        <div class="dashbaord_title">Dashboard</div>
        <p>Good to See you Again</p>
    </div>
    <div class="dashboard_right">
        <ul class="d_ul">
            <li>
                <a class="file_a" href="#"><i class="far fa-file"></i></a>
            </li>
            <li>
                <div class="dropdown">
                    <button class="profile_b logout_drp dropdown-toggle" type="button" id="logout" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/client.jpg" alt="p1" />
                        <div class="profile_spans">
                            <span class="profile_span">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                            <span class="admin_span">Admin</span>
                        </div>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu profile_menu" aria-labelledby="logout">
                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>