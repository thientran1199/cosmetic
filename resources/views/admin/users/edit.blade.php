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
                                <li><a href="#">Users</a></li>
                                <li class="active">EDIT</li>
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
                            <form action="{{route('users.update', $user->id)}}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label
                                        class=" form-control-label">Name</label>
                                        <input type="text" id="name"
                                        name="name" value="{{$user->name}}" class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label
                                        class=" form-control-label">Email</label>
                                        <input type="email" id="email"
                                        name="email" value="{{$user->email}}" class="form-control">
                                        
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                                <div class="form-group">
                                    <label
                                        class=" form-control-label">Password</label>
                                        <input id="password-field" type="password" class="form-control" name="password" >
                                    
                                        <i toggle="#password-field" class="fa fa-eye field-icon toggle-password"></i>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label class=" form-control-label">Role </label>
                                    <select class="form-control choose_roles" name="role_id[]" multiple="multiple">
                                       
                                        @foreach ($role as $item)

                                            <option 
                                            {{$roleOfUser->contains('id' , $item->id) ? 'selected' : ''}}
                                            value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    

                                    </select>


                                </div>
                                @error('role_id')
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
