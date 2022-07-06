<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/library.css') }}">
    <!-- Owl Slider css -->
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.theme.default.min.css') }}">
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common.css') }}">
    <!-- index -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/cart.css') }}">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="{{asset('frontend/assets/owlCarousel/owl.carousel.min.js') }}"></script>
</head>

<body>
   @include('home.layouts.header')
   <div class="main">
    <div class="grid wide" id="list-cart">
        <h3 class="main__notify">
            <div class="main__notify-icon">
                <i class="fas fa-check"></i>
                <!-- <i class="fas fa-times"></i> -->
            </div>
            <div class="main__notify-text"></div>
        </h3>
        @if ($newCart != null)
        <div class="row">
            <div class="col l-8 m-12 s-12">
                <div class="main__cart">
                    <div class="row title">
                        <div class="col l-1 m-1 s-0">Chọn</div>
                        <div class="col l-4 m-4 s-8">Sản phẩm</div>
                        <div class="col l-2 m-2 s-0">Giá</div>
                        <div class="col l-2 m-2 s-0">Số lượng</div>
                        <div class="col l-2 m-2 s-4">Tổng</div>
                        <div class="col l-1 m-1 s-0">Xóa</div>
                    </div>
                  
                 
                    
                    @foreach ($newCart->items as $item)
                    <div class="row item">
                        <div class="col l-1 m-1 s-0">
                            <input type="checkbox" name="a">
                        </div>
                        <div class="col l-4 m-4 s-8">
                            <div class="main__cart-product">
                                <img src="{{asset($item['item']->feature_image_path) }}" alt="">
                                <div class="name">{{$item['item']->name}}</div>
                            </div>
                        </div>
                        <div class="col l-2 m-2 s-0">
                            <div class="main__cart-price">{{number_format($item['item']->price)}} đ</div>
                        </div>
                        <div class="col l-2 m-2 s-0">
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-" onclick="this.parentNode.querySelector('input[name=number]').stepDown()">
                                <input data-id="{{$item['item']->id}}" aria-label="quantity" class="input-qty" max="{{$item['item']->quantity}}" min="1" name="number" type="number" value="{{$item['qty']}}">
                                <input class="plus is-form" type="button" value="+" onclick="this.parentNode.querySelector('input[name=number]').stepUp()">
                            </div>
                        </div>
                        <div class="col l-2 m-2 s-4">
                            <div class="main__cart-price">{{number_format($item['price']) }} đ</div>
                        </div>
                        <div class="col l-1 m-1 s-0">
                            <span class="main__cart-icon">
                                <a href="" class="order-close" onclick="DeleteItemCart({{$item['item']->id}})"><i class="far fa-times-circle" ></i></a>
                        </span>
                        </div>
                    </div>
                    @endforeach
                   
                    <button class="btn btn--default edit-all">
                        {{-- <a href="{{route('cart.update')}}"> --}}
                        Cập nhật giỏ hàng
                    {{-- </a> --}}
                    </button>
                   
                </div>
            </div>
            <div class="col l-4 m-12 s-12">
                <div class="main__pay">
                    <div class="main__pay-title">Tổng số lượng</div>
                    <div class="pay-info">
                        <div class="main__pay-text">
                            Tổng SL</div>
                        <div class="main__pay-price">
                            {{Session::get('cart')->totalQty}}
                        </div>
                    </div>
                    <div class="pay-info">
                        <div class="main__pay-text">
                            Giao hàng
                        </div>
                        <div class="main__pay-text">
                            Giao hàng miễn phí
                        </div>

                    </div>
                    <div class="pay-info">
                        <div class="main__pay-text">
                            Tổng thành tiền</div>
                        <div class="main__pay-price">
                            {{number_format(Session::get('cart')->totalPrice)}}₫
                        </div>
                    </div>
                    @if (Auth::check())
                    <div class="btn btn--default orange"><a href="{{route('cart.pay')}}" style="color: #fff"> Tiến hành thanh toán</a></div>
                    @else
                    <div class="btn btn--default orange"><a href="{{url('login')}}" style="color: #fff"> Tiến hành thanh toán</a></div>
                    @endif
                  
                    <div class="main__pay-title">Phiếu ưu đãi</div>
                    <input type="text" class="form-control">
                    <div class="btn btn--default">Áp dụng</div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col l-8 m-12 s-12">
                <div class="main__cart">
                    <div class="row title">
                         Chưa có sản phẩm nào trong giỏ hàng
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

    @include('home.layouts.footer')
    <!-- Modal Form -->
    @include('home.modal_popup')
    <!-- Sccipt for owl caroucel -->

    <!-- Script common -->
    <script src="{{asset('frontend/assets/js/commonscript.js') }}"></script>
    <script src="{{asset('frontend/assets/js/cart.js')}}"></script>


</body>

</html>