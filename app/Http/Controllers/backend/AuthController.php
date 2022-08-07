<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function loginPost(LoginRequest $request)
    {

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            } else {
                $errors = ['email' => 'e-mail ya da şifre hatalı'];
                return back()->withErrors($errors);
            }


    }
    public function login()
    {
        if (Auth::check())
        {
            return redirect('admin/dashboard');
        }
        return view('backend.auth.login');
    }

    public function register()
    {
        return view('backend.auth.register');
    }

    public function registerPost (RegisterRequest $request)
    {
            $user = User::create([
                'name'=>Str::of($request->name)->trim()->ucfirst(),
                'lastname'=>Str::of($request->lastname)->trim()->ucfirst(),
                'email'=> Str::of($request->email)->trim(),
                'password'=>Hash::make($request->password)
            ]);
            flash()->addSuccess('Hesap Başarıyla Oluşturuldu.');
            return redirect()->route('backend.register');


    }

    public function logout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('front.homepage');
    }
}
