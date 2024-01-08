<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
    public function showLogin(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        $checkAccount = User::all();
        if(count($checkAccount)>0){
            return view('pages.auth.login');
        }else{
            // return view('pages.auth.signup');
            return redirect()->route("signup-page");
        }
        // return true;
    }

    public function showSignup(){
        $checkAccount = User::all();
        if(count($checkAccount)<1){
            return view('pages.auth.signup');
        }else{
            abort(404);
        }
    }
    
    public function createAccount(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|unique:users|max:255',
                'password' => 'required|string|min:6',
            ]);

            // Membuat user baru
            $user = new User();
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Response berhasil
            return redirect()->route('login-page')->with('success', 'Registration successful');
        } catch (\Exception $e) {
            // Handle error lainnya
            return redirect()->route('signup-page')->with('error', 'Registration Failed');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with("error","Username/Password salah");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
