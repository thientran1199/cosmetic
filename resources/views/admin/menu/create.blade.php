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
                                <li><a href="#">Menu</a></li>
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
                            <form action="{{route('menu.store')}}" method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <label for="name"
                                        class=" form-control-label">Name</label>
                                        <input type="text" id="name"
                                        name="name" placeholder="Enter Name.." class="form-control">
                                        {{-- <span
                                        class="help-block">Please enter your name</span> --}}
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="name"
                                        class=" form-control-label">Parent ID</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            @foreach($menu_levels as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            <?php
                                               
                                                if($key!=0  ){
                                                    $subMenu=DB::table('menus')->select('id','name')->where('parent_id',$key)->get();
                                                    if(count($subMenu)>0){
                                                        foreach ($subMenu as $subMenu){
                                                            echo '<option value="'.$subMenu->id.'"> &nbsp; &nbsp;--'.$subMenu->name.'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            @endforeach
                                            
                                        </select>
                                        
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
