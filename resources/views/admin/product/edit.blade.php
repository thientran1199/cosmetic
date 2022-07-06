@extends('admin.master')
@section('title', 'EDIT ')
@section('content')
    {{-- nav-breadcrumb --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Product</a></li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- nav-breadcrumb --}}
    {{-- content --}}
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Admin</strong> Form
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('product.update', $product->id)}}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                {{-- @method("PUT") --}}
                                <div class="form-group">
                                    <label for="name"
                                        class=" form-control-label">Name</label>
                                        <input type="text" id="name"
                                        name="name" value="{{$product->name}}" placeholder="" class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="name"
                                        class=" form-control-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control categry_select">
                                            @foreach($categories as $key=>$value)
                                            <option value="{{$key}}"{{$edit_cate->id==$key?' selected':''}}>{{$value}}</option>
                                                <?php
                                                if($key!=0){
                                                    $sub_categories = DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                                    if(count($sub_categories)>0){
                                                        foreach ($sub_categories as $sub_category){?>
                                                            <option value="{{$sub_category->id}}"{{$edit_cate->id==$sub_category->id?' selected':''}}>&nbsp;&nbsp;--{{$sub_category->name}}</option>
                                                    <?php }
                                                    }
                                                }
                                                ?>
                                            @endforeach
                                        </select>
                                </div>
                                

                                <div class="form-group">
                                    <label for="price"
                                        class=" form-control-label">Price</label>
                                        <input type="number" id="price"
                                        name="price" value="{{$product->price}}" class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="promotion_price"
                                        class=" form-control-label">Promotion Price</label>
                                        <input type="number" id="promotion_price"
                                        name="promotion_price" value="{{$product->promotion_price}}" class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="feature_image_path"
                                        class=" form-control-label">Image</label>
                                        <img src="{{asset($product->feature_image_path)}}" style="object-fit: cover; margin-bottom: 10px" width="100px" height="100px" alt="">
                                        <input type="file" id="feature_image_path"
                                        name="feature_image_path"  class="form-control-file">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('feature_image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="image_path"
                                        class=" form-control-label">Image Detail</label>
                                        @foreach ($product->images as $item)
                                        <img src="{{asset($item->image_path)}}" width="100px" height="100px" style="object-fit: cover; margin-bottom: 10px" alt="">
                                        @endforeach
                                        <input type="file" id="image_path"
                                        name="image_path[]" multiple class="form-control-file">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label 
                                        class=" form-control-label">Tags </label>
                                        <select class="form-control choose_tags"  name="tags[]"  multiple="multiple">
                                            @foreach ($product->tags as $tagItem)
                                                    <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                            @endforeach
                                          
                                           
                                        </select>
                                        
                                        
                                </div>

                                <div class="form-group">
                                    <label 
                                    class=" form-control-label">Content</label>
                                    {{-- <textarea name="content" id="content" rows="9" placeholder="Content..." class="form-control"></textarea> --}}
                                    {{-- <textarea name="content" rows="9" class="form-control my-editor"></textarea></div> --}}
                                    
                                <textarea name="content" class="form-control my-content">{{$product->content}}</textarea>
                                </div>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>



        </div>


    </div><!-- .animated -->
    </div>
    {{-- content --}}
@endsection
