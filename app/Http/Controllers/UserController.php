<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Function Menampilkan Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Function Login
    public function func_login(Request $request)
    {
        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            Alert::success('Success','Berhasil login');
            return redirect('/dashboard');
        }else{
            Alert::error('Error','Login gagal, coba lagi!');
            return back();
        }
    }

    // Function Logout
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        Alert::toast('Berhasil Logout!', 'success');
        return redirect()->route('login');
    }
}
