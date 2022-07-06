<!-- HightLight  -->
        <div class="main__frame">
            <div class="grid wide">
                <h3 class="category__title">Ngọc Ánh Cometics</h3>
                <h3 class="category__heading">SẢN PHẨM NỔI BẬT</h3>
                <div class="owl-carousel hight owl-theme">

                    @foreach ($productRecommand as $item)
                       
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
                                <span class="product__sale-percent">23</span>
                                <span class="product__sale-text">Giảm</span>
                            </div>
                        </div>
                        <a href="{{route('product.detail',$item->id)}}" class="viewDetail">Xem chi tiết</a>
                        <a href="#" onclick="addCart({{$item->id}})" class="addToCart">Thêm vào giỏ</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>