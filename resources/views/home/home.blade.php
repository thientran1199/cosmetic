@extends('home.master')
@section('title','Trang chu')

@section('content')
    <!--Product Category -->
    <div class="main__tabnine">
        <div class="grid wide">
            <!-- Tab items -->
            <div class="tabs">
                <div class="tab-item active">
                    Bán Chạy
                </div>
                <div class="tab-item">
                    Giá tốt
                </div>
                <div class="tab-item">
                    Mới Nhập
                </div>
                <div class="line"></div>
            </div>
            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        @foreach ($product as $item)
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset($item->feature_image_path)}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">{{$item->name}}</h3>
                                    <div class="product__price">
                                        @if ($item->promotion_price !=0  )
                                        <div class="price__old">
                                            {{number_format($item->promotion_price) }} đ
                                        </div>
                                        <div class="price__new">{{number_format($item->price) }} <span class="price__unit">đ</span></div>
                                        {{-- @endif --}}
                                        @else                                     
                                        <div class="price__new">{{number_format($item->price) }} <span class="price__unit">đ</span></div>
                                       
                                        @endif
                                        
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="{{route('product.detail',$item->id)}}" class="viewDetail">Xem chi tiết</a>
                                <a href="#" onclick="addCart({{$item->id}})" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="tab-pane">
                    <div class="row">
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product4.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product5.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product2.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product3.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product6.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product4.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product1.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product2.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product4.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product3.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product6.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product5.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane">
                    <div class="row">
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product2.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product5.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product2.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product3.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product6.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product4.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product1.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product2.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product4.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product3.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product6.jpg') }});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset('frontend/assets/img/product/product5.jpg')}});">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                    <div class="product__price">
                                        <div class="price__old">
                                            300.000 đ
                                        </div>
                                        <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">24%%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                </div>
                                <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection