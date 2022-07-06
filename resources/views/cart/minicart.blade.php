
@if ($newCart != null)
<div class="header__cart-wrap">
    <ul class="order__list">
        @foreach ($newCart->items as $item)
        <li class="item-order">
           
            <div class="order-wrap">
                <a href="product.html" class="order-img">
                    <img src="{{asset($item['item']->feature_image_path) }}" alt="">
                </a>
                <div class="order-main">
                    <a href="product.html" class="order-main-name">{{$item['item']->name}}</a>
                    <div class="order-main-price">{{$item['qty']}} x {{number_format($item['item']->price)}} ₫</div>
                </div>
                <a href="" class="order-close"><i class="far fa-times-circle" data-id="{{$item['item']->id}}"></i></a>
               
                
            </div>
            
        </li>
        @endforeach
       
        
        
    </ul>
    <input type="hidden" name="" id="c-cart" value="{{Session::get('cart')->totalQty}}">
    <div class="total-money">Tổng cộng: {{number_format($newCart->totalPrice)}} ₫</div>
    <a href="{{route('cart.list')}}" class="btn btn--default cart-btn">Xem giỏ hàng</a>
    @if (Auth::check())
    <a href="{{route('cart.pay')}}l" class="btn btn--default cart-btn orange">Thanh toán</a>
    @else
    <a href="{{url('login')}}" class="btn btn--default cart-btn orange">Thanh toán</a> 
    @endif
   

</div>
@else
<div class="header__cart-wrap">
    Chưa có sản phẩm nào trong giỏ hàng
</div>
@endif