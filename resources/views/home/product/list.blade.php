<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->

<head>
                                                             <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/library.css') }}">
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common.css') }}">
    <!-- index -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/product.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/productSale.css') }}">

</head>

<body>
   @include('home.layouts.header')
    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Cửa hàng</a>
                    </div>
                    
                </div>
                <div class="main__sort">
                    <h3 class="sort__title">
                        Hiển thị kết quả theo
                    </h3>
                    <select class="sort__select"> name="" id="">
                        <option value="1">Thứ tự mặc định</option>
                        <option value="2">Mức độ phổ biến</option>
                        <option value="3">Điểm đánh giá</option>
                        <option value="4">Mới cập nhật</option>
                        <option value="5">Giá : Cao đến thấp</option>
                        <option value="6">Giá Thấp đến cao</option>
                    </select>
                </div>
            </div>
            <div class="productList">
                <div class="listProduct">
                    <div class="row">
                        @foreach ($product as $item)
                            
                        
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{asset($item->feature_image_path)}})">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">{{$item->name}}</h3>
                                    <div class="product__price">
                                        <div class="price__old">340.000 <span class="price__unit">đ</span></div>
                                        <div class="price__new">320.000 <span class="price__unit">đ</span></div>
                                    </div>
                                </div>
                                <div class="product__sale">
                                    <span class="product__sale-percent">22%</span>
                                    <span class="product__sale-text">Giảm</span>
                                </div>
                                <a href="{{route('product.detail', ['id'=>$item->id  ])}}" class="viewDetail">Xem chi tiết</a>
                                <a href="#" onclick="addCart({{$item->id}})" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div >
                   
                </div>
                <div class="paginations d-flex " style="justify-content: center">
                    {!! $product->links() !!}
                </div>
                
            </div>
        </div>
    </div>
   @include('home.layouts.footer')
   @include('home.modal_popup')
    <!-- Script common -->
    <script src="{{asset('frontend/assets/js/commonscript.js') }}"></script>
    <script src="{{asset('frontend/assets/js/cart.js')}}"></script>
</body>

</html>