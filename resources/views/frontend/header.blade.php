<div class="header_main">
    <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile text-center"><a href="index.html"><img src="images/logo.png" class="img-fluid mx-auto d-block"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="{{ route('rentals') }}">Rental</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="{{ route('contact') }}">Contact</a>
                </li>
             </ul>
          </div>
       </nav>
    </div>
    <div class="container-fluid">
       <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
       <div class="menu_main" style="position: relative; z-index: 1;">
          <ul>
             <li class="active"><a href="{{  route('home') }}">Home</a></li>
             <li><a href="{{ route('about') }}">About</a></li>
             <li><a href="{{ route('rentals') }}">Rental</a></li>
             <li><a href="{{ route('contact') }}">Contact</a></li>

             <li>
                @if (Route::has('login'))
                    @auth
                        <!-- User Dropdown Button after login -->
                        <li class="nav-item dropdown">
                            <a id="userDropdown" class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" onclick="toggleDropdown()">
                                <span class="username" style="background-color: gray; padding: 5px 10px; color: white; border-radius: 5px;">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>

                            <!-- Dropdown menu (Initially hidden) -->
                            <ul id="dropdownMenu" class="dropdown-menu dropdown-menu-end" style="display: none; background-color: gray; color: white;">
                                <!-- Profile link -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('rental.bookings') }}">Bookings</a>
                                </li>

                                <!-- Logout link -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>
                    @else
                        <!-- If user is not logged in -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
             </li>
          </ul>
       </div>
    </div>
 </div>
 <script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownMenu');
        dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
    }

    // Optional: Close the dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    }
</script>

