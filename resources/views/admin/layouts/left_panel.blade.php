<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('/dasboard') ? 'active' : '' }}">
                    <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Page</li><!-- /.menu-title -->
  
                <li class="menu-item-has-children dropdown {{ request()->is('*category*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Category</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('category.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('category.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*menu*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Menu</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('menu.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('menu.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*product*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('product.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('product.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*slide*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Slide</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('slide.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('slide.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*setting*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Setting</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('setting.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('setting.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*users*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('users.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('users.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*roles*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Roles</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('roles.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('roles.create')}}">Add</a></li>
                     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ request()->is('*permission*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Permission</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-bars"></i><a href="{{route('permission.index')}}">List</a></li>
                        <li><i class="fa fa-plus"></i><a href="{{route('permission.create')}}">Add</a></li>
                     
                    </ul>
                </li>

                <li>
                    <a href="{{route('order.index')}}"> <i class="menu-icon ti-email"></i>Order </a>
                </li>
                <li>
                    <a href="{{route('orderdetail.index')}}"> <i class="menu-icon ti-email"></i>Order Detail </a>
                </li>
                
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->