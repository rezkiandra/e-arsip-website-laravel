<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function register()
  {
    return view('auth.register');
  }

  public function signin(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      Alert::toast('Selamat datang di dashboard', 'success');
      return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
      'email' => 'Email atau password salah',
    ])->onlyInput('email');
  }

  public function signup(Request $request)
  {
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    Alert::toast('Akun berhasil dibuat', 'success');
    return redirect()->route('login');
  }

  public function logout()
  {
    Auth::logout();
    Alert::toast('Selamat tinggal', 'success');
    return redirect()->route('login');
  }
}
