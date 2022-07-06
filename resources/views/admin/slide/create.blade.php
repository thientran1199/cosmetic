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
                                <li><a href="#">Slide</a></li>
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
                            <form action="{{route('slide.store')}}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label
                                        class=" form-control-label">Title</label>
                                        <input type="text" id="title"
                                        name="title"  class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label
                                        class=" form-control-label">Description</label>
                                        <textarea  class="form-control" name="description"  rows="4"></textarea>
                                        
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label  class=" form-control-label">Image</label>
                                    <input type="file"  name="image"
                                        class="form-control-file">
                                    {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('image')
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
