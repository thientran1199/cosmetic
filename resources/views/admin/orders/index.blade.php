@extends('admin.master')
@section('title', 'Order ')
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
                                <li><a href="#">Menu</a></li>
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
                            <strong class="card-title">Order Table</strong>
                            {{-- @can('menu-add')
                            <a href="{{route('menu.create')}}" style="float: right;"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i>&nbsp; ADD DATA</button></a>
                            @else
                            <a href="{{route('403')}}" style="float: right;"><button type="button" class="btn btn-outline-success" disabled><i class="fa fa-plus"></i>&nbsp; ADD DATA</button></a> 
                            @endcan --}}
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">User</th>
                                        {{-- <th scope="col">Parent ID</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                    <tr>  
                                        <th scope="row">{{$item->id}}</th>
                                        <td>{{$item->customers->name}}</td>
                                        <td>{{$item->note}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->total_price}}</td>
                                        <td>{{$item->users->name}}</td>
                                        {{-- <td>{{$item->note}}</td> --}}
                                        {{-- <td>{{$item->parent_id}}</td> --}}
                                        <td>
                                            {{-- @can('menu-edit')
                                            <a href="{{route('menu.edit', $item->id)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                                            @else
                                            <a href="{{route('403')}}"><button type="button" class="btn btn-outline-success" disabled><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                                            @endcan --}}
                                            <a href="#"><button type="button" class="btn btn-outline-success" 
                                                data-toggle="modal" data-target="#view_{{$item->id}}"><i class="fa fa-eye"></i>&nbsp; View</button></a>
                                            
                                            @can('order-delete')
                                            <a href="{{route('order.delete', $item->id)}}"><button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i>&nbsp; Delete</button></a>
                                            @else
                                            <a href="{{route('403')}}"><button type="button" class="btn btn-outline-danger" disabled><i class="fa fa-trash"></i>&nbsp; Delete</button></a>
                                            @endcan
                                            
                                        </td>
                                    </tr>
                                    @include('admin.orderdetail.popup')
                                    @endforeach
                                   
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>


    </div><!-- .animated -->
    </div>
    {{-- content --}}
@endsection
