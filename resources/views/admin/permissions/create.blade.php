@extends('admin.master')
@section('title', 'ADD ')
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
                                <li><a href="#">Permission</a></li>
                                <li class="active">Add</li>
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
                            <form action="{{ route('permission.store') }}" method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Module</label>
                                    <select name="module_parent" id="" class="form-control" style="text-transform: capitalize">
                                        
                                            <option value="">Chọn Module</option>
                                            @foreach (config('permissions.table_module') as $item)
                                            <option value="{{$item }}">{{$item }}</option>
                                           
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        @foreach (config('permissions.module_child') as $i)
                                        <div class="col-md-3">
                                            <label style="text-transform: capitalize">
                                            <input type="checkbox" value="{{$i}}" name="module_childrent[]" class="checkbox_body">
                                            {{$i}}
                                            </label>
                                            
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

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
