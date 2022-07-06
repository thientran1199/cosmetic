<div class="modal fade" id="view_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">View Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                    <h3 class="title" style="text-align: center;
                   
                    font-family: cursive;
                    font-weight: bold;">View Detail</h3>
                    <hr>
                {{-- <h5><label for="">ID: &nbsp;</label>{{$odd->quantity}}</h5> --}}
                <h5><label for="">Name: &nbsp;</label>{{$item->note}}</h5>
                <h5><label for="">User: &nbsp;</label></h5>
                <h5><label for="">Category: &nbsp;</label>/h5>
                <h5><label for="">Price: &nbsp;</label></h5>
                {{-- <h5><label for="">Promtion Price: &nbsp;</label>
                    @if ($item->promotion_price == 0)
                    Products not yet on promotion
                    @else
                    {{number_format($item->promotion_price)}}
                    @endif
                </h5>
                <hr> --}}
                {{-- <h5><label for="">Image Name: &nbsp;</label>{{$item->feature_image_name}}</h5>
                <h5><label for="">Image Path: &nbsp;</label>{{$item->feature_image_path}}</h5>
                <h5><label for="">Image: &nbsp;</label><br>
                <img src="{{asset($item->feature_image_path)}}" width="300px" height="300px" alt="">
                </h5>
                <hr>
                <h5><label for="">Image Detail: &nbsp;</label><br>
                @foreach ($item->images as $i)
                    <img src="{{asset($i->image_path)}}" width="250px" height="200px" alt="">
                    {{-- {{$i->image_name}}
                    {{$i->image_path}} --}}
                {{-- @endforeach --}}
            
                
                </h5>
                <hr>
                {{-- <h5><label for="">Content: &nbsp;</label>{!!$item->content!!}</h5> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                
            </div>
        </div>
    </div>
</div>