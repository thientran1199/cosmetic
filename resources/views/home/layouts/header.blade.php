<div class="header scrolling" id="myHeader">
    <div class="grid wide">
        <div class="header__top">
            <div class="navbar-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="index.html" class="header__logo">
                <img src="{{asset('frontend/assets/logo.png') }}" alt="">
            </a>
            <div class="header__search">
                <div class="header__search-wrap">
                    <input type="text" class="header__search-input" placeholder="Tìm kiếm">
                    <a class="header__search-icon" href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
            <div class="header__account">
                @guest
                    @if (Route::has('login'))
                    {{-- <li class="sub-nav__item"> --}}
                        <a href="#my-Login" class="header__account-login">Đăng Nhập</a>
                    {{-- </li> --}}
                    @endif
                    @if (Route::has('register'))
                    {{-- <li class="sub-nav__item"> --}}
                        <a href="#my-Register" class="header__account-register">Đăng Kí</a>
                    {{-- </li> --}}
                    @endif
                    @else
                    <a href="#" class="header__account-login">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" class="header__account-register" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng Xuat</a> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest 
                {{-- @endguest --}}
                {{-- <a href="#my-Login" class="header__account-login">Đăng Nhập</a>
                <a href="#my-Register" class="header__account-register">Đăng Kí</a> --}}
            </div>
            <!-- Cart -->
            <div class="header__cart have" href="">
                <i class="fas fa-shopping-basket"></i>
                <div class="header__cart-amount">
                    @if(Session::get("cart") != null)
                        <span id="count-cart">{{Session::get("cart")->totalQty}}</span>
                    @else
                    <span id="count-cart">0</span>
                    @endif 
                   
                </div>
                <div id="change-item-cart">
                   @include('cart.minicart')
                </div>
            
            </div>
        </div>
    </div>
   @include('home.layouts.menu')
</div>