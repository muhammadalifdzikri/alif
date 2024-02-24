<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('auth/login');
    }

    public function login(Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/page');
        } else {
            return redirect()->back();
        }
    }

    public function registrasi() {
        return view('auth/registrasi');
    }

    public function register(Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $datas = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($datas)) {
            return redirect('/login');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/');
    }

}
