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
                                <li><a href="#">Roles</a></li>
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
                            <form action="{{ route('roles.store') }}" method="post" class=""
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label class=" form-control-label">Display Name</label>
                                    {{-- <input type="text" id="display_name" name="display_name" class="form-control"> --}}
                                    <textarea  class="form-control" name="display_name"  rows="4"></textarea>
                                   
                                </div>
                                @error('display_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>
                                    <input type="checkbox"  class="checkbox_all">
                                   </label>
                                   Select ALL
                                </div>

                                @foreach ($permissionParent as $item)
                                <div class="form-group cards">
                                    <div class="card border-success mb-3" style="">
                                        <div class="card-header" style="text-transform: capitalize">
                                            <label>
                                            <input type="checkbox"  class="checkbox_header">
                                           </label>
                                           Module {{$item->name}}</div>
                                        <div class="card-body text-success" style="text-transform: capitalize">
                                            <div class="row">
                                            @foreach ($item->permissionChilrent as $i)
                                                <div class="col-md-3">
                                                    <label>
                                                    <input type="checkbox" value="{{$i->id}}" name="permission_id[]" class="checkbox_body">
                                                    </label>
                                                    {{$i->name}}
                                                </div>
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

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
