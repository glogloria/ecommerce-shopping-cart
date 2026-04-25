@guest
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>
@endguest

@auth
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-lg-5">
        <a class="navbar-brand" href="#!">Shopping Cart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                
                <!-- On home page-->
                @if (request()->routeIs('home'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button class="logout-btn" type="submit">
                            {{ __('Log Out') }}
                        </button>
                @endif

                <!-- On Cart page-->
                @if (request()->routeIs('cart.index'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button class="logout-btn" type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @endif

                <!-- On Orders page-->
                
            </ul>
        </div>
    </div>
</nav>
@endauth
