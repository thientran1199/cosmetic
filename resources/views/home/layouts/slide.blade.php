<!-- Slider -->
<div class="main__slice">
    <div class="slider">
        @foreach ($slide as $item)
            
        <div class="slide active" style="background-image:url({{asset($item->image_path)}})">
            <div class="container">
                <div class="caption">
                    <h1>{{$item->title}}</h1>
                    <p>{{$item->description}}</p>
                    <a href="#" class="btn btn--default">Xem ngay</a>

                </div>
            </div>
        </div>
        
        @endforeach
    </div>
    <!-- controls  -->
    <div class="controls">
        <div class="prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="next">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
    <!-- indicators -->
    <div class="indicator">
    </div>
</div>