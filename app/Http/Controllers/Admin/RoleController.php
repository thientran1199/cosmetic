<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissionParent = Permission::where('parent_id',0)->get();
        return view('admin.roles.create',compact('permissionParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
        DB::beginTransaction();
       
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->save();
        $role->permissions()->attach($request->permission_id);
        
       
        DB::commit();
        Alert::success('Success', 'ADD Role - Permission Done');
        return redirect()->back();

        }catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
        }
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
        $permissionParent = Permission::where('parent_id',0)->get();
        $role  = Role::find($id);
        $permissionChecked = $role->permissions;
        // dd($permissionChecked);
        return view('admin.roles.edit',compact('role','permissionParent','permissionChecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();
           
            $role = Role::find($id);
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->save();
            $role->permissions()->sync($request->permission_id);
            
           
            DB::commit();
            Alert::success('Success', 'EDIT Role - Permission Done');
            return redirect()->back();
    
            }catch (\Exception $e) {
                //throw $th;
                DB::rollBack();
                Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
            }
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
    }
}
