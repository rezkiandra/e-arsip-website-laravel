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
      'email_or_username' => ['required', 'string'],
      'password' => ['required'],
    ]);

    $credentials = $request->only('email_or_username', 'password');

    if (Auth::attempt(['email' => $credentials['email_or_username'], 'password' => $credentials['password']])) {
      Alert::toast('Selamat datang', 'success');
      return redirect()->route('admin.dashboard');
    } elseif (Auth::attempt(['name' => $credentials['email_or_username'], 'password' => $credentials['password']])) {
      Alert::toast('Selamat datang', 'success');
      return redirect()->route('admin.dashboard');
    } else {
      Alert::toast('Email/Username atau password salah', 'error');
      return redirect()->back()->withInput()->withErrors(['email_or_username' => 'Email/Username atau password salah']);
    }
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
