<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function getLogin()
    {
        return view('admin.layouts.login');
    }
    public function postLogin(Request $request)
    {
        // dd($request->has('remember_me'));
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->pass,
        ],$remember )){
            return redirect()->route('category.index');
        }
    }
}
