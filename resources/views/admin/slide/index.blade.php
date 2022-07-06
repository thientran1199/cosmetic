@extends('admin.master')
@section('title', 'Slide ')
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
                                <li><a href="#">Slide</a></li>
                                <li class="active">Data List</li>
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
                            <strong class="card-title">Slide Table</strong>
                            @can('slide-add')
                            <a href="{{route('slide.create')}}" style="float: right;"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i>&nbsp; ADD DATA</button></a>
                            @else
                            <a href="{{route('403')}}" style="float: right;"><button type="button" class="btn btn-outline-success" disabled><i class="fa fa-plus"></i>&nbsp; ADD DATA</button></a>
                            @endcan
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        {{-- <th scope="col">Name</th> --}}
                                        {{-- <th scope="col">Price</th>
                                        <th scope="col">Promotion Price</th> --}}
                                        <th scope="col">Image</th>
                                        {{-- <th scope="col">View Detail</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slide as $item)
                                    <tr>  
                                        <th scope="row">{{$item->id}}</th>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->description}}</td>
                                  
                                        
                                        <td><img  class="img_slide" src="{{asset($item->image_path)}}" 
                                             alt=""></td>
                                        {{-- <td><a href="#"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#view_{{$item->id}}"><i class="fa fa-eye"></i>&nbsp; View</button></a></td> --}}
                                        <td>
                                            @can('slide-edit')
                                            <a href="{{route('slide.edit', $item->id)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                                            @else
                                            <a href="{{route('403')}}"><button type="button" class="btn btn-outline-success" disabled><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                                            @endcan
                                            @can('slide-delete')
                                            <a href="{{route('slide.delete', $item->id)}}"><button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i>&nbsp; Delete</button></a>
                                            @else
                                            <a href="{{route('403')}}"><button type="button" class="btn btn-outline-danger" disabled><i class="fa fa-trash"></i>&nbsp; Delete</button></a>
                                            @endcan
                                            
                                        
                                        
                                        
                                        </td>
                                    </tr>
                                    {{-- @include('admin.product.popup') --}}
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- @include('admin.product.popup') --}}
                </div>

            </div>



        </div>


    </div><!-- .animated -->
    </div>
    {{-- content --}}
@endsection
