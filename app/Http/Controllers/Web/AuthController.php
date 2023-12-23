<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function login()
    {
        return view('pages.web.auth.login');
    }
    public function register()
    {
        return view('pages.web.auth.register');
    }
    public function do_register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:20',
            'alamat' =>'required',
            'username' =>'required|Unique:users',
            'nomorhp' =>'required',
            'email' =>'required|Unique:users|email:dns',
            'password' => 'required|min:8|max:16',
        ]);

        $user = new User;
        $user->name = Str::title($request->name);
        $user->alamat = $request->alamat;
        $user->username = $request->username;
        $user->nomorhp = $request->nomorhp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();
        return redirect('/')->with('success', 'Berhasil Registrasi');
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('/dashboard');
            }else{
                return back()->with('loginError', 'Password anda salah!'); 
            }
        }else {
            return back()->with('loginError', 'Email anda salah atau tidak terdaftar!');
        }
    }
    public function do_logout()
    {
        $user = Auth ::guard('web')->user();
        Auth::logout($user);
        return redirect()->route('auth.index');
    }
}