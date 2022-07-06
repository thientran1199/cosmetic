<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu = Menu::all();
        return view('admin.menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plucked=Menu::where('parent_id',0)->pluck('name','id');
        $menu_levels=['0'=>'Main Menu']+$plucked->all();
        return view('admin.menu.create',compact('menu_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        //

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->parent_id = $request->parent_id;
        $menu->slug = Str::slug($request->name);
        Alert::success('Succes','ADD Menu Success');
        // alert()->success('Title','Lorem Lorem Lorem');
        $menu->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plucked=Menu::where('parent_id',0)->pluck('name','id');
        $menu_levels=['0'=>'Main Menu']+$plucked->all();
        $menu = Menu::find($id);
        return view('admin.menu.edit',compact('menu','menu_levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        //
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->parent_id = $request->parent_id;
        $menu->slug = Str::slug($request->name);

        Alert::success('Success', 'Edit Menu Done');
        $menu->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = Menu::find($id)->delete();
        Alert::success('Success', 'Delete Menu Done');
        return redirect()->back();
    }
}
