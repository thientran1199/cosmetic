<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->attach($request->role_id);
        // $roleID = $request->role_id;
        // foreach ($roleID as $roleItem ) {
        //    DB::table('role_user')->insert([
        //     'user_id' => $user->id,
        //     'role_id' => $roleItem,
        //    ]);
        // }
        DB::commit();
        Alert::success('Success', 'ADD User - Role Done');
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
        $role = Role::all();
        $user = User::find($id);
        $roleOfUser =  $user->roles;
        // dd($roleOfUser);
        return view('admin.users.edit',compact('user','role','roleOfUser'));
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
            $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->role_id);
        // $roleID = $request->role_id;
        // foreach ($roleID as $roleItem ) {
        //    DB::table('role_user')->update([
        //     'user_id' => $user->id,
        //     'role_id' => $roleItem,
        //    ]);
        // }
        DB::commit();
        Alert::success('Success', 'EDIT User - Role Done');
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
        $delete = User::find($id)->delete();
        Alert::success('Success', 'Delete Users - Role Done');
        return redirect()->back();
    }
}
