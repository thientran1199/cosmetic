<?php
 namespace App\Services;

use Illuminate\Support\Facades\Gate;

 class PermissionGateAndPolicyAccess{


    public function setGateAndPolicy()
    {
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateProduct();
        $this->defineGateSlide();
        $this->defineGateSetting();
        $this->defineGateUsers();
        $this->defineGateRole();
    }

    public function defineGateCategory()
    {
        //categroy
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    public function defineGateMenu()
    {
        //menu
        Gate::define('menu-list', 'App\Policies\MenuPolicy@view');
        Gate::define('menu-add', 'App\Policies\MenuPolicy@create');
        Gate::define('menu-edit', 'App\Policies\MenuPolicy@update');
        Gate::define('menu-delete', 'App\Policies\MenuPolicy@delete');
    }
    public function defineGateProduct()
    {
        //product
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-add', 'App\Policies\ProductPolicy@create');
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product-delete', 'App\Policies\ProductPolicy@delete');
    }
    public function defineGateSlide()
    {
        //slide
        Gate::define('slide-list', 'App\Policies\SlidePolicy@view');
        Gate::define('slide-add', 'App\Policies\SlidePolicy@create');
        Gate::define('slide-edit', 'App\Policies\SlidePolicy@update');
        Gate::define('slide-delete', 'App\Policies\SlidePolicy@delete');
    }
    public function defineGateSetting()
    {
        //setting
        Gate::define('setting-list', 'App\Policies\SettingPolicy@view');
        Gate::define('setting-add', 'App\Policies\SettingPolicy@create');
        Gate::define('setting-edit', 'App\Policies\SettingPolicy@update');
        Gate::define('setting-delete', 'App\Policies\SettingPolicy@delete');
    }
    public function defineGateUsers()
    {
        //users
        Gate::define('users-list', 'App\Policies\UsersPolicy@view');
        Gate::define('users-add', 'App\Policies\UsersPolicy@create');
        Gate::define('users-edit', 'App\Policies\UsersPolicy@update');
        Gate::define('users-delete', 'App\Policies\UsersPolicy@delete');
    }
    public function defineGateRole()
    {
        //roles
        Gate::define('roles-list', 'App\Policies\RolesPolicy@view');
        Gate::define('roles-add', 'App\Policies\RolesPolicy@create');
        Gate::define('roles-edit', 'App\Policies\RolesPolicy@update');
        Gate::define('roles-delete', 'App\Policies\RolesPolicy@delete');
    }
 }

