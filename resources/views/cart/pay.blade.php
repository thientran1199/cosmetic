<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/library.css')}}">
    <!-- Owl Slider css -->
    {{-- <link rel="stylesheet" href="{{asset('frontend/assets/owlCarousel/assets/owl.theme.default.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('frontend/assets/owlCarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/owlCarousel/assets/owl.theme.default.min.css')}}">
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common.css')}}">
    <!-- index -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/pay.css')}}">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="{{asset('frontend/assets/owlCarousel/owl.carousel.min.js')}}"></script>
</head>

<body>
    
       
   @include('home.layouts.header')
    </div>
    <div class="main">
        
        <div class="grid wide">
            <div class="row">
                <div class="col l-4 m-12 s-12">
                    <div class="pay-order">
                        <div class="pay__heading">Đơn hàng của bạn</div>
                        @foreach ($newCart->items as $item)
                        <div class="pay-info">
                            <div class="main__pay-text">
                                {{$item['item']->name}}</div>
                            <div class="main__pay-amount">
                                {{$item['qty']}}
                            </div>
                            <div class="main__pay-price">
                                {{number_format($item['price']) }} ₫
                            </div>
                        </div>
                        
                        
                        @endforeach
                        <div class="pay-info">
                            <div class="main__pay-text special">
                                Giao hàng
                            </div>
                            <div class="main__pay-text">
                                Giao hàng miễn phí
                            </div>

                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text special">
                                Tổng thành tiền</div>
                            <div class="main__pay-price">
                                {{number_format(Session::get('cart')->totalPrice)}} ₫
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="col l-1 ">
                    
                </div>
                <div class="col l-7 m-12 s-12">
                    <form action="{{route('cart.pay')}}" method="POST">
                    @csrf
                    <div class="pay-information">
                        <div class="pay__heading">Thông tin thanh toán</div>
                        <div class="form-group">
                            <label for="name" class="form-label">Họ Tên *</label>
                            <input id="name" name="name" type="text" class="form-control">
                            <span class="form-message"></span>
                            @if ($errors->has('name'))
                                <span class="form-message">{{ $errors->first('name')}}</span>
                            @endif
                           
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Địa chỉ *</label>
                            <input id="address" name="address" type="text" class="form-control">
                            <span class="form-message"></span>
                            @if ($errors->has('address'))
                                <span class="form-message">{{ $errors->first('address')}}</span>
                            @endif
                        </div>
                        {{-- <div class="form-group">
                            <label for="account" class="form-label">Tỉnh / Thành phố *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div> --}}
                        <div class="form-group">
                            <label for="email" class="form-label">Email *</label>
                            <input id="email" name="email" type="text" class="form-control">
                            <span class="form-message"></span>
                            @if ($errors->has('email'))
                                <span class="form-message">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input id="phone" name="phone" type="text" class="form-control">
                            <span class="form-message"></span>
                            @if ($errors->has('phone'))
                                <span class="form-message">{{ $errors->first('phone')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="note" class="form-label">Ghi chú cho đơn hàng</label>
                            <textarea class="form-control" name="note" id="note" cols="30" rows="20"></textarea>
                        </div>
                    </div>
                    <div  class="btn btn--default"><button type="submit" class="btn btn--default"> Đặt hàng</button></div>
                   
                    
                   
                </form>
                </div>
           
               
            
            </div>
        </div>
   
    </div>
   @include('home.layouts.footer')
   @include('home.modal_popup')
  
    <!-- Sccipt for owl caroucel -->

    <!-- Script common -->
    <script src="{{asset('frontend/assets/js/commonscript.js')}}"></script>
    <script src="{{asset('frontend/assets/js/cart.js')}}"></script>

</body>

</html>