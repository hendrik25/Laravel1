<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            if($user->level == 'Admin'){
                return redirect()->intended('admin');
            }
            else if($user->level == 'Manager'){
                    return redirect()->intended('manager');
            }
        }
        return view('login.index');
    }
    // public function proses(Request $request){
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ],
    //         [
    //             'username.required' => 'Username Tidak Boleh Kosong',
    //             'password.required' => 'Password Tidak Boleh Kosong'
    //         ]
    //     );

    //     $kredensial = $request->only('username', 'password');

    //     if(Auth::attempt($kredensial)){
    //         $request->session()->regenerate();
    //         $user = Auth::user();
    //         if($user = Auth::user()){
    //             if($user->level == 'admin'){
    //                 return redirect()->intended('admin');
    //             }
    //             else if($user->level == 'manager'){
    //                 return redirect()->intended('manager');
    //             }
    //         }
    //     }

    //     return redirect()->back()->withErrors([
    //         'username' => 'Maaaf username atau password anda salah',
    //     ])->onlyInput('username');
    // }

    public function proses(Request $request){
        // validasi login
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ],
            [
                'username.required' => 'Username Tidak Boleh Kosong',
                'password.required' => 'Password Tidak Boleh Kosong'
            ]
        );
        // cek credentials
        if (Auth::attempt($request->only('username' , 'password'))) {
            $request->session()->regenerate();
            // cek apakah user memiliki level sebagai admin
            if (Auth::user()->level == 'Admin') {
                return redirect()->intended('admin');
            } else if(Auth::user()->level == 'Manager'){
                return redirect()->intended('manager');
            }
        } else {
            return redirect()->back()->withErrors([
                'username' => 'Maaaf username atau password anda salah',
            ])->onlyInput('username');
        }
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
