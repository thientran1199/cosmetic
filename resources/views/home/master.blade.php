<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/library.css') }}">
    <link href="{{asset('frontend/assets/owlCarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common.css') }}">
    <!-- index -->
    <link href="{{asset('frontend/assets/css/home.css') }}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="{{asset('frontend/assets/owlCarousel/owl.carousel.min.js') }}"></script>

</head>

<body>
    @include('home.layouts.header')
    <div class="main">
        @include('home.layouts.slide')
        @yield('content')
        @include('home.feature_product.feature_product')
        <!-- Sales Policy -->
        <div class="main__policy">
            <div class="row">
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="{{asset('frontend/assets/img/policy/policy1.png') }}" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">GIAO HÀNG MIỄN PHÍ</h3>
                            <p class="policy__description">Cho đơn hàng từ 300K</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="{{asset('frontend/assets/img/policy/policy2.png') }}" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">ĐỔI TRẢ HÀNG</h3>
                            <p class="policy__description">Trong 3 ngày đầu tiên</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="{{asset('frontend/assets/img/policy/policy3.png') }}" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">HÀNG CHÍNH HÃNG</h3>
                            <p class="policy__description">Cam kết chất lượng</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="{{asset('frontend/assets/img/policy/policy4.png') }}" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">TƯ VẤN 24/24</h3>
                            <p class="policy__description">Giải đáp mọi thắc mắc</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('home.layouts.blog')
        {{-- brand --}}
        <div class="main__bands">
            <div class="grid wide">
                <div class="owl-carousel bands">
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band1.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band2.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band3.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band4.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band5.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band6.png') }})"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url({{asset('frontend/assets/img/band/band7.png') }})"></a>
                </div>
            </div>
        </div>

    </div>
    @include('home.layouts.footer')
    @include('home.modal_popup')
    <script>
        $('.owl-carousel.hight').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.owl-carousel.news').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        })
        $('.owl-carousel.bands').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>
    
   
    <!-- Script common -->
    <script src="{{asset('frontend/assets/js/homeScript.js')}}"></script>
    <script src="{{asset('frontend/assets/js/commonscript.js')}}"></script>
    <script src="{{asset('frontend/assets/js/cart.js')}}"></script>
</body>

</html>