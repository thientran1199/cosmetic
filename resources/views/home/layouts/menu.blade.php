 <!-- Menu -->
 <div class="header__nav">
    <ul class="header__nav-list">
        <li class="header__nav-item nav__search">
            <div class="nav__search-wrap">
                <input class="nav__search-input" type="text" name="" id="" placeholder="Tìm sản phẩm...">
            </div>
            <div class="nav__search-btn">
                <i class="fas fa-search"></i>
            </div>
        </li>
        <li class="header__nav-item authen-form">
            <a href="#" class="header__nav-link">Tài Khoản</a>
            <ul class="sub-nav">
                @guest
                    @if (Route::has('login'))
                    <li class="sub-nav__item">
                        <a href="#my-Login" class="sub-nav__link">Đăng Nhập</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="sub-nav__item">
                        <a href="#my-Register" class="sub-nav__link">Đăng Kí</a>
                    </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                @endguest 
            </ul>
        </li>
        <li class="header__nav-item index">
            <a href="/" class="header__nav-link">Trang chủ</a>
        </li>
        <li class="header__nav-item">
            <a href="#" class="header__nav-link">Giới Thiệu</a>
        </li>
        <li class="header__nav-item">
            <a href="#" class="header__nav-link">Sản Phẩm</a>
            <div class="sub-nav-wrap grid wide">
                @foreach ($category as $item)
                <ul class="sub-nav">
                    <li class="sub-nav__item">
                        <a href="{{route('category.allproduct', ['slug'=> $item->slug,'id'=>$item->id])}}" 
                            class="sub-nav__link heading">{{$item->name}}</a>
                    </li>
                    @foreach ($item->categoryChildrent as $i)
                    <li class="sub-nav__item">
                        <a href="{{route('category.product', ['slug'=> $i->slug, 'id'=>$i->id])}}" class="sub-nav__link">{{$i->name}}</a>
                    </li>
                    @endforeach
                    
                </ul>
                @endforeach
                
                
            </div>
        </li>
        <li class="header__nav-item">
            <a href="news.html" class="header__nav-link">Tin Tức</a>
        </li>
        <li class="header__nav-item">
            <a href="contact.html" class="header__nav-link">Liên Hệ</a>
        </li>
    </ul>
</div>