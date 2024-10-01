<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

            return redirect('/employees');
       

    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:managers',
            'password' => 'required|string|min:8|confirmed',
        ]);

       

        $manager = Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // تأكد من تشفير كلمة المرور
        ]);
        

        Auth::login($manager);

        return redirect('/employees');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
