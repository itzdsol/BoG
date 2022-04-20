<a class="chat_icon" href="#"><img src="assets/images/chat.png" alt="chat"></a>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light desktop_menu">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><img src="assets/images/logo.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav custom_nav">
                    <li class="nav-item">
                        <a class="nav-link download_app" href="#">
                            Download App
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Partner
                        </a>
                    </li>
                    @guest
                    <li class="nav-item">
                        @if(Auth::check())
                        
                        @else
                        <a class="nav-link" href="{{ route('register') }}">
                            Login
                        </a>    
                        @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                <ul class="navbar-nav custom_nav second">
                    <!--             <li class="nav-item">
              <div class="dropdown">
                <button class="profile_b dropdown-toggle" type="button" id="profile_d" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="username">Login</span>
                  <div class="img_out">
                  <img src="assets/images/p.jpg" alt="p">
                  <span class="notification_span">3</span>
                  </div>
                  <i class="fa-solid fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu profile_menu" aria-labelledby="profile_d">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Setting</a></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
              </div>
            </li> -->
                    <li class="nav-item">
                        <div class="img_out">
                            <img src="assets/images/cart.png" alt="cart" />
                            <!--<span class="notification_span cart_span">3</span> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>